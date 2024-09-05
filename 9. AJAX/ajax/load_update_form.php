<?php

	include('../include/connection.php');
	include('../include/functions.php');

	$employeeid = $_POST['employeeid'];
	$departmentid = $_POST['departmentid'];

	$sql = "SELECT * FROM tblemployees WHERE employeeid = :employeeid ";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(":employeeid", $employeeid, PDO::PARAM_INT);

	$stmt->execute();	

	$result = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<fieldset>
		<legend> Update Record </legend>
		<div style="display: none;">
			<label for="employeeid"> EmployeeID </label>
			<input type="text" name="employeeid" id="employeeid" required value="<?php echo $result['employeeid']; ?>">
		</div>
		<div>
			<label for="lastname"> Last Name </label>
			<input type="text" name="lastname" id="lastname" required value="<?php echo $result['lastname']; ?>">
		</div>
		<div>
			<label for="firstname"> First Name </label>
			<input type="text" name="firstname" id="firstname" required value="<?php echo $result['firstname']; ?>">
		</div>
		<div>
			<label for="sex"> Sex </label>
			<p>
				<input type="radio" name="sex" value="Male" required <?php echo $result['sex'] == 'Male' ? 'checked' : ''; ?>><span> Male </span>
				<input type="radio" name="sex" value="Female" required <?php echo $result['sex'] == 'Female' ? 'checked' : ''; ?>><span> Female </span>
			</p>
		</div>
		<div>
			<label for="department"> Department </label>
			<select name="departmentid" id="departmentid" required>
				
				<?php

					$sql = "SELECT * FROM tbldepartment ORDER BY department";

					echo bindDropdown($sql, 'departmentid', 'department', $result['departmentid']);

				?>

			</select>
		</div>
		<div>
			<label for="programid"> Program </label>
			<select name="programid" id="programid" required>
				
				<?php

					$sql = "SELECT * FROM tblprogram WHERE departmentid = {$departmentid} ORDER BY program";

					echo bindDropdown($sql, 'programid', 'program', $result['programid']);

				?>

			</select>
		</div>
		<div class="buttons">
			<label for=""> &nbsp;</label>
			<input type="submit" value="UPDATE" name="update" id="update">
		</div>
	</fieldset>