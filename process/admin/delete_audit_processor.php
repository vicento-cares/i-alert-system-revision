<?php
require '../conn.php';

$method = $_POST['method'];

if ($method == 'deleteaudit') {
    // Revision (Vince)
    $idsToDeleteHistory = [];
    $idsToDelete = [];
    $idsToDelete = $_POST['id'];

    $isTransactionActive = false;
    $chunkSize = 100; // Define the size of each chunk

    try {
        if (!$isTransactionActive) {
            $conn->beginTransaction();
            $isTransactionActive = true;
        }

        // Get all ialert_history id to delete if found
        // Process the IDs in chunks
        foreach (array_chunk($idsToDelete, $chunkSize) as $chunk) {
            // Create a placeholder string for the IDs
            $placeholders = implode(',', array_fill(0, count($chunk), '?'));

            // Prepare the DELETE statement
            $stmt = $conn->prepare("SELECT id FROM ialert_history WHERE audit_id IN ($placeholders)");

            // Execute the statement with the chunk of IDs
            $stmt->execute($chunk);

            // Fetch all IDs from the result set and merge them into the $idsToDeleteHistory array
            $result = $stmt->fetchAll(PDO::FETCH_COLUMN, 0); // Fetch only the first column (id)
            $idsToDeleteHistory = array_merge($idsToDeleteHistory, $result);
        }

        // Delete record from ialert_audit
        // Process the IDs in chunks
        foreach (array_chunk($idsToDelete, $chunkSize) as $chunk) {
            // Create a placeholder string for the IDs
            $placeholders = implode(',', array_fill(0, count($chunk), '?'));

            // Prepare the DELETE statement
            $stmt = $conn->prepare("DELETE FROM ialert_audit WHERE id IN ($placeholders)");

            // Execute the statement with the chunk of IDs
            $stmt->execute($chunk);
        }

        // Delete record from ialert_history
        // Only delete from ialert_history if there are IDs to delete
        if (!empty($idsToDeleteHistory)) {
            // Process the IDs in chunks
            foreach (array_chunk($idsToDeleteHistory, $chunkSize) as $chunk) {
                // Create a placeholder string for the IDs
                $placeholders = implode(',', array_fill(0, count($chunk), '?'));

                // Prepare the DELETE statement
                $stmt = $conn->prepare("DELETE FROM ialert_history WHERE id IN ($placeholders)");

                // Execute the statement with the chunk of IDs
                $stmt->execute($chunk);
            }
        }

        $conn->commit();
        $isTransactionActive = false;
        echo "success";
    } catch (Exception $e) {
        if ($isTransactionActive) {
            $conn->rollBack();
            $isTransactionActive = false;
        }
        echo 'Failed. Please Try Again or Call IT Personnel Immediately!: ' . $e->getMessage();
    } finally {
        // Close the connection
        $conn = null;
    }
}
