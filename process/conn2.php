<?php
    $servername = '172.25.112.131';
    $username = 'vince';
    // $username = 'server_112.172';
    // $pass = 'trspassword2022';
    $pass = 'SystemGroup@2024';
    // $pass = '';
    date_default_timezone_set('Asia/Manila');
    $server_date_time = date('Y-m-d H:i:s');
    $server_date_only = date('Y-m-d');
    try {
        $conn2 = new PDO ("mysql:host=$servername;dbname=live_hris",$username,$pass);

        //  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "Connected successfully";
  
    }catch(PDOException $e){
        echo 'NO CONNECTION'.$e->getMessage();
    }
?>