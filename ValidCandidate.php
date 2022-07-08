<?php

if($_SESSION["LoggedUserRole"]!='Candidate')
{
	echo "<script>window.location.href='Unauthorized.php';</script>";exit;
}
?>