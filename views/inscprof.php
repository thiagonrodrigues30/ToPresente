<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>To Presente</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    
    <!-- Personal css file -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/navbar-style.css" />


</head>
<body>
    <!-- Corpo do Site -->
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-10 col-md-offset-1"> 
                    <h1 style="color: black">
                        Inscreva-se
                    </h1>
                    <HR width="100%" align="center" class="hr" noshade/>
                        
                    <h5>*Os dados inseridos no registro não poderão ser alterados depois</h5>
                <form>
            </br>
            <h4>Nome Completo:</h4>
            <input class="input" width="200px" type="text" name="Nome Completo" required>
            </br>
            <h4>Email:</h4>
            <input class="input" width="200px" type="text" name="Email" required>
            </br>
            <h4>Local de Ensino:<h4>
            <select class="input">
                <option>Universidade Federal do Ceará (UFC)</option>
                <option>Universidade Estadual do Ceará (UECE)</option>
                <option>Universidade de Fortaleza (Unifor)</option>
            </select>
            </br>
            <h4>Senha:</h4>
            <input class="input" width="200px" type="text" name="Senha" required>
            </br>
            <h4>Repetir Senha:</h4>
            <input class="input" width="200px" type="text" name="Senha" required>
            </br>
            <center>
            <button class="btn btn-primary button">Registrar</button>
            </center>
            </div>
        
    </div>


</body>
</html>