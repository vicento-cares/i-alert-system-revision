<?php
// error_reporting(0);
require '../conn.php';

function get_lines($conn)
{
    $data = array();

    $sql = "SELECT DISTINCT line_no FROM ialert_lines ORDER BY line_no ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['line_no']);
    }

    return $data;
}

function get_processes($conn)
{
    $data = array();

    $sql = "SELECT process FROM ialert_process ORDER BY process ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['process']);
    }

    return $data;
}

function get_sections($conn)
{
    $data = array();

    $sql = "SELECT DISTINCT section FROM ialert_section ORDER BY section ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['section']);
    }

    return $data;
}

function get_falp_groups($conn)
{
    $data = array();

    $sql = "SELECT DISTINCT falp_group FROM ialert_section ORDER BY falp_group ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['falp_group']);
    }

    return $data;
}

function get_audit_findings_categ($conn)
{
    $data = array();

    $sql = "SELECT audit_findings FROM ialert_audit_findings_categ ORDER BY audit_findings ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        array_push($data, $row['audit_findings']);
    }

    return $data;
}

// Remove UTF-8 BOM
function removeBomUtf8($s)
{
    if (substr($s, 0, 3) == chr(hexdec('EF')) . chr(hexdec('BB')) . chr(hexdec('BF'))) {
        return substr($s, 3);
    } else {
        return $s;
    }
}

