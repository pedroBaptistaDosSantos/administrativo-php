<?php

if (!isset($seg)) {
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    //Verificar se há usuários cadastrados no nível de acesso
    $result_user = "SELECT id FROM adms_usuarios WHERE adms_niveis_acesso_id='$id' LIMIT 1";
    $resultado_user = mysqli_query($conn, $result_user);
    if (($resultado_user) AND ($resultado_user->num_rows != 0)) {
        $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Pedido negado! Há usuários que cadastrados nesse nível  </div>";
        $url_destino = pg . '/listar/list_niv_aces';
        header("Location: " . $url_destino);
    } else {
        //pesquisa se existe niveis de acesso com ordem acima do qual será apagado
        $result_niv_aces = "SELECT id, ordem AS ordem_result FROM adms_niveis_acessos WHERE ordem > (SELECT ordem FROM adms_niveis_acessos WHERE id='$id') ORDER BY ordem ASC";
        $resultado_niv_aces = mysqli_query($conn, $result_niv_aces);

        //apaga nivel de acesso
        $result_niv_aces_del = "DELETE FROM adms_niveis_acessos WHERE id='$id' AND ordem > '" . $_SESSION['ordem'] . "'";
        mysqli_query($conn, $result_niv_aces_del);

        if (mysqli_affected_rows($conn)) {

            //altera sequencia da ordem dos niveis, para não deixar os id's desorganizados 
            if (($resultado_niv_aces) AND ($resultado_niv_aces->num_rows != 0 )) {
                while ($row_niv_aces = mysqli_fetch_assoc($resultado_niv_aces)) {
                    --$row_niv_aces['ordem_result'];
                    $result_niv_or = "UPDATE adms_niveis_acessos SET"
                            . " ordem='" . $row_niv_aces['ordem_result'] . "', "
                            . " modified=NOW()"
                            . " WHERE id='" . $row_niv_aces['id'] . "'";

                    mysqli_query($conn, $result_niv_or);
                }
            }

            $_SESSION['msg'] = "<div class=\"alert alert-success\" role=\"alert\"> Nível de acesso apagado com sucesso! </div>";
            $url_destino = pg . '/listar/list_niv_aces';
            header("Location: " . $url_destino);
        } else {
            $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> ERRO! O nível de acesso não foi apagado! </div>";
            $url_destino = pg . '/listar/list_niv_aces';
            header("Location: " . $url_destino);
        }
    }
} else {
    $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Página não encontrada </div>";
    $url_destino = pg . '/acesso/login';
    header("Location: " . $url_destino);
}