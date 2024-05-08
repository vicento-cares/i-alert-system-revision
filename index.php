<?php require 'process/login.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>I ALERT</title>

   <link rel="icon" href="dist/img/ialert.png" type="image/x-icon" />

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="dist/css/font.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <h1><b>iALERT</b></h1>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">

      <p class="login-box-msg">Sign in to start your session</p>

      <form action="" method="POST" id="login_form">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="username"  name="username" placeholder="Username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"  id="password" name="password" placeholder="Password" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <!-- 
          <div class="input-group mb-3">
     
                    <select class="form-control" id="esection"  name="section" >
                    <option value="">Select Section </option>
                    <option value="viewer">Viewer</option>
                    <option value="admin">Admin</option>
                    <option value="rts">RTS</option>
                    <option value="hr">HR</option>
                    <option value="provider">Provider</option>
                    <option value="fas">FAS</option>
                        </select>

                      
                        
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-tasks"></span>
            </div>
          </div> -->
        <!-- </div> -->
          <!-- /.col -->
          <div class="input-group mb-3">
            <button type="submit" class="btn btn-primary btn-block" name="login_btn" value="login">Sign In</button>

          </div>
          <div class="input-group mb-3">

           <button class="btn btn-danger btn-block"><a href="wi/wi.pdf" target="_blank" style="color:white;">How to Use System (Work Instruction)</a></button>


          </div>
   
          <!-- /.col -->
        </div>
        
      </form>

   

<!-- jQuery -->
<script src="plugins/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
