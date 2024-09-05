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

	<div id="wrapper">

		<form method="post" id="formemployee" class='create-form' enctype='multipart/form-data'>
			
			<!-- FORM WILL BE LOADE THROUGH AJAX -->
			
		</form>

		<hr>

		<form id="live-search" class="mt-1 d-block">
		
			<div>
				<label for="search"><strong> Search </strong></label>
				<input type="text" name="search" id="search" placeholder="Enter Search String" style="width: 45%;">
			</div>

		</form>

		<div id="employee-table">
			
			<!-- DATA WILL BE LOADED THROUGH AJAX -->

		</div>

		<div id="tooltip" style="display: none;"></div>

	</div>

</body>
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>
</html>