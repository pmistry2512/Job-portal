<?php
include_once("header.php");
include("ValidAdmin.php");
?>

	<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>TPO Registration</h1>
				<!--<ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li><a href="#">Pages</a></li>
					<li class="active">Login</li>
				</ol>-->
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

						

							<div class="tab-content clearfix" id="tab-register">
								<div class="panel panel-default nobottommargin">
									<div class="well well-lg nobottommargin" style="padding: 40px;">
										<h3>Register TPO</h3>

									<form id="tporeg" name="tporeg" class="nobottommargin" method="post">
									
										<input type="hidden" id="functionname" name="functionname" value="">

											<div class="col_full">
												<label for="register-form-name"> TPO Name:</label>
												<input type="name" id="txtname" name="txtname" value="" class="sm-form-control required" required=""/>
											</div>
										

											<div class="col_full">
												<label for="register-form-email">Email Id:</label>
												<input type="email" id="txtemail" name="txtemail" value="" class="sm-form-control required" required=""/>
											</div>
											
											<div class="col_full">
												<label for="register-form-password">Password:</label>
												<input type="password" id="txtpass" name="txtpass" value="" class="sm-form-control required" required=""/>
											</div>

											<div class="col_full">
												<label for="register-form-repassword">Re-enter Password:</label>
												<input type="password" id="txtrepass" name="txtrepass" value="" class="sm-form-control required" required=""/>
											</div>
											
											
											
											<div class="col_full">
												<label for="register-form-city">Department:</label>
												<select class="form-control" id="department" name="department" >
  													<?php
															$sql=@mysql_query("Select * From tbldepartment where delstatus='N'") or die(mysql_error());
															while($row=@mysql_fetch_array($sql))
															{
													?>
																<option value="<?php echo $row['departmentid'];?>"><?php echo $row['departmentname'];?></option>
													<?php
															}
													?>
												</select>
												
											</div>
											
											<div class="col_full">
												<label for="register-form-state">Status:</label>
												<select class="form-control" id="status" name="status" >
													<option value="Select">--Select--</option>
													<option value="Active">Active</option>
													<option value="Block">Block</option>
												
												</select>
											</div>
											
											

										    
										    <br>
											 <div class="style-msg successmsg" id="msgsucc" style="display:none;">
                  <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> TPO Registered Sucessfully</div>
                  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                </div>
                <div class="style-msg errormsg" id="msgerr" style="display:none;">
                  <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>Tpo Already Assigned For This Department</div>
                </div>
										
											<div class="col_full nobottommargin">
												<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register" type="submit">Register</button>
											</div>
											</form>
										
									</div>
								</div>
							</div>
					</div>

				</div>

			</div>

		</section><!-- #content end -->
		<script type="text/javascript" src="js/jquery.js"></script>	
	
		

<?php
include_once("footer.php");
?>		

	

