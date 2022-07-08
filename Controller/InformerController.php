<?php
session_start();
include("config.php"); 
include("Mail.php");

if($_POST['callfunction'] == "GetAllInformer")
{
	$str="";
	$res=@mysql_query("Select * From jobinformer,tblindustry where jobinformer.industryid=tblindustry.industryid And jobinformer.candidateid=$_SESSION[LoggedUserId]");
	while($row=@mysql_fetch_array($res))
	{
		$str.='<tr>
					<td>'.$row["informerid"].'</td>
					<td>'.$row["informername"].'</td>
					<td>'.$row["keyword"].'</td>
					<td>'.$row["minexperience"] .' - '.$row["maxexperience"].'</td>
					<td>'.$row["minsalary"].' - '.$row["maxsalary"].'</td>
					<td>'.$row["desirelocation"].'</td>
					<td>'.$row["industryname"].'</td>
					<td>'.$row["creationdate"].'</td>
					
					<td>
						
						
						<a href="javascript:void(0);" onClick="deleteInformer('.$row["informerid"].')" title="Delete Informer"><i class="i-small icon-trash"></i></a>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="Candidate_InformerJobs.php?id='.$row["informerid"].'" title="View Related Jobs">View Related Jobs</a>
					</td>
				</tr>';
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="9">No data to display</td></tr>';
	}
	echo $str;
}

if($_POST['callfunction'] == "AddInformer")
{
	
	$sal=explode("-",$_POST['salary']);
	@mysql_query("Insert Into jobinformer(candidateid,informername,keyword,minexperience,maxexperience,minsalary,maxsalary,desirelocation,industryid,creationdate) values($_SESSION[LoggedUserId],'$_POST[informername]','$_POST[keywords]',$_POST[drpminexp],$_POST[drpmaxexp],$sal[0],$sal[1],'$_POST[location]',$_POST[drpindustry],curdate())") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Informer Added"));
	
}

if($_POST['callfunction'] == "DeleteInformer")
{
	$str="";
	@mysql_query("Delete from jobinformer where informerid=$_POST[deptid]") or die(mysql_error());
	echo json_encode(array("status"=>"success","msg"=>"Informer Deleted"));
	
}

