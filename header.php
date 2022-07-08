<!DOCTYPE html>
<?php
session_start();
include_once("config.php");

?>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="css/swiper.css" type="text/css" />
	<link rel="stylesheet" href="css/dark.css" type="text/css" />
	<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="css/animate.css" type="text/css" />
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />

	<!-- Bootstrap File Upload CSS -->
	<link rel="stylesheet" href="css/components/bs-filestyle.css" type="text/css" />
	<!-- Radio Checkbox Plugin -->
	<link rel="stylesheet" href="css/components/radio-checkbox.css" type="text/css" />
		<!-- Date & Time Picker CSS -->
	<link rel="stylesheet" href="demos/travel/css/datepicker.css" type="text/css" />
	<!-- Bootstrap Switch CSS -->
	<link rel="stylesheet" href="css/components/bs-switches.css" type="text/css" />
	<!-- Bootstrap Data Table Plugin -->
	<link rel="stylesheet" href="css/components/bs-datatable.css" type="text/css" />

	<!-- Bootstrap Select CSS -->
	<link rel="stylesheet" href="css/components/bs-select.css" type="text/css" />

    	
	<link rel="stylesheet" href="css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<!-- Document Title
	============================================= -->
	<title>Job Portal | SSA Navsari</title>

</head>
<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

