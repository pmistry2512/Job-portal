<?php
include_once("header.php");

?>

	<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Candidate Registration</h1>
				<!--<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
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
										<h3>Register for an Account</h3>

										<form class="nobottommargin" method="post" enctype="multipart/form-data">
										
										<?php
						if(isset($_POST['submit']))
						{
						
						
						//Get The Random Number to get unique file name
						$sid = session_id();
						$sid=substr($sid,2,10);
						$rname="";
						foreach($_FILES as $file_name => $file_array) 
						{
							$sid=str_shuffle($sid);
							if (is_uploaded_file($file_array['tmp_name'])) 
							{
								$f1 = explode(".",$file_array['name']);
								$rname = $sid . "." .$f1[1];
								$ext = pathinfo($rname, PATHINFO_EXTENSION);
								$extentions= array("pdf","doc","docx");
								if(in_array($ext,$extentions)=== false)
								{
									$insert="No";
								?>
									<div class="ErrorMessage">
										Please choose a PDF , DOC or Docx File.
									</div>	
								<?php
								  }
								  else
								  {
										move_uploaded_file($file_array['tmp_name'],"uploadedresumes/$rname");
								  }
							}
						}
						
						
						$query="update tblcandidate set candidateskills='$_POST[txtskill]',candidatelanguages='$_POST[txtlanguage]',candidatepersonaldescription='$_POST[txtdec]',candidateresume='$rname',facebook='$_POST[fb]',twitter='$_POST[twitter]',googleplus='$_POST[gplus]' where candidateid=$_SESSION[cid]";
						@mysql_query($query) or die(mysql_error());?>
						 
						<div class="style-msg errormsg" id="msgsuc" >
						  <div class="sb-msg"><strong>Account Registered Sucessfully.</strong></div>
						  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
						</div>
						
						<?php }
					?>
								<!--<input type="hidden" id="functionname" name="functionname" value="candidateregistration3">-->

											
											
											<div class="col_full">
												<label for="register-form-name"> Skills:</label>
												<textarea id="txtskill" name="txtskill" rows="2" cols="15" class="sm-form-control required" required="" ></textarea>
											</div>
											
											<div class="col_full">
												<label for="register-form-name"> Language Known:</label>
												<textarea id="txtlanguage" name="txtlanguage" rows="2" cols="15" class="sm-form-control required" required="" ></textarea>
											</div>
											
											<div class="col_full">
												<label for="register-form-name">Personal Description:</label>
												<textarea id="txtdec" name="txtdec" rows="2" cols="15" class="sm-form-control required" required="" ></textarea>
											</div>
											
											
											
											<div class="col-full">
													
															<label>Upload Resume</label><br>
															<input id="input-8" name="photo" type="file" class="file-loading"data-allowed-file-extensions='["docx", "doc", "pdf"]' data-show-preview="false">
							
																							
											</div>	
											<br>
											
											<div class="col_full">
												
													<label for="">FaceBook Link</label>
													
														<input type="text" value="" class="sm-form-control tleft format required" id="fb" name="fb">
												
											</div>
											
											<div class="col_full">
												
													<label for="">GooglePlus Link</label>
													
														<input type="text" value="" class="sm-form-control tleft format required" id="gplus" name="gplus">
												
											</div>
											
											<div class="col_full">
												
													<label for="">Twitter Link</label>
													
														<input type="text" value="" class="sm-form-control tleft format required" id="twitter" name="twitter">
												
											</div>
											
											<br>					
											<!--<div class="col_full">

									<script src="https://www.google.com/recaptcha/api.js" async defer></script>
									<div class="g-recaptcha" data-sitekey="6LfijgUTAAAAACPt-XfRbQszAKAJY0yZDjjhMUQT"></div>

								</div>
										    -->
										
											<!--<div class="col_full nobottommargin">
												<button class="button button-3d button-black nomargin" id="submit" name="submit" value="submit" type="submit">Register Now</button>
											</div>-->
											<input class="button" type="submit" value="Register" id="submit" name="submit"/>

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
		$(document).on('ready', function() {
			$("#input-8").fileinput({
				mainClass: "input-group-md",
				showUpload: false,
				previewFileType: "image",
				browseClass: "btn btn-primary",
				browseLabel: "Browse",
				browseIcon: "<i class=\"icon-folder-open\"></i> ",
				removeClass: "btn btn-danger",
				removeLabel: "Delete",
				removeIcon: "<i class=\"icon-trash\"></i> ",
				uploadClass: "btn btn-info",
				uploadLabel: "Upload",
				uploadIcon: "<i class=\"icon-upload\"></i> "
			});
		});
		</script>
		<script>
		$(document).ready(function() {
			$("#msgsuc").fadeOut(6000);
		});
	</script>

		

		
<?php
include_once("footer.php");
?>		