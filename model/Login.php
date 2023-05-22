<?php
require_once('configuration/Config.php');


class Login {
    private $codigo_alumno;
    private $password;
    private $config;

    public function __destruct(){ }

    public function __construct($codigo_alumno, $password) {
        $this->codigo_alumno = $codigo_alumno;
        $this->password = $password;
        $this->config = new Config(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    }

    public function getCodigoAlumno() {
        return $this->codigo_alumno;
    }

    public function getPassword() {
        return $this->password;
    }

    public function verificarCredenciales() {
        $mysqli = $this->config->getMysqli();
        $query = "CALL loginProcedure(?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('ss', $this->codigo_alumno, $this->password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
             return true; // Credenciales válidas
        } else {
            return false; // Credenciales inválidas
        }
    }

    public function getNameByUser($codigo_alumno){
        $mysqli = $this->config->getMysqli();
        $query = "SELECT fullname FROM alumno WHERE codigo_alumno =?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param('s', $codigo_alumno);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 1) {
            return $result->fetch_object()->name;
        } else {
            return false;
        }
    }
}


