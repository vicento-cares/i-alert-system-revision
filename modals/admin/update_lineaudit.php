<div class="modal fade bd-example-modal-xl" id="updateline" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <input type="hidden" name="id_line" id="id_line_update">

        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="javascript:window.location.reload()">
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
            <input type="text" name="group_line_update" id="group_line_update" class="form-control">
          </div>
          <div class="col-3">
            <span>Shift:</span>
            <input type="text" name="shift_line_update" id="shift_line_update" class="form-control">
          </div>
          <div class="col-3">
            <span>Audit Category:</span>
            <input type="text" name="line_audit_categ_update" id="line_audit_categ_update" class="form-control">
          </div>

        </div>
        <div class="row">
          <div class="col-3">
            <span> Car Maker: </span> <input type="text" id="carmaker_line_update" class="form-control" list="list" autocomplete="OFF" class="noSpace">
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
            <span> Car Model: </span> <input type="text" id="carmodel_line_update" class="form-control" autocomplete="OFF" class="noSpace">
          </div>
          <div class="col-3">
            <span> Line No: </span>
            <input list="lines" id="emline_line_update" name="emline_line_update" class="form-control">

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
            <span> Process: </span>
            <select class="form-control" id="process_line_update">
              <option>Select Process</option>
              <?php
              require '../../process/conn.php';
              $get_process = "SELECT DISTINCT process FROM ialert_line_audit";
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
            <input list="audit_findingss" id="line_audit_findings_update" name="line_audit_findings" class="form-control">

            <datalist id="audit_findingss" name="">
              <option value="">Select Line</option>
              <?php
              require '../../process/conn.php';
              $audit_findingss = "SELECT DISTINCT audit_findings FROM ialert_audit_findings_categ";

              $stmt = $conn->prepare($audit_findingss);
              $stmt->execute();
              foreach ($stmt->fetchALL() as $j) {

                echo '<option value="' . $j['audit_findings'] . '">';
              }

              ?>

            </datalist>
          </div>
          <div class="col-3">
            <span>Audited By:</span>
            <input type="text" name="" id="line_audited_by_update" class="form-control" autocomplete="OFF">
          </div>
          <div class="col-3">
            <span>Audit Type:</span>
            <input type="text" name="" id="line_audit_type_update" class="form-control" value="Line Audit" readonly>

          </div>
          <div class="col-3">
            <span>Remarks</span>
            <input type="text" name="" id="remarks_line_update" class="form-control" autocomplete="OFF">
          </div>
        </div>

        <div class="row">
          <div class="col-3">
            <span>Section:</span>
            <select class="form-control" name="section_line_update" id="section_line_update">
              <option value="">Select Section</option>
              <!--   <option value="section1">Section1</option>
                       <option value="section2">Section2</option>
                       <option value="section3">Section3</option>
                       <option value="section4">Section4</option>
                       <option value="section5">Section5</option>
                       <option value="section6">Section6</option>
                       <option value="section7">Section7</option>
                       <option value="section8">Section8</option>
                        <option value="battery">Battery</option>
                         <option value="qa-initial">QA Initial</option>
                          <option value="qa-final">QA Final</option>
                           <option value="repair">Repair</option> -->
              <?php
              require '../../process/conn.php';
              $get_curiculum = "SELECT DISTINCT section,name FROM ialert_section";
              $stmt = $conn->prepare($get_curiculum);
              $stmt->execute();
              foreach ($stmt->fetchALL() as $x) {

                echo '<option value="' . $x['section'] . '">' . $x['name'] . '</option>';
              }
              ?>
            </select>
          </div>
          <div class="col-3">
            <span>Group:</span>
            <select class="form-control" name="falp_group_line_update" id="falp_group_line_update" onchange="fetch_section_dropdown()">
              <option value="">Select Group</option>
              <?php
              require '../../process/conn.php';
              $get_curiculum = "SELECT DISTINCT falp_group FROM ialert_section";
              $stmt = $conn->prepare($get_curiculum);
              $stmt->execute();
              foreach ($stmt->fetchALL() as $x) {

                echo '<option value="' . $x['falp_group'] . '">' . $x['falp_group'] . '</option>';
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