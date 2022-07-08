<?php
include("config.php"); 
include("Mail.php");

/*Code for fetch all Graduation*/
if($_POST['callfunction'] == "GetAllGraduation")
{
	$str="";
	$res=@mysql_query("Select * From tblgraduation Where delstatus='N'");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["graduationid"].'</td>
					<td>'.$row["graduationname"].'</td>
					<td>
						<a href="#newgraduation" data-lightbox="inline" onClick="editGraduation('.$row["graduationid"].')" title="Edit Graduation"><i class="i-small icon-edit"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="deleteGraduation('.$row["graduationid"].')" title="Delete Graduation"><i class="i-small icon-trash"></i></a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "DeleteGraduation")
{
	$str="";
	@mysql_query("Update tblgraduation set delstatus='Y' where graduationid=".$_POST["gradid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Graduation Deleted"));
	
}

if($_POST['callfunction'] == "AddGraduation")
{
	@mysql_query("Insert Into tblgraduation(graduationname,delstatus) values('$_POST[gradname]','N')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Graduation Added"));
	
}

if($_POST['callfunction']=="GetGraduation")
{
	$query="select * from tblgraduation where graduationid=$_POST[gradid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["graduationid"]."@@".$row["graduationname"];
}

if($_POST['callfunction'] == "EditGraduation")
{
	$str="";
	@mysql_query("Update tblgraduation set graduationname='$_POST[gradname]' where graduationid=".$_POST["gradid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Graduation Updated"));
	
}

?>