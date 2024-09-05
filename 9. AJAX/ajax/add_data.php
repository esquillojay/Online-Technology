<?php

// ADD DATA
include('../include/connection.php');
include('../include/functions.php');

// Retrieve form data
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$sex = $_POST['sex'];
$departmentid = $_POST['departmentid'];
$programid = $_POST['programid'];
$default_photo = 'no photo.jpg';
$photo = $default_photo;

// Check if a photo is uploaded
if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
    $target_dir = '../photos/';
    $target_file = $_FILES['photo']['name'];

    // Convert the file name to lower case and extract the file extension
    $image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Generate a hashed file name with a timestamp and random string
    $hash = md5($target_file . time());
    $random_str = substr(md5(uniqid(rand(), true)), 0, 7);
    $new_file_name = $hash . $random_str . '.' . $image_file_type;

    // Set the upload location
    $location = $target_dir . $new_file_name;

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES['photo']['tmp_name'], $location)) {
        $photo = $new_file_name;
    }
}

// Insert data into the database
$sql = "INSERT INTO tblemployees (firstname, lastname, sex, departmentid, programid, photo) ";
$sql .= "VALUES (:firstname, :lastname, :sex, :departmentid, :programid, :photo) ";

$stmt = $conn->prepare($sql);
$stmt->bindParam(":firstname", $firstname, PDO::PARAM_STR);
$stmt->bindParam(":lastname", $lastname, PDO::PARAM_STR);
$stmt->bindParam(":sex", $sex, PDO::PARAM_STR);
$stmt->bindParam(":departmentid", $departmentid, PDO::PARAM_INT);
$stmt->bindParam(":programid", $programid, PDO::PARAM_INT);
$stmt->bindParam(":photo", $photo, PDO::PARAM_STR);

if ($stmt->execute()) {
    echo "Record created successfully";
} else {
    echo "Error creating record";
}

?>
