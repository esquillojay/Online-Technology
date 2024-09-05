<?php

include('../include/connection.php');
include('../include/functions.php');

if (isset($_POST['employeeid'])) {
    $employeeid = $_POST['employeeid'];

    // Fetch photo filename from database
    $sql = "SELECT photo FROM tblemployees WHERE employeeid = :employeeid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":employeeid", $employeeid, PDO::PARAM_INT);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $photo = $row['photo'];
        $photo_path = '../photos/' . $photo; // Adjust path as per your actual directory structure

        // Delete photo file if it exists and not the default 'no photo.jpg'
        if ($photo != 'no photo.jpg' && file_exists($photo_path)) {
            if (unlink($photo_path)) {
                echo "Photo file deleted successfully. ";
            } else {
                echo "Failed to delete photo file. ";
            }
        } else {
            echo "Photo file not found or default photo. ";
        }

        // Delete record from database
        $deleteSql = "DELETE FROM tblemployees WHERE employeeid = :employeeid";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bindParam(":employeeid", $employeeid, PDO::PARAM_INT);
        $deleteStmt->execute();

        echo "Record deleted successfully.";
    } else {
        echo "Record not found.";
    }
} else {
    echo "Employee ID not provided.";
}

?>
