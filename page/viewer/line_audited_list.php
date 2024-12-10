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
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title col-9">
                <div class="row">

                  <div class="col-4 mb-2">
                    <span for="">Audited Date From:</span> <input type="date" id="line_auditeddatefrom"
                      class="form-control" value="<?= $server_month; ?>" autocomplete=off>
                  </div>
                  <div class="col-4 mb-2">
                    <span for="">Audited Date To:</span> <input type="date" id="line_auditeddateto" class="form-control"
                      value="<?= $server_date_only; ?>" autocomplete=off>
                  </div>
                </div>

                <div class="row">
                  <div class="col-4 mb-2">
                    <span>Line No:</span>
                    <input list="lines" id="line_n_audited" name="line_n_audited" class="form-control">
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
                  <div class="col-4 mb-2">
                    <span>Car Maker: </span>
                    <input type="text" list="list" name="carmaker" id="carmaker_lineaudited" class="form-control">
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
                  <div class="col-4 mb-2">
                    <span>Car Model:</span>
                    <input type="text" name="carmodel" id="carmodel_lineaudited" class="form-control">
                  </div>
                </div>

                <div class="row">
                  <!--  <div class="col-4 mb-2">
                       <span>Audit Type: </span>
                   <select class="form-control" id="audit_type_lineaudited">
                        <option value="">Select Audit Type</option>
                        <option value="initial">Initial</option>
                        <option value="final">Final</option>
                    </select>
                    </div> -->
                  <div class="col-4 mb-2">
                    <span>Criticality Level:</span>
                    <select class="form-control" id="criticality_level_lineaudited">
                      <option value="">Select Criticality Level</optio>
                      <option value="Low Impact">Low Impact</option>
                      <option value="Medium Impact">Medium Impact</option>
                      <option value="High Impact">High Impact</option>
                    </select>
                  </div>
                  <div class="col-4 mb-2">
                    <span>Section:</span>
                    <select class="form-control" name="section" id="section_lineaudited">
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
                  <div class="col-4 mb-2">
                    <span>Process:</span>
                    <select class="form-control" name="process_lineaudited" id="process_lineaudited"></select>
                  </div>
                  <div class="col-4 mb-2">
                    <span>Group:</span>
                    <select class="form-control" name="falp_group_lineaudited" id="falp_group_lineaudited"></select>
                  </div>
                </div>


              </h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 100px;">
                  <button class="btn btn-primary" id="searchReqBtn"
                    onclick="load_list_of_line_audited_findings()">Search <i class="fas fa-search"></i></button>
                </div>
              </div>
            </div>
            <div class="row">

              <div class="col-5">
                <span style="color: white;">a</span>
                <button class="btn btn-success"
                  onclick="export_Line_audited_list('line_audited_list_data')">Export</button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height: 420px;">
              <table class="table table-head-fixed text-nowrap table-hover" id="line_audited_list_data">
                <thead>
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
                  <th style="text-align:center;">Audit Category</th>
                  <th style="text-align:center;">Problem Identification</th>
                  <th style="text-align:center;">Criticality Level</th>
                  <th style="text-align:center;">SM Analysis</th>
                  <th style="text-align:center;">Remarks</th>
                  <th style="text-align:center;">Department</th>
                  <th style="text-align:center;">Group</th>
                  <th style="text-align:center;">Section</th>
                  <th style="text-align:center;">Section Code</th>

                </thead>
                <tbody id="line_audited_data" style="text-align:center;"></tbody>
              </table>
              <div class="row">
                <div class="col-6">

                </div>
                <div class="col-6">
                  <input type="hidden" name="" id="line_audited_data">

                  <div class="spinner_line_audited" id="spinner_line_audited" style="display:none;">

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
<?php include 'plugins/script/list_of_line_audited_list_script.php'; ?>