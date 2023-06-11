<?php
session_start()
  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport"
    content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

  <title>Pseudomatricula USIL</title>

  <meta name="description" content="" />

  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet" />

  <!-- Icons. Uncomment required icon fonts -->
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

  <!-- Core CSS -->
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/CustomBase.css" class="template-customizer-theme-css" />
  <!-- <link rel="stylesheet" href="../assets/css/demo.css" /> -->

  <!-- Vendors CSS -->
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

  <!-- Page CSS -->
  <!-- Page -->
  <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
  <!-- Helpers -->
  <script src="../assets/vendor/js/helpers.js"></script>

  <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
  <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  <script src="../assets/js/config.js"></script>
</head>

<body class="bg2">
  <?php require '../view/header/header.php'; ?>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container" style="min-height:87vh">
      <div class="d-flex flex-row m-4"
        style="width:100%;height:100%;padding-inline:8rem;padding-block:4rem;justify-content:center">
        <div class="card bg-dark border-0 text-white hov"
          style="max-width:491px;opacity: 0.9; box-shadow: 0 1px 7px rgba(0, 0, 0, 0.5);margin-right:2rem">
          <img class="card-img" style="max-width: 45%; bottom: -53%; position: relative; left: 47%; opacity: 0.7;"
            src="../../assets/img/elements/enroll.png" alt="Card image">
          <a class="" href="session.php">
            <div class="card-img-overlay" style="padding: 3rem;">
              <h1 class="card-title" style="font-weight:bold;font-size:65px">Pseudomatricularse</h1>
              <p class="card-text avoid-link-styling" style="max-width: 50%;">
                Ayudanos escogiendo los cursos que proyectas llevar el proximo ciclo, de esa manera podremos coordinar
                mejor los bloques.

              </p>
            </div>
          </a>
        </div>
        <div class="card bg-dark border-0 text-white hov"
          style="opacity: 0.9; box-shadow: 0 1px 7px rgba(0, 0, 0, 0.5);">
          <img class="card-img" style="max-width: 40%; bottom: -56%; position: relative; left: 47%; opacity: 0.7;"
            src="../../assets/img/elements/list.png" alt="Card image">
          <a class="" href="../view/detalle/bloques.php">
            <div class="card-img-overlay" style="padding: 3rem;">
              <h1 class="card-title" style="font-weight:bold;font-size:65px">Listado de bloques</h1>
              <p class="card-text avoid-link-styling" style="max-width: 50%;">
                Aquí podrás chequear qué bloques se están abriendo.
              </p>
            </div>
          </a>
        </div>

        <!-- <div class="card card-body me-3">
          Pseudomatricularse
        </div>
        <div class="card card-body">
          Listado de Bloques
        </div> -->
      </div>
    </div>
  </div>
  <?php require '../view/footer/footer.php'; ?>
</body>

</html>