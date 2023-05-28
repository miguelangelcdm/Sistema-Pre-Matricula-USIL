<?php
require_once('configuration/Config.php');
require_once('model/Alumno.php');

class Curso {
    private int $idcurso;
    private String $codigo;
    private int $creditos;
    private String $nombre;
    private int $horas;
    private int $ciclo;
    private String $mallaId;
    private $config;

    // Destructor
    public function __destruct() {}

    // Constructor
    public function __construct(String $codigo, int $creditos, String $nombre, int $ciclo,int $horas) {
        $this->codigo = $codigo;
        $this->creditos = $creditos;
        $this->nombre = $nombre;
        $this->ciclo = $ciclo;
        $this->horas=$horas;
    }

    // Getter and Setter
    public function getcodigo() {
        return $this->codigo;
    }

    public function setcodigo(String $codigo) {
        $this->codigo = $codigo;
    }

    public function getCreditos() {
        return $this->creditos;
    }

    public function setCreditos(int $creditos) {
        $this->creditos = $creditos;
    }

    public function getNombre_curso() {
        return $this->nombre;
    }

    public function setNombre_curso(String $nombre) {
        $this->nombre = $nombre;
    }

    public function getCiclo() {
        return $this->ciclo;
    }

    public function setCiclo(int $ciclo) {
        $this->ciclo = $ciclo;
    }

    public function getMallaId() {
        return $this->mallaId;
    }

    public function setMallaId(String $mallaId) {
        $this->mallaId = $mallaId;
    }

    public function getHoras() {
        return $this->horas;
    }

    public function setHoras(int $horas) {
        $this->horas = $horas;
    }


    public function getCoursesByMallaId(String $mallaId) {
        $this->config = new Config(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $mysqli = $this->config->getMysqli();
        $stmt = $mysqli->prepare('CALL getCoursesByMallaId(?)'); /**/
        $stmt->bind_param('s', $mallaId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $courses = [];
            while ($row = $result->fetch_assoc()) {
                $courses[] = $row;
            }
            return $courses;
        } else {
            return false;
        }
    }

    public function getCoursesByCicloAndMallaId(int $ciclo, String $mallaId) {
        $this->config = new Config(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $mysqli = $this->config->getMysqli();
        $stmt = $mysqli->prepare('CALL getCoursesByCicloAndMallaId(?,?)');
        $stmt->bind_param('is', $ciclo, $mallaId);
        $stmt->execute();
        $result = $stmt->get_result();        
        if ($result->num_rows > 0) {
            $courses = [];
            while ($row = $result->fetch_assoc()) {
                $courses[] = $row;
            }
            return $courses;
        } else {
            return false;
        }
    }
}
