<?php

	// LOAD PROGRAM DATA
	include('../include/connection.php');
	include('../include/functions.php');

	// Insert Code Here
	$departmentid = $_POST['departmentid'];

	$sql  = "SELECT * FROM tbldepartment ";
	$sql .= "INNER JOIN tblprogram ON ";
	$sql .= "tbldepartment.departmentid = tblprogram.departmentid ";
	$sql .= "WHERE tblprogram.departmentid = :departmentid ";
	$sql .= "ORDER BY program";
	
	$stmt = $conn->prepare($sql);

	$stmt->bindParam(":departmentid", $departmentid, PDO::PARAM_STR);

	$stmt->execute();

	while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

		echo "<option value='{$result['programid']}'>";
		echo "{$result['program']}";
		echo "</option>";

	}
?>