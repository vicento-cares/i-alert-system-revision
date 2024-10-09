<?php
require '../conn.php';

$method = $_POST['method'];

if ($method == 'count_for_update_provider') {
    $server_date = $_POST['server_date'];
    $esection = $_POST['esection'];
    $count = "SELECT *,count(*) as total FROM ialert_audit ";
    $stmt = $conn->prepare($count);
    $stmt->execute();
    foreach ($stmt->fetchALL() as $x) {

        $date_audited = $x['date_audited'];
        $pd = $x['pd'];
        $agency = $x['agency'];
        $days_notif = date("Y-m-d", strtotime('+4 day', strtotime($date_audited)));

        $count_na = "SELECT COUNT(*) as total FROM ialert_audit WHERE edit_count != '0' AND provider = '$esection'";
        $stmt2 = $conn->prepare($count_na);
        $stmt2->execute();
        foreach ($stmt2->fetchALL() as $j) {
            echo '<tr>';

            echo '<td ><h3 style="color:red;"><b>' . $j['total'] . '</b></h3></td>';

            echo '</tr>';
        }

    }
}

if ($method == 'fetch_audited_list_provider') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $esection = $_POST['esection'];
    $lname = $_POST['lname'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    $audit_categ = $_POST['audit_categ'];
    $group = $_POST['group'];
    $shift = $_POST['shift'];
    $c = 0;

    $query = "SELECT * FROM ialert_audit
    WHERE  employee_num LIKE '$empid%' AND full_name LIKE '$fname%' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%' AND line_no LIKE '$lname%' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')  AND provider = '$esection' AND agency IS NULL AND audited_categ LIKE '$audit_categ%' AND groups LIKE '$group%' AND shift LIKE '$shift%'
     GROUP BY id ORDER BY date_audited ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $x) {
            $c++;

            $date_audited = $x['date_audited'];
            $agency = $x['agency'];
            $days_notif = date("Y-m-d", strtotime('+4 day', strtotime($date_audited)));

            if ($agency == '' && $server_date_only >= $days_notif) {
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
                echo '<td>' . $x['full_name'] . '</td>';
                echo '<td>' . $x['position'] . '</td>';
                echo '<td>' . $x['shift'] . '</td>';
                echo '<td>' . $x['employee_num'] . '</td>';
                echo '<td>' . $x['provider'] . '</td>';
                echo '<td>' . $x['groups'] . '</td>';
                echo '<td>' . $x['car_maker'] . '</td>';
                echo '<td>' . $x['car_model'] . '</td>';
                echo '<td>' . $x['line_no'] . '</td>';
                echo '<td>' . $x['process'] . '</td>';
                echo '<td>' . $x['audit_findings'] . '</td>';
                echo '<td>' . $x['audited_by'] . '</td>';
                echo '<td>' . $x['audited_categ'] . '</td>';
                echo '<td>' . $x['remarks'] . '</td>';
                echo '<td>' . $x['agency'] . '</td>';
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
                echo '<td>' . $x['full_name'] . '</td>';
                echo '<td>' . $x['position'] . '</td>';
                echo '<td>' . $x['shift'] . '</td>';
                echo '<td>' . $x['employee_num'] . '</td>';
                echo '<td>' . $x['provider'] . '</td>';
                echo '<td>' . $x['groups'] . '</td>';
                echo '<td>' . $x['car_maker'] . '</td>';
                echo '<td>' . $x['car_model'] . '</td>';
                echo '<td>' . $x['line_no'] . '</td>';
                echo '<td>' . $x['process'] . '</td>';
                echo '<td>' . $x['audit_findings'] . '</td>';
                echo '<td>' . $x['audited_by'] . '</td>';
                echo '<td>' . $x['audited_categ'] . '</td>';
                echo '<td>' . $x['remarks'] . '</td>';
                echo '<td>' . $x['agency'] . '</td>';
                echo '</tr>';
            }
        }
    } else {
        echo '<tr>';
        echo '<td colspan="14" style="text-align:center;">NO RESULT</td>';
        echo '</tr>';
    }
}

