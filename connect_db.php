<?php
        define('DB_SERVER', 'localhost:3306');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', 'nikil@8832999');
	define('DB_NAME', 'cbit');

	/* Attempt to connect to MySQL database */
	$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	 
	// Check connection
	if($conn->connect_error){
	    die("ERROR: Could not connect " . $conn->connect_error);
	} else {
		
	}
      
 ?>       
	