<!-- Top Bar
		============================================= -->
		<div id="top-bar">

			<div class="container clearfix">

				<div class="col_half nobottommargin">

					<!-- Top Links
					============================================= -->
					<div class="top-links">
						<ul>
						<?php 
						if(!isset($_SESSION['LoggedUserId']))
						{
							?>
							<li><a href="candidate_registration.php">Student Signup</a></li>
							<li><a href="company_registration.php">Employer Signup</a></li>  
                            <?php 
							}
							if(!isset($_SESSION['LoggedUserRole']))
							{                          
							?>
                                <li><a href="javascript:void(0);">Login</a>
                                    <div class="top-link-section" id="loginpanel">
                                        <form id="login" name="login" role="form" method="post">
                                            <input type="hidden" id="functionname" name="functionname" value="CheckLogin">
                                            <div class="input-group" id="top-login-username">
                                                <span class="input-group-addon"><i class="icon-user"></i></span>
                <input type="email" class="form-control" placeholder="Email address" value="" required="" id="email" name="email">
                                            </div>
                                            <br>
                                            <div class="input-group" id="top-login-password">
                                                <span class="input-group-addon"><i class="icon-key"></i></span>
                <input type="password" class="form-control" placeholder="Password" value="" required="" id="pass" name="pass">
                                            </div>
    <br>
                <button class="btn btn-danger btn-block" type="submit" name="btsubmit" id="btsubmit">Sign in</button>
    
                                        </form>
                                    </div>
                                </li>
                            <?php
							}
							?>
						</ul>
					</div><!-- .top-links end -->

				</div>

				<div class="col_half fright col_last nobottommargin">

					<!-- Top Social
					============================================= -->
					<div id="top-social">
						<ul>
							<li><a href="https://www.facebook.com/agrawaleducationfoundation/" class="si-facebook"><span class="ts-icon"><i class="icon-facebook"></i></span><span class="ts-text">Facebook</span></a></li>
							<li><a href="tel:+91.2637.234567" class="si-call"><span class="ts-icon"><i class="icon-call"></i></span><span class="ts-text">+91.2637.234567</span></a></li>
							<li><a href="mailto:info@ssagrawal.org" class="si-email3"><span class="ts-icon"><i class="icon-email3"></i></span><span class="ts-text">info@ssagrawal.org</span></a></li>
						</ul>
					</div><!-- #top-social end -->

				</div>

			</div>

		</div><!-- #top-bar end -->


		<!-- Header
		============================================= -->
		<header id="header" class="full-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="index.php" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/ssa2.png" alt="Canvas Logo"></a>
						<a href="index.php" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/ssa2.png" alt="Canvas Logo"></a>
					</div>
					<!-- #logo end -->
					<?php 
						if(isset($_SESSION['LoggedUserRole']))
						{                          
					?>
                            <div id="top-account" class="dropdown">
                                <a href="#" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="icon-user"></i><i class="icon-angle-down"></i></a>
                                <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
								 <li><a href="#">Welcome<br> <b><?php echo $_SESSION['LoggedUserName'] ?></b></a></li>
								  <li role="separator" class="divider"></li>
                                    <!-- Candidate -->
                                    <?php
                                        if($_SESSION["LoggedUserRole"]=="Candidate")
                                        {
                                    ?>
                                    <li><a href="candidate_Profile.php">Profile</a></li>
                                    <?php 
                                        }
										 if($_SESSION["LoggedUserRole"]=="Employer")
                                        {
                                    ?>
                                    <li><a href="company_Profile.php">Profile</a></li>
                                    <?php
										}
									?>	
                                    <li role="separator" class="divider"></li>
                                    <li><a href="logout.php">Logout <i class="icon-signout"></i></a></li>
                                </ul>
                            </div>
                    <?php
						}
					?>	
					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<?php
							if(!isset($_SESSION["LoggedUserRole"]))
								{ ?>
							 <li><a href="index.php"><div>Home</div></a></li>	
							 <?php }
							 ?>
                            <?php
								if(isset($_SESSION["LoggedUserRole"]))
								{
							?>		   	
                            <!-- Candidate -->
                            <?php
								if($_SESSION["LoggedUserRole"]=="Candidate")
								{
							?>
							<!-- Common -->
	                        <li><a href="Home_candidate.php"><div>Home</div></a></li>
							<?php
								$qry=@mysql_query("select * from tblcandidate where candidateid=$_SESSION[LoggedUserId]")or die(mysql_error());
								$rw=@mysql_fetch_assoc($qry);
								if($rw['emailverified']=='Y')
								{
							 ?>
                            <li><a href="#"><div>Jobs</div></a>
                            	<ul>
                            	 	<li><a href="#"><div>View Jobs</div></a>
                                        <ul>
                                          <li><a href="jobbycompany.php"><div>Jobs By Company</div></a></li>
                                          <li><a href="jobbydesignation.php"><div>Jobs By Designation</div></a></li>
										   <li><a href="jobbylocation.php"><div>Jobs By Location</div></a></li>
										   <li><a href="jobbyindustry.php"><div>Jobs By Industry</div></a></li>
                                        </ul>
                                     </li>   
                                      <li><a href="MyJobs_Candidate.php"><div>Job Activities</div></a></li>
                                      <li><a href="searchjob.php"><div>Search Jobs</div></a></li>
									  <li><a href="Candidate_HiredJobList.php"><div>Hired for Jobs</div></a></li>
                                 </ul> 
                            </li>
							<li><a href="#"><div>Job Invites & Schedule</div></a>
								<ul>
									<li><a href="MyInvitation.php"><div>Job Invites</div></a> </li>
									<li><a href="Candidate_RoundInvitations.php"><div>Round Invites</div></a> </li>
									<li><a href="Candidate_InterviewSchedule.php"><div>Interview Schedules</div></a> </li>
								
								</ul>
							</li>	
							
							 <li><a href="candidate_JobInformer.php"><div>Job Prefrences</div></a></li>
							 <?php 
							}
							?>
							  <li><a href="pdf.php?id=<?php echo $_SESSION['LoggedUserId']; ?>"><div>Create CV</div></a></li>
                            <li><a href="candidate_changepassword.php"><div>Change Password</div></a></li>
                            <?php
								}
							?>	
                            <!-- End Candidate -->
                            <?php
								if($_SESSION["LoggedUserRole"]=="Employer")
								{
							?>
                            <!-- Company -->
							<!-- Common -->
	                        <li><a href="Home_Company.php"><div>Home</div></a></li>
                            <?php
								$qry=@mysql_query("select * from tblcompany where companyid=$_SESSION[LoggedUserId]")or die(mysql_error());
								$rw=@mysql_fetch_assoc($qry);
								if($rw['emailverified']=='Y')
								{
							 ?>
							<li><a href="#"><div>Jobs & Interview</div></a>
                            	<ul>
                            	 	<li><a href="#"><div>Job</div></a>
                                        <ul>
                                          <li><a href="Manage_Job.php"><div>Manage Jobs</div></a></li>
                                          <li><a href="addjob.php"><div>Add Job</div></a></li>
                                        </ul>
                                      </li>
                                      <li><a href="listinterview.php"><div>Interview</div></a>
                                        
                                      </li>
                                     
                                 </ul> 
                            </li>
							 <li><a href="invitecandidate.php"><div>Invite Candidate</div></a> </li>
							  <li><a href="HiredCandidateList_Company.php"><div>Hired Candidates</div></a></li>
							  <?php 
							  }
							  ?>
							<li><a href="#"><div>Reports</div></a>
							<ul>
								<li><a href="Report_CompanyInterview.php"><div>Designation Wise Interviews</div></a></li>
								<li><a href="Report_DesignationWiseHiredCandidate.php"><div>Designation Wise Placement</div></a></li>
								<li><a href="Report_YearWisePlacement.php"><div>Year Wise Placements</div></a></li>
								
							</ul>
							</li>
							
                           
                            <li><a href="company_changepassword.php"><div>Change Password</div></a></li>
                            <?php
								}
							?>	
                            <!-- End Company -->
                            
                            <!-- Admin -->
                            <?php
								if($_SESSION["LoggedUserRole"]=="Admin")
								{
							?>
							<!-- Common -->
	                        <li><a href="Home_Admin.php"><div>Home</div></a></li>
							
                            <li><a href="#"><div>Manage</div></a>
								<ul>
								
                                    <li><a href="listdepartment.php"><div>Manage Department</div></a></li>
                                    <li><a href="listgraduation.php"><div>Manage Graduation</div></a></li>
                                    <li><a href="listgradspecilization.php"><div>Manage Graduation Specilization</div></a></li>
                                    <li><a href="listpostgraduation.php"><div>Manage Postgraduation</div></a></li>
                                    <li><a href="listposgradspecialization.php"><div>Manage PostGraduation Specialization</div></a></li>
                                    <li><a href="listuniversity.php"><div>Manage University</div></a></li>
									<li><a href="listindustry.php"><div>Manage Industry</div></a></li>
                                    <li><a href="listdesignation.php"><div>Manage Designation</div></a></li>
                                    <li><a href="manage_TPO.php"><div>Manage TPO</div></a></li>
                                    <li><a href="manage_company.php"><div>Manage Companies</div></a></li>
                                   
								</ul>
							</li>
							<li><a href="#"><div>Reports</div></a>
							<ul>
							<li><a href="Report_RegisteredCompany.php"><div>Registered Companies</div></a> </li>
								 	<li><a href="Report_RegisteredCandidate.php"><div>Registered Students</div></a> </li>
								<li><a href="Report_CompanyWiseHiredCandidate.php"><div>Company Wise Placements</div></a></li>
								<li><a href="Report_CompanyWiseJob.php"><div>Company Wise Jobs</div></a></li>
								<li><a href="Report_DesignationWiseHiredCandidate.php"><div>Designation Wise Placement</div></a></li>
								<li><a href="Report_YearWisePlacement.php"><div>Year Wise Placements</div></a></li>
								<li><a href="Report_DateWisePlacement.php"><div>Date Wise Placements</div></a></li>
								<li><a href="Report_DepartmentWisePlacement.php"><div>Department Wise Placements</div></a></li>
								
							</ul>
							</li>
                            <li><a href="admin_changepassword.php"><div>Change Password</div></a></li>
                            <?php
								}
							?>	
                            <!-- End Admin -->
                            
                            <!-- TPO -->
                            <?php
								if($_SESSION["LoggedUserRole"]=="TPO")
								{
							?>
							<li><a href="Home_Admin.php"><div>Home</div></a></li>
                            <li><a href="#"><div>Manage</div></a>
                                <ul>
                                    <li><a href="manage_candidate.php"><div>Manage Candidate</div></a> </li>
                                    <li><a href="TPO_JobApplication.php"><div>Manage Job Applications</div></a></li>
                                    <li><a href="TPO_ManageInterview.php"><div>Manage Interview</div></a></li>
                                    <li><a href="TPO_ManageInvitation.php"><div>Manage Job Invites</div></a></li>
                                </ul>
                            </li>
							  <li><a href="HiredCandidateList.php"><div>Hired Candidates</div></a></li>
							<li><a href="#"><div>Reports</div></a>
							<ul>
								<li><a href="Report_CompanyWiseHiredCandidate.php"><div>Company Wise Placements</div></a></li>
								<li><a href="Report_CompanyWiseJob.php"><div>Company Wise Jobs</div></a></li>
								<li><a href="Report_DesignationWiseHiredCandidate.php"><div>Designation Wise Placement</div></a></li>
								<li><a href="Report_YearWisePlacement.php"><div>Year Wise Placements</div></a></li>
								<li><a href="Report_DateWisePlacement.php"><div>Date Wise Placements</div></a></li>
							</ul>
							</li>
                            <li><a href="admin_changepassword.php"><div>Change Password</div></a></li>
                            <?php
								}
							?>
                            <!-- End TPO
							<?php
								}
							?>
                            <!-- Common -->
                            <li><a href="aboutUs.php"><div>About Us</div></a></li>                            
							<li><a href="contactUs.php"><div>Contact Us</div></a></li>
                            
						</ul>
						

						<!-- Top Cart
						============================================= -->
						<div id="top-cart">
							<a href="#" id="top-cart-trigger"><i class="icon-bell"></i><span id="notificationcount">0</span></a>
							<div class="top-cart-content">
								<div class="top-cart-title">
									<h4>Notifications</h4>
								</div>
								<div class="top-cart-items" id="notificationitems">
									
								</div>
								<div class="top-cart-action clearfix">
									<a class="button button-3d button-small nomargin fright" href="notifications.php">View All</a>
								</div>
							</div>
						</div><!-- #top-cart end -->


					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
