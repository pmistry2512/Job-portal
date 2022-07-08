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
          	<a href="#newdesignation" style="float:left;" data-lightbox="inline" class="fright" onClick="addNewDesignation()"><i class="icon-plus"></i>&nbsp; Add New Designation</a>
            <a href="#newdesignation" data-lightbox="inline" class="fright" id="editdesignation"></a>
            <br><br>
          </div>
          <table id="tabledesignation" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Designation ID</th>
                <th>Designation Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Designation ID</th>
                <th>Designation Name</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody id="tbldesignationbody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  
 <!--New Designation Modal -->
<div class="modal1 mfp-hide subscribe-widget" id="newdesignation">
  <div class="block dark divcenter" style="background: #333333 no-repeat; background-size: cover; max-width: 700px;" data-height-lg="400">
    <div style="padding: 20px;">
      <div class="heading-block nobottomborder bottommargin-sm">
        <h3 id="modalheading"></h3>
        <!--<span>Get Latest Fashion Updates &amp; Offers</span>--> 
      </div>
      <div class="widget-subscribe-form-result"></div>
      <form class="widget-subscribe-form2" method="post"  name="formdesignation" id="formdesignation">
        <input type="hidden" id="callfunction" name="callfunction" value="">
        <input type="hidden" id="desigid" name="desigid" value="">
        <div class="nobottomborder" style="margin-bottom:10px;"> <span>Designation Name :</span> </div>
        <input type="text" id="designame" name="designame" class="form-control input-lg not-dark required" required="">
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
  <script type="text/javascript" src="customjs/js_designation.js"></script> 
  <script>
		$(document).ready(function() {
			refreshdesignation();
		});
	</script>
  <?php
include_once("footer.php");
?>