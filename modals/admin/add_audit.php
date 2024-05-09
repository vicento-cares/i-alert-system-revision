

<div class="modal fade bd-example-modal-xl" id="audit" tabindex="-1"  role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">
            <div id="auditCode">
               
            </div>

        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"  onclick="javascript:window.location.reload()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
           <div class="row">
                <div class="col-3">
                     <span> Employee No:   </span> <input type="text" id="employee_num" class="form-control-lg" onchange="detect_part_info()" autocomplete="OFF">
                </div>
                <div class="col-3">
                     <span> Full Name:   </span> <input type="text" id="full_name" class="form-control-lg" autocomplete="OFF" class="noSpace">
                </div>
                <div class="col-3">
                     <span> Position:   </span> <input type="text" id="position" class="form-control-lg"  autocomplete="OFF" class="noSpace">
                </div>
                 <div class="col-3">
                      <span> Provider:   </span> 
                       <select class="form-control" id="provider">
                          <option>Select Provider</option>
                           <?php
                            require '../../process/conn.php';
                            $get_curiculum = "SELECT DISTINCT esection FROM ialert_account WHERE role = 'provider' OR role ='fas'";
                            $stmt = $conn->prepare($get_curiculum);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['esection'].'">'.$x['esection'].'</option>';
                            }
                     ?>
                        </select>
                </div>
           </div>
           <div class="row">
                <div class="col-3">
                    <span>Shift:</span>
                    <select class="form-control" id="shift">
                        <option value="">Select Shift</option>
                        <option value="ds">DS</option>
                        <option value="ns">NS</option>
                    </select>
                </div>
                <div class="col-3">
                     <span>Shift Group:</span>
                    <select class="form-control" id="group">
                        <option value="">Select Shift Group</option>
                        <option value="a">A</option>
                        <option value="b">B</option>
                    </select>
                </div>
                <div class="col-3">
                   <span>Audit Type:</span>
                   <select class="form-control" id="audit_type">
                        <option value="">Select Audit Type</option>
                        <option value="initial">Initial</option>
                        <option value="final">Final</option>
                        <!-- <option value="warehouse">Warehouse</option> -->
                    </select>
                </div>
                <div class="col-3">
                   <span>Audit Category:</span>
                   <select class="form-control" id="audit_categ">
                        <option value="">Select Audit Category</option>
                        <option value="minor">Minor</option>
                        <option value="major">Major</option>
                    </select>
                </div>
           </div>
           <div class="row">
                <div class="col-3">
                     <span> Car Maker:   </span> <input type="text" list="list" id="carmaker" class="form-control-lg" autocomplete="OFF" class="noSpace">
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
                     <span> Car Model:   </span> <input type="text" id="carmodel" class="form-control-lg"  autocomplete="OFF" class="noSpace">
                </div>
                <div class="col-3">
                     <span> Line No:   </span> 

                       <input list="lines" id="emline" name="emline" class="form-control-lg">

<datalist id="lines" name="">
       <option value="">Select Line</option>
                      <?php
                            require '../../process/conn.php';
                            $line = "SELECT DISTINCT line_no FROM ialert_lines ORDER BY line_no ASC";

                         $stmt = $conn->prepare($line);
                         $stmt->execute();
            foreach($stmt->fetchALL() as $j){
      
                    echo '<option value="'.$j['line_no'].'">';
                                            
        }

        ?>

</datalist>
                </div>
                <div class="col-3">
                     <span> Process:   </span> <input type="text" id="process" class="form-control-lg" autocomplete="OFF" class="noSpace">
                </div>
           </div>
           <div class="row">
               <div class="col-3">
                   <span>Audit Findings:</span>
                   
                    <input list="audit_findingss" id="audit_findings" name="audit_findings" class="form-control">

<datalist id="audit_findingss" name="">
       <option value="">Select Line</option>
                      <?php
                            require '../../process/conn.php';
                            $audit_findingss = "SELECT DISTINCT audit_findings FROM ialert_audit_findings_categ";

                         $stmt = $conn->prepare($audit_findingss);
                         $stmt->execute();
            foreach($stmt->fetchALL() as $j){
      
                    echo '<option value="'.$j['audit_findings'].'">';
                                            
        }

        ?>

</datalist>

               </div>
               <div class="col-3">
                   <span>Audited By:</span>
                   <input type="text" name="" id="audited_by" class="form-control-lg" autocomplete="OFF">
               </div>
               
               <div class="col-3">
                 <span>Date Audited:</span>
                    <input type="date" name="" id="date_audited" class="form-control">
                    
               </div>
               <div class="col-3">
                   <span>Remarks</span>
                   <!-- <input type="text" name="" id="remarks" class="form-control-lg" autocomplete="OFF"> -->
                   <input list="remark" id="remarks" class="form-control-lg" autocomplete="OFF">

        <datalist id="remark">
          <option value="N/A">
          <option value="Support">
        </datalist>

               </div>
           </div>
            <div class="row">
                <div class="col-3">
                   <span>Group:</span>
                   <select class="form-control" name="falp_group" id="falp_group">
                      <option value="">Select Group</option>
                            <?php
                            require '../../process/conn.php';
                            $get_curiculum = "SELECT DISTINCT falp_group FROM ialert_section";
                            $stmt = $conn->prepare($get_curiculum);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['falp_group'].'">'.$x['falp_group'].'</option>';
                            }
                     ?>
                   </select>
                </div>
                 <div class="col-3">
                 <span>Section:</span>
                   <select class="form-control" name="section" id="section">
                      <option value="">Select Section</option>
                            <?php
                            require '../../process/conn.php';
                            $get_curiculum = "SELECT DISTINCT section,name FROM ialert_section";
                            $stmt = $conn->prepare($get_curiculum);
                            $stmt->execute();
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['section'].'">'.$x['name'].'</option>';
                            }
                     ?>
                   </select>
                </div>
                 <div class="col-4">
                   

                    


                </div>
            </div>
           <br>
           <div class="row">
                        <div class="col-12">
                          <p style="text-align:right;">
                        <button type="button" class="btn btn-primary"  onclick="save_request()" id="planBtnCreate">Submit</button>

                         <!--  <button class="btn blue darken-3  col s12" onclick="save_request()" id="planBtnCreate">submit</button> -->
                          </p>
                        </div>
           </div>
      </div>
      <div class="modal-footer">

         <div class="card-body table-responsive p-0" style="height: 200px;">
       <table  class="table table-head-fixed text-nowrap table-hover" style="">
    <thead  style="text-align:center;">
                    <th>#</th>
                    <th>Date Audited</th>
                    <th>Full Name</th>
                    <th>Employee ID</th>
                    <th>Provider</th>
                    <th>Position</th>
                    <th>Shift</th>
                    <th>Group</th>
                    <th>Car Maker</th>
                    <th>Car Model</th>
                    <th>Line No.</th>
                    <th>Process</th>
                    <th>Audit Findings</th>
                    <th>Audited By</th>
                    <th>Audit Category</th>
                    <th>Remarks</th>          
                    <th>Section</th> 
    </thead>
    <tbody id="data_preview_audit"></tbody>
</table>
</div>
      </div>
    </div>
  </div>
</div>

