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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/navbar-style.css" />

    <script type="text/javascript">
            $( document ).ready( function() {
                  mostraDivMatricula(1);
                });

            function mostraDivMatricula(valor)
            {
                if (valor == 1)
                {
                    document.getElementById("div-matricula").style.display = "none";
                    document.getElementById("login_input_user_mat").required = false; 
                }
                else
                {
                    document.getElementById("div-matricula").style.display = "block";
                    document.getElementById("login_input_user_mat").required = true; 
                }
            }
        </script>
</head>
<body>
    
    <!-- Corpo do Site -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <h2>Inscreva-se</h2>

                <HR width="100%" align="center" class="hr" noshade/><br>

                <?php
                            // show potential errors / feedback (from registration object)
                            if (isset($registration)) {
                                if ($registration->errors) {
                                    foreach ($registration->errors as $error) {
                                        echo '<div class="alert alert-warning" role="alert">'. $error .'</div>';
                                    }
                                }
                                if ($registration->messages) {
                                    foreach ($registration->messages as $message) {
                                        echo '<div class="alert alert-success" role="alert">'. $message .'</div>';
                                    }
                                }

                            }
                        ?>

                <!-- register form -->
                <form method="post" action="register.php" name="registerform">

                    <div class="form-group" id="tipo_usuario_form" >
                        <label for="tipo">Tipo de Usuário</label>
                        <select id="tipo" class="form-control" name="tipo" onchange="mostraDivMatricula(this.value)">
                            <option value="1" selected>Professor</option>
                            <option value="2">Aluno</option>
                        </select><br>                            
                    </div>

                    <!-- the user name input field uses a HTML5 pattern check -->
                    <div class="form-group">
                        <label for="login_input_username">Nome Completo:</label>
                        <input id="login_input_username" class="login_input form-control" type="text" name="user_name" required /><br>
                    </div>

                    <!-- the email input field uses a HTML5 email type check -->
                    <div class="form-group">
                        <label for="login_input_email">Email:</label>
                        <input id="login_input_email" class="login_input form-control" type="email" name="user_email" required /><br>
                    </div>

                    <div class="form-group">
                        <label for="instituicao">Instituição de Ensino:</label>
                        <select id="instituicao" class="form-control" name="instituicao" >
                            <?php //foreach instituicao ?>
                            <?php foreach($registration->instituicoesList as $instituicao): ?>
                                <option value="<?php echo $instituicao['inst_id']; ?>"><?php echo $instituicao['inst_nome']; ?></option>
                            <?php endforeach; ?>
                        </select><br>                 
                    </div>

                    <div class="form-group" id="div-matricula">
                        <label for="login_input_user_mat">Número de Matricula:</label>
                        <input id="login_input_user_mat" class="login_input form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="matricula" /><br>
                    </div>

                    <div class="form-group">
                        <label for="login_input_password_new">Senha (min. 6 characters)</label>
                        <input id="login_input_password_new" class="login_input form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" /><br>
                    </div>

                    <div class="form-group">
                        <label for="login_input_password_repeat">Repetir Senha:</label>
                        <input id="login_input_password_repeat" class="login_input form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" /><br>
                    </div>
                    
                    <center>
                        <input type="submit" class="btn btn-lg btn-primary btn-sucess"  name="register" value="Registrar" /><br>
                    </center>

                </form>

                <!-- backlink -->
                <center>
                    <br><a href="index.php">Voltar para página de login</a><br><br>
                </center>
            
            </div>
        </div>
    </div>


</body>
</html>