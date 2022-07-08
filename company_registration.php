<?php
include_once("header.php");
?>

	<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Company Registration</h1>
				
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
						$fname="";
						foreach($_FILES as $file_name => $file_array) 
						{
							$sid=str_shuffle($sid);
							if (is_uploaded_file($file_array['tmp_name'])) 
							{
								$f1 = explode(".",$file_array['name']);
								$fname = $sid . "." .$f1[1];
								$ext = pathinfo($fname, PATHINFO_EXTENSION);
								$extentions= array("jpeg","jpg","png","bmp","JPG","JPEG","PNG","BMP","gif","GIFd");
								if(in_array($ext,$extentions)=== false)
								{
									$insert="No";
								?>
									<div>
										Please choose a JPEG or PNG or BMP file.
									</div>	
								<?php
								  }
								  else
								  {
										move_uploaded_file($file_array['tmp_name'],"uploadedphotos/$fname");
								  }
							}
							else
							{
								$fname='noImage.png';
							}
						}
						$pass=base64_encode($_POST["txtpass"]);
						$description  = $_POST["txtdesc"];
						$_desc = mysql_real_escape_string($description);
						$query="insert into tblcompany (status,companyname,companycontactno,companycontactperson,companyemail,companypass,companyaddress,companydescription,companystate,companycity,companywebsite,companylogo,facebook,twitter,linkedin,googleplus) values('Applied','$_POST[txtcname]',$_POST[txtcno],'$_POST[txtcp]','$_POST[txtemail]','$pass','$_POST[txtadd]','$_desc',$_POST[drpstate],$_POST[drpcity],'$_POST[txtsite]','$fname','$_POST[fb]','$_POST[twitter]','$_POST[ll]','$_POST[gplus]')";

						@mysql_query($query) or die(mysql_error());
						?>
						<div class="style-msg successmsg" id="msgsuc">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;Account Registered Successfully.</div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
						<?php
						}
					?>
											<div class="col_full">
												<label for="register-form-name"> Company Name:</label>
												<input type="name" id="txtcname" name="txtcname" value="" class="sm-form-control required" required=""/>
											</div>
											
											<div class="col_full">
												<label for="register-form-name"> Contact Person:</label>
												<input type="name" id="txtcp" name="txtcp" value="" class="sm-form-control required" required=""/>
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
												<label for="register-form-address"> Address:</label>
												<textarea id="txtadd" name="txtadd" rows="2" cols="15" class="sm-form-control required" required="" ></textarea>
											</div>
											
											<div class="col_full">
												<label for="register-form-city">City:</label>
												<select class="form-control" id="drpcity" name="drpcity" >
  													<?php
															$sql=@mysql_query("Select * From tblcity") or die(mysql_error());
															while($row=@mysql_fetch_array($sql))
															{
													?>
																<option value="<?php echo $row['cityid'];?>"><?php echo $row['cityname'];?></option>
													<?php
															}
													?>
												</select>
												
											</div>
											
											<div class="col_full">
												<label for="register-form-state">State:</label>
												<select class="form-control" id="drpstate" name="drpstate" >
												<?php
														$sql=@mysql_query("Select * From tblstate") or die(mysql_error());
														while($row=@mysql_fetch_array($sql))
														{
												?>
															<option value="<?php echo $row['stateid'];?>"><?php echo $row['statename'];?></option>
												<?php
														}
												?>
												</select>
											</div>
											
											<div class="col_full">
												<label for="register-form-contactno">Contact No:</label>
												<input type="number" id="txtcno" name="txtcno" value="" class="sm-form-control required" required="" />
											</div>
											
											<div class="col_full">
												<label for="register-form-company">Company Description:</label>
												<textarea id="txtdesc" name="txtdesc" rows="2" cols="15" class="sm-form-control required" required="" ></textarea>
											</div>

											<div class="col_full">
												<label for="register-form-website">Website:</label>
												<input type="url" id="txtsite" name="txtsite" value="" class="sm-form-control required" required=""/>
											</div>
											
											<div class="col_full">
												<label>Upload Logo:</label><br>
												<input id="input-8" name="logo" type="file" accept="image/*" class="file-loading"data-allowed-file-extensions='[]'/>

											</div>
											<div class="col_full">
												<label for="register-form-website">Facebook Link:</label>
												<input type="url" id="fb" name="fb" value="" class="sm-form-control"/>
											</div>
											<div class="col_full">
												<label for="register-form-website">Twitter Link:</label>
												<input type="url" id="twitter" name="twitter" value="" class="sm-form-control"/>
											</div>
											<div class="col_full">
												<label for="register-form-website">Linked Link:</label>
												<input type="url" id="ll" name="ll" value="" class="sm-form-control"/>
											</div>
											<div class="col_full">
												<label for="register-form-website">GooglePlus Link:</label>
												<input type="url" id="gplus" name="gplus" value="" class="sm-form-control"/>
											</div>
											
										    
										
								<br>
											<div class="col_full nobottommargin">
												<button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="submit">Register Now</button>
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
		 <script>
		$(document).ready(function() {
			$("#msgsuc").fadeOut(6000);
		});
	</script>

<?php
include_once("footer.php");
?>		

	

