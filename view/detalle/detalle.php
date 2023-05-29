<body class="bg2">

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
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
                        <form method="post" action="view/detalle/detalle.php">
                          <label for="exampleFormControlSelect1" class="form-label">Seleccionar Malla</label>
                          <?php
                          use controller\CursosController;

                          require_once('controller/CursoController.php');
                          $obj = new CursosController();
                          $data = $obj->getMallas();

                          echo "<select name='mallaid' class='form-select' id='exampleFormControlSelect1' aria-label='Default select example'>";

                          if (empty($data)) {
                            echo "<option value=''>No hay datos disponibles</option>";
                          } else {
                            echo "<option value=''>Selecciona una malla</option>";
                            foreach ($data as $row) {
                              echo "<option value='" . $row['mallaid'] . "'>" . $row['mallaid'] . "</option>";
                            }
                          }
                          echo "</select>";
                          ?>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary" style="max-width:150px;margin:1rem" value="Filtrar"
                      name="btn_malla"></input>
                    </form>
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
                          $objCurso = new CursosController();
                          $lcursos = $objCurso->getallCursos();
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
  </div>
</body>

<!-- JavaScript para la búsqueda dinámica -->
<script>
  // Obtener referencia al campo de búsqueda
  var searchInput = document.getElementById('exampleFormControlSelect1');

  // Obtener referencia a la tabla
  var table = document.getElementsByTagName('table')[0];

  // Obtener todas las filas de la tabla
  var rows = table.getElementsByTagName('tr');

  // Agregar evento input al campo de búsqueda
  // searchInput.addEventListener('change', function (event) {
  //   var searchText = event.target.value.toLowerCase();
  //   // Recorrer todas las filas de la tabla
  //   for (var i = 1; i < rows.length; i++) {
  //     var row = rows[i];
  //     var rowData = row.getElementsByTagName('td');
  //     var found = false;
  //     // Verificar si el texto de búsqueda coincide con alguna celda de la fila
  //     for (var j = 0; j < rowData.length; j++) {
  //       var cellData = rowData[j].textContent.toLowerCase();
  //       if (cellData ===searchText) {
  //         found = true;
  //         break;
  //       }
  //     }

  //     // Mostrar u ocultar la fila según si se encuentra el texto de búsqueda
  //     if (found) {
  //       row.style.display = '';
  //     } else {
  //       row.style.display = 'none';
  //     }
  //   }
  // });
  searchInput.addEventListener('change', function (event) {
    var searchText = event.target.value;
    // Recorrer todas las filas de la tabla
    for (var i = 1; i < rows.length; i++) {
      var row = rows[i];
      var rowData = row.getElementsByTagName('td');
      var cellData = rowData[0].textContent; // Assuming the 'mallaid' column is the first column (index 0)

      // Mostrar u ocultar la fila según si se encuentra el texto de búsqueda
      if (cellData === searchText) {
        row.style.display = '';
      } else {
        row.hidden = true;
      }
    }
  });

</script>