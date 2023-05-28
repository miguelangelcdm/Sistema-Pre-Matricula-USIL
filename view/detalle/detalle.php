<body>
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
            <div class="layout-demo-wrapper bg2" style="height:100%">
              <div class="card card-body" style="height:100%; background-color: rgba(255, 255, 255, 0.6);">
                <div class="d-flex" id="lays" style="height:100%;justify-content:space-around">
                  <div class="card mb-4" style="width:25%">
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
                            foreach($data as $row){
                                echo "<option value='" . $row['mallaid'] . "'>" . $row['mallaid'] . "</option>";
                            }
                        }
                        echo "</select>";                      
                        ?> 
                      </div>
                    </div>
                    <a href="view/detalle/constancia.php" type="button" class="btn btn-primary"
                      style="max-width:150px;margin:1rem">Confirmar</a>
                  </div>
                  <div class="card mb-4" style="width:70%">
                    <h5 class="card-header">Listado de Cursos</h5>
                    <div class="card-body">
                      <div class="card-datatable table-responsive pt-0">
                        <table class="datatables-basic table border-top">
                          <thead>
                            <tr>
                              <th>Nombre</th>
                              <th>Creditos</th>
                              <th>Ciclo</th>
                              <th>Turno</th>
                              <th>Agregar</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i>
                                <strong>POO</strong>
                              </td>
                              <td>4</td>
                              <td>3</td>
                              <td style="width:20%">
                                <select class="form-select" id="exampleFormControlSelect1"
                                  aria-label="Default select example">
                                  <option selected="">Indistinto</option>
                                  <option value="1">Mañana</option>
                                  <option value="2">Tarde</option>
                                  <option value="3">Noche</option>
                                </select>
                              </td>
                              <td class="dt-checkboxes-cell" style="text-align:center">
                                <input type="checkbox" class="dt-checkboxes form-check-input">
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!--/ Layout Demo -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>