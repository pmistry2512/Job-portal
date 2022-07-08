<?php
session_start();
include("config.php"); 
include("Mail.php");

//----Company Wise Jobs
if($_POST['callfunction'] == "GetAllJobs")
{
	$str="";
	$sql="Select * From tblcompany Where companyid In(Select companyid from tbljob where jobstatus='Active')";
	if($_POST["id"]!="0")
	{
		$sql.="and companyid=$_POST[id]";
	}
	$res=@mysql_query($sql);
	while($row1=@mysql_fetch_array($res))
	{
		$str.='<div class="fancy-title title-double-border"><h4><span>'.$row1["companyname"].'</span></h4></div>
		<div class="table-responsive">
							  <table class="table">
								<thead>
								  <tr>
									<th>Jobname</th>
									<th>Location</th>
									<th>JobType</th>
									<th>Designation</th>
								  </tr>
								</thead>';
		$res1=@mysql_query("Select * From tbljob,tbldesignation Where tbljob.designation=tbldesignation.designationid And tbljob.jobstatus='Active' And tbljob.companyid=".$row1['companyid']);
		while($row=@mysql_fetch_array($res1))
		{ 
			
							$str.='
								<tbody>
								  <tr>
									<td>'.$row["jobname"].'</td>
									<td>'.$row["joblocation"].'</td>
									<td>'.$row["jobtype"].'</td>
									<td>'.$row["designationname"].'</td>
								  </tr>';
								  }
							$str.='</tbody>
							 	 </table>
							</div>';
		
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}



//CompanyWise Hired Candidate

if($_POST['callfunction'] == "Getcandidate")
{
	$str="";
	
	$sql="Select tbljob.companyid,tblcompany.companyname from tbljobapply,tbljob,tblcompany where tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid And applicationstatus='Hired' ";
	if($_POST["cid"]!="0")
	{
		$sql.="And tbljob.companyid=$_POST[cid]";
	}
	$sql.=" GROUP BY tbljob.companyid";
	$res=@mysql_query($sql);
	while($row1=@mysql_fetch_array($res))
	{
		$str.='<div class="fancy-title title-double-border"><h4><span>'.$row1["companyname"].'</span></h4></div>
		<div class="table-responsive">
							  <table class="table">
								<thead>
								  <tr>
									<th align="left">EnrollmentNo</th>
									<th align="left">Candidate Name</th>
									<th align="left">Designation</th>
									<th align="left">Hired Date</th>
									<th align="left">Salary Package</th>
								  </tr>
								</thead>';
		$res1=@mysql_query("Select * from tbljobapply,tblcandidate,tblcompany,tbljob,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljobapply.candidateid=tblcandidate.candidateid And tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid And tbljobapply.applicationstatus='Hired' And tbljob.companyid=".$row1['companyid']);
		
		while($row=@mysql_fetch_array($res1))
		{ 
			
							$str.='
								<tbody>
								  <tr>
									<td>'.$row["candidateenrollno"].'</td>
									<td>'.$row["candidatename"].'</td>
									<td>'.$row["designationname"].'</td>
									<td>'.$row["hireddate"].'</td>
									<td>'.$row["salarypackage"].'</td>
								  </tr>';
								  }
							$str.='</tbody>
							 	 </table>
							</div>';
		
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}


//Department Wise Placements

if($_POST['callfunction'] == "GetDeptWiseCandidate")
{
	$str="";
	
	$sql="Select tbljob.departmentid,tbldepartment.departmentname from tbljobapply,tbldepartment,tbljob,tblcandidate where tbljobapply.jobid=tbljob.jobid And tbljobapply.candidateid=tblcandidate.candidateid And tbljob.departmentid=tbldepartment.departmentid And tbljobapply.applicationstatus='Hired'";
	if($_POST["cid"]!="0")
	{
		$sql.="And tbljob.departmentid=$_POST[cid]";
	}
	$sql.=" GROUP BY tbljob.departmentid";
	$res=@mysql_query($sql);
	while($row1=@mysql_fetch_array($res))
	{
		$str.='<div class="fancy-title title-double-border"><h4><span>'.$row1["departmentname"].'</span></h4></div>
		<div class="table-responsive">
							  <table class="table">
								<thead>
								  <tr>
								  	<th>Job Name</th>
									<th>Company</th>
									<th>EnrollmentNo</th>
									<th>Candidate Name</th>
									<th>Hired Date</th>
									<th>Salary Package</th>
								  </tr>
								</thead>';
		$res1=@mysql_query("Select * from tbljobapply,tbldepartment,tbljob,tblcandidate,tblcompany where tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid And tbljobapply.candidateid=tblcandidate.candidateid And tbljob.departmentid=tbldepartment.departmentid And tbljobapply.applicationstatus='Hired' And tbljob.departmentid=".$row1['departmentid']);
		while($row=@mysql_fetch_array($res1))
		{ 
			
							$str.='
								<tbody>
								  <tr>
								  	<td>'.$row["jobname"].'</td>
									<td>'.$row["companyname"].'</td>
									<td>'.$row["candidateenrollno"].'</td>
									<td>'.$row["candidatename"].'</td>
									<td>'.$row["hireddate"].'</td>
									<td>'.$row["salarypackage"].'</td>
								  </tr>';
								  }
							$str.='</tbody>
							 	 </table>
							</div>';
		
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}


//Designation wise hired candidate...

if($_POST['callfunction'] == "GetDesigWiseCandidate")
{
	$str="";
	
	$sql="Select tbljob.designation,tbldesignation.designationname From tbldesignation,tbljobapply,tbljob,tblcandidate where tbljobapply.candidateid=tblcandidate.candidateid And tbljob.designation=tbldesignation.designationid And tbljobapply.jobid=tbljob.jobid And tbljobapply.applicationstatus='Hired'";
	if($_POST["cid"]!="0")
	{
		$sql.="And tbljob.designation=$_POST[cid]";
	}
	if ($_SESSION['LoggedUserRole']=='TPO')
	{
		$sql.=" And tblcandidate.departmentid=$_SESSION[LoggedDeptId]";
		
	}
	else if($_SESSION['LoggedUserRole']=='Employer')
	{
		$sql.=" And tbljob.companyid=$_SESSION[LoggedUserId]";
	}
	
	$sql.=" GROUP BY tbljob.designation";
		
	$res=@mysql_query($sql);
	
	while($row1=@mysql_fetch_array($res))
	{
		$str.='<div class="fancy-title title-double-border"><h4><span>'.$row1["designationname"].'</span></h4></div>
		<div class="table-responsive">
							  <table class="table">
								<thead>
								  <tr>
								  	<th>Job Name</th>
									<th>EnrollmentNo</th>
									<th>Candidate Name</th>
									<th>Hired date</th>
									<th>Salary Package</th>
								  </tr>
								</thead>';
		$res1=@mysql_query("Select * from tbljobapply,tbljob,tblcandidate where tbljobapply.jobid=tbljob.jobid And tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.applicationstatus='Hired' And tbljob.designation=".$row1['designation']);
		
	while($row=@mysql_fetch_array($res1))
		{ 
			
							$str.='<tbody>
								  <tr>
								  	<td>'.$row["jobname"].'</td>
									<td>'.$row["candidateenrollno"].'</td>
									<td>'.$row["candidatename"].'</td>
									<td>'.$row["hireddate"].'</td>
									<td>'.$row["salarypackage"].'</td>
								  </tr>';
								  }
							$str.='</tbody>
							 	 </table>
							</div>';
		
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}

//Get year Wise Hired Candidate
if($_POST['callfunction'] == "GetYearWiseCandidate")
{
	$str="";
	
	$sql="Select year(tbljobapply.hireddate) as jobyear from tbljobapply,tbldepartment,tbljob,tblcandidate where tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.jobid=tbljob.jobid And tbljob.departmentid=tbldepartment.departmentid And tbljobapply.applicationstatus='Hired'";
	
	if($_POST["cid"]!="0")
	{
		$sql.="And year(tbljobapply.hireddate)=$_POST[cid]";
	}
	if ($_SESSION['LoggedUserRole']=='TPO')
	{
		$sql.=" And tblcandidate.departmentid=$_SESSION[LoggedDeptId]";
		
	}
	else if($_SESSION['LoggedUserRole']=='Employer')
	{
		$sql.=" And tbljob.companyid=$_SESSION[LoggedUserId]";
	}
	$sql.=" GROUP BY year(tbljobapply.hireddate)";
	$res=@mysql_query($sql);

	while($row1=@mysql_fetch_array($res))
	{
		//$date=strtotime($row1["hireddate"]);
		$str.='<div class="fancy-title title-double-border"><h4><span>'.$row1['jobyear'].'</span></h4></div>
		<div class="table-responsive">
							  <table class="table">
								<thead>
								  <tr>
								  	<th>Job Name</th>
									<th>EnrollmentNo</th>
									<th>Candidate Name</th>
									<th>Hired Date</th>
									<th>Salary Package</th>
								  </tr>
								</thead>';
		$sql1="Select * from tbljobapply,tbldepartment,tbljob,tblcandidate where tbljobapply.jobid=tbljob.jobid And tbljobapply.candidateid=tblcandidate.candidateid And tbljob.departmentid=tbldepartment.departmentid And tbljobapply.applicationstatus='Hired'  and year(tbljobapply.hireddate)=".$row1['jobyear'];
		
		$res1=@mysql_query($sql1);
		$count=0;
		while($row=@mysql_fetch_array($res1))
		{ 
			
							$str.='
								<tbody>
								  <tr>
								  	<td>'.$row["jobname"].'</td>
									<td>'.$row["candidateenrollno"].'</td>
									<td>'.$row["candidatename"].'</td>
									<td>'.$row["hireddate"].'</td>
									<td>'.$row["salarypackage"].'</td>
									
								  </tr>';
								  $count++;
								   }
							$str.='<h4>Total number of Candidates Hired : '.$count.'</h4></tbody>
							 	 </table>
							</div>';
		
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}


//Get Date Wise Hired Candidate
if($_POST['callfunction'] == "GetDateWiseCandidate")
{
	$str="";
	
	$sql="Select tbljob.jobid as jid,tbljob.jobname,tblcompany.companyname from tbljobapply,tbldepartment,tbljob,tblcompany where tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid And tbljob.departmentid=tbldepartment.departmentid And tbljobapply.applicationstatus='Hired'";
	
	if($_POST["sdate"]!="" && $_POST["tdate"]!="")
	{
		$fdate=strtotime($_POST["sdate"]);
		$ldate=strtotime($_POST["tdate"]);
		$sql.="And tbljobapply.hireddate >= '".date("Y-m-d",$fdate)."' And tbljobapply.hireddate <= '".date("Y-m-d",$ldate)."'";
	}
	$sql.=" GROUP BY tbljobapply.jobid";
	
	$res=@mysql_query($sql);
	while($row1=@mysql_fetch_array($res))
	{
		
		$str.='<div class="fancy-title title-double-border"><h4><span>'.$row1["jobname"].' - '.$row1["companyname"].'</span></h4></div>
		<div class="table-responsive">
							  <table class="table"> 
								<thead>
								  <tr>
								  	
									<th>EnrollmentNo</th>
									<th>Candidate Name</th>
									<th>Designation</th>
									<th>Hireddate</th>
									<th>Salary Package</th>
								  </tr>
								</thead>';
		$sql1="Select * from tbljobapply,tbldepartment,tbljob,tblcandidate,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljobapply.jobid=tbljob.jobid And tbljobapply.candidateid=tblcandidate.candidateid And tbljob.departmentid=tbldepartment.departmentid And tbljobapply.applicationstatus='Hired'  and tbljob.jobid=".$row1["jid"];
		$res1=@mysql_query($sql1);
		while($row=@mysql_fetch_array($res1))
		{ 
			
							$str.='
								<tbody>
								  <tr>
								  	
									<td>'.$row["candidateenrollno"].'</td>
									<td>'.$row["candidatename"].'</td>
									<td>'.$row["designationname"].'</td>
									<td>'.$row["hireddate"].'</td>
									<td>'.$row["salarypackage"].'</td>
								  </tr>';
								  }
							$str.='</tbody>
							 	 </table>
							</div>';
		
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}



//Designation wise Scheduled Interview...

if($_POST['callfunction'] == "GetDesigWiseInterview")
{
	$str="";
	$sql="Select * from tbljob,tbldesignation,tblinterview,tblcompany where tbljob.designation=tbldesignation.designationid And tblinterview.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tbljob.companyid=$_SESSION[LoggedUserId]";
	if($_POST["cid"]!="0")
	{
		$sql.=" And tbljob.designation=$_POST[cid]";
	}
	
	
	
	$res=@mysql_query($sql);
	while($row1=@mysql_fetch_array($res))
	{
		$str.='<div class="fancy-title title-double-border"><h4><span>'.$row1["designationname"].'</span></h4></div>
		<div class="table-responsive">
							  <table class="table">
								<thead>
								  <tr>
								  	<th>Designation</th>
									<th>Interview Date</th>
									<th>Interview Time</th>
									<th>Interview Location</th>
									
								  </tr>
								</thead>';
		$res1=@mysql_query("Select * from tbljob,tbldesignation,tblinterview,tblcompany where tbljob.designation=tbldesignation.designationid And tblinterview.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tbljob.companyid=$_SESSION[LoggedUserId] And tbljob.designation=".$row1['designationid']);
		while($row=@mysql_fetch_array($res1))
		{ 
			
							$str.='
								<tbody>
								  <tr>
								  	<td>'.$row["designationname"].'</td>
									<td>'.$row["interviewdate"].'</td>
									<td>'.$row["interviewtime"].'</td>
									<td>'.$row["interviewlocation"].'</td>
									
								  </tr>';
								  }
							$str.='</tbody>
							 	 </table>
							</div>';
		
	}
	if(@mysql_num_rows($res)==0)
	{
		$str='<tr><td align="center" colspan="3">No data to display</td></tr>';
	}
	echo $str;
}
?>
