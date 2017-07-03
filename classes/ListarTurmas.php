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
			if(isset($_POST['deletar']))
			{
				$this->deletarTurma();
			}
			
			if(isset($_POST['nova_turma']))
			{
				$this->novaTurma();
			}

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

	private function novaTurma()
	{

    $sql = "INSERT INTO turmas (turma_cod, turma_nome, inst_id, user_id, num_aulas)
            VALUES('". $_POST['cod_turma'] ."' , '". $_POST['turma_nome'] ."' , ". $_SESSION['user_inst'] ." , ". $_SESSION['user_id'] ." , 0 );";
    $query_nova_turma = $this->db_connection->query($sql);

	}

	private function deletarTurma()
	{

		$sql = "DELETE FROM presencas
						WHERE turma_id = " . $_POST['delete_id'] . "   ;";
    $query_deletar_presencas = $this->db_connection->query($sql);

    $sql = "DELETE FROM aulas
						WHERE turma_id = " . $_POST['delete_id'] . "   ;";
    $query_deletar_aulas = $this->db_connection->query($sql);

    $sql = "DELETE FROM turmas
						WHERE turma_id = " . $_POST['delete_id'] . "   ;";
    $query_deletar_turma = $this->db_connection->query($sql);

	}

}


?>