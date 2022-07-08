<?php 

/*session_start();
include("config.php");*/

	$data=file_get_contents("http://localhost/SSA6TH/Report_DesiignationWiseHiredCandidatehtml.php?cid=$_REQUEST[cid]&userid=$_REQUEST[userid]&userrole=$_REQUEST[userrole]&deptid=$_REQUEST[deptid]");

include ("mpdf/mpdf.php");
$mpdf=new mPDF('c');

$mpdf->WriteHTML($data);
$mpdf->Output();
exit;
 
?>