<?php
session_start();
include("config.php");
if($_POST['callfunction'] == "GetTopNotification")
{
	$str="";
	
	$res=@mysql_query("Select * From tblnotification Where status='Unread' and user='$_SESSION[LoggedUserRole]' and candidateid=$_SESSION[LoggedUserId] order by notificationdate desc Limit 0,5");
	
	while($row=@mysql_fetch_array($res))
	{
		$date=strtotime($row["notificationdate"]);
		$str.='<div class="top-cart-item clearfix">
					<div class="top-cart-item-desc">
						<a href="'.$row["pageurl"].'" onClick=setRead('.$row["notificationid"].')>'.$row["message"].'</a>
						<span class="top-cart-item-price">'.date("d/M/y H:i a",$date).'</span>
					</div>
				</div>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<div class="top-cart-item clearfix">
					<div class="top-cart-item-desc">
						<a href="javascript:void(0);">No new Notification. All caught up!!!</a>
					</div>
				</div>';
	}
	echo $str."@@".@mysql_num_rows($res);
}

if($_POST['callfunction'] == "setReadNotification")
{
	@mysql_query("Update tblnotification set status='Read' where notificationid=".$_POST["notificationid"]);
}
?>