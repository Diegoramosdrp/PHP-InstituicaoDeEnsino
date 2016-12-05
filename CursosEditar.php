<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    include 'template.php';




    if (isset($_POST['alterar'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];
        $alterar_curso = $conecao->prepare('UPDATE `cursos` SET `titulo_curso` = :ptitulo, `descricao_curso` = :pdescricao, `valor_curso` = :pvalor, `id_categoria` = :pcategoria WHERE `cursos`.`id_curso` = :pid');
        $alterar_curso->bindValue(':ptitulo', $titulo);
        $alterar_curso->bindValue(':pdescricao', $descricao);
        $alterar_curso->bindValue(':pvalor', $valor);
        $alterar_curso->bindValue(':pcategoria', $categoria);
        $alterar_curso->bindValue(':pid', $id);
        $alterar_curso->execute();
        header('location:CursosDetalhes.php?id='.$id);
    }

    $id = $_GET['id'];
    $Busca_Curso = $conecao->prepare('SELECT * FROM `cursos` WHERE `id_curso` = :pid');
    $Busca_Curso->bindValue(':pid', $id);
    $Busca_Curso->execute();
    $row = $Busca_Curso->fetch();
    ?>

    <div class="col-lg-offset-1">
        <div class="container">
            <div class="col-sm-11">
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET['categoria'])) {
                        echo '<div class="alert-danger form-control">Categoria Adicionada</div>';
                    } else if (isset($_GET['curso'])) {
                        echo '<div class="alert-danger form-control">Curso Adicionado</div>';
                    } else if (isset($_GET['alerta'])) {
                        echo '<div class="alert-danger form-control">Preencha Todos Os Campos</div>';
                    }
                    ?>
                </div>
                <form class="form-horizontal jumbotron" action="CursosEditar.php" method="POST">
                    <fieldset>
                        <legend>Editar Curso</legend>
                        <input type="hidden" name="id" value="<?php echo $row['id_curso'] ?>"/>
                        <div class="form-group">
                            <label for="titulo" class="col-lg-3 control-label">Titulo :</label>
                            <div class="col-lg-6">
                                <input class="form-control" name="titulo" placeholder="Digite Titulo Para O Curso" type="text" value="<?php echo $row['titulo_curso']; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="col-lg-3 control-label">Descrição :</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" rows="8" name="descricao" placeholder="Digite A Descrição"><?php echo $row['descricao_curso']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="valor" class="col-lg-3 control-label">Valor :</label>
                            <div class="col-lg-6">
                                <input class="form-control" name="valor" placeholder="Digite O Valor Para O Curso" type="text" value="<?php echo $row['valor_curso']; ?>">
                                <span class="help-block">Digite O Valor Para O Curso Em Reais.</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="categoria" class="col-lg-3 control-label">Categoria :</label>
                            <div class="col-lg-6">
                                <select class="form-control" name="categoria">
                                    <option>-- Selecione Categoria --</option>
                                    <?php
                                    $buscar_categorias = $conecao->prepare('SELECT * FROM `categoria`');
                                    $buscar_categorias->execute();

                                    while ($rows = $buscar_categorias->fetch()) {
                                        ?>
                                        <option value="<?php echo $rows['id_cat']; ?>"
                                        <?php
                                        if ($rows['id_cat'] == $row['id_categoria']) {
                                            echo 'selected';
                                        }
                                        ?>>
                                                    <?php echo $rows['nome_cat']; ?>
                                        </option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">+</button>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12 control-label">
                                <button type="submit" class="btn btn-success" name="alterar">Alterar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar Categoria</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="CursosCadastro.php" method="POST">
                        <div class="form-group">
                            <label for="titulo" class="col-lg-3 control-label">Titulo :</label>
                            <div class="col-lg-6">
                                <input class="form-control" name="nome" placeholder="Digite Nome Para A Categoria" type="text">
                            </div>
                            <button type="submit" class="btn btn-success" name="cadastrarcategoria">Cadastrar</button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
