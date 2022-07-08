<?php 

/*session_start();
include("config.php");*/

$data=file_get_contents("http://localhost/SSA6TH/Report_DateWisePlacementhtml.php?sdate=$_REQUEST[sdate]&tdate=$_REQUEST[tdate]");

include ("mpdf/mpdf.php");
$mpdf=new mPDF('c');

$mpdf->WriteHTML($data);
$mpdf->Output();
exit;
 
?>