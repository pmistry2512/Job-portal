<?php
include("config.php"); 
include("Mail.php");

/*Code for fetch all postgraduationspecialization*/
if($_POST['callfunction'] == "GetAllPostgraduationspecialization")
{
	$str="";
	$res=@mysql_query("Select * From tblpostgradspecialization,tblpostgraduation Where tblpostgradspecialization.postgraduationid=tblpostgraduation.postgraduationid And tblpostgradspecialization.delstatus='N'");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["postspecid"].'</td>
					<td>'.$row["postspecname"].'</td>
					<td>'.$row["postgraduationname"].'</td>
					<td>
						<a href="#newpostgraduationspecialization" data-lightbox="inline" onClick="editPostgraduationspecialization('.$row["postspecid"].')" title="Edit Postgraduationspecialization"><i class="i-small icon-edit"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="deletePostgraduationspecialization('.$row["postspecid"].')" title="Delete Postgraduationspecialization"><i class="i-small icon-trash"></i></a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="4">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "DeletePostgraduationspecialization")
{
	$str="";
	@mysql_query("Update tblpostgradspecialization set delstatus='Y' where postspecid=".$_POST["pgradspid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Postgraduationspecialization Deleted"));
	
}

if($_POST['callfunction'] == "AddPostgraduationspecialization")
{
	@mysql_query("Insert Into tblpostgradspecialization(postspecname,postgraduationid,delstatus) values('$_POST[pgradspname]',$_POST[drpgrad],'N')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Postgraduationspecialization Added"));
	
}

if($_POST['callfunction']=="GetPostgraduationspecialization")
{
	$query="select * from tblpostgradspecialization where postspecid=$_POST[pgradspid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["postspecid"]."@@".$row["postspecname"]."@@".$row["postgraduationid"];
}

if($_POST['callfunction'] == "EditPostgraduationspecialization")
{
	$str="";
	@mysql_query("Update tblpostgradspecialization set postspecname='$_POST[pgradspname]',postgraduationid=$_POST[drpgrad] where postspecid=".$_POST["pgradspid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Postgraduationspecialization Updated"));
	
}

?>