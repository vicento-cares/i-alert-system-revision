<?php
require '../conn.php';
$method = $_POST['method'];

if ($method == 'LineAuditCode') {
    $prefix = "LAC:";
    $dateCode = date('ymd');
    $randomCode = mt_rand(10000, 50000);
    echo $prefix . "" . $dateCode . "" . $randomCode;
}

if ($method == 'insert_line_audit') {

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

    $insert = "INSERT INTO ialert_line_audit 
                (batch,date_audited,shift,groups,car_maker,car_model,line_no,process,audit_findings,audited_by,audited_categ,audit_type,remarks,date_created,section_code,section,falp_group,dept) 
                VALUES ('$audit_code','$date_audited','$shift','$group','$carmaker','$carmodel','$emline','$emprocess','$audit_findings','$audited_by','$audit_categ','$audit_type','$remarks','$server_date_time','$section_code','$section','$falp_group','$dept')";
    $stmt = $conn->prepare($insert);
    if ($stmt->execute()) {

        echo 'Successfully Saved';

    } else {

        echo 'Error';

    }

}

if ($method == 'prev_line_audit') {
    $c = 0;
    $audit_code = addslashes(trim($_POST['audit_code']));
    $query = "SELECT * FROM ialert_line_audit WHERE batch LIKE '$audit_code%' ORDER BY id ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    foreach ($stmt->fetchALL() as $x) {
        $c++;
        echo '<tr>';
        echo '<td>' . $c . '</td>';
        echo '<td>' . $x['date_audited'] . '</td>';
        echo '<td>' . $x['shift'] . '</td>';
        echo '<td>' . $x['groups'] . '</td>';
        echo '<td>' . $x['car_maker'] . '</td>';
        echo '<td>' . $x['car_model'] . '</td>';
        echo '<td>' . $x['line_no'] . '</td>';
        echo '<td>' . $x['process'] . '</td>';
        echo '<td>' . $x['audit_findings'] . '</td>';
        echo '<td>' . $x['audited_by'] . '</td>';
        echo '<td>' . $x['audited_categ'] . '</td>';
        echo '<td>' . $x['audit_type'] . '</td>';
        echo '<td>' . $x['falp_group'] . '</td>';
        echo '<td>' . $x['section'] . '</td>';
        echo '<td>' . $x['remarks'] . '</td>';
        echo '</tr>';
    }
}

$conn = NULL;