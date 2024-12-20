<div class="modal fade bd-example-modal-xl" id="line_audit" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <div id="lineauditCode"></div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
          onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-3">
            <span>Date Audited:</span>
            <input type="date" name="" id="date_line_audited" class="form-control">
          </div>
          <div class="col-3">
            <span>Shift Group:</span>
            <select class="form-control" id="group_line">
              <option value="">Select Shift Group</option>
              <option value="a">A</option>
              <option value="b">B</option>
            </select>
          </div>
          <div class="col-3">
            <span>Shift:</span>
            <select class="form-control" id="shift_line">
              <option value="">Select Shift</option>
              <option value="ds">DS</option>
              <option value="ns">NS</option>
            </select>
          </div>
          <div class="col-3">
            <span>Criticality Level:</span>
            <select class="form-control" id="line_criticality_level">
              <option value="">Select Criticality Level</option>
              <option value="Low Impact">Low Impact</option>
              <option value="Medium Impact">Medium Impact</option>
              <option value="High Impact">High Impact</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span> Car Maker: </span> <input type="text" list="list" id="carmaker_line" class="form-control-lg"
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
            <span> Car Model: </span> <input type="text" id="carmodel_line" class="form-control-lg" autocomplete="OFF"
              class="noSpace" maxlength="255">
          </div>
          <div class="col-3">
            <span> Line No: </span>
            <select class="form-control" name="emline_line" id="emline_line">
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
            <select class="form-control" id="process_line">
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
            <select class="form-control" name="line_audit_findings" id="line_audit_findings">
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
            <span>Audit Details:</span>
            <input type="text" name="" id="line_audit_details" class="form-control-lg" autocomplete="OFF" maxlength="255">
          </div>
          <div class="col-3">
            <span>Audited By:</span>
            <input type="text" name="" id="line_audited_by" class="form-control-lg" autocomplete="OFF" maxlength="255">
          </div>
          <div class="col-3">
            <span>Audit Type:</span>
            <input type="text" name="" id="line_audit_type" class="form-control-lg" value="Line Audit" readonly>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span>Audit Category:</span>
            <select class="form-control" id="line_audit_category">
              <option value="">Select Audit Category</option>
              <option value="Major">Major</option>
              <option value="Minor">Minor</option>
            </select>
          </div>
          <div class="col-3">
            <span>Problem Identification:</span>
            <select class="form-control" name="line_problem_identification" id="line_problem_identification">
              <option value="">Select Problem</option>
              <option value="Process Design Problem">Process Design Problem</option>
              <option value="Discipline/Behaviour">Discipline/Behaviour</option>
              <option value="Parts Problem">Parts Problem</option>
              <option value="Education Problem">Education Problem</option>
              <option value="Management Problem">Management Problem</option>
              <option value="Machine/Jigs/Accessories Problem">Machine/Jigs/Accessories Problem</option>
              <option value="Method Problem">Method Problem</option>
            </select>
          </div>
          <div class="col-3">
            <span>SM Analysis:</span>
            <select class="form-control" name="line_sm_analysis" id="line_sm_analysis">
              <option value="">Select SM Analysis</option>
              <option value="Man">Man</option>
              <option value="Machine">Machine</option>
              <option value="Method">Method</option>
              <option value="Material">Material</option>
              <option value="Measurement">Measurement</option>
            </select>
          </div>
          <div class="col-3">
            <span>Remarks</span>
            <input type="text" name="" id="remarks_line" class="form-control-lg" autocomplete="OFF" maxlength="255">
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span>Group:</span>
            <select class="form-control" name="falp_group_line" id="falp_group_line"
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
          <div class="col-3">
            <span>Section:</span>
            <select class="form-control" name="section_line" id="section_line">
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
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <p style="text-align:right;">
              <button type="button" class="btn btn-primary" onclick="save_request_line()"
                id="planBtnCreate">Submit</button>
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
              <th>Shift</th>
              <th>Shift Group</th>
              <th>Car Maker</th>
              <th>Car Model</th>
              <th>Line No</th>
              <th>Process</th>
              <th>Audit Findings</th>
              <th>Audit Details</th>
              <th>Audited By</th>
              <th>Audit Category</th>
              <th>Problem Identification</th>
              <th>Criticality Level</th>
              <th>SM Analysis</th>
              <th>Audit Type</th>
              <th>Department</th>
              <th>Group</th>
              <th>Section</th>
              <th>Section Code</th>
              <th>Remarks</th>
            </thead>
            <tbody id="data_preview_line_audit"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>