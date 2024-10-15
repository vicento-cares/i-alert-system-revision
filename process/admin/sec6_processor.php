<?php
require '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_sec6') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $line = $_POST['line'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    $position = $_POST['position'];
    $audit_type = $_POST['audit_type'];
    $c = 0;

    // $sec6 = "SELECT * FROM ialert_audit WHERE section = 'Section6' AND edit_count != 0 AND employee_num LIKE '$empid%' AND full_name LIKE '$fname%' AND line_no LIKE '$line%' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%' AND position LIKE '$position%' AND provider = 'fas' AND audit_type LIKE '$audit_type%' AND date_recieved IS NULL";
    $sec6 = "SELECT * FROM ialert_audit where section = 'Section 6' AND edit_count != 0 AND provider = 'fas' AND date_recieved IS NULL AND employee_num LIKE '$empid%' AND full_name LIKE '$fname%' AND line_no LIKE '$line%' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%' AND position LIKE '$position%' AND audit_type LIKE '$audit_type%' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')
            UNION ALL
         SELECT * FROM ialert_audit where pd = 'Written IR' AND section = 'Section 6' AND edit_count = 0 AND date_recieved IS NULL AND employee_num LIKE '$empid%' AND full_name LIKE '$fname%' AND line_no LIKE '$line%' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%' AND position LIKE '$position%' AND audit_type LIKE '$audit_type%' AND provider = 'fas' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')";
    $stmt = $conn->prepare($sec6);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $x) {
            $c++;

            echo '<tr>';
            echo '<td>';
            echo '<p>
                        <label>
                            <input type="checkbox" name="" id="" class="singleCheck" value="' . $x['id'] . '">
                            <span></span>
                        </label>
                    </p>';
            echo '</td>';
            echo '<td>' . $c . '</td>';
            echo '<td style="display: none;">' . $x['batch'] . '</td>';
            echo '<td>' . $x['date_audited'] . '</td>';
            echo '<td   style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update" onclick="get_set(&quot;' . $x['id'] . '~!~' . $x['employee_num'] . '~!~' . $x['full_name'] . '~!~' . $x['position'] . '~!~' . $x['provider'] . '~!~' . $x['shift'] . '~!~' . $x['groups'] . '~!~' . $x['audit_type'] . '~!~' . $x['criticality_level'] . '~!~' . $x['car_maker'] . '~!~' . $x['car_model'] . '~!~' . $x['line_no'] . '~!~' . $x['process'] . '~!~' . $x['audit_findings'] . '~!~' . $x['audited_by'] . '~!~' . $x['date_audited'] . '~!~' . $x['remarks'] . '&quot;)">' . $x['full_name'] . '</td>';
            echo '<td>' . $x['position'] . '</td>';
            echo '<td>' . $x['employee_num'] . '</td>';
            echo '<td>' . $x['provider'] . '</td>';
            echo '<td>' . $x['groups'] . '</td>';
            echo '<td>' . $x['car_maker'] . '</td>';
            echo '<td>' . $x['car_model'] . '</td>';
            echo '<td>' . $x['line_no'] . '</td>';
            echo '<td>' . $x['process'] . '</td>';
            echo '<td>' . $x['audit_findings'] . '</td>';
            echo '<td>' . $x['audited_by'] . '</td>';
            echo '<td>' . $x['criticality_level'] . '</td>';
            echo '<td>' . $x['remarks'] . '</td>';
            echo '<td>' . $x['pd'] . '</td>';
            echo '<td>' . $x['agency'] . '</td>';
            echo '<td>' . $x['hr'] . '</td>';
            echo '</tr>';

        }
    } else {
        echo '<tr>';
        echo '<td colspan="14" style="text-align:center;">NO RESULT</td>';
        echo '</tr>';
    }
}

if ($method == 'count_section6') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $audit_type = $_POST['audit_type'];
    $count = "SELECT *,count(*) as total FROM ialert_audit ";
    $stmt = $conn->prepare($count);
    $stmt->execute();
    foreach ($stmt->fetchALL() as $x) {

        $date_audited = $x['date_audited'];
        $pd = $x['pd'];
        $agency = $x['agency'];
        $days_notif = date("Y-m-d", strtotime('+4 day', strtotime($date_audited)));

        $count_na = "SELECT COUNT(*) as total FROM ialert_audit WHERE pd = 'Written IR' AND section = 'Section 6' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo') AND provider = 'fas' AND audit_type LIKE '$audit_type%' AND edit_count = 0 AND date_recieved IS NULL";
        $stmt2 = $conn->prepare($count_na);
        $stmt2->execute();
        foreach ($stmt2->fetchALL() as $j) {
            $total_ir_pending = $j['total'];
            $count_pending = "SELECT (COUNT(*) + $total_ir_pending) as totals FROM ialert_audit WHERE edit_count != 0 AND section = 'Section 6' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo') AND provider = 'fas' AND audit_type LIKE '$audit_type%' AND date_recieved IS NULL";
            $stmt3 = $conn->prepare($count_pending);
            if ($stmt3->execute()) {
                foreach ($stmt3->fetchALL() as $a) {
                    echo '<tr>';
                    echo '<td ><h3 style="color:red;"><b>' . $a['totals'] . '</b></h3></td>';
                    echo '</tr>';
                }
            }
            //       echo '<tr>';
            //  echo '<td ><h3 style="color:red;"><b>'.$j['total'].'</b></h3></td>';
            // echo '</tr>';
        }

    }
}

if ($method == 'total_sec6') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $count_total = "SELECT count(*) as grand_total6 from ialert_audit where section = 'Section 6' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo') AND provider = 'fas'";
    $stmt = $conn->prepare($count_total);
    $stmt->execute();

    foreach ($stmt->fetchALL() as $x) {
        echo '<tr>';

        echo '<td ><h3><b>' . $x['grand_total6'] . '</b></h3></td>';

        echo '</tr>';
    }
}

if ($method == 'deletesec6') {
    $id = [];
    $id = $_POST['id'];
    //COUNT OF ITEM TO BE UPDATED
    $count = count($id);
    foreach ($id as $x) {
        $update = "DELETE FROM ialert_audit WHERE id = '$x'";
        $stmt = $conn->prepare($update);
        if ($stmt->execute()) {
            // echo 'approved';
            $count = $count - 1;
        } else {
            // echo 'error';
        }
    }
    if ($count == 0) {
        echo 'success';
    } else {
        echo 'fail';
    }
}

$conn = NULL;