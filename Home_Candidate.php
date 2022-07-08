<?php include("header.php");
include("ValidCandidate.php"); ?>
<?php $s=@mysql_query("select candidatename from tblcandidate where candidateid=$_SESSION[LoggedUserId]");
					$company=@mysql_fetch_assoc($s);
			 ?>
<h4 style="color:#5DBCD2 !important;"><center>Welcome <?php echo $company['candidatename']; ?></center></h4>
<section id="content">
<?php
		$q= @mysql_query("select * from tbljob,tblcompany,tbldesignation Where tbljob.designation=tbldesignation.designationid And  tbljob.companyid=tblcompany.companyid And tbljob.departmentid=$_SESSION[LoggedUserDepartment] order by tbljob.jobpostdate desc limit 5") or die (mysql_error()); 
		
		?>

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					
					<div class="postcontent nobottommargin clearfix">
					
					<?php
					$query=@mysql_query("Select * from tblcandidate where candidateid=$_SESSION[LoggedUserId]")or die(mysql_error());
					$r=@mysql_fetch_array($query);
					if($r['emailverified']=='N')
					{
					?>
					<div class="style-msg alertmsg">
							<div class="sb-msg">
								<i class="icon-warning-sign"></i>
									<strong>Warning!</strong>
									To search a job, apply for any job, and to do other activities you need to verify your email id first.<br />
								Your EmailId not Verified Yet! <a href="Candidate_EmailVerify.php" onClick="candidateVerify(<?php echo $_SESSION['LoggedUserId'] ?>)">Click Here</a> to Verify.
							</div>
						</div>
					<?php
					}
					?>

						<!-- Posts
						============================================= -->
						<div id="posts" class="small-thumbs">
						
						

		
		
						
						
<?php
 while($row=@mysql_fetch_array($q))
 {
 ?>
							<div class="entry clearfix">
								
								<div class="entry-c">
									<div class="entry-title">
										<h2><a href="JobDetail_Company.php?id=<?php echo $row['jobid']; ?>"><?php echo $row['jobname']; ?></a></h2>
									</div>
									<ul class="entry-meta clearfix">
									<li><i class="icon-briefcase"></i><?php echo $row['companyname']; ?></li>
										<li><i class="icon-calendar3"></i><?php echo $row['jobpostdate']; ?></li>
										<li><a href="#"><i class="icon-user"></i><?php echo $row['jobtype']; ?></a></li>
										<li><i class="icon-briefcase"></i><?php echo $row['designationname']; ?></li>
										
										<!--<li><a href="blog-single.html#comments"><i class="icon-comments"></i> 13</a></li>
										<li><a href="#"><i class="icon-camera-retro"></i></a></li>-->
									</ul>
									<div class="entry-content">
										<p><?php echo $row['jobdescription']; ?></p>
										
									</div>
								</div>
							</div>


							
<?php } ?>
							

						</div><!-- #posts end -->

						

					</div><!-- .postcontent end -->

					<!-- Sidebar
					============================================= -->
					<div class="sidebar nobottommargin col_last clearfix">
						<div class="sidebar-widgets-wrap">

							

							<div class="widget clearfix">

								<div class="tabs nobottommargin clearfix" id="sidebar-tabs">

									

									<div class="well well-lg nobottommargin">

										
										<div class="tab-content clearfix">
											<div id="recent-post-list-sidebar">

												<div class="spost clearfix">
													<?php 
													
													$res=mysql_query("Select count(*) as cnt from tbljobinvite where candidateid=$_SESSION[LoggedUserId] and invitestatus='Approved'");
			$row=mysql_fetch_assoc($res);
			
													
													?>
													<div class="entry-c">
														<strong><?php echo $row['cnt']; ?></strong> New job Invite(s)...
													</div>
												</div>

												

											</div>
										</div>
										
										<div class="tab-content clearfix" id="tabs-3">
											<div id="recent-post-list-sidebar">

												<div class="spost clearfix">
													<?php 
													
													$res=mysql_query("Select count(*) as cnt from tbljobapply where candidateid=$_SESSION[LoggedUserId] and applicationstatus='Hired'");
			$row=mysql_fetch_assoc($res);
			
													
													?>
													<div class="entry-c">
														<strong><?php echo $row['cnt']; ?></strong> Employers Have Hired You...
													</div>
												</div>

												

											</div>
										</div>
										
										<div class="tab-content clearfix" id="tabs-3">
											<div id="recent-post-list-sidebar">

												<div class="spost clearfix">
													<?php 
													
													$res=mysql_query("Select count(*) as cnt from tbljobapply where candidateid=$_SESSION[LoggedUserId] and applicationstatus='Approved'");
			$row=mysql_fetch_assoc($res);
													
													?>
													<div class="entry-c">
														<strong><?php echo $row['cnt']; ?></strong> Applications Approved By TPO...
													</div>
												</div>

												

											</div>
										</div>
										
										<div class="tab-content clearfix" id="tabs-3">
											<div id="recent-post-list-sidebar">

												<div class="spost clearfix">
													<?php 
													
													$res=mysql_query("Select count(*) as cnt from tbljobapply where candidateid=$_SESSION[LoggedUserId] and applicationstatus='Interviewed'");
			$row=mysql_fetch_assoc($res);
													
													?>
													<div class="entry-c">
														<strong><?php echo $row['cnt']; ?></strong> Applications Approved By Employer...
													</div>
												</div>

												

											</div>
										</div>

									</div>

								</div>

							</div>

							

							

						</div>

					</div><!-- .sidebar end -->

				</div>

			</div>

		</section><!-- #content end -->
<!-- #content end -->
<script type="text/javascript" src="js/jquery.js"></script> 
<script type="text/javascript" src="customjs/js_verify.js"></script>

<?php include("footer.php"); ?>