<?php 

/*session_start();
include("config.php");*/

$data=file_get_contents("http://localhost/SSA6TH/CV.php?id=$_REQUEST[id]");
include ("mpdf/mpdf.php");
$mpdf=new mPDF('c');

$mpdf->WriteHTML($data);
$mpdf->Output();
exit;
 
?>