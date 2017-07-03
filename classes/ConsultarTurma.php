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
			// Se uma nova aula esta sendo inserida chama os metodos de inserir
			if(isset($_POST['nova_aula']))
			{
				$this->consultarTurma();
				$this->novaAula();
				$this->atualizarTurma();
				$this->atualizarPresencas();
			}
			//Senao so chama os metodos pra mostrar as informaçoes na tela
			else
			{
				$this->consultarTurma();
				$this->consultarAulas();
				$this->consultarPresencas();
			}
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
    $this->turma = $query_consultar_turma->fetch_object();
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
    $sql = "SELECT presencas.presenca_id , presencas.turma_id , presencas.user_id, presencas.presenca_vetor, users.user_name, users.user_mat 
        		FROM presencas, users 
        		WHERE presencas.turma_id = " . $_GET['id'] . " AND users.user_id = presencas.user_id  ;";
    $query_consultar_presencas = $this->db_connection->query($sql);
    $this->listaPresencas = $query_consultar_presencas->fetch_all(MYSQLI_ASSOC);
    $this->numPresencas = $query_consultar_presencas->num_rows;
	}

	private function novaAula()
	{
		$numAula = $this->turma->num_aulas + 1;

		// Gerando token hash para ser o id da aula
		$string = $this->turma->turma_nome . $this->turma->turma_id . $numAula;
		$tokenHash = password_hash($string, PASSWORD_DEFAULT);
	
		$tempoInicio = date('y-m-d', strtotime($_POST['data'])) . " " . $_POST['hora_inicio'] . ":00" ;
		$tempoFim = date('y-m-d', strtotime($_POST['data'])) . " " . $_POST['hora_fim'] . ":00" ;


    $sql = "INSERT INTO aulas (aula_id, turma_id, aula_num, tempo_inicio, tempo_fim)
            VALUES('". $tokenHash ."' , '". $this->turma->turma_id ."' , '". $numAula ."' , '". $tempoInicio ."' , '". $tempoFim ."');";
    $query_nova_aula = $this->db_connection->query($sql);
	}

	private function atualizarTurma()
	{

		$numAulas = $this->turma->num_aulas + 1;

		$sql = "UPDATE turmas
                SET num_aulas = " . $numAulas . "
                WHERE turma_id = " . $this->turma->turma_id . "   ;";

    $query_update_turma = $this->db_connection->query($sql);
	}

	private function atualizarPresencas()
	{
        $sql = "SELECT * FROM presencas WHERE turma_id = " . $this->turma->turma_id . "   ;";
        $query_consultar_presencas = $this->db_connection->query($sql);
        $listaPresencas = $query_consultar_presencas->fetch_all(MYSQLI_ASSOC);

        foreach($listaPresencas as $presenca)
        {
        	$vetor_presenca = unserialize($presenca['presenca_vetor']);
        	$vetor_presenca[] = 0;
        	$vetor_presenca = serialize($vetor_presenca);

        	$sql = "UPDATE presencas
                SET presenca_vetor = '" . $vetor_presenca . "'
                WHERE presenca_id = " . $presenca['presenca_id'] . "   ;";

        	$query_update_presenca = $this->db_connection->query($sql);
        }

	}

}


?>