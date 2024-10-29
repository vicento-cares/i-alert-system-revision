<?php
// Revisions (Vince)
require '../conn.php';

if (!isset($_POST['method'])) {
    echo 'method not set';
    exit();
}

$method = $_POST['method'];
$i_alert_date = date('F d, Y');
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https://' : 'http://';

// Check Daily Report File
function check_daily_report_file($daily_report_file_info, $action, $conn)
{
    $message = "";
    $hasError = 0;
    $file_valid_arr = array(0, 0, 0, 0);

    // $mimes = array(
    //     'application/vnd.ms-excel', 
    //     'application/excel', 
    //     'application/msexcel', 
    //     'application/vnd.msexcel', 
    //     'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 
    //     'application/vnd.ms-word', 
    //     'application/word', 
    //     'application/vnd.msword', 
    //     'application/msword', 
    //     'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
    //     'application/vnd.oasis.opendocument.spreadsheet', 
    //     'application/vnd.oasis.opendocument.text'
    // );

    // $mimes = array(
    //     'text/x-comma-separated-values', 
    //     'text/comma-separated-values', 
    //     'application/octet-stream', 
    //     'application/vnd.ms-excel', 
    //     'application/x-csv', 
    //     'text/x-csv', 
    //     'text/csv', 
    //     'application/csv', 
    //     'application/excel', 
    //     'application/vnd.msexcel', 
    //     'text/plain'
    // );

    $mimes = array(
        'application/pdf',
        'application/x-pdf',
        'application/x-bzpdf',
        'application/x-gzpdf',
        'applications/vnd.pdf',
        'application/acrobat',
        'application/x-google-chrome-pdf',
        'text/pdf',
        'text/x-pdf'
    );

    // Check File Mimes
    if (!in_array($daily_report_file_info['daily_report_filetype'], $mimes)) {
        $hasError = 1;
        $file_valid_arr[0] = 1;
    }
    // Check File Size
    if ($daily_report_file_info['daily_report_size'] > 25000000) {
        $hasError = 1;
        $file_valid_arr[1] = 1;
    }

    // Check File Exists
    if (file_exists($daily_report_file_info['target_file'])) {
        if ($action == 'Insert') {
            $hasError = 1;
            $file_valid_arr[2] = 1;
        } else if ($daily_report_file_info['old_daily_report_filename'] != $daily_report_file_info['daily_report_filename']) {
            $hasError = 1;
            $file_valid_arr[2] = 1;
        }
    }
    // Check File Information Exists on Database
    $daily_report_date = $daily_report_file_info['daily_report_date'];
    $daily_report_filename = $daily_report_file_info['daily_report_filename'];
    $daily_report_filetype = $daily_report_file_info['daily_report_filetype'];
    $daily_report_url = $daily_report_file_info['daily_report_url'];

    $sql = "SELECT id FROM ialert_daily_report 
            WHERE daily_report_date = ? AND file_name = ? AND file_type = ? AND file_url = ?";
    $stmt = $conn->prepare($sql);
    $params = array($daily_report_date, $daily_report_filename, $daily_report_filetype, $daily_report_url);
    $stmt->execute($params);

    if ($stmt->rowCount() > 0) {
        if ($action == 'Insert') {
            $hasError = 1;
            $file_valid_arr[3] = 1;
        } else if ($daily_report_file_info['old_daily_report_filename'] != $daily_report_file_info['daily_report_filename']) {
            $hasError = 1;
            $file_valid_arr[3] = 1;
        }
    }

    // Error Collection and Output
    if ($hasError == 1) {
        if ($file_valid_arr[0] == 1) {
            $message = $message . 'Daily Report file format not accepted! ';
        }
        if ($file_valid_arr[1] == 1) {
            $message = $message . 'Daily Report file is too large. ';
        }
        if ($file_valid_arr[2] == 1) {
            $message = $message . 'Daily Report file exists. ';
        }
        if ($file_valid_arr[3] == 1) {
            $message = $message . 'Daily Report file information exists on the system. ';
        }
    }

    return $message;
}

