<?php
include_once("header.php");
include("ValidCandidate.php");
?>

	<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Candidate Registration</h1>
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li><a href="#">Pages</a></li>
					<li class="active">Login</li>
				</ol>
			</div>

		</section><!-- #page-title end -->
		<?php
							$res=@mysql_query("select tblcandidate.*,tblcity.*,tblstate.*,tbldepartment.* from tblcandidate,tblcity,tblstate,tbldepartment where tblcandidate.cityid=tblcity.cityid And tblcandidate.stateid=tblstate.stateid And tblcandidate.departmentid=tbldepartment.departmentid And tblcandidate.candidateid=$_SESSION[LoggedUserId]") or die(mysql_error());
							$row=@mysql_fetch_assoc($res);
							
$res1=@mysql_query("select * from tblcandidategraduation,tblgraduationspecialization,tblcandidate,tbluniversity,tblgraduation where tblcandidategraduation.graduationid=tblgraduation.graduationid And tblcandidategraduation.gradspecid=tblgraduationspecialization.gradspecid And tblcandidategraduation.candidateid=tblcandidate.candidateid And tblcandidategraduation.universityid=tbluniversity.universityid And tblcandidategraduation.candidateid=$_SESSION[LoggedUserId]") or die(mysql_error());
							$row1=@mysql_fetch_assoc($res1);
				
