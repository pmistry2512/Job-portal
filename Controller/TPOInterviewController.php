<?php
session_start();
include("config.php"); 
include("Mail.php");

if($_POST['callfunction'] == "ApproveApp")
{
	$str="";
	$sql="Update tblinterview set status='Approved',approvedby='$_SESSION[LoggedUserName]',approveddate=curdate() where interviewid=$_POST[intid]";
	@mysql_query($sql) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Schedule Approved"));
	
	//Sending mail to company
	$q=@mysql_query("select * from tblinterview,tbljob,tblcompany where tblinterview.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tblinterview.interviewid=$_POST[intid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['companyemail'],"Interview Schedule Approved","<b>Your Inter Schedule is Approved for job of </b>" . $row['jobname']);
	//Display notification company side
	$url="'listinterview.php'";
	$q=@mysql_query("select * from tblinterview,tbljob,tblcompany where tblinterview.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tblinterview.interviewid=$_POST[intid]")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification(user,candidateid,message,pageurl) values('Employer',$r[companyid],'Interview schedule is approved For Job of $r[jobname]',$url)")or die (mysql_error());
	
	//Sending mail to Candidates who are applied in a job for which interview sceduled
	$c=@mysql_query("select * from tbljob,tbljobapply,tblinterview,tblcandidate where tbljobapply.candidateid=tblcandidate.candidateid And  tbljobapply.jobid=tbljob.jobid And tblinterview.jobid=tbljobapply.jobid And tblinterview.status='Approved' And tbljobapply.applicationstatus IN('Interviewed','Approved')")or die(mysql_error());
	
	while($rowc=@mysql_fetch_array($c))
	{
	$mail=new Mail();
	$result=$mail->SendMail($rowc['candidateemail'],"Interview Scheduled","<b>Interview is Scheduled for job of </b>" . $rowc['jobname'].". For More Details Login to your account");
	
	//Will Display Notification on Candidate side
	$url="'Candidate_InterviewSchedule.php'";
	@mysql_query("Insert into tblnotification(candidateid,message,pageurl) values($rowc[candidateid],'Interview is schedule For Job of $rowc[jobname]',$url)")or die (mysql_error());
	}
	
	
}

if($_POST['callfunction'] == "RejectApp")
{
	$str="";
	$sql="Update tblinterview set status='Rejected',approvedby='$_SESSION[LoggedUserName]',approveddate=curdate() where interviewid=$_POST[intid]";
	@mysql_query($sql) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Schedule Approved"));
	
	$q=@mysql_query("select * from tblinterview,tbljob,tblcompany where tblinterview.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tblinterview.interviewid=$_POST[intid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['companyemail'],"Interview Schedule Rejected","<b>Your Inter Schedule is Rejected for job of </b>" . $row['jobname']);
	
	$url="'listinterview.php'";
	$q=@mysql_query("select * from tblinterview,tbljob,tblcompany where tblinterview.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tblinterview.interviewid=$_POST[intid]")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification (user,candidateid,message,pageurl) values('Employer',$r[companyid],'Interview schedule id Rejected For Job of $r[jobname]',$url)")or die (mysql_error());
	
}

?>