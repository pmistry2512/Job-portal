<?php
session_start();
include("config.php"); 
include("Mail.php");


if($_POST['callfunction'] == "DeleteJob")
{
	$str="";
	@mysql_query("Update tbljob set delstatus='Y' where jobid=".$_POST["jobid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Job Deleted"));
	
}

if($_POST['callfunction'] == "FillJob")
{
	$str="";
	@mysql_query("Update tbljob set jobstatus='Complete' where jobid=".$_POST["jobid"]) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Job Marked As Completed"));
	
	$q=@mysql_query("Select * from tbljob,tbladmin where tbljob.departmentid And tbljob.jobid=$_POST[jobid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['adminemail'],"Job Completed","<b>Job is Completed <br> Job Name: $row[jobname]</b>");
	
	$url="'Report_CompanyWiseJob.php'";
	
	$q=@mysql_query("Select * from tbljob,tbladmin where tbljob.departmentid=tbladmin.departmentid And tbljob.jobid=$_POST[jobid]")or die(mysql_error());
	
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification (user,candidateid,message,pageurl) values('TPO',$r[adminid],'Job Completed, Job Name: $r[jobname]',$url)")or die (mysql_error());
	
	
	
}

if($_POST['callfunction'] == "DisplayJobs")
{
	$query="Select * From tbljob,tblcompany,tbldesignation,tblindustry where tbljob.industryid=tblindustry.industryid And tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid and tbljob.delstatus='N' and tbljob.companyid=$_SESSION[LoggedUserId] ";
	
	if($_POST["status"]!="All")
	{
		$query.="and tbljob.jobstatus='$_POST[status]'";
	}
	$str="";
	$res=@mysql_query($query) or die(mysql_error());
	if(@mysql_num_rows($res)>0)
	{
								
								while($job=@mysql_fetch_array($res))
								{
									$q=@mysql_query("Select count(*) As cntapp from tbljobapply where applicationstatus='Approved' And jobid=$job[jobid]") or die(mysql_query);
									$cntapp=@mysql_fetch_assoc($q);
							
							$str.='
							<div class="entry clearfix" style="height:350px !important;">

									<div class="entry-title">
										<h2><a href="JobDetail_Company.php?id='.$job['jobid'].'">'. $job['jobname'] .'</a>&nbsp;&nbsp;<span class="label label-default">'. $job['jobstatus'].'</span></h2>
										
									</div>
									<ul class="entry-meta clearfix">
										<li><i class="icon-calendar3"></i>'. $job['jobpostdate'] .'</li>
										<li><i class="icon-briefcase"></i>'. $job['designationname'] .'</li>
										<li><i class="icon-rupee"></i>'. $job['jobminsalary'] .' - '. $job['jobmaxsalary'].'</li>
									</ul><br>
									<span class="label label-default" style="height:200px !important;">'. $job['jobreqskill'].'</span>
									<div class="entry-content">
										<p>'. $job['jobdescription'].'</p>';
										
										if($job["jobstatus"]=='Active'){
										
										$str.='<i class="icon-edit"></i>&nbsp;<a href="addjob.php?id= '.$job['jobid'].'" class="more-link">Edit</a>&nbsp;&nbsp;&nbsp;';
										
										}
										if($job["jobstatus"]=='Active'){
										
								$str.='<i class="icon-check"></i>&nbsp;<a href="javascript:void(0);" onClick="fillJob( '.$job['jobid'].')" class="more-link">Mark Filled</a>&nbsp;&nbsp;&nbsp;';
								}
										
								
												
								$str.='<i class="icon-remove"></i>&nbsp;<a href="javascript:void(0);" onClick="deleteJob( '.$job['jobid'].')" class="more-link">Delete</a>&nbsp;&nbsp;&nbsp;';
								if($job["jobstatus"]=='Active'){
									
										 $str.='<i class="icon-user"></i>&nbsp;<a href="JobApplications_Company.php?jobid='.$job['jobid'].'" class="more-link">Candidate Applications('. $cntapp['cntapp'] .')</a>';
										 }
									$str.='</div>
								</div>
								';
					}
					
					}
					else
					{
						$str.='<div class="style-msg errormsg" id="msgerr">
            <div class="sb-msg"><i class="icon-remove"></i>No any jobs to display.</div>
          </div>';
					}
					echo $str;
}


if($_POST['callfunction'] == "ApproveApp")
{
	$str="";
	$sql="Update tbljobapply set applicationstatus='Interviewed',approvedby='$_SESSION[LoggedUserName]',approveddate=curdate() where candidateid=$_POST[candid] And jobid=$_POST[jobid]";
	@mysql_query($sql) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Application Approved"));
	
	$q=@mysql_query("Select * from tbljobapply,tblcandidate where tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.candidateid=$_POST[candid] And tbljobapply.jobid=$_POST[jobid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['candidateemail'],"Job Application Approved","<b>Your Job Application is Approved By Company. For more details Login to your Account</b>");
	
	$url="'MyJobs_Candidate.php'";
	$q=@mysql_query("Select * from tbljob where jobid=$_POST[jobid]")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification (candidateid,message,pageurl) values($_POST[candid],'Application Accepted By Company for $r[jobname]',$url)")or die (mysql_error());
	
}

if($_POST['callfunction'] == "RejectApp")
{
	$str="";
	$sql="Update tbljobapply set applicationstatus='Rejected',approvedby='$_SESSION[LoggedUserName]',approveddate=curdate() where candidateid=$_POST[candid] And jobid=$_POST[jobid]";
	@mysql_query($sql) or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Application Rejected"));
	
	$q=@mysql_query("Select * from tbljobapply,tblcandidate where tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.candidateid=$_POST[candid] And tbljobapply.jobid=$_POST[jobid]")or die(mysql_error());
	$row=@mysql_fetch_assoc($q);
	$mail=new Mail();
	$result=$mail->SendMail($row['candidateemail'],"Job Application Rejected","<b>Your Job Application is Rejected By Company . For more details Login to your Account</b>");
	
	$url="'MyJobs_Candidate.php'";
	$q=@mysql_query("Select * from tbljob where jobid=$_POST[jobid]")or die(mysql_error());
	$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification (candidateid,message,pageurl) values($_POST[candid],'Application Rejected By Company for $r[jobname]',$url)")or die (mysql_error());

	
}

if($_POST['callfunction']=="SearchJob")
{
	$query="SELECT a.*,b.designationname,c.companyname,d.departmentname,c.companylogo FROM tbljob a,tbldesignation b,tblcompany c, tbldepartment d where a.designation=b.designationid and a.companyid=c.companyid and a.departmentid=d.departmentid";
	
	if(trim($_POST["txtskills"])!="")
	{
		$skills=explode(",",$_POST["txtskills"]);
		$skillfilter="";
		foreach($skills as $skill)
		{
			$skillfilter.=" jobreqskill Like '%".trim($skill)."%' Or";
		}
		$skillfilter=substr($skillfilter,0,strlen($skillfilter)-3);
		$query.=" and (".$skillfilter.")";
	}	
	
	if(trim($_POST["txtloc"])!="")
	{
		$locs=explode(",",$_POST["txtloc"]);
		$locfilter="";
		foreach($locs as $loc)
		{
			$locfilter.=" joblocation Like '%".trim($loc)."%' Or";
		}
		$locfilter=substr($locfilter,0,strlen($locfilter)-3);
		$query.=" and (".$locfilter.")";
	}	
	
	
	if($_POST["drcompany"]!=0)
	{
		$query.=" and a.companyid=".$_POST["drcompany"];
	}
	
	if($_POST["drdesignation"]!=0)
	{
		$query.=" and a.designation=".$_POST["drdesignation"];
	}
	if($_POST["salary"]!="0-0")
	{
		$salary=explode("-",$_POST["salary"]);
		$query.=" and (jobminsalary=".$salary[0]." and jobmaxsalary=".$salary[1].")";
	}
	if($_POST["sortby"]=="Newest")
	{
		$query.=" order by jobpostdate desc";
	}
	else if($_POST["sortby"]=="Oldest")
	{
		$query.=" order by jobpostdate";
	}
	else if($_POST["sortby"]=="DesignationAZ")
	{
		$query.=" order by designationname";
	}
	else if($_POST["sortby"]=="DesignationZA")
	{
		$query.=" order by designationname desc";
	}
	
	$sql=@mysql_query($query) or die(mysql_error());
	$str="";
	while($row=@mysql_fetch_array($sql))
		{
	$str.='<div class="product sf-dress clearfix">
								<div class="product-image">
								<center><img src="uploadedphotos/'.$row['companylogo'].'" alt="'.$row["jobname"].'" style="!important display: block;width:100px; height:100px; align:center"></center>
									
									
									<div class="product-overlay">
										<a class="item-quick-view add-to-cart" data-toggle="modal" onClick="applyforjob('.$row['jobid'].')"><span>Apply</span></a>
										<input type="hidden" id="candid" name="candid" value="'.$row['jobid'].'"/>
										<a class="item-quick-view"  href="JobDetail_Company.php?id='.$row['jobid'].'"><i class="icon-zoom-in2"></i><span>Detail</span></a>
									</div>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3>'.$row["jobname"].'</h3></div>
									'.$row["jobreqskill"].'<br>
									'.$row["jobminsalary"].' - '.$row["jobmaxsalary"].'
									<div class="product-price"><ins>'.$row["designationname"].'</ins></div>
									'.$row["joblocation"].'
									
									
									
									
								</div>
								
							</div>';
			 }
			echo $str;
}

?>