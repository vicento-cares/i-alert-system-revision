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
              <h1 class="m-0">List of Audited Recieved <input type="hidden" name="falp_group" id="falp_group_recieved"
                  value="<?= htmlspecialchars($_SESSION['falp_group']); ?>"></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">List of Audited Recieved</li>
              </ol>
            </div>
            <div class="col-sm-6">
              <div class="row">
                <div class="col-6">
                  <label for="recievedfrom">Audited Date From:</label> <input type="date" id="recievedfrom" class="form-control"
                    value="<?= $server_month; ?>" autocomplete=off>
                </div>
                <div class="col-6">
                  <label for="recievedto">Audited Date To:</label> <input type="date" id="recievedto" class="form-control"
                    value="<?= $server_date_only; ?>" autocomplete=off>
                </div>
              </div>
              <!-- /.col -->
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
                      <input type="text" name="empid" id="empid_audited_fas_recieved" class="form-control">
                    </div>
                    <div class="col-3">
                      <span>Full Name: </span>
                      <input type="text" name="fname" id="fname_audited_fas_recieved" class="form-control">
                    </div>
                    <div class="col-3">
                      <span for="">Line no:</span>
                      <input list="lines" id="linename_audited_fas_recieved" name="linename_audited_fas_recieved"
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
                      <span for="">Position:</span> <select id="position_recieved" class="form-control"
                        autocomplete=off>
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
                      <input type="text" list="list" name="carmaker" id="carmaker_recieved" class="form-control">
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
                      <input type="text" name="carmodel" id="carmodel_recieved" class="form-control">

                    </div>
                    <div class="col-3">
                      <span>Audit Type: </span>
                      <select class="form-control" id="audit_type_recieved">
                        <option value="">Select Audit Type</option>
                        <option value="initial">Initial</option>
                        <option value="final">Final</option>
                        <option value="warehouse">Warehouse</option>
                      </select>
                    </div>
                    <div class="col-3">
                      <span>Criticality Level:</span>
                      <select class="form-control" id="criticality_level_recieved">
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
                      <select id="section_recieved" class="form-control"></select>
                    </div>
                    <div class="col-3">
                      <span>Group:</span>
                      <input type="text" id="falp_group_received" class="form-control"
                        value="<?= htmlspecialchars($_SESSION['falp_group']); ?>" readonly>
                    </div>
                    <div class="col-3">
                      <span>Shift Groups:</span>
                      <select id="groups_fas_received" class="form-control">
                        <option value="">Select Group</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                      </select>

                    </div>
                    <div class="col-3">
                      <span>Shift:</span>
                      <select class="form-control" id="shifts_fas_received">
                        <option value="">Select Shift</option>
                        <option value="ds">DS</option>
                        <option value="ns">NS</option>
                      </select>
                    </div>
                  </div>
                </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <button class="btn btn-primary" id="searchReqBtn" onclick="recieved()">Search <i
                        class="fas fa-search"></i></button>

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  &nbsp; <button class="btn btn-success "
                    onclick="export_audit_list_recieved('audit_recived')">Export</button>
                </div>
              </div>
              <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="audit_recived">
                  <thead>

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
                    <th style="text-align:center;">Department</th>
                    <th style="text-align:center;">Group</th>
                    <th style="text-align:center;">Section</th>
                    <th style="text-align:center;">Section Code</th>
                    <th style="text-align:center;">Line No.</th>
                    <th style="text-align:center;">Process</th>
                    <th style="text-align:center;">Audit Findings</th>
                    <th style="text-align:center;">Audit Details</th>
                    <th style="text-align:center;">Audit Type</th>
                    <th style="text-align:center;">Audited By</th>
                    <th style="text-align:center;">Criticality Level</th>
                    <th style="text-align:center;">Remarks</th>
                    <th style="text-align:center;">Concerned Group</th>
                    <th style="text-align:center;">Date Sent</th>
                    <th style="text-align:center;">HR Status</th>
                    <th style="text-align:center;">Date Recieved</th>

                  </thead>
                  <tbody id="audited_recieved_fas" style="text-align:center;"></tbody>
                </table>
                <div class="row">
                  <div class="col-6">

                  </div>
                  <div class="col-6">
                    <input type="hidden" name="" id="audited_recieved_fas">

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
<?php include 'plugins/script/audited_recieved_script.php'; ?>