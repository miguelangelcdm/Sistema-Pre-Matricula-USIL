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
                    <h5 class="card-header">Malla</h5>
                    <div class="card-body">
                      <div class="mb-3">
                          <label class="form-label">Seleccionar Malla</label>
                          <?php
                          use controller\CursosController;

                          require_once('controller/CursoController.php');
                          $obj = new CursosController();
                          $data = $obj->getMallas();

                          echo "<select name='mallaid' class='form-select' id='select-malla' aria-label='Default select example'>";

                          if (empty($data)) {
                            echo "<option value=''>No hay datos disponibles</option>";
                          } else {
                            foreach ($data as $row) {
                              echo "<option value='" . $row['mallaid'] . "'>" . $row['mallaid'] . "</option>";
                            }
                          }
                          echo "</select>";
                          ?>
                      </div>
                    </div>
                    <a type="button" class="btn btn-primary" style="max-width:150px;margin:1rem" name="btn_malla"
                      href="view/detalle/constancia.php">Confirmar</a>
                  </div>
                  <div class="card" style="width:72%">
                    <div class="card-datatable table-responsive py-0">
                      <table class="datatables-basic table border-top">
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
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          <?php
                          // require_once('controller/CursoController.php');
                          if (!isset($_POST['btn_malla'])) {
                            $objCurso = new CursosController();
                            $lcursos = $objCurso->getAllCursos();
                            if (!empty($lcursos)) {
                              foreach ($lcursos as $row) {
                                if (isset($row['checked']) && $row['checked']) {
                                  $counter += $row['creditos'];
                                }
                                echo "<tr>";
                                echo "<td align='center'>" . $row['mallaid'] . "</td>";
                                echo "<td align='center'>" . $row['codigo'] . "</td>";
                                echo "<td>" . $row['nombre'] . "</td>";
                                echo "<td align='center'>" . $row['ciclo'] . "</td>";
                                echo "<td align='center'>" . $row['horas'] . "</td>";
                                echo "<td align='center' style='background-color:aliceblue'>" . $row['creditos'] . "</td>";
                                echo "<td align='center'><select id='smallSelect' class='form-select form-select-sm'>
                                <option value='1'>Indistinto</option>
                                <option value='2'>Mañana</option>
                                <option value='3'>Tarde</option>
                                <option value='4'>Noche</option>
                              </select></td>";
                                echo "<td class='dt-checkboxes-cell' style='text-align:center'><input type='checkbox' class='dt-checkboxes form-check-input' onchange='updateCounter(this, " . $row['creditos'] . ")'></td>";
                                echo "</tr>";
                              }
                            } else {
                              echo "<tr>";
                              echo "<td colspan='6'>No hay cursos disponibles</td>";
                              echo "</tr>";
                            }
                          } else {
                            $mallaId = $_POST['mallaid'];
                            $objCurso = new CursosController();
                            $lcursos = $objCurso->getCursos($mallaId);
                            foreach ($lcursos as $row) {
                              
                              if (isset($row['checked']) && $row['checked']) {
                                $counter += $row['creditos'];
                              }
                              echo "<tr>";
                              echo "<td align='center'>" . $row['mallaid'] . "</td>";
                              echo "<td align='center'>" . $row['codigo'] . "</td>";
                              echo "<td align='center'>" . $row['nombre'] . "</td>";
                              echo "<td align='center'>" . $row['ciclo'] . "</td>";
                              echo "<td align='center'>" . $row['horas'] . "</td>";
                              echo "<td align='center' style='background-color:aliceblue'>" . $row['creditos'] . "</td>";
                              echo "<td align='center'><select id='smallSelect' class='form-select form-select-sm'>
                                <option value='1'>Indistinto</option>
                                <option value='2'>Mañana</option>
                                <option value='3'>Tarde</option>
                                <option value='4'>Noche</option>
                              </select></td>";
                              echo "<td class='dt-checkboxes-cell' style='text-align:center'><input type='checkbox' class='dt-checkboxes form-check-input' onchange='updateCounter(this, " . $row['creditos'] . ")'></td>";
                              echo "</tr>";
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
    </div>
    <!-- / Layout wrapper -->

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
<!-- JavaScript para la búsqueda dinámica -->
<!-- <script>
  // Obtener referencia al campo de búsqueda
  var searchInput = document.getElementById('searchInput');

  // Obtener referencia a la tabla
  var table = document.getElementsByTagName('table')[0];

  // Obtener todas las filas de la tabla
  var rows = table.getElementsByTagName('tr');

  // Agregar evento input al campo de búsqueda
  searchInput.addEventListener('input', function(event) {
    var searchText = event.target.value.toLowerCase();

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
</script>
<script>
  var filtroSelect = document.getElementById('filtro-select');
  var filasTabla = document.querySelectorAll('tbody tr');

  filtroSelect.addEventListener('change', function() {
    var filtroSeleccionado = filtroSelect.value;

    filasTabla.forEach(function(fila) {
      var valorFiltro = fila.querySelector('[data-filtro]').getAttribute('data-filtro');
      if (filtroSeleccionado === 'todos' || valorFiltro === filtroSeleccionado) {
        fila.style.display = '';
      } else {
        fila.style.display = 'none';
      }
    });
  });
</script> -->

<!-- JavaScript para el filtrado dinámico -->
<!-- <script>
  var selectMalla = document.getElementById('exampleFormControlSelect1');
  var rows = table.getElementsByTagName('tr');

  selectMalla.addEventListener('change', function(event) {
    var selectedValue = event.target.value.toLowerCase();

    // Recorrer todas las filas de la tabla
    for (var i = 1; i < rows.length; i++) {
      var row = rows[i][0].textContent.toLowerCase();
      if (row.includes(selectedValue)) {
        found = true;
        break;
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


