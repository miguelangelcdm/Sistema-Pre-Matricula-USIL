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
              <div class="card card-body" style="height:100%;width:100%; background-color: rgba(255, 255, 255, 0.6);">
                <div class="d-flex" id="lays" style="height:100%;justify-content:space-between">
                  <div class="card" id="firstbot" style="width:25%">
                    <h5 class="card-header">Filtros</h5>
                    <div class="card-body">
                      <div class="mb-3">
                        <label class="form-label">Seleccionar Malla</label>
                        <?php
                        use controller\CursosController;

                        require_once('controller/CursoController.php');


                        $obj = new CursosController();
                        $carrera = $user['carrera'];
                        $data = $obj->getMallas($carrera);

                        echo "<select name='mallaid' class='form-select' id='select-malla' aria-label='Default select example'>";


                        if (empty($data)) {
                          echo "<option value=''>No hay datos disponibles</option>";
                        } else {
                          $v = 0;
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
                        ?>
                        <select class='form-select mt-3' id='select-ciclo' aria-label='Default select example'>
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
                        </select>
                      </div>
                    </div>
                    <form action="view/detalle/constancia.php" method="POST">
                      <input type="hidden" name="action" value="constancia">
                      <input type="submit" value="Constancia" class="btn btn-primary"
                        style="max-width:150px;margin:1rem" name="btn_malla">
                    </form>
                  </div>
                  <div class="card" style="width:72%">
                    <div class="card-datatable table-responsive py-0">

                      <form action="view/detalle/constancia.php" method="POST" id="myForm">
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
                            echo "<input type='text' hidden=true name='alumno_codigo_alumno' value='" . $idalu . "'>";

                            if (!empty($lcursos)) {
                              $counter = 0; // Initialize the counter variable
                            
                              foreach ($lcursos as $row) {
                                if (isset($row['checked']) && $row['checked']) {
                                  $counter += $row['creditos'];
                                  $selectedCourses[] = $row;
                                }

                                echo "<tr id='fila-" . $row['idcurso'] . "'>";
                                echo "<td align='center'>" . $row['mallaid'] . "</td>";
                                echo "<td align='center'>" . $row['codigo'] . "</td>";
                                echo "<td>" . $row['nombre'] . "</td>";
                                echo "<td align='center'>" . $row['ciclo'] . "</td>";
                                echo "<td align='center'>" . $row['horas'] . "</td>";
                                echo "<td align='center' style='background-color:aliceblue'>" . $row['creditos'] . "</td>";
                                echo "<td align='center'>
                <select id='turnoSelect-" . $row['idcurso'] . "' class='form-select form-select-sm' name='turno_" . $row['idcurso'] . "'>
                  <option value='Indistinto'>Indistinto</option>
                  <option value='Mañana'>Mañana</option>
                  <option value='Tarde'>Tarde</option>
                  <option value='Noche'>Noche</option>
                </select>
              </td>";
                                echo "<td class='dt-checkboxes-cell' style='text-align:center'>
                <input type='checkbox' class='dt-checkboxes form-check-input' onchange='updateCounter(this, " . $row['creditos'] . ")' name='cursos_seleccionados[]' value='" . $row['idcurso'] . "'>
              </td>";
                                echo "<input type='text' hidden=true name='idcurso[]' value='" . $row['idcurso'] . "'>";
                                //echo "<input type='text'  name='idcurso[]' value='" . $row['idcurso'] . "'>";
                            
                                // if (isset($row['checked']) && $row['checked']) {
                                //   echo "<input type='text' hidden=true name='idcurso[]' value='" . $row['idcurso'] . "'>";
                                // }
                            
                                echo "</tr>";
                              }
                            }
                            ?>
                          </tbody>
                          <script>
                            document.addEventListener("DOMContentLoaded", function () {
                              // Reset the select options to "Indistinto"
                              var selectElements = document.querySelectorAll('select[name^="turno_"]');
                              for (var i = 0; i < selectElements.length; i++) {
                                selectElements[i].value = "Indistinto";
                              }
                            });
                          </script>
                          <tfoot>
                            <tr>
                              <td colspan="8" style="text-align: right;">
                                <input type="submit" class="btn btn-primary" style="max-width:150px;margin:1rem"
                                  name="registerMatricula" value="Registrar">
                              </td>
                            </tr>
                          </tfoot>
                        </table>
                      </form>
                      <!-- Modal con cursos -->
                      <div class="modal fade" id="modalCursos" tabindex="-1" style="display: none;" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalCenterTitle">Cursos Matriculados</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
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
                                  </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                  <!-- Js Generated Content -->
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
    </div>
  </div>
</body>
<script>
  document.getElementById('myForm').addEventListener('submit', function(event) {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    var idCursoInputs = document.querySelectorAll('input[name="idcurso[]"]');

    // Crear una matriz para almacenar los valores seleccionados
    var selectedIdCursos = [];

    checkboxes.forEach(function(checkbox, index) {
      if (checkbox.checked) {
        // Agregar el valor correspondiente a la matriz
        selectedIdCursos.push(idCursoInputs[index].getAttribute('value'));
      }
    });

    // Asignar los valores seleccionados al campo de entrada 'idcurso[]'
    document.querySelectorAll('input[name="idcurso[]"]').forEach(function(input) {
      // Verificar si el valor está presente en la matriz de valores seleccionados
      if (selectedIdCursos.includes(input.getAttribute('value'))) {
        input.removeAttribute('disabled');
      } else {
        input.setAttribute('disabled', 'disabled');
      }
    });
  });
</script>

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
<script>
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
</script>







