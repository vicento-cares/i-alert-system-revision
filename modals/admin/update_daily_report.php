<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="update_daily_report" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Daily Report</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="update_daily_report_form" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <input type="hidden" name="id" id="id_update_dr">
            <input type="hidden" name="old_file_name" id="daily_report_file_name_update">
            <input type="hidden" name="old_file_url" id="daily_report_file_url_update">
            <div class="col-3">
              <label for="daily_report_date">Daily Report Date:</label>
              <input type="date" name="daily_report_date" id="daily_report_date_update" class="form-control" required>
            </div>
            <div class="col-5">
              <label for="daily_report_file">File:</label><br>
              <input type="file" name="file" id="daily_report_file_update" accept=".pdf">
            </div>
            <div class="col-4">
              <label for="daily_report_file">Current File:</label><br>
              <span id="daily_report_file_name_label_update"></span>
            </div>
          </div>
          <br>
          <hr>
          <div class="row">
            <div class="col-8">
              <div class="float-left">
                <button class="btn btn-danger" id="btnDeleteDailyReport" name="btn_delete_daily_report">Delete</button>
              </div>
            </div>
            <div class="col-2">
              <div class="float-right">
                <button class="btn btn-primary" id="btnUpdateDailyReportDate" name="btn_update_daily_report_date">Update Date</button>
              </div>
            </div>
            <div class="col-2">
              <div class="float-right">
                <button class="btn btn-primary" id="btnUpdateDailyReportFile" name="btn_update_daily_report_file">Update File</button>
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>