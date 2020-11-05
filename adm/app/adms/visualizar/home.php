<?php
if (!isset($seg)) {
    exit;
}
include_once 'app/adms/include/head.php';
?>


<body> 
    <?php
    include_once 'app/adms/include/rodape_lib.php';
    include_once 'app/adms/include/header.php';
    echo "<br>Bem vindo a home";
    echo "<br> <a href='" . pg . "/acesso/sair'> Sair </a>";    
    
    ?>
</body>

