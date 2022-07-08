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
<p align="center">Comapny Wise Active Jobs</p>
<hr>
<?php 
$sql="Select * From tblcompany Where companyid In(Select companyid from tbljob where jobstatus='Active')";
	if($_REQUEST["id"]!="0")
	{
		$sql.="and companyid=$_REQUEST[id]";
	}
	$res=@mysql_query($sql);
	while($row1=@mysql_fetch_array($res))
	{
	?>
		<div class="fancy-title title-double-border"><h4><span><u><?php echo $row1["companyname"]; ?></u></span></h4></div>
		<div class="table-responsive">
							  <table class="table" width="100%">
								<thead>
								  <tr>
									<th align="left">Jobname</th>
									<th align="left">Location</th>
									<th align="left">JobType</th>
									<th align="left">Designation</th>
								  </tr>
								</thead>
	<?php
		$res1=@mysql_query("Select * From tbljob,tbldesignation Where tbljob.designation=tbldesignation.designationid And tbljob.jobstatus='Active' And tbljob.companyid=".$row1['companyid']);
		while($row=@mysql_fetch_array($res1))
		{
		?> 
			
							
								<tbody>
								  <tr>
									<td><?php echo $row["jobname"]; ?></td>
									<td><?php echo $row["joblocation"]; ?></td>
									<td><?php echo $row["jobtype"]; ?></td>
									<td><?php echo $row["designationname"]; ?></td>
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