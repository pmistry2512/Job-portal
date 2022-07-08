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
      <h1>Manage Candidate of: <?php echo $r['roundname']; ?> &nbsp; For  <?php echo $_REQUEST['jobname']; ?> Job </h1>
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
								@mysql_query("insert into tblinterviewcandidate (interviewid,interviewroundid,candidateid) Values($_REQUEST[iid],$_REQUEST[irid],$cid)") or die (mysql_error());
								
								$q=@mysql_query("Select * from tblcandidate,tblinterview,tbljob,tblinterviewcandidate,interviewround where tblinterviewcandidate.interviewroundid=interviewround.interviewroundid And tblinterviewcandidate.interviewid=tblinterview.interviewid And tblinterviewcandidate.candidateid=tblcandidate.candidateid And tblinterview.jobid=tbljob.jobid And tblcandidate.candidateid=$cid")or die(mysql_error());
								$r=@mysql_fetch_assoc($q);
								$mail=new Mail();
								$result=$mail->SendMail($r['candidateemail'],"Invited for interview round","<b>You Are Invited For InterviewRound</b> <br> Jobname:".$r['jobname']."<br> Interview Location: ".$r['interviewlocation']."<br>Round date:".$r['rounddate']."");
							  }
			

							}
							
						}
					?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>EmailId</th>
              
            </tr>
          </thead>
          <tbody>
		  <?php
		$sql='';
		
		
			$sql=@mysql_query("Select interviewround.*,tblinterview.*,tbljobapply.*,tblcandidate.*,tblcandidate.candidateid as cid from interviewround,tblinterview,tbljobapply,tblcandidate where interviewround.interviewroundid=$_REQUEST[irid] And interviewround.interviewid=tblinterview.interviewid And tblinterview.jobid=tbljobapply.jobid And tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.applicationstatus='Interviewed'") or die(mysql_error());
		

		if(@mysql_num_rows($sql)>0)
		{
			$cnt=1;
			$_SESSION["cnt"]=@mysql_num_rows($sql);
			while($row=@mysql_fetch_array($sql))
			{
	?>
            <tr>
              <td><?php 
				$q=@mysql_query("select * from tblinterviewcandidate where interviewid=$_REQUEST[iid] And interviewroundid=$_REQUEST[irid] And candidateid=$row[cid]") or die(mysql_error());
				
				if(@mysql_num_rows($q)==0)				
				{
				
				?>
				<input type="checkbox" id="check<?php echo $cnt;?>" name="check<?php echo $cnt;?>">
				<input type="hidden" name="cid<?php echo $cnt;?>" id="cid<?php echo $cnt;?>" value="<?php echo $row['candidateid']; ?>"/>
				
				<?php
				}
				?></td>
            
          
             <td><?php echo $row['candidatename'];?></td>
				
			<td><?php echo $row['candidateemail']; ?></td>
			
			
          
            </tr>
			<?php
			$cnt++;
			}		
		}
		else
		{
	?>
			<tr>
				<td colspan="3">
					Sorry! No data Found.
				</td>
			</tr>
				
	<?php		
		}
	?>	
          </tbody>
        </table>
		<input type="submit" class="button" name="btnsubmit" id="btnsubmit" value="Invite Candidate for this round" />
		
		
		<a href="ManageRound.php?iid=<?php echo $_REQUEST['iid']; ?>&jobname=<?php echo $_REQUEST['jobname']; ?>" class="button">GoBack</a>
		
		</form>
      </div>
    </div>
  </section>
  <?php include("footer.php"); ?>
