<?php

if($_SESSION["LoggedUserRole"]!='Admin')
{
	echo "<script>window.location.href='Unauthorized.php';</script>";exit;
}
?>