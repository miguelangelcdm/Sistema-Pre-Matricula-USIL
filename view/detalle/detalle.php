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
                            echo "<option value=''>Selecciona una malla</option>";
                            foreach ($data as $row) {
                              echo "<option value='" . $row['mallaid'] . "'>" . $row['mallaid'] . "</option>";
                            }
                          }
                          echo "</select>";
                          ?>
                          <label class="form-label">Seleccionar Ciclo</label>
                          <select  class='form-select' id='select-ciclo' aria-label='Default select example'>
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


