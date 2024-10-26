<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add_daily_report" tabindex="-1" role="dialog"
  aria-labelledby="add_daily_report_label" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_daily_report_label">Add Daily Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="add_daily_report_form" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <div class="col-3">
              <label for="daily_report_date">Daily Report Date:</label>
              <input type="date" name="daily_report_date" id="daily_report_date" class="form-control" required>
            </div>
            <div class="col-3">
              <label for="daily_report_file">File:</label>
              <input type="file" name="file" id="daily_report_file" accept=".pdf" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
      </form>
    </div>
  </div>
</div>