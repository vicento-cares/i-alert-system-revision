<?php
require '../conn.php';

$method = $_POST['method'];

if ($method == 'load_default_pending_count') {
    $sections_count_list = []; // Initialize the data array
    $combinedData = []; // Initialize the combined data array
    
    $section = "";
    $falp_group = "";
    $total = 0;
    $grand_total = 0;

    $falp_groups1 = [
        'FAP1',
        'FAP2',
        'FAP3',
        'FAP4'
    ];

    $falp_groups2 = [
        'First Process',
        'Secondary 1 Process',
        'Secondary 2 Process'
    ];

    $sections = [
        'Section 1',
        'Section 2',
        'Section 3',
        'Section 4',
        'Section 5',
        'Section 6',
        'Section 7',
        'Section 9',
        'First Process',
        'Secondary 1 Process',
        'Secondary 2 Process',
    ];

    // Create placeholders for each row
    $generated_placeholders = implode(',', array_fill(0, count($sections), '?'));
    $placeholders = "($generated_placeholders)";

    $query = "SELECT DISTINCT section, falp_group 
                FROM ialert_section 
                WHERE section IN $placeholders 
                ORDER BY falp_group ASC, section ASC";
    $stmt = $conn->prepare($query);
    $stmt->execute($sections);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $section = $row['section'];
        $section_params = addslashes($section);
        $falp_group = $row['falp_group'];
    
        if (!in_array($falp_group, $falp_groups1) && !in_array($falp_group, $falp_groups2)) {
            $section = $falp_group;
        }
        
        array_push($sections_count_list, array('section' => $section, 'falp_group' => $falp_group));
    }

    array_push($sections_count_list, array('section' => 'Gemba Compliance', 'falp_group' => 'Gemba Compliance'));
    array_push($sections_count_list, array('section' => 'QA', 'falp_group' => 'QA'));
    array_push($sections_count_list, array('section' => 'Other Group', 'falp_group' => 'Other Group'));
    array_push($sections_count_list, array('section' => 'Provider', 'falp_group' => 'Provider'));

    foreach ($sections_count_list as &$section_count) {
        $section_id = str_replace(' ', '', $section_count['section']);
        $section_id = strtolower($section_id);
        echo '
            <div class="col-lg-3">
                <a href="" style="color:black;" data-toggle="modal" data-target="#pending_count_modal" 
                    data-section_id="' . $section_id . '"
                    data-section="' . $section_count['section'] . '"
                    data-falp_group="' . $section_count['falp_group'] . '"
                    onclick="load_pending_count_modal(this)">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text"><b>' . $section_count['section'] . '</b></span>
                            <span class="info-box-number">
                                <label style="color:red;">Pending: <label style="font-size:150%;" id="count_'. $section_id .'"></label></label> / 
                                <label for="">Total: <label style="font-size:150%;" id="grand_total_'. $section_id .'"></label></label>
                            </span>
                        </div>
                    </div>
                </a>
            </div>';

        // echo '<tr>';
        // echo '<td ><h3 style="color:red;"><b>' . $a['totals'] . '</b></h3></td>';
        // echo '</tr>';

        // echo '<tr>';
        // echo '<td><h3><b>' . $x['grand_total'] . '</b></h3></td>';
        // echo '</tr>';
    }
}

