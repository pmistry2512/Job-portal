<?php include("config.php"); ?>
<html>
<head></head>
<body>
	<table align="center" width="1000px">
		<tr>
			<td align="right"><img src="images/ssa2.png"/></td>
			<td align="center"><h1>S.S. Agrawal Institute Of Computer Science</h1>
			<h3>Devina Park Society Road, Opp. Vidya Kunj High School, <br>Gandevi Road
Navsari-396445, Gujarat.<br>

Phone: (02637) 232667, (02637) 232857</h3>
			</td>
			
		</tr>
		
	</table>
	<hr>
	<p align="center">All Registered Companies</p>
	<hr>
	<?php
	if(isset($_REQUEST['id']))
		{
			$sql=@mysql_query("Select * from tblcompany Where tblcompany.companyname Like '%$_REQUEST[id]%'") or die(mysql_error());
		}
		else
		{
			$sql=@mysql_query("Select * from tblcompany") or die(mysql_error());
		}
	
	?>
	<table width="100%" align="center">
		 <tr>
                  
                  <th align="left">Name</th>
                  <th align="left">Address</th>
                  <th align="left">Website</th>
                  <th align="left">Status</th>
         </tr>
		 <?php 
		 if(@mysql_num_rows($sql)>0)
		{
			while($row=@mysql_fetch_array($sql))
			{
	?>
                <tr>
                 
                  <td><?php echo $row['companyname']; ?></td>
                  <td><?php echo $row['companyaddress'];?></td>
                  <td><a href="<?php echo $row['companywebsite'];?>"><?php echo $row['companywebsite'];?></a></td>
                  <td><?php echo $row['status']; ?></td>
                </tr>
                <?php 
				}
		}
				?>
	</table>
</body>