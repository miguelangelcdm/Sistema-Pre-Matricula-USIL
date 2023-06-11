<?php
session_start()
?>
<?php
  use controller\CursosController;
  use controller\AlumnoController;
  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/controller/MatriculaController.php');
  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/controller/AlumnoController.php');
  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/controller/CursoController.php');

  global $objC;
  global $objA;
  global $objM;
  global $alu_counter;
  $objC=new CursosController();
  $objA=new AlumnoController();
  $objM=new MatriculaController();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Pseudomatricula USIL</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../../assets/vendor/fonts/boxicons.css" />

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

<body class="bg2">
  <?php require '../../view/header/header.php'; ?>
  <!-- Layout wrapper -->
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
              <div class="card card-body" style="height:100%; background-color: rgba(255, 255, 255, 0.6);opacity:0.9">
                <!-- <h1>Bloques a aperturar <span><i class="fa-computer-classic me-2"></i></span></h1> -->
                <div class="d-flex" id="lays" style="height:100%;justify-content:space-between">
                  <div class="d-flex flex-column" style="width:40%">
                    <div class="card card-body mb-3" style="max-height: 30%;">
                      <div class="mb-3">
                        <select class="form-select" id="select-carrera" aria-label="Default select example">
                          <option value="" selected>Seleccione Carrera</option>
                          <option value="Ingenieria en Sistemas de Informacion">Ingenieria en Sistemas de Información</option>
                          <option value="Ingenieria de Software">Ingenieria de Software</option>
                          <option value="Ciencia de Datos">Ciencia de Datos</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <select class="form-select" id="select-malla" aria-label="Default select example">
                          <option value="">-</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <select class="form-select" id="select-ciclo" aria-label="Default select example">
                          <option value="" selected>Seleccione Ciclo</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10</option>
                        </select>
                      </div>
                      <!-- <button type="submit" class="btn btn-primary">Enviar</button> -->
                    </div>

                    
                    <div class="card" style="height:100%">
                      <h5 class="card-header">Listado de Cursos</h5>
                        <div class="card-body">
                          <table class="datatables-basic table border-top" id="bloquesDT">
                            <thead>
                              <tr>
                                <th>Carrera</th>
                                <th>Malla</th>
                                <th>Ciclo</th>
                                <th>Codigo</th>
                                <th>Curso</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                              <?php
                              $lcursos = $objC->getAllCursos();
                              foreach ($lcursos as $row) {
                                echo "<tr>";
                                echo "<td align='center'>" . $row['carrera'] . "</td>";
                                echo "<td align='center'>" . $row['mallaid'] . "</td>";
                                echo "<td align='center'>" . $row['ciclo'] . "</td>";
                                echo "<td>" . $row['codigo'] . "</td>";
                                echo "<td>" . $row['nombre'] . "</td>";
                                echo "<td>
                                  <form method='post' action='#'>
                                    <input type='hidden' name='codigo' value='" . $row['codigo'] . "'>
                                    <button type='submit' class='btn btn-primary' style='max-width:150px;margin:1rem' name='deleteMatricula'>Eliminar</button>
                                  </form>
                                </td>";
                                echo "</tr>";
                              }
                              ?>
                            </tbody>
                          </table>
                        </div>
                    </div>
                  </div>

                  <div class="card" style="width:60%">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Alumnos</h5>
                      <a href="../session.php">
                        <div class="create-new btn btn-primary">
                          <i class="bx bx-list-check"></i> <span class="d-none d-lg-inline-block">Pseudomatricularse</span>
                        </div>
                      </a>
                    </div>
                    <div class="card-body">
                      <div class="card mt-3 p-3" style="height:90%">
                        <div class="table-responsive text-nowrap">
                          <table class="datatables-basic table border-top" id="main-dt">
                            <thead>
                              <tr>
                                <th>Codigo Alumno</th>
                                <th>Nombre Completo</th>
                                <th>Carrera</th>
                               
                                <!-- <th>Input</th> -->
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                              <tr>
                                <td>1920853</td>
                                <td>Christian Castro Ortiz</td>
                                <td>Ingenieria en Sistemas de Informacion</td>
                              </tr>

                            </tbody>                    
                          </table>


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
  <?php require '../../view/footer/footer.php'; ?>
</body>
<script>
  // Obtener referencias a los elementos select
  var selectCarrera = document.getElementById("select-carrera");
  var selectMalla = document.getElementById("select-malla");

  // Definir las opciones para el select de malla
  var opcionesMalla = {
    "Ingenieria en Sistemas de Informacion": ['PC IS-16', 'PC IS-19', 'PC IS-22', 'PC IS-23'],
    "Ingenieria de Software": ['PC SW-19', 'PC SW-22', 'PC SW-23'],
    "Ciencia de Datos": ['PC CDx-23']
  };

  // Función para actualizar las opciones del select de malla
  function actualizarSelectMalla() {
    // Obtener el valor seleccionado del select de carrera
    var valorCarrera = selectCarrera.value;

    // Obtener las opciones correspondientes del objeto opcionesMalla
    var opciones = opcionesMalla[valorCarrera];

    // Limpiar el select de malla
    selectMalla.innerHTML = "";
    var option = document.createElement("option");
    option.text = 'Seleccione Malla';
    option.value = '';
    selectMalla.appendChild(option);

    // Agregar las nuevas opciones al select de malla
    if (opciones) {
      opciones.forEach(function (opcion) {
        var option = document.createElement("option");
        option.text = opcion;
        option.value = opcion;
        selectMalla.appendChild(option);
      });
    }
  }

  // Llamar a la función actualizarSelectMalla cuando cambie la selección del select de carrera
  selectCarrera.addEventListener("change", actualizarSelectMalla);

  // Llamar a la función actualizarSelectMalla al iniciar la página para dejar el select de malla vacío
  actualizarSelectMalla();
</script>
<script src="../../assets/js/bloques.js"></script>

</html>
