<?php

	//ADD DATA

	include('../include/connection.php');
	include('../include/functions.php');

	$fullname = $_POST['fullname'];

	// The photos will be uploaded here
	$target_dir = '../photos/'; 

	$target_file = $_FILES['photo']['name'];

	// Convert the into lower case and extract the file extension
	$image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	// Gets the original name of the file being uploaded and hash in md5 and append a time stamp
	$hash = md5($target_file . time());

	// Generate additional 7 random character based on uniqid (based on current time in milliseconds)
	$random_str = substr(md5(uniqid(rand(), true)), 0, 7);  

	// The new file name with extension
	$new_file_name = $hash . $random_str . '.' . $image_file_type;

	// Send to the target directory with a new file name (hashed)
	$location = $target_dir . $new_file_name;

	// Move a copy of the uploaded image to the specified directory
	move_uploaded_file($_FILES['photo']['tmp_name'], $location); 

	$sql = "INSERT INTO tblstudents (fullname, photo) ";
	$sql .= "VALUES (:fullname, :photo) ";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(":fullname", $fullname, PDO::PARAM_STR);
	$stmt->bindParam(":photo", $new_file_name, PDO::PARAM_STR);

	$stmt->execute();

?>