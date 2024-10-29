<div class="modal fade bd-example-modal-xl" id="sp2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
          <div>
            <h3><b>Secondary 2 Process</b></h3>
            <div class="col-sm-12">
              <div class="row">
                <div class="col-5">
                  <label for="auditedsp2datefrom">Audited Date From:</label> <input type="date" id="auditedsp2datefrom"
                    class="form-control" value="<?= $server_month; ?>" autocomplete=off>
                </div>
                <div class="col-5">
                  <label for="auditedsp2dateto">Audited Date To:</label> <input type="date" id="auditedsp2dateto" class="form-control"
                    value="<?= $server_date_only; ?>" autocomplete=off>
                </div>
                <div class="col-2">
                  <span style="visibility:hidden;">a</span>
                  <button class="btn btn-primary" id="searchReqBtn" onclick="load_sp2()">Search </button>

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
        <div class="row">
          <div class="col-2">
            <span>Employee ID: </span>
            <input type="text" name="empid" id="empid_sp2" class="form-control">
          </div>
          <div class="col-2">
            <span>Full Name: </span>
            <input type="text" name="fname" id="fname_sp2" class="form-control">
          </div>
          <div class="col-2">
            <span>Line No: </span>
            <input type="text" name="linen" id="linen_sp2" class="form-control">
          </div>

          <div class="col-2">
            <span>Car Maker: </span>
            <input type="text" name="carmaker" id="carmaker_sp2" class="form-control">
          </div>

          <div class="col-2">
            <span>Car Model: </span>
            <input type="text" name="carmodel" id="carmodel_sp2" class="form-control">
          </div>

          <div class="col-2">
            <span>Position: </span>
            <select id="position_sp2" class="form-control" autocomplete=off>
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
            <span>Section:</span>
            <select id="section_sp2" class="form-control"></select>
          </div>
          <div class="col-2">
            <span>Audit Type:</span>
            <select class="form-control" id="audit_type_sp2">
              <option value="">Select Audit Type</option>
              <option value="initial">Initial</option>
              <option value="final">Final</option>
            </select>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-12">
            <button class="btn btn-secondary" onclick="uncheck_all_sp2()">Uncheck</button> &nbsp;
            <button type="button" class="btn btn-success" onclick="export_sp2_pending('sp2_data')">Export</button>
            &nbsp;
            <button class="btn btn-info" data-toggle="modal" data-target="#count">Audit&nbsp;Count</button>&nbsp;
            <button class="btn btn-danger" onclick="delete_sp2()">Delete</button>
          </div>
        </div>
      </div>
      <div class="modal-footer">

        <div class="card-body table-responsive p-0" style="height: 300px;">
          <table class="table table-head-fixed text-nowrap table-hover" style="" id="sp2_data">
            <thead style="text-align:center;">
              <th style="text-align:center;">
                <input type="checkbox" name="" id="check_all_audit_sp2" onclick="select_all_func_sp2()">
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
              <th style="text-align:center;">Criticality Level</th>
              <th style="text-align:center;">Remarks</th>
              <th style="text-align:center;">FAS Penalty</th>
              <th style="text-align:center;">Agency Penalty</th>
              <th style="text-align:center;">HR Status</th>

            </thead>
            <tbody id="preview_sp2_data"></tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>