function check_csv($file, $conn)
{

    //READ FILE
    $csv_file = fopen($file, 'r');

    // SKIP FIRST LINE
    $first_line = fgets($csv_file);

    // Remove UTF-8 BOM from First Line
    $first_line = removeBomUtf8($first_line);

    $shift_arr = array("ds", "ns");
    $shift_group_arr = array("a", "b");
    $carmaker_arr = array("Suzuki", "Toyota", "Mazda", "Daihatsu", "Marelli", "Subaru", "Honda", "Yamaha");
    $lines_arr = get_lines($conn);
    $processes_arr = get_processes($conn);
    $problem_identification_arr = array(
        "Process Design Problem", 
        "Discipline/Behaviour", 
        "Parts Problem", 
        "Education Problem", 
        "Management Problem", 
        "Machine/Jigs/Accessories Problem", 
        "Method Problem"
    );
    $criticality_level_arr = array("High Impact", "Medium Impact", "Low Impact");
    $audit_type_arr = array("initial", "final", "Line Audit");
    $sections_arr = get_sections($conn);
    $falp_groups_arr = get_falp_groups($conn);
    $audit_findings_categ_arr = get_audit_findings_categ($conn);

    $hasError = 0;
    $hasBlankError = 0;
    $isDuplicateOnCsv = 0;
    $hasBlankErrorArr = array();
    $isDuplicateOnCsvArr = array();
    $dup_temp_arr = array();

    $row_valid_arr = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

    $notExistsShiftArr = array();
    $notExistsShiftGroupArr = array();
    $notExistsCarMakerArr = array();
    $notExistsLineNoArr = array();
    $notExistsProcessArr = array();
    $notExistsProblemIdentificationArr = array();
    $notExistsAuditCategoryArr = array();
    $notExistsAuditTypeArr = array();
    $notExistsSectionArr = array();
    $notExistsFalpGroupArr = array();
    $notExistsAuditFindingsCategArr = array();

    $message = "";
    $check_csv_row = 0;

    $first_line = preg_replace('/[\t\n\r]+/', '', $first_line);
    $valid_first_line1 = '"Date Audited",Shift,"Shift Group","Car Maker","Car Model","Line No",Process,"Audit Findings","Audit Details","Audited By","Problem Identification","Criticality Level","Audit Type",Remarks,Section,Group';
    $valid_first_line2 = "Date Audited,Shift,Shift Group,Car Maker,Car Model,Line No,Process,Audit Findings,Audit Details,Audited By,Problem Identification,Criticality Level,Audit Type,Remarks,Section,Group";
    if ($first_line == $valid_first_line1 || $first_line == $valid_first_line2) {
        while (($line = fgetcsv($csv_file)) !== false) {
            // Check if the row is blank or consists only of whitespace
            if (empty(implode('', $line))) {
                $check_csv_row++;
                continue; // Skip blank lines
            }

            $check_csv_row++;

            $date_audited = $line[0];
            $shift = strtolower($line[1]);
            $group = strtolower($line[2]);
            $carmaker = $line[3];
            $carmodel = $line[4];
            $line_n = $line[5];
            $emprocess = $line[6];
            $audit_findings = $line[7];
            $audit_details = $line[8];
            $audited_by = $line[9];
            $problem_identification = $line[10];
            $criticality_level = strtolower($line[11]);
            $audit_type = $line[12];
            $remark = $line[13];
            $section = $line[14];
            $falp_group = $line[15];

            // CHECK IF BLANK DATA
            if (
                $date_audited == '' || $shift == '' || $group == '' || $carmaker == ''
                || $carmodel == '' || $line_n == '' || $emprocess == '' || $audit_findings == ''
                || $audited_by == '' || $problem_identification == '' || $criticality_level == '' || $audit_type == '' || $remark == ''
                || $section == '' || $falp_group == ''
            ) {
                // IF BLANK DETECTED ERROR += 1
                $hasBlankError++;
                $hasError = 1;
                array_push($hasBlankErrorArr, $check_csv_row);
            }

            // CHECK ROW VALIDATION
            if (!in_array($shift, $shift_arr)) {
                $hasError = 1;
                $row_valid_arr[0] = 1;
                array_push($notExistsShiftArr, $check_csv_row);
            }
            if (!in_array($group, $shift_group_arr)) {
                $hasError = 1;
                $row_valid_arr[1] = 1;
                array_push($notExistsShiftGroupArr, $check_csv_row);
            }
            if (!in_array($carmaker, $carmaker_arr)) {
                $hasError = 1;
                $row_valid_arr[2] = 1;
                array_push($notExistsCarMakerArr, $check_csv_row);
            }
            if (!in_array($line_n, $lines_arr)) {
                $hasError = 1;
                $row_valid_arr[3] = 1;
                array_push($notExistsLineNoArr, $check_csv_row);
            }
            if (!in_array($emprocess, $processes_arr)) {
                $hasError = 1;
                $row_valid_arr[4] = 1;
                array_push($notExistsProcessArr, $check_csv_row);
            }
            if (!in_array($problem_identification, $problem_identification_arr)) {
                $hasError = 1;
                $row_valid_arr[5] = 1;
                array_push($notExistsProblemIdentificationArr, $check_csv_row);
            }
            if (!in_array($criticality_level, $criticality_level_arr)) {
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
            if (!in_array($audit_findings, $audit_findings_categ_arr)) {
                $hasError = 1;
                $row_valid_arr[10] = 1;
                array_push($notExistsAuditFindingsCategArr, $check_csv_row);
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
            $message = $message . 'Shift doesn\'t exists on row/s ' . implode(", ", $notExistsShiftArr) . '. ';
        }
        if ($row_valid_arr[1] == 1) {
            $message = $message . 'Shift Group doesn\'t exists on row/s ' . implode(", ", $notExistsShiftGroupArr) . '. ';
        }
        if ($row_valid_arr[2] == 1) {
            $message = $message . 'Car Maker doesn\'t exists on row/s ' . implode(", ", $notExistsCarMakerArr) . '. ';
        }
        if ($row_valid_arr[3] == 1) {
            $message = $message . 'Line No. doesn\'t exists on row/s ' . implode(", ", $notExistsLineNoArr) . '. ';
        }
        if ($row_valid_arr[4] == 1) {
            $message = $message . 'Process doesn\'t exists on row/s ' . implode(", ", $notExistsProcessArr) . '. ';
        }
        if ($row_valid_arr[5] == 1) {
            $message = $message . 'Problem Identification doesn\'t exists on row/s ' . implode(", ", $notExistsProblemIdentificationArr) . '. ';
        }
        if ($row_valid_arr[6] == 1) {
            $message = $message . 'Criticality Level doesn\'t exists on row/s ' . implode(", ", $notExistsAuditCategoryArr) . '. ';
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
        if ($row_valid_arr[10] == 1) {
            $message = $message . 'Audit Findings doesn\'t exists on row/s ' . implode(", ", $notExistsAuditFindingsCategArr) . '. ';
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

                $isTransactionActive = false;
                $chunkSize = 250; // Set your desired chunk size

                try {
                    if (!$isTransactionActive) {
                        $conn->beginTransaction();
                        $isTransactionActive = true;
                    }

                    $sql_insert = "INSERT INTO ialert_line_audit 
                                    (batch, date_audited, shift, groups, car_maker, car_model, line_no, process, 
                                    audit_findings, audit_details, audited_by, 
                                    problem_identification, criticality_level, audit_type, remarks, date_created, 
                                    section_code, section, falp_group, dept) VALUES ";
                    $values = [];
                    $placeholders = [];

                    while (($line = fgetcsv($csvFile)) !== false) {
                        // Check if the row is blank or consists only of whitespace
                        if (empty(implode('', $line))) {
                            continue; // Skip blank lines
                        }
    
                        // $batch = $line[0];
                        $date_audited = $line[0];
                        $shift = strtolower($line[1]);
                        $group = strtolower($line[2]);
                        $carmaker = $line[3];
                        $carmodel = $line[4];
                        $line_n = $line[5];
                        $emprocess = $line[6];
                        $audit_findings = $line[7];
                        $audit_details = $line[8];
                        $audited_by = $line[9];
                        $problem_identification = $line[10];
                        $criticality_level = strtolower($line[11]);
                        $audit_type = $line[12];
                        $remark = $line[13];
                        $section = $line[14];
                        $falp_group = $line[15];
    
                        $dates = new DateTime($date_audited);
                        $date_auditeds = date_format($dates, "Y-m-d");
    
                        $dept = "";
                        $section_code = "";
    
                        $sql = "SELECT dept, section_code FROM ialert_section WHERE falp_group = ? AND section = ?";
                        $stmt = $conn->prepare($sql);
                        $params = array($falp_group, $section);
                        $stmt->execute($params);
    
                        $row = $stmt -> fetch(PDO::FETCH_ASSOC);
    
                        if ($row) {
                            $dept = $row['dept'];
                            $section_code = $row['section_code'];
                        }

                        // Create a temporary array for the current row
                        $currentValues = [
                            $lc,
                            $date_auditeds,
                            $shift,
                            $group,
                            $carmaker,
                            $carmodel,
                            $line_n,
                            $emprocess,
                            $audit_findings,
                            $audit_details,
                            $audited_by,
                            $problem_identification,
                            $criticality_level,
                            $audit_type,
                            $remark,
                            $server_date_only,
                            $section_code,
                            $section,
                            $falp_group,
                            $dept
                        ];

                        // Create placeholders for each row
                        $generated_placeholders = implode(',', array_fill(0, count($currentValues), '?'));
                        $placeholders[] = "($generated_placeholders)";

                        // Add current values to the main values array
                        $values = array_merge($values, $currentValues);

                        // Check if we reached the chunk size
                        if (count($placeholders) === $chunkSize) {
                            // Combine the SQL statement with the placeholders
                            $sql_insert .= implode(', ', $placeholders);
                            
                            // Prepare the statement
                            $stmt = $conn->prepare($sql_insert);
                            
                            // Execute the statement with the values
                            if (!$stmt->execute($values)) {
                                $error++;
                            }

                            // Reset for the next chunk
                            $placeholders = [];
                            $values = [];
                            $sql_insert = "INSERT INTO ialert_line_audit 
                                            (batch, date_audited, shift, groups, car_maker, car_model, line_no, process, 
                                            audit_findings, audit_details, audited_by, 
                                            problem_identification, criticality_level, audit_type, remarks, date_created, 
                                            section_code, section, falp_group, dept) VALUES ";
                        }
                    }

                    // Insert any remaining rows that didn't fill a complete chunk
                    if (!empty($placeholders)) {
                        $sql_insert .= implode(', ', $placeholders);
                        $stmt = $conn->prepare($sql_insert);
                        if (!$stmt->execute($values)) {
                            $error++;
                        }
                    }
    
                    if ($error > 0) {
                        if ($isTransactionActive) {
                            $conn->rollBack();
                            $isTransactionActive = false;
                        }
                        echo '<script>
                                var x = confirm("WITH ERROR! # OF ERRORS ' . $error . ' ");
                                if(x == true){
                                    location.replace("../../page/admin/add_line_audit.php");
                                }else{
                                    location.replace("../../page/admin/add_line_audit.php");
                                }
                            </script>';
                        exit();
                    }

                    $conn->commit();
                    $isTransactionActive = false;
                } catch (Exception $e) {
                    if ($isTransactionActive) {
                        $conn->rollBack();
                        $isTransactionActive = false;
                    }
                    echo '<script>
                                var x = confirm("Failed. Please Try Again or Call IT Personnel Immediately!: ' . $e->getMessage() . ' ");
                                if(x == true){
                                    location.replace("../../page/admin/add_line_audit.php");
                                }else{
                                    location.replace("../../page/admin/add_line_audit.php");
                                }
                            </script>';
                    exit();
                }

                fclose($csvFile);

                echo '<script>
                            var x = confirm("SUCCESS! # OF ERRORS ' . $error . ' ");
                            if(x == true){
                                location.replace("../../page/admin/add_line_audit.php");
                            }else{
                                location.replace("../../page/admin/add_line_audit.php");
                            }
                        </script>';
            } else {
                echo '<script>
                    var x = confirm("WITH ERROR! ' . $chkCsvMsg . ' ");
                    if(x == true){
                        location.replace("../../page/admin/add_line_audit.php");
                    }else{
                        location.replace("../../page/admin/add_line_audit.php");
                    }
                </script>';
            }
        }
    } else {
        echo '<script>
                var x = confirm("CSV FILE NOT UPLOADED! ");
                if(x == true){
                    location.replace("../../page/admin/add_line_audit.php");
                }else{
                    location.replace("../../page/admin/add_line_audit.php");
                }
            </script>';
    }
} else {
    echo '<script>
            var x = confirm("INVALID FILE FORMAT! ");
            if(x == true){
                location.replace("../../page/admin/add_line_audit.php");
            }else{
                location.replace("../../page/admin/add_line_audit.php");
            }
        </script>';
}

// KILL CONNECTION
$conn = null;