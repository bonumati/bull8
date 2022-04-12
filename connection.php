<?php
	$conn=mysqli_connect("esports.czzk0kvky5vn.ap-south-1.rds.amazonaws.com:3306", "admin", "esportsbull", "esports");
	// Check connection
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	// else{
	// 	echo "Connected TO DB :)";
	// }
?>

