<?php
include_once("header.php");
include("ValidCompany.php");
?>


<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Add Job</h1>
				
			</div>

		</section><!-- #page-title end -->

		<!-- Content
		============================================= -->
		 <?php
					if(isset($_REQUEST["id"]))
					{
						$res=@mysql_query("Select * From tbljob where jobid=$_REQUEST[id]") or die(mysql_errno());
						$row=@mysql_fetch_assoc($res);
					}
		?>
		
		 <?php
		 
						if(isset($_POST['submit']))
						{
							if(isset($_REQUEST['id']))
							{
							$sal=explode("-",$_POST['salary']);
							
							
								@mysql_query("update tbljob set jobname='$_POST[txtjname]',jobdescription='$_POST[txtdesc]',designation='$_POST[drpdsg]',jobreqskill='$_POST[txtreqskill]',jobqualification='$_POST[txtqua]',jobminexp=$_POST[txtminexp],jobmaxexp=$_POST[txtmaxexp],jobminsalary=$sal[0],jobmaxsalary=$sal[1],jobpostdate=curdate(),joblocation='$_POST[drplocation]',jobtype='$_POST[drpjobtype]',industryid=$_POST[drpindustry],departmentid=$_POST[drpdepartment] where jobid=$_REQUEST[id]");?>
								<div class="style-msg successmsg" id="msgsuc">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;Job Updated Sucessfully.</div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
		  <?php
							}
							else
							{
							
								$sal=explode("-",$_POST['salary']);
								$query="insert into tbljob (jobname,jobdescription,designation,jobreqskill,jobqualification,jobminexp,jobmaxexp,jobminsalary,jobmaxsalary,jobpostdate,joblocation,jobtype,jobstatus,delstatus,companyid,departmentid,industryid) values('$_POST[txtjname]','$_POST[txtdesc]','$_POST[drpdsg]','$_POST[txtreqskill]','$_POST[txtqua]',$_POST[txtminexp],$_POST[txtmaxexp],$sal[0],$sal[1],curdate(),'$_POST[drplocation]','$_POST[drpjobtype]','Active','N',$_SESSION[LoggedUserId],$_POST[drpdepartment],$_POST[drpindustry])";
								
						
							@mysql_query($query) or die(mysql_error());?>
							<div class="style-msg successmsg" id="msgsuc">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;Job Added Sucessfully.</div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
		  <?php
							}
							//echo "<script language='javascript' type='text/javascript'>location.href='managejob.php'	
						}
				?>
	   
		
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">

							<div class="tab-content clearfix" id="tab-register">
								<div class="panel panel-default nobottommargin">
									<div class="well well-lg nobottommargin" style="padding: 40px;">
										<h3>Add Job</h3>

										<form id="addjob" name="addjob" class="nobottommargin" method="post" enctype="multipart/form-data">
										<input type="hidden" id="functionname" name="functionname" value="addjob">
										
										<div class="col_full">
												<label for="register-form-jobname">Job Name:</label>
												<input type="text" id="txtjname" name="txtjname" value="<?php if(isset($row)){ echo $row['jobname'];} ?>" class="sm-form-control required" required=""/>
											</div>

											<div class="col_full">
												<label for="register-form-phone">For which department this job is:</label>
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
												<label for="register-form-phone">Industry:</label>
												<select class="sm-form-control" id="drpindustry" name="drpindustry" >
  													<?php
														$sql=@mysql_query("Select * From tblindustry where delstatus='N'") or die(mysql_error());
														while($r=@mysql_fetch_array($sql))
														{
													?>
																<option value="<?php echo $r['industryid'];?>"<?php if(isset($row)) { if($r['industryid']==$row['industryid']){echo "selected";}}?>><?php echo $r['industryname'];?></option>
													<?php
															}
													?>
												</select>
												
											</div>
											
											<div class="col_full">
												<label for="register-form-name"> Description:</label>
												<textarea id="txtdesc" name="txtdesc" rows="2" cols="15" class="sm-form-control required" required=""><?php if(isset($row)){ echo $row['jobdescription'];} ?></textarea>
											</div>
											
											<div class="col_full">
												<label for="register-form-jobname">Location :-</label>
												<input type="text" maxlength="12" id="drplocation" name="drplocation" value="<?php if(isset($row)){ echo $row['joblocation'];} ?>" class="sm-form-control required" required=""/>
											</div>
											
											<div class="col_full">
												<label for="register-form-jobname">Job Type:</label>
												<select class="sm-form-control" id="drpjobtype" name="drpjobtype" >
												
												<?php if(isset($row)) 
												{ ?>
													<option value="<?php echo $row['jobtype'];?>"<?php echo "selected";?>><?php echo $row['jobtype'];?></option>
												<?php } ?>
  													<option value="FullTime">Full-Time</option>
													<option value="PartTime">Part-Time</option>
													<option value="Internship">Internship</option>
												</select>
											</div>
											
											<div class="col_full">
												<label for="register-form-jobname">Designation:</label>
												<select class="sm-form-control" id="drpdsg" name="drpdsg" >
  													<?php
														$sql=@mysql_query("Select * From tbldesignation where delstatus='N'") or die(mysql_error());
														while($r=@mysql_fetch_array($sql))
														{
													?>
																<option value="<?php echo $r['designationid'];?>"<?php if(isset($row)) { if($r['designationid']==$row['designation']){echo "selected";}}?>><?php echo $r['designationname'];?></option>
													<?php
															}
													?>
												</select>
											</div>
											
											<div class="col_full">
												<label for="register-form-name">Required Skill:</label>
												<input type="name" id="txtreqskill" name="txtreqskill" value="<?php if(isset($row)){ echo $row['jobreqskill'];} ?>" class="sm-form-control required" required="" placeholder=" Enter Skill Seperated by comma  , e.g. PHP, Social Media, Management" />
											</div>
											
											<div class="col_full">
												<label for="register-form-name">Qualification Required</label>
												<input type="name" id="txtqua" name="txtqua" value="<?php if(isset($row)){ echo $row['jobqualification'];} ?>" class="sm-form-control required" required=""  />
											</div>
											
											<div class="col_full">
												<label for="register-form-name">Minimum Experience</label>
												<input type="number" maxlength="3" id="txtminexp" name="txtminexp" value="<?php if(isset($row)){ echo $row['jobminexp'];} ?>" class="sm-form-control required" required=""  />
											</div>
											
											<div class="col_full">
												<label for="register-form-name">Maximum Experience</label>
												<input type="number" maxlength="3" id="txtmaxexp" name="txtmaxexp" value="<?php if(isset($row)){ echo $row['jobmaxexp'];} ?>" class="sm-form-control required" required=""  />
											</div>
											
											<div class="col_full" style="margin-bottom:10px;"><label for="register-form-name">Salary Per Month:</label> </div>
											<select id="salary" name="salary" class="sm-form-control">
											
												<option value="0-5000">0 - 5000</option>
												<option value="5000-15000">5000 - 15000</option>
												<option value="15000-30000">15000 - 30000</option>
												<option value="30000-50000">30000 - 50000</option>
												<option value="50000-100000">> 50000</option>
											</select>
											
												
												<br>
							 <div class="style-msg successmsg" id="msgsucc" style="display:none;">
							  <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> Job Added Sucessfully..</div>
							  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
							</div>
							<div class="style-msg errormsg" id="msgerr" style="display:none;">
							  <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong> This Enrollment Number or email id is already registered</div>
							</div>
										
											<div class="col_full nobottommargin">
												<button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="submit">Submit</button>
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
		
</script>
		 <script>
		$(document).ready(function() {
			$("#msgsuc").fadeOut(6000);
		});
	</script>
		
		


<?php
include_once("footer.php");
?>