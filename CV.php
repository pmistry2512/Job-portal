<html>
<head></head>
<body>
<?php
session_start();
include("config.php");

	
	$q=@mysql_query("Select * from tblcandidate,tblcity,tbldepartment,tblstate where tblcandidate.cityid=tblcity.cityid And tblcandidate.stateid=tblstate.stateid And tblcandidate.departmentid=tbldepartment.departmentid And tblcandidate.candidateid=$_REQUEST[id]") or die(mysql_error());
							$row=@mysql_fetch_assoc($q);
	
	$res1=@mysql_query("select * from tblcandidategraduation,tblgraduationspecialization,tblcandidate,tbluniversity,tblgraduation where tblcandidategraduation.graduationid=tblgraduation.graduationid And tblcandidategraduation.gradspecid=tblgraduationspecialization.gradspecid And tblcandidategraduation.candidateid=tblcandidate.candidateid And tblcandidategraduation.universityid=tbluniversity.universityid And tblcandidategraduation.candidateid=$_REQUEST[id]") or die(mysql_error());
							$row1=@mysql_fetch_assoc($res1);
	
$res2=@mysql_query("select * from tblcandidatepostgrad,tblpostgradspecialization,tblcandidate,tbluniversity,tblpostgraduation where tblcandidatepostgrad.postgraduationid=tblpostgraduation.postgraduationid And tblcandidatepostgrad.postspecid=tblpostgradspecialization.postspecid And tblcandidatepostgrad.candidateid=tblcandidate.candidateid And tblcandidatepostgrad.universityid=tbluniversity.universityid And tblcandidatepostgrad.candidateid=$_REQUEST[id]") or die(mysql_error());
							$row2=@mysql_fetch_assoc($res2);	
	
 ?>
 <center>
 <div style="border:thick groove #000000; width:900px;">
 	<table width="750px" cellspacing="5px">
		<tr>
			<td align="left">
				
					<h2><?php echo $row['candidatename']; ?></h2>
					<h4>Mobile: <?php echo $row['candidatemobile']; ?><br>
					Phone: <?php echo $row['candidatephone1']; ?><br>
					Mail: <?php echo $row['candidateemail']; ?>
					</h4>
			</td>
			<td align="right">
					<img src="uploadedphotos/<?php echo $row['candidateimage']; ?>" height="150px" width="150px"/>
			</td>
		</tr>
		<tr>
			<td style="background-color:#CCCCCC; border:thin groove #000000;" colspan="2">
				
					<b>Personal Description</b>
				
			</td>
		</tr>
		<tr>
			<td colspan="2">
				
				<div>
					<?php echo $row['candidatepersonaldescription']; ?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="background-color:#CCCCCC; border:thin groove #000000;">
				
					<b>Personal Skills</b>
				
			</td>
		</tr>
		<tr>
			<td colspan="2">
				
				<div>
					<?php echo $row['candidateskills']; ?>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="background-color:#CCCCCC; border:thin groove #000000;">
				
					<b>Educational Details</b>
				
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div>
				<br>
					<table border="1" align="center" width="100%">
						<tr>
							<th>Course</th>
							<th>University</th>
							<th>Passing Year</th>
							<th>Grade</th>
						</tr>
						<tr>
							<td align="center"><?php echo $row1['graduationname']; ?></td>
							<td align="center"><?php echo $row1['universityname']; ?></td>
							<td align="center"><?php echo $row1['passingyear']; ?></td>
							<td align="center"><?php echo $row1['grade']; ?></td>
						</tr>
						<tr>
							<td align="center"><?php echo $row2['postgraduationname']; ?></td>
							<td align="center"><?php echo $row2['universityname']; ?></td>
							<td align="center"><?php echo $row2['passingyear']; ?></td>
							<td align="center"><?php echo $row2['grade']; ?></td>
						</tr>
					</table>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="background-color:#CCCCCC; border:thin groove #000000;">
				
					<b>Personal Information</b>
				
			</td>
		</tr>
		<tr>
			<td colspan="2">
				<div>
					<b>Date Of Birth:</b> <?php echo $row['candidatedob']; ?><br>
					<b>Address:</b> <?php echo $row['candidateadd']; ?>,<?php echo $row['cityname']; ?>,<?php echo $row['statename']; ?><br>
					<b>Languages Known:</b> <?php echo $row['candidatelanguages']; ?><br>
				</div>
			</td>
		</tr>
		<tr>
			<td colspan="2" style="background-color:#CCCCCC; border:thin groove #000000;">
				
					<b>Social Profile</b>
				
			</td>
		</tr>
				
		<tr>
			<td>
				<div>
					<b>Facebook:</b> <?php echo $row['facebook']; ?><br>
					<b>GooglePlus:</b> <?php echo $row['googleplus']; ?><br>
					<b>Twitter:</b> <?php echo $row['twitter']; ?><br>
				</div>
			</td>
		</tr>
	</table>
</div>	
</center>
</body>
</html>
