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
                    <a href="cadastrar.html">
                        <div class="p-2">
                            <button class="btn btn-outline-success btn-sm">
                                Cadastrar
                            </button>
                        </div>
                    </a>    
                </div> 
                <div class="alert alert-success" role="alert">
                    Usuário apagado com sucesso
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div> 
                <?php
                //receber numero da pagina
                $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
                $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                //setar quantidade de itens por pagina
                $qnt_result_pg = 10;

                //Calcular inicio da visualização
                $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

                $result_niv_aces = "SELECT * FROM adms_niveis_acessos WHERE ordem >= '" . $_SESSION['ordem'] . "' ORDER BY ordem ASC LIMIT $inicio, $qnt_result_pg";

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
                                        <td>
                                            <span class="d-none d-md-block">
                                                <a href="visualizar.html" class="btn btn-outline-primary btn-sm">Visualizar</a>
                                                <a href="editar.html" class="btn btn-outline-warning btn-sm">Editar</a>
                                                <a href="apagar.html" class="btn btn-outline-danger btn-sm"  data-toggle="modal" data-target="#modalApagar">Apagar</a>
                                            </span>    
                                            <div class="dropdown d-block d-md-none">
                                                <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Ações
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                                    <a class="dropdown-item" href="visualizar.html">Visualizar</a>
                                                    <a class="dropdown-item" href="editar.html">editar</a>
                                                    <a class="dropdown-item" href="apagar.html" data-toggle="modal" data-target="#modalApagar">Apagar</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                            </tbody>
                        </table>
                        <nav aria-label="paginacao">
                            <ul class="pagination pagination-sm justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Primeira</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">4</a></li>
                                <li class="page-item"><a class="page-link" href="#">5</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Ultima</a>
                                </li>
                            </ul>
                        </nav>
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
