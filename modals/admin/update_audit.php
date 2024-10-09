<div class="modal fade bd-example-modal-xl" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <input type="hidden" name="id_update" id="id_update">
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
          onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-3">
            <span> Employee No: </span> <input type="text" id="employee_num_update" class="form-control-lg"
              onchange="detect_part_info()" autocomplete="OFF" maxlength="255">
          </div>
          <div class="col-3">
            <span> Full Name: </span> <input type="text" id="full_name_update" class="form-control-lg"
              autocomplete="OFF" class="noSpace" maxlength="255">
          </div>
          <div class="col-3">
            <span> Position: </span>
            <select id="position_update" class="form-control">
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
            <select class="form-control" id="provider_update">
              <option>Select Provider</option>
              <?php
              $get_curiculum = "SELECT DISTINCT esection FROM ialert_account WHERE role = 'provider' OR role ='fas'";
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
            <input list="shifts" id="shift_update" name="shift_update" class="form-control-lg" maxlength="255">
            <datalist id="shifts" name="">
              <option value="DS">
              <option value="NS">
            </datalist>
          </div>
          <div class="col-3">
            <span>Shift Group:</span>
            <input type="text" name="group_update" id="group_update" class="form-control" maxlength="255">
          </div>
          <div class="col-3">
            <span>Audit Type:</span>
            <input list="audit_typee" id="audit_type_update" name="audit_type_update" class="form-control-lg" maxlength="255">
            <datalist id="audit_typee" name="">
              <option value="Initial">
              <option value="Final">
              <option value="Warehouse">
            </datalist>
          </div>
          <div class="col-3">
            <span>Audit Category:</span>
            <input list="audit_categ" id="audit_categ_update" name="audit_categ_update" class="form-control-lg" maxlength="255">
            <datalist id="audit_categ" name="">
              <option value="Minor">
              <option value="Major">
            </datalist>
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span> Car Maker: </span> <input type="text" list="list" id="carmaker_update" class="form-control-lg"
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
            <span> Car Model: </span> <input type="text" id="carmodel_update" class="form-control-lg" autocomplete="OFF"
              class="noSpace" maxlength="255">
          </div>
          <div class="col-3">
            <span> Line No: </span>
            <select class="form-control" name="emline" id="emline_update">
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
            <select class="form-control" id="process_update">
              <option>Select Process</option>
              <?php
              $get_process = "SELECT DISTINCT process FROM ialert_audit";
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
            <select class="form-control" name="audit_findings" id="audit_findings_update">
              <option selected value="">Select Audit Findings</option>
              <?php
              $audit_findingss = "SELECT DISTINCT audit_findings FROM ialert_audit_findings_categ";

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
            <input type="text" name="" id="audited_by_update" class="form-control-lg" autocomplete="OFF" maxlength="255">
          </div>
          <div class="col-3">
            <span>Date Audited:</span>
            <input type="date" name="" id="date_audited_update" class="form-control">
          </div>
          <div class="col-3">
            <span>Remarks</span>
            <input type="text" name="" id="remarks_update" class="form-control-lg" autocomplete="OFF" maxlength="255">
          </div>
        </div>
        <div class="row">
          <div class="col-3">
            <span>Group:</span>
            <select class="form-control" name="falp_group_update" id="falp_group_update"
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
            <select class="form-control" name="section_update" id="section_update">
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

            <div class="col-3"></div>
            <div class="col-4"></div>
          </div>
          <br>
          <div class="row">
            <div class="col-3 my-4 mx-3">
              <p style="text-align:right;">
                <button type="button" class="btn btn-primary" onclick="update_audit_data()"
                  id="planBtnCreate">Update</button>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>