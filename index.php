<?php
use controller\AlumnoController;
require_once('controller/AlumnoController.php');

// Configuración de la base de datos
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'matricula');

$action = isset($_GET['action']) ? $_GET['action'] : 'login';
$alumnoController = new AlumnoController();

// Enrutamiento de la acción al método correspondiente del controlador
switch ($action) {
    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos enviados en el formulario
            $codigoAlumno = $_POST['codigo_alumno'];
            $password = $_POST['password'];
            // Llamar al método de inicio de sesión del controlador
            $alumnoController->login($codigoAlumno, $password);
        } else {
            // Mostrar el formulario de inicio de sesión
            $alumnoController->showRegistrationForm();
        }
        break;

    case 'registro':
        // Verificar si se ha enviado el formulario de registro
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Obtener los datos enviados en el formulario
            $codigoAlumno = $_POST['codigo_alumno'];
            $password = $_POST['password'];

            // Llamar al método de registro del controlador
           // $alumnoController->register($codigoAlumno, $password);
        } else {
            // Mostrar el formulario de registro
            $alumnoController->showRegistrationForm();
        }
        break;

    // Otras acciones y enrutamientos del controlador...
    // ...
    default:
        // Acción desconocida, redireccionar a una página de error o hacer algo en consecuencia
        require 'view/Login.php';
        break;
}


