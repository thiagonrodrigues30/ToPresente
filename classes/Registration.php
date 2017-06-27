<?php

/**
 * Class registration
 * handles the user registration
 */
class Registration
{
    
    private $db_connection = null;
    
    public $errors = array();
    
    public $messages = array();

    public $instituicoesList = null;

    public $numInstituicoes = null;

    public function __construct()
    {
        if ($this->connectDb())
        {
            $this->getInstituicoes();
        }
        else
        {
            $this->errors[] = "Desculpe, Sem conexão com o banco de dados.";
        }

        if (isset($_POST["register"])) {
            $this->registerNewUser();
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

    private function getInstituicoes()
    {
        $sql = "SELECT * FROM instituicao ;";
        $query_list_instituicao = $this->db_connection->query($sql);

        $this->instituicoesList = $query_list_instituicao->fetch_all(MYSQLI_ASSOC);
        $this->numInstituicoes = $query_list_instituicao->num_rows;
    }

    /**
     * handles the entire registration process. checks all error possibilities
     * and creates a new user in the database if everything is fine
     */
    private function registerNewUser()
    {
        if (empty($_POST['user_name'])) {
            $this->errors[] = "Nome Vazio";
        } elseif (empty($_POST['user_password_new']) || empty($_POST['user_password_repeat'])) {
            $this->errors[] = "Senha Vazia";
        } elseif ($_POST['user_password_new'] !== $_POST['user_password_repeat']) {
            $this->errors[] = "Senha e repetir senha não são a mesma";
        } elseif (strlen($_POST['user_password_new']) < 6) {
            $this->errors[] = "Senha tem tamanho mínimo de 6 caracteres";
        } elseif (strlen($_POST['user_name']) > 64 || strlen($_POST['user_name']) < 2) {
            $this->errors[] = "Nome não pode ser menor que 2 ou maior que 64 caracteres";
        } elseif (empty($_POST['user_email'])) {
            $this->errors[] = "Email não pode ser vazio";
        } elseif (strlen($_POST['user_email']) > 64) {
            $this->errors[] = "Email não pode ser maior que 64 caracteres";
        } elseif (!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors[] = "Seu email não está com um formato de email válido";
        } elseif (!empty($_POST['user_name'])
            && strlen($_POST['user_name']) <= 64
            && strlen($_POST['user_name']) >= 2
            && !empty($_POST['user_email'])
            && strlen($_POST['user_email']) <= 64
            && filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)
            && !empty($_POST['user_password_new'])
            && !empty($_POST['user_password_repeat'])
            && ($_POST['user_password_new'] === $_POST['user_password_repeat'])
        ) {
            // create a database connection
            $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

            // change character set to utf8 and check it
            if (!$this->db_connection->set_charset("utf8")) {
                $this->errors[] = $this->db_connection->error;
            }

            // if no connection errors (= working database connection)
            if (!$this->db_connection->connect_errno) {

                // escaping, additionally removing everything that could be (html/javascript-) code
                $user_name = $this->db_connection->real_escape_string(strip_tags($_POST['user_name'], ENT_QUOTES));
                $user_email = $this->db_connection->real_escape_string(strip_tags($_POST['user_email'], ENT_QUOTES));

                $user_type = $_POST['tipo'];
                $user_inst_id = $_POST['instituicao'];
                
                if (!isset($_POST['login_input_user_mat']))
                {
                    $user_mat = "";
                }
                else
                {
                    $user_mat = $this->db_connection->real_escape_string(strip_tags($_POST['login_input_user_mat'], ENT_QUOTES));
                }
                $user_password = $_POST['user_password_new'];

                // crypt the user's password with PHP 5.5's password_hash() function, results in a 60 character
                // hash string. the PASSWORD_DEFAULT constant is defined by the PHP 5.5, or if you are using
                // PHP 5.3/5.4, by the password hashing compatibility library
                $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);

                // check if user or email address already exists
                $sql = "SELECT * FROM users WHERE user_email = '" . $user_email . "';";
                $query_check_user_email = $this->db_connection->query($sql);

                if ($query_check_user_email->num_rows == 1) {
                    $this->errors[] = "Desculpe, este email já está em uso.";
                } else {
                    // write new user's data into database
                    $sql = "INSERT INTO users (user_name, user_password_hash, user_email, user_type, inst_id, user_mat)
                            VALUES('" . $user_name . "', '" . $user_password_hash . "', '" . $user_email . "', '" . $user_type . "', '" . $user_inst_id . "', '" . $user_mat . " ');";
                    $query_new_user_insert = $this->db_connection->query($sql);

                    // if user has been added successfully
                    if ($query_new_user_insert) {
                        $this->messages[] = "Sua conta foi criada com sucesso. Você pode logar agora.";
                    } else {
                        $this->errors[] = "Desculpe, seu registro falhou. Por favor volte e tente novamente.";
                    }
                }
            } else {
                $this->errors[] = "Desculpe, sem conexão com o banco de dados.";
            }
        } else {
            $this->errors[] = "Um erro desconhecido aconteceu.";
        }
    }
}
