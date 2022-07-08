<?php
include("config.php"); 
include("Mail.php");

/*Code for fetch all department*/
if($_POST['callfunction'] == "GetAllDepartment")
{
	$str="";
	$res=@mysql_query("Select * From tbldepartment Where delstatus='N'");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["departmentid"].'</td>
					<td>'.$row["departmentname"].'</td>
					<td>
						<a href="#newdepartment" data-lightbox="inline" onClick="editDepartment('.$row["departmentid"].')" title="Edit Department"><i class="i-small icon-edit"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="deleteDepartment('.$row["departmentid"].')" title="Delete Department"><i class="i-small icon-trash"></i></a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "DeleteDepartment")
{
	$str="";
	@mysql_query("Update tbldepartment set delstatus='Y' where departmentid=".$_POST["deptid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Department Deleted"));
	
}

if($_POST['callfunction'] == "AddDepartment")
{
	@mysql_query("Insert Into tbldepartment(departmentname,delstatus) values('$_POST[deptname]','N')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Department Added"));
	
}

if($_POST['callfunction']=="GetDepartment")
{
	$query="select * from tbldepartment where departmentid=$_POST[deptid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["departmentid"]."@@".$row["departmentname"];
}

if($_POST['callfunction'] == "EditDepartment")
{
	$str="";
	@mysql_query("Update tbldepartment set departmentname='$_POST[deptname]' where departmentid=".$_POST["deptid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Department Updated"));
	
}

?>