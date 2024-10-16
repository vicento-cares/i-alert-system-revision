<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add_section" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-3">
            <label for="sec_code">Section Code:</label> <input type="text" name="sec_code" id="sec_code" class="form-control"
              autocomplete="off" maxlength="255">
          </div>
          <div class="col-3">
            <label for="sec_dept">Department:</label> <input type="text" name="sec_dept" id="sec_dept" class="form-control"
              autocomplete="off" maxlength="255">
          </div>
          <div class="col-3">
            <label for="sec_falp_group">Group:</label> <input type="text" name="sec_falp_group" id="sec_falp_group" class="form-control"
              autocomplete="off" maxlength="255">
          </div>
          <div class="col-3">
            <label for="sec_name">Section Name:</label> <input type="text" name="sec_name" id="sec_name" class="form-control"
              autocomplete="off" maxlength="255">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-primary" onclick="register_section()">Register Section</a>
      </div>
    </div>
  </div>
</div>