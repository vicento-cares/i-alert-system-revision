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
              <h1 class="m-0">List of Line Audit Findings</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">List of Line Audit Findings</li>
              </ol>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-6">
                  <span for="">Audited Date From:</span> <input type="date" id="lineauditeddatefrom"
                    class="form-control" value="<?= $server_month; ?>" autocomplete=off>
                </div>
                <div class="col-6">
                  <span for="">Audited Date To:</span> <input type="date" id="lineauditeddateto" class="form-control"
                    value="<?= $server_date_only; ?>" autocomplete=off>
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
                      <label for="car_maker">Car Maker:</label>
                      <input type="text" list="list" name="car_maker" id="car_maker" class="form-control">
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

                    <div class="col-2">
                      <label for="car_model">Car Model:</label>
                      <input type="text" name="car_model" id="car_model" class="form-control">
                    </div>

                    <div class="col-2">
                      <label for="line_n">Line No:</label>
                      <input list="lines" id="line_n" name="line_n" class="form-control">
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
                      <label for="crit_level">Criticality Level:</label>
                      <select id="crit_level" class="form-control">
                        <option value="">Select Criticality Level</option>
                        <option value="Low Impact">Low Impact</option>
                        <option value="Medium Impact">Medium Impact</option>
                        <option value="High Impact">High Impact</option>
                      </select>
                    </div>
                    <div class="col-2">
                      <label for="section_search">Section:</label>
                      <select class="form-control" name="section_search" id="section_search">
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
                    <div class="col-2">
                      <label for="falp_group_search">Group:</label>
                      <select class="form-control" name="falp_group_search" id="falp_group_search"
                        onchange="fetch_section_dropdown()">
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
                    <button class="btn btn-primary" id="searchReqBtn"
                      onclick="load_list_of_line_audit_findings()">Search <i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>

              <div class="row">

                <div class="col-12">
                  <table>
                    <tr>
                      <th>
                        <div class="row">
                          <div class="col-6">
                            <button class="btn btn-secondary" onclick="uncheck_all()">Uncheck</button>
                          </div>
                          <div class="col-6">
                            <button class="btn btn-success"
                              onclick="export_Line_audit_list('line_audit_list_data')">Export</button>
                          </div>
                      </th>
                      <th>
                        <div class="row">

                          <div class="col-5">
                            <button class="btn btn-danger" onclick="delete_lineaudit()">Delete</button>
                          </div>
                        </div>
                      </th>
                  </table>
                </div>
              </div>

              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="line_audit_list_data">
                  <thead>
                    <th style="text-align:center;">
                      <input type="checkbox" name="" id="check_all_line" onclick="select_all_func()">
                    </th>
                    <th style="text-align:center;">#</th>
                    <th style="text-align:center; display: none;">Audit Code:</th>
                    <th style="text-align:center;">Date Audited</th>
                    <th style="text-align:center;">Shift</th>
                    <th style="text-align:center;">Shift Group</th>
                    <th style="text-align:center;">Car Maker</th>
                    <th style="text-align:center;">Car Model</th>
                    <th style="text-align:center;">Line No.</th>
                    <th style="text-align:center;">Process</th>
                    <th style="text-align:center;">Audit Findings</th>
                    <th style="text-align:center;">Audit Details</th>
                    <th style="text-align:center;">Audited By</th>
                    <th style="text-align:center;">Problem Identification</th>
                    <th style="text-align:center;">Criticality Level</th>
                    <th style="text-align:center;">Audit Type</th>
                    <th style="text-align:center;">Remarks</th>
                    <th style="text-align:center;">Department</th>
                    <th style="text-align:center;">Group</th>
                    <th style="text-align:center;">Section</th>
                    <th style="text-align:center;">Section Code</th>

                  </thead>
                  <tbody id="line_audit_data" style="text-align:center;"></tbody>
                </table>
                <div class="row">
                  <div class="col-6">

                  </div>
                  <div class="col-6">
                    <input type="hidden" name="" id="line_audit_data">

                    <div class="spinner_line" id="spinner_line" style="display:none;">

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
<?php include 'plugins/script/list_of_line_audit_script.php'; ?>