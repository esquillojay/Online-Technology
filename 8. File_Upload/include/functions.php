<?php

	//BIND DATA TO DROPDOWN MENU (BIND FOR UPDATE TOO)

	function bindDropdown($sql, $value, $description, $identifier = NULL) {

		global $conn;

		$stmt = $conn->prepare($sql);

		$stmt->execute();

		$output = '';

		while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {

			$output .= "<option value='{$result[$value]}' ";

				if ($result[$value] == $identifier) {

					$output .= " selected ";

				}


			$output .= ">" . $result[$description] . "</option>";

		}

		return $output;

	}

	//REDIRECT TO SPECIFIED PAGE

	function redirect_to($location) {

		header("Location: " . $location);

	}


	function count_rows($sql) {

		global $conn;

		$stmt = $conn->prepare($sql);

		$stmt->execute();

		return $stmt->rowCount();

	}
?>