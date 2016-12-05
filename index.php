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


        if (isset($_GET['Sim'])) {
            $id = $_GET['id'];
            $excluir_curso = $conecao->prepare('DELETE FROM `cursos` WHERE `cursos`.`id_curso` = :pid');
            $excluir_curso->bindValue(':pid', $id);
            $excluir_curso->execute();
            header('location:Cursos.php');
        }
        ?>
        <br>
        <?php
        while ($row = $lista_cursos->fetch()) {
            ?>
            <div class="container">
                <div class="col-md-8">
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
                            <a href="Cursos.php?id=<?php echo $row['id_curso']; ?>"><img src = "./Imagens/Editar.png" style="width:25px"></a>
                            <a href="Cursos.php?Sim&id=<?php echo $row['id_curso']; ?>" ><img src = "./Imagens/Excluir.png" style="width:25px"></a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </body>
</html>