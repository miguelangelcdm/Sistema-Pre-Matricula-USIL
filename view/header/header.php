<!-- Navbar -->
<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
  id="layout-navbar" style="max-width:100%">
  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    <div class="navbar-nav align-items-center" style="width:100%; justify-content:space-between; flex-direction:row">
      <div class="nav-item d-flex align-items-center">
        <!-- <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                    aria-label="Search..." /> -->
        <img src="../../assets/img/elements/usil.png" alt="" style="max-width:50px; margin-right:0.5rem">
        <a class="navbar-brand" href="javascript:void(0)">Sistema de Pseudomatrícula</a>
      </div>
      <div class="nav-item d-flex align-items-center">
        <h6>
          <?php
            use controller\AlumnoController;
            require_once 'controller/AlumnoController.php';
            
            $obj = new AlumnoController();
            global $user;
            $user = $obj->findById($id);
            // $name=$user['fullName'];
            echo $user['fullName'];
          ?>
        </h6>
        <a href="index.php?action=logout">
          <img src="../../assets/img/icons/unicons/logout.png" alt="" style="max-width:20px">
        </a>
      </div>
    </div>
  </div>
</nav>

<!-- / Navbar -->