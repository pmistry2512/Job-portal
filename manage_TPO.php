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
		  
		   <div class="style-msg successmsg" id="msgsucc" style="display:none;">
                  <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> TPO Registered Sucessfully</div>
                  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                
			</div>
		  
         <div class="col-md-12">
          	<a href="#newtpo" style="float:left;" data-lightbox="inline" class="fright"><i class="icon-plus"></i>&nbsp; Register New TPO</a>
            <a href="#edittpo" data-lightbox="inline" class="fright" id="editdepartment"></a>
            <br><br>
          </div>
           
           
          <table id="tabletpo" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
               	<th>Name</th>
				<th>Email</th>
				<th>Department</th>
				<th>Status</th>
				<th>Action</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
               	<th>Name</th>
				<th>Email</th>
				<th>Department</th>
				<th>Status</th>
				<th>Action</th>
              </tr>
            </tfoot>
            <tbody id="tbltpobody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>
  
  <!--New TPO Edit Modal -->
<div class="modal1 mfp-hide subscribe-widget" id="edittpo">
  <div class="block dark divcenter" style="background: #333333 no-repeat; background-size: cover; max-width: 700px;" data-height-lg="700">
    <div style="padding: 20px;">
      <div class="heading-block nobottomborder bottommargin-sm">
        <h3 id="modalheading"></h3>
        <!--<span>Get Latest Fashion Updates &amp; Offers</span>--> 
      </div>
      <div class="widget-subscribe-form-result"></div>
     <form id="tpoedit" name="tpoedit" class="nobottommargin" method="post">
									
										<input type="hidden" id="callfunction" name="callfunction" value="EditTPO">
										<input type="hidden" id="candid" name="candid" value=""/>

											<div class="col_full">
												<label for="register-form-name"> TPO Name:</label>
												<input type="name" id="txtname" name="txtname" value="" class="sm-form-control required" required=""/>
											</div>
										

											<div class="col_full">
												<label for="register-form-email">Email Id:</label>
												<input type="email" id="txtemail" name="txtemail" value="" class="sm-form-control required" required=""/>
											</div>
											
											<!--<div class="col_full">
												<label for="register-form-password">Password:</label>
												<input type="password" id="txtpass" name="txtpass" value="" class="sm-form-control required" required=""/>
											</div>

											<div class="col_full">
												<label for="register-form-repassword">Re-enter Password:</label>
												<input type="password" id="txtrepass" name="txtrepass" value="" class="sm-form-control required" required=""/>
											</div>-->
											
											
											
											<div class="col_full">
												<label for="register-form-city">Department:</label>
												<select class="form-control" id="department" name="department" >
  													<?php
															$sql=@mysql_query("Select * From tbldepartment where delstatus='N'") or die(mysql_error());
															while($row=@mysql_fetch_array($sql))
															{
													?>
																<option value="<?php echo $row['departmentid'];?>"><?php echo $row['departmentname'];?></option>
													<?php
															}
													?>
												</select>
												
											</div>
											
											<div class="col_full">
												<label for="register-form-state">Status:</label>
												<select class="form-control" id="status" name="status" >
													<option value="Select">--Select--</option>
													<option value="Active">Active</option>
													<option value="Block">Block</option>
												
												</select>
											</div>
											
											

										    
										    <br>
											
                <div class="style-msg errormsg" id="msgerr" style="display:none;">
                  <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>Tpo Already Assigned For This Department</div>
                </div>
										
											<div class="col_full nobottommargin">
												<button class="button button-3d button-black nomargin" id="submit" name="submit" value="submit" type="submit">Register</button>
											</div>
											</form>
      
      <!--<p class="nobottommargin"><small><em>*We hate Spam &amp; Junk Emails.</em></small></p>--> 
    </div>
  </div>
</div>
<!-- end of TPO Edit modal --> 

<!-- TPO Reg Modal -->

<div class="modal1 mfp-hide subscribe-widget" id="newtpo">
  <div class="block dark divcenter" style="background: #333333 no-repeat; background-size: cover; max-width: 700px;" data-height-lg="700">
    <div style="padding: 20px;">
      <div class="heading-block nobottomborder bottommargin-sm">
        <h3 id="modalheading"></h3>
        <!--<span>Get Latest Fashion Updates &amp; Offers</span>--> 
      </div>
      <div class="widget-subscribe-form-result"></div>
     <form id="tporeg" name="tporeg" class="nobottommargin" method="post">
									
										<input type="hidden" id="callfunction" name="callfunction" value="tporegistration">

											<div class="col_full">
												<label for="register-form-name"> TPO Name:</label>
												<input type="name" id="txtname" name="txtname" value="" class="sm-form-control required" required=""/>
											</div>
										

											<div class="col_full">
												<label for="register-form-email">Email Id:</label>
												<input type="email" id="txtemail" name="txtemail" value="" class="sm-form-control required" required=""/>
											</div>
											
											<div class="col_full">
												<label for="register-form-password">Password:</label>
												<input type="password" id="txtpass" name="txtpass" value="" class="sm-form-control required" required=""/>
											</div>

											<div class="col_full">
												<label for="register-form-repassword">Re-enter Password:</label>
												<input type="password" id="txtrepass" name="txtrepass" value="" class="sm-form-control required" required=""/>
											</div>
											
											
											
											<div class="col_full">
												<label for="register-form-city">Department:</label>
												<select class="form-control" id="department" name="department" >
  													<?php
															$sql=@mysql_query("Select * From tbldepartment where delstatus='N'") or die(mysql_error());
															while($row=@mysql_fetch_array($sql))
															{
													?>
																<option value="<?php echo $row['departmentid'];?>"><?php echo $row['departmentname'];?></option>
													<?php
															}
													?>
												</select>
												
											</div>
											
											<div class="col_full">
												<label for="register-form-state">Status:</label>
												<select class="form-control" id="status" name="status" >
													<option value="Select">--Select--</option>
													<option value="Active">Active</option>
													<option value="Block">Block</option>
												
												</select>
											</div>
											
											

										    
										    <br>
											 <div class="style-msg successmsg" id="msgsucc" style="display:none;">
                  <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong> TPO Registered Sucessfully</div>
                  <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
                </div>
                <div class="style-msg errormsg" id="msgerr" style="display:none;">
                  <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>Tpo Already Assigned For This Department</div>
                </div>
										
											<div class="col_full nobottommargin">
												<button class="button button-3d button-black nomargin" id="register-form-submit" name="register-form-submit" value="register" type="submit">Register</button>
											</div>
											</form>
      
      <!--<p class="nobottommargin"><small><em>*We hate Spam &amp; Junk Emails.</em></small></p>--> 
    </div>
  </div>
</div>
<!-- End of TPO Reg Modal -->
  
 
  <!-- #content end --> 
  <script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="customjs/js_tpo.js"></script> 
  <script>
		$(document).ready(function() {
			refreshtpo();
		});
	</script>
  <?php
include_once("footer.php");
?>