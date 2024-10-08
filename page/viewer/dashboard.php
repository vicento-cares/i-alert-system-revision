 
<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/viewer_bar.php';?>
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
  $query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('section1','section2','section3','section4','section5','section6','section7','section8','section9') ORDER BY section ASC";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    foreach($stmt->fetchALL() as $j){
      $section = $j['section'];
      $stmt = NULL;
      $query = "SELECT COUNT(total) AS total FROM (SELECT id as total FROM ialert_audit WHERE pd = 'Written IR' AND line_no != 'initial' AND section = '$section'AND provider = 'FAS' AND edit_count = 0 AND date_recieved IS NULL
        UNION ALL
        SELECT id as total FROM ialert_audit WHERE edit_count != 0 AND line_no != 'initial' AND section = '$section'  AND provider = 'FAS' AND date_recieved IS NULL) AS J";
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
 $query = "SELECT count(*) as grand_total from ialert_audit where line_no != 'initial' AND section = '$section' AND provider = 'FAS'";
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
// Revisions (Vince)
$gc_total = 0;
$gc_grand_total = 0;

$stmt = NULL;
$query = "SELECT DISTINCT section FROM ialert_section WHERE section = 'GC' ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach ($stmt->fetchALL() as $j) {
    $section = $j['section'];
    $stmt = NULL;

    $query = "SELECT COUNT(*) as total FROM ialert_audit WHERE edit_count !=0  AND section = '$section' AND provider = 'fas' AND date_recieved IS NULL";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach ($stmt->fetchALL() as $j) {
        $gc_total += intval($j['total']);
        $stmt = NULL;
        $query = "SELECT count(*) as grand_total from ialert_audit where section = '$section' AND provider = 'FAS'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        foreach ($stmt->fetchALL() as $j) {
          $gc_grand_total += intval($j['grand_total']);
        }
      }
    }
  }
  echo '<div class="col-lg-3">    
              <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b>GC</b></span>
                        <span class="info-box-number"><label style="color:red;">Pending: <label id="count_sec1">' . $gc_total . '</label></label></label>
                        /  <label>Total: <label id="grand_total"></label>' . $gc_grand_total . '</label> </span>
                    </div>
              </div>
        </div>';
}
?>

<?php
// Revisions (Vince)
$fp_total = 0;
$fp_grand_total = 0;

$query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('fpsection1','fpsection2','fpsection3','fpsection4','fpsection5','fpsection6','fpsection7','fpsection8','fpsection9') ORDER BY section ASC";
// $query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('section1','section2','section3','section4','section5','section6','section7','section8','section9') ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach ($stmt->fetchALL() as $j) {
    $section = $j['section'];
    $stmt = NULL;
    $query = "SELECT COUNT(total) AS total FROM (SELECT id as total FROM ialert_audit WHERE pd = 'Written IR' AND line_no = 'initial' AND section = '$section'AND provider = 'FAS' AND edit_count = 0 AND date_recieved IS NULL
        UNION ALL
        SELECT id as total FROM ialert_audit WHERE edit_count != 0 AND line_no = 'initial' AND section = '$section'  AND provider = 'FAS' AND date_recieved IS NULL) AS J";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach ($stmt->fetchALL() as $j) {
        $fp_total += intval($j['total']);
        $stmt = NULL;
        $query = "SELECT count(*) as grand_total from ialert_audit where line_no = 'initial' AND section = '$section' AND provider = 'FAS'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        foreach ($stmt->fetchALL() as $j) {
          $fp_grand_total += intval($j['grand_total']);
        }
      }
    }
  }
  echo '<div class="col-lg-3">    
            <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text"><b>First Process</b></span>
                      <span class="info-box-number"><label style="color:red;">Pending: <label id="count_sec1">' . $fp_total . '</label></label></label>
                      /  <label>Total: <label id="grand_total"></label>' . $fp_grand_total . '</label> </span>
                  </div>
            </div>
      </div>';
}
?>

<?php
// Revisions (Vince)
$sp1_total = 0;
$sp1_grand_total = 0;

$query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('sp1section1','sp1section2','sp1section3','sp1section4','sp1section5','sp1section6','sp1section7','sp1section8','sp1section9') ORDER BY section ASC";
// $query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('section1','section2','section3','section4','section5','section6','section7','section8','section9') ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach ($stmt->fetchALL() as $j) {
    $section = $j['section'];
    $stmt = NULL;
    $query = "SELECT COUNT(total) AS total FROM (SELECT id as total FROM ialert_audit WHERE pd = 'Written IR' AND line_no = 'initial' AND section = '$section'AND provider = 'FAS' AND edit_count = 0 AND date_recieved IS NULL
        UNION ALL
        SELECT id as total FROM ialert_audit WHERE edit_count != 0 AND line_no = 'initial' AND section = '$section'  AND provider = 'FAS' AND date_recieved IS NULL) AS J";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach ($stmt->fetchALL() as $j) {
        $sp1_total += intval($j['total']);
        $stmt = NULL;
        $query = "SELECT count(*) as grand_total from ialert_audit where line_no = 'initial' AND section = '$section' AND provider = 'FAS'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        foreach ($stmt->fetchALL() as $j) {
          $sp1_grand_total += intval($j['grand_total']);
        }
      }
    }
  }
  echo '<div class="col-lg-3">    
            <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text"><b>Secondary 1 Process</b></span>
                      <span class="info-box-number"><label style="color:red;">Pending: <label id="count_sec1">' . $sp1_total . '</label></label></label>
                      /  <label>Total: <label id="grand_total"></label>' . $sp1_grand_total . '</label> </span>
                  </div>
            </div>
      </div>';
}
?>

