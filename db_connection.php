<html>
<head><h1></h1>
</head>


	<body>
	<?php
	$dbServer="localhost";
	$dbUsername="root";
	$dbPass="";
	$dbName="online_marketplace";
	$dbConn= mysqli_connect($dbServer, $dbUsername, $dbPass, $dbName);
	
	if(mysqli_connect_errno()){
		die;
	} else {
		echo"db connected properly.";
	}
	
	?>	
	
	</body>


<html>