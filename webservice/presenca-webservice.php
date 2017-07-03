<?php

	if(isset($_POST['presencaJson']))
	{
		// {"id_usuario":2,"codaula":"abc123","date":"2017-06-29 09:00:00"}
		//http://localhost/topresente/webservice/presenca-webservice.php?presencaJson=[{%22id_usuario%22:2,%22codaula%22:%22abc123%22,%22date%22:%222017-06-29%2009:00:00%22},{%22id_usuario%22:2,%22codaula%22:%22abc456%22,%22date%22:%222017-06-30%2009:00:00%22}]

		// include the configs / constants for the database connection
		require_once("../config/db.php");

		// load the login class
		require_once("../classes/Presenca.php");

		$presenca = new Presenca();

		$presencaJson = json_decode($_POST['presencaJson']);

		foreach ($presencaJson as $presencaAtual)
		{
			$user_id = $presencaAtual->id_usuario;
			$codaula = $presencaAtual->codaula;
			$date = $presencaAtual->date;

			$temp = $presenca->toPresente($user_id, $codaula, $date);

			if($temp == 0)
			{
				break;
			}
		}

		if($temp == 1)
		{
			//success
			$json = array("status" => 1, "results" => "success");
		}	
		else
		{
			$json = array("status" => 0, "errors" => $presenca->errors);
		}

		/* Output header */
		header('Content-type: application/json');
		echo json_encode($json);

	}
?>