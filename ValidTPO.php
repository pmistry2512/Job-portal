<?php

if($_SESSION["LoggedUserRole"]!='TPO')
{
	echo "<script>window.location.href='Unauthorized.php';</script>";exit;
}
?>