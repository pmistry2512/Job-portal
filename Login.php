<?php session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content="SemiColonWeb" />
<!-- Stylesheets
	============================================= -->
<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/dark.css" type="text/css" />
<link rel="stylesheet" href="css/font-icons.css" type="text/css" />
<link rel="stylesheet" href="css/animate.css" type="text/css" />
<link rel="stylesheet" href="css/magnific-popup.css" type="text/css" />
<link rel="stylesheet" href="css/responsive.css" type="text/css" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Document Title
	============================================= -->
<title>Job Portal | SSA Navsari</title>
</head>
<body class="stretched">
<!-- Document Wrapper
	============================================= -->
<div id="wrapper" class="clearfix">
  <!-- Content
		============================================= -->
  <section id="content">
    <div class="content-wrap nopadding">
      <div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>
      <div class="section nobg full-screen nopadding nomargin">
        <div class="container vertical-middle divcenter clearfix">
          <div class="row center"> <a href="index.html"><img src="images/logo-dark.png" alt="Canvas Logo"></a> </div>
          <div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
            <div class="panel-body" style="padding: 40px;">
			
			
			
              <form id="loginsingle" name="loginsingle" class="nobottommargin" method="post">
			  
			 
			  <input type="hidden" id="functionname" name="functionname" value="CheckLoginSingle">
			 
                <h3>Login to your Account</h3>
                <br>
                <div class="style-msg successmsg" id="msgsucc" style="display:none;">
                  <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> Login Successful!!! Redirecting... Please Wait...</div>
                  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                </div>
				
				<!--<div class="style-msg errormsg" id="msgerrinvalid" style="display:none;">
                  <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>Invalid email id or passowrd</div>
                </div>-->
				
                <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
				
                <div class="col_full">
                  <label for="login-form-username">Username:</label>
                  <input type="email" id="email" name="email" value="" required="" class="form-control not-dark" />
                </div>
                <div class="col_full">
                  <label for="login-form-password">Password:</label>
                  <input type="password" id="pass" name="pass" value="" required="" class="form-control not-dark" />
                </div>
				
				<div class="col_full">
					<div class="g-recaptcha" data-sitekey="6LdRXxoUAAAAAC1q6hlHsDhPxaX55irV9TcHnFkf"></div>
				</div>	
								
                <div class="col_full nobottommargin">
                  <button class="button button-3d button-black nomargin" id="btsubmit" name="btsubmit" type="submit">Login</button>
				  
                  <a href="#myModal1" data-lightbox="inline" class="fright">Forgot Password?</a> </div>
				  <!--<a href="modal-onload-subscribe.html" class="button button-mini button-rounded button-dark">Subscription Form</a>-->
				 <br>
				  
			</form>
			
					
              <div class="line line-sm"></div>
              <div class="center">
                <h4 style="margin-bottom: 15px;">or Signup Here:</h4>
                <a href="#" class="button button-rounded si-facebook si-colored">Candidate</a>
				<span class="hidden-xs">or</span>
				<a href="#" class="button button-rounded si-twitter si-colored">Recrutier</a>
				
            </div>
          </div>
          <div class="row center dark"><small>Copyrights &copy; All Rights Reserved by Canvas Inc.</small></div>
        </div>
      </div>
    </div>
  </section>
   <!-- #content end -->
</div>
<!-- #wrapper end -->
<!-- Modal -->
					<div class="modal1 mfp-hide subscribe-widget" id="myModal1">
						<div class="block dark divcenter" style="background: #333333 no-repeat; background-size: cover; max-width: 700px;" data-height-lg="400">
							<div style="padding: 50px;">
								<div class="heading-block nobottomborder bottommargin-sm" style="max-width:500px;">
									<h3>Forgot Password ? </h3>
									<!--<span>Get Latest Fashion Updates &amp; Offers</span>-->
								</div>
										
								<div class="widget-subscribe-form-result"></div>
								<form class="widget-subscribe-form2" method="post" style="max-width: 350px;" name="forgetpassfrm" id="forgetpassfrm">
								<input type="hidden" id="functionname" name="functionname" value="forgetpass">
								<div class="style-msg successmsg" id="mgsuc" style="display:none;">
								<div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>Password Sent to Your EmailId</div>
						  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
								</div>
								<div class="style-msg errormsg" id="mgerr" style="display:none;">
								  <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong> Invalid Username</div>
								</div>
								<div class="heading-block nobottomborder bottommargin-sm" style="max-width:500px;">
		
											<span>Enter Your Email Address</span>
										</div>
								
									<input type="email" id="email" name="email" class="form-control input-lg not-dark required email" placeholder="Enter your Email" required="">
									<br>
									<button class="button button-rounded button-border button-light noleftmargin" type="submit" style="margin-top:15px;" id="btsubmit" name="btsubmit">Get Password</button>
									
								</form>
								
								<!--<p class="nobottommargin"><small><em>*We hate Spam &amp; Junk Emails.</em></small></p>-->
							</div>
						</div>
						
					</div>
					<!-- end of modal -->
<!-- Go To Top
	============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>
<!-- External JavaScripts
	============================================= -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="customjs/js_user.js"></script>
<script type="text/javascript">
		$(document).ready(function(){
			if(window.location.href.indexOf('?')>0)
			{
				$('#msgerrtext').html('<?php echo $_SESSION['errormsg'];?>');
				$('#msgerr').show();
				$("#msgerr").fadeOut(10000);
			}
			
		});
</script>
<!-- Footer Scripts
	============================================= -->
<script type="text/javascript" src="js/functions.js"></script>
</body>
</html>
