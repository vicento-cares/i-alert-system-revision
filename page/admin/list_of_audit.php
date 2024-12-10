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
                  <div class="col-3">
                    <label for="empid">Employee ID: </label>
                    <input type="text" name="empid" id="empid" class="form-control">
                  </div>

                  <div class="col-3">
                    <label for="fname">Full Name: </label>
                    <input type="text" name="fname" id="fname" class="form-control">
                  </div>

                  <div class="col-3">
                    <label for="linen">Line No: </label>
                    <input list="lines" id="linen" name="linen" class="form-control">
                    <datalist id="lines" name="">
                      <option value="">Select Line</option>
                      <?php
                      $line = "SELECT DISTINCT line_no FROM ialert_lines ORDER BY line_no ASC";

                      $stmt = $conn->prepare($line);
                      $stmt->execute();
                      foreach ($stmt->fetchALL() as $j) {
                        echo '<option value="' . $j['line_no'] . '">';
                      }
                      ?>
                    </datalist>
                  </div>
                  <div class="col-3">
                    <label for="carmaker_search">Car Maker:</label>
                    <input type="text" list="list" name="carmaker" id="carmaker_search" class="form-control">
                    <datalist id="list">
                      <option value="Suzuki">
                      <option value="Toyota">
                      <option value="Mazda">
                      <option value="Daihatsu">
                      <option value="Marelli">
                      <option value="Subaru">
                      <option value="Honda">
                      <option value="Yamaha">
                    </datalist>
                  </div>

                </div>

                <div class="row">
                  <div class="col-3">
                    <label for="carmodel_search">Car Model: </label>
                    <input type="text" name="carmodel" id="carmodel_search" class="form-control">
                  </div>

                  <div class="col-3">
                    <label for="position_search">Position: </label>
                    <select id="position_search" class="form-control" autocomplete=off>
                      <option value="">Select Position</option>
                      <option value="associate">Associate</option>
                      <option value="expert">Expert</option>
                      <option value="jr.staff">Jr. Staff</option>
                      <option value="staff">Staff</option>
                      <option value="supervisor">Supervisor</option>
                      <option value="assistant manager">Assistant Manager</option>
                      <option value="manager">Manager</option>
                    </select>
                  </div>

                  <div class="col-3">
                    <label for="crit_level">Criticality Level:</label>
                    <select id="crit_level" class="form-control">
                      <option value="">Select Criticality Level</option>
                      <option value="Low Impact">Low Impact</option>
                      <option value="Medium Impact">Medium Impact</option>
                      <option value="High Impact">High Impact</option>
                    </select>
                  </div>
                  <div class="col-3">
                    <label for="audit_typ">Audit Type:</label>
                    <select id="audit_typ" class="form-control">
                      <option value="">Select Audit Type </option>
                      <option value="initial">Initial</option>
                      <option value="final">Final</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <label for="sect">Section:</label>
                    <select class="form-control" name="sect" id="sect">
                      <option value="">Select Section</option>
                      <?php
                      $get_curiculum = "SELECT DISTINCT section FROM ialert_section ORDER BY section ASC";
                      $stmt = $conn->prepare($get_curiculum);
                      $stmt->execute();
                      foreach ($stmt->fetchALL() as $x) {
                        echo '<option value="' . $x['section'] . '">' . $x['section'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-3">
                    <label for="prov">Provider:</label>
                    <input type="text" name="prov" id="prov" class="form-control">
                  </div>
                  <div class="col-3">
                    <label for="groups">Shift Groups:</label>
                    <select id="groups" class="form-control">
                      <option value="">Select Group</option>
                      <option value="a">A</option>
                      <option value="b">B</option>
                    </select>
                  </div>
                  <div class="col-3">
                    <label for="shifts">Shift:</label>
                    <select class="form-control" id="shifts">
                      <option value="">Select Shift</option>
                      <option value="ds">DS</option>
                      <option value="ns">NS</option>
                    </select>
                  </div>
                  <div class="col-3">
                    <label for="falp_group_search">Group:</label>
                    <select class="form-control" name="falp_group_search" id="falp_group_search">
                      <option value="">Select Group</option>
                      <?php
                      $get_curiculum = "SELECT DISTINCT falp_group FROM ialert_section ORDER BY falp_group ASC";
                      $stmt = $conn->prepare($get_curiculum);
                      $stmt->execute();
                      foreach ($stmt->fetchALL() as $x) {

                        echo '<option value="' . $x['falp_group'] . '">' . $x['falp_group'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                </div>

              </h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 100px;">
                  <button class="btn btn-primary" id="searchReqBtn" onclick="load_list_of_audit_findings()">Search <i
                      class="fas fa-search"></i></button>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-12">
                &nbsp;<button class="btn btn-secondary" onclick="uncheck_all()">Uncheck</button>
                &nbsp;
                <button class="btn btn-success " onclick="export_audit_list('audit_list_data')">Export</button>
                &nbsp;
                <button class="btn btn-info" data-toggle="modal" data-target="#count">Audit&nbsp;Count</button>
                &nbsp;
                <button class="btn btn-danger" onclick="delete_audit()">Delete</button>
              </div>

              <div class="col-3">

              </div>

            </div>


            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 420px;">
              <table class="table table-head-fixed text-nowrap table-hover" id="audit_list_data">
                <thead>
                  <th style="text-align:center;">
                    <input type="checkbox" name="" id="check_all_audit" onclick="select_all_func()">
                  </th>
                  <th style="text-align:center;">#</th>
                  <th style="text-align:center; display: none;">Audit Code:</th>
                  <th style="text-align:center;">Date Audited</th>
                  <th style="text-align:center;">Full Name</th>
                  <th style="text-align:center;">Position</th>

                  <th style="text-align:center;">Employee ID</th>
                  <th style="text-align:center;">Provider</th>
                  <th style="text-align:center;">Shift</th>
                  <th style="text-align:center;">Shift Group</th>
                  <th style="text-align:center;">Car Maker</th>
                  <th style="text-align:center;">Car Model</th>
                  <th style="text-align:center;">Line No.</th>

                  <th style="text-align:center;">Process</th>
                  <th style="text-align:center;">Audit Findings</th>
                  <th style="text-align:center;">Audit Details</th>
                  <th style="text-align:center;">Audited By</th>
                  <th style="text-align:center;">Audit Category</th>
                  <th style="text-align:center;">Problem Identification</th>
                  <th style="text-align:center;">Criticality Level</th>
                  <th style="text-align:center;">SM Analysis</th>
                  <th style="text-align:center;">Audit Type</th>
                  <th style="text-align:center;">Remarks</th>
                  <th style="text-align:center;">FAS Penalty</th>
                  <th style="text-align:center;">Agency Penalty</th>
                  <th style="text-align:center;">HR Status</th>
                  <th style="text-align:center;">Department</th>
                  <th style="text-align:center;">Group</th>
                  <th style="text-align:center;">Section</th>
                  <th style="text-align:center;">Section Code</th>

                </thead>
                <tbody id="audit_data" style="text-align:center;"></tbody>
              </table>
              <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6">
                  <input type="hidden" name="" id="audit_data">

                  <div class="spinner" id="spinner" style="display:none;">

                    <div class="loader float-sm-center"></div>
                  </div>

                </div>
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
<?php include 'plugins/script/list_of_audit_script.php'; ?>