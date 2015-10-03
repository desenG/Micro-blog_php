

<form action="<?php $_SERVER['PHP_SELF'] ?>" method="GET">
	<button type="submit" name="logout" value="logout">Log out</button>
</form>


<?php 
//validation removed..

if (isset($_GET['logout']))
{

//do snazzy stuff
print('logout pressed');

}




?>