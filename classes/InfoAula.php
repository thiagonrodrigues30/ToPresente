<?php

class InfoAula {

	public $turma = null;

	public $aula = null;

	private $db_connection = null;

	public $errors = array();


	public function __construct()
	{
		if ($this->connectDb())
		{
			$this->consultarTurma();
			$this->consultarAula();
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

	private function consultarTurma()
	{
        $sql = "SELECT * FROM turmas WHERE turma_id = " . $_GET['id'] . "   ;";
        $query_consultar_turma = $this->db_connection->query($sql);
        //$this->listaTurmas = $query_consultar_turma->fetch_all(MYSQLI_ASSOC);
        $this->turma = $query_consultar_turma->fetch_object();
        //$this->numTurmas = $query_consultar_turma->num_rows;
	}

	private function consultarAula()
	{
        $sql = "SELECT * FROM aulas WHERE turma_id = " . $_GET['id'] . " AND aula_num = " . $this->turma->num_aulas . "  ;";
        $query_consultar_aula = $this->db_connection->query($sql);
        $this->aula = $query_consultar_aula->fetch_object();
	}


}


?>