<?php
use controller\LoginController;
// $nombreArchivo = 'config.txt';

// Lee el contenido completo del archivo y lo almacena en una variable
// $contenido = file_get_contents($nombreArchivo);
require_once('controller/LoginController.php');

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
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
        $logController->logout();
        break;
    default:
    break;
}


