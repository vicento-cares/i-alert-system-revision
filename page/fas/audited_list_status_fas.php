<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/fas_bar.php'; ?>

<section class="content">
  <div class="container-fluid">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">List of Audited</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">List of Audited</li>
              </ol>
            </div><!-- /.col -->
            <div class="row">

              <div class="col-6">
                <label for="fasauditedliststatusdatefrom">Audited Date From:</label> <input type="date" id="fasauditedliststatusdatefrom"
                  class="form-control" value="<?= $server_month; ?>" autocomplete=off>
              </div>
              <div class="col-6">
                <label for="fasauditedliststatusdateto">Audited Date To:</label> <input type="date" id="fasauditedliststatusdateto"
                  class="form-control" value="<?= $server_date_only; ?>" autocomplete=off>
              </div>
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <div class="row">
                    <div class="col-3">
                      <span>Employee ID: </span>
                      <input type="text" name="empid" id="empid_audited_fass_status" class="form-control">
                    </div>
                    <div class="col-3">
                      <span>Full Name: </span>
                      <input type="text" name="fname" id="fname_audited_fass_status" class="form-control">
                    </div>
                    <div class="col-3">
                      <span for="">Line no:</span>
                      <input list="lines" id="linename_audited_fass_status" name="linename_audited_fass_status"
                        class="form-control">
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
                      <span for="">Position:</span> <select id="position_status" class="form-control" autocomplete=off>
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
                  </div>

                  <div class="row">
                    <div class="col-3">
                      <span>Car Maker: </span>
                      <input type="text" list="list" name="carmaker" id="carmaker_status" class="form-control">
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
                    <div class="col-3">
                      <span>Car Model: </span>
                      <input type="text" name="carmodel" id="carmodel_status" class="form-control">
                      <!-- <input type="hidden" name="count_section" id="count_section" value=""> -->
                    </div>
                    <div class="col-3">
                      <span>Audit Type: </span>
                      <select class="form-control" id="audit_type_status">
                        <option value="">Select Audit Type</option>
                        <option value="initial">Initial</option>
                        <option value="final">Final</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <span>Criticality Level:</span>
                      <select class="form-control" id="criticality_level_status">
                        <option value="">Select Criticality Level</optio>
                        <option value="Low Impact">Low Impact</option>
                        <option value="Medium Impact">Medium Impact</option>
                        <option value="High Impact">High Impact</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-3">
                      <span>Section:</span>
                      <select id="section_status" class="form-control"></select>
                    </div>
                    <div class="col-3">
                      <span>Group:</span>
                      <input type="text" id="falp_group_status" class="form-control"
                        value="<?= htmlspecialchars($_SESSION['falp_group']); ?>" readonly>
                      <!-- <select id="section_status" class="form-control"></select> -->
                    </div>
                    <div class="col-3">
                      <span>Shift Groups:</span>
                      <select id="groups_fas_status" class="form-control">
                        <option value="">Select Group</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                      </select>

                    </div>
                    <div class="col-3">
                      <span>Shift:</span>
                      <select class="form-control" id="shifts_fas_status">
                        <option value="">Select Shift</option>
                        <option value="ds">DS</option>
                        <option value="ns">NS</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <span>Audit Category:</span>
                      <select class="form-control" id="audit_category_search">
                        <option value="">Select Audit Category</option>
                        <option value="Major">Major</option>
                        <option value="Minor">Minor</option>
                      </select>
                    </div>
                  </div>

                </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <button class="btn btn-primary" id="searchReqBtn"
                      onclick="load_list_of_audited_findings_fass_status()">Search <i
                        class="fas fa-search"></i></button>

                  </div>
                </div>
              </div>

              <!-- /.card-header -->
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
                            <button class="btn btn-success "
                              onclick="export_audited_list_fas_status('audited_list_data_fass_status')">Export</button>
                          </div>
                      </th>
                </div>
                <th>
                </th>
                <th>
                </th>
                <th>
                  <div class="row">

                    <div class="col-12">

                      <select class="form-control" id="status_fass">
                        <option value="">Modify Penalty</option>
                        <option value="Suspension 60 days">Suspension 60 days</option>
                        <option value="Suspension 30 days">Suspension 30 days</option>
                        <option value="Suspension 15 days">Suspension 15 days</option>
                        <option value="Suspension 10 days">Suspension 10 days</option>
                        <option value="Suspension 5 days">Suspension 5 days</option>
                        <option value="Suspension 3 days">Suspension 3 days</option>
                        <option value="Written IR">Written IR</option>
                        <option value="Verbal warning">Verbal warning</option>
                        <option value="Dismissal">Dismissal</option>
                        <option value="AWOL">AWOL</option>
                        <option value="Resigned">Resigned</option>
                      </select>
                    </div>

                  </div>
                </th>
                <th>
                </th>
                <th>
                </th>
                <th>
                </th>

                <th>
                  <div class="row">
                    <div class="col-12 float-sm-right">
                      <button class="btn btn-primary float-sm-right" onclick="update_statuss()">Update</button>
                    </div>
                </th>
              </div>

              <th>
              </th>
              <th>
              </th>
              <th>
                <div class="row">
                  <div class="col-12 float-sm-right">
                    <button class="btn btn-info float-sm-right" onclick="sent_date()">Send </button>
                  </div>
              </th>
              <th>
                <div class="col-12 float-sm-right">
                  <button class="btn btn-warning float-sm-right" onclick="close_data()">Closed
                  </button>
                </div>
              </th>
            </div>
            </table>

            <div class="card-body table-responsive p-0" style="height: 420px;">
              <table class="table table-head-fixed text-nowrap table-hover" id="audited_list_data_fass_status">
                <thead>
                  <th style="text-align:center;">
                    <input type="checkbox" name="" id="check_all_statuss" onclick="select_all_func()">
                  </th>
                  <th style="text-align:center;">#</th>
                  <th style="text-align:center; display: none;">Audit Code:</th>
                  <th style="text-align:center;">Date Audited</th>
                  <th style="text-align:center;">Full Name</th>
                  <th style="text-align:center;">Employee ID</th>
                  <th style="text-align:center;">Position</th>
                  <th style="text-align:center;">Shift</th>
                  <th style="text-align:center;">Provider</th>
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
                  <th style="text-align:center;">Remarks</th>
                  <th style="text-align:center;">FAS Penalty Status</th>
                  <th style="text-align:center;">Date Sent</th>
                  <th style="text-align:center;">HR Status</th>
                  <th style="text-align:center;">Updated By</th>

                </thead>
                <tbody id="audited_data_fass_status" style="text-align:center;"></tbody>
              </table>
              <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6">
                  <input type="hidden" name="" id="audited_data_fass_status">

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
<?php include 'plugins/script/audited_list_status_fas_script.php'; ?>