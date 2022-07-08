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
<p align="center">Comapny Wise Hired Candidate</p>
<hr>
<?php 
$sql="Select tbljob.companyid,tblcompany.companyname from tbljobapply,tbljob,tblcompany where tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid And applicationstatus='Hired' ";
	if($_REQUEST["cid"]!="0")
	{
		$sql.="And tbljob.companyid=$_REQUEST[cid]";
	}
	$sql.=" GROUP BY tbljob.companyid";
	$res=@mysql_query($sql);
	while($row1=@mysql_fetch_array($res))
	{
	?>
		<div class="fancy-title title-double-border"><h4><span><u><?php echo $row1["companyname"]; ?></u></span></h4></div>
		<div class="table-responsive">
							  <table class="table" width="700px">
								<thead>
								  <tr>
									<th align="left">EnrollmentNo</th>
									<th align="left">Candidate Name</th>
									<th align="left">Designation</th>
									<th align="left">Hired Date</th>
									<th align="left">Salary Package</th>
								  </tr>
								</thead>
		<?php 
		$res1=@mysql_query("Select * from tbljobapply,tblcandidate,tblcompany,tbljob,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljobapply.candidateid=tblcandidate.candidateid And tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid And tbljobapply.applicationstatus='Hired' And tbljob.companyid=".$row1['companyid']);
		while($row=@mysql_fetch_array($res1))
		{ 
		?>
			
							
								<tbody>
								  <tr>
									<td><?php echo $row["candidateenrollno"]; ?></td>
									<td><?php echo $row["candidatename"]; ?></td>
									<td><?php echo $row["designationname"]; ?></td>
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