<?php
require '../conn.php';

$method = $_POST['method'];

if ($method == 'fetch_audited_list_fass_status') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $esection = $_POST['esection'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    $audit_type = $_POST['audit_type'];
    $criticality_level = $_POST['criticality_level'];
    $section = $_POST['section'];
    $falp_group = $_POST['falp_group'];
    $group = $_POST['group'];
    $shift = $_POST['shift'];
    $c = 0;

    $query = "SELECT *,date_format(date_sent, '%Y-%m-%d %H:%i:%s') as date_sent FROM ialert_audit WHERE  employee_num LIKE '$empid%' AND full_name LIKE '$fname%'  AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')  AND provider = '$esection' AND pd IS NOT NULL AND line_no LIKE '$lname%' AND date_sent IS NULL AND position LIKE '$position%' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%' AND audit_type LIKE '$audit_type%' AND criticality_level LIKE '$criticality_level%' AND falp_group = '$falp_group'";

    if (!empty($section)) {
        $query .= " AND section = '$section'";
    }

    $query .= " AND groups LIKE '$group%' AND shift LIKE '$shift%' AND hr IS NULL GROUP BY id ORDER BY date_audited ASC";

    //        $query = "SELECT *,date_format(date_sent, '%Y-%m-%d %H:%i:%s') as date_sent FROM ialert_audit WHERE section = 'esection' AND edit_count != 0 AND provider = 'esection' AND date_recieved IS NULL 
// AND PD IS NOT NULL AND date_sent IS NULL
// UNION ALL
// SELECT *,date_format(date_sent, '%Y-%m-%d %H:%i:%s') as date_sent FROM ialert_audit WHERE pd = 'Written IR' AND section = 'esection' AND edit_count = 0 AND date_recieved IS NULL  
// AND provider = 'esection' and PD != '' AND date_sent IS NULL";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $x) {
            $pd = $x['pd'];
            $edit_count = $x['edit_count'];
            $c++;

            if ($pd != 'Written IR' && $edit_count == 0) {
                //     //  echo '<tr">';
                //     //     echo '<td>';
                //     //     echo '<p>
                //     //             <label for="row_' . $x['id'] . '">
                //     //                 <input type="checkbox" class="singleCheck" id="row_' . $x['id'] . '" value="'.$x['id'].'">
                //     //                 <span></span>
                //     //             </label>
                //     //         </p>';
                //     //     echo '</td>';
                //     //     echo '</td>';
                //     //     echo '<td>'.$c.'</td>';
                //     //     echo '<td style="display: none;">'.$x['batch'].'</td>';
                //     //     echo '<td>'.$x['date_audited'].'</td>';
                //     //     echo '<td>'.$x['full_name'].'</td>';
                //     //     echo '<td>'.$x['employee_num'].'</td>';
                //     //     echo '<td>'.$x['position'].'</td>';
                //     //     echo '<td>'.$x['shift'].'</td>';
                //     //     echo '<td>'.$x['provider'].'</td>';
                //     //     echo '<td>'.$x['groups'].'</td>';
                //     //     echo '<td>'.$x['car_maker'].'</td>';
                //     //     echo '<td>'.$x['car_model'].'</td>';
                //     //     echo '<td>'.$x['line_no'].'</td>';
                //     //     echo '<td>'.$x['process'].'</td>';
                //     //     echo '<td>'.$x['audit_findings'].'</td>';
                //     //     echo '<td>'.$x['audited_by'].'</td>';
                //     //     echo '<td>'.$x['criticality_level'].'</td>';
                //     //     echo '<td>'.$x['remarks'].'</td>';
                //     //     echo '<td>'.$x['pd'].'</td>';
                //     //     echo '<td>'.$x['date_sent'].'</td>';
                //     //     echo '<td>'.$x['hr'].'</td>';
                //     //     echo '<td>'.$x['updated_by'].'</td>';
                //     // echo '</tr>'; 

            } else {


                echo '<tr>';
                echo '<td>';
                echo '<p>
	                        <label for="row_' . $x['id'] . '">
	                            <input type="checkbox" class="singleCheck" id="row_' . $x['id'] . '" value="' . $x['id'] . '">
	                            <span></span>
	                        </label>
	                    </p>';
                echo '</td>';
                echo '</td>';
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
                echo '<td>' . $x['audited_by'] . '</td>';
                echo '<td>' . $x['audit_category'] . '</td>';
                echo '<td>' . $x['problem_identification'] . '</td>';
                echo '<td>' . $x['criticality_level'] . '</td>';
                echo '<td>' . $x['sm_analysis'] . '</td>';
                echo '<td>' . $x['remarks'] . '</td>';
                echo '<td>' . $x['pd'] . '</td>';
                echo '<td>' . $x['date_sent'] . '</td>';
                echo '<td>' . $x['hr'] . '</td>';
                echo '<td>' . $x['updated_by'] . '</td>';
                echo '</tr>';
            }
        }
    } else {
        echo '<tr>';
        echo '<td colspan="14" style="text-align:center;">NO RESULT</td>';
        echo '</tr>';
    }
}

