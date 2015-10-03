<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname="helen";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if ($conn){
	echo "Congratulations!\n<br>";
	echo "Successfully connected to MySQL database server.\n<br>";
}else{
	$error = mysql_error();
	echo "Could not connect to the database. Error = $error.\n<br>";
	exit();
}
mysqli_close($conn);
echo  "dfdfd"
?>