<?php
namespace controller;
use Config;
use Alumno;
require_once ('configuration/Config.php');
require_once ('model/Alumno.php');

class AlumnoController{
    private $config;

    public function __construct(){ $this->config = new Config(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);}

    public function login($codigo_alumno, $password){
        $alumno = new Alumno($codigo_alumno, $password, $this->config);
        $credenciales_validas = $alumno->verificarCredenciales();
        if ($credenciales_validas) {
            require 'view/session.php'; /*valido renderizando*/ 
        } else {
            require 'view/login.php'; /*no valido retorna*/ 
        }
    }

    public function showRegistrationForm(){ require 'view/login.php'; }

  
}