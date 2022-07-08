<?php include("header.php");
include("ValidCompany.php"); ?>
  <!-- Page Title
		============================================= -->
  <?php 
	$s=@mysql_query("Select * from interviewround where interviewroundid=$_REQUEST[id]")or die(mysql_error());
	$r=@mysql_fetch_array($s)
	?>
  <section id="page-title">
    <div class="container clearfix">
      <h1>Add Marks For <?php echo $r['roundname']; ?> for Job Of <?php echo $_REQUEST['jobname']; ?></h1>
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
							  	$val=$_POST["check".$i];
							  	$cid=$_POST["cid".$i];
						if($val!="")
						{
					@mysql_query("update tblinterviewcandidate set marks=$val where interviewcandidateid=$cid") or die (mysql_error());               ?> 
					<div class="style-msg successmsg" id="msgsuc">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;Marks Added Sucessfully</div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>   
		  <?php
					  }

							  }
			

							}
							
						}
					?>
          <table class="table table-striped">
            <thead>
              <tr>
                <th>Student Name</th>
				<th>Marks</th>
              </tr>
            </thead>
            <tbody>
              <?php
		$sql='';
		
		
			$sql=@mysql_query("Select tblinterviewcandidate.*,interviewround.*,tblinterview.*,tblcandidate.*,tbljob.* from tblinterviewcandidate,interviewround,tblinterview,tblcandidate,tbljob where tblinterviewcandidate.interviewroundid=interviewround.interviewroundid And interviewround.interviewid=tblinterview.interviewid And tblinterviewcandidate.candidateid=tblcandidate.candidateid And tblinterview.jobid=tbljob.jobid And tbljob.companyid=$_SESSION[LoggedUserId] And tblinterviewcandidate.interviewid=$_REQUEST[iid] And tblinterviewcandidate.interviewroundid=$_REQUEST[id]") or die(mysql_error());
		

		if(@mysql_num_rows($sql)>0)
		{
			$cnt=1;
			$_SESSION["cnt"]=@mysql_num_rows($sql);
			while($row=@mysql_fetch_array($sql))
			{
		?>
              <tr>
                <td><?php echo $row['candidatename'];?></td>
                <td><input id="check<?php echo $cnt;?>" type="text" name="check<?php echo $cnt;?>" value="<?php echo $row['marks']; ?>">
                  <input type="hidden" name="cid<?php echo $cnt;?>" id="cid<?php echo $cnt;?>" value="<?php echo $row['interviewcandidateid']; ?>"/></td>
              </tr>
              <?php
			$cnt++;
			}		
		}
		else
		{
	?>
		<tr>
			<td>
            	Sorry! No data Found.
			</td>
		<tr>
            <?php		
		}
	?>
            </tbody>
            
          </table>
          <input type="submit" class="button" name="btnsubmit" id="btnsubmit" value="Submit" />
		  <a href="ManageRound.php?iid=<?php echo $_REQUEST['iid']; ?>&jobname=<?php echo $_REQUEST['jobname']; ?>" class="button">GoBack</a>
        </form>
      </div>
    </div>
  </section>
  </script>
		 <script>
		$(document).ready(function() {
			$("#msgsuc").fadeOut(6000);
		});
	</script>
  <?php include("footer.php"); ?>
