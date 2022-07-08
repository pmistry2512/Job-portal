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

<?php include('header.php');
 ?>
  <section id="content">
    
  
			<div class="content-wrap" style="z-index:0 !important;position:relative;">

				<div class="container clearfix">
				<div id="data"  class="shop product-3  clearfix">
				
				</div>

				</div>
			</div>
		</section>
		<script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="customjs/js_informer.js"></script> 
  <script>
		$(document).ready(function() {
			viewjobs(<?php echo $_REQUEST["id"];?>);
		});
	</script>
  <?php include('footer.php'); ?>
