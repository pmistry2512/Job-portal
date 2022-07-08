 <?php
include_once("header.php");
include("ValidCompany.php");

$sql=@mysql_query("Select tblcompany.*,tblcity.cityname,tblstate.statename from tblcompany,tblcity,tblstate where tblcompany.companyemail='$_SESSION[LoggedUser]' And tblcity.cityid=tblcompany.companycity And tblstate.stateid=tblcompany.companystate") or die(mysql_error());
		$row=@mysql_fetch_assoc($sql);
?>

<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="row clearfix">

						<div class="col-sm-12">

							<img src="uploadedphotos/<?php echo $row['companylogo']; ?>" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 120px;">

							<div class="tabs tabs-alt clearfix col-md-9" id="tabs-profile">
											<div class="entry-image">
													<a class="entry-link" href="<?php echo $row['companywebsite']; ?>" target="_blank">
													<?php echo $row['companyname']; ?>
													<span><?php echo $row['companywebsite']; ?></span>
													</a>
											</div>
							

							

							<div class="row clearfix ">

								<div class="col-md-12">

								
									</div>

								</div>

							</div>
							<div class="divider divider-center">
								<i class="icon-cloud"></i>
							</div>
							<blockquote>
							<h5><p><?php echo $row['companydescription']; ?></p></h5>
							</blockquote>
							
							<div class="fancy-title title-dotted-border">
												<h4>
													<span>Contact Us</span>
												</h4>
												</div>
							<div>
							<h4><i class="icon-map-marker"></i>&nbsp;<?php echo $row['companyaddress']; ?>&nbsp;<?php echo $row['cityname']; ?>&nbsp;<?php echo $row['statename']; ?><br>
							
							
							
								<i class="icon-phone"></i>&nbsp;<?php echo $row['companycontactno']; ?><br>
							<i class="icon-user"></i>&nbsp;<?php echo $row['companycontactperson']; ?>
							
							</h4>
							</div>
						</div>

						

						

						

							<div class="fancy-title topmargin title-border">
								<h4>Social Profiles</h4>
							</div>

							<a href="<?php echo $row['facebook'];?>" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="<?php echo $row['googleplus'];?>" class="social-icon si-gplus si-small si-rounded si-light" title="Google+">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="<?php echo $row['linkedin'];?>" class="social-icon si-linkedin si-small si-rounded si-light" title="LinkedIn">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>

							<a href="<?php echo $row['twitter'];?>" class="social-icon si-twitter si-small si-rounded si-light" title="Twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

						</div>

					</div>

				</div>

			</div>

		</section><!-- #content end -->





<script type="text/javascript" src="js/jquery.js"></script> 
 <?php
include_once("footer.php");
?>