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
<p align="center">All Registered Students</p>
<hr>
<?php 
	if(isset($_REQUEST['id']))
		{
			$sql=@mysql_query("Select tblcandidate.*,tbldepartment.* From tblcandidate,tbldepartment  Where tblcandidate.departmentid=tbldepartment.departmentid And tblcandidate.candidatename Like '%$_REQUEST[id]%'") or die(mysql_error());
		}
		else
		{
			$sql=@mysql_query("Select tblcandidate.*,tbldepartment.* from tblcandidate,tbldepartment where tblcandidate.departmentid=tbldepartment.departmentid") or die(mysql_error());
		}
		?>
<table class="table" width="100%">
  <tr>
    <th align="left">Photo</th>
    <th align="left">Name</th>
    <th align="left">EnrollMentNo</th>
    <th align="left">Department</th>
    <th align="left">EmailId</th>
    <th align="left">MobileNo</th>
    <th align="left">Status</th>
  </tr>
  <?php
				
				if(@mysql_num_rows($sql)>0)
		{
			while($row=@mysql_fetch_array($sql))
			{
	?>
  <tr>
    <td><div class="company-info"><img src="<?php echo 'uploadedphotos/'.$row['candidateimage'];?>" style="height:80px !important; width:80px !important;" alt="CandidatePhoto"></div></td>
    <td><?php echo $row['candidatename']; ?></td>
    <td><?php echo $row['candidateenrollno'];?></td>
    <td><?php echo $row['departmentname'];?></td>
    <td><?php echo $row['candidateemail'];?></td>
    <td><?php echo $row['candidatemobile'];?></td>
    <td><?php echo $row['candidatestatus']; ?></td>
  </tr>
  <?php 
				}
		}
				?>
</table>
</body>
