<?php

/**
 * Class login
 * handles the user's login and logout process
 */
class Presenca
{
    private $db_connection = null;
   
    public $errors = array();
   
    public $messages = array();

    public $turma = null;

    
    public function __construct()
    {  
    }

    public function toPresente($user_id, $codaula, $date)
    {
        if ($this->connectDb())
        {
            return $this->verificarAula($user_id, $codaula, $date);
        }
        else
        {
            $this->errors[] = "Desculpe, Sem conexão com o banco de dados.";
            return 0;
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

    private function verificarAula($user_id, $codaula, $date)
    {

        // searching for contacts by the name or nickname
        $sql = "SELECT aulas.turma_id, aulas.aula_num, aulas.tempo_inicio, aulas.tempo_fim, turmas.num_aulas
                FROM aulas, turmas
                WHERE aulas.aula_id = '" . $codaula . "' AND turmas.turma_id = aulas.turma_id ;";

        $query_aula = $this->db_connection->query($sql);
        $this->turma = $query_aula->fetch_object();

        //Verificando se presença esta no horario certo
        if(($date >= $this->turma->tempo_inicio) && ($date <= $this->turma->tempo_fim))
        {
            
            if($query_aula->num_rows == 1)
            {
                //verificar se o aluno ja esta cadastrado na turma
                $sql = "SELECT * FROM presencas WHERE turma_id = " . $this->turma->turma_id . " AND user_id = " . $user_id . "      ;";
                $query_presenca = $this->db_connection->query($sql);
                $presenca = $query_presenca->fetch_object();
                //echo $query_presenca->error();

                if($query_presenca->num_rows == 0)
                {
                    $vetor_presenca = array();
                    for($i = 1; $i <= $this->turma->num_aulas; $i++)
                    {
                        $vetor_presenca[] = 0;
                    }

                    $vetor_presenca = serialize($vetor_presenca);

                    $sql = "INSERT INTO presencas (turma_id, user_id, presenca_vetor)
                                VALUES (" . $this->turma->turma_id . ", " . $user_id . ", '" . $vetor_presenca . "')  ;";
                    $query_insert_presenca = $this->db_connection->query($sql);
                    
                    $vetor_presenca = unserialize($vetor_presenca);
                    $presenca_id = $this->db_connection->insert_id;
                }
                else
                {
                    $vetor_presenca = unserialize($presenca->presenca_vetor);
                    $presenca_id = $presenca->presenca_id;
                }
                
                // Modificar o vetor presença na posiçao da aula enviada, e atualizar o banco de ddos com essa presença
                $vetor_presenca[$this->turma->aula_num - 1] = 1;
                $vetor_presenca = serialize($vetor_presenca);


                $sql = "UPDATE presencas 
                        SET presenca_vetor = '" . $vetor_presenca . "'
                        WHERE presenca_id = " . $presenca_id . "   ;";

                $query_update_presenca = $this->db_connection->query($sql);

                if($query_update_presenca === TRUE)
                {
                    return 1;
                }
                else
                {
                    return 0;
                }
                
            }
            else
            {
                $this->errors[] = "Essa aula não existe.";
            }


        }
        else
        {
            $this->errors[] = "Presença fora do horario da aula.";
        }


        return 0;
    }

}
