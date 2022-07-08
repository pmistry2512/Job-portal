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
    <div class="content-wrap nopadding">
     
    <div class="content-wrap">
      <div class="container clearfix">
	  <div class="white-section">
                <div class="row">
                  <form id="companyform" method="post">
                    <input type="hidden" name="callfunction" id="callfunction" value="">
                    <div class="col-lg-12">
                      <center>
                        <h4>Year Wise Hired Candidate</h4>
                      </center>
                    </div>
                    <div class="col-sm-3" align="right">
                      <label>Select Year:</label>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <select class="selectpicker form-control" id="drpyear" name="dpyear" style="z-index:9999 !important; position:absolute !important;">
                         
                          <option value="0">All</option>								
                          <option value="2017">2017</option>
                          <option value="2018">2018</option>
                          <option value="2019">2019</option>
                          <option value="2020">2020</option>
						  <option value="2021">2021</option>
                         
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="button" onClick="getyearwiseplacement()">Submit</button>
                    </div>
					<div class="col-sm-2">
                      <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="button" onClick="getyearwiseplacementpdf()">Download</button>
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
			getyearwiseplacement();
		});
	</script>
  <?php include('footer.php'); ?>
