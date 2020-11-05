<?php 
$result_user_hd = "SELECT id, nome, imagem FROM adms_usuarios WHERE id ='". $_SESSION['id']."' LIMIT 1";
$resultado_user_hd = mysqli_query($conn, $result_user_hd);
$row_user_hd =  mysqli_fetch_assoc($resultado_user_hd);    
$nome = explode(" ", $row_user_hd['nome']);
$prime_nome = $nome[0];
?>

<nav class="navbar navbar-expand navbar-dark bg-dark nav-bar-principal">
    <a class="sidebar-toggle text-light mr-3">
        <span class="navbar-toggler-icon"></span>
    </a>
    <a class="navbar-brand" href="#">
         DashBoard
    </a>

    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle menu-header" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">
                    <img class="rounded-circle" src="<?php echo pg; ?>/assets/img/icons8-user-male-64.png" width="40" height="40"> &nbsp;<span class="d-none d-sm-inline"><?php echo $nome[0]; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="#"> <i class="fas fa-user"></i>Perfil</a>
                    <a class="dropdown-item" href="<?php echo pg;?>/acesso/sair"> <i class="fas fa-sign-out-alt"></i>Sair</a>
                </div>
            </li>
        </ul>                
    </div>
</nav>