<?php
if (!isset($seg)) {
    exit;
}
include_once 'app/adms/include/head_login.php';
?>
<body class="text-center">
    <form class="form-signin" action="<?php echo pg . '/acesso/valida'; ?>" method="GET">
        <img class="mb-4" src="<?php echo pg; ?>/assets/img/logo.png" alt="">
        <h1 class="h3 mb-3 font-weight-normal">Area de login</h1>
        <?php 
        if (isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
        <label for="inputEmail" class="sr-only">Endereço de email</label>
        <input name="usuario" type="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus>
        <label  for="inputPassword" class="sr-only">Senha</label>
        <input name="senha" type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
            </label>
        </div>
        <input name="envio_login" class="btn btn-lg btn-block btn-login" type="submit">Login</button>
        <p class="text-center" style="margin-top: 50px;"> <a href="" class="esc-senha"> Esqueceu sua senha? </a></p>
    </form>
</body>