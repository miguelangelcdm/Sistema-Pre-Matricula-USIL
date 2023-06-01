<!-- Modal con cursos -->
<div class="modal fade" id="modalCursos" tabindex="-1" style="display: none;" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalCenterTitle">Cursos Matriculados</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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
            global $credit_counter;
            require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/controller/MatriculaController.php');
            $objM = new MatriculaController();
            $uid = $user['codigo_alumno'];
            $cmatriculados = $objM->getCursosMatriculados($uid);
            foreach ($cmatriculados as $row) {
              $credit_counter += $row['creditos'];
              echo "<tr>";
              echo "<td>" . $row['codigo'] . "</td>";
              echo "<td>" . $row['nombre'] . "</td>";
              echo "<td>" . $row['ciclo'] . "</td>";
              echo "<td>" . $row['horas'] . "</td>";
              echo "<td>" . $row['creditos'] . "</td>";
              echo "<td>" . $row['turno'] . "</td>";
                                    echo "<td>
                                    <form action='controller/MatriculaController.php' method='POST'>
                                    <!-- Campo para enviar el ID del registro a borrar -->
                                    <input type='hidden'  name='curso_id" . $row['idcurso'] . "' value='" . $row['idcurso'] . "'>  
                                    <input type='hidden'  name='alumno_id" . $row['idcurso'] . "' value='".$uid."'>  
                                    <!-- Botón para confirmar el borrado -->
                                    <input type='submit' class='btn btn-primary' style='max-width:150px;margin:1rem' name='delete_matricula" . $row['idcurso'] . "' value='Eliminar'>
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
</div>

<body class="bg2">
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar layout-without-menu" style="flex-direction: column;">
    <div class="layout-container" style="min-height:87vh">
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y" style="max-width:100%;padding-top:0.3rem!important;">
            <!-- Layout Demo -->
            <div class="layout-demo-wrapper" style="height:100%">
              <div class="card" style="width:100%;height:100%">
                <div class="card card-header justify-content-between" style="flex-direction:row;padding:1rem">
                  <div class="d-flex flex-row align-items-center">
                    <div class="me-3" style="width: auto;">
                      <?php
                      use controller\CursosController;

                      require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/controller/CursoController.php');
                      $obj = new CursosController();
                      $carrera = $user['carrera'];
                      $data = $obj->getMallas($carrera);
                      echo "<select name='mallaid' class='form-select' id='select-malla' aria-label='Default select example'>";
                      if (empty($data)) {
                        echo "<option value=''>No hay datos disponibles</option>";
                      } else {
                        $v = 0;
                        echo "<option value='0'>Seleccione una malla</option>";
                        foreach ($data as $row) {
                          if ($v = 0) {
                            echo "<option value='" . $row['mallaid'] . "' selected>" . $row['mallaid'] . "</option>";
                            $v += 1;
                          } else {
                            echo "<option value='" . $row['mallaid'] . "'>" . $row['mallaid'] . "</option>";
                          }

                        }
                      }
                      echo "</select>";
                      //session_start();
                      // Verificar si la sesión está iniciada
                      if (session_status() === PHP_SESSION_ACTIVE) {
                        // Verificar si la variable $_SESSION['user_id'] está definida
                        if (isset($_SESSION['user_id'])) {
                          // Obtener el valor de 'user_id'
                          $userId = $_SESSION['user_id'];

                          // Utilizar el valor de 'user_id' como sea necesario
                          // echo "User ID: " . $userId;
                        } else {
                          // La variable $_SESSION['user_id'] no está definida
                          echo "No se ha establecido el ID de usuario en la sesión";
                        }
                      } else {
                        // La sesión no está iniciada
                        echo "No se ha iniciado sesión";
                      }
                      ?>
                    </div>
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
                          class="counter">
                          <?php echo $credit_counter; ?>
                        </span>/22</span>
                    </div>
                    <div class="create-new btn btn-primary">
                      <i class="bx bx-list-check"></i> <span class="d-none d-lg-inline-block">Listado de
                        bloques</span>
                    </div>
                  </div>
                </div>
                <div class="card card-body card-datatable table-responsive py-0">
                  <table class="datatables-basic table border-top" id="main-dt">
                    <thead>
                      <tr>
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
                      $lcursos = $obj->getCursos($carrera);
                      $idalu = $user['codigo_alumno'];

                      if (!empty($lcursos)) {
                        $counter = 0; // Inicializar la variable de contador
                      
                        foreach ($lcursos as $row) {
                          if (isset($row['checked']) && $row['checked']) {
                            $counter += $row['creditos'];
                            $selectedCourses[] = $row;
                          }

                          echo "<tr id='fila-" . $row['idcurso'] . "'>";
                          echo "<form action='view/detalle/constancia.php' method='POST' name='formss-" . $row['idcurso'] . "'>";
                          // echo "<input type='text' hidden=true name='alumno_codigo_alumno' value='" . $idalu . "'>";
                          echo "<td align='center'>" . $row['mallaid'] . "</td>";
                          echo "<td align='center'>" . $row['codigo'] . "</td>";
                          echo "<td>" . $row['nombre'] . "</td>";
                          echo "<td align='center'>" . $row['ciclo'] . "</td>";
                          echo "<td align='center'>" . $row['horas'] . "</td>";
                          echo "<td align='center' style='background-color:aliceblue'>" . $row['creditos'] . "</td>";
                          echo "<td align='center'>
                                    <select id='turnoSelect-" . $row['idcurso'] . "' class='form-select form-select-sm' name='turno_" . $row['idcurso'] . "'>                    
                                        <option value='mañana'>Mañana</option>
                                        <option value='tarde'>Tarde</option>
                                        <option value='noche'>Noche</option>
                                    </select>
                                </td>";
                          //echo "<input type='number' hidden=true name='cursos_idcursos' value='" . $row['idcurso'] . "'>";
                          echo "<input type='number' hidden=true name='cursos_idcursos_" . $row['idcurso'] . "' value='" . $row['idcurso'] . "'>";


                          echo "<td colspan='8' style='text-align: right;'>
                                    <input type='submit' class='btn btn-primary' style='max-width:150px;margin:1rem' name='registerMatricula_" . $row['idcurso'] . "' value='Registrar'>
                                </td>";
                          echo "</form>";
                          echo "</tr>";
                        }
                      }
                      ?>
                    </tbody>
                    <!-- <script>
                      document.addEventListener("DOMContentLoaded", function () {
                        // Reset the select options to "Indistinto"
                        var selectElements = document.querySelectorAll('select[name^="turno_"]');
                        for (var i = 0; i < selectElements.length; i++) {
                          selectElements[i].value = "Indistinto";
                        }
                      });
                    </script> -->
                  </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
<script>
  function submitForms() {
    var forms = document.getElementsByName("formss");
    for (var i = 0; i < forms.length; i++) {
      forms[i].submit();
    }
  }
</script>
<!-- <script>
  document.getElementById('myForm').addEventListener('submit', function (event) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var idCursoInputs = document.querySelectorAll('input[name="idcurso[]"]');

    // Crear una matriz para almacenar los valores seleccionados
    var selectedIdCursos = [];

    checkboxes.forEach(function (checkbox, index) {
      if (checkbox.checked) {
        // Agregar el valor correspondiente a la matriz
        selectedIdCursos.push(idCursoInputs[index].getAttribute('value'));
      }
    });

    // Asignar los valores seleccionados al campo de entrada 'idcurso[]'
    document.querySelectorAll('input[name="idcurso[]"]').forEach(function (input) {
      // Verificar si el valor está presente en la matriz de valores seleccionados
      if (selectedIdCursos.includes(input.getAttribute('value'))) {
        input.removeAttribute('disabled');
      } else {
        input.setAttribute('disabled', 'disabled');
      }
    });
  });
