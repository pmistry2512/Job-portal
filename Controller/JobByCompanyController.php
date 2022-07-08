			  
<?php
Session_start();
include("config.php"); 
include("Mail.php");
if($_POST['callfunction'] == "JobByCompany")
{
	$str="";
	if($_POST["id"]==0){
		$sql=@mysql_query("Select tbljob.*,tblcompany.*,tbldesignation.* from tbljob,tblcompany,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljob.jobstatus='Active' ORDER BY rand() limit 0,15") or die(mysql_error());
		
	}
	else{
	
	$sql=@mysql_query("Select tbljob.*,tblcompany.*,tbldesignation.* from tbljob,tblcompany,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljob.companyid='$_POST[id]' And tbljob.jobstatus='Active'") or die(mysql_error());
	}
	
	while($row=@mysql_fetch_array($sql))
		{
	$str.='<div class="product sf-dress clearfix">
								<div class="product-image">
								<center><img src="uploadedphotos/'.$row['companylogo'].'" alt="'.$row["jobname"].'" style="!important display: block;width:150px; height:150px; align:center"></center>
									
									
									<div class="product-overlay">
				<a class="item-quick-view add-to-cart" data-toggle="modal" onClick="ApplyByCompany('.$row['jobid'].')"><span>Apply</span></a>
										<input type="hidden" id="candid" name="candid" value="'.$row['jobid'].'"/>
										<a class="item-quick-view" href="JobDetail_Company.php?id='.$row['jobid'].'"><i class="icon-zoom-in2"></i><span>Detail</span></a>
									</div>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3>'.$row["jobname"].'</h3></div>
									
									<div class="product-price"><ins>'.$row["designationname"].'</ins></div>
									
									
									
									
								</div>
								
							</div>';
			 }
	echo $str;
}

if($_POST['callfunction'] == "ApplyForJob")
{
	$res=@mysql_query("Select * From tbljobapply Where jobid=$_POST[jobid] and candidateid=$_SESSION[LoggedUserId]");
			
	if(@mysql_num_rows($res)==0)
	{
		@mysql_query("Insert into tbljobapply (jobid,candidateid,applicationdate,applicationstatus) values('$_POST[jobid]',$_SESSION[LoggedUserId],curdate(),'Applied')") or die(mysql_errno());
		
		echo json_encode(array("status"=>"success","msg"=>"Sucessfully Applied for this job"));
	}
	else
	{
		echo json_encode(array("status"=>"error","msg"=>"Already Applied For this job"));
	}
}


if($_POST['callfunction'] == "ApplyByCompany")
{
	$res=@mysql_query("Select * From tbljobapply Where jobid=$_POST[jobid] and candidateid=$_SESSION[LoggedUserId]");
			
	if(@mysql_num_rows($res)==0)
	{
		@mysql_query("Insert into tbljobapply (jobid,candidateid,applicationdate,applicationstatus) values('$_POST[jobid]',$_SESSION[LoggedUserId],curdate(),'Applied')") or die(mysql_errno());
		
		echo json_encode(array("status"=>"success","msg"=>"Sucessfully Applied for this job"));
	}
	else
	{
		echo json_encode(array("status"=>"error","msg"=>"Already Applied For this job"));
	}
}



if($_POST['callfunction'] == "ApplyByDesignation")
{
	$res=@mysql_query("Select * From tbljobapply Where jobid=$_POST[jobid] and candidateid=$_SESSION[LoggedUserId]");
			
	if(@mysql_num_rows($res)==0)
	{
		@mysql_query("Insert into tbljobapply (jobid,candidateid,applicationdate,applicationstatus) values('$_POST[jobid]',$_SESSION[LoggedUserId],curdate(),'Applied')") or die(mysql_errno());
		
		echo json_encode(array("status"=>"success","msg"=>"Sucessfully Applied for this job"));
	}
	else
	{
		echo json_encode(array("status"=>"error","msg"=>"Already Applied For this job"));
	}
}

if($_POST['callfunction'] == "ApplyByIndustry")
{
	$res=@mysql_query("Select * From tbljobapply Where jobid=$_POST[jobid] and candidateid=$_SESSION[LoggedUserId]");
			
	if(@mysql_num_rows($res)==0)
	{
		@mysql_query("Insert into tbljobapply (jobid,candidateid,applicationdate,applicationstatus) values('$_POST[jobid]',$_SESSION[LoggedUserId],curdate(),'Applied')") or die(mysql_errno());
		
		echo json_encode(array("status"=>"success","msg"=>"Sucessfully Applied for this job"));
	}
	else
	{
		echo json_encode(array("status"=>"error","msg"=>"Already Applied For this job"));
	}
}

if($_POST['callfunction'] == "ApplyByLocation")
{
	$res=@mysql_query("Select * From tbljobapply Where jobid=$_POST[jobid] and candidateid=$_SESSION[LoggedUserId]");
			
	if(@mysql_num_rows($res)==0)
	{
		@mysql_query("Insert into tbljobapply (jobid,candidateid,applicationdate,applicationstatus) values('$_POST[jobid]',$_SESSION[LoggedUserId],curdate(),'Applied')") or die(mysql_errno());
		
		echo json_encode(array("status"=>"success","msg"=>"Sucessfully Applied for this job"));
	}
	else
	{
		echo json_encode(array("status"=>"error","msg"=>"Already Applied For this job"));
	}
}







