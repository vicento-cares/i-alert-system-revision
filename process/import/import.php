<?php
// error_reporting(0);
require '../conn.php';

function get_lines($conn) {
    $data = array();

    $sql = "SELECT DISTINCT line_no FROM ialert_lines ORDER BY line_no ASC";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['line_no']);
    }

    return $data;
}

function get_providers($conn) {
    $data = array();

    $sql = "SELECT DISTINCT esection FROM ialert_account WHERE role = 'provider' OR role ='fas'";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['esection']);
    }

    return $data;
}

function get_processes($conn) {
    $data = array();

    $sql = "SELECT process FROM ialert_process ORDER BY process ASC";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['process']);
    }

    return $data;
}

function get_sections($conn) {
    $data = array();

    $sql = "SELECT DISTINCT section FROM ialert_section ORDER BY section ASC";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['section']);
    }

    return $data;
}

function get_falp_groups($conn) {
    $data = array();

    $sql = "SELECT DISTINCT falp_group FROM ialert_section ORDER BY falp_group ASC";
    $stmt = $conn -> prepare($sql);
    $stmt -> execute();
    while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['falp_group']);
    }

    return $data;
}

// Remove UTF-8 BOM
function removeBomUtf8($s){
    if (substr($s,0,3) == chr(hexdec('EF')).chr(hexdec('BB')).chr(hexdec('BF'))) {
        return substr($s,3);
    } else {
        return $s;
    }
}

