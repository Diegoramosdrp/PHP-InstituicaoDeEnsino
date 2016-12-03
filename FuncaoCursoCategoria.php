<?php include 'Config.php'; ?>
<!-- Adicionar Categoria -->
<?php
if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];

    if ($nome == NULL) {
        header('location:CursosCadastro.php?alerta');
    } 
    else {        
        $adiciona_categoria = $conecao->prepare('INSERT INTO `categoria` (`id_cat`, `nome_cat`) VALUES (NULL, :pnome);');
        $adiciona_categoria->bindValue(':pnome', $nome);
        $adiciona_categoria->execute();
        header('location:CursosCadastro.php?categoria');
    }
}
?>

<!-- Adicionar Curso -->
<?php
if (isset($_POST['cadastrarcurso'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $valor = $_POST['valor'];
    $categoria = $_POST['categoria'];

    if ($titulo == NULL || $descricao == NULL || $valor == NULL || $categoria == NULL) {
        header('location:CursosCadastro.php?alerta');
    } 
    else {
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