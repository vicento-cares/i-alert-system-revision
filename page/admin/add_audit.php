<?php include 'plugins/navbar.php'; ?>
<?php include 'plugins/sidebar/admin_bar.php'; ?>
<!-- Main Sidebar Container -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Audit Findings
          </h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Add Audit Findings</li>
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
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        <a href="" style="color:white;" data-toggle="modal" data-target="#audit"
                          onclick="create_audit()">
                          <h5>Add Audit <br> Findings</h5>
                          <p></p>

                      </div>
                      <div class="icon">
                        <i class="ion ion-person-add"></i>
                      </div>
                      </a>
                      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#audit"
                        onclick="create_audit()">Proceed <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                      <div class="inner">
                        <a href="" style="color:white;" data-toggle="modal" data-target="#import_audit">
                          <h5>Import Data <br>Audit Findings</h5>
                          <p></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-upload"></i>
                      </div>
                      </a>
                      <a href="#" class="small-box-footer" data-toggle="modal" data-target="#import_audit">Proceed <i
                          class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                      <div class="inner">
                        <a href="../../template/list_of_audit_findings_template.csv" style="color:white;">
                          <h5>Download Template <br> Audit Findings</h5>
                          <p></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-download"></i>
                      </div>
                      </a>
                      <a href="../../template/list_of_audit_findings_template.csv" class="small-box-footer">Proceed <i
                          class="fas fa-arrow-circle-right"></i></a>

                    </div>
                  </div>

                </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">

              </div>
            </form>
          </div>
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">

                  <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary" style="cursor:pointer;">
                      <div class="inner">
                        <a style="color:white;" onclick="export_audit_findings_list()">
                          <h5>Download List <br> Audit Findings Masterlist</h5>
                          <p></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-download"></i>
                      </div>
                      </a>
                      <a class="small-box-footer" onclick="export_audit_findings_list()">Proceed <i
                          class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary" style="cursor:pointer;">
                      <div class="inner">
                        <a style="color:white;" onclick="export_process_list()">
                          <h5>Download List <br> Process Masterlist</h5>
                          <p></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-download"></i>
                      </div>
                      </a>
                      <a class="small-box-footer" onclick="export_process_list()">Proceed <i
                          class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                  <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary" style="cursor:pointer;">
                      <div class="inner">
                        <a style="color:white;" onclick="export_line_no_list()">
                          <h5>Download List <br> Line No. Masterlist</h5>
                          <p></p>
                      </div>
                      <div class="icon">
                        <i class="fas fa-download"></i>
                      </div>
                      </a>
                      <a class="small-box-footer" onclick="export_line_no_list()">Proceed <i
                          class="fas fa-arrow-circle-right"></i></a>
                    </div>
                  </div>

                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
</div>
</div>
</section>
</div>

<?php include 'plugins/footer.php'; ?>
<?php include 'plugins/script/add_audit_script.php'; ?>