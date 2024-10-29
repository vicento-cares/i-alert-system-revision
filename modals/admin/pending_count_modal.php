<div class="modal fade bd-example-modal-xl" id="pending_count_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <div>
            <h3><b id="pending_count_modal_name">Section 1</b></h3>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-5">
                  <label for="auditedpcmdatefrom">Audited Date From:</label> <input type="date" id="auditedpcmdatefrom"
                    class="form-control" value="<?= $server_month; ?>" autocomplete=off>
                </div>
                <div class="col-5">
                  <label for="auditedpcmdateto">Audited Date To:</label> <input type="date" id="auditedpcmdateto" class="form-control"
                    value="<?= $server_date_only; ?>" autocomplete=off>
                </div>
                <div class="col-2">
                  <span style="visibility:hidden;">a</span>
                  <button class="btn btn-primary" id="btnPendingCountModalSearch" onclick="fetch_pending_count()">Search</button>
                </div>
              </div>
            </div>
          </div>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
          onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input type="hidden" name="section_id" id="section_id_pcm" value="">
        <input type="hidden" name="section" id="section_pcm" value="">
        <input type="hidden" name="falp_group" id="falp_group_pcm" value="">
        <div class="row">
          <div class="col-2">
            <span>Employee ID: </span>
            <input type="text" name="empid" id="empid_pcm" class="form-control">
          </div>

          <div class="col-2">
            <span>Full Name: </span>
            <input type="text" name="fname" id="fname_pcm" class="form-control">
          </div>

          <div class="col-2">
            <span>Line No: </span>
            <input type="text" name="linen" id="linen_pcm" class="form-control">
          </div>

          <div class="col-2">
            <span>Car Maker: </span>
            <input type="text" name="carmaker" id="carmaker_pcm" class="form-control">
          </div>

          <div class="col-2">
            <span>Car Model: </span>
            <input type="text" name="carmodel" id="carmodel_pcm" class="form-control">
          </div>

          <div class="col-2">
            <span>Position: </span>
            <select id="position_pcm" class="form-control" autocomplete=off>
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
          <div class="col-2">
            <span>Audit Type:</span>
            <select class="form-control" id="audit_type_pcm">
              <option value="">Select Audit Type</option>
              <option value="initial">Initial</option>
              <option value="final">Final</option>
            </select>
          </div>
          <div id="other_pcm_dropdown" class="col-2">
            <span>Other Group:</span>
            <select class="form-control" name="other_pcm" id="other_pcm"></select>
          </div>
          <div id="provider_pcm_dropdown" class="col-2">
            <span>Provider:</span>
            <select class="form-control" name="provider_pcm" id="provider_pcm">
              <option value>Select Provider</option>
              <?php
              $get_curiculum = "SELECT DISTINCT esection 
                                FROM ialert_account 
                                WHERE role = 'provider' OR role ='fas' 
                                ORDER BY esection ASC";
              $stmt = $conn->prepare($get_curiculum);
              $stmt->execute();
              foreach ($stmt->fetchALL() as $x) {
                echo '<option value="' . $x['esection'] . '">' . $x['esection'] . '</option>';
              }
              ?>
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <button class="btn btn-secondary" onclick="uncheck_all_pcm()">Uncheck</button> &nbsp;
            <button type="button" class="btn btn-success" onclick="export_pcm_pending('pcm_data')">Export</button>
            &nbsp;
            <button class="btn btn-info" data-toggle="modal" data-target="#count">Audit&nbsp;Count</button>&nbsp;
            <button class="btn btn-danger" onclick="delete_pcm()">Delete</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">

        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap table-hover" style="" id="pcm_data">
            <thead style="text-align:center;">
              <th style="text-align:center;">
                <input type="checkbox" name="" id="check_all_audit_pcm" onclick="select_all_func_pcm()">
              </th>
              <th style="text-align:center;">#</th>
              <th style="text-align:center; display: none;">Audit Code:</th>
              <th style="text-align:center;">Date Audited</th>
              <th style="text-align:center;">Full Name</th>
              <th style="text-align:center;">Position</th>
              <th style="text-align:center;">Employee ID</th>
              <th style="text-align:center;">Provider</th>
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
              <th style="text-align:center;">SM Analysis</th>
              <th style="text-align:center;">Remarks</th>
              <th style="text-align:center;">FAS Penalty</th>
              <th style="text-align:center;">Agency Penalty</th>
              <th style="text-align:center;">HR Status</th>

            </thead>
            <tbody id="preview_pcm_data"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>