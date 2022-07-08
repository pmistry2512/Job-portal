<?php

$con=@mysql_connect("localhost","root","job") or die(mysql_error());
@mysql_select_db("ssadb",$con) or die("error in selecting db");
?>