<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
</head>
<body>
    <?php
    include 'template.php';

    $buscar_categorias = $conecao->prepare('SELECT * FROM `categoria`');
    $buscar_categorias->execute();

    if (isset($_GET['Excluir'])) {
        $id = $_GET['id'];

        $excluir_categoria = $conecao->prepare('DELETE FROM `categoria` WHERE `categoria`.`id_cat` = :pid');
        $excluir_categoria->bindValue(':pid', $id);
        $excluir_categoria->execute();

        $excluir_categoria_curso = $conecao->prepare('UPDATE `cursos` SET `id_categoria` = :pidalt WHERE `cursos`.`id_categoria` = :pid');
        $excluir_categoria_curso->bindValue(':pid', $id);
        $excluir_categoria_curso->bindValue(':pidalt', 0);
        $excluir_categoria_curso->execute();

        header('location:CategoriasDetalhes.php');
    }
    
    if (isset($_POST['alterar'])) {
        $idcat = $_POST['id'];
        $nomecat = $_POST['nome'];
        
        $alterar_categoria = $conecao->prepare('UPDATE `categoria` SET `nome_cat` = :pnome WHERE `categoria`.`id_cat` = :pid');
        $alterar_categoria->bindValue(':pnome',$nomecat);
        $alterar_categoria->bindValue(':pid',$idcat);
        $alterar_categoria->execute();
        header('location:CategoriasDetalhes.php');
    }
    if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $Busca_Curso = $conecao->prepare('SELECT * FROM `categoria` WHERE `id_cat` = :pid');
    $Busca_Curso->bindValue(':pid', $id);
    $Busca_Curso->execute();
    $row = $Busca_Curso->fetch();
}
    ?>
    
        <div class="col-lg-offset-1">
        <div class="container">
            <div class="col-sm-11">
                <div class="col-lg-6">
                    <form class="form-horizontal" action="CategoriasDetalhes.php" method="POST">
                        <div class="form-group">
                            <input type="hidden" name="id" value="<?php echo $row['id_cat'] ?>"/>
                            <label for="titulo" class="col-lg-3 control-label">Titulo :</label>
                            <div class="col-lg-6">
                                <input class="form-control" name="nome" placeholder="Selecione Alterar Para Exibir" type="text" value="<?php echo $row['nome_cat'];?>">
                            </div>
                            <button type="submit" class="btn btn-success" name="alterar">Alterar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <div class="col-lg-offset-1">
        <div class="container">
            <div class="col-sm-11">
                <div class="col-lg-6">
                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Categoria</th>
                                <th>Gerenciar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = $buscar_categorias->fetch()) {
                                ?>
                                <tr class="active">
                                    <td><?php echo $row['id_cat']; ?></td>
                                    <td class="col-sm-12"><?php echo $row['nome_cat']; ?></td>
                                    <td class="col-sm-2 text-center">
                                        <a href="CategoriasDetalhes.php?Alterar&id=<?php echo $row['id_cat']; ?>"><img src = "./Imagens/Editar.png" style="width:25px"></a>
                                        <a href="CategoriasDetalhes.php?Excluir&id=<?php echo $row['id_cat']; ?>" ><img src = "./Imagens/Excluir.png" style="width:25px"></a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>