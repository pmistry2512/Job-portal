<?php
include("config.php"); 
include("Mail.php");

/*Code for fetch all graduationspecialization*/
if($_POST['callfunction'] == "GetAllGraduationspecialization")
{
	$str="";
	$res=@mysql_query("Select * From tblgraduationspecialization,tblgraduation Where tblgraduationspecialization.graduationid=tblgraduation.graduationid And tblgraduationspecialization.delstatus='N'");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["gradspecid"].'</td>
					<td>'.$row["gradspecname"].'</td>
					<td>'.$row["graduationname"].'</td>
					<td>
						<a href="#newgraduationspecialization" data-lightbox="inline" onClick="editGraduationspecialization('.$row["gradspecid"].')" title="Edit Graduationspecialization"><i class="i-small icon-edit"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="deleteGraduationspecialization('.$row["gradspecid"].')" title="Delete Graduationspecialization"><i class="i-small icon-trash"></i></a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="4">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "DeleteGraduationspecialization")
{
	$str="";
	@mysql_query("Update tblgraduationspecialization set delstatus='Y' where gradspecid=".$_POST["gradspid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Graduationspecialization Deleted"));
	
}

if($_POST['callfunction'] == "AddGraduationspecialization")
{
	@mysql_query("Insert Into tblgraduationspecialization(gradspecname,graduationid,delstatus) values('$_POST[gradspname]',$_POST[drpgrad],'N')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Graduationspecialization Added"));
	
}

if($_POST['callfunction']=="GetGraduationspecialization")
{
	$query="select * from tblgraduationspecialization where gradspecid=$_POST[gradspid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["gradspecid"]."@@".$row["gradspecname"]."@@".$row["graduationid"];
}

if($_POST['callfunction'] == "EditGraduationspecialization")
{
	$str="Update tblgraduationspecialization set gradspecname='$_POST[gradspname]',graduationid=$_POST[drpgrad] where gradspecid=".$_POST["gradspid"];
	
	@mysql_query($str) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Graduationspecialization Updated"));
	
}

?>