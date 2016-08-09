<?php 

	$user = $_POST['user'];
	$user_key = $_POST['user_key'];
	$url = $_POST['url'];


	$servername = "your.server.name";
	$username = "username";
	$password = "password";
	$dbname = "database_name";
	

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
	    die("Connection failed: " . mysqli_connect_error());
	}

 ?>