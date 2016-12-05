<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    include 'Template.php';

    $id = $_GET['id'];
    $Busca_Curso = $conecao->prepare('SELECT * FROM cursos WHERE `id_curso` = :pid');
    $Busca_Curso->bindValue(':pid', $id);
    $Busca_Curso->execute();
    $row = $Busca_Curso->fetch();
    
    
    if (isset($_GET['Excluir'])) {
            $id = $_GET['id'];
            $excluir_curso = $conecao->prepare('DELETE FROM `cursos` WHERE `cursos`.`id_curso` = :pid');
            $excluir_curso->bindValue(':pid', $id);
            $excluir_curso->execute();
            header('location:Cursos.php');
        }
    ?>

    <div class="col-lg-offset-1">
        <div class="container">
            <div class="col-sm-11 jumbotron">
                <h2><?php echo $row['titulo_curso']; ?></h2>
                <blockquote class="text-justify">
                    <p>
                        <?php echo $row['descricao_curso']; ?>
                    </p>
                </blockquote>
                <h5>Valor : R$ <?php echo $row['valor_curso']; ?></h5>
                <hr>
                <a href="CursosEditar.php?id=<?php echo $row['id_curso']; ?>"><img src = "./Imagens/Editar.png" style="width:25px"></a>
                <a href="Cursos.php?Excluir&id=<?php echo $row['id_curso']; ?>" ><img src = "./Imagens/Excluir.png" style="width:25px"></a>
            </div>
        </div>
    </div>
</body>
</html>
