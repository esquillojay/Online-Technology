<?php

	include_once('../include/connection.php');
	include_once('../include/functions.php');
	
	// Read Display Data
	
	// Insert Code Here
	$sql = "SELECT * FROM tblemployees ";
	$sql .= "INNER JOIN tbldepartment ON ";
	$sql .= "tblemployees.departmentid = tbldepartment.departmentid ";
	$sql .= "INNER JOIN tblprogram ON ";
	$sql .= "tblemployees.programid = tblprogram.programid ";
	$sql .= "ORDER BY lastname, firstname, sex, department, program ";
	
	$stmt = $conn->prepare($sql);
	$stmt->execute();

	$count = $stmt->rowCount();

	if ($count > 0) {
		echo  '<table>';
			echo  '<tr>';
				echo  '<th> Last Name </th>';
				echo  '<th> First Name </th>';
				echo  '<th> Sex </th>';
				echo  '<th> Department </th>';
				echo  '<th> Program </th>';
				echo "<th colspan='3'> Action </th>";
			echo  '</tr>';

		while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo  '<tr>';
				echo  "<td data-employeeid='{$result['employeeid']}' data-photo='{$result['photo']}' class='hover-name'>" . $result['lastname'] . '</td>';
				echo  '<td>' . $result['firstname'] . '</td>';
				echo  '<td>' . $result['sex'] . '</td>';
				echo  '<td>' . $result['department'] . '</td>';
				echo  '<td>' . $result['program'] . '</td>';
				//echo  '<td>';
				//update, upload photo, and delete button
				echo '<td><button id="update-form" data-employeeid="' . htmlspecialchars($result['employeeid']) . '" data-departmentid="' . htmlspecialchars($result['departmentid']) . '">UPDATE</button></td>';
				echo '<td><button id="upload-photo" data-employeeid="' . htmlspecialchars($result['employeeid']) . '">UPLOAD PHOTO</button></td>';
				echo '<td><button id="delete" data-employeeid="' . htmlspecialchars($result['employeeid']) . '" data-photo="' . htmlspecialchars($result['photo']) . '">DELETE</button></td>';

				//echo  '</td>';
			echo  '</tr>';
		}

	echo  '</table>';

	} else {

		echo "<h4 style='color: red;'> No Records Found </h4>";


	}

