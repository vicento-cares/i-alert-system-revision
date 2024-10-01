<?php
// Old MySql Connection
// $servername = '172.25.116.188'; $username = 'server_113.4'; $password = 'SystemGroup@2022';

// MS SQL Server Connection
$servername = '172.25.116.188'; $username = 'SA'; $password = 'SystemGroup@2022';

try {
    // $conn3 = new PDO ("mysql:host=$servername;dbname=emp_mgt_db",$username,$password);
    $conn3 = new PDO ("sqlsrv:Server=$servername;Database=emp_mgt_db",$username,$password);
    $conn3->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'NO CONNECTION'.$e->getMessage();
}