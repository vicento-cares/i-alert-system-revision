<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="dashboard.php" class="brand-link">
    <img src="../../dist/img/i.png" alt="I Alert Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?= htmlspecialchars($_SESSION['esection']); ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/user.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="dashboard.php" class="d-block"><?= htmlspecialchars($_SESSION['username']); ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/dashboard.php") { ?>
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

        <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/add_audit.php" || 
                  $_SERVER['REQUEST_URI'] == "/i-alert/page/admin/add_line_audit.php") { ?>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
        <?php } else { ?>
        <li class="nav-item menu-close">
          <a href="#" class="nav-link">
        <?php } ?>
            <i class="fa fa-edit"></i>
            <p>
              Audit Findings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/add_audit.php") { ?>
              <a href="add_audit.php" class="nav-link active">
              <?php } else { ?>
              <a href="add_audit.php" class="nav-link">
              <?php } ?>
                <i class="far fa-dot-circle nav-icon"></i>
                <p> Add Audit Findings</p>
              </a>
            </li>
            <li class="nav-item">
              <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/add_line_audit.php") { ?>
              <a href="add_line_audit.php" class="nav-link active">
              <?php } else { ?>
              <a href="add_line_audit.php" class="nav-link">
              <?php } ?>
                <i class="far fa-dot-circle nav-icon"></i>
                <p> Add Line Audit Findings</p>
              </a>
            </li>
          </ul>
        </li>

        <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/list_of_audit.php" || 
                  $_SERVER['REQUEST_URI'] == "/i-alert/page/admin/list_of_audited_closed.php" ||
                  $_SERVER['REQUEST_URI'] == "/i-alert/page/admin/list_of_line_audit.php") { ?>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link active">
        <?php } else { ?>
        <li class="nav-item menu-close">
          <a href="#" class="nav-link">
        <?php } ?>
            <i class="fas fa-tasks"></i>
            <p>
              List of Audit Findings
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/list_of_audit.php") { ?>
              <a href="list_of_audit.php" class="nav-link active">
              <?php } else { ?>
              <a href="list_of_audit.php" class="nav-link">
              <?php } ?>
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Audit Findings</p>
              </a>
            </li>
            <li class="nav-item">
              <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/list_of_audited_closed.php") { ?>
              <a href="list_of_audited_closed.php" class="nav-link active">
              <?php } else { ?>
              <a href="list_of_audited_closed.php" class="nav-link">
              <?php } ?>
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Audited Closed</p>
              </a>
            </li>
            <li class="nav-item">
              <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/list_of_line_audit.php") { ?>
              <a href="list_of_line_audit.php" class="nav-link active">
              <?php } else { ?>
              <a href="list_of_line_audit.php" class="nav-link">
              <?php } ?>
                <i class="far fa-dot-circle nav-icon"></i>
                <p>Line Audit Findings</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/pending_count.php") { ?>
          <a href="pending_count.php" class="nav-link active">
          <?php } else { ?>
          <a href="pending_count.php" class="nav-link">
          <?php } ?>
            <i class="far fa-clock"></i>
            <p>
              Sections Pending
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/daily_report.php") { ?>
          <a href="daily_report.php" class="nav-link active">
          <?php } else { ?>
          <a href="daily_report.php" class="nav-link">
          <?php } ?>
            <i class="fas fa-file"></i>
            <p>
              Daily Report
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/history.php") { ?>
          <a href="history.php" class="nav-link active">
          <?php } else { ?>
          <a href="history.php" class="nav-link">
          <?php } ?>
            <i class="fa fa-history"></i>
            <p>
              History
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/section_management.php") { ?>
          <a href="section_management.php" class="nav-link active">
          <?php } else { ?>
          <a href="section_management.php" class="nav-link">
          <?php } ?>
            <i class="fa fa-list-alt"></i>
            <p>
              Section Management
            </p>
          </a>
        </li>
        <li class="nav-item">
          <?php if ($_SERVER['REQUEST_URI'] == "/i-alert/page/admin/accounts.php") { ?>
          <a href="accounts.php" class="nav-link active">
          <?php } else { ?>
          <a href="accounts.php" class="nav-link">
          <?php } ?>
            <i class="fa fa-users"></i>
            <p>
              Account Management
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