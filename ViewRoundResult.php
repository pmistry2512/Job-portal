<?php include("header.php");
include("ValidCompany.php"); 
include("Mail.php");
?>
  <!-- Page Title
		============================================= -->
  <?php 
	$s=@mysql_query("Select * from interviewround where interviewroundid=$_REQUEST[irid]")or die(mysql_error());
	$r=@mysql_fetch_array($s)
	?>
  <section id="page-title">
    <div class="container clearfix">
      <h1>Result For <?php echo $r['roundname']; ?> Job of <?php echo $_REQUEST['jobname'] ?></h1>
    </div>
  </section>
  <!-- #page-title end -->
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <form method="post">
          <?php
						if(isset($_POST['btnsubmit']))
						{
							$cnt=$_SESSION["cnt"];
							for($i=1;$i<=$cnt;$i++)
							{
							  if(isset($_POST["check".$i]))
							  {
							  	$cid=$_POST["cid".$i];
								$sal=$_POST["salary".$i];
								@mysql_query("Update tbljobapply set applicationstatus='Hired',hireddate=curdate(),salarypackage=$sal where tbljobapply.candidateid=$cid And tbljobapply.jobid=$_REQUEST[jobid]") or die (mysql_error());?>
								 <div class="style-msg successmsg" id="msgsuc">
								  <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;Candidate Selected</div>
								  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								</div>
								

								<?php
								
								$q=@mysql_query("Select * from tblcandidate,tbljobapply,tbljob,tbldesignation where tbljob.designation=tbldesignation.designationid And tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.jobid=tbljob.jobid And tbljobapply.candidateid=$cid And tbljobapply.applicationstatus='Hired'")or die (mysql_error());
								$r=@mysql_fetch_assoc($q);
								$mail=new Mail();
								$result=$mail->SendMail($r['candidateemail'],"Hired For Job","<b>You Are Hired For Job</b> <br> Jobname:". $r['jobname']."<br>Job Location: ". $r['joblocation']."<br>Designation:".$r['designationname']."<br>Job Type :". $r['jobtype']."<br>Minimum Salary :".$r['jobminsalary']."<br>Maximum Salary :". $r['jobmaxsalary']."");
								
								$url="'MyJobs_candidate.php'";
								//$q=@mysql_query("Select * from tbljob where jobid=$_POST[jobid]")or die(mysql_error());
								//$r=@mysql_fetch_assoc($q);
	@mysql_query("Insert into tblnotification (candidateid,message,pageurl) values($cid,'You Are Hired For Job of $r[jobname]',$url)")or die (mysql_error());
	
								
								
							  }
			

							}
								
						}
					?>
          <table class="table table-striped">
            <thead>
              <tr>
               <th>Name</th>
				<th>Total Marks</th>
				<th>Passing Marks</th>
				<th>Obtained Marks</th>
				
				<th>Hire</th>
				<th>Salry Package</th>
              </tr>
            </thead>
            <tbody>
			<?php
		
		
			$sql=@mysql_query("SELECT * FROM interviewround,tblinterviewcandidate,tblcandidate,tblinterview, tbljobapply where interviewround.interviewroundid=tblinterviewcandidate.interviewroundid and tblcandidate.candidateid=tblinterviewcandidate.candidateid and tblinterview.interviewid=interviewround.interviewid and tblinterview.jobid=tbljobapply.jobid and tbljobapply.candidateid=tblcandidate.candidateid and marks>=passingmark and tblinterviewcandidate.interviewid=$_REQUEST[iid] and tblinterviewcandidate.interviewroundid=$_REQUEST[irid]") or die(mysql_error());
		

		if(@mysql_num_rows($sql)>0)
		{
			$cnt=1;
			$_SESSION["cnt"]=@mysql_num_rows($sql);
			while($row=@mysql_fetch_array($sql))
			{
	?>
              <tr>
                <td><?php echo $row['candidatename']; ?></td>
                <td><?php echo $row['totalmarks'];?></td>
                <td><?php echo $row['passingmark'];?></td>
                <td><?php echo $row['marks']; ?></td>
				<td><?php if($row['applicationstatus']=='Hired' || $row['applicationstatus']=='jobAccepted')
				{?>
					Already Hired
				<?php
				} ?></td>
				<td><?php if($row['applicationstatus']=='Hired' || $row['applicationstatus']=='jobAccepted')
				{
				echo $row['salarypackage'];
				} ?></td>
				
				<?php if($row['applicationstatus']=='Interviewed'){ ?>
				<td>
				
				<input id="check<?php echo $cnt;?>" type="checkbox" name="check<?php echo $cnt;?>" onClick="setRequired(<?php echo $cnt; ?>)">
				<input type="hidden" name="cid<?php echo $cnt;?>" id="cid<?php echo $cnt;?>" value="<?php echo $row['candidateid']; ?>"/>
				
				
				
				</td>
				<td><input type="text" id="salary<?php echo $cnt; ?>" name="salary<?php echo $cnt; ?>" ></td>
				<?php }?>
              </tr>
			  <?php
			  $cnt++;
			}		
		}
		else
		{
	?>
              <tr>
			  	<td colspan="8">
					Sorry! No data Found.
				</td>
			</tr>
				
			
			<?php		
		}
	?>	
            </tbody>
          </table>
		  <input type="submit" class="button" name="btnsubmit" id="btnsubmit" value="Hire Selected Candidate" />
		  <a href="ManageRound.php?iid=<?php echo $_REQUEST['iid']; ?>&jobname=<?php echo $_REQUEST['jobname']; ?>" class="button">GoBack</a>
        </form>
      </div>
    </div>
  </section>
  		<script type="text/javascript" src="js/jquery.js"></script> 
  <script>
  
  $(document).ready(function() {
  			$('#msgsuc').fadeOut(8000);
		});
		
	function setRequired(id)
	{
		if($('#check'+id).is(":checked"))
		{
			$('#salary'+id).attr("required","");
		}
		else
		{
			$('#salary'+id).removeAttr("required");
		}
	}
  </script>
  <?php include("footer.php"); ?>
