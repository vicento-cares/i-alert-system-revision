  
<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/dashboardbar.php';?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Graph</h1>
            <br>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Graph</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">
                </h3> 
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="row">
                    <div class="col-3 ">
                      <a href="#" class="btn btn-success" onclick="export_total()">Export</a>
                    </div>
                  </div> 
                  <br>
                  <div class="row">
                    <div class="col-12">
                       <div class="card-body table-responsive p-0" style="height: 450px; display: none;">
                <table class="table table-head-fixed text-nowrap table-hover" id="graph">
                <thead style="text-align:center;">
                    <th>#</th>
                    <th>Section Name</th>
                    <th>Date Audited</th>
                    <th>Total</th>

            </thead>
            <tbody id="list_of_totals" style="text-align:center;"></tbody>
            </table>
             <div class="row">
                  <div class="col-6">
                    
                  </div>
                  <div class="col-6">
                    <div class="spinner" id="spinner" style="display:none;">
                        <div class="loader float-sm-center"></div>    
                    </div>
             
                  </div>
              </div>

              </div>

              <div class="row">
                      <div class="col-11">
                        <canvas id="total_chart" width="1200" height="600"></canvas>
                      </div>
             </div>



                    </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                
                </div>
              </form>
            </div>
            <!-- /.card -->

</div>
</div>
</div>
</section>
</div>

<?php include 'plugins/footer.php';?>
<?php include 'plugins/script/dashboard_script.php'; ?>
