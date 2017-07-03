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
                            Consultar Turmaa
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

<div class="container-fluid" style="margin-top: 70px">
    <div  class="col-md-10 col-md-offset-1">
        <h2><?php echo $consultarTurma->turma->turma_cod . " - " . $consultarTurma->turma->turma_nome; ?></h2>
        <HR width="100%" align="center" class="hr" noshade/>
        </br>
        <table>
            <thead>
            <tr>
                <th>Matricula</th>
                <th>Aluno</th>
                <!-- Inserindo a data das aulas dinamicamente -->
                <?php foreach($consultarTurma->listaAulas as $aula): ?>

                    <th><center><?php echo date('d/m', strtotime($aula['tempo_inicio'])); ?></center></th>

                <?php endforeach; ?>

            </tr>
            </thead>
            <tbody>

                <!-- Inserindo as presencas e faltas dinamicamente -->
                <?php foreach($consultarTurma->listaPresencas as $presenca): ?>

                    <tr>
                        <td><?php echo $presenca['user_mat']; ?></td>
                        <td><?php echo $presenca['user_name']; ?></td>

                        <!-- Marcando as presencas e as faltas na tabela -->
                        <?php
                            $vetor_presenca = unserialize($presenca['presenca_vetor']);

                            for($i = 0 ; $i < $consultarTurma->numAulas; $i++) { ?>
                                <td>
                                    <center>
                                        <input type="checkbox" disabled <?php if ($vetor_presenca[$i] == 1){echo 'checked';} ?> >
                                    </center>
                                </td>
                            

                            <?php }    
                        ?>

                    </tr>

                <?php endforeach; ?>


            </tbody>
        </table><br>

        <div class="col-md-10 col-md-offset-1">
            <div class="col-md-9">
                <?php 

                    if($consultarTurma->numAulas == 0)
                    {
                        $link = "#";
                    }
                    else
                    {
                        $link = "info-ult-aula.php?id=" . $consultarTurma->turma->turma_id;
                    }

                ?>
                <a class="link-info" href="<?php echo $link; ?>">Ver informações da ultima aula</a>
            </div>
            <div class="col-md-3">
                <center>
                <button type="button" class="btn btn-success btn-nova-aula" data-toggle="modal" data-target="#myModal">Nova Aula</button>
                </center>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">   
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nova Aula</h4>
                  </div>
                  <form method="post" action="consultar-turma-prof.php?id=<?php echo $consultarTurma->turma->turma_id; ?>" name="loginform">
                        <div class="modal-body">
                        

                            <div class="form-group"><br>
                                <label for="data">Data:</label>
                                <input id="data" class="form-control" type="date" name="data" required style="width: 100%;" />
                            </div>

                            <div class="form-group"><br>
                                <label for="hora-inicio">Hora Início:</label>
                                <input id="hora-inicio" class="form-control" type="time" name="hora_inicio" required style="width: 100%;" />
                            </div>

                            <div class="form-group"><br>
                                <label for="hora-fim">Hora Fim:</label>
                                <input id="hora-fim" class="form-control" type="time" name="hora_fim" required style="width: 100%;" />
                            </div>
                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary"  name="nova_aula" value="Criar Aula"/>
                      </div>
                  </form>
                </div>
              </div>
            </div>

        </div>
    </div>
</div>
</body>