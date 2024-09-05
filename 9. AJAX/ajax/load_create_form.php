<?php 

	include('../include/connection.php');
	include('../include/functions.php');

?>	

<fieldset>

	<legend> Add Record </legend>
	<div>
		<label for="lastname"> Last Name </label>
		<input type="text" name="lastname" id="lastname" required>
	</div>
	<div>
		<label for="firstname"> First Name </label>
		<input type="text" name="firstname" id="firstname" required>
	</div>
	<div>
		<label for="sex"> Sex </label>
		<p>
			<input type="radio" name="sex" value="Male" checked required><span> Male </span>
			<input type="radio" name="sex" value="Female" required><span> Female </span>
		</p>
	</div>
	<div>
		<label for="departmentid"> Department </label>
		<select name="departmentid" id="departmentid" required>
		<option selected disabled> Select a Department </option>
			
			<?php 

				$sql = "SELECT * FROM tbldepartment ORDER BY department ";
				echo bindDropdown($sql, 'departmentid', 'department');

			?>

		</select>
	</div>
	<div>
		<label for="programid"> Program </label>
		<select name="programid" id="programid" required disabled>

			<option disabled selected> Please Select a Department first </option>
			
		</select>
	</div>
	<div>
		<label for=""> &nbsp;</label>
		<input type="submit" value="CREATE" name="create" id="create">
	</div>

</fieldset>