if($_POST['callfunction']=="ViewJobs")
{
	$query="SELECT a.*,b.designationname,c.companyname,d.departmentname,c.companylogo FROM tbljob a,tbldesignation b,tblcompany c, tbldepartment d where a.designation=b.designationid and a.companyid=c.companyid and a.departmentid=d.departmentid";
	

	$sql="Select * from jobinformer where informerid=$_POST[id]";
	$informerres=@mysql_query($sql);
	$informerrow=@mysql_fetch_assoc($informerres);
			
	
	if(trim($informerrow["keyword"])!="")
	{
		$skills=explode(",",$informerrow["keyword"]);
		$skillfilter="";
		foreach($skills as $skill)
		{
			$skillfilter.=" jobreqskill Like '%".trim($skill)."%' Or";
		}
		$skillfilter=substr($skillfilter,0,strlen($skillfilter)-3);
		$query.=" and (".$skillfilter.")";
	}	
	
	if(trim($informerrow["desirelocation"])!="")
	{
		$locs=explode(",",$informerrow["desirelocation"]);
		$locfilter="";
		foreach($locs as $loc)
		{
			$locfilter.=" joblocation Like '%".trim($loc)."%' Or";
		}
		$locfilter=substr($locfilter,0,strlen($locfilter)-3);
		$query.=" and (".$locfilter.")";
	}	
	
	$query.=" and ((jobminexp>=".$informerrow["minexperience"]. " and jobminexp<=".$informerrow["maxexperience"].") or (jobmaxexp>=".$informerrow["minexperience"]. " and jobmaxexp<=".$informerrow["maxexperience"]."))";
	
	if($informerrow["industryid"]!=0)
	{
		$query.=" and a.industryid=".$informerrow["industryid"];
	}
	
	$query.=" and (jobminsalary=".$informerrow["minsalary"]." and jobmaxsalary=".$informerrow["maxsalary"].")";

	$query.=" order by jobpostdate desc";
	
	$sql=@mysql_query($query) or die(mysql_error());
	$str="";
	
	while($row=@mysql_fetch_array($sql))
		{
	$str.='<div class="product sf-dress clearfix">
								<div class="product-image">
								<center><img src="uploadedphotos/'.$row['companylogo'].'" alt="'.$row["jobname"].'" style="!important display: block;width:100px; height:100px; align:center"></center>
									
									
									<div class="product-overlay">
										<a class="item-quick-view add-to-cart" data-toggle="modal" onClick="ApplyByCompany('.$row['jobid'].')"><span>Apply</span></a>
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


if($_POST['callfunction']=="SentInformerMail")
{
	$query="SELECT a.*,b.designationname,c.companyname,d.departmentname,c.companylogo FROM tbljob a,tbldesignation b,tblcompany c, tbldepartment d where a.designation=b.designationid and a.companyid=c.companyid and a.departmentid=d.departmentid";
	
	$sql="Select * from jobinformer";
	$informerres=@mysql_query($sql);
	$informerrow=@mysql_fetch_assoc($sql);
	while($informerrow=@mysql_fetch_array($informerres))
	{
			
	
		if(trim($informerrow["keyword"])!="")
		{
			$skills=explode(",",$informerrow["keyword"]);
			$skillfilter="";
			foreach($skills as $skill)
			{
				$skillfilter.=" jobreqskill Like '%".trim($skill)."%' Or";
			}
			$skillfilter=substr($skillfilter,0,strlen($skillfilter)-3);
			$query.=" and (".$skillfilter.")";
		}	
		
		if(trim($informerrow["desirelocation"])!="")
		{
			$locs=explode(",",$informerrow["desirelocation"]);
			$locfilter="";
			foreach($locs as $loc)
			{
				$locfilter.=" joblocation Like '%".trim($loc)."%' Or";
			}
			$locfilter=substr($locfilter,0,strlen($locfilter)-3);
			$query.=" and (".$locfilter.")";
		}	
	
	$query.=" and ((jobminexp>=".$informerrow["minexperience"]. " and jobminexp<=".$informerrow["maxexperience"].") or (jobmaxexp>=".$informerrow["minexperience"]. " and jobmaxexp<=".$informerrow["maxexperience"]."))";
	
	if($informerrow["industryid"]!=0)
	{
		$query.=" and a.industryid=".$informerrow["industryid"];
	}
	
	$query.=" and (jobminsalary=".$informerrow["minsalary"]." and jobmaxsalary=".$informerrow["maxsalary"].")";

	$query.=" order by jobpostdate desc";
	
	$sql=@mysql_query($query) or die(mysql_error());
	$count=@mysql_num_rows($sql);
	if(@mysql_num_rows($sql)>0)
	{
	
		
		$p=@mysql_query("select * from tblinformermails where informerid=$informerrow[informerid]");
		if(@mysql_num_rows($p)==0)
	{
		$q=@mysql_query("select tblcandidate.candidateemail from tblcandidate,jobinformer where tblcandidate.candidateid=jobinformer.candidateid and jobinformer.candidateid=$informerrow[candidateid]")or die(mysql_error());
		$candidate=@mysql_fetch_assoc($q);
		$mail=new Mail();
		$result=$mail->SendMail($candidate['candidateemail'],$count."jobs matching with your requirements","<b>There are Jobs Matching with Your Requierement For more details login to your account</b>");
		
		@mysql_query("Insert into tblinformermails (informerid,maildate,status) values($informerrow[informerid],curdate(),'sent')")or die(mysql_error());
		}
	}
	}
	
			
}
?>
