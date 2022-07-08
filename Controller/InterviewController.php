<?php
session_start();
include("config.php"); 
include("Mail.php");

/*Code for fetch all department*/
if($_POST['callfunction'] == "GetAllInterview")
{
	$str="";
	
	$res=@mysql_query("Select * From tblinterview,tbljob Where tblinterview.jobid=tbljob.jobid And tbljob.companyid=$_SESSION[LoggedUserId] And delstatus='N'");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["interviewid"].'</td>
					<td>'.$row["jobname"].'</td>
					<td>'.$row["interviewlocation"].'</td>
					<td>'.$row["interviewdate"].'</td>
					<td>'.$row["interviewtime"].'</td>
					<td>'.$row['status'].'</td>
					<td>';
					if($row['status']!='Approved' && $row['status']!='Complete')
					{
						$str.='<a href="#newinterview" data-lightbox="inline" onClick="editInterview('.$row["interviewid"].')" title="Edit Interview"><i class="i-small icon-edit"></i></a>';
						}
						
						if($row['status']!='Complete')
					{
						$str.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="deleteInterview('.$row["interviewid"].')" title="Delete Interview"><i class="i-small icon-trash"></i></a>';
						}
						
						
						
						
						if($row['status']=='Approved' || $row['status']=='Complete')
						{
						$str.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="ManageRound.php?iid='.$row['interviewid'].'&jobname='.$row['jobname'].'" title="Manage Rounds">Manage Rounds</a>';
						
						
						
						}
						if($row['status']=='Approved')
						{
						$str.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#" title="Mark Interview complete" onClick="markcomplete('.$row['interviewid'].')">Mark as Complete</a>';
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

if($_POST['callfunction'] == "DeleteInterview")
{
	$str="";
	@mysql_query("Delete from tblinterview where interviewid=".$_POST["intid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Interview Deleted"));
	
}

if($_POST['callfunction'] == "MarkComplete")
{
	$str="";
	@mysql_query("Update tblinterview set status='Complete' where interviewid=".$_POST["intid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Interview marked as complete"));
	
}

if($_POST['callfunction'] == "AddInterview")
{
	$var = $_POST['intdate'];
	$today_date=date('Y-m-d');
	$current_date=strtotime($today_date);
	$future_date=strtotime($var);
	if($current_date>$future_date)
	{
			
		echo json_encode(array("status"=>"error","msg"=>"Invalid interview date. You Entered Past Date"));
	}
	else
	{
	$var=date('Y-m-d', strtotime($var));
	
	@mysql_query("Insert Into tblinterview(jobid,interviewlocation,interviewdate,interviewtime,status) values($_POST[drpjob],'$_POST[location]','$var','$_POST[inttime]','Applied')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"interview Added"));
	
	
	//sending mail to TPO when interview added by company
	$q=@mysql_query("Select * from tblinterview,tbljob,tbladmin where tblinterview.jobid=tbljob.jobid And tbljob.departmentid=tbladmin.departmentid")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['adminemail'],"Interview Scheduled","<b>Interview is Scheduled In your department. For More Details Login to  =your account.</b>");
	
	//Display notification TPO side
	$url="'TPO_ManageInterview.php'";
	$q=@mysql_query("Select * from tblinterview,tbljob,tbladmin where tblinterview.jobid=tbljob.jobid And tbljob.departmentid=tbladmin.departmentid")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification(user,candidateid,message,pageurl) values('TPO',$r[adminid],'Interview scheduled in your department.',$url)")or die (mysql_error());
	
	
	}
	
}

if($_POST['callfunction']=="GetInterview")
{
	$query="select * from tblinterview,tbljob where tblinterview.jobid=tbljob.jobid And  tblinterview.interviewid=$_POST[intid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["interviewid"]."@@".$row["jobname"]."@@".$row["interviewlocation"]."@@".$row["interviewdate"]."@@".$row["interviewtime"];
}

if($_POST['callfunction'] == "EditInterview")
{
	
	
	$str="";
	$var = $_POST['intdate'];
	$var=date('Y-m-d', strtotime($var));
	@mysql_query("Update tblinterview set jobid=$_POST[drpjob],interviewlocation='$_POST[location]',interviewdate='$var',interviewtime='$_POST[inttime]' where interviewid=".$_POST["intid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Interview Updated"));
	
}

?>