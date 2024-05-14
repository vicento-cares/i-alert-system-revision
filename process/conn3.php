<?php
    $servername = '172.25.116.188';
    $username = 'server_113.4';
    // $username = 'server_112.172';
    // $pass = 'trspassword2022';
    $pass = 'SystemGroup@2022';
    // $pass = '';
    date_default_timezone_set('Asia/Manila');
    $server_date_time = date('Y-m-d H:i:s');
    $server_date_only = date('Y-m-d');
    try {
        $conn3 = new PDO ("mysql:host=$servername;dbname=emp_mgt_db",$username,$pass);

        //  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
  
    }catch(PDOException $e){
        echo 'NO CONNECTION'.$e->getMessage();
    }
?>