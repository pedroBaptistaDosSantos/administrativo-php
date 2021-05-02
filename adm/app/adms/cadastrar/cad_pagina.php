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
                        <h2 class="display-4 titulo">Cadastrar Página</h2>
                    </div>    

                    <div class="p-2">
                        <?php
                        $btn_list = carregar_btn('listar/list_pagina', $conn);
                        if ($btn_list) {
                            echo "<a href='" . pg . "/listar/list_pagina' class='btn btn-outline-info btn-sm'>Listar </a>   ";
                        }
                        ?>                     
                    </div>
                </div> <hr>
                <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
                ?>
                <form class="text-left" method="POST" action="<?php echo pg; ?>/processa/proc_cad_pagina">
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label> <span class="text-danger">*</span> Nome</label>
                            <input name="nome_pagina" type="nome" class="form-control" id="nome" placeholder="Nome da página">
                        </div>
                        <div class="form-group col-md-4">
                            <label> <span class="text-danger">*</span>Endereco</label>
                            <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Endereço da página, ex: listar/list_pagina">
                        </div>
                        <div class="form-group col-md-3">
                            <label>Icone</label>
                            <input name="icone" type="text" class="form-control" id="icone" placeholder="icone da página">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Observação</label>
                        <textarea name="obs"  class="form-control" ></textarea>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label> <span class="text-danger">*</span> Palavra Chave</label>
                            <input name="keywords" type="text" class="form-control" id="keywords" placeholder="Palavra chave">
                        </div>
                        <div class="form-group col-md-4">
                            <label> <span class="text-danger">*</span>Descrição</label>
                            <input name="description" type="text" class="form-control" id="descricao" placeholder="Descrição da página">
                        </div>
                        <div class="form-group col-md-3">
                            <label><span class="text-danger">*</span>Autor</label>
                            <input name="author" type="text" class="form-control" id="autor" placeholder="Desenvolvedor">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label> <span class="text-danger">*</span> Indexar</label>
                            <select name="adms_robots_id" id="adms_robots_id" class="form-control">
                                <option selected>Selecione</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label> <span class="text-danger">*</span>Página Pública</label>
                            <select name="lib_pub" id="lib_pub" class="form-control">
                                <option selected>Selecione</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label><span class="text-danger">*</span>Página Dependente</label>
                            <select name="depend_pg" id="depend_pg" class="form-control">
                                <option selected>Selecione</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label> <span class="text-danger">*</span> Grupo</label>
                            <select name="adms_robots_id" id="adms_robots_id" class="form-control">
                                <option selected>Selecione</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label> <span class="text-danger">*</span>Tipo</label>
                            <select name="lib_pub" id="lib_pub" class="form-control">
                                <option selected>Selecione</option>
                                <option>...</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label><span class="text-danger">*</span>Situação</label>
                            <select name="adms_sits_pg_id" id="adms_sits_pg_id" class="form-control">
                                <option selected>Selecione</option>
                                <option>...</option>
                            </select>
                        </div>
                    </div>

                    <p>
                        <span class="text-danger">*</span> Campo Obrigatorio
                    </p>
                    <input name="SendCadNivAc" type="submit" class="btn btn-success" value="Cadastrar">
                </form>    
            </div>    
        </div>
        <?php
        include_once 'app/adms/include/rodape_lib.php';
        ?>

    </div>
</body>
