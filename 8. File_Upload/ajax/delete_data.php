<?php

	// DELETE DATA
	include('../include/connection.php');
	include('../include/functions.php');

	$studentid = $_POST['studentid'];
	$photo_path = '../photos/';

	// DELETE PHOTO FROM ASSIGNED DIRECTORY

	$sql = "SELECT photo FROM tblstudents WHERE studentid = :studentid";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":studentid", $studentid, PDO::PARAM_STR);
	$stmt->execute();
	$result = $stmt->fetch(PDO::FETCH_ASSOC);
	$photo = $photo_path . $result['photo'];

	if (file_exists($photo)) {
		
		unlink($photo); // Delete actual photo

	}

	// THEN DELETE FROM DATABASE

	$sql = "DELETE FROM tblstudents WHERE studentid = :studentid";
	$stmt = $conn->prepare($sql);
	$stmt->bindParam(":studentid", $studentid, PDO::PARAM_STR);
	$stmt->execute();

?>