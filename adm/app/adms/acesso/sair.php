<?php

if (!isset($seg)) {
    exit;
}

//destruindo a sessão
unset($_SESSION['id'],
        $_SESSION['nome'],
        $_SESSION['email'],
        $_SESSION['adms_niveis_acesso_id'],
        $_SESSION['ordem']
);

$_SESSION['msg'] = "<div class=\"alert alert-success\" role=\"alert\"> Deslogado com sucesso! </div>";
$url_destino = pg . '/acesso/login';
header("Location: " . $url_destino);
