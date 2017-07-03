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
                    <li  class="active">
                        <a href="#">
                            <i class="fa fa-sign-in"></i><span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                            Início
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
        <div class="row">
           <div class="col-xs-6">
                <center>
                <button type="button" class="btn btn-success button" data-toggle="modal" data-target="#myModal">+Turma</button>
                </center>
            </div>
            <div class="col-xs-6">
                <center>
                <button type="button" class="btn btn-danger button" data-toggle="modal" data-target="#myModalDel">-Turma</button>
                </center>
            </div>
        </div>
        <h2>Turmas</h2>
        <HR width="100%" align="center" class="hr" noshade/>
        </br>
        
        <?php if($turmas->numTurmas == 0){ ?>

            <center><p>Você ainda não cadastrou nenhuma turma.</p></center>

        <?php } else { foreach($turmas->listaTurmas as $turma): ?>

            <a class="link-turma" href="consultar-turma-prof.php?id=<?php echo $turma['turma_id'] ?>"><?php echo $turma['turma_cod'] . " - " . $turma['turma_nome']; ?></a>
            </br>

        <?php endforeach; } ?>


        <!-- Modal para criar nova turma -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">   
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Nova Turma</h4>
                  </div>
                  <form method="post" action="pagina-inicial-professor.php" name="loginform">
                        <div class="modal-body">
                        
                            <div class="form-group"><br>
                                <label for="codigo">Codigo da Turma:</label>
                                <input id="codigo" class="form-control" type="text" name="cod_turma" required style="width: 100%;" />
                            </div>

                            <div class="form-group"><br>
                                <label for="nome">Nome da Turma (Disciplina):</label>
                                <input id="nome" class="form-control" type="text" name="turma_nome" required style="width: 100%;" />
                            </div>

                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-primary"  name="nova_turma" value="Criar Turma"/>
                      </div>
                  </form>
                </div>
              </div>
            </div>



            <!-- Modal para deletar turma -->
            <div class="modal fade" id="myModalDel" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">   
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Deletar Turmas</h4>
                  </div>
                  <form method="post" action="pagina-inicial-professor.php" name="loginform">
                        <div class="modal-body">
                            <p>Selecione a turma que deseja deletar:</p>

                            <?php if($turmas->numTurmas == 0){ ?>

                                <center><p>Você ainda não cadastrou nenhuma turma.</p></center>

                            <?php } else { foreach($turmas->listaTurmas as $turma): ?>
                                <p>
                                <input type="radio" name="delete_id" value="<?php echo $turma['turma_id']; ?>"> <?php echo $turma['turma_cod'] . " - " . $turma['turma_nome']; ?>
                                </p>
                                
                            <?php endforeach; } ?>
                        

                        </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <input type="submit" class="btn btn-danger"  name="deletar" value="Deletar Turma"/>
                      </div>
                  </form>
                </div>
              </div>
            </div>

    </div>
</div>
</body>