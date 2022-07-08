<?php 

/*session_start();
include("config.php");*/

	$data=file_get_contents("http://localhost/SSA6TH/Report_CompanyInterviewhtml.php?cid=$_REQUEST[cid]&userid=$_REQUEST[userid]");

include ("mpdf/mpdf.php");
$mpdf=new mPDF('c');

$mpdf->WriteHTML($data);
$mpdf->Output();
exit;
 
?>