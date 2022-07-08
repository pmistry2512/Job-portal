<?php
include_once("header.php");
include("ValidCompany.php");
?>	

<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Change Password</h1>
				
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
											<h3>Change Password</h3>
	
										
										
									<form id="compchangepass" name="compchagepass" class="nobottommargin" method="post">				
									<input type="hidden" id="functionname" name="functionname" value="companychangepass"/>
											<div class="col_full">
													<label for="register-form-password">Current Password:</label>
													<input type="password" id="txtcpass" name="txtcpass" value="" class="sm-form-control required" required=""/>
												</div>
												
											<div class="col_full">
													<label for="register-form-password">New Password:</label>
													<input type="password" id="txtnpass" name="txtnpass" value="" class="sm-form-control required" required=""/>
												</div>
	
											<div class="col_full">
													<label for="register-form-repassword">Confirm Password:</label>
													<input type="password" id="txtrepass" name="txtrepass" value="" class="sm-form-control required" required=""/>
												</div>
												
												<br />
												 <div class="style-msg successmsg" id="msgsucc" style="display:none;">
                  									<div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>Password Changed Sucessfully...</div>
                 
               									 </div>
												<div class="style-msg errormsg" id="msgerr" style="display:none;">
												  <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>Enable to change Password</div>
												</div>
												
											<div class="col_full nobottommargin">
													<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register" type="submit">Submit</button>
												</div>
												
												
												
												
									</form>
									
												
											
										</div>
									</div>
								</div>
						</div>
	
					</div>
	
				</div>
	
			</section><!-- #content end -->

<?php
include_once("footer.php");
?>	