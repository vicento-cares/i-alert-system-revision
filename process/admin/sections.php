<?php 
	include '../conn.php';
	include '../conn2.php';
	$method = $_POST['method'];

if ($method == 'fetch_section') {
	$section = $_POST['section'];
	$c = 0;

	$query = "SELECT * FROM ialert_section WHERE name LIKE '$section%'";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			

			echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_section" onclick="get_sections_details(&quot;'.$j['id'].'~!~'.$j['section'].'~!~'.$j['name'].'&quot;)">';
				echo '<td>'.$c.'</td>';
				echo '<td>'.$j['section'].'</td>';
				echo '<td>'.$j['name'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="3" style="color:red;">No Result<td>';
			echo '</tr>';
	}
}


if ($method == 'register_section') {
	$section = $_POST['section'];
	$name = $_POST['name'];
	
	$check = "SELECT id FROM ialert_section WHERE section = '$section' AND name = '$name'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'Already Exist';
	}else{
		$query = "INSERT INTO ialert_section (`section`,`name`) VALUES ('$section', '$name')";
		$stmt2 = $conn->prepare($query);
		if ($stmt2->execute()) {
			echo 'success';
		}else{
			echo 'error';
		}
	}
	
}

if ($method == 'delete_section') {
	$id = $_POST['id'];

	$query = "DELETE FROM ialert_section WHERE id = '$id'";
	$stmt = $conn->prepare($query);
	if ($stmt->execute()) {
		echo 'success';
	}else{
		echo 'error';
	}
}

if ($method == 'update_sections') {
	$id = $_POST['id'];
	$section = $_POST['section'];
	$name = $_POST['name'];

	$check = "SELECT id FROM ialert_section WHERE section = '$section' OR name = '$name'";
	$stmt = $conn->prepare($check);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		echo 'Already Exist';
	}else{
		$query = "UPDATE ialert_section SET section = '$section', name = '$name' WHERE id = '$id'";
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