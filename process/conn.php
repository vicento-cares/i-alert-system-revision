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
$server_month = date('Y-m-01');
$server_date_month_time = date('Y-m-01 H:i:s');
$server_time = date('H:i:s');

$prefix = "AC:";
$dateCode = date('ymd');
$randomCode = mt_rand(10000, 50000);
$ac = $prefix . "" . $dateCode . "" . $randomCode;

$prefixs = "LAC:";
$dateCodes = date('ymd');
$randomCodes = mt_rand(10000, 50000);
$lc = $prefixs . "" . $dateCodes . "" . $randomCodes;

try {
    $conn = new PDO("mysql:host=$servername;dbname=ialert", $username, $pass);

    //  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";

} catch (PDOException $e) {
    echo 'NO CONNECTION' . $e->getMessage();
}
?>