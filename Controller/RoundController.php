<?php
include("config.php"); 
include("Mail.php");

/*Code for fetch all department*/
if($_POST['callfunction'] == "GetAllRounds")
{
	$str="";
	
	$res=@mysql_query("Select interviewround.*,tblinterview.*,tbljob.* From interviewround,tblinterview,tbljob where interviewround.interviewid=tblinterview.interviewid And tblinterview.jobid=tbljob.jobid And interviewround.interviewid=$_POST[iid]");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					
					<td>'.$row["roundname"].'</td>
					<td>'.$row["rounddate"].'</td>
					<td>'.$row["totalmarks"].'</td>
					<td>'.$row["passingmark"].'</td>
					<td>'.$row["roundstatus"].'</td>
					<td>';
						if($row['status']=='Approved')
						{
						$str.='<a href="ManageRoundCandidate.php?irid='.$row["interviewroundid"].'&iid='.$row["interviewid"].'&jobname='.$row["jobname"].'"  title="Manage Candidate">Manage Candidate</a>';
						}
						
						if($row["roundstatus"]=='Complete' && $row["status"]!='Complete')
						{
						$str.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="AddMarks.php?id='.$row["interviewroundid"].'&iid='.$row["interviewid"].'&jobname='.$row["jobname"].'" title="Add Marks">Add Marks</a>';
						}
						$str.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						
						if($row["roundstatus"]=='Complete')
						{
							$str.='<a href="ViewRoundResult.php?irid='.$row['interviewroundid'].'&iid='.$row['interviewid'].'&jobname='.$row["jobname"].'&jobid='.$row['jobid'].'" title="Delete Interview">Result</a>';
						}
						
						if($row["roundstatus"]=='Pending')
						{
							$str.='<a href="javascript:void(0);" onClick=MarkComplete('.$row['interviewroundid'].','.$row['interviewid'].') title="Mark As Compelte">Complete</a>';
						}
						
					$str.='</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="7">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "AddRound")
{
	$var = $_POST['rdate'];
	$var=date('Y-m-d', strtotime($var));
	@mysql_query("insert into interviewround (interviewid,roundname,rounddate,totalmarks,passingmark,roundstatus) Values($_POST[iid],'$_POST[rname]','$var',$_POST[drpminexp],$_POST[drpmaxexp],'Pending')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Round Added"));
	
	
	//Sending mail to Candidates who are applied in a job for which round sceduled
	$c=@mysql_query("select * from tbljob,tbljobapply,tblinterview,tblcandidate,interviewround where  interviewround.interviewid=tblinterview.interviewid And tbljobapply.candidateid=tblcandidate.candidateid And  tbljobapply.jobid=tbljob.jobid And tblinterview.jobid=tbljobapply.jobid And tblinterview.status='Approved' And tbljobapply.applicationstatus IN('Interviewed','Approved')")or die(mysql_error());
	
	while($rowc=@mysql_fetch_array($c))
	{
	$mail=new Mail();
	$result=$mail->SendMail($rowc['candidateemail'],"Round Scheduled","<b>Round Scheduled For Intervew</b>" . $rowc['jobname'].". For More Details Login to your account");
	
	//Will Display Notification on Candidate side
	$url="'Candidate_InterviewSchedule.php'";
	@mysql_query("Insert into tblnotification(candidateid,message,pageurl) values($rowc[candidateid],'Round is schedule For Job of $rowc[jobname]',$url)")or die (mysql_error());
	}
	
}

if($_POST['callfunction'] == "MarkComplete")
{
	
	@mysql_query("update interviewround set roundstatus='Complete' where interviewroundid=$_POST[ird] And interviewid=$_POST[iid]") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Round marked as complete"));
	
}
?>