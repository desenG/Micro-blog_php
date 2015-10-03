<?php

require_once("config/db.php");

// Create connection
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS,DB_NAME);
if ($connect){
	echo "Congratulations!\n<br>";
	echo "Successfully connected to MySQL database server.\n<br>";
	
	$sqlQuery = " SELECT message_text FROM messages ";
	$result = mysqli_query($connect, $sqlQuery);
	
	if( $result )
	{
		while( $row = mysqli_fetch_assoc($result) )
		{
			echo "<p> " . $row['message_text'] . "</p>\n\t\t" . "<hr>";
		}
	}
	else
	{
		//if $result was not set display error messages from our link
		echo "<p>" . mysqli_error( $db_link ) . "</p>\n\t\t";
	}
	
}else{
	$error = mysql_error();
	echo "Could not connect to the database. Error = $error.\n<br>";
	exit();
}

mysqli_close($connect);


?>