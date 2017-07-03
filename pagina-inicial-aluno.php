<?php

session_start();

if (!isset($_SESSION['user_login_status']) OR $_SESSION['user_login_status'] != 1 OR $_SESSION['user_type'] != 2) 
{
   	header("Location: index.php");
   	exit;
}

include("views/pagina-inicial-aluno.php");

?>