<?php include('header.php');
include("ValidCandidate.php"); ?>
  <!-- Page Title
		============================================= -->
  <section id="page-title">
    <div class="container clearfix">
      <h1>Interview Round Invitations</h1>
      <span></span> </div>
  </section>
  <!-- #page-title end -->
  <!-- Content============================================= -->
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <!-- Posts
					============================================= -->
        <div id="posts" class="small-thumbs alt">
          <?php 
		 
		 	$res=@mysql_query("Select * from tbljob,tblcompany where tblcompany.companyid=tbljob.companyid and tbljob.jobid In (Select jobid from tblinterview where tblinterview.status IN('Interviewed','Approved') And interviewid In(Select tblinterviewcandidate.interviewid from tblinterviewcandidate,interviewround where tblinterviewcandidate.interviewroundid=interviewround.interviewroundid and tblinterviewcandidate.candidateid=$_SESSION[LoggedUserId] and interviewround.roundstatus='Pending'))") or die(mysql_error());
			
			if(@mysql_num_rows($res)>0)
			{
			while($job=@mysql_fetch_array($res))
			{
		  	?>
          <div class="entry clearfix">
            <div class="entry-image"><img style="height:150px;width:150px;" class="image_fade" src="<?php echo "uploadedphotos/". $job['companylogo'];?>" alt="Standard Post with Image"> </div>
            <div class="entry-c">
              <div class="entry-title">
                <h3 style="margin:0 0 20px !important;"> <a title="Click To See the rounds for this Job" href="Candiate_RoundInvitationDetail.php?id=<?php echo $job['jobid']; ?>"><?php echo $job['jobname']; ?></a> <span class="label label-default"><?php echo $job['jobtype'];?></span> </h3>
                <br>
                
                  <p><?php echo $job['jobdescription'];?>.</p>
                
              </div>
            </div>
           
          </div>
          <?php 
			}
			}
			else
			{?>
			<div class="style-msg errormsg col-lg-12" id="msgerr" >
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;There is no any job for round Invitations</div>
          </div>
			<?php }
			?>
          <!-- #posts end -->
        </div>
      </div>
    </div>
  </section>
  <!-- #content end -->
  <?php include('footer.php'); ?>
