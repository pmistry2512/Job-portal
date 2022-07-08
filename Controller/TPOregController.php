<?php
session_start();
include("config.php"); 
include("Mail.php");


/*Code for TPO registration*/
if($_POST['callfunction'] == "tporegistration")
{
	$q=@mysql_query("Select * from tbladmin where departmentid=$_POST[department]") or die(mysql_error);
							$r=@mysql_fetch_assoc($q);						
							if($r['departmentid']==$_POST['department'])
							{
						
								echo json_encode(array("status"=>"fail","msg"=>"TPO Already Assigned"));
						
							
							}
							else
							{
							$pass=base64_encode($_POST["txtpass"]);
								$query="insert into tbladmin (adminname,adminemail,adminpass,departmentid,issuperadmin,status) values('$_POST[txtname]','$_POST[txtemail]','$pass',$_POST[department],0,'$_POST[status]')";
	
								@mysql_query($query) or die(mysql_error());
								echo json_encode(array("status"=>"success","msg"=>"TPO Registered"));	
							}
}

/*Code for fetch all TPO*/
if($_POST['callfunction'] == "GetAllTPO")
{
	$str="";
	$sql=@mysql_query("Select tbladmin.*,tbldepartment.* from tbladmin,tbldepartment where tbladmin.issuperadmin=0 And tbldepartment.departmentid=tbladmin.departmentid") or die(mysql_error());
	while($row=@mysql_fetch_array($sql))
	{
		$str.='<tr>
					<td>'.$row["adminname"].'</td>
					<td>'.$row["adminemail"].'</td>
					<td>'.$row["departmentname"].'</td>
					<td>'.$row["status"].'</td>
					
					
					<td>
					
						<a href="javascript:void(0);" data-lightbox="inline" onClick="editTPO('.$row["adminid"].')" title="Edit TPO"><i class="icon-edit"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="blockTPO('.$row["adminid"].')" title="Block TPO"><i class="icon-remove"></i></a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($sql)==0)
	{
		$str='<tr><td align="center" colspan="5">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "BlockTPO")
{
	$str="";
	@mysql_query("Update tbladmin set status='Block' where adminid=$_POST[candid]") or die (mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"TPO Blocked"));
	
}

if($_POST['callfunction']=="GetTPO")
{
	$query="select * from tbladmin where adminid=$_POST[candid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["adminid"]."@@".$row["adminname"]."@@".$row["adminemail"]."@@".$row["departmentid"]."@@".$row["status"];
}
if($_POST['callfunction'] == "EditTPO")

{
	$str="";
	$sql="Update tbladmin set adminname='$_POST[txtname]',adminemail='$_POST[txtemail]',departmentid=$_POST[department],status='$_POST[status]' where adminid=$_POST[candid]";

	@mysql_query($sql) or die (mysql_error());
	
	echo json_encode(array("status"=>"success","msg"=>"TPO Updated"));
	
}

?>