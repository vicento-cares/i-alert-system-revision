<?php
require '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_line_audit_list') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $line_n = $_POST['line_n'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    $criticality_level = $_POST['criticality_level'];
    $section = $_POST['section'];
    $falp_group = $_POST['falp_group'];
    $c = 0;

    $query = "SELECT * FROM ialert_line_audit WHERE  line_no LIKE '$line_n%' AND car_model LIKE '$carmodel%' AND car_maker LIKE '$carmaker%' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo') AND criticality_level LIKE '$criticality_level%' AND section LIKE '$section%' AND falp_group LIKE '$falp_group%' GROUP BY id ORDER BY date_audited ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $x) {
            $c++;
            echo '<tr>';
            echo '<td>';
            echo '<p>
                        <label for="row_' . $x['id'] . '">
                            <input type="checkbox" class="singleCheck" id="row_' . $x['id'] . '" value="' . $x['id'] . '">
                            <span></span>
                        </label>
                    	</p>';
            echo '</td>';
            echo '<td >' . $c . '</td>';
            echo '<td style="display: none;">' . $x['batch'] . '</td>';
            echo '<td>' . $x['date_audited'] . '</td>';
            echo '<td>' . $x['shift'] . '</td>';
            echo '<td>' . $x['groups'] . '</td>';
            echo '<td>' . $x['car_maker'] . '</td>';
            echo '<td>' . $x['car_model'] . '</td>';
            echo '<td>' . $x['line_no'] . '</td>';
            echo '<td>' . $x['process'] . '</td>';
            echo '<td style="cursor:pointer;" class="modal-trigger" 
                    data-toggle="modal" data-target="#updateline" 
                    onclick="get_set_line(&quot;' . 
                    $x['id'] . '~!~' . 
                    $x['shift'] . '~!~' . 
                    $x['groups'] . '~!~' . 
                    $x['date_audited'] . '~!~' . 
                    $x['car_maker'] . '~!~' . 
                    $x['car_model'] . '~!~' . 
                    $x['line_no'] . '~!~' . 
                    $x['process'] . '~!~' . 
                    $x['audit_findings'] . '~!~' . 
                    $x['audit_details'] . '~!~' . 
                    $x['audited_by'] . '~!~' . 
                    $x['criticality_level'] . '~!~' . 
                    $x['remarks'] . '~!~' . 
                    $x['audit_type'] . '~!~' . 
                    $x['section'] . '~!~' . 
                    $x['falp_group'] . '~!~' . 
                    $x['problem_identification'] . '~!~' . 
                    $x['sm_analysis'] . '&quot;)">' . $x['audit_findings'] . '</td>';
            echo '<td>' . $x['audit_details'] . '</td>';
            echo '<td>' . $x['audited_by'] . '</td>';
            echo '<td>' . $x['audit_category'] . '</td>';
            echo '<td>' . $x['problem_identification'] . '</td>';
            echo '<td>' . $x['criticality_level'] . '</td>';
            echo '<td>' . $x['sm_analysis'] . '</td>';
            echo '<td>' . $x['audit_type'] . '</td>';
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