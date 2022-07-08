<?php include('header.php'); 
include("ValidTPO.php");?>
  <!-- Page Title
		============================================= -->
  <section id="page-title">
    <div class="container clearfix">
      <h1>Job Invites For Candidate</h1>
      <span>Manage Job Invitations</span> </div>
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
		  <div class="style-msg successmsg" id="msgwait" style="display:none;">
            <div class="sb-msg"><strong>Please Wait Processing...!</strong></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
		<div id="portfolio" class="portfolio grid-container portfolio-nomargin portfolio-ajax clearfix">
        <?php 
	$sql=@mysql_query("select tbljobinvite.*,tbljob.*,tblcompany.*,tblcandidate.*,tbladmin.* from tbljobinvite,tbljob,tblcompany,tblcandidate,tbladmin where tbljobinvite.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tbljobinvite.candidateid=tblcandidate.candidateid And tbljob.departmentid=tbladmin.departmentid And tbladmin.adminid=$_SESSION[LoggedUserId] And tbladmin.status='Active' And tbljobinvite.invitestatus='Invited'") or die(mysql_error());
					$cnt=1;
					if(@mysql_num_rows($sql)>0)
					{
					while($row=@mysql_fetch_array($sql))
				{ 
	
	?>
        <!-- Portfolio Items
					============================================= -->
        
          <article id="portfolio-item-<?php echo $cnt++;?>" data-loader="include/ajax/portfolio-ajax-TPOinvitation.php?candid=<?php echo $row['companyid']; ?>" class="portfolio-item pf-media pf-icons">
		  
            <div class="portfolio-image"> <a href="#"> 
			<img src="uploadedphotos/<?php echo $row['companylogo']; ?>" style="max-height:150px; max-width:150px;!important" alt="Open Imagination"> </a>
              <div class="portfolio-overlay"> <a href="#" class="center-icon"><i class="icon-line-expand"></i></a> </div>
            </div>
            <div class="portfolio-desc">
              <h3><a href="#"><?php echo $row['companyname']; ?></a></h3>
              <span>Job :<?php echo $row['jobname']; ?></span>
			   <span>Student :<?php echo $row['candidatename']; ?></span></div>
			  
			  <div>
			  <a href="javascript:void(0);" onClick="ApproveInvitation(<?php echo $row['jobinviteid']; ?>)" class="button button-3d button-mini button-rounded button-aqua" >Accept</a>
			  <a href="javascript:void(0);" onClick="RejectInvitationTPO(<?php echo $row['jobinviteid']; ?>)" class="button button-3d button-mini button-rounded button-aqua" >Reject</a>
			  </div>
          </article>
		  
		  <?php }
		  }
		  else
		  {?>
		  <div class="nobottommargin clearfix">
					<div class="style-msg successmsg" id="msgsuc" >
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;No Any Job INvitations for candidate</div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
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
