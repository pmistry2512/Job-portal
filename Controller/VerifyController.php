<?php
session_start();
include("config.php"); 
include("Mail.php");


if($_POST['callfunction'] == "CandidateVerify")
{
	$str="";
	$random=rand(1,9999);
	@mysql_query("Update tblcandidate set verificationcode=$random where candidateid=$_SESSION[LoggedUserId]") or die(mysql_error());
	$mail=new Mail();
	$result=$mail->SendMail("$_SESSION[LoggedUser]","Verify Email","<b>Your Verification Code:</b>".$random);
	
}

if($_POST['callfunction'] == "Verify")
{
	$str="";
	$sql=@mysql_query("select * from tblcandidate where candidateid=$_SESSION[LoggedUserId]") or die(mysql_error());
	$row=@mysql_fetch_assoc($sql);
	if($_POST['txtcode']==$row['verificationcode'])
	{
		
		echo json_encode(array("status"=>"success","msg"=>"Email Verified Sucessfully"));
		@mysql_query("update tblcandidate set emailverified='Y' where candidateid=$_SESSION[LoggedUserId]")or die(mysql_error());
	}
	else
	{
		echo json_encode(array("status"=>"error","msg"=>"Email Not Verified"));
	}

	
}

if($_POST['callfunction'] == "ComapnyVerify")
{
	$str="";
	$random=rand(1,9999);
	
	@mysql_query("Update tblcompany set verificationcode=$random where companyid=$_SESSION[LoggedUserId]") or die(mysql_error());

	$mail=new Mail();
	$result=$mail->SendMail("$_SESSION[LoggedUser]","Verify Company Email","<b>Your Verification Code:</b>".$random);
	
}

if($_POST['callfunction'] == "Verification")
{
	$str="";
	$sql=@mysql_query("select * from tblcompany where companyid=$_SESSION[LoggedUserId]") or die(mysql_error());
	$row=@mysql_fetch_assoc($sql);
	if($_POST['txtcode']==$row['verificationcode'])
	{
		
		echo json_encode(array("status"=>"success","msg"=>"Email Verified Sucessfully"));
		@mysql_query("update tblcompany set emailverified='Y' where companyid=$_SESSION[LoggedUserId]")or die(mysql_error());
	}
	else
	{
		echo json_encode(array("status"=>"error","msg"=>"Email Not Verified"));
	}

	
}


?>