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
$objC = new CursosController();
$objA = new AlumnoController();
$objM = new MatriculaController();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Pre-matricula USIL</title>

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
          <div class="d-flex" id="lays" style="height:100%;justify-content:space-between; padding:26px">
            <!-- Columna Filters & Cursos -->
            <div class="card d-flex flex-column" style="width:45%;margin-right:1rem;opacity:0.9">
              <div class="card-header pb-0">
                <h5>Listado de Curso</h5>
                <div class="d-flex justify-content-between">
                  <div class="mb-3 w-100">
                    <select class="form-select" id="select-carrera" aria-label="Default select example">
                      <option value="" selected>Seleccione Carrera</option>
                      <option value="Ingenieria en Sistemas de Informacion">Ingenieria en Sistemas de Información
                      </option>
                      <option value="Ingenieria de Software">Ingenieria de Software</option>
                      <option value="Ciencia de Datos">Ciencia de Datos</option>
                    </select>
                  </div>
                  <div class="mb-3 w-100 ms-2">
                    <select class="form-select" id="select-malla" aria-label="Default select example">
                      <option value="">-</option>
                    </select>
                  </div>
                  <i class='bx bx-question-mark' style="margin-right:0.5rem; font-size:1.5rem" data-bs-toggle="tooltip"
                    data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                    data-bs-original-title="<span>Consulta tu malla en infosil</span>"></i>
                  <div class="mb-3 w-100">
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
                </div>
              </div>
              <!-- Datatable Cursos -->
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
                    foreach ($lcursos as $curso) {
                      // $idc=$curso['idcurso'];
                      // $count=$objA->cantidadMatriculadosCurso($idc);
                      echo "<tr>";
                      echo "<td align='center'>" . $curso['carrera'] . "</td>";
                      echo "<td align='center'>" . $curso['mallaid'] . "</td>";
                      echo "<td align='center'>" . $curso['ciclo'] . "</td>";
                      echo "<td>" . $curso['codigo'] . "</td>";
                      echo "<td>" . $curso['nombre'] . "</td>";
                      echo "<td>
                                      <form method='post' action='" . $_SERVER['PHP_SELF'] . "'>
                                          <input type='hidden' name='idcurso' value='" . $curso['idcurso'] . "'>
                                          <button type='submit' class='btn btn-primary' style='max-width:150px;margin:1rem' name='select" . $curso['idcurso'] . "'><i class='bx bx-right-arrow-alt' ></i></button>
                                      </form>
                                  </td>";
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>

              </div>
            </div>
            <!-- Columna Inscritos -->
            <div class="card" style="width:55%">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Alumnos: <span class="contador"></span></h5>
                <a href="../session.php">
                  <div class="create-new btn btn-primary">
                    <i class="bx bx-list-check"></i> <span class="d-none d-lg-inline-block">Pre-matricularse</span>
                  </div>
                </a>
              </div>
              <div class="card-body" style="marging-inline:1rem">
                <div class="table-responsive text-nowrap">
                  <table class="datatables-basic table border-top" id="alumnosdt">
                    <thead>
                      <tr>
                        <th>Codigo Alumno</th>
                        <th>Nombre Completo</th>
                        <th>Carrera</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                      $count = 0;
                      $lcursos2 = $objC->getAllCursos();
                      if (!empty($lcursos2)) {
                        foreach ($lcursos2 as $curso) {
                          if (isset($_POST['select' . $curso['idcurso']])) {
                            $cid = $curso['idcurso'];
                            $curso = $objC->findById($cid);

                            echo "<h1 id='ncurso' style='display:none'>" . $curso['nombre'] . "</h1>";
                            echo "<script>console.log('" . $curso['nombre'] . "');</script>";
                            $lalumnos = $objA->getAlumnosCurso($cid);
                            foreach ($lalumnos as $row) {
                              $count += 1;
                              echo "<tr>";
                              echo "<td>" . $row['codigo_alumno'] . "</td>";
                              echo "<td>" . $row['fullName'] . "</td>";
                              echo "<td>" . $row['turno'] . "</td>";
                              echo "</tr>";
                            }
                            echo "<h1 id='count' style='display:none'>" . $count . "</h1>";
                            //echo "<script>console.log(".$count.");</script>";
                            // Terminar la ejecución del bucle foreach
                            break;
                          }
                        }

                      } else {
                        echo "<script>console.log('No hay datos: Lista vacía');</script>";
                        echo "<h1>No hay datos: Lista vacía</h1>";
                      }
                      ?>
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
  <?php require '../../view/footer/footer.php'; ?>
</body>
<script>
  // Obtener el valor del H1
  var h1Value = document.getElementById('count').innerText;
  console.log(h1Value);

  // Buscar el span con "###"
  var spanElement = document.querySelector('.contador');

  // Asignar el valor del H1 al span
  spanElement.innerText = h1Value;
</script>
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

<script src="../../assets/vendor/libs/jquery/jquery.js"></script>
<script src="../../assets/vendor/libs/highlight/highlight.js"></script>
<script src="../../assets/vendor/libs/clipboard/clipboard.js"></script>
<script src="../../assets/vendor/libs/popper/popper.js"></script>
<script src="../../assets/vendor/js/bootstrap.js"></script>
<script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../../assets/vendor/js/menu.js"></script>
<script src="../../assets/js/main.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
<script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
<script src="../../assets/js/docs.js"></script>
<script src="../../assets/js/bloques.js"></script>
<script src="../../assets/js/alumnos.js"></script>
<script async defer src="https://buttons.github.io/buttons.js"></script>

</html>