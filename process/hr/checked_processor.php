<?php 
    include '../conn.php';
    include '../conn2.php';
    $method = $_POST['method'];

if ($method == 'fetch_audited_list_hr_checked') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $empid =$_POST['empid'];
    $fname =$_POST['fname'];
    $esection = $_POST['esection'];
    $lname = $_POST['lname'];
    $carmaker = $_POST['carmaker'];
    $carmodel = $_POST['carmodel'];
    $position = $_POST['position'];
    $audit_type = $_POST['audit_type'];
    $c = 0;

    $query = "SELECT * FROM ialert_audit
    WHERE  employee_num LIKE '$empid%' AND full_name LIKE '$fname%' AND line_no LIKE '$lname%' AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')  AND provider = 'FAS'  AND pd = 'IR' AND hr != '' AND car_maker LIKE '$carmaker%' AND car_model LIKE '$carmodel%' AND position LIKE '$position%' AND audit_type LIKE '$audit_type%' AND date_recieved != ''
    GROUP BY id ORDER BY date_audited ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach($stmt->fetchALL() as $x){
        $c++;   
                echo '<tr">';
                    echo '<td>';
                    echo '<p>
                        <label>
                            <input type="checkbox" name="" id="" class="singleCheck" value="'.$x['id'].'">
                            <span></span>
                        </label>
                        </p>';
                    echo '</td>';
                    echo '<td>'.$c.'</td>';
                    echo '<td style="display: none;">'.$x['batch'].'</td>';
                    echo '<td>'.$x['date_audited'].'</td>';
                    echo '<td>'.$x['full_name'].'</td>';
                    echo '<td>'.$x['employee_num'].'</td>';
                    echo '<td>'.$x['provider'].'</td>';
                    echo '<td>'.$x['groups'].'</td>';
                    echo '<td>'.$x['car_maker'].'</td>';
                    echo '<td>'.$x['car_model'].'</td>';
                    echo '<td>'.$x['line_no'].'</td>';
                    echo '<td>'.$x['process'].'</td>';
                    echo '<td>'.$x['audit_findings'].'</td>';
                    echo '<td>'.$x['audited_by'].'</td>';
                    echo '<td>'.$x['audited_categ'].'</td>';
                    echo '<td>'.$x['remarks'].'</td>';
                    echo '<td>'.$x['pd'].'</td>';
                    echo '<td>'.$x['hr'].'</td>';  
                    echo '<td>'.$x['date_recieved'].'</td>';  
                echo '</tr>';
          
    }
}else{
                echo '<tr>';
                    echo '<td colspan="14" style="text-align:center;">NO RESULT</td>';
                echo '</tr>';
            }
}

if ($method == 'update_hr_checked') {
    $id = [];
    $id = $_POST['id'];
    $status = $_POST['status'];
    //COUNT OF ITEM TO BE UPDATED
    $count = count($id);
    foreach($id as $x){

        if ($status == 'undo') {
            $update_undo = "UPDATE ialert_audit SET hr = NULL, date_recieved = NULL WHERE id = '$x'";
            $stmt2 = $conn->prepare($update_undo);
            if ($stmt2->execute()) {
               // echo 'approved';
            $count = $count - 1;
        }else{
            // echo 'error';
        }
        }else{
             $update = "UPDATE ialert_audit SET hr = '$status' WHERE id = '$x'";
        $stmt = $conn->prepare($update);
        if ($stmt->execute()) {
            // echo 'approved';
            $count = $count - 1;
        }else{
            // echo 'error';
        }
        }   
    }
        if($count == 0){
            echo 'success';
        }else{
            echo 'fail';
        }
}   
$conn = NULL;
?>