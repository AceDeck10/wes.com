<?php 
	$servername = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName = "wes";
	
	$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);
	if (!$conn) {
		die("Failed to connect to Database:". mysqli_connect_error() );
	}