<?php include('header.php');
include("ValidTPO.php"); ?>
  <!-- Page Title
		============================================= -->
  <section id="page-title">
    <div class="container clearfix">
      <h1>Job Applications</h1>
      <span>Manage Candidate Job Applications</span> </div>
  </section>
  <!-- #page-title end -->
  <!-- Content
		============================================= -->
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div id="portfolio-ajax-wrap">
          <div id="portfolio-ajax-container"> </div>
        </div>
        <div class="clear"></div>
		<div class="nobottommargin clearfix">
					<div class="style-msg successmsg" id="msgsuc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
		<div id="portfolio" class="portfolio grid-container portfolio-nomargin portfolio-ajax clearfix">
        <?php 
	$sql=@mysql_query("select tblcandidate.*, tbljobapply.*, tbljob.* from tblcandidate,tbladmin,tbljob,tbljobapply where tbladmin.departmentid=tblcandidate.departmentid And tbljob.jobid=tbljobapply.jobid And tblcandidate.candidateid=tbljobapply.candidateid And tbljobapply.applicationstatus='Applied' and tbladmin.status='Active' And tblcandidate.departmentid=$_SESSION[LoggedDeptId]") or die(mysql_error());
					$cnt=1;
					if(mysql_num_rows($sql)>0)
					{
					while($row=@mysql_fetch_array($sql))
				{ 
	
	?>
        <!-- Portfolio Items
					============================================= -->
        
          <article id="portfolio-item-<?php echo $cnt++;?>" data-loader="include/ajax/portfolio-ajax-image.php?candid=<?php echo $row['candidateid']; ?>" class="portfolio-item pf-media pf-icons">
		  
            <div class="portfolio-image">  
			<img src="uploadedphotos/<?php echo $row['candidateimage']; ?>" style="max-height:150px ; max-width:150px ;" alt="cadidate photo"> 
              <div class="portfolio-overlay"> <a href="#" class="center-icon"><i class="icon-line-expand"></i></a> </div>
            </div>
            <div class="portfolio-desc">
              <h3><a href="portfolio-single.html"><?php echo $row['candidatename']; ?></a></h3>
              <span>Job :<?php echo $row['jobname']; ?></span> </div>
			  <div>
			  <a href="javascript:void(0);" onClick="ApproveApplication(<?php echo $row['candidateid']; ?>,<?php echo $row['jobid']; ?>)" class="button button-3d button-mini button-rounded button-aqua" >Approve</a>
			  <a href="javascript:void(0);" onClick="RejectApplication(<?php echo $row['candidateid']; ?>,<?php echo $row['jobid']; ?>)" class="button button-3d button-mini button-rounded button-aqua" >Reject</a>
			  </div>
          </article>
		  
		  <?php }
		  }
		  else
		  {
		  ?>
		   <div class="style-msg errormsg" id="msgerr">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;There are no any job applications.</div>
          </div>
		  <?php
		  
		  }
		  ?>
        </div>
        <!-- #portfolio end -->
        
      </div>
    </div>
  </section>
  <!-- #content end -->
</div>
<!-- #wrapper end -->
<script type="text/javascript" src="customjs/js_TPOManageJob.js"></script>
<?php include('footer.php'); ?>
