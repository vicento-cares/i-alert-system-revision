<?php
// Revisions (Vince)
//Maintenance Mode
$maintenance_mode = 0;

if ($maintenance_mode == 0) {
	header('location: /i-alert/');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>I-Alert | Under Maintenance</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="dist/css/font.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <link rel="icon" href="dist/img/ialert.png" type="image/x-icon" />
</head>
<body class="hold-transition sidebar-mini iframe-mode layout-fixed">
<noscript>
  <br>
  <span>We are facing <strong>Script</strong> issues. Kindly enable <strong>JavaScript</strong>!!!</span>
  <br>
  <span>Call IT Personnel Immediately!!! They will fix it right away.</span>
</noscript>
<div class="wrapper" style="height: 100%;">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm">
            <h1>UNDER MAINTENANCE</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning">Under Maintenance</h2>
        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> System is under maintenance, We will fix the problem or finish system update immediately</h3>
          <p>
            You can access this soon as the maintenance is finish.
          </p>
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>

<script>
  // DOMContentLoaded function
	document.addEventListener("DOMContentLoaded", () => {
    // Reload Maintenance Page to check if 'maintenance_mode' is still enabled
    setTimeout(() => {
      window.location.reload();
    }, 60000);
  });
</script>

</body>
</html>