$res2=@mysql_query("select * from tblcandidatepostgrad,tblpostgradspecialization,tblcandidate,tbluniversity,tblpostgraduation where tblcandidatepostgrad.postgraduationid=tblpostgraduation.postgraduationid And tblcandidatepostgrad.postspecid=tblpostgradspecialization.postspecid And tblcandidatepostgrad.candidateid=tblcandidate.candidateid And tblcandidatepostgrad.universityid=tbluniversity.universityid And tblcandidatepostgrad.candidateid=$_SESSION[LoggedUserId]") or die(mysql_error());
							$row2=@mysql_fetch_assoc($res2);	?>		

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

				<form id="candidateedit" name="candidateedit" class="nobottommargin" method="post" enctype="multipart/form-data">
							<!--<input type="hidden" id="functionname" name="functionname" value="candidateregistration">-->
									
										
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
									move_uploaded_file($file_array['tmp_name'],"uploadedphotos/$fname");
								}
							}
						$var = $_POST['dob'];
						$var=date('Y-m-d', strtotime($var));
							$query="Update tblcandidate set departmentid=$_POST[drpdepartment],candidatename='$_POST[txtfname]',candidategender='$_POST[gender]',candidateadd='$_POST[txtadd]',cityid=$_POST[drpcity],stateid=$_POST[drpstate],candidatemobile=$_POST[txtmno],candidatephone1=$_POST[txtphno],candidateemail='$_POST[txtemail]',candidateimage='$fname',candidatedob='$var',candidateskills='$_POST[txtskill]',candidatelanguages='$_POST[txtlanguage]',candidatepersonaldescription='$_POST[txtdec]',facebook='$_POST[fb]',twitter='$_POST[twitter]',googleplus='$_POST[gplus]' where candidateid=$_SESSION[LoggedUserId]";
							
							@mysql_query($query) or die(mysql_error());
							
							
							echo "<script language='javascript' type='text/javascript'>location.href='candidate_profile.php'</script>";
								
								
						}
					
						
					?>
									

											<div class="col_full">
												<label for="register-form-phone">Department:</label>
												<select class="sm-form-control" id="drpdepartment" name="drpdepartment" >
  													<?php
														$sql=@mysql_query("Select * From tbldepartment where delstatus='N'") or die(mysql_error());
														while($r=@mysql_fetch_array($sql))
														{
													?>
																<option value="<?php echo $r['departmentid'];?>"<?php if(isset($row)) { if($r['departmentid']==$row['departmentid']){echo "selected";}}?>><?php echo $r['departmentname'];?></option>
													<?php
															}
													?>
												</select>
												
											</div>
											
												
											
											
											<div class="col_full">
												<label for="register-form-name">Full Name:</label>
												<input type="name" id="txtfname" name="txtfname" value="<?php echo $row['candidatename'];?>" class="sm-form-control required" required=""/>
											</div>
											
											<div class="col_full">
											<label for="register-form-name">Gender:</label> &nbsp;&nbsp;
												
												 	
													<input id="genderm" class="radio-style" name="gender" type="radio" value="Male" <?php if($row['candidategender']=='Male'){echo "checked";}?>>
													<label for="genderm" class="radio-style-3-label">Male</label>
												
													<input id="genderf" class="radio-style" name="gender" type="radio" value="Female" <?php if($row['candidategender']=='Female'){echo "checked";}?>>
													<label for="genderf" class="radio-style-3-label">Female</label>
												
											</div>
											
											
											<div class="col_full">
												<div class="input-daterange travel-date-group bottommargin-sm">
													<label for="">Date Of Birth</label>
													
														<input type="text" value="<?php echo $row['candidatedob'];?>" class="sm-form-control tleft format required" placeholder="DD-MM-YYYY" id="dob" name="dob">
												</div>
											</div>
											
											<div class="col_full">
												<label for="register-form-name"> Address:</label>
												<textarea id="txtadd" name="txtadd" rows="2" cols="15" class="sm-form-control required" required="" ><?php echo $row['candidateadd'];?></textarea>
											</div>
											
											<div class="col_full">
												<label for="register-form-phone">City:</label>
												<select class="sm-form-control required" id="drpcity" name="drpcity" >
  													<?php
															$sql=@mysql_query("Select * From tblcity") or die(mysql_error());
															while($r=@mysql_fetch_array($sql))
															{
													?>
																<option value="<?php echo $r['cityid'];?>"<?php if(isset($row)) { if($r['cityid']==$row['cityid']){echo "selected";}}?>><?php echo $r['cityname'];?></option>
													<?php
															}
													?>
												</select>
												
											</div>
											
											<div class="col_full">
												<label for="register-form-phone">State:</label>
												<select class="sm-form-control required" id="drpstate" name="drpstate" >
												<?php
														$sql=@mysql_query("Select * From tblstate") or die(mysql_error());
														while($r=@mysql_fetch_array($sql))
														{
												?>
															<option value="<?php echo $r['stateid'];?>"<?php if(isset($row)) { if($r['stateid']==$row['stateid']){echo "selected";}}?>><?php echo $r['statename'];?></option>
												<?php
														}
												?>
												</select>
											</div>
											
											<div class="col_full">
												<label for="register-form-username">Mobile No:</label>
												<input type="tel" maxlength="10" id="txtmno" name="txtmno" value="<?php echo $row['candidatemobile'];?>" class="sm-form-control required number" required="" />
											</div>
											
											<div class="col_full">
												<label for="register-form-username">Phone No:</label>
												<input type="tel" maxlength="10" id="txtphno" name="txtphno" value="<?php echo $row['candidatephone1'];?>" class="sm-form-control required number" required="" placeholder="7896541230" />
											</div>

											<div class="col_full">
												<label for="register-form-email">Email Id:</label>
												<input type="email" id="txtemail" name="txtemail" value="<?php echo $row['candidateemail'];?>" class="sm-form-control required email" required=""/>
											</div>
											
											
											
											<div class="col_full">
											<label>Upload Photo:</label><br>
											<input id="input-8" name="photo" type="file" accept="image/*" class="file-loading"data-allowed-file-extensions='[]' title="<?php echo $row['candidateimage'];?>">
			
										</div>	
										<div class="col_full">
												<label for="register-form-name"> Skills:</label>
												<textarea id="txtskill" name="txtskill" rows="2" cols="15" class="sm-form-control required" required="" ><?php echo $row['candidateskills'];?></textarea>
											</div>
											
											<div class="col_full">
												<label for="register-form-name"> Language Known:</label>
												<textarea id="txtlanguage" name="txtlanguage" rows="2" cols="15" class="sm-form-control required" required="" ><?php echo $row['candidatelanguages'];?></textarea>
											</div>
											
											<div class="col_full">
												<label for="register-form-name">Personal Description:</label>
												<textarea id="txtdec" name="txtdec" rows="2" cols="15" class="sm-form-control required" required="" ><?php echo $row['candidatepersonaldescription'];?></textarea>
											</div>
											
											<br>
											
											<div class="col_full">
												
													<label for="">FaceBook Link</label>
													
														<input type="text" value="<?php echo $row['facebook'];?>" class="sm-form-control tleft format required" id="fb" name="fb">
												
											</div>
											
											<div class="col_full">
												
													<label for="">GooglePlus Link</label>
													
														<input type="text" value="<?php echo $row['googleplus'];?>" class="sm-form-control tleft format required" id="gplus" name="gplus">
												
											</div>
											
											<div class="col_full">
												
													<label for="">Twitter Link</label>
													
														<input type="text" value="<?php echo $row['twitter'];?>" class="sm-form-control tleft format required" id="twitter" name="twitter">
												
											</div>				
											
												
										
											<div class="col_full nobottommargin">
												<input class="button button-3d button-black nomargin" id="submit" name="submit" value="Submit" type="submit">
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