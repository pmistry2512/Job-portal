<?php
session_start();
include_once("config.php");
?>


<div id="portfolio-ajax-single" class="clearfix">

 <?php 
	$sql=@mysql_query("select tblcandidate.*, tbljobapply.*, tbljob.*,tbldesignation.*,tblcompany.* from tblcompany,tbldesignation,tblcandidate,tbladmin,tbljob,tbljobapply where tbljob.companyid=tblcompany.companyid And tbljob.designation=tbldesignation.designationid And tbladmin.departmentid=tblcandidate.departmentid And tbljob.jobid=tbljobapply.jobid And tblcandidate.candidateid=tbljobapply.candidateid And tbljobapply.applicationstatus='Applied' and tbladmin.status='Active' And tblcandidate.candidateid=$_REQUEST[candid]") or die(mysql_error());
	
				$row=@mysql_fetch_assoc($sql);
					
	?>

    <div id="portfolio-ajax-title" style="position: relative;">
        <h2><?php echo $row['candidatename']; ?></h2>
        <div id="portfolio-navigation">
            <a href="#" id="close-portfolio"><i class="icon-line-cross"></i></a>
        </div>
    </div>

    <div class="line line-sm topmargin-sm"></div>

    <!-- Portfolio Single Image
    ============================================= -->
    <div class="col_one_fourth portfolio-single-image nobottommargin">
        <a href="#"><img src="uploadedphotos/<?php echo $row['candidateimage']; ?>" alt=""></a>
    </div><!-- .portfolio-single-image end -->

    <!-- Portfolio Single Content
    ============================================= -->
    <div class="col_three_fourth portfolio-single-content col_last nobottommargin">

        <!-- Portfolio Single - Description
        ============================================= -->
        <p><?php echo $row['candidatepersonaldescription']; ?></p>
        <!-- Portfolio Single - Description End -->
		<ul class="portfolio-meta bottommargin">
			 <li><span><i class="icon-briefcase"></i>Company :</span> <?php echo $row['companyname']; ?></li>
            <li><span><i class="icon-user"></i>Designation :</span> <?php echo $row['designationname']; ?>&nbsp;(<?php echo $row['jobtype']; ?>)</li>
			 
        </ul>
        <div class="line" style="margin: 40px 0;"></div>

        <!-- Portfolio Single - Meta
        ============================================= -->
        <ul class="portfolio-meta bottommargin">
            <li><span><i class="icon-user"></i>Enrollment No :</span> <?php echo $row['candidateenrollno']; ?></li>
			 <li><span><i class="icon-map-marker"></i>Address :</span> <?php echo $row['candidateadd']; ?></li>
            <li><span><i class="icon-book"></i>Skills :</span> <?php echo $row['candidateskills']; ?></li>
            <li><span><i class="icon-envelope"></i>Email :</span><?php echo $row['candidateemail']; ?></li>
            <li><span><i class="icon-phone"></i>Contact No:</span><?php echo $row['candidatemobile']; ?> , <?php echo $row['candidatephone1']; ?> </li>
			<b><a href="uploadedresumes/<?php echo $row['candidateresume']; ?>"><i class="icon-download"></i>&nbsp;&nbsp;Download Resume</a></b>
        </ul>
		
        <!-- Portfolio Single - Meta End -->

        <!-- Portfolio Single - Share
        ============================================= -->
        <div class="si-share clearfix">
            <span>Social Profiles:</span>
			<?php 
				$s=@mysql_query("select * from tblcandidate where candidateid=$_REQUEST[candid]");
				$r=@mysql_fetch_assoc($s);
			?>
            <div>
                <a href="<?php echo $r["facebook"]; ?>" class="social-icon si-borderless si-facebook">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                </a>
                <a href="<?php echo $r['twitter']; ?>" class="social-icon si-borderless si-twitter">
                    <i class="icon-twitter"></i>
                    <i class="icon-twitter"></i>
                </a>
               
                <a href="<?php echo $r['googleplus']; ?>" class="social-icon si-borderless si-gplus">
                    <i class="icon-gplus"></i>
                    <i class="icon-gplus"></i>
                </a>
               
                <a href="<?php echo $r['candidateemail']; ?>" class="social-icon si-borderless si-email3">
                    <i class="icon-email3"></i>
                    <i class="icon-email3"></i>
                </a>
            </div>
        </div>
        <!-- Portfolio Single - Share End -->

    </div><!-- .portfolio-single-content end -->

</div>