<?php

if (!isset($seg)) {
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    //pesquisa ordem de acesso que vai ser movido
    $result_niv_atual = "SELECT id, ordem FROM adms_niveis_acessos WHERE id='$id' LIMIT 1";
    $resultado_niv_atual = mysqli_query($conn, $result_niv_atual);
    if (($resultado_niv_atual) AND ($resultado_niv_atual->num_rows != 0)) {
        $row_niv_atual = mysqli_fetch_assoc($resultado_niv_atual);
        //verificar se ordem é maior em relação ao usuário logado
        if ($row_niv_atual['ordem'] > $_SESSION['ordem'] + 1) {
            $ordem = $row_niv_atual['ordem'];

            //Pesquisar o ID do nivel de acesso que vai ser movido para baixo
            $ordem_super = $ordem - 1;
            $result_niv_super = "SELECT id, ordem FROM adms_niveis_acessos WHERE ordem='$ordem_super' LIMIT 1";
            $resultado_niv_super = mysqli_query($conn, $result_niv_super);
            $row_niv_super = mysqli_fetch_assoc($resultado_niv_super);

            //Mover nivel a ser superado para baixo
            $result_niv_mv_baixo = "UPDATE adms_niveis_acessos SET 
            ordem ='$ordem' , 
            modified=NOW()
            WHERE id='" . $row_niv_super['id'] . "'";
            mysqli_query($conn, $result_niv_mv_baixo);
            //Mover nivel para cima
            $result_niv_mv_cima = "UPDATE adms_niveis_acessos SET 
            ordem ='$ordem_super' , 
            modified=NOW()
            WHERE id='" . $row_niv_atual['id'] . "'";
            mysqli_query($conn, $result_niv_mv_cima);

            //Redirecionar conforme a situação do alterar: sucesso ou erro

            if (mysqli_affected_rows($conn)) {
                $_SESSION['msg'] = "<div class=\"alert alert-success\" role=\"alert\"> Operação Concluída</div>";
                $url_destino = pg . '/listar/list_niv_aces';
                header("Location: " . $url_destino);
            } else {
                $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\">Erro ao tentar alterar nivel de acesso</div>";
                $url_destino = pg . '/listar/list_niv_aces';
                header("Location: " . $url_destino);
            }
        } else {
            $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Nível de acesso não encontrado</div>";
            $url_destino = pg . '/listar/list_niv_aces';
            header("Location: " . $url_destino);
        }
    } else {
        $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Nível de acesso não encontrado</div>";
        $url_destino = pg . '/listar/list_niv_aces';
        header("Location: " . $url_destino);
    }
} else {
    $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Página não encontrada </div>";
    $url_destino = pg . '/acesso/login';
    header("Location: " . $url_destino);
}