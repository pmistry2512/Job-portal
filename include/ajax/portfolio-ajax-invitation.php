<?php
session_start();
include_once("config.php");
?>


<div id="portfolio-ajax-single" class="clearfix">

 <?php 
	$sql=@mysql_query("select tbldesignation.*,tblcandidate.*, tbljobinvite.*, tbljob.*,tblcompany.* from tblcandidate,tbldesignation,tbljob,tbljobinvite,tblcompany where tbljob.designation=tbldesignation.designationid And tbljobinvite.jobid=tbljob.jobid And tbljobinvite.candidateid=tblcandidate.candidateid And tbljobinvite.invitestatus='Approved' And tbljobinvite.companyid=tblcompany.companyid And tbljobinvite.candidateid=$_SESSION[LoggedUserId] And tblcompany.companyid=$_REQUEST[candid]") or die(mysql_error());
	
				$row=@mysql_fetch_assoc($sql);
					
	?>

    <div id="portfolio-ajax-title" style="position: relative;">
        <h2><?php echo $row['companyname']; ?></h2>
        <div id="portfolio-navigation">
            <a href="#" id="close-portfolio"><i class="icon-line-cross"></i></a>
        </div>
    </div>

    <div class="line line-sm topmargin-sm"></div>

    <!-- Portfolio Single Image
    ============================================= -->
    <div class="col_one_fourth portfolio-single-image nobottommargin">
        <a href="#"><img src="uploadedphotos/<?php echo $row['companylogo']; ?>" alt=""></a>
    </div><!-- .portfolio-single-image end -->

    <!-- Portfolio Single Content
    ============================================= -->
    <div class="col_three_fourth portfolio-single-content col_last nobottommargin">

        <!-- Portfolio Single - Description
        ============================================= -->
        <p><?php echo $row['companydescription']; ?></p>
        <!-- Portfolio Single - Description End -->
		<ul class="portfolio-meta bottommargin">
			 <li><span><i class="icon-briefcase"></i>Company :</span> <?php echo $row['companyname']; ?></li>
            <li><span><i class="icon-user"></i>Designation :</span> <?php echo $row['designationname']; ?>&nbsp;(<?php echo $row['jobtype']; ?>)</li>
			 
        </ul>
        <div class="line" style="margin: 40px 0;"></div>

        <!-- Portfolio Single - Meta
        ============================================= -->
        <ul class="portfolio-meta bottommargin">
            
			 <li><span><i class="icon-map-marker"></i>Company Address :</span> <?php echo $row['companyaddress']; ?></li>
            <li><span><i class="icon-book"></i>Required Skills :</span> <?php echo $row['jobreqskill']; ?></li>
            <li><span><i class="icon-envelope"></i>Company Email :</span><?php echo $row['companyemail']; ?></li>
			<li><span><i class="icon-user"></i>Contact Person :</span> <?php echo $row['companycontactperson']; ?></li>
            <li><span><i class="icon-phone"></i>Contact No:</span><?php echo $row['companycontactno']; ?> , <?php echo $row['candidatephone1']; ?> </li>
        </ul>
        <!-- Portfolio Single - Meta End -->

        <!-- Portfolio Single - Share
        ============================================= -->
        <div class="si-share clearfix">
            <span>Social Profiles:</span>
            <div>
                <a href="<?php echo $row['facebook']; ?>" class="social-icon si-borderless si-facebook">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                </a>
                <a href="<?php echo $row['twitter']; ?>" class="social-icon si-borderless si-twitter">
                    <i class="icon-twitter"></i>
                    <i class="icon-twitter"></i>
                </a>
               
                <a href="<?php echo $row['googleplus']; ?>" class="social-icon si-borderless si-gplus">
                    <i class="icon-gplus"></i>
                    <i class="icon-gplus"></i>
                </a>
               
                <a href="<?php echo $row['companyemail']; ?>" class="social-icon si-borderless si-email3">
                    <i class="icon-email3"></i>
                    <i class="icon-email3"></i>
                </a>
            </div>
        </div>
        <!-- Portfolio Single - Share End -->

    </div><!-- .portfolio-single-content end -->

</div>