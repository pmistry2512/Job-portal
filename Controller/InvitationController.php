<?php
session_start();
include("config.php"); 
include("Mail.php");

//Accept Invitation By Candidate
if($_POST['callfunction'] == "AccpetInvite")
{
	$str="";
	$sql="Insert into tbljobapply (jobid,candidateid,applicationdate,applicationstatus) values($_POST[jobid],$_SESSION[LoggedUserId],curdate(),'Interviewed')";
	@mysql_query($sql) or die(mysql_error());
	@mysql_query("Update tbljobinvite set invitestatus='Accepted' where jobinviteid=$_POST[inviteid]") or die (mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Invitation Accepted"));
	
}

//Approve Invitation By TPo
if($_POST['callfunction'] == "ApproveInvite")
{
	//$str="";
	@mysql_query("update tbljobinvite set invitestatus='Approved',approvedby='$_SESSION[LoggedUserName]',approveddate=curdate() where jobinviteid=$_POST[inviteid]") or die (mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Invitation Approved"));
	
	//sending mail to candidate
	$q=@mysql_query("Select * from tbljobinvite,tblcandidate where tbljobinvite.candidateid=tblcandidate.candidateid And tbljobinvite.jobinviteid=$_POST[inviteid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['candidateemail'],"Job Invitation","<b>You are invited for job. for more detail login to your account</b>");
	
	//sending notification to candidate.
	$url="'MyInvitation.php'";
	//$q=@mysql_query("Select * from tbljob where jobid=$_POST[jobid]")or die(mysql_error());
	//$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification (candidateid,message,pageurl) values($row[candidateid],'You Are invited For Job',$url)")or die (mysql_error());
	
	
	
}

//Reject Invitation By Candidate
if($_POST['callfunction'] == "RejectInvite")
{
	//$str="";
	$sql="update tbljobinvite set invitestatus='Rejected',approvedby='$_SESSION[LoggedUserName]',approveddate=curdate() where jobinviteid=$_POST[inviteid]";
	@mysql_query($sql) or die(mysql_error());
	
	echo json_encode(array("status"=>"success","msg"=>"Invitation Rejected"));
	
	//sending mail to Company
	$q=@mysql_query("Select * from tbljobinvite,tblcandidate,tblcompany,tbljob where tbljobinvite.jobid=tbljob.jobid And  tbljobinvite.candidateid=tblcandidate.candidateid And tbljobinvite.jobinviteid=$_POST[inviteid] And tbljobinvite.companyid=tblcompanyid")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['companyemail'],"Job Invite Rejected By Candidate","<b>Your Job invitation is rehected by candidate<br>Job Name: $row[jobname] <br> Candidate Name: $row[candidatename]</b>");
	
	//sending notification to company
	$url="'#'";
	@mysql_query("Insert into tblnotification (user,candidateid,message,pageurl) values('Employer',$row[companyid],'Invitationis rejected by candidate<br>Job Name: $row[jobname]<br>candidate name: $row[candidatename]',$url)")or die (mysql_error());
	
	//sending notification to TPO
	$qr=@mysql_query("Select * from tbljobinvite,tblcandidate,tblcompany,tbljob,tbladmin where tblcandidate.departmentid=tbladmin.departmentid And tbljobinvite.jobid=tbljob.jobid And  tbljobinvite.candidateid=tblcandidate.candidateid And tbljobinvite.jobinviteid=$_POST[inviteid] And tbljobinvite.companyid=tblcompanyid")or die(mysql_error());
	$rw=@mysql_fetch_assoc($qr);
	@mysql_query("Insert into tblnotification (user,candidateid,message,pageurl) values('TPO',$rw[companyid],'Invitationis rejected by candidate<br>Job Name: $rw[jobname]<br>candidate name: $rw[candidatename]',$url)")or die (mysql_error());
	
	
	
}

//Reject Invitation By TPO
if($_POST['callfunction'] == "RejectInviteTPO")
{
	//$str="";
	@mysql_query("update tbljobinvite set invitestatus='rejected',approvedby='$_SESSION[LoggedUserName]',approveddate=curdate() where jobinviteid=$_POST[inviteid]") or die (mysql_error());
			echo json_encode(array("status"=>"success","msg"=>"Invitation Rejected"));
			
	
	
	
}




?>