if ($method == 'fetch_pending_count') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $empid = addslashes($_POST['empid']);
    $fname = addslashes($_POST['fname']);
    $line = addslashes($_POST['line']);
    $carmaker = addslashes($_POST['carmaker']);
    $carmodel = addslashes($_POST['carmodel']);
    $position = addslashes($_POST['position']);
    $audit_type = addslashes($_POST['audit_type']);

    $section = $_POST['section'];
    $section_params = addslashes($section);
    $falp_group = $_POST['falp_group'];
    $falp_group_params = addslashes($falp_group);
    $provider = $_POST['provider'];
    $provider_params = addslashes($provider);

    $falp_groups1 = [
        'FAP1',
        'FAP2',
        'FAP3',
        'FAP4'
    ];

    $falp_groups2 = [
        'First Process',
        'Secondary 1 Process',
        'Secondary 2 Process'
    ];

    $c = 0;

    $query = "SELECT * FROM ialert_audit WHERE 1=1";

    if (in_array($falp_group, $falp_groups1)) {
        // FAP Sections
        $query .= " AND section = '$section_params' AND provider = 'fas'";
    } else if (in_array($falp_group, $falp_groups2)) {
        // FSP
        $query .= " AND falp_group = $falp_group_params' AND section = '$section_params' AND provider = 'fas'";
    } else if ($falp_group == 'QA') {
        // QA
        $query .= " AND falp_group = $falp_group_params' AND section = '$section_params' AND provider = 'fas'";
    } else if ($provider != 'fas') {
        // Provider
        $query .= " AND provider = '$provider_params'";
    } else {
        // Other Groups
        $query .= " AND section = '$section_params' AND provider = 'fas'";
    }

    $query .= " AND edit_count != 0 AND date_recieved IS NULL AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')";

    if (!empty($empid)) {
        $query .= " AND employee_num LIKE '$empid%'";
    }
    if (!empty($fname)) {
        $query .= " AND full_name LIKE '$fname%'";
    }
    if (!empty($line)) {
        $query .= " AND line_no LIKE '$line%'";
    }
    if (!empty($carmaker)) {
        $query .= " AND car_maker LIKE '$carmaker%'";
    }
    if (!empty($carmodel)) {
        $query .= " AND car_model LIKE '$carmodel%'";
    }
    if (!empty($position)) {
        $query .= " AND position LIKE '$position%'";
    }
    if (!empty($audit_type)) {
        $query .= " AND audit_type LIKE '$audit_type%'";
    }

    $has_union_all = false;

    if (in_array($falp_group, $falp_groups1)) {
        // FAP Sections, Other Groups
        $query .= " UNION ALL 
                    SELECT * FROM ialert_audit 
                    WHERE section = '$section_params' AND provider = 'fas' AND pd = 'Written IR'";
        $query .= " AND edit_count = 0 AND date_recieved IS NULL AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')";
        $has_union_all = true;
    } else if (in_array($falp_group, $falp_groups2)) {
        // FSP
        $query .= " UNION ALL 
                    SELECT * FROM ialert_audit 
                    WHERE falp_group = $falp_group_params' AND section = '$section_params' AND provider = 'fas' AND pd = 'Written IR'";
        $query .= " AND edit_count = 0 AND date_recieved IS NULL AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')";
        $has_union_all = true;
    } else if ($provider == 'fas') {
        if ($falp_group == 'QA') {
            // QA
            $query .= " UNION ALL 
                    SELECT * FROM ialert_audit 
                    WHERE falp_group = $falp_group_params' AND section = '$section_params' AND provider = 'fas' AND pd = 'Written IR'";
            $query .= " AND edit_count = 0 AND date_recieved IS NULL AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')";
        } else {
            // Other Groups
            $query .= " UNION ALL 
                    SELECT * FROM ialert_audit 
                    WHERE section = '$section_params' AND provider = 'fas' AND pd = 'Written IR'";
            $query .= " AND edit_count = 0 AND date_recieved IS NULL AND (date_audited >='$dateFrom' AND date_audited <= '$dateTo')";
        }
        $has_union_all = true;
    }

    if ($has_union_all) {
        if (!empty($empid)) {
            $query .= " AND employee_num LIKE '$empid%'";
        }
        if (!empty($fname)) {
            $query .= " AND full_name LIKE '$fname%'";
        }
        if (!empty($line)) {
            $query .= " AND line_no LIKE '$line%'";
        }
        if (!empty($carmaker)) {
            $query .= " AND car_maker LIKE '$carmaker%'";
        }
        if (!empty($carmodel)) {
            $query .= " AND car_model LIKE '$carmodel%'";
        }
        if (!empty($position)) {
            $query .= " AND position LIKE '$position%'";
        }
        if (!empty($audit_type)) {
            $query .= " AND audit_type LIKE '$audit_type%'";
        }
    }
    
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $row) {
            $c++;

            echo '<tr>';
            echo '<td>';
            echo '<p>
                        <label for="row_' . $row['id'] . '">
                            <input type="checkbox" class="singleCheck" id="row_' . $row['id'] . '" value="' . $row['id'] . '">
                            <span></span>
                        </label>
                    </p>';
            echo '</td>';
            echo '<td>' . $c . '</td>';
            echo '<td style="display: none;">' . $row['batch'] . '</td>';
            echo '<td>' . $row['date_audited'] . '</td>';
            echo '<td style="cursor:pointer;" class="modal-trigger" 
                    data-toggle="modal" data-target="#update" 
                    onclick="get_set(&quot;' . 
                    $row['id'] . '~!~' . 
                    $row['employee_num'] . '~!~' . 
                    $row['full_name'] . '~!~' . 
                    $row['position'] . '~!~' . 
                    $row['provider'] . '~!~' . 
                    $row['shift'] . '~!~' . 
                    $row['groups'] . '~!~' . 
                    $row['audit_type'] . '~!~' . 
                    $row['criticality_level'] . '~!~' . 
                    $row['car_maker'] . '~!~' . 
                    $row['car_model'] . '~!~' . 
                    $row['line_no'] . '~!~' . 
                    $row['process'] . '~!~' . 
                    $row['audit_findings'] . '~!~' . 
                    $row['audit_details'] . '~!~' . 
                    $row['audited_by'] . '~!~' . 
                    $row['date_audited'] . '~!~' . 
                    $row['remarks'] . '&quot;)">' . $row['full_name'] . '</td>';
            echo '<td>' . $row['position'] . '</td>';
            echo '<td>' . $row['employee_num'] . '</td>';
            echo '<td>' . $row['provider'] . '</td>';
            echo '<td>' . $row['groups'] . '</td>';
            echo '<td>' . $row['car_maker'] . '</td>';
            echo '<td>' . $row['car_model'] . '</td>';
            echo '<td>' . $row['line_no'] . '</td>';
            echo '<td>' . $row['process'] . '</td>';
            echo '<td>' . $row['audit_findings'] . '</td>';
            echo '<td>' . $row['audit_details'] . '</td>';
            echo '<td>' . $row['audited_by'] . '</td>';
            echo '<td>' . $row['criticality_level'] . '</td>';
            echo '<td>' . $row['remarks'] . '</td>';
            echo '<td>' . $row['pd'] . '</td>';
            echo '<td>' . $row['agency'] . '</td>';
            echo '<td>' . $row['hr'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="14" style="text-align:center;">NO RESULT</td>';
        echo '</tr>';
    }
}

