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

// create the registration object. when this object is created, it will do all registration stuff automatically
// so this single line handles the entire registration process.
$consultarTurma = new ConsultarTurma();

// show the view
include("views/consultar-turma-prof.php");

?>