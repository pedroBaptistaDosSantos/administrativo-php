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

            $result_menu = "SELECT nivpg.*, 
                men.nome, men.icone
                FROM adms_nivac_pgs nivpg
                INNER JOIN adms_menus men ON men.id=nivpg.adms_menu_id
            WHERE nivpg.adms_niveis_acessos_id='" . $_SESSION['adms_niveis_acesso_id'] . "' 
                AND nivpg.permissao=1 
                AND nivpg.lib_menu=1";
            $resultado_menu = mysqli_query($conn, $result_menu);

            while ($row_menu = mysqli_fetch_assoc($resultado_menu)) {
                //echo 'ID: ' . $row_menu['id'] . "<br>";
                echo "<i class='".$row_menu['icone']."'></i>".$row_menu['nome']."<br>";
                
            }
            
            include_once 'app/adms/include/rodape_lib.php';
            ?>
            </body>