// Insert File Information
function save_daily_report_info($daily_report_file_info, $conn)
{
    $daily_report_date = $daily_report_file_info['daily_report_date'];
    $daily_report_filename = basename($daily_report_file_info['daily_report_filename']);
    $daily_report_filetype = $daily_report_file_info['daily_report_filetype'];
    $daily_report_url = $daily_report_file_info['daily_report_url'];

    $sql = "INSERT INTO ialert_daily_report 
            (daily_report_date, file_name, file_type, file_url) 
            VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $params = array(
        $daily_report_date, 
        $daily_report_filename, 
        $daily_report_filetype, 
        $daily_report_url
    );
    $stmt->execute($params);
}

// Update File Information
function update_daily_report_info($daily_report_file_info, $conn)
{
    $id = $daily_report_file_info['id'];
    $daily_report_date = $daily_report_file_info['daily_report_date'];
    $daily_report_filename = basename($daily_report_file_info['daily_report_filename']);
    $daily_report_filetype = $daily_report_file_info['daily_report_filetype'];
    $daily_report_url = $daily_report_file_info['daily_report_url'];

    $sql = "UPDATE ialert_daily_report 
            SET daily_report_date = ?, file_name = ?, file_type = ?, file_url = ? 
            WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $params = array(
        $daily_report_date, 
        $daily_report_filename, 
        $daily_report_filetype, 
        $daily_report_url, 
        $id
    );
    $stmt->execute($params);
}

if ($method == 'get_daily_report') {
    $daily_report_date_from = $_POST['daily_report_date_from'];
    $daily_report_date_to = $_POST['daily_report_date_to'];

    $c = 0;

    $sql = "SELECT id, daily_report_date, file_name, file_url, date_updated
            FROM ialert_daily_report
            WHERE daily_report_date BETWEEN ? AND ?";
    $stmt = $conn->prepare($sql);
    $params = array($daily_report_date_from, $daily_report_date_to);
	$stmt->execute($params);

    while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
        $c++;
        echo '<tr style="cursor:pointer;" class="modal-trigger" 
                data-toggle="modal" data-target="#update_daily_report" 
                data-id="'.$row['id'].'" 
                data-daily_report_date="'.$row['daily_report_date'].'" 
                data-file_name="'.htmlspecialchars($row['file_name']).'" 
                data-file_url="'.htmlspecialchars($protocol.$_SERVER['SERVER_ADDR'].":".$_SERVER['SERVER_PORT'].$row['file_url']).'" 
                onclick="get_details_daily_report(this)">';
        echo '<td>'.$c.'</td>';
        echo '<td>'.$row['daily_report_date'].'</td>';
        echo '<td>'.$row['file_name'].'</td>';
        echo '<td>'.$row['date_updated'].'</td>';
        echo '</tr>';
    }
}

if ($method == 'upload_daily_report') {
    $daily_report_date = $_POST['daily_report_date'];

    // Upload File
    if (!empty($_FILES['file']['name'])) {
        $daily_report_file = $_FILES['file']['tmp_name'];
        $daily_report_filename = $_FILES['file']['name'];
        $daily_report_filetype = $_FILES['file']['type'];
        $daily_report_size = $_FILES['file']['size'];

        $daily_report_url = "";
        $target_dir = "";

        // Create a DateTime object from the provided date
        $date_dr = DateTime::createFromFormat('Y-m-d', $daily_report_date);

        // Check if the date was created successfully
        if ($date_dr) {
            // Format the date for the URL and target directory
            $year = $date_dr->format("Y");
            $month = $date_dr->format("m");
            $day = $date_dr->format("d");

            $daily_report_url = "/uploads/i-alert/rep/$year/$month/$day/";
            $target_dir = "../../../uploads/i-alert/rep/$year/$month/$day/";
        } else {
            // Handle the error if the date is invalid
            echo "Invalid date format.";
            exit();
        }

        // $daily_report_url = "/uploads/i-alert/rep/".date("Y")."/".date("m")."/".date("d")."/";
        // $target_dir = "../../../uploads/i-alert/rep/".date("Y")."/".date("m")."/".date("d")."/";

        $target_file = $target_dir . basename($daily_report_filename);
        $daily_report_url .= rawurlencode(basename($daily_report_filename));

        $daily_report_file_info = array(
            'daily_report_date' => $daily_report_date,
            'daily_report_file' => $daily_report_file,
            'daily_report_filename' => $daily_report_filename,
            'daily_report_filetype' => $daily_report_filetype,
            'daily_report_size' => $daily_report_size,
            'target_file' => $target_file,
            'daily_report_url' => $daily_report_url
        );

        // Check Daily Report File
        $chkMachineDocsFileMsg = check_daily_report_file($daily_report_file_info, 'Insert', $conn);

        if ($chkMachineDocsFileMsg == '') {

            // Add Folder If Not Exists
			if (!file_exists($target_dir)) {
			    mkdir($target_dir, 0777, true);
			}

            // Upload File and Check if successfully uploaded
            // Note: Can overwrite existing file
            if (move_uploaded_file($daily_report_file, $target_file)) {

                // Insert File Information
                save_daily_report_info($daily_report_file_info, $conn);

            } else {
                echo "Sorry, there was an error uploading your file. Try Again or Contact IT Personnel if it fails again";
            }

        } else {
            echo $chkMachineDocsFileMsg;
        }

    } else {
        echo 'Please upload Daily Report file';
    }
}

