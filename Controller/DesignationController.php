<?php
include("config.php"); 
include("Mail.php");

/*Code for fetch all department*/
if($_POST['callfunction'] == "GetAllDesignation")
{
	$str="";
	$res=@mysql_query("Select * From tbldesignation Where delstatus='N'");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["designationid"].'</td>
					<td>'.$row["designationname"].'</td>
					<td>
						<a href="#newdesignation" data-lightbox="inline" onClick="editDesignation('.$row["designationid"].')" title="Edit Designation"><i class="i-small icon-edit"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="deleteDesignation('.$row["designationid"].')" title="Delete Designation"><i class="i-small icon-trash"></i></a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "DeleteDesignation")
{
	$str="";
	@mysql_query("Update tbldesignation set delstatus='Y' where designationid=".$_POST["desigid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Designation Deleted"));
	
}

if($_POST['callfunction'] == "AddDesignation")
{
	@mysql_query("Insert Into tbldesignation(designationname,delstatus) values('$_POST[designame]','N')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Designation Added"));
	
}

if($_POST['callfunction']=="GetDesignation")
{
	$query="select * from tbldesignation where designationid=$_POST[desigid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["designationid"]."@@".$row["designationname"];
}

if($_POST['callfunction'] == "EditDesignation")
{
	$str="";
	@mysql_query("Update tbldesignation set designationname='$_POST[designame]' where designationid=".$_POST["desigid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Designation Updated"));
	
}

?>