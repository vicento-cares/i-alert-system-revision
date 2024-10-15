<?php
require '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_audit_list') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $line = $_POST['line'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    $position = $_POST['position'];
    $criticality_level = $_POST['criticality_level'];
    $audit_type = $_POST['audit_type'];
    $section = $_POST['section'];
    $provider = $_POST['provider'];
    $group = $_POST['group'];
    $shift = $_POST['shift'];
    $falp_group = $_POST['falp_group'];
    $c = 0;

    $query = "SELECT * FROM ialert_audit WHERE  employee_num LIKE '$empid%' AND full_name LIKE '$fname%' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%' AND line_no LIKE '$line%' AND position LIKE '$position%' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo') AND criticality_level LIKE '$criticality_level%' AND audit_type LIKE '$audit_type%' AND section LIKE '$section%' AND provider LIKE '$provider%' AND edit_count != '0' AND groups LIKE '$group%' AND shift LIKE '$shift%' AND falp_group LIKE '$falp_group%' GROUP BY id ORDER BY date_audited ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $x) {
            $c++;
            $date_audited = $x['date_audited'];
            $pd = $x['pd'];
            $agency = $x['agency'];
            $days_notif = date("Y-m-d", strtotime('+4 day', strtotime($date_audited)));

            if ($pd == '' && $agency == '' && $server_date_only >= $days_notif) {
                echo '<tr style="color:red;">';
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
                echo '<td  style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update" onclick="get_set(&quot;' . $x['id'] . '~!~' . $x['employee_num'] . '~!~' . $x['full_name'] . '~!~' . $x['position'] . '~!~' . $x['provider'] . '~!~' . $x['shift'] . '~!~' . $x['groups'] . '~!~' . $x['audit_type'] . '~!~' . $x['criticality_level'] . '~!~' . $x['car_maker'] . '~!~' . $x['car_model'] . '~!~' . $x['line_no'] . '~!~' . $x['process'] . '~!~' . $x['audit_findings'] . '~!~' . $x['audited_by'] . '~!~' . $x['date_audited'] . '~!~' . $x['remarks'] . '~!~' . $x['section'] . '~!~' . $x['falp_group'] . '&quot;)">' . $x['full_name'] . '</td>';
                echo '<td>' . $x['position'] . '</td>';

                echo '<td>' . $x['employee_num'] . '</td>';
                echo '<td>' . $x['provider'] . '</td>';
                echo '<td>' . $x['shift'] . '</td>';
                echo '<td>' . $x['groups'] . '</td>';
                echo '<td>' . $x['car_maker'] . '</td>';
                echo '<td>' . $x['car_model'] . '</td>';
                echo '<td>' . $x['line_no'] . '</td>';

                echo '<td>' . $x['process'] . '</td>';
                echo '<td>' . $x['audit_findings'] . '</td>';
                echo '<td>' . $x['audited_by'] . '</td>';
                echo '<td>' . $x['criticality_level'] . '</td>';
                echo '<td>' . $x['audit_type'] . '</td>';
                echo '<td>' . $x['remarks'] . '</td>';
                echo '<td>' . $x['pd'] . '</td>';
                echo '<td>' . $x['agency'] . '</td>';
                echo '<td>' . $x['hr'] . '</td>';
                echo '<td>' . $x['dept'] . '</td>';
                echo '<td>' . $x['falp_group'] . '</td>';
                echo '<td>' . $x['section'] . '</td>';
                echo '<td>' . $x['section_code'] . '</td>';
                echo '</tr>';
            } else {
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
                echo '<td  style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update" onclick="get_set(&quot;' . $x['id'] . '~!~' . $x['employee_num'] . '~!~' . $x['full_name'] . '~!~' . $x['position'] . '~!~' . $x['provider'] . '~!~' . $x['shift'] . '~!~' . $x['groups'] . '~!~' . $x['audit_type'] . '~!~' . $x['criticality_level'] . '~!~' . $x['car_maker'] . '~!~' . $x['car_model'] . '~!~' . $x['line_no'] . '~!~' . $x['process'] . '~!~' . $x['audit_findings'] . '~!~' . $x['audited_by'] . '~!~' . $x['date_audited'] . '~!~' . $x['remarks'] . '~!~' . $x['section'] . '~!~' . $x['falp_group'] . '&quot;)">' . $x['full_name'] . '</td>';
                echo '<td>' . $x['position'] . '</td>';
                echo '<td>' . $x['employee_num'] . '</td>';
                echo '<td>' . $x['provider'] . '</td>';
                echo '<td>' . $x['shift'] . '</td>';
                echo '<td>' . $x['groups'] . '</td>';
                echo '<td>' . $x['car_maker'] . '</td>';
                echo '<td>' . $x['car_model'] . '</td>';
                echo '<td>' . $x['line_no'] . '</td>';
                echo '<td>' . $x['process'] . '</td>';
                echo '<td>' . $x['audit_findings'] . '</td>';
                echo '<td>' . $x['audited_by'] . '</td>';
                echo '<td>' . $x['criticality_level'] . '</td>';
                echo '<td>' . $x['audit_type'] . '</td>';
                echo '<td>' . $x['remarks'] . '</td>';
                echo '<td>' . $x['pd'] . '</td>';
                echo '<td>' . $x['agency'] . '</td>';
                echo '<td>' . $x['hr'] . '</td>';
                echo '<td>' . $x['dept'] . '</td>';
                echo '<td>' . $x['falp_group'] . '</td>';
                echo '<td>' . $x['section'] . '</td>';
                echo '<td>' . $x['section_code'] . '</td>';
                echo '</tr>';
            }
        }
    } else {
        echo '<tr>';
        echo '<td colspan="14" style="text-align:center;">NO RESULT</td>';
        echo '</tr>';
    }
}

$conn = NULL;
