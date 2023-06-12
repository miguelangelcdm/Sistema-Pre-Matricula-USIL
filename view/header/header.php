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
        <a class="navbar-brand" href="javascript:void(0)">Sistema de Pre-matrícula</a>
      </div>
      <div class="nav-item d-flex align-items-center">
        <?php
        use controller\AlumnoController;

        require_once(realpath($_SERVER["DOCUMENT_ROOT"]) . '/controller/AlumnoController.php');
        $obj = new AlumnoController();
        global $user;
        $id = $_SESSION['user_id'];
        $user = $obj->findById($id);
        echo "
          <a class='nav-link d-flex align-items-center' href='javascript:void(0);' style='border: 2px solid #566a7f;border-radius: 10px;padding-inline: 0.5rem;padding-block: .15rem;'> " . $user['fullName'] . "<i class='tf-icons navbar-icon bx bx-user' style='font-size:1.5rem;color:#566a7f; margin-left:0.5rem'></i></a>";
        // $name=$user['fullName'];
        // echo $user['fullName'];
        ?>
        <div
          style="border: 2px solid #566a7f; border-radius: 10px; padding-inline: 0.5rem; padding-block: .15rem; margin-left: 1rem; position: relative;">
          <a href="../../view/Home.php">
            <i class='bx bx-home' style="font-size: 1.5rem; color: #566a7f;"></i>
          </a>
          <a href="logout.php" style="margin-left: 1rem;">
            <!-- <img src="../../assets/img/icons/unicons/logout.png" alt="" style="max-width: 20px;"> -->
            <i class='bx bx-exit' style="font-size: 1.5rem; color: #566a7f;"></i>
          </a>
          <span style="position: absolute; left: 50%; top: 0; bottom: 0; width: 2px; background-color: #566a7f;"></span>
        </div>

      </div>
    </div>
  </div>
</nav>

<!-- / Navbar -->