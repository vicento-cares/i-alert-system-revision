<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>
<!-- Main Sidebar Container -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Manage Accounts</h1>
          <br>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Manage Accounts</li>
          </ol>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <!-- Button trigger modal -->
            <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#add_accounts_user">Add User</a>
          </ol>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">
              </h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="javascript:void(0)">
              <div class="card-body">
                <div class="row">
                  <div class="col-3">
                    <label for="user_name_user_search">User Name:</label>
                    <input type="text" name="user_name_user_search" id="user_name_user_search" class="form-control">
                  </div>
                  <div class="col-1">
                    <label for="btnLoadUsersSearch">&nbsp;</label>
                    <button class="btn btn-primary btn-block" id="btnLoadUsersSearch" onclick="load_users()">Search <i class="fa fa-search"></i></button>
                  </div>
                  <div class="col-1">
                    <label for="btnExportUsersSearch">&nbsp;</label>
                    <button class="btn btn-secondary btn-block" id="btnExportUsersSearch" onclick="export_users('accounts_table')">Export <i class="fa fa-download"></i></button>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12">
                    <div class="card-body table-responsive p-0" style="height: 420px;">
                      <table class="table table-head-fixed text-nowrap table-hover" id="accounts_table">
                        <thead style="text-align:center;">
                          <th>#</th>
                          <th>Username</th>
                          <th>Role</th>
                          <th>Type</th>
                          <th>Car Maker</th>
                          <th>Section</th>
                        </thead>
                        <tbody id="list_of_users" style="text-align:center;"></tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer"></div>
            </form>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/script/accounts_script.php'; ?>