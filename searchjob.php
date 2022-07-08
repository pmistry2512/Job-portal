<head>
<style>

		.white-section {
			background-color: #FFF;
			padding: 25px 20px;
			-webkit-box-shadow: 0px 1px 1px 0px #dfdfdf;
			box-shadow: 0px 1px 1px 0px #dfdfdf;
			border-radius: 3px;

		}

		.white-section label {
			display: block;
			margin-bottom: 15px;
		}

		.white-section pre { margin-top: 15px; }

		.dark .white-section {
			background-color: #111;
			-webkit-box-shadow: 0px 1px 1px 0px #444;
			box-shadow: 0px 1px 1px 0px #444;
		}

		</style>
</head>
<?php include('header.php');
include("ValidCandidate.php"); ?>
  <section id="content">
    <div class="content-wrap nopadding">
      <div class="section nomargin">
        <div class="container clearfix">
          <div class="row">
            <div class="col-md-12 bottommargin-sm">
              <div class="white-section">
                <div class="row">
				<form id="searchform" method="post">
				<input type="hidden" name="callfunction" id="callfunction" value="SearchJob">
				<div class="col-lg-12"><center><h2>Search Jobs</h2></center></div>
					<div class="col-lg-3">
						<label for="register-form-password">Skills</label>
						<input id="txtskills" name="txtskills" value="" class="sm-form-control" type="text" placeholder="Enter Multiple Skills with comma">
					</div>
					<div class="col-lg-3">
						<label for="register-form-password">Company</label>
						<select class="form-control input-lg not-dark required" id="drcompany" name="drcompany" >
							<option value="0">All</option>
							<?php
								$sql=@mysql_query("Select * From tblcompany where status='Active'") or die(mysql_error());
								while($row=@mysql_fetch_array($sql))
								{
							?>
									<option value="<?php echo $row['companyid'];?>"><?php echo $row['companyname'];?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class="col-lg-3">
						<label for="register-form-password">Location</label>
						<input id="txtloc" name="txtloc" value="" class="sm-form-control" type="text" placeholder="Enter Multiple Location With Comma">
					</div>
					<div class="col-lg-3">
						<label for="register-form-password">Designation</label>
						<select class="form-control input-lg not-dark required" id="drdesignation" name="drdesignation" >
							<option value="0">All</option>
							<?php
								$sql=@mysql_query("select * from tbldesignation where designationid In (select designation from tbljob where jobstatus='Active')") or die(mysql_error());
								while($row=@mysql_fetch_array($sql))
								{
							?>
									<option value="<?php echo $row['designationid'];?>"><?php echo $row['designationname'];?></option>
							<?php
								}
							?>
						</select>
						<br>
					</div>
					
					<div class="col-lg-3">
						<label for="register-form-password">Salary</label>
						<select id="salary" name="salary" class="sm-form-control">
						    <option value="0-0">All</option>
							<option value="0-5000">0 - 5000</option>
							<option value="5000-15000">5000 - 15000</option>
							<option value="15000-30000">15000 - 30000</option>
							<option value="30000-50000">30000 - 50000</option>
							<option value="50000-100000">> 50000</option>
						</select>
					</div>
					<div class="col-lg-3">
						<label for="register-form-password">Sort By</label>
						<select id="sortby" name="sortby" class="sm-form-control">
							<option value="Newest">Newest First</option>
							<option value="Oldest">Oldest First</option>
							<option value="DesignationAZ">Designation (A-Z)</option>
							<option value="DesignationZA">Designation (Z-A)</option>
						</select>
					</div>
					<div class="col-lg-6" style="margin-top:15px;">
						<br>
						<button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="submit" >Submit</button>
					</div>
				</div>
				</form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
			<div class="content-wrap" style="z-index:0 !important;position:relative;">

				<div class="container clearfix">
				<div class="style-msg successmsg" id="msgsuc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
				<div id="data"  class="shop product-3  clearfix">
				<center><h3>Select your filter, and get the list of job  </h3></center>
				</div>

				</div>
			</div>
		</section>
		<script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="customjs/js_job.js"></script> 
  <script>
		$(document).ready(function() {
			//getjob();
		});
	</script>
  <?php include('footer.php'); ?>
