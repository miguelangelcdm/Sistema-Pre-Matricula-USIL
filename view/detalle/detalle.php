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
                        <?php
                        use controller\CursosController;

                        require_once('controller/CursoController.php');
                        $obj = new CursosController();
                        $data = $obj->getMallas();

                        echo "<select name='mallaid' class='form-select mt-3' id='select-malla' aria-label='Default select example'>";

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
                      </div>

                    </div>
                    <a type="button" class="btn btn-primary" style="margin:1rem" name="btn_malla"
                      href="view/detalle/bloques.php">Listado de bloques</a>
                  </div>
                  <div class="card" style="width:72%">
                    <div class="card-datatable table-responsive py-0">
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
                          </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                          <?php
                          // require_once('controller/CursoController.php');
                          $objCurso = new CursosController();
                          $lcursos = $objCurso->getallCursos();
                          $selectedCourses = [];
                          if (!empty($lcursos)) {
                            foreach ($lcursos as $row) {
                              if (isset($row['checked']) && $row['checked']) {
                                $counter += $row['creditos'];
                                $selectedCourses[] = $row;
                              }
                              echo "<tr>";
                              echo "<td align='center'>" . $row['mallaid'] . "</td>";
                              echo "<td align='center'>" . $row['codigo'] . "</td>";
                              echo "<td>" . $row['nombre'] . "</td>";
                              echo "<td align='center'>" . $row['ciclo'] . "</td>";
                              echo "<td align='center'>" . $row['horas'] . "</td>";
                              echo "<td align='center' style='background-color:aliceblue'>" . $row['creditos'] . "</td>";
                              echo "<td align='center'><select id='turnoSelect' class='form-select form-select-sm'>
                              <option value='Indistinto'>Indistinto</option>
                              <option value='Mañana'>Mañana</option>
                              <option value='Tarde'>Tarde</option>
                              <option value='Noche'>Noche</option>
                            </select></td>";
                              echo "<td class='dt-checkboxes-cell' style='text-align:center'><input type='checkbox' class='dt-checkboxes form-check-input' onchange='updateCounter(this, " . $row['creditos'] . ")'></td>";
                              echo "</tr>";
                            }
                          }
                          ?>
                        </tbody>
                      </table>
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
  </div>
</body>