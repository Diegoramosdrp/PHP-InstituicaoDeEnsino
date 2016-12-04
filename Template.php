<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>UniversityExpert</title>
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <?php
        include "Config.php";
    ?>
</head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">UNIVERSITY EXPERT</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="Cursos.php">Cursos</a></li>
                    <li><a href="Contato.php">Contato</a></li>
                    <li><a href="Sobre.php">Sobre</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Gerenciamento <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="CursosCadastro.php">Cadastrar Curso</a></li>
                            <li><a href="login.php">Alterar Login</a></li>
                        </ul>
                    </li>
                    <li><a href="login.php">Entrar</a></li>
                </ul>
            </div>
        </div>
    </nav>
</body>
</html>