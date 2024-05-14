<?php
 include 'conn.php';
 session_start();
 if (isset($_POST['login_btn'])) {
 	$username = $_POST['username'];
 	$password = $_POST['password'];
    // $role = $_POST['role'];
    // $esection = $_POST['section'];
 	if (empty($username)) {
 		echo 'Please Enter Username';
 	}else if(empty($password)){
 		echo 'Please Enter Password';
 	}
    // else if(empty($esection)){
    //     echo 'Please Select Section';
    // }
    else{

 		$check = "SELECT id,role FROM ialert_account WHERE BINARY username = ? AND BINARY password = ?";
 		$stmt = $conn->prepare($check);
		$params = array($username, $password);
 		$stmt->execute($params);
 		if ($stmt->rowCount() > 0) {
 			foreach($stmt->fetchALL() as $x){
 				$role = $x['role'];
 			}

			$_SESSION['username'] = $username;

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

 		}else{
 			echo 'Wrong Username or Password';
 		}
 	}
 }
 if (isset($_POST['Logout'])) {
 	session_unset();
 	session_destroy();
 	header('location: ../index.php');
 }

?>