if ($method == 'update_status') {
    $id = [];
    $id = $_POST['id'];
    $status = $_POST['status'];

    //COUNT OF ITEM TO BE UPDATED
    $count = count($id);

    foreach ($id as $x) {
        $update = "UPDATE ialert_audit SET agency = '$status' WHERE id = '$x'";
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

// if ($method == 'update_status') {
//     $id = [];
//     $id = $_POST['id'];
//     $status = $_POST['status'];
//     //COUNT OF ITEM TO BE UPDATED
//     $count = count($id);
//     foreach($id as $x){
//         $get_emp = "SELECT employee_num, audit_findings FROM ialert_audit WHERE id ='$x'";
//             $stmt = $conn->prepare($get_emp);
//             if ($stmt->execute()) {
//                 foreach($stmt->fetchALL() as $j){
//                      $employee_num = $j['employee_num'];
//                      $audit_findings = $j['audit_findings'];

//                     $audit_counts = "SELECT count(audit_findings) as audit_count FROM ialert_audit WHERE employee_num = '$employee_num' AND audit_findings = '$audit_findings'";
//                     $stmt2 = $conn->prepare($audit_counts);
//                     if ($stmt2->execute()) {
//                         foreach($stmt2->fetchALL() as $j){
//                              $audit_count = $j['audit_count'];

//                              if ($audit_count >= 3 && $status != 'Written IR'){
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Un Authorized Repair/Hidden Repair') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Bringing of prohibited tool') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Un Authorized person doing the process') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Intentional Act of making defect') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Pulling of inserted wire on connector to dis-insert') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Not following visual inspection rule') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Non Compliance on insert-pull method') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Not following dimension inspection rule') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Using of prohibited tool on prohibited act') {
//                                         echo 'invalid';
//                              }else{
//                                     $update = "UPDATE ialert_audit SET agency = '$status' WHERE id = '$x' ";
//                                     $stmt3 = $conn->prepare($update);
//                                     if ($stmt3->execute()) {
//                                         echo 'success';
//                                      }else{
//                                         echo 'error';
//                                      } 
//                              }


//                         }



//         }

//     }

// }
// }

// }

if ($method == 'fetch_audited_list_provider_status') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $esection = $_POST['esection'];
    $line_no = $_POST['line_no'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    $audit_categ = $_POST['audit_categ'];
    $group = $_POST['group'];
    $shift = $_POST['shift'];
    $c = 0;

    $query = "SELECT * FROM ialert_audit
    WHERE  employee_num LIKE '$empid%' AND full_name LIKE '$fname%' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')  AND provider = '$esection' AND agency != '' AND edit_count != '0' AND line_no LIKE '$line_no%' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%' AND audited_categ LIKE '$audit_categ%' AND groups LIKE '$group%' AND shift LIKE '$shift%'
     GROUP BY id ORDER BY date_audited ASC";

    $stmt = $conn->prepare($query);
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
            echo '</td>';
            echo '<td>' . $c . '</td>';
            echo '<td style="display: none;">' . $x['batch'] . '</td>';
            echo '<td>' . $x['date_audited'] . '</td>';
            echo '<td>' . $x['full_name'] . '</td>';
            echo '<td>' . $x['position'] . '</td>';
            echo '<td>' . $x['shift'] . '</td>';
            echo '<td>' . $x['employee_num'] . '</td>';
            echo '<td>' . $x['provider'] . '</td>';
            echo '<td>' . $x['groups'] . '</td>';
            echo '<td>' . $x['car_maker'] . '</td>';
            echo '<td>' . $x['car_model'] . '</td>';
            echo '<td>' . $x['line_no'] . '</td>';
            echo '<td>' . $x['process'] . '</td>';
            echo '<td>' . $x['audit_findings'] . '</td>';
            echo '<td>' . $x['audited_by'] . '</td>';
            echo '<td>' . $x['audited_categ'] . '</td>';
            echo '<td>' . $x['remarks'] . '</td>';
            echo '<td>' . $x['agency'] . '</td>';
            echo '</tr>';

        }
    } else {
        echo '<tr>';
        echo '<td colspan="14" style="text-align:center;">NO RESULT</td>';
        echo '</tr>';
    }
}

