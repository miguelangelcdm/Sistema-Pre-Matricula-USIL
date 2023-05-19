<?php
require_once('configuration/Config.php');
require_once('model/Alumno.php');

class Curso {
    private String $codigo_curso;
    private int $creditos;
    private String $nombre_curso;
    private int $ciclo;
    private String $mallaId;
    private $config;

    // Destructor
    public function __destruct() {}

    // Constructor
    public function __construct(String $codigo_curso, int $creditos, String $nombre_curso, int $ciclo, String $mallaId) {
        $this->codigo_curso = $codigo_curso;
        $this->creditos = $creditos;
        $this->nombre_curso = $nombre_curso;
        $this->ciclo = $ciclo;
        $this->mallaId = $mallaId;
    }

    // Getter and Setter
    public function getCodigo_curso() {
        return $this->codigo_curso;
    }

    public function setCodigo_curso(String $codigo_curso) {
        $this->codigo_curso = $codigo_curso;
    }

    public function getCreditos() {
        return $this->creditos;
    }

    public function setCreditos(int $creditos) {
        $this->creditos = $creditos;
    }

    public function getNombre_curso() {
        return $this->nombre_curso;
    }

    public function setNombre_curso(String $nombre_curso) {
        $this->nombre_curso = $nombre_curso;
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

    public function getCoursesByMallaId(String $mallaId) {
        $this->config = new Config(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $mysqli = $this->config->getMysqli();
        $stmt = $mysqli->prepare('CALL getCoursesByMallaId(?)');
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
