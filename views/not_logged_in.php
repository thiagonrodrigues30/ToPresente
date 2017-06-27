<?php
// show potential errors / feedback (from login object)
if (isset($login)) {
    if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }
    if ($login->messages) {
        foreach ($login->messages as $message) {
            echo $message;
        }
    }
}
?>

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



</head>
<body>
<script type="text/javascript">

    
    function mudarUsuario(op){

        if(op == 2)
        {
            $("#login-box").css("background-color","#7FFFD4");
        }
        else if(op == 1)
        {
            $("#login-box").css("background-color","#90EE90");
        }

        $("#user-type").val(op);
    }

</script>



<div class="row">
    <div class="col-md-4 col-md-offset-4">


        <div class="col-md-6 login-tab-prof">
            <a href="#" onclick="mudarUsuario(1)">
                <center>
                    Professor
                </center>
            </a>
        </div>
        <div class="col-md-6 login-tab-aluno">
            <a href="#" onclick="mudarUsuario(2)">
                <center>
                    Aluno
                </center>
            </a>
        </div>

        <div class="col-md-12 login-box" id="login-box">

            <!-- login form box -->
            <form method="post" action="index.php" name="loginform">
            
                <input id="user-type" type="hidden" value="1">

                <div class="col-md-12"><br>
                    <input id="login_input_username" class="login_input form-control" type="text" name="user_name" required placeholder="Email" style="width: 100%;" /><br>
                </div>

                <div class="col-md-8">
                    <input id="login_input_password" class="login_input form-control" type="password" name="user_password" autocomplete="off" required placeholder="Senha" style="width: 100%;" />
                </div>
                <div class="col-md-4">
                    <input type="submit" class="btn btn-primary"  name="login" value="Entrar" style="width: 100%;" />
                </div>

            </form>

            <div class="col-md-12"><br>
                <center>
                    <a href="register.php">Inscreva-se</a>
                </center>
            </div>
        </div>

    </div>

</div>

</body>
</html>