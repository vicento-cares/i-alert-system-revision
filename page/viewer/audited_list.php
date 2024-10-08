<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/viewer_bar.php'; ?>

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
                <label for="">Audited Date From:</label> <input type="date" id="auditedlistdatefrom"
                  class="form-control" value="<?= $server_month; ?>" autocomplete=off>
              </div>
              <div class="col-6">
                <label for="">Audited Date To:</label> <input type="date" id="auditedlistdateto" class="form-control"
                  value="<?= $server_date_only; ?>" autocomplete=off>
              </div>
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
                    <label>Employee ID: </label>
                    <input type="text" name="empid" id="empid_audited" class="form-control">
                  </div>
                  <div class="col-3">
                    <label>Full Name: </label>
                    <input type="text" name="fname" id="fname_audited" class="form-control">
                  </div>
                  <div class="col-3">
                    <label for="">Line no:</label>
                    <input list="lines" id="lname_audited" name="lname_audited" class="form-control">
                    <datalist id="lines" name="">
                      <option value="">Select Line</option>
                      <?php
                      require '../../process/conn.php';
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
                    <label for="">Position:</label> <select id="position_audited" class="form-control" autocomplete=off>
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
                    <label>Car Maker: </label>
                    <input type="text" list="list" name="carmaker" id="carmaker_audited" class="form-control">
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
                    <label>Car Model: </label>
                    <input type="text" name="carmodel" id="carmodel_audited" class="form-control">
                    <input type="hidden" name="count_section" id="count_section"
                      value="<?= htmlspecialchars($_SESSION['sections']); ?>">
                  </div>
                  <div class="col-3">
                    <label>Audit Type: </label>
                    <select class="form-control" id="audit_type_audited">
                      <option value="">Select Audit Type</option>
                      <option value="initial">Initial</option>
                      <option value="final">Final</option>
                    </select>
                  </div>
                  <div class="col-3">
                    <label>Audit Category:</label>
                    <select class="form-control" id="audit_categ_audited">
                      <option value="">Select Audit Category</option>
                      <option value="minor">Minor</option>
                      <option value="major">Major</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-3">
                    <label>Section:</label>
                    <select class="form-control" name="section_audited" id="section_audited">
                      <option value="">Select Section</option>
                      <?php
                      require '../../process/conn.php';
                      $get_curiculum = "SELECT DISTINCT section, name FROM ialert_section";
                      $stmt = $conn->prepare($get_curiculum);
                      $stmt->execute();
                      foreach ($stmt->fetchALL() as $x) {
                        echo '<option value="' . $x['section'] . '">' . $x['name'] . '</option>';
                      }
                      ?>
                    </select>
                  </div>
                  <div class="col-3">
                    <label>Provider:</label>
                    <input type="text" name="provider" id="provider_audited" class="form-control">
                  </div>
                  <div class="col-3">
                    <label>Process:</label>
                    <select class="form-control" name="process_audited" id="process_audited"></select>
                  </div>
                  <div class="col-3">
                    <label>Group:</label>
                    <select class="form-control" name="falp_group_audited" id="falp_group_audited"></select>
                  </div>
                </div>
              </h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 100px;">
                  <button class="btn btn-primary" id="searchReqBtn" onclick="load_list_of_audited_findings()">Search <i
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

                        <div class="col-12">
                          &nbsp;<button class="btn btn-success "
                            onclick="export_audited_list('audited_list_data')">Export</button>
                        </div>
                    </th>


              </div>
              </table>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="audited_list_data">
                  <thead>
                    <th style="text-align:center;">#</th>
                    <th style="text-align:center; display: none;">Audit Code:</th>
                    <th style="text-align:center;">Date Audited</th>
                    <th style="text-align:center;">Full Name</th>
                    <th style="text-align:center;">Employee ID</th>
                    <th style="text-align:center;">Provider</th>
                    <th style="text-align:center;">Shift</th>
                    <th style="text-align:center;">Shift Group</th>
                    <th style="text-align:center;">Car Maker</th>
                    <th style="text-align:center;">Car Model</th>
                    <th style="text-align:center;">Line No.</th>
                    <th style="text-align:center;">Process</th>
                    <th style="text-align:center;">Audit Findings</th>
                    <th style="text-align:center;">Audited By</th>
                    <th style="text-align:center;">Audit Category</th>
                    <th style="text-align:center;">Remarks</th>
                    <th style="text-align:center;">Section</th>
                    <th style="text-align:center;">Group</th>
                    <!--  <th style="text-align:center;">PD Status</th>              
                    <th style="text-align:center;">AGENCY Status</th> 
                    <th style="text-align:center;">HR Status</th>  -->
                  </thead>
                  <tbody id="audited_data" style="text-align:center;"></tbody>
                </table>
                <div class="row">
                  <div class="col-6">

                  </div>
                  <div class="col-6">
                    <input type="hidden" name="" id="audited_data">

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
<?php include 'plugins/script/list_of_audited_list_script.php'; ?>