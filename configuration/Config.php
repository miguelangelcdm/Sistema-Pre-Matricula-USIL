<?php
class Config {
    private  $dbHost;
    private  $dbUser ;
    private  $dbPassword;
    private  $dbName ;
    private $mysqli;

    public function __construct($dbHost, $dbUser, $dbPassword, $dbName) {
        $this->dbHost = $dbHost;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
        $this->dbName = $dbName;
        $this->connect();
    }

    private function connect() {
        $this->mysqli = new mysqli($this->dbHost, $this->dbUser, $this->dbPassword, $this->dbName);

        if ($this->mysqli->connect_error) {
            die('Error de conexión: ' . $this->mysqli->connect_error);
        }
    }

    public function getMysqli() {
        return $this->mysqli;
    }
}

