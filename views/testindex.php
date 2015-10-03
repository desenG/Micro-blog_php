

<!DOCTYPE HTML>
    <html>
    <head>
    <meta charset="utf-8">
    <title>MicroBlog</title>
    
	<style>
	.landing{
	  background-color: #16a085;
	  height: 20px;
	  width: 220px;
	  padding: 7px;
	}
	form {
	float:left;
	margin:0 auto;
	}
	.landing p{
	float:left;
	background-color:#16a085;
	font-family: "Arial Rounded MT Bold","Helvetica Rounded",Arial,sans-serif;
	color:#fff;
	padding-left:8px;
	padding-right:8px;
	text-align: center;
	margin:0 auto;
	font-size:1rem;
	}
	.postboard{
	background-color:#f1c40f;
    height: 350px;
    width: 234px;
	}
	.postboard p{
	margin:0 auto;
	padding:10px;
	text-align: justify;
    text-justify: inter-word;
    font-family: Arial,"Helvetica Neue",Helvetica,sans-serif;
	}
	</style>
	
    </head>
   
    <body>
    



		<div class="postboard">
		<?php
		
			include("testform.php");
		
		?>
		</div>
    </body>
</html>