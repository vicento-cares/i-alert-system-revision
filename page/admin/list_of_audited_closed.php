<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/list_of_audited_closedbar.php';?>

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
                <label for="">Audited Date From:</label> <input type="date" id="recievedfrom_closed_admin" class="form-control" value="<?=$server_month;?>" autocomplete=off>
                    </div>
                    <div class="col-6">
                <label for="">Audited Date To:</label>  <input type="date" id="recievedto_closed_admin" class="form-control" value="<?=$server_date_only;?>" autocomplete=off> 
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
                  <input type="text" name="empid" id="emp_id_admin" class="form-control">
                    </div>
                    <div class="col-3">
                  <span>Full Name: </span>
                  <input type="text" name="fname" id="fname_admin" class="form-control">
                  </div>
                     <div class="col-3">
                      <span for="line_no_admin">Line no:</span> 
                      <input list="lines" id="line_no_admin" name="line_no_admin" class="form-control">
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
                <span for="">Position:</span>  <select id="position_admin" class="form-control" autocomplete=off> 
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
                  <input type="text" list="list" name="carmaker_admin" id="carmaker_admin" class="form-control">
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
                  <span>Car Model: </span>
                  <input type="text" name="car_model_admin" id="car_model_admin" class="form-control">
                  
                  </div>
                   <div class="col-3">
                  <span>Audit Type: </span>
                   <select class="form-control" id="audit_type_admin">
                        <option value="">Select Audit Type</option>
                        <option value="initial">Initial</option>
                        <option value="final">Final</option>
                    </select>
                  </div>
                  <div class="col-3">
                     <span>Audit Category: </span>
                   <select class="form-control" id="audit_categ_admin">
                        <option value="">Select Audit Category</option>
                        <option value="minor">Minor</option>
                        <option value="major">Major</option>
                    </select>
                  </div>
                  </div>

                   <div class="row">
                      <div class="col-3">
                         <span>Shift Groups:</span>
                    <select id="group_admin" class="form-control">
                       <option value="">Select Group</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                    </select>

                      </div>
                      <div class="col-3">
                         <span>Shift:</span>
                    <select class="form-control" id="shift_admin">
                        <option value="">Select Shift</option>
                        <option value="ds">DS</option>
                        <option value="ns">NS</option>
                    </select>
                      </div>

                      <div class="col-3">
                   <span>Section:</span>
                    <select class="form-control" name="section_admin" id="section_admin">
                      <option value="">Select Section</option>
                      <?php
                      require '../../process/conn.php';
                      $get_curiculum = "SELECT DISTINCT section, name FROM ialert_section";
                      $stmt = $conn->prepare($get_curiculum);
                      $stmt->execute();
                      foreach ($stmt->fetchALL() as $x) {
                        echo '<option value="' . $x['section'] . '">' . $x['name'] . '</option>';
                      }
                      ?>
                    </select>
                </div>
                <div class="col-3">
                      <span> Provider:   </span> 
                       <select class="form-control" id="provider_closed">
                          <option value="">Select Provider</option>
                           <?php
                            require '../../process/conn.php';
                            $get_curiculum = "SELECT DISTINCT esection FROM ialert_account WHERE role = 'provider' OR role ='fas' ORDER BY role ASC";
                            $stmt = $conn->prepare($get_curiculum);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['esection'].'">'.$x['esection'].'</option>';
                            }
                     ?>
                        </select>
                </div>
                <div class="col-3">
                      <span> Group:   </span> 
                      <select class="form-control" name="falp_group" id="falp_group">
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

                </h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 100px;">
                    <button class="btn btn-primary" id="searchReqBtn" onclick="admin_closed()">Search <i class="fas fa-search"></i></button> 

                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                   &nbsp; <button class="btn btn-success " onclick="export_admin_audited_closed('audited_closed_admins')">Export</button>
                </div>
              </div>
              <div class="card-body table-responsive p-0" style="height: 420px;">
                <table class="table table-head-fixed text-nowrap table-hover" id="audited_closed_admins">
                 <thead>
                    
                    <th style="text-align:center;">#</th>
                    <th style="text-align:center; display: none;">Audit Code:</th>
                    <th style="text-align:center;">Date Audited</th>
                    <th style="text-align:center;">Full Name</th>
                    <th style="text-align:center;">Employee ID</th>
                    <th style="text-align:center;">Position</th>
                    <th style="text-align:center;">Shift</th>
                    <th style="text-align:center;">Provider</th>
                    <th style="text-align:center;">Shift Group</th>
                    <th style="text-align:center;">Car Maker</th>
                    <th style="text-align:center;">Car Model</th>
                    <th style="text-align:center;">Line No.</th>
                    <th style="text-align:center;">Process</th>
                    <th style="text-align:center;">Audit Findings</th>
                    <th style="text-align:center;">Audit Type</th>
                    <th style="text-align:center;">Audited By</th>
                    <th style="text-align:center;">Audit Category</th>
                    <th style="text-align:center;">Section</th>
                    <th style="text-align:center;">Group</th>
                    <th style="text-align:center;">Remarks</th> 
                    <th style="text-align:center;">Concerned Group</th>
                    <th style="text-align:center;">Updated By</th> 

                </thead>
                <tbody id="audited_closed_admin" style="text-align:center;"></tbody>
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
<?php include 'plugins/script/list_of_audited_closed_script.php'; ?>