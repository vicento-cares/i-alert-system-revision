<?php
require '../conn.php';

$method = $_POST['method'];

// Revisions (Vince)
if ($method == 'fetch_section_dropdown') {
    $falp_group = addslashes($_POST['falp_group']);
    $sql = "SELECT DISTINCT section, name FROM ialert_section";
    if (!empty($falp_group)) {
        $sql = $sql . " WHERE falp_group = '$falp_group'";
    }
    $sql = $sql . " ORDER BY name ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option selected value="">Select Section</option>';
        foreach ($stmt->fetchAll() as $row) {
            echo '<option value="' . htmlspecialchars($row['section']) . '">' . htmlspecialchars($row['name']) . '</option>';
        }
    } else {
        echo '<option disabled selected value="">Select Section</option>';
    }
}

// Revisions (Vince)
if ($method == 'fetch_other_group_dropdown') {
    $sql = "SELECT DISTINCT section, name FROM ialert_section WHERE falp_group = 'Other Group' ORDER BY name ASC";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo '<option selected value="">Select Section</option>';
        foreach ($stmt->fetchAll() as $row) {
            echo '<option value="' . htmlspecialchars($row['section']) . '">' . htmlspecialchars($row['name']) . '</option>';
        }
    } else {
        echo '<option disabled selected value="">Select Section</option>';
    }
}

if ($method == 'fetch_section') {
    $section = $_POST['section'];
    $c = 0;

    $query = "SELECT * FROM ialert_section WHERE name LIKE '$section%'";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        foreach ($stmt->fetchALL() as $j) {
            $c++;


            echo '<tr style="cursor:pointer;" class="modal-trigger" data-toggle="modal" data-target="#update_section" onclick="get_sections_details(&quot;' . $j['id'] . '~!~' . $j['section'] . '~!~' . $j['name'] . '~!~' . $j['falp_group'] . '&quot;)">';
            echo '<td>' . $c . '</td>';
            echo '<td>' . $j['section'] . '</td>';
            echo '<td>' . $j['name'] . '</td>';
            echo '<td>' . $j['falp_group'] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr>';
        echo '<td colspan="4" style="color:red;">No Result<td>';
        echo '</tr>';
    }
}


if ($method == 'register_section') {
    $section = $_POST['section'];
    $name = $_POST['name'];
    $falp_group = $_POST['falp_group'];

    $check = "SELECT id FROM ialert_section WHERE section = '$section' AND name = '$name' AND falp_group = '$falp_group'";
    $stmt = $conn->prepare($check);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $query = "INSERT INTO ialert_section (`section`,`name`,`falp_group`) VALUES ('$section', '$name', '$falp_group')";
        $stmt2 = $conn->prepare($query);
        if ($stmt2->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

}

if ($method == 'delete_section') {
    $id = $_POST['id'];

    $query = "DELETE FROM ialert_section WHERE id = '$id'";
    $stmt = $conn->prepare($query);
    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }
}

if ($method == 'update_sections') {
    $id = $_POST['id'];
    $section = $_POST['section'];
    $name = $_POST['name'];
    $falp_group = $_POST['falp_group'];

    $check = "SELECT id FROM ialert_section WHERE section = '$section' OR name = '$name'";
    $stmt = $conn->prepare($check);
    $stmt->execute();
    if ($stmt->rowCount() > 0) {
        echo 'Already Exist';
    } else {
        $query = "UPDATE ialert_section SET section = '$section', name = '$name', falp_group = '$falp_group' WHERE id = '$id'";
        $stmt2 = $conn->prepare($query);
        if ($stmt2->execute()) {
            echo 'success';
        } else {
            echo 'error';
        }
    }
}

$conn = NULL;