<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'register_users') {
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	$esection = $_POST['esection'];
	$carmaker = $_POST['carmaker'];
	$section = $_POST['section'];
	$check = "SELECT id FROM ialert_account WHERE username = '$username'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'Already Exist';
	}else{
		$query = "INSERT INTO ialert_account (`username`,`password`,`role`,`esection`,`car_maker`,`sections`) VALUES ('$username', '$password','$role','$esection','$carmaker','$section')";
		$stmt2 = $conn->prepare($query);
		if ($stmt2->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
}

if ($method == 'fetch_user') {
	$username = $_POST['username'];
	$c = 0;
	$query = "SELECT * FROM ialert_account WHERE username LIKE '$username%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			

			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_accounts_user" onclick="get_user_details(&quot;'.$j['id'].'~!~'.$j['username'].'~!~'.$j['password'].'~!~'.$j['role'].'~!~'.$j['esection'].'~!~'.$j['car_maker'].'~!~'.$j['sections'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['username'].'</td>';
				echo '<td>'.$j['role'].'</td>';
				echo '<td>'.$j['esection'].'</td>';
				echo '<td>'.$j['car_maker'].'</td>';
				echo '<td>'.$j['sections'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="4" style="color:red;">No Result<td>';
			echo '</tr>';
	}
}

if ($method == 'delete_user') {
	$id = $_POST['id'];

	$query = "DELETE FROM ialert_account WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

if ($method == 'update_user') {
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];
	$esection = $_POST['esection'];
	$carmaker = $_POST['carmaker'];
	$section = $_POST['section'];
	$check = "SELECT id FROM ialert_account WHERE username = '$username' AND password = '$password' AND role = '$role' AND esection = '$esection' AND car_maker = '$carmaker' AND section = '$section'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'Already Exist';
	}else{
		$query = "UPDATE ialert_account SET username = '$username', password = '$password', role = '$role', esection = '$esection', car_maker = '$carmaker', sections = '$section' WHERE id = '$id'";
		$stmt2 = $conn->prepare($query);
		if ($stmt2->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
}
$conn = NULL;
?>