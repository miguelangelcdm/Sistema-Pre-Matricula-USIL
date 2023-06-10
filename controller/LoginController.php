<?php

// namespace controller;
// use Config;
// use Login;

// require_once ('configuration/Config.php');
// require_once ('model/Login.php');
// require_once('controller/AlumnoController.php');

  
// class LoginController{
//     private $config;
//     public function __construct(){ $this->config = new Config(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);}
//     public function login($codigo_alumno, $password){
//         $login = new Login($codigo_alumno, $password, $this->config);
//         $credenciales_validas = $login->verificarCredenciales();
//         if ($credenciales_validas) {
//             // $obj = new AlumnoController();
//             // $usuario = $obj->findById($codigo_alumno);
//             $id=$codigo_alumno;
//             session_start();
//             $_SESSION['user_id'] = $id;
//             require 'view/session.php'; /*valido renderizando*/ 
//         } else {
//             require 'view/login/login.php'; /*no valido retorna login*/ 
//         }
//     }
//     public function logout(){
//         //session_start();
//         session_unset();
//         session_destroy();
//         header('Location: index.php?action=login');
//         exit();
//         $_SESSION['message'] = 'Has cerrado sesión correctamente.';
//         echo  $_SESSION['message'] ;
//     }

//     public function viewLogin(){
//         require 'view/login/login.php';
//     }
// }
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
            $id = $codigo_alumno;
            session_start();
            $_SESSION['user_id'] = $id;

            // Verificar si la sesión está iniciada
            if (session_status() === PHP_SESSION_ACTIVE) {
                require 'view/session.php'; /* Acción cuando la sesión está iniciada */
                return;
            }else {
                require 'view/login/login.php'; /* Acción cuando la sesión no está iniciada */
            }
        } else {
            require 'view/login/login.php'; /* Acción cuando las credenciales no son válidas */
        }
    }
    public function logout(){
        session_start();
        session_unset();
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }

    public function viewLogin(){
        require 'view/login/login.php';
    }
}

?>