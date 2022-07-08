<?php
include_once("header.php");

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
  </section>
  <!-- #page-title end -->
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
						
							$qr=@mysql_query("Select * from tblcandidate") or die(mysql_error()) ;
							while ($r=mysql_fetch_assoc($qr))
							{
								if ($r['candidateenrollno']==$_POST['txteno'] || $r['candidateemail']==$_POST['txtemail'])
								{
									echo "<script language='javascript' type='text/javascript'>location.href='Alreadyregistered.php'</script>";
									exit;
							    }
								
							}
							
								
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
								$extentions= array("jpeg","jpg","png","bmp","JPG","JPEG","PNG","BMP");
								if(in_array($ext,$extentions)=== false)
								{
									$insert="No";
								?>
									<div class="ErrorMessage">
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
						$var = $_POST['dob'];
						$var=date('Y-m-d', strtotime($var));
						$pass=base64_encode($_POST["txtpass"]);
							$query="insert into tblcandidate (departmentid,candidateenrollno,candidatename,candidategender,candidateadd,cityid,stateid,candidatemobile,candidatephone1,candidateemail,candidatepass,candidateimage,candidateregdate,candidatestatus,candidatedob,emailverified) values ($_POST[drpdepartment],$_POST[txteno],'$_POST[txtfname]','$_POST[gender]','$_POST[txtadd]',$_POST[drpcity],$_POST[drpstate],$_POST[txtmno],$_POST[txtphno],'$_POST[txtemail]','$pass','$fname',curdate(),'Pending','$var','N')";
	
							@mysql_query($query) or die(mysql_error());
							$res=mysql_query("Select Max(candidateid) As Mid From tblcandidate") or die(mysql_error());
							$row1=@mysql_fetch_assoc($res);
							$_SESSION["cid"]=$row1["Mid"];	
							
							echo "<script language='javascript' type='text/javascript'>location.href='candidate_registration2.php'</script>";
					
						}
					?>
                  <div class="col_full">
                    <label for="register-form-phone">Department:</label>
                    <select class="sm-form-control" id="drpdepartment" name="drpdepartment" >
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
                    <label for="register-form-enrolmentno">Enrollment No:</label>
                    <input type="text" maxlength="12" id="txteno" name="txteno" value="" class="sm-form-control required" required=""/>
                  </div>
                  <div class="col_full">
                    <label for="register-form-name">Full Name:</label>
                    <input type="name" id="txtfname" name="txtfname" value="" class="sm-form-control required" required=""/>
                  </div>
                  <div class="col_full">
                    <label for="register-form-name">Gender:</label>
                    &nbsp;&nbsp;
                    <input id="genderm" class="radio-style" name="gender" type="radio" value="Male" checked>
                    <label for="genderm" class="radio-style-3-label">Male</label>
                    <input id="genderf" class="radio-style" name="gender" type="radio" value="Female">
                    <label for="genderf" class="radio-style-3-label">Female</label>
                  </div>
                  <div class="col_full">
                    <div class="input-daterange travel-date-group bottommargin-sm">
                      <label for="">Date Of Birth</label>
                      <input type="text" value="" class="sm-form-control tleft format required" placeholder="DD-MM-YYYY" id="dob" name="dob">
                    </div>
                  </div>
                  <div class="col_full">
                    <label for="register-form-name"> Address:</label>
                    <textarea id="txtadd" name="txtadd" rows="2" cols="15" class="sm-form-control required" required="" ></textarea>
                  </div>
                  <div class="col_full">
                    <label for="register-form-phone">City:</label>
                    <select class="sm-form-control required" id="drpcity" name="drpcity" >
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
                    <label for="register-form-phone">State:</label>
                    <select class="sm-form-control required" id="drpstate" name="drpstate" >
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
                    <label for="register-form-username">Mobile No:</label>
                    <input type="tel" maxlength="10" id="txtmno" name="txtmno" value="" class="sm-form-control required number" required="" />
                  </div>
                  <div class="col_full">
                    <label for="register-form-username">Phone No:</label>
                    <input type="tel" maxlength="10" id="txtphno" name="txtphno" value="" class="sm-form-control required number" required="" placeholder="7896541230" />
                  </div>
                  <div class="col_full">
                    <label for="register-form-email">Email Id:</label>
                    <input type="email" id="txtemail" name="txtemail" value="" class="sm-form-control required email" required=""/>
                  </div>
                  <div class="col_full">
                    <label for="register-form-password">Password:</label>
                    <input type="password" id="txtpass" name="txtpass" value="" class="sm-form-control required password" required=""/>
                  </div>
                  <div class="col_full">
                    <label for="register-form-repassword">Re-enter Password:</label>
                    <input type="password" id="txtrepass" name="txtrepass" value="" class="sm-form-control required password" required=""/>
                  </div>
                  <div class="col_full">
                    <label>Upload Photo:</label>
                    <br>
                    <input id="input-8" name="photo" type="file" accept="image/*" class="file-loading"data-allowed-file-extensions='[]'>
                  </div>
                  <br>
                  <div class="col_full">
                    <!--<button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="submit">Next</button>-->
                    <input class="button" type="submit" value="Next" id="submit" name="submit"/>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- #content end -->
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
