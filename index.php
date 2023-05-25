<?php
use controller\LoginController;
$nombreArchivo = 'config.txt';

// Lee el contenido completo del archivo y lo almacena en una variable
$contenido = file_get_contents($nombreArchivo);
require_once('controller/LoginController.php');

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', $contenido);
define('DB_NAME', 'matricula');

$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$logController = new LoginController();

// Enrutamiento de la acción al método correspondiente del controlador
switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $codigoAlumno = $_POST['codigo_alumno'];// Obtener los datos enviados en el formulario
            $password = $_POST['password'];        // Llamar al método de inicio de sesión del controlador
            $logController->login($codigoAlumno, $password);
        } else {
            $logController->viewLogin(); // Mostrar el formulario de inicio de sesión
        }
        break;

    case 'logout':
        if($_SESSION['logout']==true){
            $logController->logout();
        }
        break;
        
    default:
    break;
/*
    // Otras acciones y enrutamientos del controlador...
    // ...
    default:
        // Acción desconocida, redireccionar a una página de error o hacer algo en consecuencia
        require 'view/login/Login.php'; // retornar a login por defecto o errorMessages 
        break;*/
}


