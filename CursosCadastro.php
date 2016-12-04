<!DOCTYPE html>
<head></head>
<body>
    <?php
    include 'Template.php';
    //Adicionar Categoria
    if (isset($_POST['cadastrarcategoria'])) {
        $nome = $_POST['nome'];

        if ($nome == NULL) {
            header('location:CursosCadastro.php?alerta');
        } else {
            $adiciona_categoria = $conecao->prepare('INSERT INTO `categoria` (`id_cat`, `nome_cat`) VALUES (NULL, :pnome);');
            $adiciona_categoria->bindValue(':pnome', $nome);
            $adiciona_categoria->execute();
            header('location:CursosCadastro.php?categoria');
        }
    }

    //Adicionar Curso
    if (isset($_POST['cadastrarcurso'])) {
        $titulo = $_POST['titulo'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];

        if ($titulo == NULL || $descricao == NULL || $valor == NULL || $categoria == NULL) {
            header('location:CursosCadastro.php?alerta');
        } else {
            $adiciona_curso = $conecao->prepare('INSERT INTO `cursos` (`id_curso`, `titulo_curso`, `descricao_curso`, `valor_curso`, `id_categoria`) VALUES (NULL, :ptitulo, :pdescricao, :pvalor, :pcategoria);');
            $adiciona_curso->bindValue(':ptitulo', $titulo);
            $adiciona_curso->bindValue(':pdescricao', $descricao);
            $adiciona_curso->bindValue(':pvalor', $valor);
            $adiciona_curso->bindValue(':pcategoria', $categoria);
            $adiciona_curso->execute();
            header('location:CursosCadastro.php?curso');
        }
    }
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
                <form class="form-horizontal jumbotron" action="CursosCadastro.php" method="POST">
                    <fieldset>
                        <legend>Cadastrar Curso</legend>
                        <div class="form-group">
                            <label for="titulo" class="col-lg-3 control-label">Titulo :</label>
                            <div class="col-lg-6">
                                <input class="form-control" name="titulo" placeholder="Digite Titulo Para O Curso" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="descricao" class="col-lg-3 control-label">Descrição :</label>
                            <div class="col-lg-6">
                                <textarea class="form-control" rows="8" name="descricao" placeholder="Digite A Descrição"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="valor" class="col-lg-3 control-label">Valor :</label>
                            <div class="col-lg-6">
                                <input class="form-control" name="valor" placeholder="Digite O Valor Para O Curso" type="text">
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

                                    while ($row = $buscar_categorias->fetch()) {
                                        echo '<option value=' . $row[id_cat] . '>' . $row[nome_cat] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#myModal">+</button>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-12 control-label">
                                <button type="submit" class="btn btn-success" name="cadastrarcurso">Cadastrar</button>
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