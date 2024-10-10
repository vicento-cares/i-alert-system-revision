<div class="modal fade bd-example-modal-xl" id="updateline" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <input type="hidden" name="id_line" id="id_line_update">
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
            <input type="date" name="" id="date_line_audited_update" class="form-control">
          </div>
          <div class="col-3">
            <span>Group:</span>
            <input type="text" name="group_line_update" id="group_line_update" class="form-control" maxlength="255">
          </div>
          <div class="col-3">
            <span>Shift:</span>
            <input type="text" name="shift_line_update" id="shift_line_update" class="form-control" maxlength="255">
          </div>
          <div class="col-3">
            <span>Audit Category:</span>
            <input type="text" name="line_audit_categ_update" id="line_audit_categ_update" class="form-control" maxlength="255">
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span> Car Maker: </span> <input type="text" id="carmaker_line_update" class="form-control" list="list"
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
            <span> Car Model: </span> <input type="text" id="carmodel_line_update" class="form-control"
              autocomplete="OFF" class="noSpace" maxlength="255">
          </div>
          <div class="col-3">
            <span> Line No: </span>
            <select class="form-control" name="emline_line_update" id="emline_line_update">
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
            <select class="form-control" id="process_line_update">
              <option>Select Process</option>
              <?php
              $get_process = "SELECT DISTINCT process FROM ialert_line_audit ORDER BY process ASC";
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
            <select class="form-control" name="line_audit_findings" id="line_audit_findings_update">
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
            <input type="text" name="" id="line_audited_by_update" class="form-control" autocomplete="OFF" maxlength="255">
          </div>
          <div class="col-3">
            <span>Audit Type:</span>
            <input type="text" name="" id="line_audit_type_update" class="form-control" value="Line Audit" readonly>
          </div>
          <div class="col-3">
            <span>Remarks</span>
            <input type="text" name="" id="remarks_line_update" class="form-control" autocomplete="OFF" maxlength="255">
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span>Group:</span>
            <select class="form-control" name="falp_group_line_update" id="falp_group_line_update"
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
            <select class="form-control" name="section_line_update" id="section_line_update">
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
              <button type="button" class="btn btn-primary" onclick="update_lineaudit()">Update</button>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>