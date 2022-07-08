<?php include('header.php');
include("ValidCandidate.php"); ?>
<!-- Page Title
		============================================= -->

<section id="page-title">
  <div class="container clearfix">
    <h1>My Job Activities</h1>
    <span></span> </div>
</section>
<!-- #page-title end -->
<!-- Content
		============================================= -->
<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <!-- Posts
					============================================= -->
      <div id="posts" class="small-thumbs alt">
        <?php 
		 // $q="Select tbljob.*,tbljobapply.*,tblcompany.* From tbljob,tbljobapply,tblcompany where tbljobapply.candidateid=$_SESSION[LoggedUserId] And tbljobapply.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid";
		  	$res=@mysql_query("Select tbljob.*,tbldesignation.*,tbljobapply.*,tblcompany.* From tbldesignation,tbljob,tbljobapply,tblcompany where tbljob.designation=tbldesignation.designationid And tbljobapply.candidateid=$_SESSION[LoggedUserId] And tbljobapply.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid") or die(mysql_error());
			if(mysql_num_rows($res)>0)
			{
			while($job=@mysql_fetch_array($res))
			{
		  ?>
        <div class="clearfix">
          <div class="entry-image"><img style="height:150px;width:150px;" class="image_fade" src="<?php echo "uploadedphotos/". $job['companylogo'];?>" alt="Standard Post with Image"> </div>
          <div class="entry-c">
            <div class="entry-title">
              <h3 style="margin:0 0 20px !important;"> <a href="JobDetail_Company.php?id=<?php echo $job['jobid']; ?>"><?php echo $job['jobname']; ?></a> <span class="label label-default"><?php echo $job['jobtype'];?></span> </h3>
              <span class="label label-warning">* Status : <?php echo $job['applicationstatus'];?> For this job</span> </div>
            <ul class="entry-meta clearfix">
              <li><i class="icon-user"></i><?php echo $job['designationname']; ?></li>
              <li><i class="icon-briefcase"></i><?php echo $job['companyname']; ?></li>
              <li><i class="icon-map-marker"></i><?php echo $job['joblocation'];?></li>
              <li><i class="icon-money"></i><?php echo $job['jobminsalary']." - ". $job['jobmaxsalary'];?></li>
            </ul>
            <div class="entry-content">
              <p><?php echo $job['jobdescription'];?>.</p>
            </div>
          </div>
        </div>
        <div class="divider divider-center"> <a href="#" data-scrollto="#header"> <i class="icon-chevron-up"></i> </a> </div>
        <?php 
					}
					}
					else
					{ ?>
        <div class="style-msg errormsg" id="msgerr">
          <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;No Any jobs found.</div>
        </div>
        <?php }
					?>
      </div>
      <!-- #posts end -->
    </div>
  </div>
</section>
<!-- #content end -->
<?php include('footer.php'); ?>
