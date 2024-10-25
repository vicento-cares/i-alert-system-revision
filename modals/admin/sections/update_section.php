<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="update_section" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <input type="hidden" name="id_update_sec" id="id_update_sec">
          <div class="col-3">
            <label for="sec_code_update">Section Code:</label> <input type="text" name="sec_code_update" id="sec_code_update"
              class="form-control" autocomplete="off" maxlength="255">
          </div>
          <div class="col-3">
            <label for="sec_dept_update">Department:</label> <input type="text" name="sec_dept_update" id="sec_dept_update" class="form-control"
              autocomplete="off" maxlength="255">
          </div>
          <div class="col-3">
            <label for="sec_falp_group_update">Group:</label> <input type="text" name="sec_falp_group_update" id="sec_falp_group_update"
              class="form-control" autocomplete="off" maxlength="255">
          </div>
          <div class="col-3">
            <label for="sec_name_update">Section Name:</label> <input type="text" name="sec_name_update" id="sec_name_update"
              class="form-control" autocomplete="off" maxlength="255">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <a href="#" class="btn btn-danger" onclick="delete_section()">Delete Section</a>
        <a href="#" class="btn btn-primary" onclick="update_section()">Update Section</a>
      </div>
    </div>
  </div>
</div>