function check_csv($file, $conn) {

    //READ FILE
    $csv_file = fopen($file,'r');

    // SKIP FIRST LINE
    $first_line = fgets($csv_file);

    // Remove UTF-8 BOM from First Line
    $first_line = removeBomUtf8($first_line);

    $providers_arr = get_providers($conn);
    $shift_arr = array("ds", "ns");
    $shift_group_arr = array("a", "b");
    $carmaker_arr = array("Suzuki", "Toyota", "Mazda", "Daihatsu", "Marelli", "Subaru", "Honda", "Yamaha");
    $lines_arr = get_lines($conn);
    $processes_arr = get_processes($conn);
    $audit_category_arr = array("major", "minor");
    $audit_type_arr = array("initial", "final", "Line Audit");
    $sections_arr = get_sections($conn);
    $falp_groups_arr = get_falp_groups($conn);

    $hasError = 0; $hasBlankError = 0; $isDuplicateOnCsv = 0;
    $hasBlankErrorArr = array();
    $isDuplicateOnCsvArr = array();
    $dup_temp_arr = array();

    $row_valid_arr = array(0,0,0,0,0,0,0,0,0,0);

    $notExistsProviderArr = array();
    $notExistsShiftArr = array();
    $notExistsShiftGroupArr = array();
    $notExistsCarMakerArr = array();
    $notExistsLineNoArr = array();
    $notExistsProcessArr = array();
    $notExistsAuditCategoryArr = array();
    $notExistsAuditTypeArr = array();
    $notExistsSectionArr = array();
    $notExistsFalpGroupArr = array();

    $message = "";
    $check_csv_row = 0;

    $first_line = preg_replace('/[\t\n\r]+/', '', $first_line);
    $valid_first_line1 = '"Date Audited","Full Name","Employee ID",Provider,Position,Shift,"Shift Group","Car Maker","Car Model","Line No.",Process,"Audit Findings","Audited By","Audit Category","Audit Type",Remarks,Section,Group';
    $valid_first_line2 = "Date Audited,Full Name,Employee ID,Provider,Position,Shift,Shift Group,Car Maker,Car Model,Line No.,Process,Audit Findings,Audited By,Audit Category,Audit Type,Remarks,Section,Group";
    if ($first_line == $valid_first_line1 || $first_line == $valid_first_line2) {
        while (($line = fgetcsv($csv_file)) !== false) {
            // Check if the row is blank or consists only of whitespace
            if (empty(implode('', $line))) {
                $check_csv_row++;
                continue; // Skip blank lines
            }

            $check_csv_row++;

            $date_audited = $line[0];
            $full_name = $line[1];
            $employee_num = $line[2];
            $provider = $line[3];
            $position = $line[4];
            $shift = strtolower($line[5]);
            $group = strtolower($line[6]);
            $carmaker = $line[7];
            $carmodel = $line[8];
            $line_n = $line[9];
            $emprocess = $line[10];
            $audit_findings = $line[11];
            $audited_by = $line[12];
            $audited_categ = strtolower($line[13]);
            $audit_type = strtolower($line[14]);
            $remark = $line[15];
            $section = $line[16];
            $falp_group = $line[17];
            
            // CHECK IF BLANK DATA
            if ($date_audited == '' || $full_name == '' || $employee_num == '' || $provider == '' 
                || $position == '' || $shift == '' || $group == '' || $carmaker == '' || $carmodel == '' 
                || $line_n == '' || $emprocess == '' || $audit_findings == '' || $audited_by == '' || $audited_categ == '' 
                || $audit_type == '' || $remark == '' || $section == '' || $falp_group == '') {
                // IF BLANK DETECTED ERROR += 1
                $hasBlankError++;
                $hasError = 1;
                array_push($hasBlankErrorArr, $check_csv_row);
            }

            // CHECK ROW VALIDATION
            if (!in_array($provider, $providers_arr)) {
                $hasError = 1;
                $row_valid_arr[0] = 1;
                array_push($notExistsProviderArr, $check_csv_row);
            }
            if (!in_array($shift, $shift_arr)) {
                $hasError = 1;
                $row_valid_arr[1] = 1;
                array_push($notExistsShiftArr, $check_csv_row);
            }
            if (!in_array($group, $shift_group_arr)) {
                $hasError = 1;
                $row_valid_arr[2] = 1;
                array_push($notExistsShiftGroupArr, $check_csv_row);
            }
            if (!in_array($carmaker, $carmaker_arr)) {
                $hasError = 1;
                $row_valid_arr[3] = 1;
                array_push($notExistsCarMakerArr, $check_csv_row);
            }
            if (!in_array($line_n, $lines_arr)) {
                $hasError = 1;
                $row_valid_arr[4] = 1;
                array_push($notExistsLineNoArr, $check_csv_row);
            }
            if (!in_array($emprocess, $processes_arr)) {
                $hasError = 1;
                $row_valid_arr[5] = 1;
                array_push($notExistsProcessArr, $check_csv_row);
            }
            if (!in_array($audited_categ, $audit_category_arr)) {
                $hasError = 1;
                $row_valid_arr[6] = 1;
                array_push($notExistsAuditCategoryArr, $check_csv_row);
            }
            if (!in_array($audit_type, $audit_type_arr)) {
                $hasError = 1;
                $row_valid_arr[7] = 1;
                array_push($notExistsAuditTypeArr, $check_csv_row);
            }
            if (!in_array($section, $sections_arr)) {
                $hasError = 1;
                $row_valid_arr[8] = 1;
                array_push($notExistsSectionArr, $check_csv_row);
            }
            if (!in_array($falp_group, $falp_groups_arr)) {
                $hasError = 1;
                $row_valid_arr[9] = 1;
                array_push($notExistsFalpGroupArr, $check_csv_row);
            }

            // Joining all row values for checking duplicated rows
            $whole_line = join(',', $line);

            // CHECK ROWS IF IT HAS DUPLICATE ON CSV
            if (isset($dup_temp_arr[$whole_line])) {
                $isDuplicateOnCsv = 1;
                $hasError = 1;
                array_push($isDuplicateOnCsvArr, $check_csv_row);
            } else {
                $dup_temp_arr[$whole_line] = 1;
            }
        }
    } else {
        $message = $message . 'Invalid CSV Table Header. Maybe an incorrect CSV file or incorrect CSV header ';
    }
    
    fclose($csv_file);

    if ($hasError == 1) {
        if ($row_valid_arr[0] == 1) {
            $message = $message . 'Provider doesn\'t exists on row/s ' . implode(", ", $notExistsProviderArr) . '. ';
        }
        if ($row_valid_arr[1] == 1) {
            $message = $message . 'Shift doesn\'t exists on row/s ' . implode(", ", $notExistsShiftArr) . '. ';
        }
        if ($row_valid_arr[2] == 1) {
            $message = $message . 'Shift Group doesn\'t exists on row/s ' . implode(", ", $notExistsShiftGroupArr) . '. ';
        }
        if ($row_valid_arr[3] == 1) {
            $message = $message . 'Car Maker doesn\'t exists on row/s ' . implode(", ", $notExistsCarMakerArr) . '. ';
        }
        if ($row_valid_arr[4] == 1) {
            $message = $message . 'Line No. doesn\'t exists on row/s ' . implode(", ", $notExistsLineNoArr) . '. ';
        }
        if ($row_valid_arr[5] == 1) {
            $message = $message . 'Process doesn\'t exists on row/s ' . implode(", ", $notExistsProcessArr) . '. ';
        }
        if ($row_valid_arr[6] == 1) {
            $message = $message . 'Audit Category doesn\'t exists on row/s ' . implode(", ", $notExistsAuditCategoryArr) . '. ';
        }
        if ($row_valid_arr[7] == 1) {
            $message = $message . 'Audit Type doesn\'t exists on row/s ' . implode(", ", $notExistsAuditTypeArr) . '. ';
        }
        if ($row_valid_arr[8] == 1) {
            $message = $message . 'Section doesn\'t exists on row/s ' . implode(", ", $notExistsSectionArr) . '. ';
        }
        if ($row_valid_arr[9] == 1) {
            $message = $message . 'Group doesn\'t exists on row/s ' . implode(", ", $notExistsFalpGroupArr) . '. ';
        }
        
        if ($hasBlankError >= 1) {
            $message = $message . 'Blank Cell/s Exists on row/s ' . implode(", ", $hasBlankErrorArr) . '. ';
        }
        if ($isDuplicateOnCsv == 1) {
            $message = $message . 'Duplicated Record/s on row/s ' . implode(", ", $isDuplicateOnCsvArr) . '. ';
        }
    }
    return $message;
}

