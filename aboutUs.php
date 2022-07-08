<?php
include_once("header.php");
?>

<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_full">
					
					<div class="heading-block center">
					
						<h2>The Visionary</h2>
						<span>Late Shri Shivcharanlalji Agrawal</span>
					</div>
					<center><p>  The Agrawal Education Foundation draws inspiration from the fatherly figure Late Shri Shivcharan Lal Ji Agrawal, 
	                who came from a middle class Rajasthani family. In 1973, with firm determination to succeed, 
	             he made a stepping stone into the business domain initially with traditional industries in Navsari.
                         It was his much cherished dream and vision to establish educational institutes offering 
                                      higher education programmes to the students at their door step.

      Shri S. S. Agrawal believed in sharing knowledge for the betterment of the society and the same legacy has been sensibly 
maintained by their family. The outcome of continued efforts has been the growth of S S Agrawal Group of Colleges at Navsari.</p></center>

						

						
						</div>

					</div>
					<?php
				$res=@mysql_query("Select count(*) As cntjob From tbljob where jobstatus='Active'") or die(mysql_error());
				$cntjob=@mysql_fetch_assoc($res); 
								
			 ?>
					<div class="col_one_fourth center" data-animate="bounceIn">
						<i class="i-plain i-xlarge divcenter nobottommargin icon-suitcase"></i>
						<div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="<?php echo $cntjob['cntjob']; ?>" data-refresh-interval="50" data-speed="2000"></span></div>
						<h5>Jobs Posted</h5>
					</div>
<?php
				$res=@mysql_query("Select count(*) As cntcompany From tblcompany") or die(mysql_error());
				$cntcompany=@mysql_fetch_assoc($res); 
								
			 ?>
					<div class="col_one_fourth center" data-animate="bounceIn" data-delay="200">
						<i class="i-plain i-xlarge divcenter nobottommargin icon-laptop"></i>
						<div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="<?php echo 						$cntcompany['cntcompany']; ?>" data-refresh-interval="50" data-speed="2500"></span></div>
						<h5>Company Registered</h5>
					</div>

<?php
				$res=@mysql_query("Select count(*) As cntcompany From tbljobapply") or die(mysql_error());
				$cntcompany=@mysql_fetch_assoc($res); 
								
			 ?>
					<div class="col_one_fourth center" data-animate="bounceIn" data-delay="400">
						<i class="i-plain i-xlarge divcenter nobottommargin icon-briefcase"></i>
						<div class="counter counter-large" style="color: #16a085;"><span data-from="0" data-to="<?php echo $cntcompany['cntcompany']; ?>" data-refresh-interval="50" data-speed="3500"></span></div>
						<h5>Job Applications</h5>
					</div>
<?php
				$res=@mysql_query("Select count(*) As cntcompany From tbljobapply where applicationstatus='Hired'") or die(mysql_error());
				$cntcompany=@mysql_fetch_assoc($res); 
								
			 ?>
					<div class="col_one_fourth center col_last" data-animate="bounceIn" data-delay="600">
						<i class="i-plain i-xlarge divcenter nobottommargin icon-users"></i>
						<div class="counter counter-large" style="color: #9b59b6;"><span data-from="0" data-to="<?php echo $cntcompany['cntcompany']; ?>" data-refresh-interval="30" data-speed="2700"></span></div>
						<h5>Students Hired</h5>
					</div>

					<div class="clear"></div>

					

					

					

				</div>

				<div class="section topmargin-sm footer-stick">

					<h4 class="uppercase center">What <span>Students</span> Say?</h4>

					<div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
						<div class="flexslider">
							<div class="slider-wrap">
								<div class="slide">
									
									<div class="testi-content">
										<p>S. S. Agrawal Group of Colleges is highly reputed, philanthropic education trust, serving as the “Educational Oasis” in and around South Gujarat Region since long. </p>
										
									</div>
								</div>
								<div class="slide">
									
									<div class="testi-content">
										<p>The trust is spear-headed by the trustees who are known for their high energy level, vision and devotion to the cause of furthering educational opportunities for students of the new age.</p>
										
									</div>
								</div>
								<div class="slide">
									
									<div class="testi-content">
										<p> Within a short span of time, it has emerged as a High-Tech educational hub, where students of diverse streams strive to mould their careers. </p>
										
									</div>
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