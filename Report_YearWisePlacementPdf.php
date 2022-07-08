<?php 

/*session_start();
include("config.php");*/


	$data=file_get_contents("http://localhost/SSA6TH/Report_YearWisePlacementhtml.php?cid=$_REQUEST[cid]&userrole=$_REQUEST[user]&deptid=$_REQUEST[deptid]&userid=$_REQUEST[userid]");

include ("mpdf/mpdf.php");
$mpdf=new mPDF('c');

$mpdf->WriteHTML($data);
$mpdf->Output();
exit;
 
?>