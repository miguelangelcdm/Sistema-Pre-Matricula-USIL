<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Pseudomatricula USIL</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../../assets/vendor/css/CustomBase.css" class="template-customizer-theme-css" />
  <!-- <link rel="stylesheet" href="../assets/css/demo.css" /> -->

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="../../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../../assets/js/config.js"></script>
</head>


<body>
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container" style="min-height:87vh">
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y" style="max-width:100%;padding-bottom:0!important">
            <!-- Layout Demo -->
            <div class="layout-demo-wrapper" style="height:100%">
              <div class="card card-body" style="height:100%; background-color: rgba(255, 255, 255, 0.6);">
                <h1>Constancia de Pseudomatrícula <span><i class="fa-computer-classic me-2"></i></span></h1>
                <div class="d-flex" id="lays" style="height:100%;justify-content:space-around">
                  <div class="card" style="width:28%">
                    <h5 class="card-header">Datos del Alumno:</h5>
                    <div class="card-body">
                      <div class="demo-inline-spacing mt-3">
                        <ul class="list-group">
                          <li class="list-group-item d-flex align-items-center">
                            <i class="bx bx-user me-2"></i>
                            Miguelangel Garay Dueñas
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                            <i class="bx bx-hard-hat me-2"></i>
                            Ingenieria de Sistemas e Informática
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                            <i class="bx bx-list-ul me-2"></i>
                            Malla:
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                            <i class="bx bx-purchase-tag-alt me-2"></i>
                            Cursos Matriculados:
                          </li>
                          <li class="list-group-item d-flex align-items-center">
                            <i class="bx bx-closet me-2"></i>
                            Créditos Matriculados:
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  
                  <div class="card" style="width:70%">
                    <h5 class="card-header">Listado de Cursos</h5>
                    <div class="card-body">
                      <div class="card mt-3 p-3" style="height:90%">
                        <div class="table-responsive text-nowrap">
                          <h1></h1>
                          <?php 
                          require_once('../../controller/MatriculaController.php');

                          if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            if (isset($_POST['registerMatricula'])) {
                              $alumno_codigo_alumno = $_POST['alumno_codigo_alumno'] ?? '';
                              $cursos_seleccionados = isset($_POST['idcurso']) ? $_POST['idcurso'] : [];
                              
                              echo "<h1>Alumno:".$alumno_codigo_alumno."</h1>";
                              foreach ($cursos_seleccionados as $row) {
                                echo "<h1>Curso:".$row."</h1>";
                              }
                              

                              $objM = new MatriculaController();
                              $objM->registrarMatricula($alumno_codigo_alumno, $cursos_seleccionados);
                              echo '<h1>Registrado correctamente</h1>';
                            } else {
                              echo '<h1>No Registrado</h1>';
                            }
                          } else {
                            echo '<h1>Error: Método de solicitud incorrecto</h1>';
                          }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>