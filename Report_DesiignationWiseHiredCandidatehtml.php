<?php include("config.php"); ?>
<html>
    <head></head>
    <body>
<table align="center" width="1000px">
      <tr>
    <td align="right"><img src="images/ssa2.png"/></td>
    <td align="center"><h1>S.S. Agrawal Institute Of Computer Science</h1>
          <h3>Devina Park Society Road, Opp. Vidya Kunj High School, <br>
        Gandevi Road
        Navsari-396445, Gujarat.<br>
        Phone: (02637) 232667, (02637) 232857</h3></td>
  </tr>
    </table>
<hr>
<p align="center">Designation Wise Hired Candidate</p>
<hr>

<?php 
$sql="Select tbljob.designation,tbldesignation.designationname From tbldesignation,tbljobapply,tbljob,tblcandidate where tbljobapply.candidateid=tblcandidate.candidateid And tbljob.designation=tbldesignation.designationid And tbljobapply.jobid=tbljob.jobid And tbljobapply.applicationstatus='Hired'";
	if($_REQUEST["cid"]!="0")
	{
		$sql.="And tbljob.designation=$_REQUEST[cid]";
	}
	if ($_REQUEST['userrole']=='TPO')
	{
		$sql.=" And tblcandidate.departmentid=$_REQUEST[deptid]";
		
	}
	else if($_REQUEST['userrole']=='Employer')
	{
		$sql.=" And tbljob.companyid=$_REQUEST[userid]";
	}
	
	$sql.=" GROUP BY tbljob.designation";
		
	$res=@mysql_query($sql);
	
	while($row1=@mysql_fetch_array($res))
	{
	
	?>
		<div class="fancy-title title-double-border"><h4><span><u><?php echo $row1["designationname"]; ?></u></span></h4></div>
		<div class="table-responsive">
							  <table class="table" width="750px">
								<thead>
								  <tr>
								  	<th align="left">Job Name</th>
									<th align="left">EnrollmentNo</th>
									<th align="left">Candidate Name</th>
									<th align="left">Hired Date</th>
									<th align="left">Salary Package</th>
								  </tr>
								</thead>
		<?php
		$res1=@mysql_query("Select * from tbljobapply,tbljob,tblcandidate where tbljobapply.jobid=tbljob.jobid And tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.applicationstatus='Hired' And tbljob.designation=".$row1['designation']);
		
	while($row=@mysql_fetch_array($res1))
		{
		?> 
			
							<tbody>
								  <tr>
								  	<td><?php echo $row["jobname"]; ?></td>
									<td><?php echo $row["candidateenrollno"]; ?></td>
									<td><?php echo $row["candidatename"]; ?></td>
									<td><?php echo $row["hireddate"]; ?></td>
									<td><?php echo $row["salarypackage"]; ?></td>
								  </tr>
								  <?php
								  }
								  ?>
							</tbody>
							 	 </table>
							</div>
	<?php
	}
	if(@mysql_num_rows($res)==0)
	{
	?>
		<tr><td align="center" colspan="3">No data to display</td></tr>
		<?php
	}
	?>

</body>
    </html>
<script type="text/javascript" src="js/jquery.js"></script>