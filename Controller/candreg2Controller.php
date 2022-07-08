<?php
session_start();
include("config.php"); 
include("Mail.php");

if(isset($_SESSION['LoggedUserRole']))
{
	if($_SESSION['LoggedUserRole']=='Candidate')
	{
		$cid=$_SESSION['LoggedUserId'];
	}

	else
	{
		$cid=$_POST['candid'];
	}
}
else
{
	$cid=$_SESSION["cid"];
}



/*Code for fetch graduation details*/
if($_POST['callfunction'] == "GetAllGraduation")
{
	
	$str="";
	
	$res=@mysql_query("Select * From tblcandidategraduation,tblgraduation,tblgraduationspecialization,tblcandidate,tbluniversity where tblcandidategraduation.graduationid=tblgraduation.graduationid And tblcandidategraduation.gradspecid=tblgraduationspecialization.gradspecid And tblcandidategraduation.candidateid=tblcandidate.candidateid And tblcandidategraduation.universityid=tbluniversity.universityid And tblcandidategraduation.candidateid=$cid");
	

	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["graduationname"].'</td>
					<td>'.$row["gradspecname"].'</td>
					<td>'.$row["universityname"].'</td>
					<td>'.$row["passingyear"].'</td>
					<td>'.$row["grade"].'</td> ';
					if(isset($_SESSION["LoggedUserId"]))
					{
						if($_SESSION["LoggedUserRole"]=='Candidate')
						{
							$str.='<td>
							<a href="javascript:void(0);" onClick="deleteGraduation('.$row["candgradid"].')" title="Delete Graduation"><i class="i-small icon-trash"></i></a>
						</td>';
						}
					}
					 if(isset($_SESSION["cid"]))
						{
							$str.='<td>
							<a href="javascript:void(0);" onClick="deleteGraduation('.$row["candgradid"].')" title="Delete Graduation"><i class="i-small icon-trash"></i></a>
						</td>';
						}
				$str.='</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="6">No data to display</td></tr>';
	}
	echo $str;
}


if($_POST['callfunction'] == "AddGraduation")
{
	@mysql_query("Insert Into tblcandidategraduation(graduationid,gradspecid,candidateid,universityid,passingyear,grade) values($_POST[drpgrad],$_POST[drpspec],$_SESSION[cid],$_POST[drpuni],$_POST[year],'$_POST[grade]')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Graduation Added"));
	
}

if($_POST['callfunction'] == "DeleteGraduation")
{
	$str="";
	@mysql_query("Delete from tblcandidategraduation where candgradid=".$_POST["candgradid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Grdauation Deleted"));
	
}

if($_POST['callfunction'] == "DeletePostGraduation")
{
	$str="";
	@mysql_query("Delete from tblcandidatepostgrad where candpostid=".$_POST["candpostgradid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Post Grdauation Deleted"));
	
}

if($_POST['callfunction'] == "AddPostGraduation")
{
	@mysql_query("Insert Into tblcandidatepostgrad(postgraduationid,postspecid,candidateid,universityid,passingyear,grade) values($_POST[drppostgrad],$_POST[drppostspec],$_SESSION[cid],$_POST[drppostgraduni],$_POST[pgyear],'$_POST[pggrade]')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Post Graduation Added"));
	
}



/*Code for fetch graduation details*/
if($_POST['callfunction'] == "GetAllPostGraduation")
{
	$str="";
$res=@mysql_query("Select * From tblcandidatepostgrad,tblpostgraduation,tblpostgradspecialization,tblcandidate,tbluniversity where tblcandidatepostgrad.postgraduationid=tblpostgraduation.postgraduationid And tblcandidatepostgrad.postspecid=tblpostgradspecialization.postspecid And tblcandidatepostgrad.candidateid=tblcandidate.candidateid And tblcandidatepostgrad.universityid=tbluniversity.universityid And tblcandidatepostgrad.candidateid=$cid");
	
		
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["postgraduationname"].'</td>
					<td>'.$row["postspecname"].'</td>
					<td>'.$row["universityname"].'</td>
					<td>'.$row["passingyear"].'</td>
					<td>'.$row["grade"].'</td>';
					if(isset($_SESSION['LoggedUserId']))
					{
					if($_SESSION["LoggedUserRole"]=='Candidate')
					{
					
					$str.='
					<td>
				<a href="javascript:void(0);" onClick="deletePostGraduation('.$row["candpostid"].')" title="Delete Post Graduation"><i class="i-small icon-trash"></i></a>
					</td>';
					}
					}
					 if(isset($_SESSION["cid"]))
						{
							$str.='<td>
							<a href="javascript:void(0);" onClick="deleteGraduation('.$row["candpostid"].')" title="Delete Graduation"><i class="i-small icon-trash"></i></a>
						</td>';
						}
				$str.='</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="6">No data to display</td></tr>';
	}
	echo $str;
}
?>
