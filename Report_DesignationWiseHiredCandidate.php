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
<?php include('header.php'); ?>
  <section id="content">
    
    <div class="content-wrap">
      <div class="container clearfix">
	  <div class="white-section">
                <div class="row">
                  <form id="companyform" method="post">
                    <input type="hidden" name="callfunction" id="callfunction" value="">
					
                    <div class="col-lg-12">
                      <center>
                        <h4>Designation Wise Hired Candidate</h4>
                      </center>
                    </div>
                    <div class="col-sm-3" align="right">
                      <label>Select Designation:</label>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <select class="selectpicker form-control" id="drpdesig" name="drpdesig" style="z-index:9999 !important; position:absolute !important;">
                          <option value="0">All</option>
                          <?php 
															$sql=@mysql_query("Select * From tbldesignation,tbljobapply,tbljob where tbljob.designation=tbldesignation.designationid And tbljobapply.jobid=tbljob.jobid And tbljobapply.applicationstatus='Hired' GROUP BY tbljob.designation") or die (mysql_error());
															while($r=@mysql_fetch_array($sql))
															{
														?>
                          <option value="<?php echo $r['designationid']; ?>"><?php echo $r['designationname']; ?></option>
                          <?php 
															}
														?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="button" onClick="getdesigwisecandidate()">Submit</button>
                    </div>
					<div class="col-sm-2">
                      <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="button" onClick="getdesigwiseplacement()">Download</button>
					   <input type="hidden" id="user" name="user" value="<?php echo $_SESSION['LoggedUserRole']; ?>"/>
		  <?php
		  if($_SESSION['LoggedUserRole']=='TPO')
		  {
		  ?>
		  <input type="hidden" id="deptid" name="deptid" value="<?php echo $_SESSION['LoggedDeptId']; ?>"/>
		  <?php } ?>
		  <?php  if($_SESSION['LoggedUserRole']=='Employer')
		  { ?>
		  <input type="hidden" id="userid" name="userid" value="<?php echo $_SESSION['LoggedUserId']; ?>"/>
		  <?php }?>
                    </div>
                  </form>
                </div>
              </div>
			  <br />
			  <br />
        <div id="data"> </div>
      </div>
    </div>
  </section>
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="customjs/js_report.js"></script>
  <script>
		$(document).ready(function() {
			getdesigwisecandidate();
		});
	</script>
  <?php include('footer.php'); ?>
