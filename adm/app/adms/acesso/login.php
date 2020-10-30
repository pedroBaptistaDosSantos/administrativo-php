<?php
if (!isset($seg)) {
    exit;
}
include_once 'app/adms/include/head_login.php';
?>
<body class="text-center">
    <form class="form-signin">
        <img class="mb-4" src="<?php echo pg; ?>/assets/img/logo.png" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
        <label for="inputEmail" class="sr-only">Endereço de email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Lembrar de mim
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <p class="text-center" style="margin-top: 50px;"> <a href=""> Esqueceu sua senha? </a></p>
    </form>
</body>