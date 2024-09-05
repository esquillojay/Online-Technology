<?php
// ADD DATA
include('../include/connection.php');
include('../include/functions.php');

$employeeid = $_POST['employeeid'];
$oldphoto = $_POST['oldphoto'];

// The photos will be uploaded here
$target_dir = '../photos/';
$target_file = $_FILES['photo']['name'];

// Convert the file name to lower case and extract the file extension
$image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Generate a unique file name
$hash = md5($target_file . time());
$random_str = substr(md5(uniqid(rand(), true)), 0, 7);
$new_file_name = $hash . $random_str . '.' . $image_file_type;

// Full path to the new file
$location = $target_dir . $new_file_name;

if (move_uploaded_file($_FILES['photo']['tmp_name'], $location)) {
    // Update the database with the new photo name
    $sql = "UPDATE tblemployees SET photo = :photo WHERE employeeid = :employeeid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":photo", $new_file_name, PDO::PARAM_STR);
    $stmt->bindParam(":employeeid", $employeeid, PDO::PARAM_INT);
    $stmt->execute();

    // Delete the old photo if it exists and is not the default photo
    if ($oldphoto && $oldphoto !== 'default.jpg') {
        $old_photo_path = $target_dir . $oldphoto;
        if (file_exists($old_photo_path)) {
            unlink($old_photo_path);
        }
    }
}
?>
