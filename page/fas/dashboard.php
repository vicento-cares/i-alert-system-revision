 
<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/dashboardbar.php';?>
<section class="content">
      <div class="container-fluid">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>

          <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 
    <!-- Main content -->
       <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                </h3>
              </div>
              <div class="card-body">
                <div class="row">
<?php
  include '../../process/conn.php';
  $query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('section1','section2','section3','section4','section5','section6','section7','section8') ORDER BY section ASC";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    foreach($stmt->fetchALL() as $j){
      $section = $j['section'];
      $stmt = NULL;
      $query = "SELECT COUNT(total) AS total FROM (SELECT id as total FROM ialert_audit WHERE pd = 'IR' AND section = '$section'AND provider = 'FAS' AND edit_count = 0 AND date_recieved IS NULL
        UNION ALL
        SELECT id as total FROM ialert_audit WHERE edit_count != 0 AND section = '$section'  AND provider = 'FAS' AND date_recieved IS NULL) AS J";
      $stmt = $conn->prepare($query);
      $stmt->execute();
      if ($stmt->rowCount() > 0) {
        foreach($stmt->fetchALL() as $j){
          echo '
          <div class="col-lg-3">    
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
                        <span class="info-box-text"><b>'.$section.'</b></span>
                        <span class="info-box-number"><label style="color:red;">Pending: <label id="count_sec1">'.$j['total'].'</label></label></label>';
?>
 <?php
 $stmt = NULL;
 $query = "SELECT count(*) as grand_total from ialert_audit where section = '$section' AND provider = 'FAS'";
 $stmt = $conn->prepare($query);
 $stmt->execute();
 foreach($stmt->fetchALL() as $j){



                         echo' /  <label>Total: <label id="grand_total"></label>'.$j['grand_total'].'</label> </span>
                    </div>
              </div>
        </div>
          ';
          }
        }
      }
    }
  }
?>                   

<?php 
$stmt = NULL;
$query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('qa-initial','qa-final','battery','repair') ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach($stmt->fetchALL() as $j){
    $section = $j['section'];
    $stmt = NULL;

    $query = "SELECT COUNT(*) as total FROM ialert_audit WHERE edit_count !=0  AND section = '$section' AND provider = 'fas' AND date_recieved IS NULL";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach($stmt->fetchALL() as $j){
        echo '
          <div class="col-lg-3">    
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
                        <span class="info-box-text"><b>'.$section.'</b></span>
                        <span class="info-box-number"><label style="color:red;">Pending: <label id="count_sec1">'.$j['total'].'</label></label></label>';
?>

 <?php
 $stmt = NULL;
 $query = "SELECT count(*) as grand_total from ialert_audit where section = '$section' AND provider = 'FAS'";
 $stmt = $conn->prepare($query);
 $stmt->execute();
 foreach($stmt->fetchALL() as $j){
                         echo' /  <label>Total: <label id="grand_total"></label>'.$j['grand_total'].'</label> </span>
                    </div>
              </div>
        </div>
          ';
          }
        }
      }
    }
  }
?>  

<?php
$stmt = NULL;
$query ="SELECT DISTINCT provider FROM ialert_audit where provider != 'fas'";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach($stmt->fetchALL() as $j){
    $provider = $j['provider'];
    $stmt = NULL;
    $query = "SELECT COUNT(*) as total FROM ialert_audit WHERE edit_count !=0 AND provider = '$provider' AND date_recieved IS NULL";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach($stmt->fetchALL() as $j){
      echo '
          <div class="col-lg-3">    
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
          <div class="info-box-content">
                        <span class="info-box-text"><b>'.$provider.'</b></span>
                        <span class="info-box-number"><label style="color:red;">Pending: <label id="count_sec1">'.$j['total'].'</label></label></label>';
?>   
<?php
 $stmt = NULL;
 $query = "SELECT count(*) as grand_total from ialert_audit where provider = '$provider'";
 $stmt = $conn->prepare($query);
 $stmt->execute();
 foreach($stmt->fetchALL() as $j){
                         echo' /  <label>Total: <label id="grand_total"></label>'.$j['grand_total'].'</label> </span>
                    </div>
              </div>
        </div>
          ';
          }
        }
      }
    }
  }
?>    
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