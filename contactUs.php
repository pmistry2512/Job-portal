<?php
include_once("header.php");

?>

<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Contact Form
					============================================= -->
					<div class="col_half">

						<div class="fancy-title title-dotted-border">
							<h3>Send us an Email</h3>
						</div>

						<div class="contact-widget">

							<div class="contact-form-result"></div>
							<?php 
							if(isset($_POST['submit']))
						{
								$mail=new Mail();
								$result=$mail->SendMail("poojamistrybca@gmail.com",$_POST['subject'],$_POST['message']);
						}
						?>

							<form class="nobottommargin" id="template-contactform" name="template-contactform" action="include/sendemail.php" method="post">
							
							

								<div class="form-process"></div>

								<div class="col_one_third">
									<label for="template-contactform-name">Name <small>*</small></label>
									<input type="text" id="template-contactform-name" name="template-contactform-name" value="" class="sm-form-control required" />
								</div>

								<div class="col_one_third">
									<label for="template-contactform-email">Email <small>*</small></label>
									<input type="email" id="template-contactform-email" name="template-contactform-email" value="" class="required email sm-form-control" />
								</div>

								<div class="col_one_third col_last">
									<label for="template-contactform-phone">Phone</label>
									<input type="text" id="template-contactform-phone" name="template-contactform-phone" value="" class="sm-form-control" />
								</div>

								<div class="clear"></div>

								<div class="col_three_third">
									<label for="template-contactform-subject">Subject <small>*</small></label>
									<input type="text" id="subject" name="subject" value="" class="required sm-form-control" />
								</div>

								<div class="clear"></div>
								
								<div class="col_full">
									<label for="template-contactform-message">Message<small>*</small></label>
	<textarea class="required sm-form-control" id="template-contactform-message" id="message" name="message" rows="6" cols="30"></textarea>
								</div>

								<div class="col_full hidden">
									<input type="text" id="template-contactform-botcheck" name="template-contactform-botcheck" value="" class="sm-form-control" />
								</div>
								<div class="col_full">
									<button name="submit" type="submit" id="submit" tabindex="5" value="Submit" class="button button-3d nomargin">Submit Comment</button>
								</div>

							</form>
						</div>

					</div><!-- Contact Form End -->

					<!-- Google Map
					============================================= -->
					<div class="col_half col_last">

						 <script src='https://maps.googleapis.com/maps/api/js?v=3.exp&key= AIzaSyCfHzqpmihmPacwdeGwoSTGdAc0PVtG68w '></script><div style='overflow:hidden;height:450px;width:520px;'><div id='gmap_canvas' style='height:450px;width:520px;'></div><style>#gmap_canvas img{max-width:none!important;background:none!important}</style></div> <a href='https://indiatvnow.com/'><3 IndiaTV</a> <script type='text/javascript' src='https://embedmaps.com/google-maps-authorization/script.js?id=b9431881208946faba2eeee56add98be79c3e509'></script><script type='text/javascript'>function init_map(){var myOptions = {zoom:16,center:new google.maps.LatLng(20.941214,72.95101),mapTypeId: google.maps.MapTypeId.ROADMAP};map = new google.maps.Map(document.getElementById('gmap_canvas'), myOptions);marker = new google.maps.Marker({map: map,position: new google.maps.LatLng(20.941214,72.95101)});infowindow = new google.maps.InfoWindow({content:'<strong>S. S. Agrwal College, Navsari</strong><br>S.S. Agrawal College Campus, Devina Park Society, Gandevi Road, Navsari, Gujarat<br>396445 Navsari<br>'});google.maps.event.addListener(marker, 'click', function(){infowindow.open(map,marker);});infowindow.open(map,marker);}google.maps.event.addDomListener(window, 'load', init_map);</script>


					</div><!-- Google Map End -->

					<div class="clear"></div>

					<!-- Contact Info
					============================================= -->
					<div class="row clear-bottommargin">

						<div class="col-md-3 col-sm-6 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-map-marker2"></i></a>
								</div>
								<h3>S.S. Agrawal College<span class="subtitle">Viranjali Marg,Navsari</span></h3>
							</div>
						</div>

						<div class="col-md-3 col-sm-6 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-phone3"></i></a>
								</div>
								<h3>Speak to Us<span class="subtitle">(02637) 232667 <br>(02637) 232857</span></h3>
							</div>
						</div>

						<div class="col-md-3 col-sm-6 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-envelope"></i></a>
								</div>
								<h3>Contact Us<span class="subtitle"><br>contact@aics.edu.in</span></h3>
							</div>
						</div>

						<div class="col-md-3 col-sm-6 bottommargin clearfix">
							<div class="feature-box fbox-center fbox-bg fbox-plain">
								<div class="fbox-icon">
									<a href="#"><i class="icon-facebook"></i></a>
								</div>
								<h3>Follow us<span class="subtitle">agrawaleducation<br>foundation</span></h3>
							</div>
						</div>

					</div><!-- Contact Info End -->

				</div>

			</div>

		</section><!-- #content end -->
<?php
include_once("footer.php");

?>