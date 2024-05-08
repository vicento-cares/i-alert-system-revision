<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/audited_list_closebar.php';?>
 
<section class="content">
<div class="container-fluid">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List of Audited Closed <input type="hidden" name="section" id="section_closed" value="<?=$section;?>"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">List of Audited Closed</li>
            </ol>
          </div>
           <div class="col-sm-6">
              <div class="row">
                    <div class="col-6">
                <label for="">Audited Date From:</label> <input type="date" id="recievedfrom_closed" class="form-control" value="<?=$server_month;?>" autocomplete=off>
                    </div>
                    <div class="col-6">
                <label for="">Audited Date To:</label>  <input type="date" id="recievedto_closed" class="form-control" value="<?=$server_date_only;?>" autocomplete=off> 
                  </div>
          </div>
          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                    <div class="row">
                     <div class="col-3">
                <span>Employee ID: </span>
                  <input type="text" name="empid" id="empid_audited_fas_closed" class="form-control">
                    </div>
                    <div class="col-3">
                  <span>Full Name: </span>
                  <input type="text" name="fname" id="fname_audited_fas_closed" class="form-control">
                  </div>
                     <div class="col-3">
                <span for="">Line no:</span>  <input type="text" id="linename_audited_fas_closed" class="form-control" autocomplete=off> 
                  </div>
                   <div class="col-3">
                <span for="">Position:</span>  <select id="position_closed" class="form-control" autocomplete=off> 
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
                     <div class="col-3">
                <span>Car Maker: </span>
                  <input type="text" name="carmaker" id="carmaker_closed" class="form-control">
                    </div>
                    <div class="col-3">
                  <span>Car Model: </span>
                  <input type="text" name="carmodel" id="carmodel_closed" class="form-control">
                  
                  </div>
                   <div class="col-3">
                  <span>Audit Type: </span>
                   <select class="form-control" id="audit_type_closed">
                        <option value="">Select Audit Type</option>
                        <option value="initial">Initial</option>
                        <option value="final">Final</option>
                    </select>
                  </div>
                  <div class="col-3">
                     <span>Audit Category: </span>
                   <select class="form-control" id="audit_categ_closed">
                        <option value="">Select Audit Category</option>
                        <option value="minor">Minor</option>
                        <option value="major">Major</option>
                    </select>
                  </div>
                   <div class="col-3">
                         <span>Shift:</span>
                    <select class="form-control" id="shifts_provider_closed">
                        <option value="">Select Shift</option>
                        <option value="ds">DS</option>
                        <option value="ns">NS</option>
                    </select>
                      </div>
            <div class="col-3">
                         <span>Groups:</span>
                    <select id="groups_provider_closed" class="form-control">
                       <option value="">Select Group</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                    </select>

                      </div>

                  </div>
                </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <button class="btn btn-primary" id="searchReqBtn" onclick="search_closed()">Search <i class="fas fa-search"></i></button> 

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                   &nbsp; <button class="btn btn-success " onclick="export_audit_list_closed('provider_audit_closed')">Export</button>
                </div>
              </div>
              <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="provider_audit_closed">
                 <thead>
                    
                    <th style="text-align:center;">#</th>
                    <th style="text-align:center; display: none;">Audit Code:</th>
                    <th style="text-align:center;">Date Audited</th>
                    <th style="text-align:center;">Full Name</th>
                    <th style="text-align:center;">Employee ID</th>
                    <th style="text-align:center;">Position</th>
                    <th style="text-align:center;">Shift</th>
                    <th style="text-align:center;">Provider</th>
                    <th style="text-align:center;">Group</th>
                    <th style="text-align:center;">Car Maker</th>
                    <th style="text-align:center;">Car Model</th>
                    <th style="text-align:center;">Section</th>
                    <th style="text-align:center;">Line No.</th>
                    <th style="text-align:center;">Process</th>
                    <th style="text-align:center;">Audit Findings</th>
                    <th style="text-align:center;">Audit Type</th>
                    <th style="text-align:center;">Audited By</th>
                    <th style="text-align:center;">Audit Category</th>
                    <th style="text-align:center;">Concerned Group</th>
                    <th style="text-align:center;">Updated By</th> 

                </thead>
                <tbody id="audited_closed_provdier" style="text-align:center;"></tbody>
                </table>
                <div class="row">
                  <div class="col-6">
                    
                  </div>
                  <div class="col-6">
                      <input type="hidden" name="" id="audited_closed_fas">
   
                    <div class="spinner" id="spinner" style="display:none;">
                        
                        <div class="loader float-sm-center"></div>    
                    </div>
             
                  </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
</div>
</div>
</section>

<?php include 'plugins/footer.php';?>
<?php include 'plugins/script/audited_list_close_script.php'; ?>