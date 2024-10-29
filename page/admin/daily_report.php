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
          <h1 class="m-0">I Alert Daily Reports</h1>
          <br>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
            <li class="breadcrumb-item active">Daily Report</li>
          </ol>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-left">
            <!-- Button trigger modal -->
            <button class="btn btn-secondary" data-toggle="modal" data-target="#add_daily_report">Add Daily Report</button>
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
            <div class="card-body">
              <form id="daily_report_search_form">
                <div class="row">
                  <div class="col-3">
                    <label for="daily_report_date_from">Daily Report Date From:</label>
                    <input type="date" name="daily_report_date_from" id="daily_report_date_from" class="form-control" required>
                  </div>
                  <div class="col-3">
                    <label for="daily_report_date_to">Daily Report Date To:</label>
                    <input type="date" name="daily_report_date_to" id="daily_report_date_to" class="form-control" required>
                  </div>
                  <div class="col-3">
                    <label for="btnGetDailyReport">&nbsp;</label>
                    <button type="submit" class="btn btn-primary btn-block" id="btnGetDailyReport">Search
                      <i class="fa fa-search"></i>
                    </button>
                  </div>
                  <div class="col-3">
                    <label for="btnExportSectionsSearch">&nbsp;</label>
                    <button class="btn btn-secondary btn-block" id="btnExportSectionsSearch" onclick="export_daily_report_list('daily_reports_table')">Export <i class="fa fa-download"></i></button>
                  </div>
                </div>
              </form>
              <br>
              <div class="row">
                <div class="col-12">
                  <div class="card-body table-responsive p-0" style="height: 420px;">
                    <table class="table table-head-fixed text-nowrap table-hover" id="daily_reports_table">
                      <thead style="text-align:center;">
                        <th>#</th>
                        <th>Daily Report Date</th>
                        <th>File Name</th>
                        <th>Date Updated</th>
                      </thead>
                      <tbody id="list_of_daily_reports" style="text-align:center;"></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer"></div>
          </div>
          <!-- /.card -->
        </div>
      </div>
    </div>
  </section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/script/daily_report_script.php'; ?>