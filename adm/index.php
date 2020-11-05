<?php
session_start();
ob_start();
$seg = true;
include_once './config/config.php';
include_once './config/conexao.php';
include_once './lib/lib_valida.php';
$url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_STRING);
$url_limpa = limparUrl($url);

if (isset($_SESSION['adms_niveis_acesso_id'])) {
    $adms_niveis_acesso_id = $_SESSION['adms_niveis_acesso_id'];
} else {
    $adms_niveis_acesso_id = 0;
}
$result_pg = "SELECT pg.tp_pagina, pg.endereco "
        . " FROM adms_paginas pg"
        . " LEFT JOIN adms_nivac_pgs nivpg "
        . " ON nivpg.adms_pagina_id = pg.id "
        . " WHERE pg.endereco='" . $url_limpa . "' "
        . " AND (pg.adms_sits_pg_id = 1"
        . " AND (adms_niveis_acessos_id = '" . $adms_niveis_acesso_id . "'  "
        . " AND nivpg.permissao = 1) OR (pg.lib_pub = 1))"
        . " LIMIT 1";
$resultado_pg = mysqli_query($conn, $result_pg);
?>
<!DOCTYPE html5>
<html lang="pt-br">
    <?php
    if (($resultado_pg) AND ($resultado_pg->num_rows != 0)) {
        $row_pg = mysqli_fetch_assoc($resultado_pg);
        $file = "app/" . $row_pg['tp_pagina'] . "/" . $row_pg['endereco'] . '.php';
        if (file_exists($file)) {
            include $file;
        } else {
            //include 'app/adms/visualizar/home.php';
            $url_destino = pg . '/acesso/login';
            header("Location: " . $url_destino);
        }
    } else {
        $url_destino = pg . '/acesso/login';
        header("Location: " . $url_destino);
    }
    ?>
</html>