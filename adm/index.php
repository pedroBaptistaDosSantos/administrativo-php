<?php
include_once './config/conexao.php';
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);
$result_pg = "SELECT * FROM adms_paginas WHERE endereco='" . $url . "' LIMIT 1";
$resultado_pg = mysqli_query($conn, $result_pg);
?>
<!DOCTYPE html5>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>title</title>
    </head>
    <body>
        <?php
        if (($resultado_pg) AND ($resultado_pg->num_rows != 0)) {
            $row_pg = mysqli_fetch_assoc($resultado_pg);
            $file = "app/".$row_pg['tp_pagina']."/" . $row_pg['endereco'] . '.php';
            if (file_exists($file)) {
                include $file;
            } else {
                include 'app/adms/visualizar/home.php';
            }
        }
        ?>
    </body>
</html>