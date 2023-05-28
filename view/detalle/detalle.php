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
              <div class="card card-body" style="height:100%; background-color: rgba(255, 255, 255, 0.6);">
                <div class="d-flex" style="height:100%;justify-content:space-around">
                  <div class="card mb-4" style="width:25%">
                    <h5 class="card-header">Malla</h5>
                    <div class="card-body">
                      <div>
                        <label for="defaultFormControlInput" class="form-label">Name</label>
                        <input type="text" class="form-control" id="defaultFormControlInput" placeholder="John Doe"
                          aria-describedby="defaultFormControlHelp">
                        <div id="defaultFormControlHelp" class="form-text">
                          We'll never share your details with anyone else.
                        </div>
                      </div>
                    </div>
                    <button type="button" class="btn btn-primary" style="max-width:150px;margin:1rem">Confirmar</button>
                  </div>
                  
                  <div class="card mb-4" style="width:70%">
                    <h5 class="card-header">Listado de Cursos</h5>
                    <div class="card-body">
                      <div class="card">
                        <h5 class="card-header">Hoverable rows</h5>
                        <div class="table-responsive text-nowrap">
                          <table class="table table-hover">
                        <!-- selector -->
                        <div class="datatable-dropdow"> 
                          <label>
                            <select class="datatable-selector">
                              <option value="5">5</option>
                              <option value="10" selected>10</option>
                              <option value="15">15</option>
                              <option value="20">20</option>
                              <option value="25">25</option>
                            </select>
                            "CANTIDAD"
                          </label>
                        <div>
                            
                            <!-- BUSCAR -->
                          <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                            <div class="input-group">
                              <input class="form-control" type="text" placeholder="BUSCAR" aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                              <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                            </div>
                          </form>
                          <!-- BUSCAR-->
                          
                            
                            <thead>
                              <tr>
                                <th>Nombre</th>
                                <th>Creditos</th>
                                <th>Cilco</th>
                                <th>Agregar</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                              <tr>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> 
                                <strong>Angular Project</strong></td>
                                <td>Albert Cook</td>
                                </td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td class="dt-checkboxes-cell" style>
                                    <input type="checkbox" class="dt-checkboxes form-check-input">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><i class="fab fa-react fa-lg text-info me-3"></i> <strong>React Project</strong>
                                </td>
                                <td>Barry Hunter</td>
                                </td>
                                <td><span class="badge bg-label-success me-1">Completed</span></td>
                                <td class="dt-checkboxes-cell" style>
                                    <input type="checkbox" class="dt-checkboxes form-check-input">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td><i class="fab fa-vuejs fa-lg text-success me-3"></i> <strong>VueJs Project</strong>
                                </td>
                                <td>Trevor Baker</td>
                                </td>
                                <td><span class="badge bg-label-info me-1">Scheduled</span></td>
                                <td class="dt-checkboxes-cell" style>
                                    <input type="checkbox" class="dt-checkboxes form-check-input">
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  <i class="fab fa-bootstrap fa-lg text-primary me-3"></i> <strong>Bootstrap
                                    Project</strong>
                                </td>
                                <td>Jerry Milton</td>
                        
                                  </ul>
                                </td>
                                <td><span class="badge bg-label-warning me-1">Pending</span></td>
                                <td class="dt-checkboxes-cell" style>
                                    <input type="checkbox" class="dt-checkboxes form-check-input">
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between row">
                      <div class="col-sm-12 col-md-6">
                      </div>
                      <div class="col-sm-12 col-md-6">
                        <div class="dataTables_info" id="DataTables_Table_0_info" role="status" aria-live="polite">Showing 1 to 7 of 100 entries</div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                      <div class="dataTables_paginate paging_simple_numbers" id="DataTables_Table_0_paginate">
                        <ul class="pagination">
                          <li class="paginate_button page-item previous disabled" id="DataTables_Table_0_previous">
                            <a href="#" aria-controls="DataTables Table_0" data-dt-idx="previous" tabindex="0" class="page-link">Previous</a>
                          </li>
                          <li class="paginate_button page-item active">
                            <a href="#" aria-controls="DataTables Table_0" data-dt-idx="0" tabindex="0" class="page-link">1</a>
                          </li>
                          <li class="paginate_button page-item">
                            <a href="#" aria-controls="DataTables Table_0" data-dt-idx="1" tabindex="0" class="page-link">2</a>
                          </li>
                          <li class="paginate_button page-item">
                            <a href="#" aria-controls="DataTables Table_0" data-dt-idx="2" tabindex="0" class="page-link">3</a>
                          </li>
                          <li class="paginate_button page-item">
                            <a href="#" aria-controls="DataTables Table_0" data-dt-idx="3" tabindex="0" class="page-link">4</a>
                          </li>
                          <li class="paginate_button page-item">
                            <a href="#" aria-controls="DataTables Table_0" data-dt-idx="4" tabindex="0" class="page-link">5</a>
                          </li>
                          <li class="paginate_button page-item disabled" id="DataTables_Table_0_ellipsis">
                            <a href="#" aria-controls="DataTables Table_0" data-dt-idx="ellipsis" tabindex="0" class="page-link"></a>
                          </li>
                          <li class="paginate_button page-item">
                            <a href="#" aria-controls="DataTables Table_0" data-dt-idx="14" tabindex="0" class="page-link">15</a>
                          </li>
                          <li class="paginate_button page-item next" id="DataTables_Table_0_next">
                            <a href="#" aria-controls="DataTables_Table_0" data-dt-idx="next" tabindex="0" class="page-link">Next</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
              
            <!--/ Layout Demo -->
          </div>
          <!-- / Content -->
          <!-- <div class="content-backdrop fade"></div> -->
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>
  </div>
  <!-- / Layout wrapper -->

  <!-- <div class="buy-now">
      <a
        href="https://themeselection.com/products/sneat-bootstrap-html-admin-template/"
        target="_blank"
        class="btn btn-danger btn-buy-now"
        >Upgrade to Pro</a
      >
    </div> -->

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