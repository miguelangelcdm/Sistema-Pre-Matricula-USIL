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
                                    <th>Actions</th>
                                  </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">                                
                                  <?php
                                  global $credit_counter;
                                  require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/controller/MatriculaController.php');
                                  $objM=new MatriculaController();
                                  $uid=$user['codigo_alumno'];;
                                  $cmatriculados=$objM->getCursosMatriculados($uid);
                                  foreach($cmatriculados as $row){
                                    $credit_counter+=$row['creditos'];
                                    echo"<tr>";
                                    echo "<td>".$row['codigo']."</td>";
                                    echo "<td>".$row['nombre']."</td>";
                                    echo "<td>".$row['ciclo']."</td>";
                                    echo "<td>".$row['horas']."</td>";
                                    echo "<td>".$row['creditos']."</td>";
                                    echo "<td>".$row['turno']."</td>";
                                    echo "<td>
                                    <form action='controller/MatriculaController.php' method='POST'>
                                    <!-- Campo para enviar el ID del registro a borrar -->
                                    <input type='hidden'  name='curso_id" . $row['idcurso'] . "' value='" . $row['idcurso'] . "'>  
                                    <input type='hidden'  name='alumno_id" . $row['idcurso'] . "' value='".$uid."'>  
                                    <!-- Botón para confirmar el borrado -->
                                    <input type='submit' class='btn btn-primary' style='max-width:150px;margin:1rem' name='delete_matricula" . $row['idcurso'] . "' value='Eliminar'>
                                  </form>
                                    </td>";
                                    echo"</tr>";

                                  }
                                  ?>


                                  <!-- <td align='center'>prueba</td>
                                  <td align='center'>prueba</td>
                                  <td align='center'>prueba</td>
                                  <td align='center'>prueba</td>
                                  <td align='center'>prueba</td>
                                  <td align='center'>prueba</td> -->
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
              <div class="card card-body" style="height:100%;width:100%; background-color: rgba(255, 255, 255, 0.6);">
                <div class="d-flex" id="lays" style="height:100%;justify-content:space-between">
                  <div class="card" id="firstbot" style="width:25%">
                    <h5 class="card-header">Filtros</h5>
                    <div class="card-body">
                      <div class="mb-3">
                        <label class="form-label">Seleccionar Malla</label>
                        <?php
                        use controller\CursosController;

                        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/controller/CursoController.php');


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
                        //session_start();

// Verificar si la sesión está iniciada
if (session_status() === PHP_SESSION_ACTIVE) {
    // Verificar si la variable $_SESSION['user_id'] está definida
    if (isset($_SESSION['user_id'])) {
        // Obtener el valor de 'user_id'
        $userId = $_SESSION['user_id'];

        // Utilizar el valor de 'user_id' como sea necesario
        echo "User ID: " . $userId;
    } else {
        // La variable $_SESSION['user_id'] no está definida
        echo "No se ha establecido el ID de usuario en la sesión";
    }
} else {
    // La sesión no está iniciada
    echo "No se ha iniciado sesión";
}

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
                    <!-- <form action="view/detalle/constancia.php" method="POST">
                      <input type="hidden" name="action" value="constancia">
                      <input type="submit" value="Constancia" class="btn btn-primary"
                        style="max-width:150px;margin:1rem" name="btn_malla">
                    </form> -->                
                  </div>
                  
                      
                  <div class="card" style="width:72%">
                    <div class="card-datatable table-responsive py-0">
                    <?php
                      echo "<div>".$credit_counter."</div>";
                      ?>    
                    

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
                          <!-- <tfoot>
                            <tr>
                              <td colspan="8" style="text-align: right;">
                                <input type="submit" class="btn btn-primary" style="max-width:150px;margin:1rem"
                                  name="registerMatricula" value="Registrar">
                              </td>
                            </tr>
                          </tfoot> -->
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
    </div>
  </div>
</body>

