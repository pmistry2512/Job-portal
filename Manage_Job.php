<?php include('header.php');
include("ValidCompany.php"); ?>
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <center>
		 <div class="style-msg successmsg" id="msgsuc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
          <a id="lnkall" href="javascript:void(0)" onClick="LoadJob('All')" class="button button-3d button-small button-rounded button-teal">All Jobs</a> <a href="javascript:void(0)" onClick="LoadJob('Active')" class="button button-3d button-small button-rounded button-red">Active Jobs</a> <a href="javascript:void(0)" onClick="LoadJob('Complete')" class="button button-3d button-small button-rounded button-green">Completed Jobs</a><br><br>
		  <label id="lbljob" name="lbljob">Displaying&nbsp;<span id="msglbljob" name="msglbljo"></span>&nbsp;Jobs</label>
        </center>
        <div class="clear"></div>
        <br/>
        <br/>
        <div id="portfolio" class="post-grid grid-2 clearfix"> </div>
      </div>
	  <!--<div class="style-msg errormsg">
			<div class="sb-msg">
				<i class="icon-remove"></i>
					<strong>Oh snap!</strong>
					No Any Jobs to Display....
			</div>
		</div>-->
    </div>
  </section>
  <!-- #content end -->
</div>
<!-- #wrapper end -->
<script type="text/javascript" src="customjs/js_job.js"></script>
 <script type="text/javascript" src="js/jquery.js"></script>		
<?php include('footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$('#lnkall').click();
	});
</script>
