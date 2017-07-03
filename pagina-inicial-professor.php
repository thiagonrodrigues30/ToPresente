<?php

session_start();

if (!isset($_SESSION['user_login_status']) OR $_SESSION['user_login_status'] != 1 OR $_SESSION['user_type'] != 1) 
{
   	header("Location: index.php");
   	exit;
}

// include the configs / constants for the database connection
require_once("config/db.php");

require_once("classes/ListarTurmas.php");

$turmas = new ListarTurmas();

// show the view
include("views/pagina-inicial-professor.php");

?>