if (isset($_POST['upload'])) {
    $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');

    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $csvMimes)) {
        
        if (is_uploaded_file($_FILES['file']['tmp_name'])) {

            $chkCsvMsg = check_csv($_FILES['file']['tmp_name'], $conn);

            if ($chkCsvMsg == '') {
                //READ FILE
                $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
                // SKIP FIRST LINE
                fgetcsv($csvFile);
                // PARSE
                $error = 0;
                while (($line = fgetcsv($csvFile)) !== false) {

                    $date_audited = $line[0];
                    $full_name = $line[1];
                    $employee_num = $line[2];
                    $provider = $line[3];
                    $position = $line[4];
                    $shift = strtolower($line[5]);
                    $group = strtolower($line[6]);
                    $carmaker = $line[7];
                    $carmodel = $line[8];
                    $line_n = $line[9];
                    $emprocess = $line[10];
                    $audit_findings = $line[11];
                    $audited_by = $line[12];
                    $audited_categ = strtolower($line[13]);
                    $audit_type = strtolower($line[14]);
                    $remark = $line[15];
                    $section = $line[16];
                    $falp_group = $line[17];

                    $dates = new DateTime($date_audited);
                    $date_auditeds = date_format($dates, "Y-m-d");

                    $insert = "INSERT INTO ialert_audit (`batch`,`date_audited`,`full_name`,`employee_num`,`provider`,`position`,`shift`,`groups`,`car_maker`,`car_model`,`line_no`,`process`,`audit_findings`,`audited_by`,`audited_categ`,`audit_type`,`remarks`,`date_created`,`section`,`falp_group`) 
                                VALUES ('$ac','$date_auditeds','$full_name','$employee_num','$provider','$position','$shift','$group','$carmaker','$carmodel','$line_n','$emprocess','$audit_findings','$audited_by','$audited_categ','$audit_type','$remark','$server_date_time','$section','$falp_group')";
                    $stmt = $conn->prepare($insert);
                    if ($stmt->execute()) {
                        $error = 0;
                    } else {
                        $error = $error + 1;
                    }
                }

                fclose($csvFile);

                if ($error == 0) {
                    echo '<script>
                            var x = confirm("SUCCESS! # OF ERRORS ' . $error . ' ");
                            if(x == true){
                                location.replace("../../page/admin/add_audit.php");
                            }else{
                                location.replace("../../page/admin/add_audit.php");
                            }
                        </script>';
                } else {
                    echo '<script>
                            var x = confirm("WITH ERROR! # OF ERRORS ' . $error . ' ");
                            if(x == true){
                                location.replace("../../page/admin/add_audit.php");
                            }else{
                                location.replace("../../page/admin/add_audit.php");
                            }
                        </script>';
                }
            } else {
                echo '<script>
                    var x = confirm("WITH ERROR! ' . $chkCsvMsg . ' ");
                    if(x == true){
                        location.replace("../../page/admin/add_audit.php");
                    }else{
                        location.replace("../../page/admin/add_audit.php");
                    }
                </script>';
            }
        }
    } else {
        echo '<script>
                var x = confirm("CSV FILE NOT UPLOADED! ");
                if(x == true){
                    location.replace("../../page/admin/add_audit.php");
                }else{
                    location.replace("../../page/admin/add_audit.php");
                }
            </script>';
    }
} else {
    echo '<script>
            var x = confirm("INVALID FILE FORMAT! ");
            if(x == true){
                location.replace("../../page/admin/add_audit.php");
            }else{
                location.replace("../../page/admin/add_audit.php");
            }
        </script>';
}


// KILL CONNECTION
$conn = null;
?>