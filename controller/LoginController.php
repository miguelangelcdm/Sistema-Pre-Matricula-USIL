<?php
namespace controller;
use Config;
use Login;


require_once ('configuration/Config.php');
require_once ('model/Login.php');
require_once('controller/AlumnoController.php');

  
class LoginController{
    private $config;
    public function __construct(){ $this->config = new Config(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);}
    public function login($codigo_alumno, $password){
        $login = new Login($codigo_alumno, $password, $this->config);
        $credenciales_validas = $login->verificarCredenciales();
        if ($credenciales_validas) {
            // $obj = new AlumnoController();
            // $usuario = $obj->findById($codigo_alumno);
            $id=$codigo_alumno;
            
            require 'view/session.php'; /*valido renderizando*/ 
        } else {
            require 'view/login/login.php'; /*no valido retorna login*/ 
        }
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
        exit();
        $_SESSION['message'] = 'Has cerrado sesión correctamente.';
        echo  $_SESSION['message'] ;
    }

    public function viewLogin(){
        require 'view/login/login.php';
    }
}
?>