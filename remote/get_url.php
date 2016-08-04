<?php 
	
	require_once 'conn.php';

	# This script takes username and password from python script. If found valid, it returns the lock_url of particular user.
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

	function get_url($username, $password, $connection){
		if (validate_user($username, $password, $connection)) {
			$sql = "SELECT `url` FROM `main` WHERE `username` = '".$username."' AND `password` = '".$password."'";
			$result = mysqli_query($connection, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
		        	return $row["url"];
	   			}
	   		}else{
	   			return 0;
	   		}
		}else{
			return 0;
		}
	}

	$url = get_url($user, $user_key, $conn);
	if ($url) {
		echo "{ \"success\" : 1, \"url\" : \"".$url."\" }";
	}
?>