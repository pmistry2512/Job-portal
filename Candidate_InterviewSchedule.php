<?php include('header.php');
include("ValidCandidate.php"); ?>
  <!-- Page Title
		============================================= -->
  <section id="page-title">
    <div class="container clearfix">
      <h1>Interview Schedule</h1>
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
		 	$res=@mysql_query("select * from tbljob,tbljobapply,tblinterview,tblcompany where tbljob.companyid=tblcompany.companyid And  tbljobapply.jobid=tbljob.jobid And tblinterview.jobid=tbljobapply.jobid And tblinterview.status='Approved' And tbljobapply.applicationstatus IN('Interviewed','Approved') And tbljobapply.candidateid=$_SESSION[LoggedUserId]") or die(mysql_error());
			if(@mysql_num_rows($res)>0)
			{
			
			
			while($job=@mysql_fetch_array($res))
			{
		  	?>
          <div class="entry clearfix">
            <div class="entry-image"><img style="height:150px;width:150px;" class="image_fade" src="<?php echo "uploadedphotos/". $job['companylogo'];?>" alt="Standard Post with Image"> </div>
            <div class="entry-c">
              <div class="entry-title">
                <h3 style="margin:0 0 20px !important;"> <a href="JobDetail_Company.php?id=<?php echo $job['jobid']; ?>"><?php echo $job['jobname']; ?></a> <span class="label label-default"><?php echo $job['jobtype'];?></span> </h3>
                <ul class="entry-meta clearfix">
                  <li><i class="icon-briefcase"></i><?php echo $job['companyname']; ?></li>
                  <li><i class="icon-map-marker"></i><?php echo $job['joblocation'];?></li>
                  <li><i class="icon-money"></i><?php echo $job['jobminsalary']." - ". $job['jobmaxsalary'];?></li>
                </ul>
                <br>
                <b>Interview Date :&nbsp;</b><?php echo $job['interviewdate']; ?><br>
                <b>Interview Location :&nbsp;</b><?php echo $job['interviewlocation']; ?><br>
                <div class="entry-content">
                  <p><?php echo $job['jobdescription'];?>.</p>
                </div>
              </div>
            </div>
           
          </div>
          <?php 
			}
			}
			else
			{
			?>
			<div class="style-msg errormsg col-lg-12" id="msgerr" >
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;There are no any Interview scheduled</div>
          </div>
			<?php 
			}
			?>
          <!-- #posts end -->
        </div>
      </div>
    </div>
  </section>
  <!-- #content end -->
  <?php include('footer.php'); ?>
