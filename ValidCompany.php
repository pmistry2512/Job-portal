<?php

if($_SESSION["LoggedUserRole"]!='Employer')
{
	echo "<script>window.location.href='Unauthorized.php';</script>";exit;
}
?>