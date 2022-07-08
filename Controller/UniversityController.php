<?php
include("config.php"); 
include("Mail.php");

/*Code for fetch all university*/
if($_POST['callfunction'] == "GetAllUniversity")
{
	$str="";
	$res=@mysql_query("Select * From tbluniversity Where delstatus='N'");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["universityid"].'</td>
					<td>'.$row["universityname"].'</td>
					<td>
						<a href="#newuniversity" data-lightbox="inline" onClick="editUniversity('.$row["universityid"].')" title="Edit University"><i class="i-small icon-edit"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="deleteUniversity('.$row["universityid"].')" title="Delete University"><i class="i-small icon-trash"></i></a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "DeleteUniversity")
{
	$str="";
	@mysql_query("Update tbluniversity set delstatus='Y' where universityid=".$_POST["uniid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"University Deleted"));
	
}

if($_POST['callfunction'] == "AddUniversity")
{
	@mysql_query("Insert Into tbluniversity(universityname,delstatus) values('$_POST[uniname]','N')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"University Added"));
	
}

if($_POST['callfunction']=="GetUniversity")
{
	$query="select * from tbluniversity where universityid=$_POST[uniid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["universityid"]."@@".$row["universityname"];
}

if($_POST['callfunction'] == "EditUniversity")
{
	$str="";
	@mysql_query("Update tbluniversity set universityname='$_POST[uniname]' where universityid=".$_POST["uniid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"University Updated"));
	
}

?>