</script> -->

<!-- JavaScript para la búsqueda dinámica -->
<!-- <script>
  // Obtener referencia al campo de búsqueda
  var searchInput = document.getElementById('exampleFormControlSelect1');

  // Obtener referencia a la tabla
  var table = document.getElementsByTagName('table')[0];

  // Obtener todas las filas de la tabla
  var rows = table.getElementsByTagName('tr');

  // Agregar evento input al campo de búsqueda
  searchInput.addEventListener('change', function (event) {
    var searchText = event.value.toLowerCase();
    // Recorrer todas las filas de la tabla
    for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      var rowData = row.getElementsByTagName('td');
      var found = false;
      // Verificar si el texto de búsqueda coincide con alguna celda de la fila
      for (var j = 0; j < rowData.length; j++) {
        var cellData = rowData[j].textContent.toLowerCase();
        if (cellData.includes(searchText)) {
          found = true;
          break;
        }
      }

      // Mostrar u ocultar la fila según si se encuentra el texto de búsqueda
      if (found) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    }
  });
</script> -->
<!-- <script>
  // Función para filtrar la tabla
  function filterTable() {
    // Obtener referencia al campo de búsqueda
    var searchInput = document.getElementById('exampleFormControlSelect1');

    // Obtener referencia a la tabla
    var table = document.getElementsByTagName('table')[0];

    // Obtener todas las filas de la tabla
    var rows = table.getElementsByTagName('tr');

    // Obtener el valor de búsqueda
    var searchText = searchInput.value.toLowerCase();

    // Recorrer todas las filas de la tabla
    for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      var rowData = row.getElementsByTagName('td');
      var found = false;
      // Verificar si el texto de búsqueda coincide con alguna celda de la fila
      for (var j = 0; j < rowData.length; j++) {
        var cellData = rowData[j].textContent.toLowerCase();
        if (cellData.includes(searchText)) {
          found = true;
          break;
        }
      }

      // Mostrar u ocultar la fila según si se encuentra el texto de búsqueda
      if (found) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    }
  }

  // Llamar a la función filterTable al cargar la página
  window.addEventListener('load', filterTable);
</script> -->