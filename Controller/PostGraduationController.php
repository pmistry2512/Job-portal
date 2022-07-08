<?php
include("config.php"); 
include("Mail.php");

/*Code for fetch all Post Graduation*/
if($_POST['callfunction'] == "GetAllPostgrad")
{
	$str="";
	$res=@mysql_query("Select * From tblpostgraduation Where delstatus='N'");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["postgraduationid"].'</td>
					<td>'.$row["postgraduationname"].'</td>
					<td>
						<a href="#newpostgrad" data-lightbox="inline" onClick="editPostgrad('.$row["postgraduationid"].')" title="Edit Postgrad"><i class="i-small icon-edit"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="deletePostgrad('.$row["postgraduationid"].')" title="Delete Postgrad"><i class="i-small icon-trash"></i></a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "DeletePostgrad")
{
	$str="";
	@mysql_query("Update tblpostgraduation set delstatus='Y' where postgraduationid=".$_POST["pgid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Postgraduation Deleted"));
	
}

if($_POST['callfunction'] == "AddPostgrad")
{
	@mysql_query("Insert Into tblpostgraduation(postgraduationname,delstatus) values('$_POST[pgname]','N')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Postgraduation Added"));
	
}

if($_POST['callfunction']=="GetPostgrad")
{
	$query="select * from tblpostgraduation where postgraduationid=$_POST[pgid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["postgraduationid"]."@@".$row["postgraduationname"];
}

if($_POST['callfunction'] == "EditPostgrad")
{
	$str="";
	@mysql_query("Update tblpostgraduation set postgraduationname='$_POST[pgname]' where postgraduationid=".$_POST["pgid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Postgraduation Updated"));
	
}

?>