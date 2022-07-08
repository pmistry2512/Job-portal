<?php
//echo $_SERVER['PHP_SELF'];
include_once("header.php");

?>

<section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
			<div class="slider-parallax-inner">

				<div class="swiper-container swiper-parent">
					<div class="swiper-wrapper">
						<div class="swiper-slide dark" style="background-image: url('images/slider/swiper/img2.jpg');">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
									<h2 data-caption-animate="fadeInUp">Welcome to    S.S. Agrawal Institute Of Computer Science.</h2>
									<!--<p data-caption-animate="fadeInUp" data-caption-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on your own Canvas.</p>-->
								</div>
							</div>
						</div>
						<div class="swiper-slide dark" style="background-image: url('images/slider/swiper/img1.jpg');">
							<div class="container clearfix">
								<div class="slider-caption slider-caption-center">
									<h2 data-caption-animate="fadeInUp">Welcome to SSA Job Portal</h2>
									<!--<p data-caption-animate="fadeInUp" data-caption-delay="200">Create just what you need for your Perfect Website. Choose from a wide range of Elements &amp; simply put them on your own Canvas.</p>-->
								</div>
							</div>
						</div>
						
						<div class="swiper-slide" style="background-image: url('images/slider/swiper/img3.jpg'); background-position: center top;">
							<div class="container clearfix">
								<div class="slider-caption">
									<h2 data-caption-animate="fadeInUp">Great Opportunities</h2>
									<!--<p data-caption-animate="fadeInUp" data-caption-delay="200">You'll be surprised to see the Final Results of your Creation &amp; would crave for more.</p>-->
								</div>
							</div>
						</div>
					</div>
					<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
					<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
				</div>

				<!--<a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>-->

			</div>
			
		</section>
		<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<div class="col_full">
					
					
						
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
				$res=@mysql_query("Select count(*) As cntcompany From tblcompany where status='Active'") or die(mysql_error());
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

				
			</div>

		</section>
		



<?php
include_once("footer.php");
?>