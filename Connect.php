<?php
//Create Connection
	$conn = mysqli_connect("localhost", "root", "", "ittaskmanager");
		// Check connection
	if($conn === false){
        //If Connection Fails 
	die("ERROR: Could not connect. Please check-". mysqli_connect_error());
}
?>