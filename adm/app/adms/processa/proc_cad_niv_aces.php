<?php

if (!isset($seg)) {
    exit;
}

$SendCadNivAc = filter_input(INPUT_POST, 'SendCadNivAc', FILTER_SANITIZE_STRING);
if ($SendCadNivAc) {
    $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    //var_dump($dados);
    //validar nenhum campo vazio
    $erro = false;
    include_once 'lib/lib_vazio.php';

    $dados_validos = vazio($dados);

    if ($dados_validos != true) {
        $erro = true;
        $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Preencha os campos corretamente! </div>";
    }


    if ($erro) {
        $url_destino = pg . '/cadastrar/cad_niv_aces';
        header("Location: " . $url_destino);
    } else {
        echo "Cadastrar";
    }
} else {
    $_SESSION['msg'] = "<div class=\"alert alert-danger\" role=\"alert\"> Página não foi encontrada </div>";
    $url_destino = pg . '/acesso/login';
    header("Location: " . $url_destino);
}