if ($method == 'delete_pending_count') {
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

if ($method == 'count_pending_count') {
    $dateFrom = $_POST['dateFrom'];
    $dateTo = $_POST['dateTo'];
    $audit_type = addslashes($_POST['audit_type']);
    $other_pending = "";
    $provider_pending = "";

    if (isset($_POST['other_pending'])) {
        $other_pending = addslashes($_POST['other_pending']);
    }

    if (isset($_POST['provider_pending'])) {
        $provider_pending = addslashes($_POST['provider_pending']);
    }

    $sections_count_list = []; // Initialize the data array
    $combinedData = []; // Initialize the combined data array

    $section = "";
    $falp_group = "";
    $total = 0;
    $grand_total = 0;

    $falp_groups1 = [
        'FAP1',
        'FAP2',
        'FAP3',
        'FAP4'
    ];

    $falp_groups2 = [
        'First Process',
        'Secondary 1 Process',
        'Secondary 2 Process'
    ];

    $sections = [
        'Section 1',
        'Section 2',
        'Section 3',
        'Section 4',
        'Section 5',
        'Section 6',
        'Section 7',
        'Section 9',
        'Repair Process',
        'Tsumesen Insertion',
        'First Process',
        'Secondary 1 Process',
        'Secondary 2 Process',
        'QC',
        'QAE',
        'CQA'
    ];

    // Create placeholders for each row
    $generated_placeholders = implode(',', array_fill(0, count($sections), '?'));
    $placeholders = "($generated_placeholders)";

    $query = "SELECT DISTINCT section, falp_group 
                FROM ialert_section 
                WHERE section IN $placeholders";

    if (!empty($other_pending)) {
        $query .= " OR section = '$other_pending'";
    } else {
        $query .= " OR falp_group = 'Other Group'";
    }

    $query .= " ORDER BY falp_group ASC, section ASC";

    $stmt = $conn->prepare($query);
    $stmt->execute($sections);

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $section = $row['section'];
        $section_params = addslashes($section);
        $falp_group = $row['falp_group'];
        $query1 = "";
        $total = 0; // Reset total for each section
        $grand_total = 0; // Reset grand_total for each section

        if (in_array($falp_group, $falp_groups1)) {
            $and_clause = "";
            if (!empty($audit_type)) {
                $and_clause .= " AND audit_type LIKE '$audit_type%'";
            }
            $and_clause .= " AND (date_audited >= '$dateFrom' AND date_audited <= '$dateTo')";
            // FAP Sections
            $query1 = "SELECT COUNT(total) AS total 
                                    FROM (
                                        SELECT id AS total FROM ialert_audit 
                                        WHERE pd = 'Written IR' AND line_no != 'initial' AND section = '$section_params' 
                                        AND provider = 'fas' AND edit_count = 0 AND date_recieved IS NULL" . $and_clause . "
                                        UNION ALL
                                        SELECT id AS total FROM ialert_audit 
                                        WHERE edit_count != 0 AND line_no != 'initial' AND section = '$section_params' 
                                        AND provider = 'fas' AND date_recieved IS NULL" . $and_clause . "
                                    ) AS J";
            $query2 = "SELECT COUNT(*) AS grand_total FROM ialert_audit 
                                    WHERE line_no != 'initial' AND section = '$section_params' AND provider = 'fas'";
            $query2 .= " AND (date_audited >= '$dateFrom' AND date_audited <= '$dateTo')";
        } else if (in_array($falp_group, $falp_groups2)) {
            $and_clause = "";
            if (!empty($audit_type)) {
                $and_clause .= " AND audit_type LIKE '$audit_type%'";
            }
            $and_clause .= " AND (date_audited >= '$dateFrom' AND date_audited <= '$dateTo')";
            // FSP
            $query1 = "SELECT COUNT(total) AS total 
                                    FROM (
                                        SELECT id AS total FROM ialert_audit 
                                        WHERE pd = 'Written IR' AND line_no = 'initial' AND section = '$section_params' 
                                        AND provider = 'fas' AND edit_count = 0 AND date_recieved IS NULL" . $and_clause . "
                                        UNION ALL
                                        SELECT id AS total FROM ialert_audit 
                                        WHERE edit_count != 0 AND line_no = 'initial' AND section = '$section_params' 
                                        AND provider = 'fas' AND date_recieved IS NULL" . $and_clause . "
                                    ) AS J";
            $query2 = "SELECT COUNT(*) AS grand_total FROM ialert_audit 
                                    WHERE line_no = 'initial' AND section = '$section_params' AND provider = 'fas'";
            $query2 .= " AND (date_audited >= '$dateFrom' AND date_audited <= '$dateTo')";
        } else {
            // GC, QA, Other Groups
            $query1 = "SELECT COUNT(*) AS total FROM ialert_audit 
                                    WHERE edit_count !=0 AND section = '$section_params' 
                                    AND provider = 'fas' AND date_recieved IS NULL";
            if (!empty($audit_type)) {
                $query1 .= " AND audit_type LIKE '$audit_type%'";
            }
            $query1 .= " AND (date_audited >= '$dateFrom' AND date_audited <= '$dateTo')";
            $query2 = "SELECT COUNT(*) AS grand_total FROM ialert_audit 
                                    WHERE section = '$section_params' AND provider = 'fas'";
            $query2 .= " AND (date_audited >= '$dateFrom' AND date_audited <= '$dateTo')";
            $section = $falp_group;
        }

        $stmt1 = $conn->prepare($query1);
        $stmt1->execute();

        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $total += intval($row1['total']);
        }

        $stmt1 = $conn->prepare($query2);
        $stmt1->execute();

        while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
            $grand_total += intval($row1['grand_total']);
        }

        // Combine results
        if (!isset($combinedData[$section])) {
            $combinedData[$section] = ['total' => 0, 'grand_total' => 0];
        }
        $combinedData[$section]['total'] += $total;
        $combinedData[$section]['grand_total'] += $grand_total;
    }

    // Convert combined data to the desired output format
    foreach ($combinedData as $section => $totals) {
        $section_id = str_replace(' ', '', $section);
        $section_id = strtolower($section_id);
        array_push($sections_count_list, array('section_id' => $section_id, 'section' => $section, 'total' => $totals['total'], 'grand_total' => $totals['grand_total']));
    }


    // Provider
    $combinedData = []; // Initialize the combined data array
    
    $query = "SELECT DISTINCT provider FROM ialert_audit";

    if (!empty($provider_pending)) {
        $query .= " WHERE provider = '$provider_pending'";
    } else {
        $query .= " WHERE provider != 'fas'";
    }

    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $provider = $row['provider'];
            $provider_params = addslashes($provider);
            $total = 0; // Reset total for each section
            $grand_total = 0; // Reset grand_total for each section
    
            $query1 = "SELECT COUNT(*) AS total FROM ialert_audit WHERE edit_count !=0 AND provider = '$provider_params' AND date_recieved IS NULL";
            if (!empty($audit_type)) {
                $query1 .= " AND audit_type LIKE '$audit_type%'";
            }
            $query1 .= " AND (audit_type >= '$dateFrom' AND date_audited <= '$dateTo')";
            $stmt1 = $conn->prepare($query1);
            $stmt1->execute();
    
            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                $total += intval($row1['total']);
            }
    
            $query2 = "SELECT COUNT(*) AS grand_total FROM ialert_audit WHERE provider = '$provider_params'";
            $query2 .= " AND (date_audited >= '$dateFrom' AND date_audited <= '$dateTo')";
            $stmt1 = $conn->prepare($query2);
            $stmt1->execute();
    
            while ($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)) {
                $grand_total += intval($row1['grand_total']);
            }
    
            // Combine results
            if (!isset($combinedData["Provider"])) {
                $combinedData["Provider"] = ['total' => 0, 'grand_total' => 0];
            }
            $combinedData["Provider"]['total'] += $total;
            $combinedData["Provider"]['grand_total'] += $grand_total;
        }
    
        // Convert combined data to the desired output format
        foreach ($combinedData as $section => $totals) {
            $section_id = str_replace(' ', '', $section);
            $section_id = strtolower($section_id);
            array_push($sections_count_list, array('section_id' => $section_id, 'section' => $section, 'total' => $totals['total'], 'grand_total' => $totals['grand_total']));
        }
    } else {
        $section_id = str_replace(' ', '', "Provider");
        $section_id = strtolower($section_id);
        array_push($sections_count_list, array('section_id' => $section_id, 'section' => "Provider", 'total' => 0, 'grand_total' => 0));
    }

    echo json_encode($sections_count_list);
}
