<?php
include_once("header.php");
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
          	<a href="#newdepartment" style="float:left;" data-lightbox="inline" class="fright" onClick="addNewInformer()"><i class="icon-plus"></i>&nbsp; Add New Job Informer</a>
            <a href="#newdepartment" data-lightbox="inline" class="fright" id="editdepartment"></a>
            <br><br>
          </div>
          <table id="tabledepartment" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>ID</th>
                <th>Informer Name</th>
				<th>Keywords</th>
				<th>Experinece</th>
				<th>Salary</th>
				<th>Desired Location</th>
				<th>Industry</th>
				<th>Creation Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Informer Name</th>
				<th>Keywords</th>
				<th>Experinece</th>
				<th>Salary</th>
				<th>Desired Location</th>
				<th>Industry</th>
				<th>Creation Date</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody id="tbldepartmentbody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  
 <!--New Department Modal -->
<div class="modal1 mfp-hide subscribe-widget" id="newdepartment">
  <div class="block dark divcenter" style="background: #333333 no-repeat; background-size: cover; max-width: 700px;" data-height-lg="850">
    <div style="padding: 20px;">
      <div class="heading-block nobottomborder bottommargin-sm">
        <h3 id="modalheading"></h3>
        <!--<span>Get Latest Fashion Updates &amp; Offers</span>--> 
      </div>
      <div class="widget-subscribe-form-result"></div>
      <form class="widget-subscribe-form2" method="post"  name="forminformer" id="forminformer">
        <input type="hidden" id="callfunction" name="callfunction" value="">
        
        	<div class="col_full" style="margin-bottom:10px;"> <span>Informer Name :</span> </div>
        <input type="text" id="informername" name="informername" class="sm-form-control required" required="">
		
		<div class="col_full" style="margin-bottom:10px;"> <span>Keywords:</span> </div>
			<textarea id="keywords" name="keywords" class="sm-form-control required" required=""></textarea>
			
		<div class="col_full" style="margin-bottom:10px;"> <span>Minimum Experience :</span> </div>
        <select id="drpminexp" name="drpminexp" class="sm-form-control" onChange="fillmaxexperinece()">
		
			
		</select>
		
		<div class="col_full" style="margin-bottom:10px;"> <span>Maximum Experience :</span> </div>
       <select id="drpmaxexp" name="drpmaxexp" class="sm-form-control">
		
			
		</select>
		
		<div class="col_full" style="margin-bottom:10px;"> <span>Salary :</span> </div>
		<select id="salary" name="salary" class="sm-form-control">
			<option value="0-5000">0 - 5000</option>
			<option value="5000-15000">5000 - 15000</option>
			<option value="15000-30000">15000 - 30000</option>
			<option value="30000-50000">30000 - 50000</option>
			<option value="50000-100000">> 50000</option>
		</select>
		
		
		
		<div class="col_full" style="margin-bottom:10px;"> <span>Desire Location :</span> </div>
        <input type="text" id="location" name="location" class="sm-form-control" />
		
		<div class="col_full">
												<label for="register-form-phone">Industry:</label>
												<select class="sm-form-control" id="drpindustry" name="drpindustry" >
  													<?php
														$sql=@mysql_query("Select * From tblindustry where delstatus='N'") or die(mysql_error());
														while($r=@mysql_fetch_array($sql))
														{
													?>
																<option value="<?php echo $r['industryid'];?>"><?php echo $r['industryname'];?></option>
													<?php
															}
													?>
												</select>
												
											</div>
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
  <script type="text/javascript" src="customjs/js_informer.js"></script> 
  <script>
		$(document).ready(function() {
			refershinformer();
			fillminexperience();
			fillmaxexperinece();
		});
	</script>
  <?php
include_once("footer.php");
?>