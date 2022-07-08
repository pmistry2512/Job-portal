<?php
include("config.php"); 
include("Mail.php");

/*Code for fetch all industry*/
if($_POST['callfunction'] == "GetAllIndustry")
{
	$str="";
	$res=@mysql_query("Select * From tblindustry Where delstatus='N'");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["industryid"].'</td>
					<td>'.$row["industryname"].'</td>
					<td>
						<a href="#newindustry" data-lightbox="inline" onClick="editIndustry('.$row["industryid"].')" title="Edit Industry"><i class="i-small icon-edit"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="javascript:void(0);" onClick="deleteIndustry('.$row["industryid"].')" title="Delete Industry"><i class="i-small icon-trash"></i></a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "DeleteIndustry")
{
	$str="";
	@mysql_query("Update tblindustry set delstatus='Y' where industryid=".$_POST["indusid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Industry Deleted"));
	
}

if($_POST['callfunction'] == "AddIndustry")
{
	@mysql_query("Insert Into tblindustry(industryname,delstatus) values('$_POST[indusname]','N')") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Industry Added"));
	
}

if($_POST['callfunction']=="GetIndustry")
{
	$query="select * from tblindustry where industryid=$_POST[indusid]";
	$res=@mysql_query($query);
	$row=@mysql_fetch_assoc($res);
	echo $row["industryid"]."@@".$row["industryname"];
}

if($_POST['callfunction'] == "EditIndustry")
{
	$str="";
	@mysql_query("Update tblindustry set industryname='$_POST[indusname]' where industryid=".$_POST["indusid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Industry Updated"));
	
}

?>