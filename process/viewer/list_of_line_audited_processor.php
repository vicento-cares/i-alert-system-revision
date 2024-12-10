<?php
require '../conn.php';

$method = $_POST['method'];

// Revisions (Vince)
if ($method == 'fetch_process_dropdown') {
    $sql = "SELECT DISTINCT process FROM ialert_line_audit ORDER BY process ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option selected value="">Select Process</option>';
        foreach ($stmt->fetchAll() as $row) {
            echo '<option value="' . htmlspecialchars($row['process']) . '">' . htmlspecialchars($row['process']) . '</option>';
        }
    } else {
        echo '<option disabled selected value="">Select Process</option>';
    }
}

if ($method == 'fetch_group_dropdown') {
    $sql = "SELECT DISTINCT falp_group FROM ialert_line_audit ORDER BY falp_group ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option selected value="">Select Group</option>';
        foreach ($stmt->fetchAll() as $row) {
            echo '<option value="' . htmlspecialchars($row['falp_group']) . '">' . htmlspecialchars($row['falp_group']) . '</option>';
        }
    } else {
        echo '<option disabled selected value="">Select Group</option>';
    }
}

if ($method == 'fetch_line_audited_list') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $line_n = $_POST['line_n'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    // $audit_type = $_POST['audit_type'];
    $criticality_level = $_POST['criticality_level'];
    $section = $_POST['section'];
    $process = $_POST['process'];
    $falp_group = $_POST['falp_group'];
    $audit_category = $_POST['audit_category'];

    $c = 0;
    // AND audit_type LIKE '$audit_type%'
    $query = "SELECT * FROM ialert_line_audit 
                WHERE line_no LIKE '$line_n%' 
                AND car_maker LIKE '$carmaker%' 
                AND car_model LIKE '$carmodel%' 
                AND criticality_level LIKE '$criticality_level%' 
                AND audit_category LIKE '$audit_category%' 
                AND section LIKE '$section%' 
                AND process LIKE '$process%' 
                AND falp_group LIKE '$falp_group%' 
                AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo') 
                GROUP BY id ORDER BY date_audited ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $x) {
            $c++;
            echo '<tr">';
            echo '<td>' . $c . '</td>';
            echo '<td style="display: none;">' . $x['batch'] . '</td>';
            echo '<td>' . $x['date_audited'] . '</td>';
            echo '<td>' . $x['shift'] . '</td>';
            echo '<td>' . $x['groups'] . '</td>';
            echo '<td>' . $x['car_maker'] . '</td>';
            echo '<td>' . $x['car_model'] . '</td>';
            echo '<td>' . $x['line_no'] . '</td>';
            echo '<td>' . $x['process'] . '</td>';
            echo '<td>' . $x['audit_findings'] . '</td>';
            echo '<td>' . $x['audit_details'] . '</td>';
            echo '<td>' . $x['audited_by'] . '</td>';
            echo '<td>' . $x['audit_category'] . '</td>';
            echo '<td>' . $x['problem_identification'] . '</td>';
            echo '<td>' . $x['criticality_level'] . '</td>';
            echo '<td>' . $x['sm_analysis'] . '</td>';
            echo '<td>' . $x['remarks'] . '</td>';
            echo '<td>' . $x['dept'] . '</td>';
            echo '<td>' . $x['falp_group'] . '</td>';
            echo '<td>' . $x['section'] . '</td>';
            echo '<td>' . $x['section_code'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="14" style="text-align:center;">NO RESULT</td>';
        echo '</tr>';
    }
}

$conn = NULL;