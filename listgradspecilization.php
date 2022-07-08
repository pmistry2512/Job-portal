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
          	<a href="#newgraduationspecialization" style="float:left;" data-lightbox="inline" class="fright" onClick="addNewGraduationspecialization()"><i class="icon-plus"></i>&nbsp; Add New Graduationspecialization</a>
            <a href="#newgraduationspecialization" data-lightbox="inline" class="fright" id="editgraduationspecialization"></a>
            <br><br>
          </div>
          <table id="tablegraduationspecialization" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Graduation Specialization Name</th>
				  <th>Graduation</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Graduation Specialization Name</th>
				  <th>Graduation</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody id="tblgraduationspecializationbody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  
 <!--New Graduationspecialization Modal -->
<div class="modal1 mfp-hide subscribe-widget" id="newgraduationspecialization">
  <div class="block dark divcenter" style="background: #333333 no-repeat; background-size: cover; max-width: 700px;" data-height-lg="400">
    <div style="padding: 20px;">
      <div class="heading-block nobottomborder bottommargin-sm">
        <h3 id="modalheading"></h3>
        <!--<span>Get Latest Fashion Updates &amp; Offers</span>--> 
      </div>
      <div class="widget-subscribe-form-result"></div>
      <form class="widget-subscribe-form2" method="post"  name="formgraduationspecialization" id="formgraduationspecialization">
        <input type="hidden" id="callfunction" name="callfunction" value="">
        <input type="hidden" id="gradspid" name="gradspid" value="">

		 <div class="nobottomborder" style="margin-bottom:10px;"> <span>Select Graduation Name :</span> </div>
		 <select class="form-control input-lg not-dark required" id="drpgrad" name="drpgrad" >
				<?php
					$sql=@mysql_query("Select * From tblgraduation where delstatus='N'") or die(mysql_error());
					while($row=@mysql_fetch_array($sql))
					{
				?>
						<option value="<?php echo $row['graduationid'];?>"><?php echo $row['graduationname'];?></option>
				<?php
					}
				?>
		</select>
		
		 <br>
        <div class="nobottomborder" style="margin-bottom:10px;"> <span>Graduationspecialization Name :</span> </div>
        <input type="text" id="gradspname" name="gradspname" class="form-control input-lg not-dark required" required="">
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
  <script type="text/javascript" src="customjs/js_graduationspecialization.js"></script> 
  <script>
		$(document).ready(function() {
			refreshgraduationspecialization();
		});
	</script>
  <?php
include_once("footer.php");
?>