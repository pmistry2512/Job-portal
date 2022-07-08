<?php
include_once("header.php");

if($_SESSION["LoggedUserRole"]!='Candidate' || $_SESSION["LoggedUserRole"]!='Employer' || $_SESSION["LoggedUserRole"]!='TPO' || $_SESSION["LoggedUserRole"]!='Admin')
{
	echo "<script>window.location.href='Unauthorized.php';</script>";exit;
}

?>

	<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Forget Password</h1>
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
										<h3>Forgot Password ?</h3>

										<form id="register-form" name="register-form" class="nobottommargin" action="#" method="post">
													  <input type="hidden" id="functionname" name="functionname" value="forgetpass">
										
										 <br>
										<div class="style-msg successmsg" id="msgsucc" style="display:none;">
										  <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> Login Successful!!! Redirecting... Please Wait...</div>
										  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
										</div>
										<div class="style-msg errormsg" id="msgerr" style="display:none;">
										  <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong> Invalid Username or Password</div>
										</div>
											

											<div class="col_full">
												<label for="register-form-email">Enter Email Id:</label>
												<input type="email" id="email" name="email" class="form-control required email" required=""/>
											</div>
											
											
											
										    <br>
										
											<div class="col_full nobottommargin">
												<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register">Get Password</button>
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
	<script type="text/javascript">

		$(document).ready(function() {
			$("#input-8").fileinput({
				mainClass: "input-group-md",
				showUpload: false,
				previewFileType: "image",
				browseClass: "btn btn-success",
				browseLabel: "Pick Image",
				browseIcon: "<i class=\"icon-picture\"></i> ",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				uploadClass: "btn btn-info",
				uploadLabel: "Upload",
				uploadIcon: "<i class=\"icon-upload\"></i> "
			});
		});

	</script>
		

<?php
include_once("footer.php");
?>		

	

