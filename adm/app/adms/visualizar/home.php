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
            <div class="container">
                <h2 class="display-4"></h2>
                <div class="card-deck deck-1">
                    <div class="card bg-success text-white">
                        <div class="card-body">
                            <i class="fas fa-user fa-3x"></i>
                            <h5 class="card-title">Usuarios</h5>
                            <p class="card-text">175</p>
                        </div>
                    </div>
                    <div class="card bg-danger text-white">
                        <div class="card-body">
                            <i class="far fa-file fa-3x"></i>
                            <h5 class="card-title">Artigos</h5>
                            <p class="card-text">175</p>
                        </div>
                    </div>
                    <div class="card bg-warning text-white">
                        <div class="card-body">
                            <i class="fas fa-eye fa-3x"></i>
                            <h5 class="card-title">Visitas</h5>
                            <p class="card-text">175</p>
                        </div>
                    </div>
                    <div class="card bg-primary text-white">
                        <div class="card-body">
                            <i class="fas fa-user fa-3x"></i>
                            <h5 class="card-title">Comentarios</h5>
                            <p class="card-text">175</p>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            include_once 'app/adms/include/rodape_lib.php';
            ?>
        </div>    
</body>

