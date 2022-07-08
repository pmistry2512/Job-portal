<?php
include_once("header.php");
include("ValidAdmin.php");
?>
  <!-- Content
		============================================= -->
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="table-responsive">
          <div class="style-msg successmsg" id="msgsuc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
          <div class="col-md-12">
          	<a href="#newpostgrad" style="float:left;" data-lightbox="inline" class="fright" onClick="addNewPostgrad()"><i class="icon-plus"></i>&nbsp; Add New Post Graduation</a>
            <a href="#newpostgrad" data-lightbox="inline" class="fright" id="editPostgrad"></a>
            <br><br>
          </div>
          <table id="tablepostgrad" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Post Graduation ID</th>
                <th>Post Graduation Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Post Graduation ID</th>
                <th>Post Graduation Name</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody id="tblpostgradbody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  
 <!--New Post Graduation Modal -->
<div class="modal1 mfp-hide subscribe-widget" id="newpostgrad">
  <div class="block dark divcenter" style="background: #333333 no-repeat; background-size: cover; max-width: 700px;" data-height-lg="400">
    <div style="padding: 20px;">
      <div class="heading-block nobottomborder bottommargin-sm">
        <h3 id="modalheading"></h3>
        <!--<span>Get Latest Fashion Updates &amp; Offers</span>--> 
      </div>
      <div class="widget-subscribe-form-result"></div>
      <form class="widget-subscribe-form2" method="post"  name="formpostgrad" id="formpostgrad">
        <input type="hidden" id="callfunction" name="callfunction" value="">
        <input type="hidden" id="pgid" name="pgid" value="">
        <div class="nobottomborder" style="margin-bottom:10px;"> <span>Post Graduation Name :</span> </div>
        <input type="text" id="pgname" name="pgname" class="form-control input-lg not-dark required" required="">
        <br>
        <button class="button button-rounded button-border button-light noleftmargin" type="submit" style="margin-top:15px;" id="btsubmit" name="btsubmit">Save</button>
      </form>
      
      <!--<p class="nobottommargin"><small><em>*We hate Spam &amp; Junk Emails.</em></small></p>--> 
    </div>
  </div>
</div>
<!-- end of modal --> 
  <!-- #content end --> 
  <script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="customjs/js_postgrad.js"></script> 
  <script>
		$(document).ready(function() {
			refreshpostgrad();
		});
	</script>
  <?php
include_once("footer.php");
?>