if ($method == 'update_daily_report_date') {
    $id = $_POST['id'];
    $daily_report_date = $_POST['daily_report_date'];

    $old_daily_report_date = '';
    $old_daily_report_filename = '';
    $old_daily_report_filetype = '';
    $old_daily_report_url = "";
    $old_target_dir = "../../..";
    $old_target_file = "";

    $daily_report_url = "";
    $target_dir = "";
    $target_file = "";

    $sql = "SELECT daily_report_date, file_name, file_type, file_url FROM ialert_daily_report WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $params = array($id);
    $stmt->execute($params);
    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $old_daily_report_date = $row['daily_report_date'];
        $old_daily_report_filename = $row['file_name'];
        $old_daily_report_filetype = $row['file_type'];
        $old_daily_report_url = urldecode($row['file_url']);

        $old_target_file = realpath($old_target_dir . $old_daily_report_url);
    } else {
        echo "No report found for the given ID.";
        exit();
    }

    if ($daily_report_date != $old_daily_report_date) {
        // Create a DateTime object from the provided date
        $date_dr = DateTime::createFromFormat('Y-m-d', $daily_report_date);

        // Check if the date was created successfully
        if ($date_dr) {
            // Format the date for the URL and target directory
            $year = $date_dr->format("Y");
            $month = $date_dr->format("m");
            $day = $date_dr->format("d");

            $daily_report_url = "/uploads/i-alert/rep/$year/$month/$day/";
            $target_dir = "../../../uploads/i-alert/rep/$year/$month/$day/";

            // $daily_report_url = "/uploads/i-alert/rep/".date("Y")."/".date("m")."/".date("d")."/";
            // $target_dir = "../../../uploads/i-alert/rep/".date("Y")."/".date("m")."/".date("d")."/";

            $target_file = $target_dir . basename($old_daily_report_filename);
            $daily_report_url .= rawurlencode(basename($old_daily_report_filename));
        } else {
            // Handle the error if the date is invalid
            echo "Invalid date format.";
            exit();
        }

        $daily_report_file_info = array(
            'id' => $id,
            'daily_report_date' => $daily_report_date,
            'daily_report_file' => "",
            'daily_report_filename' => $old_daily_report_filename,
            'daily_report_filetype' => $old_daily_report_filetype,
            'daily_report_size' => "",
            'target_file' => "",
            'daily_report_url' => $daily_report_url,
            'old_daily_report_filename' => ""
        );

        // Add Folder If Not Exists
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Upload File and Check if successfully uploaded
        // Note: Can overwrite existing file
        if (rename($old_target_file, $target_file)) {

            // Update File Information
            update_daily_report_info($daily_report_file_info, $conn);

        } else {
            echo "Sorry, there was an error uploading your file. Try Again or Contact IT Personnel if it fails again";
        }
    }
}

