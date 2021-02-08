<nav class="sidebar bg-dark">
    <ul class="list-unstyled">
        <?php
         $result_menu = "SELECT nivpg.*, 
                men.nome, men.icone, 
                pg.nome_pagina, pg.endereco, pg.icone
                FROM adms_nivac_pgs nivpg
                INNER JOIN adms_menus men ON men.id=nivpg.adms_menu_id
                INNER JOIN adms_paginas pg ON pg.id=nivpg.adms_pagina_id
            WHERE nivpg.adms_niveis_acessos_id='" . $_SESSION['adms_niveis_acesso_id'] . "' 
                AND nivpg.permissao=1 
                AND nivpg.lib_menu=1";
            $resultado_menu = mysqli_query($conn, $result_menu);

            while ($row_menu = mysqli_fetch_assoc($resultado_menu)) {
                //echo 'ID: ' . $row_menu['id'] . "<br>";
                //echo "<i class='".$row_menu['icone']."'></i>".$row_menu['nome']."<br>";
                echo "<li><a href='".pg."/".$row_menu['endereco']."'><i class='".$row_menu['icone']."'></i> ". $row_menu['nome'] ."</a></li>";
            }
        
        ?>
        <li><a href="#"><i class="fas fa-tachometer-alt "></i> Dashboard</a></li>
        <li>
            <a href="#submenu1" data-toggle="collapse"> 
                <i class="fas fa-user"></i>Usuarios
            </a>
            <ul class="list-unstyled collapse" id="submenu1">
                <li>
                    <a href="listar.html"><i class="fas fa-chevron-right"></i>
                        <i class="fas fa-users"></i>
                        Usuários</a>
                </li>
                <li><a href="#">
                        <i class="fas fa-chevron-right"></i>
                        <i class="fas fa-key"></i>
                        Nivel de acesso</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#submenu2" data-toggle="collapse">
                <i class="fas fa-list"></i> 
                Menu
            </a>
            <ul class="list-unstyled collapse" id="submenu2">
                <li>
                    <a href="#"><i class="fas fa-chevron-right"></i>
                        <i class="fas fa-file-alt"></i>
                        Páginas</a>
                </li>
                <li class="active"><a href="#">
                        <i class="fas fa-chevron-right"></i>
                        <i class="fab fa-elementor"></i>
                        Item de menu</a>
                </li>
            </ul>
        </li>
        <li><a href="#"> Item 1</a></li>
        <li><a href="#"> Item 2</a></li>
        <li><a href="#"> Item 3</a></li>
        <li class="active"><a href="#"> Item 4</a></li>
        <li><a href="#"> <i class="fas fa-sign-out-alt"></i>sair</a></li>
    </ul>
</nav>