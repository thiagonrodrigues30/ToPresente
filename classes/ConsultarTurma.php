<?php

class ConsultarTurma {

	public $turma = null;

	public $listaAulas = null;

	public $numAulas = null;

	public $listaPresencas = null;

	public $numPresencas = null;

	private $db_connection = null;

	public $errors = array();


	public function __construct()
	{
		if ($this->connectDb())
		{
			$this->consultarTurma();
			$this->consultarAulas();
			$this->consultarPresencas();
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
		// saving all contacts
        $sql = "SELECT * FROM turmas WHERE turma_id = " . $_GET['id'] . "   ;";
        $query_consultar_turma = $this->db_connection->query($sql);
        //$this->listaTurmas = $query_consultar_turma->fetch_all(MYSQLI_ASSOC);
        $this->turma = $query_consultar_turma->fetch_object();
        //$this->numTurmas = $query_consultar_turma->num_rows;
	}

	private function consultarAulas()
	{
        $sql = "SELECT * FROM aulas WHERE turma_id = " . $_GET['id'] . " ORDER BY aula_num  ;";
        $query_consultar_aulas = $this->db_connection->query($sql);
        $this->listaAulas = $query_consultar_aulas->fetch_all(MYSQLI_ASSOC);
        $this->numAulas = $query_consultar_aulas->num_rows;
	}

	private function consultarPresencas()
	{
		// saving all contacts
        $sql = "SELECT presencas.presenca_id , presencas.turma_id , presencas.user_id, presencas.presenca_vetor, users.user_name, users.user_mat 
        				FROM presencas, users 
        				WHERE presencas.turma_id = " . $_GET['id'] . " AND users.user_id = presencas.user_id  ;";
        $query_consultar_presencas = $this->db_connection->query($sql);
        $this->listaPresencas = $query_consultar_presencas->fetch_all(MYSQLI_ASSOC);
        $this->numPresencas = $query_consultar_presencas->num_rows;
	}

}


?>