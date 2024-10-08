<?php
session_name("i-alert");
session_start();

require 'conn.php';

// Revisions (Vince)
//Maintenance Mode
$maintenance_mode = 0;

if ($maintenance_mode == 1) {
    header('location: /i-alert/maintenance.php');
}

if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $role = '';
    $esection = '';
    $car_maker = '';
    $sections = '';
    $falp_group = '';

    if (empty($username)) {
        echo 'Please Enter Username';
    } else if (empty($password)) {
        echo 'Please Enter Password';
    } else {
        $check = "SELECT username, role, esection, car_maker, sections, falp_group 
                    FROM ialert_account 
                    WHERE BINARY username = ? AND BINARY password = ?";
        $stmt = $conn->prepare($check);
        $params = array($username, $password);
        $stmt->execute($params);
        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $role = $row['role'];
                $esection = $row['esection'];
                $car_maker = $row['car_maker'];
                $sections = $row['sections'];
                $falp_group = $row['falp_group'];
            }

            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $_SESSION['esection'] = $esection;
            $_SESSION['car_maker'] = $car_maker;
            $_SESSION['sections'] = $sections;
            $_SESSION['falp_group'] = $falp_group;

            if ($role == 'viewer') {
                header('location: page/viewer/dashboard.php');
            } else if ($role == 'admin') {
                header('location: page/admin/dashboard.php');
            } else if ($role == 'hr') {
                header('location: page/hr/dashboard.php');
            } else if ($role == 'fas') {
                header('location: page/fas/dashboard.php');
            } else if ($role == 'provider') {
                header('location: page/provider/dashboard.php');
            }

        } else {
            echo 'Wrong Username or Password';
        }
    }
}

if (isset($_POST['Logout'])) {
    session_unset();
    session_destroy();
    header('location: ../');
}
