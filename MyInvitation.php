<?php include('header.php');
include("ValidCandidate.php"); ?>
  <!-- Page Title
		============================================= -->
  <section id="page-title">
    <div class="container clearfix">
      <h1>My Job Invites</h1>
      <span>Manage Your Job Invitations</span> </div>
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
	$sql=@mysql_query("select tblcandidate.*, tbljobinvite.*, tbljob.*,tblcompany.* from tblcandidate,tbljob,tbljobinvite,tblcompany where tbljobinvite.jobid=tbljob.jobid And tbljobinvite.candidateid=tblcandidate.candidateid And tbljobinvite.companyid=tblcompany.companyid And tbljobinvite.candidateid=$_SESSION[LoggedUserId] and tbljobinvite.invitestatus='Approved'") or die(mysql_error());
					$cnt=1;
					if(@mysql_num_rows($sql)>0)
					{
					while($row=@mysql_fetch_array($sql))
				{ 
	
	?>
        <!-- Portfolio Items
					============================================= -->
        
          <article id="portfolio-item-<?php echo $cnt++;?>" data-loader="include/ajax/portfolio-ajax-invitation.php?candid=<?php echo $row['companyid']; ?>" class="portfolio-item pf-media pf-icons">
		  
            <div class="portfolio-image"> <a href="#"> 
			<img src="uploadedphotos/<?php echo $row['companylogo']; ?>" style="max-height:150px ; max-width:150px ;" alt="Open Imagination"> </a>
              <div class="portfolio-overlay"> <a href="#" class="center-icon"><i class="icon-line-expand"></i></a> </div>
            </div>
			<br />
			<span class="label label-primary" style="font-size:14px">Invitation <?php echo $row['invitestatus']; ?></span>
            <div class="portfolio-desc">
			
              <h3><a href="portfolio-single.html"><?php echo $row['companyname']; ?></a></h3>
              <span>Job :<?php echo $row['jobname']; ?></span> </div>
			  <div>
			  
			  
			  <?php
			  if($row['invitestatus']=='Rejected' || $row['invitestatus']=='Approved')
			  {
			   ?>
			  <a href="javascript:void(0);" onClick="AcceptInvitation(<?php echo $row['jobid']; ?>,<?php echo $row['jobinviteid']; ?>)" class="button button-3d button-mini button-rounded button-aqua" >Accept</a>
			  <?php 
			  }
			  if($row['invitestatus']=='Accepted' || $row['invitestatus']=='Approved')
			  {
			  ?>
			  
			  <a href="javascript:void(0);" onClick="RejectInvitation(<?php echo $row['jobinviteid']; ?>)" class="button button-3d button-mini button-rounded button-aqua" >Reject</a>
			  <?php 
			  }
			  ?>
			  </div>
          </article>
		  
		  <?php }
		  }
		  else
		  {?>
		  	<div class="style-msg errormsg col-lg-12" id="msgerr" >
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;There are no any job invitations</div>
          </div>
		  <?php }
		  ?>
        </div>
        <!-- #portfolio end -->
        
      </div>
    </div>
  </section>
  <!-- #content end -->
</div>
<!-- #wrapper end -->
<script type="text/javascript" src="customjs/js_invitation.js"></script>
<?php include('footer.php'); ?>
