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
        <div class="content p-1">
            <div class="list-group-item">
                <div class=" d-flex">
                    <div class="mr-auto p2">
                        <h2 class="display-4 titulo">Listar Níveis de Acesso</h2>
                    </div>    

                    <div class="p-2">
                        <?php
                        $btn_cad = carregar_btn('cadastrar/cad_niv_aces', $conn);
                        if ($btn_cad) {
                            echo "<a href='" . pg . "/cadastrar/cad_niv_aces'class='btn btn-outline-success btn-sm'>Cadastrar </a>   ";
                        }
                        ?>
                    </div>

                </div> 

                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }


                //receber numero da pagina
                $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                $pagina = (empty($pagina_atual) ? $pagina_atual = 1 : $pagina_atual);

                //setar quantidade de itens por pagina
                $qnt_result_pg = 40;

                //Calcular inicio da visualização
                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
                if ($_SESSION['adms_niveis_acesso_id'] == 1) {
                    $result_niv_aces = "SELECT * FROM adms_niveis_acessos ORDER BY ordem ASC LIMIT $inicio, $qnt_result_pg";
                } else {
                    $result_niv_aces = "SELECT * FROM adms_niveis_acessos WHERE ordem > '" . $_SESSION['ordem'] . "' ORDER BY ordem ASC LIMIT $inicio, $qnt_result_pg";
                }
                $resultado_niv_aces = mysqli_query($conn, $result_niv_aces);
                if (($resultado_niv_aces) AND ($resultado_niv_aces->num_rows != 0)) {
                    ?>
                    <div class="table-responsive-sm">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th class="d-none d-sm-table-cell">Ordem</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($row_niv_aces = mysqli_fetch_assoc($resultado_niv_aces)) {
                                    ?>
                                    <tr>
                                        <th><?php echo $row_niv_aces['id']; ?></th>
                                        <td><?php echo $row_niv_aces['nome']; ?></td>
                                        <td class="d-none d-sm-table-cell"><?php echo $row_niv_aces['ordem']; ?></td>
                                        <td class="text-center">
                                            <span class="d-none d-md-block">
                                                <?php
                                                $btn_vis = carregar_btn('visualizar/vis_niv_aces', $conn);
                                                if ($btn_vis) {
                                                    echo "<a href='" . pg . "/visualizar/vis_niv_aces?id=" . $row_niv_aces['id'] . "'class='btn btn-outline-primary btn-sm'>Visualizar </a>   ";
                                                }

                                                $btn_edit = carregar_btn('editar/edit_niv_aces', $conn);
                                                if ($btn_edit) {
                                                    echo "<a href='" . pg . "/editar/edit_niv_aces?id=" . $row_niv_aces['id'] . "'class='btn btn-outline-warning btn-sm'>Editar</a>   ";
                                                }

                                                $btn_apagar = carregar_btn('processa/apagar_niv_aces', $conn);
                                                if ($btn_apagar) {
                                                    echo "<a href='" . pg . "/processa/apagar_niv_aces?id=" . $row_niv_aces['id'] . "'class='btn btn-outline-danger btn-sm'>Apagar</a>   ";
                                                }
                                                ?>




                                            </span>    
                                            <div class="dropdown d-block d-md-none">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Ações
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                                    <?php
                                                    if ($btn_vis)
                                                        echo "<a class='dropdown-item' href='" . pg . "/visualizar/vis_niv_aces?id=" . $row_niv_aces['id'] . "'>Visualizar</a>";
                                                    if ($btn_edit)
                                                        echo "<a class='dropdown-item' href='" . pg . "/editar/edit_niv_aces?id=" . $row_niv_aces['id'] . "'>editar</a>";
                                                    if ($btn_apagar)
                                                        echo "<a class='dropdown-item' href='" . pg . "/processa/apagar_niv_aces' data-toggle='modal' data-target='#modalApagar'>Apagar</a>";
                                                    ?>



                                                </div>
                                            </div>
                                        </td>
                                    </tr>
        <?php
    }
    ?>

                            </tbody>
                        </table>
                        <?php
                        $result_pg = "SELECT COUNT(id) AS num_result FROM adms_niveis_acessos WHERE ordem >= '" . $_SESSION['ordem'] . "'";
                        $resultado_pg = mysqli_query($conn, $result_pg);

                        $row_pg = mysqli_fetch_assoc($resultado_pg);

                        //echo $row_pg['num_result'];

                        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

                        //Limitar link antes e depois

                        $max_links = 2;
                        echo " <nav aria-label='paginacao'>";
                        echo "<ul class='pagination pagination-sm justify-content-center'>";
                        echo "<li class='page-item'>";
                        echo "<a class='page-link' href='" . pg . "/listar/list_niv_aces?pagina=1' tabindex='-1'>Primeira</a>";
                        echo "</li>";


                        for ($pag_ant = $pagina_atual - $max_links; $pag_ant <= $pagina - 1; $pag_ant++) {

                            if ($pag_ant >= 1) {
                                echo "<li class='page-item'><a class='page-link' href='" . pg . "/listar/list_niv_aces?pagina=$pag_ant'>$pag_ant</a></li>";
                            }
                        }


                        echo "<li class='page-item active'>";
                        echo "<a class='page-link' href='#'>$pagina_atual</a>";
                        echo "</li>";




                        for ($pag_dep = $pagina_atual + 1; $pag_dep <= $pagina + $max_links; $pag_dep++) {
                            if ($pag_dep <= $quantidade_pg) {
                                echo "<li class='page-item'><a class='page-link' href='" . pg . "/listar/list_niv_aces?pagina=$pag_dep'>$pag_dep</a></li>";
                            }
                        }

                        echo "<li class='page-item'>";
                        echo "<a class='page-link' href='" . pg . "/listar/list_niv_aces?pagina=$quantidade_pg'>Ultima</a>";
                        echo "</li>";
                        echo "</ul>";
                        echo "</nav>";
                        ?> 
                    </div>   
    <?php
} else {
    ?>
                    <div class="alert alert-danger" role="alert">
                        Nenhum registro encontrado!
                    </div> 
    <?php
}
?>

            </div>    
        </div>
<?php
include_once 'app/adms/include/rodape_lib.php';
?>

    </div>
</body>
