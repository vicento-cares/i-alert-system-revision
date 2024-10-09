<?php
require '../conn.php';
// require '../conn2.php';
require '../conn3.php';
$method = $_POST['method'];

if ($method == 'AuditCode') {
    $prefix = "AC:";
    $dateCode = date('ymd');
    $randomCode = mt_rand(10000, 50000);
    echo $prefix . "" . $dateCode . "" . $randomCode;
}

if ($method == 'fetch_details_req') {
    $employee_num = addslashes(trim($_POST['employee_num']));

    // Revisions (Vince)
    // CHECK (Employee Management System)
    $sql = "SELECT emp_no, full_name, position, provider, dept, section, line_no, shift_group FROM m_employees WHERE emp_no = '$employee_num'";
    $stmt = $conn3->prepare($sql);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $line_no = "";
        $is_initial = strpos($row['line_no'], "Initial");
        if ($is_initial === false) {
            $line_no = $row['line_no'];
        } else {
            $line_no = "Initial";
        }
        echo $row['full_name'] . '~!~' . $row['position'] . '~!~' . strtolower($row['provider']) . '~!~' . $line_no  . '~!~' . $row['section'] . '~!~' . $row['dept'] . '~!~' . strtolower($row['shift_group']);
    } else {
        // CHECK (HR ARIS)
        // $sql = "SELECT idNumber, empName, empPosition, empAgency, lineNo FROM a_m_employee WHERE idNumber = '$employee_num'";
        // $stmt = $conn2->prepare($sql);
        // $stmt->execute();
        // if($stmt->rowCount() > 0){
        // 	foreach($stmt->fetchALL() as $x){
        // 		echo $x['empName'].'~!~'.$x['empPosition'].'~!~'.$x['empAgency'].'~!~'.$x['lineNo'];
        // 	}
        // }else{
        // 	echo '';
        // }
        echo '';
    }
}

if ($method == 'insert_audit') {

    $employee_num = addslashes(trim($_POST['employee_num']));
    $full_name = addslashes($_POST['full_name']);
    $position = addslashes($_POST['position']);
    $provider = addslashes($_POST['provider']);
    $shift = addslashes($_POST['shift']);
    $group = addslashes($_POST['group']);
    $date_audited = addslashes($_POST['date_audited']);
    $carmaker = addslashes($_POST['carmaker']);
    $carmodel = addslashes($_POST['carmodel']);
    $emline = addslashes($_POST['emline']);
    $emprocess = addslashes($_POST['emprocess']);
    $audit_findings = addslashes($_POST['audit_findings']);
    $audited_by = addslashes($_POST['audited_by']);
    $audit_type = addslashes($_POST['audit_type']);
    $audit_categ = addslashes($_POST['audit_categ']);
    $remarks = addslashes($_POST['remarks']);
    $esection = addslashes($_POST['esection']);
    $username = addslashes($_POST['username']);
    $audit_code = addslashes(trim($_POST['audit_code']));
    $falp_group = addslashes($_POST['falp_group']);
    $section = addslashes($_POST['section']);
    $dept = "";
    $section_code = "";

    $sql = "SELECT dept, section_code FROM ialert_section WHERE falp_group = '$falp_group' AND section = '$section'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $row = $stmt -> fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $dept = $row['dept'];
        $section_code = $row['section_code'];
    }

    $insert = "INSERT INTO ialert_audit 
                (batch,date_audited,full_name,employee_num,provider,position,shift,groups,car_maker,car_model,line_no,process,audit_findings,audited_by,audited_categ,audit_type,remarks,pd,hr,agency,date_created,section_code,section,falp_group,dept) 
                VALUES ('$audit_code','$date_audited','$full_name','$employee_num','$provider','$position','$shift','$group','$carmaker','$carmodel','$emline','$emprocess','$audit_findings','$audited_by','$audit_categ','$audit_type','$remarks',NULL,NULL,NULL,'$server_date_time','$section_code','$section','$falp_group','$dept')";
    $stmt = $conn->prepare($insert);
    if ($stmt->execute()) {
        echo 'Successfully Saved';
    } else {
        echo 'Error';
    }
}

if ($method == 'prev_audit') {
    $c = 0;
    $audit_code = addslashes(trim($_POST['audit_code']));
    $query = "SELECT * FROM ialert_audit WHERE batch LIKE '$audit_code%' ORDER BY id ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    foreach ($stmt->fetchALL() as $x) {
        $c++;
        echo '<tr>';

        echo '<td>' . $c . '</td>';
        echo '<td>' . $x['date_audited'] . '</td>';
        echo '<td>' . $x['full_name'] . '</td>';
        echo '<td>' . $x['employee_num'] . '</td>';
        echo '<td>' . $x['provider'] . '</td>';
        echo '<td>' . $x['position'] . '</td>';
        echo '<td>' . $x['shift'] . '</td>';
        echo '<td>' . $x['groups'] . '</td>';
        echo '<td>' . $x['car_maker'] . '</td>';
        echo '<td>' . $x['car_model'] . '</td>';
        echo '<td>' . $x['line_no'] . '</td>';
        echo '<td>' . $x['process'] . '</td>';
        echo '<td>' . $x['audit_findings'] . '</td>';
        echo '<td>' . $x['audited_by'] . '</td>';
        echo '<td>' . $x['audited_categ'] . '</td>';
        echo '<td>' . $x['remarks'] . '</td>';
        echo '<td>' . $x['falp_group'] . '</td>';
        echo '<td>' . $x['section'] . '</td>';
        echo '</tr>';
    }
}
$conn = NULL;
// $conn2 = NULL;
$conn3 = NULL;