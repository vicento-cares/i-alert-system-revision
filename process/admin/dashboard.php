<?php 
include '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_graph') {
	$c = 0;
	$query = "SELECT section,date_audited,COUNT(*) AS TOTAL FROM ialert_audit GROUP BY section";
	$stmt = $conn->prepare($query);
	$stmt->execute();
	if ($stmt->rowCount() > 0) {
		foreach($stmt->fetchALL() as $j){
			$c++;
			

			echo '<tr>';
				echo '<td>'.$c.'</td>';
				echo '<td class="section">'.$j['section'].'</td>';
				echo '<td>'.$j['date_audited'].'</td>';
				echo '<td class="total">'.$j['TOTAL'].'</td>';
			echo '</tr>';
		}
	}else{
			echo '<tr>';
				echo '<td colspan="4" style="color:red;">No Result<td>';
			echo '</tr>';
	}
}

$conn = NULL;
?>