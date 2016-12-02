<!DOCTYPE html>
<head></head>
<body>
    <?php include 'Template.php'; ?>
    <div class="col-lg-offset-1">
        <div class="container">
            <div class="col-sm-11">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <?php
                        if (isset($_GET['categoria'])) {
                            echo '<div class="alert-danger form-control">Categoria Adicionada</div>';
                        } 
                        else if (isset($_GET['curso'])) {
                            echo '<div class="alert-danger form-control">Curso Adicionado</div>';
                        } 
                        else if (isset ($_GET['alerta'])) {
                            echo '<div class="alert-danger form-control">Preencha Todos Os Campos</div>';
                        }
                        ?>
                    </div>
                    <form class="form-horizontal jumbotron" action="FuncaoCursoCategoria.php" method="POST">
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
                                    <input class="form-control" name="valor" placeholder="Digite O Valor Para O Curso" type="text" pattern="[0-9].[0-9][0-9]">
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
    </div>


    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Cadastrar Categoria</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" action="index.php" method="POST">
                        <div class="form-group">
                            <label for="titulo" class="col-lg-3 control-label">Titulo :</label>
                            <div class="col-lg-6">
                                <input class="form-control" name="nome" placeholder="Digite Nome Para A Categoria" type="text">
                            </div>
                            <button type="submit" class="btn btn-success" name="adicionar">Cadastrar</button>
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
