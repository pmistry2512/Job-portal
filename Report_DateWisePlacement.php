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
                <h4>Date Wise Hired Candidate</h4>
              </center>
            </div>
            <div class="col-sm-2" align="right">
              <label>Select Date:</label>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <div class="input-daterange travel-date-group bottommargin-sm">
                  <input type="text" value="" class="sm-form-control tleft format required" placeholder="DD-MM-YYYY" id="sdate" name="sdate">
                </div>
              </div>
            </div>
            <div class="col-sm-2" align="right">
              <label>Select To Date:</label>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
                <div class="input-daterange travel-date-group bottommargin-sm">
                  <input type="text" value="" class="sm-form-control tleft format required" placeholder="DD-MM-YYYY" id="tdate" name="tdate">
                </div>
              </div>
            </div>
            <div class="col-sm-2">
              <button class="button button-3d button-black nomargin" id="submit" name="submit" value="register" type="button" onClick="getdatewiseplacement()">Submit</button>
            </div>
			<div class="col-sm-2">
          <button class="button button-3d button-black nomargin" id="downlaod" name="download" type="button" onClick="getdatewiseplacementpdf()">Download</button>
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
			getdatewiseplacement();
		});
	</script>
  <?php include('footer.php'); ?>
