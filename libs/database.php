<?php
	require('config/database.php');

	function connectToDB(){
		// Creating connection
		$con = mysqli_connect($dbHost, $dbUserName, $dbPassword, $dbName);
		// Check connection
		if (mysqli_connect_errno($con)){
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
			return false;
		}
		return $con;
	}

?>