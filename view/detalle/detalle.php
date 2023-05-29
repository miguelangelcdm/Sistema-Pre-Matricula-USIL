<body class="bg2">

  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container" style="min-height:87vh">
      <!-- Layout container -->
      <div class="layout-page">
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y" style="max-width:100%">
            <!-- Layout Demo -->
            <div class="layout-demo-wrapper" style="height:100%">
              <div class="card card-body" style="height:100%;width:100%; background-color: rgba(255, 255, 255, 0.6);">
                <div class="d-flex" style="height:100%;justify-content:space-between">
                  <div class="card" style="width:25%">
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
                    <div class="card-datatable table-responsive pt-0">
                      <table class="datatables-basic table border-top">
                        <thead>
                          <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Creditos</th>
                            <th>Ciclo</th>
                            <th>Horas</th>
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
                                echo "<tr>";
                                echo "<td align='center'>" . $row['codigo'] . "</td>";
                                echo "<td align='center'>" . $row['nombre'] . "</td>";
                                echo "<td align='center'>" . $row['creditos'] . "</td>";
                                echo "<td align='center'>" . $row['ciclo'] . "</td>";
                                echo "<td align='center'>" . $row['horas'] . "</td>";
                                echo "<td class='dt-checkboxes-cell'><input type='checkbox' class='dt-checkboxes form-check-input'></td>";
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
                              echo "<tr>";
                              echo "<td align='center'>" . $row['codigo'] . "</td>";
                              echo "<td align='center'>" . $row['nombre'] . "</td>";
                              echo "<td align='center'>" . $row['creditos'] . "</td>";
                              echo "<td align='center'>" . $row['ciclo'] . "</td>";
                              echo "<td align='center'>" . $row['horas'] . "</td>";
                              echo "<td class='dt-checkboxes-cell'><input type='checkbox' class='dt-checkboxes form-check-input'></td>";
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