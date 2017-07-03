<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>To Presente</title>
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
                        <a href="index.php">
                            <i class="fa fa-sign-in"></i><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            Início
                        </a>
                    </li>
                    <li class="active">
                        <a href="#">
                            <i class="fa fa-sign-in"></i><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            Informações Aula
                        </a>
                    </li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#">
                            <i class="fa fa-sign-in"></i><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                            <?php echo $_SESSION['user_name']; ?>
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

        <div class="col-xs-6" align="left">
            <a class="btn btn-success button" href="consultar-turma-prof.php?id=<?php echo $infoAula->turma->turma_id; ?>">Voltar</a>
        </div>
        <div class="col-xs-6" align="right">
            <a target="_blank" class="btn btn-success button" href="imprimir-aula.php?id=<?php echo $infoAula->turma->turma_id; ?>" >Imprimir</a>
        </div>
        <!--h2>CK123-Arquitetura de Computadores</h2-->
        <HR width="100%" align="center" class="hr" noshade/>
        <h1><?php echo $infoAula->turma->turma_cod . " - " . $infoAula->turma->turma_nome; ?></h1>      
        <h3>Data: <?php echo date('d/m/y', strtotime($infoAula->aula->tempo_inicio)); ?></h3>
        <h3>Horario: <?php echo date('H:i', strtotime($infoAula->aula->tempo_inicio)) . " às " . date('H:i', strtotime($infoAula->aula->tempo_fim)); ?></h3>
     
        <center>
            <img src="<?php echo 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='. $infoAula->aula->aula_id; ?>" alt="">
        <center>
     </div>
</div>

</body>