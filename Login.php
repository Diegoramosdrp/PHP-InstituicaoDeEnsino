<!DOCTYPE html>
<head>
</head>
<body>
    <?php
    include 'Template.php';

    //Adicionar Login De Usuário
    if (isset($_POST['cadastrar'])) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];
        $confirmasenha = $_POST['confirmarsenha'];

        if ($usuario == NULL || $senha == NULL || $confirmasenha == NULL) {
            header('location:login.php?alerta');
        } else {
            if (strcmp($senha, $confirmasenha) == 0) {
                $adiciona_login = $conecao->prepare('INSERT INTO `login` (`id_login`, `usuario_login`, `senha_login`) VALUES (NULL, :pusuario, MD5(:psenha));');
                $adiciona_login->bindValue(':pusuario', $usuario);
                $adiciona_login->bindValue(':psenha', $senha);
                $adiciona_login->execute();
                header('Location:login.php?alerta');
            } else {
                header('Location:login.php?senhainvalida');
            }
        }
    }

    //Logar
    if (isset($_POST['logar'])) {
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

        if ($usuario == NULL || $senha == NULL) {
            header('Location:login.php?alerta');
        } else {
            $procurar_login = $conecao->prepare('SELECT * FROM `login` WHERE `usuario_login` = :pusuario and `senha_login` = :psenha;');
            $procurar_login->bindValue(':pusuario', $usuario);
            $procurar_login->bindValue(':psenha', md5($senha));
            $procurar_login->execute();

            if ($procurar_login->rowCount() == 0) {
                header('Location:login.php?logininvalido');
            } else {
                header('Location:index.php');
            }
        }
    }
    ?>
    <div class="col-lg-offset-1">
        <div class="container">
            <div class="col-sm-11">
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET['senhainvalida'])) {
                        echo '<div class="alert-danger form-control">A Senhas Não Conferem</div>';
                    } else if (isset($_GET['logininvalido'])) {
                        echo '<div class="alert-danger form-control">Login Invalido</div>';
                    } else if (isset($_GET['alerta'])) {
                        echo '<div class="alert-danger form-control">Preencha Todos Os Campos</div>';
                    }
                    ?>
                </div>
                <div class="jumbotron">
                    <form class="form-horizontal" action="login.php" method="POST" style="">
                        <fieldset>
                            <legend>Logar</legend>
                            <div class="form-group">
                                <label for="usuario" class="col-lg-6 control-label">Usuário :</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="usuario" placeholder="Digite Usuário" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="senha" class="col-lg-6 control-label">Senha :</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="senha" placeholder="Digite Senha" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 control-label">
                                    <button type="submit" class="btn btn-success" name="logar">Entrar</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>


                    <form class="form-horizontal" action="login.php" method="POST">
                        <fieldset>
                            <legend>Cadastrar-se</legend>
                            <div class="form-group">
                                <label for="usuario" class="col-lg-6 control-label">Usuário :</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="usuario" placeholder="Digite Usuário" type="text">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="senha" class="col-lg-6 control-label">Senha :</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="senha" placeholder="Digite Senha" type="password">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="senhaconfirma" class="col-lg-6 control-label">Confirmar Senha :</label>
                                <div class="col-lg-6">
                                    <input class="form-control" name="confirmarsenha" placeholder="Confirmar Senha" type="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12 control-label">
                                    <button type="submit" class="btn btn-success" name="cadastrar">Cadastrar</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>