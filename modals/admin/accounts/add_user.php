<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="add_accounts_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-4">
              <label>Username:</label> <input type="text" name="username_accounts" id="username_accounts" class="form-control" autocomplete="off">
            </div>
             <div class="col-4">
              <label>Password:</label> <input type="password" name="password_accounts" id="password_accounts" class="form-control" autocomplete="off">
            </div>
           
            <div class="col-4">
              <label>Role:</label>
              <select id="role_accounts" class="form-control">
                <option value="">Select Role</option>
                <option value="viewer">Viewer</option>
                <option value="admin">Admin</option>
                <option value="hr">HR</option>
                <option value="fas">FAS</option>
                <option value="provider">Provider</option>
              </select>
            </div>
        </div>
        <div class="row">
          <div class="col-4">
             <label>Type:</label>
             <select id="esection_accounts" class="form-control">
                <option value="">Select Type</option>
                <option value="viewer">Viewer</option>
                <option value="admin">Admin</option>
                <option value="hr">HR</option>
                <option value="fas">FAS</option>
                <option value="pkimt">PKIMT</option>
                <option value="addeven">ADD EVEN</option>
                <option value="goldenhand">GOLDENHAND</option>
                <option value="ipromote">IPROMOTE</option>
                <option value="megatrend">MEGATREND</option>
                <option value="maxim">MAXIM</option>
                <option value="onesource">ONE SOURCE</option>
                <option value="natcorp">NATCORP</option>
              </select>
          </div>
           <div class="col-4">
             <label>Carmaker:</label>
              <input type="text" name="carmaker_accounts" id="carmaker_accounts" class="form-control">
          </div>
          <div class="col-4">
              <label>Group:</label>
              <select class="form-control" name="falp_group_accounts" id="falp_group_accounts" onchange="fetch_section_dropdown(1)">
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
        </div>
        <div class="row">
          <div class="col-4">
                <label>Section:</label>
              <!-- <input type="text" name="section_accounts" id="section_accounts" class="form-control"> -->
               <select class="form-control" name="section_accounts" id="section_accounts">
                      <option value="">Select Section</option>
                      <!--  <option value="section1">Section1</option>
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
                            foreach($stmt->fetchALL() as $x){

                                echo '<option value="'.$x['section'].'">'.$x['name'].'</option>';
                            }
                     ?>
                   </select>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="#" class="btn btn-primary" onclick="register_user()">Register User</a>
      </div>
    </div>
  </div>
</div>