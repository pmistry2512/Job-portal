<?php
session_start();
include("config.php"); 
include("Mail.php");

/*Code for fetch all Cabdidate*/
if($_POST['callfunction'] == "GetAllCandidate")
{
	$str="";
	
	$sql=@mysql_query("Select tblcandidate.*,tbldepartment.* from tbldepartment,tblcandidate where tbldepartment.departmentid=tblcandidate.departmentid And tblcandidate.departmentid=$_SESSION[LoggedDeptId]") or die(mysql_error());
	while($row=@mysql_fetch_array($sql))
	{
		$str.='<tr>
					<td>'.$row["candidatename"].'</td>
					<td>'.$row["candidateenrollno"].'</td>
					<td>'.$row["departmentname"].'</td>
					<td>'.$row["candidateemail"].'</td>
					<td>'.$row["candidatemobile"].'</td>
					<td>'.$row["candidateregdate"].'</td>
					<td>'.$row["candidatestatus"].'</td>
					<td>';
					
					if($row['candidatestatus']=='Panding' || $row['candidatestatus']=='Blocked')
					{
						$str.='<a href="javascript:void(0);" data-lightbox="inline" onClick="approveCandidate('.$row["candidateid"].')" title="Approve Candidate"><i class="icon-ok"></i></a>';
						}
						
						if($row['candidatestatus']=='Active' || $row['candidatestatus']=='Applied' || $row['candidatestatus']=='Panding')
						{
						$str.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="blockCandidate('.$row["candidateid"].')" title="Block Candidate"><i class="icon-remove"></i></a>';
						}
					$str.='</td>
				</tr>';
	}
	if(@mysql_num_rows($sql)==0)
	{
		$str='<tr><td align="center" colspan="8">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "BlockCandidate")
{
	$str="";
	@mysql_query("update tblcandidate set candidatestatus='Blocked',candidateblockby='$_SESSION[LoggedUserName]',candidateblockdate=curdate() where candidateid=$_POST[candid] ") or die (mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Candidate Blocked"));
	
	$q=@mysql_query("Select * from tblcandidate where candidateid=$_POST[candid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['candidateemail'],"Account Blocked","<b>Your Account is Blocked. To Know more detail contact your concern department Head</b>");
	
}

if($_POST['callfunction'] == "ApproveCandidate")
{
	$str="";
	@mysql_query("update tblcandidate set candidatestatus='Active' where candidateid=$_POST[candid]") or die (mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Candidate Approved"));
	$q=@mysql_query("select * from tblcandidate where candidateid=$_POST[candid]")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($r['candidateemail'],"Registration Approved","Your Account Registration Is Approved, Now You can Login to your Account");
	
}



/*Code for fetch all Company*/
if($_POST['callfunction'] == "GetAllCompany")
{
	$str="";
	$sql=@mysql_query("Select tblcompany.*,tblcity.* From tblcompany,tblcity where tblcity.cityid=tblcompany.companycity") or die(mysql_error());
	while($row=@mysql_fetch_array($sql))
	{
		$str.='<tr>
					<td>'.$row["companyname"].'</td>
					<td>'.$row["companyemail"].'</td>
					<td>'.$row["cityname"].'</td>
					<td>'.$row["companywebsite"].'</td>
					<td>'.$row["status"].'</td>
					
					<td>';
					
					if($row['status']=="Applied" || $row['status']=="Block")
					{
					
						$str.='<a href="javascript:void(0);" data-lightbox="inline" onClick="approveCompany('.$row["companyid"].')" title="Approve Company"><i class="icon-ok"></i></a>';
						}
						
						
						$str.='&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
						if($row['status']=="Active" || $row['status']=="Applied")
						{
						$str.='<a href="javascript:void(0);" onClick="blockCompany('.$row["companyid"].')" title="Block Company"><i class="icon-remove"></i></a>';
						}
					$str.='</td>
				</tr>';
	}
	if(@mysql_num_rows($sql)==0)
	{
		$str='<tr><td align="center" colspan="6">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "BlockCompany")
{
	$str="";
	@mysql_query("delete from tblcompany where companyid=$_POST[candid]") or die (mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Company Blocked"));
	
	$q=@mysql_query("Select * from tblcompany where companyid=$_POST[candid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['companyemail'],"Account Blocked","<b>Your Company Account is Blocked.</b>");
	
}

if($_POST['callfunction'] == "ApproveCompany")
{
	$str="";
	@mysql_query("update tblcompany set status='Active' where companyid=$_POST[candid]") or die (mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Company Approved"));
	
	$q=@mysql_query("Select * from tblcompany where companyid=$_POST[candid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['companyemail'],"Account Aproved","<b>Your Company Account is Approved.</b>");
	
}


?>