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
            echo "Bem vindo a home <br>";
            echo " <a href='" . pg . "/acesso/sair'> Sair </a> <br>";

            $result_menu = "SELECT nivpg.*, 
                men.nome, men.icone iconmen, 
                pg.nome_pagina, pg.endereco, pg.icone iconpg
                FROM adms_nivac_pgs nivpg
                INNER JOIN adms_menus men ON men.id=nivpg.adms_menu_id
                INNER JOIN adms_paginas pg ON pg.id=nivpg.adms_pagina_id
            WHERE nivpg.adms_niveis_acessos_id='" . $_SESSION['adms_niveis_acesso_id'] . "' 
                AND nivpg.permissao=1 
                AND nivpg.lib_menu=1";


            $resultado_menu = mysqli_query($conn, $result_menu);

            while($row_menu = mysqli_fetch_assoc($resultado_menu)) {
                //echo 'ID: ' . $row_menu['id'] . "<br>";
                echo "Nome icone: " . $row_menu['iconmen'] . "    -   " . $row_menu['nome'] . "    -   " . $row_menu['endereco'] . "<br>";
            }

            include_once 'app/adms/include/rodape_lib.php';
            ?>

            </body>

