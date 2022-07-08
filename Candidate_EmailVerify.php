<?php include("header.php");
include("ValidCandidate.php"); ?>
  <!-- Page Title
		============================================= -->
  <section id="page-title">
    <div class="container clearfix">
      <h1>Email Verification</h1>
    </div>
  </section>
  <!-- #page-title end -->
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" style="max-width: 500px;">
          <div class="tab-content clearfix" id="tab-register">
            <div class="panel panel-default nobottommargin">
			
              <div class="well well-lg nobottommargin" style="padding: 40px;">
               <div><center><b>We have sent you a verification Code to Registered Email Address</b></center></div><br>
                <form id="verification" name="verification" class="nobottommargin" method="post">
                  <input type="hidden" id="callfunction" name="callfunction" value="Verify">
				  
                  <div class="col_full">
                    <label for="register-form-jobname">Enter Verification Code:</label>
                    <input type="text" maxlength="12" id="txtcode" name="txtcode" class="sm-form-control required" required=""/>
                  </div>
				  
                 <div class="style-msg successmsg" id="msgsuc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
				  
                  <div class="col_full nobottommargin">
                    <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="submit" >Submit</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="customjs/js_verify.js"></script>
  
  <?php include("footer.php"); ?>
