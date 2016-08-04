<?php
	
	require_once 'conn.php';

	# This script takes in data from python script and is validated/inserted into db.
	# If user exists, its url is updated by the lock_url sent.
	# If user doesn't exist then the data is appended into DB (username,password,url)
	function user_exists($username, $password, $connection)
	{
		// get all users from the database
		$sql = "SELECT `username` FROM `main` WHERE `username` = '".$username."'";

		$result = mysqli_query($connection, $sql);
		echo mysqli_error($connection);

		if (mysqli_num_rows($result) > 0) {
	    	return 1;
		} else {
		    return 0;
		}
	}
	function validate_user($username,$password,$connection)
	{
		$sql = "SELECT `username`,`password` FROM `main` WHERE `username` = '".$username."' AND `password` = '".$password."'";
		$result = mysqli_query($connection, $sql);

		if (mysqli_num_rows($result) > 0) {
	    	return 1;
		} else {
		    return 0;
		}	
	}
	function update_url($username, $password, $url,$connection)
	{
		if (validate_user($username, $password, $connection)) {
			// Correct username and password!
			$sql = "UPDATE `main` set `url` = '".$url."' WHERE `username` = '".$username."'";
			
			if (mysqli_query($connection, $sql)) {
		    	return 1;
			} else {
			    return 0;
			}
		}else{
			// username and password incorrect!
			return 0;
		}	
	}
	function insert_new_user($username,$password,$url,$connection)
	{
		$sql = "INSERT INTO main (username, password, url) VALUES  ('".$username."', '".$password."', '".$url."')";

		if (mysqli_query($connection, $sql)) {
		    return 1;
		} else {
	    return 0;
		}
	}

	
	if(user_exists($user, $user_key, $conn)){
		if(update_url($user, $user_key, $url, $conn)){
			echo "{\"success\" : 1}";
		}else{
			echo "{\"success\" : \"Update Failed\";}";
		}
	}else{
		if(insert_new_user($user, $user_key, $url, $conn)){
			echo "{\"success\" : 1}";
		}else{
			echo "{\"success\" : \"Insert Failed\"}";
		}
	}
?>

 