// if ($method == 'update') {
//     $id = [];
//     $id = $_POST['id'];
//     $status = $_POST['status'];
//     //COUNT OF ITEM TO BE UPDATED
//     $count = count($id);
//     foreach($id as $x){
//         $update = "UPDATE ialert_audit SET agency = '$status' WHERE id = '$x'";
//         $stmt = $conn->prepare($update);
//         if ($stmt->execute()) {
//             // echo 'approved';
//             $count = $count - 1;
//         }else{
//             // echo 'error';
//         }
//     }
//         if($count == 0){
//             echo 'success';
//         }else{
//             echo 'fail';
//         }
// }  

if ($method == 'update') {
    $id = [];
    $id = $_POST['id'];
    $status = $_POST['status'];

    //COUNT OF ITEM TO BE UPDATED
    $count = count($id);

    foreach ($id as $x) {
        $history = "INSERT INTO ialert_history 
                    (audit_id,batch,date_audited,full_name,employee_id,provider,groups,carmaker,carmodel,line_no,process,audit_findings,audited_by,audit_category,remarks,pd,agency,hr,updated_by,edit_count,position,date_edited,indicator_id) 
                    SELECT id, batch, date_audited, full_name, employee_num, provider, groups, car_maker, car_model, line_no, process, audit_findings, audited_by, audited_categ, remarks, pd, agency, hr, updated_by, edit_count, position, '$server_date_time',id 
                    FROM ialert_audit WHERE id = '$x'";
        $stmt2 = $conn->prepare($history);

        if ($stmt2->execute()) {
            $update = "UPDATE ialert_audit 
                        SET agency = '$status', edit_count = edit_count - 1 
                        WHERE id = '$x'";
            $stmt = $conn->prepare($update);
            if ($stmt->execute()) {
                // echo 'approved';
                $count = $count - 1;
            } else {
                // echo 'error';
            }
        }
    }

    if ($count == 0) {
        echo 'success';
    } else {
        echo 'fail';
    }

    //     $get_emp = "SELECT employee_num, audit_findings FROM ialert_audit WHERE id ='$x'";
//             $stmt = $conn->prepare($get_emp);
//             if ($stmt->execute()) {
//                 foreach($stmt->fetchALL() as $j){
//                      $employee_num = $j['employee_num'];
//                      $audit_findings = $j['audit_findings'];

    //                     $audit_counts = "SELECT count(audit_findings) as audit_count FROM ialert_audit WHERE employee_num = '$employee_num' AND audit_findings = '$audit_findings'";
//                     $stmt2 = $conn->prepare($audit_counts);
//                     if ($stmt2->execute()) {
//                         foreach($stmt2->fetchALL() as $j){
//                              $audit_count = $j['audit_count'];

    //                              if ($audit_count >= 3 && $status != 'Written IR' || $status != ''){
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Un Authorized Repair/Hidden Repair') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Bringing of prohibited tool') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Un Authorized person doing the process') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Intentional Act of making defect') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Pulling of inserted wire on connector to dis-insert') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Not following visual inspection rule') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Non Compliance on insert-pull method') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Not following dimension inspection rule') {
//                                         echo 'invalid';
//                              }else if ($status != 'Written IR' && $audit_findings == 'Using of prohibited tool on prohibited act') {
//                                         echo 'invalid';
//                              }else{
//                                      $history = "INSERT INTO ialert_history (audit_id,batch,date_audited,full_name,employee_id,provider,groups,carmaker,carmodel,line_no,process,audit_findings,audited_by,audit_category,remarks,pd,agency,hr,updated_by,edit_count,position,date_edited,indicator_id) SELECT id, batch, date_audited, full_name, employee_num, provider, groups, car_maker, car_model, line_no, process, audit_findings, audited_by, audited_categ, remarks, pd, agency, hr, updated_by, edit_count, position, '$server_date_time',id FROM ialert_audit WHERE id = '$x'";
//                                        $stmt3 = $conn->prepare($history);
//                                        if ($stmt3->execute()) {
//                                             $update = "UPDATE ialert_audit SET agency = '$status', edit_count = edit_count - 1 WHERE id = '$x'";
//                                                 if ($stmt4->execute()) {
//                                                     echo 'success';

    //                                                 }else{
//                                                     echo 'error';
//                                                 }
//                                        }else{
//                                             echo 'error';
//                                        }
//                              }


    //                         }



    //         }

    //     }


    // }
// }
}



