<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>

<section class="content">
  <div class="container-fluid">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List of Audit Findings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">List of Audit Findings</li>
              </ol>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-4">
                  <label for="auditeddatefrom">Audited Date From:</label> <input type="date" id="auditeddatefrom" class="form-control"
                    value="<?= $server_month; ?>" autocomplete=off>
                </div>
                <div class="col-4">
                  <label for="auditeddateto">Audited Date To:</label> <input type="date" id="auditeddateto" class="form-control"
                    value="<?= $server_date_only; ?>" autocomplete=off>
                </div>
                <div class="col-4">
                  <label for="audit_type">Audit Type:</label>
                  <select id="audit_type" class="form-control">
                    <option value="">Select Audit Type</option>
                    <option value="initial">Initial</option>
                    <option value="final">Final</option>
                  </select>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <label for="other_pending">Other Group:</label>
                  <select class="form-control" name="other_pending" id="other_pending"></select>
                </div>
                <div class="col-4">
                  <label for="provider_pending"> Provider: </label>
                  <select class="form-control" id="provider_pending">
                    <option value>Select Provider</option>
                    <?php
                    $get_curiculum = "SELECT DISTINCT esection FROM ialert_account WHERE role = 'provider' ORDER BY esection ASC";
                    $stmt = $conn->prepare($get_curiculum);
                    $stmt->execute();
                    foreach ($stmt->fetchALL() as $x) {
                      echo '<option value="' . $x['esection'] . '">' . $x['esection'] . '</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="col-4">
                  <label for="btnAllPendingCountSearch">&nbsp;</label>
                  <button class="btn btn-primary btn-block" id="btnAllPendingCountSearch" onclick="load_count()">Search <i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
            <!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <div class="row">
                  <input type="hidden" name="server_date" id="server_date" value="<?= $server_date_only; ?>">
              </h3>
            </div>
            <div class="card-body">
              <div class="row" id="pending_count_list"></div>
            </div>

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <!-- /.row -->
    </div>
  </div>
</section>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/script/pending_count_script.php'; ?>