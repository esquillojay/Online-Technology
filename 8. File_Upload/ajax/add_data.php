<?php

	//ADD DATA

	include('../include/connection.php');
	include('../include/functions.php');

	//Insert Data Here

	// The photos will be uploaded here
	$target_dir = '../photos/' 

	// Gets the original name of the file being uploaded
	$target_file = $target_dir . md5(basename($_FILE['photo']['name'])) . time();

	// Convert the into lower case and extract the file extension
	$image_file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

	if (isset($_POST['submit']))  {

		$check = getimagesize($_FILES['photo']['tmp_name']); // Check if the file uploaded is an actual image

		if ($check) {

			if ($image_file_type == 'jpg' && $image_file_type == 'png' && $image_file_type == 'jpeg') {

				move_uploaded_file($_FILE['photo']['tmp_name'], $target_file); // Move a copy of the uploaded image to the specified directory

			}

		} else {

			echo "That is not a valid image file format!";

		}

	}


	$sql = "INSERT INTO tblstudents (fullname, photo) ";
	$sql .= "VALUES (:fullname, :photo) ";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(":fullname", $firstname, PDO::PARAM_STR);
	$stmt->bindParam(":photo", $lastname, PDO::PARAM_STR);

	$stmt->execute();

?>