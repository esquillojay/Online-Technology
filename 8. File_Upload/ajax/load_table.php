<?php

	include_once('../include/connection.php');
	include_once('../include/functions.php');
	
	// Read Display Data
	
	$sql =  "SELECT * FROM tblstudents ";
	$sql .= "ORDER BY fullname ";

	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$count = $stmt->rowCount();

	if ($count > 0) {

		echo "<table>";
			echo "<tr>";
				echo "<th> Full Name </th>";
				echo "<th> Action </th>";
		echo "</tr>";

		while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

			echo "<tr>";
				echo "<td data-studentid='{$result['studentid']}' data-photo='{$result['photo']}' class='hover-name'>" . $result['fullname'] . "</td>";
				echo "<td style='text-align: center;'><button id='delete' data-studentid='{$result['studentid']}'> DELETE </button></td>";
			echo "</tr>";

		}

		echo "</table>";

	} else {

		echo "<h4 style='color: red;'> No Records Found! </h4>";

	}


?>