<?php
	
	define("DNS","mysql:host=localhost;dbname=studentdb2");
	define("DBUSER","root");
	define("DBPASS","");

	try {

		$conn = new PDO(DNS, DBUSER, DBPASS);

	} catch (PDOException $e) {

		print "Error: " . $e->getMessage()  . "<br>";

		die();

	}

?>