// Revisions (Vince)
if ($method == 'update_fass') {
    $id = [];
    $id = $_POST['id'];
    $status = $_POST['status'];
    $update_by = $_POST['update_by'];

    //COUNT OF ITEM TO BE UPDATED
    $count = count($id);

    foreach ($id as $x) {
        //  $history = "INSERT INTO ialert_history (audit_id,batch,date_audited,full_name,employee_id,provider,groups,carmaker,carmodel,line_no,process,audit_findings,audited_by,criticality_level,remarks,pd,agency,hr,updated_by,edit_count,position,date_edited,indicator_id) SELECT id, batch, date_audited, full_name, employee_num, provider, groups, car_maker, car_model, line_no, process, audit_findings, audited_by, criticality_level, remarks, pd, agency, hr, updated_by, edit_count, position, '$server_date_time',id FROM ialert_audit WHERE id = '$x'";
        // $stmt2 = $conn->prepare($history);
        // if ($stmt2->execute()) {

        //  $update = "UPDATE ialert_audit SET pd = '$status', edit_count = edit_count - 1, updated_by = '$update_by'  WHERE id = '$x' AND edit_count > 0";
        //   $stmt = $conn->prepare($update);
        //  if ($stmt->execute()) {
        //      // echo 'approved';
        //      $count = $count - 1;
        //  }else{
        //      // echo 'error';
        //  }
        // }    
        //  if($count == 0){
        //      echo 'success';
        //  }else{
        //      echo 'fail';
        //  }

        $get_emp = "SELECT employee_num, audit_findings, criticality_level FROM ialert_audit WHERE id ='$x'";
        $stmt = $conn->prepare($get_emp);

        if ($stmt->execute()) {
            foreach ($stmt->fetchALL() as $j) {
                $employee_num = $j['employee_num'];
                $audit_findings = $j['audit_findings'];
                $criticality_level = $j['criticality_level'];

                if ($criticality_level == 'High Impact' && $status != 'Written IR' && $status != 'AWOL' && $status != 'Resigned') {
                    echo 'select ir status';
                } else {
                    $audit_counts = "SELECT count(audit_findings) as audit_count 
                                        FROM ialert_audit WHERE employee_num = '$employee_num' 
                                        AND audit_findings = '$audit_findings'";
                    $stmt2 = $conn->prepare($audit_counts);

                    if ($stmt2->execute()) {
                        foreach ($stmt2->fetchALL() as $j) {
                            $audit_count = $j['audit_count'];

                            if ($audit_count >= 3 && $status != 'Written IR') {
                                echo 'invalid';
                            } else if ($status === 'AWOL') {
                                $update = "UPDATE ialert_audit 
                                            SET edit_count = 0, pd = '$status', updated_by = '$update_by' 
                                            WHERE id = '$x'";
                                $stmt4 = $conn->prepare($update);
                                if ($stmt4->execute()) {
                                    echo 'success';
                                } else {
                                    echo 'error';
                                }
                            } else if ($status === 'Resigned') {
                                $updates = "UPDATE ialert_audit 
                                            SET edit_count = 0, pd = '$status', updated_by = '$update_by' 
                                            WHERE id = '$x'";
                                $stmt5 = $conn->prepare($updates);
                                if ($stmt5->execute()) {
                                    echo 'success';
                                } else {
                                    echo 'error';
                                }
                                // } else if ($status != 'Written IR' && $audit_findings == 'Un Authorized Repair/Hidden Repair') {
                                //     echo 'invalid';
                                // } else if ($status != 'Written IR' && $audit_findings == 'Bringing of prohibited tool') {
                                //     echo 'invalid';
                                // } else if ($status != 'Written IR' && $audit_findings == 'Un Authorized person doing the process') {
                                //     echo 'invalid';
                                // } else if ($status != 'Written IR' && $audit_findings == 'Intentional Act of making defect') {
                                //     echo 'invalid';
                                // } else if ($status != 'Written IR' && $audit_findings == 'Pulling of inserted wire on connector to dis-insert') {
                                //     echo 'invalid';
                                // } else if ($status != 'Written IR' && $audit_findings == 'Not following visual inspection rule') {
                                //     echo 'invalid';
                                // } else if ($status != 'Written IR' && $audit_findings == 'Non Compliance on insert-pull method') {
                                //     echo 'invalid';
                                // } else if ($status != 'Written IR' && $audit_findings == 'Not following dimension inspection rule') {
                                //     echo 'invalid';
                                // } else if ($status != 'Written IR' && $audit_findings == 'Using of prohibited tool on prohibited act') {
                                //     echo 'invalid';
                            } else {
                                $history = "INSERT INTO ialert_history 
                                            (audit_id,batch,date_audited,full_name,employee_id,provider,groups,carmaker,carmodel,line_no,process,audit_findings,audited_by,audit_category,criticality_level,remarks,pd,agency,hr,updated_by,edit_count,position,date_edited,indicator_id) 
                                            SELECT id, batch, date_audited, full_name, employee_num, provider, groups, car_maker, car_model, line_no, process, audit_findings, audited_by, audit_category, criticality_level, remarks, pd, agency, hr, updated_by, edit_count, position, '$server_date_time',id 
                                            FROM ialert_audit WHERE id = '$x'";
                                $stmt3 = $conn->prepare($history);

                                if ($stmt3->execute()) {
                                    $update = "UPDATE ialert_audit 
                                                SET pd = '$status', edit_count = edit_count - 1, updated_by = '$update_by' 
                                                WHERE id = '$x' AND edit_count > 0";
                                    $stmt4 = $conn->prepare($update);

                                    if ($stmt4->execute()) {
                                        echo 'success';
                                    } else {
                                        echo 'error';
                                    }
                                } else {
                                    echo 'error';
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}

if ($method == 'send') {
    $id = [];
    $id = $_POST['id'];

    //COUNT OF ITEM TO BE UPDATED
    $count = count($id);
    foreach ($id as $x) {

        $update = "UPDATE ialert_audit SET date_sent = '$server_date_time' WHERE id = '$x' AND pd = 'Written IR'";

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


if ($method == 'closed') {
    $id = [];
    $id = $_POST['id'];
    $update_by = $_POST['update_by'];
    //COUNT OF ITEM TO BE UPDATED
    $count = count($id);
    foreach ($id as $x) {

        $history = "INSERT INTO ialert_history (audit_id,batch,date_audited,full_name,employee_id,provider,groups,carmaker,carmodel,line_no,process,audit_findings,audited_by,audit_category,criticality_level,remarks,pd,agency,hr,updated_by,edit_count,position,date_edited) SELECT id, batch, date_audited, full_name, employee_num, provider, groups, car_maker, car_model, line_no, process, audit_findings, audited_by, audit_category, criticality_level, remarks, pd, agency, hr, updated_by, edit_count, position, '$server_date_time' FROM ialert_audit WHERE id = '$x'";
        $stmt2 = $conn->prepare($history);
        if ($stmt2->execute()) {

            $update = "UPDATE ialert_audit SET edit_count = 0, updated_by = '$update_by' WHERE id = '$x' AND pd != 'Written IR' OR agency != 'Written IR'";
            $stmt = $conn->prepare($update);
            if ($stmt->execute()) {
                echo 'success';
            } else {
                echo 'error';
            }
        }
    }
}

$conn = NULL;