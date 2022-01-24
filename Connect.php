<?php
//Create Connection

// 	$conn = mysqli_connect("localhost", "root", "", "ittaskmanager");
$conn = mysqli_connect("us-cdbr-east-05.cleardb.net", "b22259f703577d", "acb562b9", "heroku_f2f9053ce56406f");
// Check connection
	if($conn === false){
        //If Connection Fails 
	die("ERROR: Could not connect. Please check-". mysqli_connect_error());
}
?>
