<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="../../dist/img/i.png" alt="I Alert Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?= htmlspecialchars($_SESSION['esection']); ?> |
      <?= htmlspecialchars($_SESSION['sections']); ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="dashboard.php" class="d-block"><?= htmlspecialchars($_SESSION['role']); ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/fas/dashboard.php") { ?>
          <a href="dashboard.php" class="nav-link active">
          <?php } else { ?>
          <a href="dashboard.php" class="nav-link">
          <?php } ?>
            <i class="fas fa-chalkboard"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/fas/audited_list_fas.php") { ?>
          <a href="audited_list_fas.php" class="nav-link active">
          <?php } else { ?>
          <a href="audited_list_fas.php" class="nav-link">
          <?php } ?>
            <i class=" fas fa-list"></i>
            <p>
              List of Audited
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/fas/audited_list_status_fas.php") { ?>
          <a href="audited_list_status_fas.php" class="nav-link active">
          <?php } else { ?>
          <a href="audited_list_status_fas.php" class="nav-link">
          <?php } ?>
            <i class=" fas fa-tasks"></i>
            <p>
              List of Audited With Status
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/fas/audited_send.php") { ?>
          <a href="audited_send.php" class="nav-link active">
          <?php } else { ?>
          <a href="audited_send.php" class="nav-link">
          <?php } ?>
            <i class=" fas fa-tasks"></i>
            <p>
              List of IR Sent
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/fas/audit_recieved.php") { ?>
          <a href="audit_recieved.php" class="nav-link active">
          <?php } else { ?>
          <a href="audit_recieved.php" class="nav-link">
          <?php } ?>
            <i class=" fas fa-tasks"></i>
            <p>
              List of Audited Recieved
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/fas/audited_close.php") { ?>
          <a href="audited_close.php" class="nav-link active">
          <?php } else { ?>
          <a href="audited_close.php" class="nav-link">
          <?php } ?>
            <i class=" fas fa-tasks"></i>
            <p>
              List of Audited Closed
            </p>
          </a>
        </li>
        <?php include 'logout.php'; ?>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>