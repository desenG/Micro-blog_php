<?php

require_once("../config/db.php");
require_once("../classes/Registration.php");

$registration = new Registration();

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up</title>
<link rel="stylesheet" href="../style/style.css" media="screen" type="text/css" />
</head>
 
<body>
		<div class="landing">
		<p>PHP Blog</p>
		</div>
		
		<div class="signupBG">
		
		<h1>Sign up to post your stuff</h1>
		<p>Please enter a name and password</p>
		
		<form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
		Name:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="user_name_new">
		<br>
		<br>
		Password:<input type="text" name="user_password_new">
		
		<div class="SUbt">
		<button type="submit" name="signup" value="register">Sign Up</button>
		<button type="submit" name="signup" value="cancel">&nbsp;Cancel&nbsp;</button>
		</div>
		
		</form>

		</div>
		

		

    
    </body>
</html>