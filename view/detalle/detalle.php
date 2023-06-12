<?php
use controller\CursosController;
use controller\AlumnoController;

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/controller/MatriculaController.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/controller/AlumnoController.php');
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/controller/CursoController.php');

global $obj;
global $objM;
global $credit_counter;
?>

<body class="bg2">
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar layout-without-menu" style="flex-direction: column;">
    <div class="layout-container" style="min-height:87vh">
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y"
            style="max-width:100%;padding-top:0.3rem!important;opacity:0.9">
            <!-- Layout Demo -->
            <div class="layout-demo-wrapper" style="height:100%">
              <div class="card" style="width:100%;height:100%">
                <div class="card card-header justify-content-between" style="flex-direction:row;padding:1rem">
                  <div class="d-flex flex-row align-items-center">
                    <div class="me-3">
                      <select class='form-select' id='select-carrera' aria-label='Default select example'>
                        <option value='' selected>Seleccione Carrera</option>
                        <option value='Ingenieria en Sistemas de Informacion'>Ingenieria en Sistemas de Información
                        </option>
                        <option value='Ingenieria de Software'>Ingenieria de Software</option>
                        <option value='Ciencia de Datos'>Ciencia de Datos</option>

                      </select>
                    </div>
                    <div>
                      <select class='form-select' id='select-malla' aria-label='Default select example'>
                        <option value="">-</option>
                      </select>
                    </div>
                    <i class='bx bx-question-mark' style="margin-right:0.5rem; font-size:1.5rem" data-bs-toggle="tooltip" data-bs-offset="0,4"
                      data-bs-placement="top" data-bs-html="true"
                      data-bs-original-title="<span>Consulta tu malla en infosil</span>"></i>
                    <div>
                      <select class='form-select' id='select-ciclo' aria-label='Default select example'>
                        <option value='' selected>Seleccione Ciclo</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                        <option value='8'>8</option>
                        <option value='9'>9</option>
                        <option value='10'>10</option>
                      </select>
                    </div>
                  </div>
                  <div>
                    <div class="btn btn-outline-primary me-3" type="button" data-bs-toggle="modal"
                      data-bs-target="#modalCursos" style="cursor:alias">
                      <span class="dismin">Créditos:</span><span class="badge bg-white text-primary ms-1 "><span
                          class="counter">0</span>/22</span>
                    </div>
                    <a href="detalle/bloques.php">
                      <div class="create-new btn btn-primary">
                        <i class="bx bx-list-check"></i> <span class="d-none d-lg-inline-block">Listado de
                          bloques</span>
                      </div>
                    </a>
                  </div>
                </div>
                <div class="card card-body card-datatable table-responsive py-0">
                  <table class="datatables-basic table border-top" id="main-dt">
                    <thead>
                      <tr>
                        <th>Carrera</th>
                        <th>Malla</th>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Ciclo</th>
                        <th>Horas</th>
                        <th>Creditos</th>
                        <th>Turno</th>
                        <th>Agregar</th>
                        <!-- <th>Input</th> -->
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <?php
                      $obj = new CursosController();
                      $objA = new AlumnoController();
                      //$lcursos = $obj->getCursos($carrera);
                      $lcursos = $obj->getAllCursos();
                      $idalu = $user['codigo_alumno'];

                      if (!empty($lcursos)) {
                        $counter = 0; // Inicializar la variable de contador
                      
                        foreach ($lcursos as $row) {
                          if (isset($_POST['registerMatricula_' . $row['idcurso']])) {
                            //$turno = $_POST["turno_" . $row['idcurso']];
                            $turno = isset($_POST["turno_" . $row['idcurso']]) ? $_POST["turno_" . $row['idcurso']] : null;

                            $cursos_idcursos = $row['idcurso'];

                            // echo "<h1>Alumno:".$idalu."</h1>";     
                            // echo "<h1>Curso:".$cursos_idcursos."</h1>";     
                            // echo "<h1>Turno:".$turno."</h1>";                   
                            $objM = new MatriculaController();

                            $ca = $obj->findById($cursos_idcursos);
                            //$credit_counter += $ca['creditos'];
                            //echo $credit_counter;
                            //echo "<h1 id='counter' style='display:none'>".$credit_counter."</h1>";
                            $objM->registrarMatricula($idalu, $cursos_idcursos, $turno);
                            // header("Location: " . $_SERVER['PHP_SELF']);
                            // exit;
                            //echo "<h1>CC:".$ca['creditos']."</h1>";     
                      
                            //echo '<h1>Registrado correctamente</h1>';
                          } else {
                            echo "<tr id='fila-" . $row['idcurso'] . "'>";
                            echo "<form action='" . $_SERVER['PHP_SELF'] . "' method='POST' name='formss-" . $row['idcurso'] . "'>";
                            // echo "<form action='view/detalle/constancia.php' method='POST' name='formss-" . $row['idcurso'] . "'>";
                            // echo "<input type='text' hidden=true name='alumno_codigo_alumno' value='" . $idalu . "'>";
                            echo "<td align='center'>" . $row['carrera'] . "</td>";
                            echo "<td align='center'>" . $row['mallaid'] . "</td>";
                            echo "<td align='center'>" . $row['codigo'] . "</td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td align='center'>" . $row['ciclo'] . "</td>";
                            echo "<td align='center'>" . $row['horas'] . "</td>";
                            echo "<td align='center' id='cred' style='background-color:aliceblue'>" . $row['creditos'] . "</td>";
                            echo "<td align='center'>
                                      <select id='turnoSelect-" . $row['idcurso'] . "' class='form-select form-select-sm' name='turno_" . $row['idcurso'] . "'>                    
                                          <option value='mañana' selected>Mañana</option>
                                          <option value='tarde'>Tarde</option>
                                          <option value='noche'>Noche</option>
                                      </select>
                                  </td>";
                            //echo "<input type='number' hidden=true name='cursos_idcursos' value='" . $row['idcurso'] . "'>";
                            echo "<input type='number' hidden=true name='cursos_idcursos_" . $row['idcurso'] . "' value='" . $row['idcurso'] . "'>";


                            echo "<td colspan='8' style='text-align: center;'>
                                      <input id='buts' type='submit' class='btn btn-primary' style='max-width:150px;margin:1rem' name='registerMatricula_" . $row['idcurso'] . "' value='Registrar'>
                                  </td>";
                            echo "</form>";
                            echo "</tr>";
                          }
                        }
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

  <!-- Modal con cursos -->
  <div class="modal fade" id="modalCursos" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Cursos Matriculados</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style="padding:0.5rem">
          <table class="datatables-basic2 table border-top" id="selectedCoursesTable">
            <thead>
              <tr>
                <!-- <th>Malla</th> -->
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Ciclo</th>
                <th>Horas</th>
                <th>Creditos</th>
                <th>Turno</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php
              $obj = new CursosController();
              $objM = new MatriculaController();
              $uid = $user['codigo_alumno'];
              global $cmatriculados;
              $cmatriculados = $objM->getCursosMatriculados($uid);

              if (!empty($cmatriculados)) {
                foreach ($cmatriculados as $row) {
                  if (isset($_POST['deleteMatricula' . $row['idcurso']])) {
                    $cid = $_POST['idcurso'];
                    $objM->deleteMatricula($uid, $cid);
                  } else {
                    $credit_counter += $row['creditos'];
                    echo "<tr>";
                    echo "<td>" . $row['codigo'] . "</td>";
                    echo "<td>" . $row['nombre'] . "</td>";
                    echo "<td>" . $row['ciclo'] . "</td>";
                    echo "<td>" . $row['horas'] . "</td>";
                    echo "<td>" . $row['creditos'] . "</td>";
                    echo "<td>" . $row['turno'] . "</td>";
                    echo "<td>
                        <form method='post' action='" . $_SERVER['PHP_SELF'] . "'>
                            <input type='hidden' name='idcurso' value='" . $row['idcurso'] . "'>
                            <button type='submit' class='btn btn-primary' style='max-width:150px;margin:1rem' name='deleteMatricula" . $row['idcurso'] . "'>Eliminar</button>
                        </form>
                    </td>";
                    echo "</tr>";
                  }
                }
                echo "<h1 id='counter' style='display:none'>" . $credit_counter . "</h1>";
              } else {

              }
              ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>


  <!-- Contadores & Dropdowns -->
</body>
<script>
  function submitForms() {
    var forms = document.getElementsByName("formss");
    for (var i = 0; i < forms.length; i++) {
      forms[i].submit();
    }
  }
</script>
<script>
  // Obtener el valor del H1
  var h1Value = document.getElementById('counter').innerText;
  console.log(h1Value);
  // Buscar el span con "###"
  var spanElement = document.querySelector('.counter');
  // Asignar el valor del H1 al span
  spanElement.innerText = h1Value;

  // Verificar si el valor del contador es mayor o igual a 22
  if (parseInt(h1Value) >= 22) {
    // Obtener todos los botones con el nombre "registerMatricula_"
    var buttons = document.querySelectorAll("[name^='registerMatricula_']");

    // Recorrer los botones y deshabilitarlos
    buttons.forEach(function (button) {
      button.disabled = true;
    });
  } else {
    // Obtener todos los formularios con los botones "registerMatricula_"
    var forms = document.querySelectorAll("tr[id^='fila-']");

    // Obtener el valor máximo permitido para el contador
    var maxCredits = 22 - h1Value;

    // Recorrer los formularios y deshabilitar los botones si los créditos superan el límite
    forms.forEach(function (form) {
      var creditosElement = form.querySelector("#cred");
      var creditos = parseInt(creditosElement.innerText);
      if (creditos > maxCredits) {
        var targetButton = form.querySelector("input[name^='registerMatricula_']");
        targetButton.disabled = true;
      }
    });
  }

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