if($_POST['callfunction'] == "JobByDesignation")
{
	$str="";
	if($_POST["id"]==0){
	
		$sql=@mysql_query("Select tbljob.*,tblcompany.*,tbldesignation.* from tbljob,tblcompany,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljob.jobstatus='Active' ORDER BY rand() limit 0,15") or die(mysql_error());
		
	}
	else{
	
	
	$sql=@mysql_query("Select tbljob.*,tblcompany.*,tbldesignation.* from tbljob,tblcompany,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljob.designation='$_POST[id]' And tbljob.jobstatus='Active'") or die(mysql_error());
	}
	
	while($row=@mysql_fetch_array($sql))
		{
	$str.='<div class="product sf-dress clearfix">
								<div class="product-image">
								<center><img src="uploadedphotos/'.$row['companylogo'].'" alt="'.$row["jobname"].'" style="!important display: block;width:150px; height:150px; align:center"></center>
									
									
									<div class="product-overlay">
										<a class="item-quick-view add-to-cart" data-toggle="modal" onClick="ApplyByCompany('.$row['jobid'].')"><span>Apply</span></a>
										<input type="hidden" id="candid" name="candid" value="'.$row['jobid'].'"/>
										<a class="item-quick-view"  href="JobDetail_Company.php?id='.$row['jobid'].'"><i class="icon-zoom-in2"></i><span>Detail</span></a>
									</div>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3>'.$row["jobname"].'</h3></div>
									
									<div class="product-price"><ins>'.$row["designationname"].'</ins></div>
									
									
									
									
								</div>
								
							</div>';
			 }
	echo $str;
}




//Job By Location
if($_POST['callfunction'] == "JobByLocation")
{
	$str="";
	if($_POST["id"]=='0'){
	
	$sql=@mysql_query("Select tbljob.*,tblcompany.*,tbldesignation.* from tbljob,tblcompany,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljob.jobstatus='Active'") or die(mysql_error());
	
	}
	else{
	
	$sql=@mysql_query("Select tbljob.*,tblcompany.*,tbldesignation.* from tbljob,tblcompany,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljob.joblocation='$_POST[id]' And tbljob.jobstatus='Active'") or die(mysql_error());
	}
	
	
	
	while($row=@mysql_fetch_array($sql))
		{
	$str.='<div class="product sf-dress clearfix">
								<div class="product-image">
								<center><img src="uploadedphotos/'.$row['companylogo'].'" alt="'.$row["jobname"].'" style="!important display: block;width:150px; height:150px; align:center"></center>
									
									
									<div class="product-overlay">
										<a class="item-quick-view add-to-cart" data-toggle="modal" onClick="ApplyByCompany('.$row['jobid'].')"><span>Apply</span></a>
										<input type="hidden" id="candid" name="candid" value="'.$row['jobid'].'"/>
										<a class="item-quick-view"  href="JobDetail_Company.php?id='.$row['jobid'].'"><i class="icon-zoom-in2"></i><span>Detail</span></a>
									</div>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3>'.$row["jobname"].'</h3></div>
									
									<div class="product-price"><ins>'.$row["designationname"].'</ins></div>
									
									
									
									
								</div>
								
							</div>';
			 }
	echo $str;
}

//Job By Industry
if($_POST['callfunction'] == "JobByIndustry")
{
	$str="";
	
	if($_POST["id"]==0){
		$sql=@mysql_query("Select tbljob.*,tblcompany.*,tbldesignation.* from tbljob,tblcompany,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljob.jobstatus='Active' ORDER BY rand() limit 0,15") or die(mysql_error());
		
	}
	else{
	
	
	$sql=@mysql_query("Select tbljob.*,tblcompany.*,tbldesignation.* from tbljob,tblcompany,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljob.industryid='$_POST[id]' And tbljob.jobstatus='Active'") or die(mysql_error());
	}
	
	while($row=@mysql_fetch_array($sql))
		{
	$str.='<div class="product sf-dress clearfix">
								<div class="product-image">
								<center><img src="uploadedphotos/'.$row['companylogo'].'" alt="'.$row["jobname"].'" style="!important display: block;width:150px; height:150px; align:center"></center>
									
									
									<div class="product-overlay">
										<a class="item-quick-view add-to-cart" data-toggle="modal" onClick="ApplyByCompany('.$row['jobid'].')"><span>Apply</span></a>
										<input type="hidden" id="candid" name="candid" value="'.$row['jobid'].'"/>
										<a class="item-quick-view"  href="JobDetail_Company.php?id='.$row['jobid'].'"><i class="icon-zoom-in2"></i><span>Detail</span></a>
									</div>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3>'.$row["jobname"].'</h3></div>
									
									<div class="product-price"><ins>'.$row["designationname"].'</ins></div>
									
									
									
									
								</div>
								
							</div>';
			 }
	echo $str;
}
?>