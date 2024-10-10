 
<?php include 'plugins/navbar.php';?>
<?php include 'plugins/sidebar/admin_bar.php';?>
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
  $query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('Section 1','Section 2','Section 3','Section 4','Section 5','Section 6','Section 7','Section 8','Section 9') ORDER BY section ASC";
  $stmt = $conn->prepare($query);
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    foreach($stmt->fetchALL() as $j){
      $section = $j['section'];
      $stmt = NULL;
      $query = "SELECT COUNT(total) AS total FROM (SELECT id as total FROM ialert_audit WHERE pd = 'Written IR' AND line_no != 'initial' AND section = '$section'AND provider = 'fas' AND edit_count = 0 AND date_recieved IS NULL
        UNION ALL
        SELECT id as total FROM ialert_audit WHERE edit_count != 0 AND line_no != 'initial' AND section = '$section'  AND provider = 'fas' AND date_recieved IS NULL) AS J";
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
 $query = "SELECT count(*) as grand_total from ialert_audit where line_no != 'initial' AND section = '$section' AND provider = 'fas'";
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
$query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('Repair Process', 'Tsumesen Insertion') ORDER BY section ASC";
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
        $query = "SELECT count(*) as grand_total from ialert_audit where section = '$section' AND provider = 'fas'";
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

$query = "SELECT DISTINCT section FROM ialert_section WHERE section = 'First Process' ORDER BY section ASC";
// $query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('section1','section2','section3','section4','section5','section6','section7','section8','section9') ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach ($stmt->fetchALL() as $j) {
    $section = $j['section'];
    $stmt = NULL;
    $query = "SELECT COUNT(total) AS total FROM (SELECT id as total FROM ialert_audit WHERE pd = 'Written IR' AND line_no = 'initial' AND section = '$section'AND provider = 'fas' AND edit_count = 0 AND date_recieved IS NULL
        UNION ALL
        SELECT id as total FROM ialert_audit WHERE edit_count != 0 AND line_no = 'initial' AND section = '$section'  AND provider = 'fas' AND date_recieved IS NULL) AS J";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach ($stmt->fetchALL() as $j) {
        $fp_total += intval($j['total']);
        $stmt = NULL;
        $query = "SELECT count(*) as grand_total from ialert_audit where line_no = 'initial' AND section = '$section' AND provider = 'fas'";
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

$query = "SELECT DISTINCT section FROM ialert_section WHERE section = 'Secondary 1 Process' ORDER BY section ASC";
// $query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('section1','section2','section3','section4','section5','section6','section7','section8','section9') ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach ($stmt->fetchALL() as $j) {
    $section = $j['section'];
    $stmt = NULL;
    $query = "SELECT COUNT(total) AS total FROM (SELECT id as total FROM ialert_audit WHERE pd = 'Written IR' AND line_no = 'initial' AND section = '$section'AND provider = 'fas' AND edit_count = 0 AND date_recieved IS NULL
        UNION ALL
        SELECT id as total FROM ialert_audit WHERE edit_count != 0 AND line_no = 'initial' AND section = '$section'  AND provider = 'fas' AND date_recieved IS NULL) AS J";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach ($stmt->fetchALL() as $j) {
        $sp1_total += intval($j['total']);
        $stmt = NULL;
        $query = "SELECT count(*) as grand_total from ialert_audit where line_no = 'initial' AND section = '$section' AND provider = 'fas'";
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

$query = "SELECT DISTINCT section FROM ialert_section WHERE section = 'Secondary 2 Process' ORDER BY section ASC";
// $query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('section1','section2','section3','section4','section5','section6','section7','section8','section9') ORDER BY section ASC";
$stmt = $conn->prepare($query);
$stmt->execute();
if ($stmt->rowCount() > 0) {
  foreach ($stmt->fetchALL() as $j) {
    $section = $j['section'];
    $stmt = NULL;
    $query = "SELECT COUNT(total) AS total FROM (SELECT id as total FROM ialert_audit WHERE pd = 'Written IR' AND line_no = 'initial' AND section = '$section'AND provider = 'fas' AND edit_count = 0 AND date_recieved IS NULL
        UNION ALL
        SELECT id as total FROM ialert_audit WHERE edit_count != 0 AND line_no = 'initial' AND section = '$section'  AND provider = 'fas' AND date_recieved IS NULL) AS J";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
      foreach ($stmt->fetchALL() as $j) {
        $sp2_total += intval($j['total']);
        $stmt = NULL;
        $query = "SELECT count(*) as grand_total from ialert_audit where line_no = 'initial' AND section = '$section' AND provider = 'fas'";
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
$query = "SELECT DISTINCT section FROM ialert_section WHERE section IN ('QC','QAE','CQA') ORDER BY section ASC";
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
        $query = "SELECT count(*) as grand_total from ialert_audit where section = '$section' AND provider = 'fas'";
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
          falp_group = 'Other Group' 
          ORDER BY section ASC";
// $query = "SELECT DISTINCT section FROM ialert_section WHERE 
//           section IN ('battery', 'pe-ame', 'eq-final', 'warehouse', 'it', 'dock-audit', 'tube-cutting', 'hr-ga', 'QC-QC', 'PE', 'fabrication', 'safety', 'qm', 'me', 'mpd', 'pdcd', 'fgi') 
//           ORDER BY section ASC";
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
        $query = "SELECT count(*) as grand_total from ialert_audit where section = '$section' AND provider = 'fas'";
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
                        <span class="info-box-text"><b>'.strtoupper($provider).'</b></span>
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