<?php include('header.php');





 ?>


<section id="page-title" class="page-title-center">

			 <?php
			
				$res=@mysql_query("Select tbljob.*,tblcompany.*,tbldepartment.*,tbldesignation.* From tbldesignation,tbldepartment,tbljob,tblcompany where tbljob.companyid=tblcompany.companyid And tbljob.designation=tbldesignation.designationid And tbljob.departmentid=tbldepartment.departmentid And tbljob.jobid=$_REQUEST[id]") or die(mysql_errno());
				$row=@mysql_fetch_assoc($res);
				?>
			
			<div class="container clearfix">
				<h1><?php echo $row['jobname']; ?></h1>
				<span><?php echo $row['jobtype']; ?></span>
				<span>Department : <?php echo $row['departmentname']; ?></span>
				<!--<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Shortcodes</a></li>
					<li class="active">Page Titles</li>
				</ol>-->
			</div>

</section><!-- #page-title end -->


<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<!-- Portfolio Single Image
				============================================= -->
				
				<!-- .portfolio-single-image end -->

				<div class="container clearfix">

					<div class="col_one_third nobottommargin">
					

						<!-- Portfolio Single - Meta
						============================================= -->
						<div class="panel panel-default events-meta">
							<div class="panel-body">
								<ul class="portfolio-meta nobottommargin">
									<li><span><i class="icon-user"></i>Designation:</span><?php echo $row['designationname']; ?></li>
									<li><span><i class="icon-calendar3"></i>Post Date:</span><?php echo $row['jobpostdate']; ?></li>
									<li><span><i class="icon-lightbulb"></i>Skills:</span><?php echo $row['jobreqskill']; ?></li>
									<li><span><i class="icon-map-marker"></i>Location:</span><?php echo $row['joblocation']; ?></li>
									<li><span><i class="icon-money"></i>Salary:</span><?php echo $row['jobminsalary']; ?>-<?php echo $row['jobmaxsalary']; ?></li>
									<li><span><i class="icon-time"></i>Experience:</span><?php echo $row['jobminexp']; ?>-<?php echo $row['jobmaxexp']; ?></li>
									<li><span><i class="icon-book"></i>Qualification:</span><?php echo $row['jobqualification']; ?></li>
									
								</ul>
							</div>
						</div>
						

					</div>

					<!-- Portfolio Single Content
					============================================= -->
					<div class="col_two_third portfolio-single-content col_last nobottommargin">
					<div class="style-msg successmsg" id="msgsuc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>

						<!-- Portfolio Single - Description
						============================================= -->
						<div class="fancy-title title-dotted-border">
							<h2>Job Info:</h2>
						</div>

						<div class="col_full nobottommargin">
							<p><?php echo $row['jobdescription']; ?></p>
						</div>
						<?php
						if($_SESSION['LoggedUserRole']=='Candidate')
						{
						?>
						
						<div class="col_full nobottommargin" align="right">
						<a class="button button-border button-rounded button-fill fill-from-bottom button-black" onClick="applyforjob(<?php echo $row['jobid']; ?>)">
							<span>Apply For This Job</span>
						</a>
						</div>
						<?php
						}
						?>
						<!-- Portfolio Single - Description End -->

					</div><!-- .portfolio-single-content end -->

				</div>

				

			</div>

		</section><!-- #content end -->

		

	</div><!-- #wrapper end -->


 <script type="text/javascript" src="customjs/js_jobbycompany.js"></script>	

<?php include('footer.php'); ?>