if ($method == 'close') {
    $id = [];
    $id = $_POST['id'];
    //COUNT OF ITEM TO BE UPDATED
    $count = count($id);
    foreach ($id as $x) {
        $history = "INSERT INTO ialert_history (audit_id,batch,date_audited,full_name,employee_id,provider,groups,carmaker,carmodel,line_no,process,audit_findings,audited_by,audit_category,remarks,pd,agency,hr,updated_by,edit_count,position,date_edited) SELECT id, batch, date_audited, full_name, employee_num, provider, groups, car_maker, car_model, line_no, process, audit_findings, audited_by, audited_categ, remarks, pd, agency, hr, updated_by, edit_count, position, '$server_date_time' FROM ialert_audit WHERE id = '$x'";
        $stmt2 = $conn->prepare($history);
        if ($stmt2->execute()) {
            $update = "UPDATE ialert_audit SET edit_count = 0 WHERE id = '$x'";
            $stmt = $conn->prepare($update);
            if ($stmt->execute()) {
                // echo 'approved';
                $count = $count - 1;
            } else {
                // echo 'error';
            }
        }


    }
    if ($count == 0) {
        echo 'success';
    } else {
        echo 'fail';
    }
}

if ($method == 'fetch_closed_provider') {
    $empid = $_POST['empid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $esection = $_POST['esection'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    $audit_categ = $_POST['audit_categ'];
    $audit_type = $_POST['audit_type'];
    $group = $_POST['group'];
    $shift = $_POST['shift'];
    $c = 0;

    $query = "SELECT * FROM ialert_audit
    WHERE  employee_num LIKE '$empid%' AND full_name LIKE '$fname%' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')  AND provider = '$esection' AND edit_count = '0' AND line_no LIKE '$lname%' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%' AND audited_categ LIKE '$audit_categ%' AND audit_type LIKE '$audit_type%' AND groups LIKE '$group%' AND shift LIKE '$shift%'
     GROUP BY id ORDER BY date_audited ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $x) {
            $c++;


            echo '<tr>';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $x['date_audited'] . '</td>';
            echo '<td>' . $x['full_name'] . '</td>';
            echo '<td>' . $x['employee_num'] . '</td>';
            echo '<td>' . $x['position'] . '</td>';
            echo '<td>' . $x['shift'] . '</td>';
            echo '<td>' . $x['provider'] . '</td>';
            echo '<td>' . $x['groups'] . '</td>';
            echo '<td>' . $x['car_maker'] . '</td>';
            echo '<td>' . $x['car_model'] . '</td>';
            echo '<td>' . $x['section'] . '</td>';
            echo '<td>' . $x['line_no'] . '</td>';
            echo '<td>' . $x['process'] . '</td>';
            echo '<td>' . $x['audit_findings'] . '</td>';
            echo '<td>' . $x['audit_type'] . '</td>';
            echo '<td>' . $x['audited_by'] . '</td>';
            echo '<td>' . $x['audited_categ'] . '</td>';
            echo '<td>' . $x['agency'] . '</td>';
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