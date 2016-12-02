<!DOCTYPE html>
<head>
</head>
<body>
    <?php include 'Template.php'; ?>
    <div class="col-lg-offset-1">
        <div class="container">
            <div class="col-sm-11">
                <div class="col-lg-12">
                    <?php
                    if (isset($_GET['senhainvalida'])) {
                        echo '<div class="alert-danger form-control">A Senhas Não Conferem</div>';
                    } 
                    else if (isset ($_GET['logininvalido'])) {
                        echo '<div class="alert-danger form-control">Login Invalido</div>';
                    }
                    ?>
                </div>
                <div class="jumbotron">
                    <form class="form-horizontal" action="index.php" method="POST" style="">
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
                                    <button type="submit" class="btn btn-success" name="entrar">Entrar</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>


                    <form class="form-horizontal" action="index.php" method="POST">
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
