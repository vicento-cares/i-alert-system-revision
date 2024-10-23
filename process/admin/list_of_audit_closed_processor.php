<?php
require '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_closed_admin') {
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    $audit_type = $_POST['audit_type'];
    $position = $_POST['position'];
    $criticality_level = $_POST['criticality_level'];
    $group = $_POST['group'];
    $shift = $_POST['shift'];
    $section = $_POST['section'];
    $falp_group = $_POST['falp_group'];
    $provider = $_POST['provider'];
    $c = 0;

    $query = "SELECT * FROM ialert_audit
    WHERE employee_num LIKE '$empid%' AND full_name LIKE '$fname%' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%'  AND line_no LIKE '$lname%' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')  AND provider LIKE '$provider%' AND section LIKE '$section%' AND audit_type LIKE '$audit_type%' AND position LIKE '$position%' AND edit_count = 0 AND criticality_level LIKE '$criticality_level%' AND groups LIKE '$group%' AND shift LIKE '$shift%' AND falp_group LIKE '$falp_group%' GROUP BY id ORDER BY date_audited ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $x) {
            $c++;

            // Revisions (Vince)
            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update" onclick="get_set(&quot;' . $x['id'] . '~!~' . $x['employee_num'] . '~!~' . $x['full_name'] . '~!~' . $x['position'] . '~!~' . $x['provider'] . '~!~' . $x['shift'] . '~!~' . $x['groups'] . '~!~' . $x['audit_type'] . '~!~' . $x['criticality_level'] . '~!~' . $x['car_maker'] . '~!~' . $x['car_model'] . '~!~' . $x['line_no'] . '~!~' . $x['process'] . '~!~' . $x['audit_findings'] . '~!~' . $x['audit_details'] . '~!~' . $x['audited_by'] . '~!~' . $x['date_audited'] . '~!~' . $x['remarks'] . '~!~' . $x['section'] . '~!~' . $x['falp_group'] . '~!~' . $x['problem_identification'] . '&quot;)">';
            echo '<td>' . $c . '</td>';
            echo '<td style="display: none;">' . $x['batch'] . '</td>';
            echo '<td>' . $x['date_audited'] . '</td>';
            echo '<td>' . $x['full_name'] . '</td>';
            echo '<td>' . $x['employee_num'] . '</td>';
            echo '<td>' . $x['position'] . '</td>';
            echo '<td>' . $x['shift'] . '</td>';
            echo '<td>' . $x['provider'] . '</td>';
            echo '<td>' . $x['groups'] . '</td>';
            echo '<td>' . $x['car_maker'] . '</td>';
            echo '<td>' . $x['car_model'] . '</td>';
            echo '<td>' . $x['line_no'] . '</td>';
            echo '<td>' . $x['process'] . '</td>';
            echo '<td>' . $x['audit_findings'] . '</td>';
            echo '<td>' . $x['audit_details'] . '</td>';
            echo '<td>' . $x['audit_type'] . '</td>';
            echo '<td>' . $x['audited_by'] . '</td>';
            echo '<td>' . $x['problem_identification'] . '</td>';
            echo '<td>' . $x['criticality_level'] . '</td>';
            echo '<td>' . $x['dept'] . '</td>';
            echo '<td>' . $x['falp_group'] . '</td>';
            echo '<td>' . $x['section'] . '</td>';
            echo '<td>' . $x['section_code'] . '</td>';
            echo '<td>' . $x['remarks'] . '</td>';
            echo '<td>' . $x['pd'] . '' . $x['agency'] . '</td>';
            echo '<td>' . $x['updated_by'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="14" style="text-align:center;">NO RESULT</td>';
        echo '</tr>';
    }
}

$conn = NULL;