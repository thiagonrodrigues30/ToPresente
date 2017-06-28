<?php

session_start();

if (!isset($_SESSION['user_login_status']) OR $_SESSION['user_login_status'] != 1 OR $_SESSION['user_type'] != 2) 
{
   	//include("views/bloqueado.php");
   	//header("refresh: 4; url=./index.php");
   	header("Location: index.php");
   	exit;
}

// show the register view (with the registration form, and messages/errors)
include("views/pagina-inicial-aluno.php");

?>