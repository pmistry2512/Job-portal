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
<p align="center">Designation Wise Scheduled Interview</p>
<hr>

<?php
	$sql="Select * from tbljob,tbldesignation,tblinterview,tblcompany where tbljob.designation=tbldesignation.designationid And tblinterview.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tbljob.companyid=$_REQUEST[userid]";
	if($_REQUEST["cid"]!="0")
	{
		$sql.=" And tbljob.designation=$_REQUEST[cid]";
	}
	
	
	
	$res=@mysql_query($sql);
	while($row1=@mysql_fetch_array($res))
	{
	?>
		<div class="fancy-title title-double-border"><h4><span><u><?php echo $row1["designationname"]; ?></u></span></h4></div>
		<div class="table-responsive">
							  <table class="table" width="800px" align="center">
								<thead>
								  <tr>
								  	<th align="left">Designation</th>
									<th align="left">Interview Date</th>
									<th align="left">Interview Time</th>
									<th align="left">Interview Location</th>
									
								  </tr>
								</thead>
								<?php
		$res1=@mysql_query("Select * from tbljob,tbldesignation,tblinterview,tblcompany where tbljob.designation=tbldesignation.designationid And tblinterview.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tbljob.companyid=$_REQUEST[userid] And tbljob.designation=".$row1['designationid']);
		while($row=@mysql_fetch_array($res1))
		{ 
		?>
			
							
								<tbody>
								  <tr>
								  	<td><?php echo $row["designationname"]; ?></td>
									<td><?php echo $row["interviewdate"]; ?></td>
									<td><?php echo $row["interviewtime"]; ?></td>
									<td><?php echo $row["interviewlocation"]; ?></td>
									
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

	