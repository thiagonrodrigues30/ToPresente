<?php

	if(isset($_GET['loginJson']))
	{
		//echo "entrou"; {"senha":"123456","email":"thiago@thiago"}

		// include the configs / constants for the database connection
		require_once("../config/db.php");

		// load the login class
		require_once("../classes/Login.php");

		$loginJson = json_decode($_GET['loginJson']);

		$_POST['user_email'] = $loginJson->email;
		$_POST['user_password'] = $loginJson->senha;
		$_POST['user_type'] = 2;
		$_POST["login"] = true;

		$login = new Login();

		if ($login->isUserLoggedIn() == true)
		{
			$result[] = array(
					"user_id" => $_SESSION['user_id'] ,
					"user_name" => $_SESSION['user_name'] ,
					"user_email" => $_SESSION['user_email'] ,
				);

			$json = array("status" => 1, "results" => $result);
		}
		else
		{
			$json = array("status" => 0, "errors" => $login->errors);
		}


		/* Output header */
		header('Content-type: application/json');
		echo json_encode($json);

		$login->doLogout();
	}
?>