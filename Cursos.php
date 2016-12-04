<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include 'template.php';

        $lista_cursos = $conecao->prepare('SELECT * FROM `cursos`');
        $lista_cursos->execute();

        while ($row = $lista_cursos->fetch()) {
            ?>
            <div class="col-lg-12">
                <?php
                if (isset($_GET['excluir'])) {
                    echo '<div class="alert-danger form-control">Categoria Adicionada</div>';
                } else if (isset($_GET['sim'])) {
                    echo '<div class="alert-danger form-control">Curso Adicionado</div>';
                } else if (isset($_GET['nao'])) {
                    echo '<div class="alert-danger form-control">Preencha Todos Os Campos</div>';
                }
                ?>
            </div>
            <div class="container">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <a href="CursosDetalhes.php?id=<?php echo $row['id_curso']; ?>"><?php echo $row['titulo_curso']; ?></a>
                            </h3>
                        </div>
                        <div class="panel-body text-justify">
    <?php echo $row['descricao_curso']; ?>
                        </div>
                        <div class="panel-footer text-right">
                            <img src = "./Imagens/Editar.png" style="width:25px">
                            <img src = "./Imagens/Excluir.png" style="width:25px">
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
    </body>
</html>
