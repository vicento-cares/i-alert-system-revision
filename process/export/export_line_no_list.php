<?php
require '../conn.php';

$delimiter = ",";

$filename = "I-Alert_LineNoMasterlist_" . $server_date_only . "_" . $server_time . ".csv";

// Create a file pointer 
$f = fopen('php://memory', 'w');

// UTF-8 BOM for special character compatibility
fputs($f, "\xEF\xBB\xBF");

// Set column headers 
$fields = array('Line No.');
fputcsv($f, $fields, $delimiter);

$query = "SELECT * FROM ialert_lines";

$stmt = $conn->prepare($query);
$stmt->execute();

if ($stmt->rowCount() > 0) {

    // Output each row of the data, format line as csv and write to file pointer 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

        $lineData = array($row['line_no']);
        fputcsv($f, $lineData, $delimiter);

    }

} else {

    // Output each row of the data, format line as csv and write to file pointer 
    $lineData = array("NO DATA FOUND");
    fputcsv($f, $lineData, $delimiter);

}

// Move back to beginning of file 
fseek($f, 0);

// Set headers to download file rather than displayed 
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

//output all remaining data on a file pointer 
fpassthru($f);

$conn = null;