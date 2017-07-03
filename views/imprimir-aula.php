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

    <script language="javascript" type="text/javascript">
        // Usar jquery pra imprimir quando o documento estiver pronto
        $(document).ready(function() {
  			window.print()
		});
    </script>
</head>
<body>
	
	<div id="cartao">
		<center><h2>Informações sobre a Aula</h2></center><br>
		<div id="info">
			
			<h2><?php echo $infoAula->turma->turma_cod . " - " . $infoAula->turma->turma_nome; ?></h2>      
            <h3>Data: <?php echo date('d/m/y', strtotime($infoAula->aula->tempo_inicio)); ?></h3>
            <h3>Horario: <?php echo date('H:i', strtotime($infoAula->aula->tempo_inicio)) . " às " . date('H:i', strtotime($infoAula->aula->tempo_fim)); ?></h3>
		
		</div>
		<div id="qrcode">
			<center>
                <img src="<?php echo 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='. $infoAula->aula->aula_id; ?>" alt="">
            <center>
		</div><br>
        <!-- Dados duplicados caso o professor queira passar o papel pela turma, dividindo o papel em dois agiliza o processo -->
        <div id="info">
            
            <h2><?php echo $infoAula->turma->turma_cod . " - " . $infoAula->turma->turma_nome; ?></h2>      
            <h3>Data: <?php echo date('d/m/y', strtotime($infoAula->aula->tempo_inicio)); ?></h3>
            <h3>Horario: <?php echo date('H:i', strtotime($infoAula->aula->tempo_inicio)) . " às " . date('H:i', strtotime($infoAula->aula->tempo_fim)); ?></h3>
        
        </div>
        <div id="qrcode">
            <center>
                <img src="<?php echo 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='. $infoAula->aula->aula_id; ?>" alt="">
            <center>
        </div>
	</div>


</body>