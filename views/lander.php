<?php

require_once("../config/db.php");
require_once("../classes/Login.php");
require_once("../classes/Message.php");

$login = new Login();
$message = new Message();

?>

<!DOCTYPE HTML>
    <html>
    <head>
    <meta charset="utf-8">
    <title>MicroBlog</title>
    
	<link rel="stylesheet" href="../style/style.css" media="screen" type="text/css" />
	
    </head>
   
    <body>
    
    	<div class="landing">
		<?php

		
		if ($login->isUserLogIn() == true) 
		{
			include("v_top_login.php");
		}
		else if ($login->isUserLoggedIn() == true)
		{
			
			include("v_top_loggedIn.php");
		}
		else 
		{
			include("v_top_loggedOut.php");
		}

		
		?>    	
		</div>

		<div class="postboard">
		<?php
		
			$message->displayList();
		
		?>
		
		<?php 
			if ($login->isUserLoggedIn() == true)
			{
				
				include("v_bottom_loggedIn.php");
			}
		?>
		   
		</div>
		
    </body>
</html>