<?php
// Revisions (Vince)
$sp2_total = 0;
$sp2_grand_total = 0;

$query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('sp2section1','sp2section2','sp2section3','sp2section4','sp2section5','sp2section6','sp2section7','sp2section8','sp2section9') ORDER BY section ASC";
// $query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('section1','section2','section3','section4','section5','section6','section7','section8','section9') ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach ($stmt->fetchALL() as $j) {
    $section = $j['section'];
    $stmt = NULL;
    $query = "SELECT COUNT(total) AS total FROM (SELECT id as total FROM ialert_audit WHERE pd = 'Written IR' AND line_no = 'initial' AND section = '$section'AND provider = 'FAS' AND edit_count = 0 AND date_recieved IS NULL
        UNION ALL
        SELECT id as total FROM ialert_audit WHERE edit_count != 0 AND line_no = 'initial' AND section = '$section'  AND provider = 'FAS' AND date_recieved IS NULL) AS J";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach ($stmt->fetchALL() as $j) {
        $sp2_total += intval($j['total']);
        $stmt = NULL;
        $query = "SELECT count(*) as grand_total from ialert_audit where line_no = 'initial' AND section = '$section' AND provider = 'FAS'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        foreach ($stmt->fetchALL() as $j) {
          $sp2_grand_total += intval($j['grand_total']);
        }
      }
    }
  }
  echo '<div class="col-lg-3">    
            <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                  <div class="info-box-content">
                      <span class="info-box-text"><b>Secondary 2 Process</b></span>
                      <span class="info-box-number"><label style="color:red;">Pending: <label id="count_sec1">' . $fp_total . '</label></label></label>
                      /  <label>Total: <label id="grand_total"></label>' . $fp_grand_total . '</label> </span>
                  </div>
            </div>
      </div>';
}
?>

<?php
// Revisions (Vince)
$qa_total = 0;
$qa_grand_total = 0;

$stmt = NULL;
$query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('qa-initial','qa-final') ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach ($stmt->fetchALL() as $j) {
    $section = $j['section'];
    $stmt = NULL;

    $query = "SELECT COUNT(*) as total FROM ialert_audit WHERE edit_count !=0  AND section = '$section' AND provider = 'fas' AND date_recieved IS NULL";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach ($stmt->fetchALL() as $j) {
        $qa_total += intval($j['total']);
        $stmt = NULL;
        $query = "SELECT count(*) as grand_total from ialert_audit where section = '$section' AND provider = 'FAS'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        foreach ($stmt->fetchALL() as $j) {
          $qa_grand_total += intval($j['grand_total']);
        }
      }
    }
  }
  echo '<div class="col-lg-3">    
              <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b>QA</b></span>
                        <span class="info-box-number"><label style="color:red;">Pending: <label id="count_sec1">' . $qa_total . '</label></label></label>
                        /  <label>Total: <label id="grand_total"></label>' . $qa_grand_total . '</label> </span>
                    </div>
              </div>
        </div>';
}
?>

<?php
// Revisions (Vince)
$other_group_total = 0;
$other_group_grand_total = 0;

$stmt = NULL;
$query = "SELECT DISTINCT section FROM ialert_section WHERE 
          section IN ('battery', 'pe-ame', 'eq-final', 'warehouse', 'it', 'dock-audit', 'tube-cutting', 'hr-ga', 'QC-QC', 'PE', 'fabrication', 'safety', 'qm', 'me', 'mpd', 'pdcd', 'fgi') 
          ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach ($stmt->fetchALL() as $j) {
    $section = $j['section'];
    $stmt = NULL;

    $query = "SELECT COUNT(*) as total FROM ialert_audit WHERE edit_count !=0  AND section = '$section' AND provider = 'fas' AND date_recieved IS NULL";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach ($stmt->fetchALL() as $j) {
        $other_group_total += intval($j['total']);
        $stmt = NULL;
        $query = "SELECT count(*) as grand_total from ialert_audit where section = '$section' AND provider = 'FAS'";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        foreach ($stmt->fetchALL() as $j) {
          $other_group_grand_total += intval($j['grand_total']);
        }
      }
    }
  }
  echo '<div class="col-lg-3">    
              <div class="info-box">
              <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text"><b>Other Group</b></span>
                        <span class="info-box-number"><label style="color:red;">Pending: <label id="count_sec1">' . $other_group_total . '</label></label></label>
                        /  <label>Total: <label id="grand_total"></label>' . $other_group_grand_total . '</label> </span>
                    </div>
              </div>
        </div>';
}
?>

<?php
$stmt = NULL;
$query ="SELECT DISTINCT provider FROM ialert_audit where provider NOT IN ('fas','ipromote','natcorp')";
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