<div class="modal fade bd-example-modal-xl" id="audit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <div id="auditCode"></div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
          onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-3">
            <span> Employee No: </span> <input type="text" id="employee_num" class="form-control-lg"
              onchange="detect_part_info()" autocomplete="OFF" maxlength="255">
          </div>
          <div class="col-3">
            <span> Full Name: </span> <input type="text" id="full_name" class="form-control-lg" autocomplete="OFF"
              class="noSpace" maxlength="255">
          </div>
          <div class="col-3">
            <span> Position: </span>
            <select id="position" class="form-control">
              <option value="">Select Position</option>
              <option value="Associate">Associate</option>
              <option value="Expert">Expert</option>
              <option value="Jr. Staff">Jr. Staff</option>
              <option value="Staff">Staff</option>
              <option value="Supervisor">Supervisor</option>
              <option value="Assistant Manager">Assistant Manager</option>
              <option value="Manager">Manager</option>
            </select>
          </div>
          <div class="col-3">
            <span> Provider: </span>
            <select class="form-control" id="provider">
              <option>Select Provider</option>
              <?php
              $get_curiculum = "SELECT DISTINCT esection FROM ialert_account WHERE role = 'provider' OR role ='fas' ORDER BY esection ASC";
              $stmt = $conn->prepare($get_curiculum);
              $stmt->execute();
              foreach ($stmt->fetchALL() as $x) {
                echo '<option value="' . $x['esection'] . '">' . $x['esection'] . '</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span>Shift:</span>
            <select class="form-control" id="shift">
              <option value="">Select Shift</option>
              <option value="ds">DS</option>
              <option value="ns">NS</option>
            </select>
          </div>
          <div class="col-3">
            <span>Shift Group:</span>
            <select class="form-control" id="group">
              <option value="">Select Shift Group</option>
              <option value="a">A</option>
              <option value="b">B</option>
            </select>
          </div>
          <div class="col-3">
            <span>Audit Type:</span>
            <select class="form-control" id="audit_type">
              <option value="">Select Audit Type</option>
              <option value="initial">Initial</option>
              <option value="final">Final</option>
              <!-- <option value="warehouse">Warehouse</option> -->
            </select>
          </div>
          <div class="col-3">
            <span>Criticality Level:</span>
            <select class="form-control" id="criticality_level">
              <option value="">Select Criticality Level</option>
              <option value="Low Impact">Low Impact</option>
              <option value="Medium Impact">Medium Impact</option>
              <option value="High Impact">High Impact</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span> Car Maker: </span> <input type="text" list="list" id="carmaker" class="form-control-lg"
              autocomplete="OFF" class="noSpace" maxlength="255">
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
            <span> Car Model: </span> <input type="text" id="carmodel" class="form-control-lg" autocomplete="OFF"
              class="noSpace" maxlength="255">
          </div>
          <div class="col-3">
            <span> Line No: </span>
            <select class="form-control" name="emline" id="emline">
              <option selected value="">Select Line</option>
              <?php
              $line = "SELECT DISTINCT line_no FROM ialert_lines ORDER BY line_no ASC";

              $stmt = $conn->prepare($line);
              $stmt->execute();
              foreach ($stmt->fetchALL() as $j) {
                echo '<option value="' . $j['line_no'] . '">' . $j['line_no'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="col-3">
            <span> Process: </span>
            <select class="form-control" id="process">
              <option>Select Process</option>
              <?php
              $get_process = "SELECT process FROM ialert_process ORDER BY process ASC";
              $stmt = $conn->prepare($get_process);
              $stmt->execute();
              foreach ($stmt->fetchALL() as $x) {
                echo '<option value="' . $x['process'] . '">' . $x['process'] . '</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span>Audit Findings:</span>
            <select class="form-control" name="audit_findings" id="audit_findings">
              <option selected value="">Select Audit Findings</option>
              <?php
              $audit_findingss = "SELECT DISTINCT audit_findings FROM ialert_audit_findings_categ ORDER BY audit_findings ASC";

              $stmt = $conn->prepare($audit_findingss);
              $stmt->execute();
              foreach ($stmt->fetchALL() as $j) {
                echo '<option value="' . $j['audit_findings'] . '">' . $j['audit_findings'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="col-3">
            <span>Audited By:</span>
            <input type="text" name="" id="audited_by" class="form-control-lg" autocomplete="OFF" maxlength="255">
          </div>

          <div class="col-3">
            <span>Date Audited:</span>
            <input type="date" name="" id="date_audited" class="form-control">

          </div>
          <div class="col-3">
            <span>Remarks</span>
            <!-- <input type="text" name="" id="remarks" class="form-control-lg" autocomplete="OFF"> -->
            <input list="remark" id="remarks" class="form-control-lg" autocomplete="OFF" maxlength="255">
            <datalist id="remark">
              <option value="N/A">
              <option value="Support">
            </datalist>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span>Group:</span>
            <select class="form-control" name="falp_group" id="falp_group" onchange="fetch_section_dropdown()">
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
          <div class="col-3">
            <span>Section:</span>
            <select class="form-control" name="section" id="section">
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
          <div class="col-4"></div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <p style="text-align:right;">
              <button type="button" class="btn btn-primary" onclick="save_request()" id="planBtnCreate">Submit</button>
              <!--  <button class="btn blue darken-3  col s12" onclick="save_request()" id="planBtnCreate">submit</button> -->
            </p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <div class="card-body table-responsive p-0" style="height: 200px;">
          <table class="table table-head-fixed text-nowrap table-hover" style="">
            <thead style="text-align:center;">
              <th>#</th>
              <th>Date Audited</th>
              <th>Full Name</th>
              <th>Employee ID</th>
              <th>Provider</th>
              <th>Position</th>
              <th>Shift</th>
              <th>Shift Group</th>
              <th>Car Maker</th>
              <th>Car Model</th>
              <th>Line No.</th>
              <th>Process</th>
              <th>Audit Findings</th>
              <th>Audited By</th>
              <th>Criticality Level</th>
              <th>Remarks</th>
              <th>Department</th>
              <th>Group</th>
              <th>Section</th>
              <th>Section Code</th>
            </thead>
            <tbody id="data_preview_audit"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>