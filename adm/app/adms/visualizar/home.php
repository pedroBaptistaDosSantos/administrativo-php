<?php
if (!isset($seg)) {
    exit;
}
include_once 'app/adms/include/head.php';
?>


<body> 
    <?php
        include_once 'app/adms/include/header.php';
    ?>
    <div class="d-flex">
    <?php 
        include_once 'app/adms/include/menu.php';
    ?>    
    </<div>
    <?php
        echo "<br>Bem vindo a home";
        echo "<br> <a href='" . pg . "/acesso/sair'> Sair </a>";    
        include_once 'app/adms/include/rodape_lib.php';
    ?>
</body>

