<!-- Adicionar Login De Usuário -->
<?php
if (isset($_POST['cadastrar'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $confirmasenha = $_POST['confirmarsenha'];

    if (strcmp($senha, $confirmasenha) == 0) {
        $adiciona_login = $conecao -> prepare('INSERT INTO `login` (`id_login`, `usuario_login`, `senha_login`) VALUES (NULL, :pusuario, MD5(:psenha));');
        $adiciona_login->bindValue('pusuario', $usuario);
        $adiciona_login->bindValue('psenha', $senha);
        $adiciona_login->execute();
    } else {
        header('Location:login.php?senhainvalida');
    }
}
?>

<!-- Logar -->
<?php
if (isset($_POST['entrar'])) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    $procurar_login = $conecao -> prepare('SELECT * FROM `login` WHERE `usuario_login` = `p` and `senha_login` = md5(:psenha);');
    $procurar_login -> bindValue('pusuario', $usuario);
    $procurar_login -> bindValue('psenha', $senha);
    $procurar_login -> execute();
    
    if ($procurar_login -> rowCount() == 0) {
        header('Location:login.php?logininvalido');
    }
    else {
        header('Location:index.php');
    }
}
?>
