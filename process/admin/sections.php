<?php
require '../conn.php';

$method = $_POST['method'];

// Revisions (Vince)
if ($method == 'fetch_falp_group_dropdown') {
    $dept = addslashes($_POST['dept']);
    $sql = "SELECT DISTINCT falp_group FROM ialert_section";
    if (!empty($dept)) {
        $sql = $sql . " WHERE dept = '$dept'";
    }
    $sql = $sql . " ORDER BY falp_group ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option selected value="">Select Group</option>';
        foreach ($stmt->fetchAll() as $row) {
            echo '<option value="' . htmlspecialchars($row['falp_group']) . '">' . htmlspecialchars($row['falp_group']) . '</option>';
        }
    } else {
        echo '<option disabled selected value="">Select Group</option>';
    }
}

// Revisions (Vince)
if ($method == 'fetch_section_dropdown') {
    $falp_group = addslashes($_POST['falp_group']);
    $sql = "SELECT DISTINCT section FROM ialert_section";
    if (!empty($falp_group)) {
        $sql = $sql . " WHERE falp_group = '$falp_group'";
    }
    $sql = $sql . " ORDER BY section ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option selected value="">Select Section</option>';
        foreach ($stmt->fetchAll() as $row) {
            echo '<option value="' . htmlspecialchars($row['section']) . '">' . htmlspecialchars($row['section']) . '</option>';
        }
    } else {
        echo '<option disabled selected value="">Select Section</option>';
    }
}

// Revisions (Vince)
if ($method == 'fetch_other_group_dropdown') {
    $sql = "SELECT DISTINCT section FROM ialert_section WHERE falp_group = 'Other Group' ORDER BY section ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option selected value="">Select Section</option>';
        foreach ($stmt->fetchAll() as $row) {
            echo '<option value="' . htmlspecialchars($row['section']) . '">' . htmlspecialchars($row['section']) . '</option>';
        }
    } else {
        echo '<option disabled selected value="">Select Section</option>';
    }
}

if ($method == 'fetch_section') {
    $section = addslashes($_POST['section']);
    $c = 0;

    $query = "SELECT * FROM ialert_section WHERE section LIKE '$section%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $j) {
            $c++;

            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_section" onclick="get_sections_details(&quot;' . $j['id'] . '~!~' . $j['section_code'] . '~!~' . $j['dept'] . '~!~' . $j['falp_group'] . '~!~' . $j['section'] . '&quot;)">';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $j['section_code'] . '</td>';
            echo '<td>' . $j['dept'] . '</td>';
            echo '<td>' . $j['falp_group'] . '</td>';
            echo '<td>' . $j['section'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="5" style="color:red;">No Result<td>';
        echo '</tr>';
    }
}


if ($method == 'register_section') {
    $section_code = $_POST['section_code'];
    $section = $_POST['section'];
    $falp_group = $_POST['falp_group'];
    $dept = $_POST['dept'];

    $check = "SELECT id FROM ialert_section 
                WHERE section_code = ? AND section = ? 
                AND falp_group = ? AND dept = ?";
    $stmt = $conn->prepare($check);
    $params = array($section_code, $section, $falp_group, $dept);
    $stmt->execute($params);
    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $query = "INSERT INTO ialert_section 
                    (dept, falp_group, section, section_code) 
                    VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $params = array($dept, $falp_group, $section, $section_code);
        if ($stmt->execute($params)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

if ($method == 'delete_section') {
    $id = $_POST['id'];

    $query = "DELETE FROM ialert_section WHERE id = ?";
    $stmt = $conn->prepare($query);
    $params = array($id);
    if ($stmt->execute($params)) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'update_sections') {
    $id = $_POST['id'];
    $section_code = $_POST['section_code'];
    $section = $_POST['section'];
    $falp_group = $_POST['falp_group'];
    $dept = $_POST['dept'];

    $check = "SELECT id FROM ialert_section WHERE section_code = ? OR section = ?";
    $stmt = $conn->prepare($check);
    $params = array($section_code, $section);
    $stmt->execute($params);
    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $query = "UPDATE ialert_section SET dept = ?, falp_group = ?, section = ?, section_code = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $params = array($dept, $falp_group, $section, $section_code, $id);
        if ($stmt->execute($params)) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

$conn = NULL;