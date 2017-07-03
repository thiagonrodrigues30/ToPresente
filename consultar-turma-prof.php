<?php

session_start();

if (!isset($_SESSION['user_login_status']) OR $_SESSION['user_login_status'] != 1 OR $_SESSION['user_type'] != 1) 
{
   	//include("views/bloqueado.php");
   	//header("refresh: 4; url=./index.php");
   	header("Location: index.php");
   	exit;
}

// include the configs / constants for the database connection
require_once("config/db.php");

// load the registration class
require_once("classes/ConsultarTurma.php");

$consultarTurma = new ConsultarTurma();

//Se uma nova aula foi inserida passa para a pagina de informaçoes dessa ultima aula

if(isset($_POST['nova_aula']))
{
	header("Location: info-ult-aula.php?id=" . $consultarTurma->turma->turma_id);
}
else
{ 
	// show the view
	include("views/consultar-turma-prof.php");
}


?>