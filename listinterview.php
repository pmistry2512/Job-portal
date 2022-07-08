<?php
include_once("header.php");
include("ValidCompany.php");

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
          	<a href="#newinterview" style="float:left;" data-lightbox="inline" class="fright" onClick="addNewInterview()"><i class="icon-plus"></i>&nbsp; Add New Interview</a>
            <a href="#newinterview" data-lightbox="inline" class="fright" id="editinterview"></a>
            <br><br>
          </div>
          <table id="tableinterview" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Interview ID</th>
                <th>Jobname Name</th>
				<th>Interview Location</th>
				<th>Interview Date</th>
				<th>Interview Time</th>
				<th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>Interview ID</th>
                <th>Jobname Name</th>
				<th>Interview Location</th>
				<th>Interview Date</th>
				<th>Interview Time</th>
				<th>Status</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody id="tblinterviewbody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  
 <!--New Interview Modal -->
<div class="modal1 mfp-hide subscribe-widget" id="newinterview">
  <div class="block dark divcenter" style="background: #333333 no-repeat; background-size: cover; max-width: 700px;" data-height-lg="55	0">
    <div style="padding: 20px;">
      <div class="heading-block nobottomborder bottommargin-sm">
        <h3 id="modalheading"></h3>
        <!--<span>Get Latest Fashion Updates &amp; Offers</span>--> 
      </div>
      <div class="widget-subscribe-form-result"></div>
      <form class="widget-subscribe-form2" method="post"  name="forminterview" id="forminterview">
        <input type="hidden" id="callfunction" name="callfunction" value="">
        <input type="hidden" id="intid" name="intid" value="">
		
		<div class="nobottomborder" style="margin-bottom:10px;">
												<label for="register-form-Job">Job :</label>
												<select class="sm-form-control" id="drpjob" name="drpjob" >
  													<?php
													
														$sql=@mysql_query("Select * From tbljob where delstatus='N' And jobstatus='Active' And companyid=$_SESSION[LoggedUserId]") or die(mysql_error());
														while($r=@mysql_fetch_array($sql))
														{
													?>
																<option value="<?php echo $r['jobid'];?>"><?php echo $r['jobname'];?></option>
													<?php
															}
													?>
												</select>
												
		</div>
		<div class="nobottomborder" style="margin-bottom:10px;">
												<label for="register-form-Job">Interview Location :</label>
        <input type="text" id="location" name="location" class="sm-form-control tleft format required" required="">
		</div>
		
		<div class="col_full">
			<div class="input-daterange travel-date-group bottommargin-sm">
				<label for="" class="nobottomborder" style="margin-bottom:10px;">Interview Date :</label>
				<input type="text" value="" class="sm-form-control tleft format required" placeholder="DD-MM-YYYY" id="intdate" name="intdate">
			</div>
		</div>
		<div class="nobottomborder" style="margin-bottom:10px;">
												<label for="register-form-Job">Interview Time :</label>
        <input type="text" id="inttime" name="inttime" class="sm-form-control tleft format required" required="">
		</div>
		
		
        <br>
        <button class="button button-rounded button-border button-light noleftmargin" type="submit" style="margin-top:15px;" id="submit" name="submit">Save</button>
      </form>
      
      <!--<p class="nobottommargin"><small><em>*We hate Spam &amp; Junk Emails.</em></small></p>--> 
    </div>
  </div>
</div>
<!-- end of modal --> 
  <!-- #content end --> 
  <script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="customjs/js_interview.js"></script> 
  <script>
		$(document).ready(function() {
			refreshinterview();
		});
	</script>
  <?php
include_once("footer.php");
?>