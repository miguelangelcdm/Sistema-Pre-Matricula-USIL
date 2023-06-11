<?php
// Verificar si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $codigo_alumno = $_POST['codigo_alumno'];
    $password = $_POST['password'];

    // Realizar la conexión a la base de datos
    $db_host = 'localhost';
    $db_user = 'root';
    $db_password = 'blackN10';
    $db_name = 'matricula';
    $connection = new mysqli($db_host, $db_user, $db_password, $db_name);

    // Verificar la conexión
    if ($connection->connect_error) {
        die("Error de conexión: " . $connection->connect_error);
    }

    // Ejecutar el procedimiento almacenado
    $query = "CALL loginProcedure('$codigo_alumno', '$password')";
    $result = $connection->query($query);

    // Verificar si se obtuvo un resultado
    if ($result && $result->num_rows > 0) {
        // Obtener el nombre del alumno
        $row = $result->fetch_assoc();
        $nombre_alumno = $row['fullName'];

        // Iniciar sesión
        session_start();
        $_SESSION['user_id'] = $codigo_alumno;

        // Redirigir al usuario a la página deseada
        // header('Location: view/session.php');
        header('Location: view/Home.php');
        exit();
    } else {
        echo "Credenciales inválidas. Por favor, intenta nuevamente.";
    }

    // Cerrar la conexión
    $connection->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>Pseudomatrícula USIL</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"/>

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/CustomBase.css" class="template-customizer-theme-css" />
    <!-- <link rel="stylesheet" href="../assets/css/demo.css" /> -->

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
</head>
<body class="bg">
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card" style="box-shadow: 0 2px 6px 0 rgb(67, 89, 113);">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center" style="margin-bottom:1rem">
                <a href="index.html" class="app-brand-link gap-2">
                  <img src="/assets/img/elements/usil.png" alt="" style="max-width:100px">
                </a>
              </div>
              <!-- /Logo -->
              <h4 class="mb-2">Bienvenido al sistema de</h4>
              <h4 class="mb-2">Pseudo-Matricula USIL! 👋</h4>
              <p class="mb-3">Ingresa tus datos de alumno y tu contraseña de infosil</p>
              <form id="formAuthentication" class="mb-3" action="index.php" method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">Codigo de Alumno</label>
                  <input
                    type="text"
                    class="form-control"
                    name="codigo_alumno"
                    id="codigo_alumno"
                    placeholder="Ingresa tu código de alumno"
                    autofocus
                    required
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="auth-forgot-password-basic.html">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"/>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div>
                <div class="">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