// Update / Edit
if ($method == 'update_daily_report') {
    $id = $_POST['id'];

    $old_daily_report_date = '';
    $old_daily_report_filename = '';
    $old_daily_report_url = "";
    $old_target_dir = "../../..";
    $old_target_file = "";

    $daily_report_url = "";
    $target_dir = "";
    $target_file = "";
    
    // Upload File
    if (!empty($_FILES['file']['name'])) {
        $daily_report_file = $_FILES['file']['tmp_name'];
        $daily_report_filename = $_FILES['file']['name'];
        $daily_report_filetype = $_FILES['file']['type'];
        $daily_report_size = $_FILES['file']['size'];

        $sql = "SELECT daily_report_date, file_name, file_url FROM ialert_daily_report WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $params = array($id);
        $stmt->execute($params);
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $old_daily_report_date = $row['daily_report_date'];
            $old_daily_report_filename = $row['file_name'];
            $old_daily_report_url = urldecode($row['file_url']);

            $old_target_file = realpath($old_target_dir . $old_daily_report_url);
        } else {
            echo "No report found for the given ID.";
            exit();
        }

        // Create a DateTime object from the provided date
        $date_dr = DateTime::createFromFormat('Y-m-d', $old_daily_report_date);

        // Check if the date was created successfully
        if ($date_dr) {
            // Format the date for the URL and target directory
            $year = $date_dr->format("Y");
            $month = $date_dr->format("m");
            $day = $date_dr->format("d");

            $daily_report_url = "/uploads/i-alert/rep/$year/$month/$day/";
            $target_dir = "../../../uploads/i-alert/rep/$year/$month/$day/";

            // $daily_report_url = "/uploads/i-alert/rep/".date("Y")."/".date("m")."/".date("d")."/";
            // $target_dir = "../../../uploads/i-alert/rep/".date("Y")."/".date("m")."/".date("d")."/";

            $target_file = $target_dir . basename($daily_report_filename);
            $daily_report_url .= rawurlencode(basename($daily_report_filename));
        } else {
            // Handle the error if the date is invalid
            echo "Invalid date format.";
            exit();
        }

        $daily_report_file_info = array(
            'id' => $id,
            'daily_report_date' => $old_daily_report_date,
            'daily_report_file' => $daily_report_file,
            'daily_report_filename' => $daily_report_filename,
            'daily_report_filetype' => $daily_report_filetype,
            'daily_report_size' => $daily_report_size,
            'target_file' => $target_file,
            'daily_report_url' => $daily_report_url,
            'old_daily_report_filename' => $old_daily_report_filename
        );
    
        // Check Daily Report File
        $chkMachineDocsFileMsg = check_daily_report_file($daily_report_file_info, 'Update', $conn);
    
        if ($chkMachineDocsFileMsg == '') {
    
            // Delete Old Uploaded File
            if (file_exists($old_target_file)) {
                if (!unlink($old_target_file)) {
                    echo "Old Daily Report File cannot be deleted due to an error!";
                }
            }
    
            // Upload File and Check if successfully uploaded
            // Note: Can overwrite existing file
            if (move_uploaded_file($daily_report_file, $target_file)) {
    
                // Update File Information
                update_daily_report_info($daily_report_file_info, $conn);
    
            } else {
                echo "Sorry, there was an error uploading your file. Try Again or Contact IT Personnel if it fails again";
            }
    
        } else {
            echo $chkMachineDocsFileMsg;
        }
    } else {
        echo 'Please upload New Daily Report file';
    }
}

// Delete
if ($method == 'delete_daily_report') {
    $id = $_POST['id'];
    $daily_report_url = '';
    $target_dir = "../../..";

    // Validate and sanitize the input
    if (!is_numeric($id)) {
        echo "Invalid ID.";
        exit();
    }

    $sql = "SELECT file_url FROM ialert_daily_report WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    if ($stmt->rowCount() > 0) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $daily_report_url = urldecode($row['file_url']);
    } else {
        echo "No report found for the given ID.";
        exit();
    }

    // Delete Uploaded File
    $target_file = realpath($target_dir . $daily_report_url); // Resolve the full path

    if ($target_file && file_exists($target_file)) {
        if (is_writable($target_file)) {
            if (unlink($target_file)) {
                // Use prepared statement for deletion
                $sql = "DELETE FROM ialert_daily_report WHERE id = ?";
                $stmt = $conn->prepare($sql);
                if ($stmt->execute([$id])) {
                    echo "success";
                } else {
                    echo "Error deleting record from database.";
                }
            } else {
                echo "Daily Report File cannot be deleted due to an error.";
            }
        } else {
            echo "Daily Report File is not writable.";
        }
    } else {
        echo "Daily Report File doesn't exist.";
    }
}

$conn = null;