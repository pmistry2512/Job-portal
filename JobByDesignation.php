<?php include('header.php');
include("ValidCandidate.php"); ?>
  <section id="page-title">
    <div class="container clearfix">
      <h1>Jobs By Deignation</h1>
      <!--      <span>Manage Candidate Job Applications</span>-->
    </div>
  </section>
  <!-- #page-title end -->
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <!-- Post Content
					============================================= -->
        <div class="postcontent nobottommargin col_last">
		<div class="style-msg successmsg" id="msgsuc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
          <!-- Shop
						============================================= -->
          <div id="shop" class="shop product-3  clearfix">
           
            
           
          </div>
          <!-- #shop end -->
        </div>
        <!-- .postcontent end -->
        <!-- Sidebar
					============================================= -->
        <div class="sidebar nobottommargin">
          <div class="sidebar-widgets-wrap">
            <div class="widget widget-filter-links clearfix">
              <h4>Select Designation</h4>
              <ul class="custom-filter" data-container="#shop" data-active-class="active-filter">
                
                <?php
										$sql="Select * From tbldesignation Where designationid In(Select designation from tbljob where jobstatus='Active')";
										$cnt=1;
										$company=@mysql_query($sql) or die(mysql_error());
										while($rowcompany=@mysql_fetch_array($company))
										{
									 ?>
                <li style="list-style-type:none;">
                <li><a href="#" onClick="checkDesignation(<?php echo $rowcompany["designationid"];?>)"><?php echo $rowcompany["designationname"]; ?></a></li>
                <?php
									$cnt++;
									}
									?>
              </ul>
            </div>
            <!--<div class="widget widget-filter-links clearfix">
              <h4>Sort By</h4>
              <ul class="shop-sorting">
                <li class="widget-filter-reset active-filter"><a href="#" data-sort-by="original-order">Clear</a></li>
                <li><a href="#" data-sort-by="name">Name</a></li>
                <li><a href="#" data-sort-by="price_lh">Price: Low to High</a></li>
                <li><a href="#" data-sort-by="price_hl">Price: High to Low</a></li>
              </ul>
            </div>-->
          </div>
        </div>
        <!-- .sidebar end -->
      </div>
    </div>
  </section>
  <!-- #content end -->
  <script type="text/javascript" src="js/jquery.js"></script>		
 <script type="text/javascript" src="customjs/js_jobbycompany.js"></script>	
 <script>
		$(document).ready(function() {
			checkDesignation(0);
		});
	</script>
  <?php include('footer.php'); ?>
