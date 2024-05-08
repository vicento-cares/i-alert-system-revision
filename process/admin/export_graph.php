<?php
include '../conn.php';
ini_set("memory_limit", "-1");

 $c = 0;

$filename = "TOTAL_AUDIT-".$server_date_time.".xls";
header("Content-Type: application/vnd.ms-excel");
header('Content-Type: text/csv; charset=utf-8');  
header("Content-Disposition: ; filename=\"$filename\"");
echo'
<html lang="en">
<body>
<table border="1">
<thead>
				<th> # </th> 
                <th> Section Name</th>
                <th> Date Audited</th>
                <th> Total</th>   
</thead>
';
$query = "SELECT section,date_audited,COUNT(*) AS TOTAL FROM ialert_audit GROUP BY section, date_audited";
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

?>