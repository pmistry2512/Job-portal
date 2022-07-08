<?php 

/*session_start();
include("config.php");*/

if(isset($_REQUEST['id']))
{
	$data=file_get_contents("http://localhost/SSA6TH/Report_RegisteredCandidatehtml.php?id=$_REQUEST[id]");
}
else
{
	$data=file_get_contents("http://localhost/SSA6TH/Report_RegisteredCandidatehtml.php");
}
include ("mpdf/mpdf.php");
$mpdf=new mPDF('c');

$mpdf->WriteHTML($data);
$mpdf->Output();
exit;
 
?>