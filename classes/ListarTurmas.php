<?php

class ListarTurmas {

	public $listaTurmas = null;

	public $numTurmas = null;

	private $db_connection = null;

	public $errors = array();


	public function __construct()
	{
		if ($this->connectDb())
		{
			$this->listarTurmas();
		}
		else
		{
			$this->errors[] = "Desculpe, Sem conexão com o banco de dados.";
		}
	}

	private function connectDb()
	{
		// create a database connection
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

        // change character set to utf8 and check it
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        // if no connection errors (= working database connection)
        if (!$this->db_connection->connect_errno)
        {
        	return true;
        }
        else
        {
        	return false;
        }
	}

	private function listarTurmas()
	{
		// saving all contacts
        $sql = "SELECT * FROM turmas WHERE user_id = " . $_SESSION['user_id'] . "   ;";
        $query_listar_turmas = $this->db_connection->query($sql);
        $this->listaTurmas = $query_listar_turmas->fetch_all(MYSQLI_ASSOC);
        $this->numTurmas = $query_listar_turmas->num_rows;
	}

}


?>