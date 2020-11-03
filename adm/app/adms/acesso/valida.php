<?php

$sendLogin = filter_input(INPUT_GET, 'envio_login', FILTER_SANITIZE_STRING);
if ($sendLogin) {
    $usuario_rc = filter_input(INPUT_GET, 'usuario', FILTER_SANITIZE_STRING);
    $usuario = str_ireplace(' ', '', $usuario_rc);
    $senha_rc = filter_input(INPUT_GET, 'senha', FILTER_SANITIZE_STRING);
    $senha = str_ireplace(' ', '', $senha_rc);
    if ((!empty($usuario)) AND (!empty($senha))) {
        //echo password_hash($senha, PASSWORD_DEFAULT);
        $result_user = "SELECT id, nome, email, senha, adms_niveis_acesso_id FROM adms_usuarios WHERE usuario='$usuario' LIMIT 1";
        $resultado_user = mysqli_query($conn, $result_user);

        if (($resultado_user) AND ($resultado_user->num_rows != 0)) {
            $row_user = mysqli_fetch_assoc($resultado_user);

            if (password_verify($senha, $row_user['senha'])) {
                $_SESSION['id'] = $row_user['id'];
                $_SESSION['nome'] = $row_user['nome'];
                $_SESSION['email'] = $row_user['email'];
                $_SESSION['adms_niveis_acesso_id'] = $row_user['adms_niveis_acesso_id'];
                $url_destino = pg . '/visualizar/home';
                header("Location: " . $url_destino);
                
            } else {
                $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Login ou senha inválidos </div>";
                $url_destino = pg . '/acesso/login';
                header("Location: " . $url_destino);
            }
        } else {
            $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Login ou senha inválidos </div>";
            $url_destino = pg . '/acesso/login';
            header("Location: " . $url_destino);
        }
    } else {
        $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Login ou senha inválidos </div>";
        $url_destino = pg . '/acesso/login';
        header("Location: " . $url_destino);
    }
} else {
    $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Ops!Ocorreu um erro, tente novamente mais tarde </div>";
    $url_destino = pg . '/acesso/login';
    header("Location: " . $url_destino);
}
