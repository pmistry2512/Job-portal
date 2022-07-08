<?php
session_start();
include("config.php"); 
include("Mail.php");

if($_POST['callfunction'] == "AcceptJob")
{
	$str="";
	$sql="Update tbljobapply set applicationstatus='jobAccepted' where jobapplyid=$_POST[jobapplyid]";
	@mysql_query($sql) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Job Accepted"));
	
	//Sending mail to company
	$q=@mysql_query("select * from tbljobapply,tbljob,tblcompany,tblcandidate where tblcandidate.candidateid=tbljobapply.candidateid And tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid and tbljobapply.jobapplyid=$_POST[jobapplyid] ")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['companyemail'],"Job Accepted By Candidate","<b>Job Accepted By Candidate <br></b> Job Name:" . $row['jobname'] ."Candidate name:" . $row['candidatename']);
	
	//Display notification company side
	$url="'HiredCandidateList_Company.php'";
	$q=@mysql_query("select * from tbljobapply,tbljob,tblcompany,tblcandidate where tblcandidate.candidateid=tbljobapply.candidateid And tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid and tbljobapply.jobapplyid=$_POST[jobapplyid] ")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification(user,candidateid,message,pageurl) values('Employer',$r[companyid],'Job Accepted By Candidate, <br> Candidate Name: $r[candidatename]',$url)")or die (mysql_error());
	
	
	//Will Display Notification on TPO side
	$qr=@mysql_query("select * from tbljobapply,tbljob,tblcompany,tblcandidate,tbladmin where tblcandidate.candidateid=tbljobapply.candidateid And tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid and tbljobapply.jobapplyid=$_POST[jobapplyid] And tblcandidate.departmentid=tbladmin.departmentid")or die(mysql_error());
	$rowc=@mysql_fetch_assoc($qr);
	$url="'HiredCandidateList.php'";
	@mysql_query("Insert into tblnotification(user,candidateid,message,pageurl) values('TPO',$rowc[adminid],'Job Accepted By Candidate<br> Job name: $rowc[jobname]<br>candidate name: $rowc[candidatename]<br>Company Name: $rowc[companyname]',$url)")or die (mysql_error());
	
	
	
}


if($_POST['callfunction'] == "RejectJob")
{
	$str="";
	$sql="Update tbljobapply set applicationstatus='jobRejected' where jobapplyid=$_POST[jobapplyid]";
	@mysql_query($sql) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Job Rejected"));
	
	//Sending mail to company
	$q=@mysql_query("select * from tbljobapply,tbljob,tblcompany,tblcandidate where tblcandidate.candidateid=tbljobapply.candidateid And tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid and tbljobapply.jobapplyid=$_POST[jobapplyid] ")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['companyemail'],"Job Rejected By Candidate","<b>Job Rejected By Candidate <br></b> Job Name:" . $row['jobname'] ."Candidate name:" . $row['candidatename']);
	
	//Display notification company side
	$url="'HiredCandidatelist.php'";
	$q=@mysql_query("select * from tbljobapply,tbljob,tblcompany,tblcandidate where tblcandidate.candidateid=tbljobapply.candidateid And tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid and tbljobapply.jobapplyid=$_POST[jobapplyid] ")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification(user,candidateid,message,pageurl) values('Employer',$r[companyid],'Job Rejected By Candidate, <br> Candidate Name: $r[candidatename]',$url)")or die (mysql_error());
	
	
	//Will Display Notification on TPO side
	$qr=@mysql_query("select * from tbljobapply,tbljob,tblcompany,tblcandidate,tbladmin where tblcandidate.candidateid=tbljobapply.candidateid And tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid and tbljobapply.jobapplyid=$_POST[jobapplyid] And tblcandidate.departmentid=tbladmin.departmentid")or die(mysql_error());
	$rowc=@mysql_fetch_assoc($qr);
	$url="'Report_CompanyWiseHiredCandidate.php'";
	@mysql_query("Insert into tblnotification(user,candidateid,message,pageurl) values('TPO',$rowc[adminid],'Job Rejected By Candidate<br> Job name: $rowc[jobname]<br>candidate name: $rowc[candidatename]<br>Company Name: $rowc[companyname]',$url)")or die (mysql_error());
	
	
	
}

?>