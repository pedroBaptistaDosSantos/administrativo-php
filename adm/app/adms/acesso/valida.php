<?php

$sendLogin = filter_input(INPUT_GET, 'envio_login', FILTER_SANITIZE_STRING);
if ($sendLogin) {
    $usuario_rc = filter_input(INPUT_GET,'usuario', FILTER_SANITIZE_STRING);
    $usuario = str_ireplace(' ','', $usuario_rc);
    $senha_rc = filter_input(INPUT_GET, 'senha', FILTER_SANITIZE_STRING);
    $senha = str_ireplace(' ','', $senha_rc);
    if ((!empty($usuario)) AND (!empty($senha))) {
        echo password_hash($senha, PASSWORD_DEFAULT);
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
