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
				<form id="formcompany" method="post">
				<input type="hidden" name="callfunction" id="callfunction" value="">
				<div class="col-lg-12"><center><h4>Company Wise Hired Candidate</h4></center></div>				
                  <div class="col-sm-2">
                    <label>Select Company:</label>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <select class="selectpicker form-control" id="company" name="company">

                        <option value="0">All</option>
                        <?php 
															$sql=@mysql_query("Select * From tblcompany,tbljob,tbljobapply where tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid And tbljobapply.applicationstatus='Hired' GROUP BY tbljob.companyid") or die (mysql_error());
															while($r=@mysql_fetch_array($sql))
															{
														?>
                        <option value="<?php echo $r['companyid']; ?>"><?php echo $r['companyname']; ?></option>
                        <?php 
															}
														?>
                      </select>
                    </div>
					
                  </div>
				  <div class="col-sm-2">
				 
				     	<button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="button" onClick="getcandidatebycompany()">Submit</button>
					</div>
					<div class="col-sm-2">
          <button class="button button-3d button-black nomargin" id="downlaod" name="download" type="button" onClick="getcompanywiseplacementpdf()">Download</button>
		  </div>
					</form>
                </div>
              </div>
				<div class="clearfix"></div>
					<br /><br />
				<div id="data">
				</div>

				</div>
			</div>
		</section>
		<script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="customjs/js_report.js"></script> 
  <script>
		$(document).ready(function() {
			getcandidatebycompany();
		});
	</script>
  <?php include('footer.php'); ?>
