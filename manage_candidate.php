<?php
include_once("header.php");
include("ValidTPO.php");
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
         
           
           
          <table id="tablecandidate" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Name</th>
                <th>Enrollment No.</th>
				<th>Department</th>
				<th>Email</th>
				<th>Contact No.</th>
				<th>Register Date</th>
				<th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
               	<th>Name</th>
                <th>Enrollment No.</th>
				<th>Department</th>
				<th>Email</th>
				<th>Contact No.</th>
				<th>Register Date</th>
				<th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody id="tblcandidatebody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  
 
  <!-- #content end --> 
  <script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="customjs/js_candidate.js"></script> 
  <script>
		$(document).ready(function() {
			refreshcandidate();
		});
	</script>
  <?php
include_once("footer.php");
?>