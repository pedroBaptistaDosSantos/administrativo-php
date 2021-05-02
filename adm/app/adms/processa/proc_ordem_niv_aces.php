<?php

if (!isset($seg)) {
    exit;
}

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if (!empty($id)) {
    
} else {
    $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Página não encontrada </div>";
    $url_destino = pg . '/acesso/login';
    header("Location: " . $url_destino);
}