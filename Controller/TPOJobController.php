<?php
session_start();
include("config.php"); 
include("Mail.php");

if($_POST['callfunction'] == "ApproveApp")
{
	$str="";
	$sql="Update tbljobapply set applicationstatus='Approved',approvedby='$_SESSION[LoggedUserName]',approveddate=curdate() where candidateid=$_POST[candid] And jobid=$_POST[jobid]";
	@mysql_query($sql) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Application Approved"));
	
	$q=@mysql_query("Select * from tbljobapply,tblcandidate where tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.candidateid=$_POST[candid] And tbljobapply.jobid=$_POST[jobid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['candidateemail'],"Job Application Approved","<b>Your Job Application is Approved by TPO. For more details Login to your Account</b>");
	
	$url="'MyJobs.php'";
	$q=@mysql_query("Select * from tbljob where jobid=$_POST[jobid]")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification (candidateid,message,pageurl) values($_POST[candid],'Youur job application approved by TPO For Job of $r[jobname]',$url)")or die (mysql_error());
	
}

if($_POST['callfunction'] == "RejectApp")
{
	$str="";
	$sql="Update tbljobapply set applicationstatus='Rejected',approvedby='$_SESSION[LoggedUserName]',approveddate=curdate() where candidateid=$_POST[candid] And jobid=$_POST[jobid]";
	@mysql_query($sql) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Application Rejected"));
	
	
	$q=@mysql_query("Select * from tbljobapply,tblcandidate where tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.candidateid=$_POST[candid] And tbljobapply.jobid=$_POST[jobid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['candidateemail'],"Job Application Rejected","<b>Your Job Application is Rejected by TPO. For more details Login to your Account</b>");
	
	$url="'MyJobs.php'";
	$q=@mysql_query("Select * from tbljob where jobid=$_POST[jobid]")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification (candidateid,message,pageurl) values($_POST[candid],'Youur job application Rejected by TPO For Job of $r[jobname]',$url)")or die (mysql_error());
	
}

?>