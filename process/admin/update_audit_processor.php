<?php
require '../conn.php';

$method = $_POST['method'];

if ($method == 'updateaudit') {
    $id = addslashes($_POST['id']);
    $employee_num = addslashes($_POST['employee_num']);
    $full_name = addslashes($_POST['full_name']);
    $position = addslashes($_POST['position']);
    $provider = addslashes($_POST['provider']);
    $shift = addslashes($_POST['shift']);
    $groups = addslashes($_POST['groups']);
    $audit_type = addslashes($_POST['audit_type']);
    $criticality_level = addslashes($_POST['criticality_level']);
    $carmaker = addslashes($_POST['carmaker']);
    $carmodel = addslashes($_POST['carmodel']);
    $emline = addslashes($_POST['emline']);
    $process = addslashes($_POST['process']);
    $audit_findings = addslashes($_POST['audit_findings']);
    $audit_details = addslashes($_POST['audit_details']);
    $audited_by = addslashes($_POST['audited_by']);
    $date_audited = addslashes($_POST['date_audited']);
    $remarks = addslashes($_POST['remarks']);
    $section = addslashes($_POST['section']);
    $falp_group = addslashes($_POST['falp_group']);
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

    $update = "UPDATE ialert_audit 
                SET employee_num = '$employee_num', full_name = '$full_name', position = '$position', 
                provider = '$provider', shift = '$shift', audit_type = '$audit_type', groups = '$groups', 
                audit_type = '$audit_type', criticality_level = '$criticality_level', car_maker = '$carmaker', 
                car_model = '$carmodel', line_no = '$emline', process = '$process',audit_findings = '$audit_findings',audit_details = '$audit_details', 
                audited_by = '$audited_by', date_audited = '$date_audited', remarks = '$remarks', date_updated = '$server_date_only', 
                section = '$section', falp_group = '$falp_group', dept = '$dept', section_code = '$section_code' 
                WHERE id = '$id'";
    $stmt = $conn->prepare($update);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'Error';
    }

}

$conn = NULL;