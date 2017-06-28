<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>To Presente</title>
    <!-- Jquery -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.min.js"
      integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
    
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- Personal css file -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar-style.css" />

<body>
<!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand">To Presente</span>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="paginaPrincipal.php">
                            <i class="fa fa-sign-in"></i><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            Início
                        </a>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-sign-in"></i><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            Fulano
                        </a>
                    </li>
                    <li>
                        <a href="./index.php?logout">
                            <i class="fa fa-sign-in"></i><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
                            Sair
                        </a>
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </div>

<div class="container-fluid" style="margin-top: 50px">
    <div  class="col-md-10 col-md-offset-1">
        <div class="row">
           <div class="col-xs-6">
                <center>
                <button class="btn btn-success button">+Turma</button>
                </center>
            </div>
            <div class="col-xs-6">
                <center>
                <button class="btn btn-danger button">-Turma</button>
                </center>
            </div>
        </div>
        <h2>Turmas</h2>
        <HR width="100%" align="center" class="hr" noshade/>
        </br>
        <a class="link-turma" href="consultar-turma-prof.php">CK123-Arquitetura de Computadores</a>
        </br>
        <a class="link-turma" href="#">CK456-Redes de Computadores</a>
    </div>
</div>
</body>