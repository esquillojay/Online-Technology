<?php 

	include('include/connection.php');
	include('include/functions.php');

?>
<!DOCTYPE html>
<html>
	<head>
		<title> AJAX </title>
		<link rel="stylesheet" href="css/styles.css">
	</head>
<body>

	<?php ?>

	<div id="wrapper">

		<form enctype='multipart/form-data' id="formstudent" class='create-form'>
			
			<fieldset>

				<legend> Add Record </legend>

				<div>
					<label for="fullname"> Full Name </label>
					<input type="text" name="fullname" id="fullname" required>
				</div>

				<div>
					<label for="photo"> Photo </label>
					<input type="file" name="photo" id="photo" required>
				</div>

				<div>
					<label for=""> &nbsp;</label>
					<input type="submit" value="Submit" name="submit" id="submit">
				</div>

			</fieldset>
			
		</form>

		<div id="student-table">
			
			<!-- DATA WILL BE LOADED THROUGH AJAX -->

		</div>

		<div id="tooltip" style="display: none;"></div>

	</div>

</body>
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
</html>