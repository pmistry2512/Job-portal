<?php
include_once("header.php");
include("ValidCompany.php");
?>

<!-- Page Title
		============================================= -->
		<section id="page-title">

			<div class="container clearfix">
				<h1>Interview Rounds For Job of &nbsp;<?php echo $_REQUEST['jobname']; ?></h1>
				
			</div>

		</section><!-- #page-title end -->
  <!-- Content
		============================================= -->
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="style-msg successmsg" id="msgsuc" style="display:none;">
          <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
          <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
        </div>
        <div class="style-msg errormsg" id="msgerr" style="display:none;">
          <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
        </div>
		
      <div class="col-md-12"> 
	  <?php
	  
		$sql=@mysql_query("Select * from interviewround,tblinterview where tblinterview.interviewid=interviewround.interviewid And tblinterview.interviewid=$_REQUEST[iid]");
		
		$row=@mysql_fetch_assoc($sql);
		if($row['status']!='Complete')
		{
		 ?>
	  <a href="#newinterview" style="float:left;" data-lightbox="inline" class="fright" onClick="addNewRound()"><i class="icon-plus"></i>&nbsp; Add New Round</a>
	  <?php } ?> </div>
        <table class="table table-striped">
          <thead>
            <tr>
             
			  
              <th>Round Name</th>
              <th>Round Date</th>
              <th>Total Marks</th>
              <th>Passing Mark</th>
              <th>Round Status</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="roundtablebody">
          </tbody>
        </table>
      </div>
			</div>
		  </section>
		  <!--New Interview Modal -->
		  <div class="modal1 mfp-hide subscribe-widget" id="newinterview">
  <div class="block dark divcenter" style="background: #333333 no-repeat; background-size: cover; max-width: 700px;" data-height-lg="550">
      <div style="padding: 20px;">
        <div class="heading-block nobottomborder bottommargin-sm">
          <h3 id="modalheading"></h3>
          <!--<span>Get Latest Fashion Updates &amp; Offers</span>-->
        </div>
        <div class="widget-subscribe-form-result"></div>
        <form class="widget-subscribe-form2" method="post"  name="formround" id="formround">
          <input type="hidden" id="callfunction" name="callfunction" value="">
		  <input type="hidden" id="iid" name="iid" value="<?php echo $_REQUEST["iid"];?>"/>
		  
          <input type="hidden" id="jobname" name="jobname" value="<?php echo $_REQUEST["jobname"]; ?>"/>
          
          <div class="nobottomborder" style="margin-bottom:10px;">
            <label for="register-form-Job">Round Name :</label>
            <input type="text" id="rname" name="rname" class="sm-form-control tleft format required" required="">
          </div>
          <div class="col_full">
            <div class="input-daterange travel-date-group bottommargin-sm">
              <label for="" class="nobottomborder" style="margin-bottom:10px;">Round Date :</label>
              <input type="text" value="" class="sm-form-control tleft format required" placeholder="DD-MM-YYYY" id="rdate" name="rdate">
            </div>
          </div>
           <label for="register-form-Job" style="margin-bottom:10px;">Total Marks :</label>
        <select id="drpminexp" name="drpminexp" class="sm-form-control" onChange="fillmaxexperinece()">
		
		</select>
		
		 <label for="register-form-Job" style="margin-top:10px;">Passing Marks :</label>
       <select id="drpmaxexp" name="drpmaxexp" class="sm-form-control">
          
          </select>
		  <button class="button button-rounded button-border button-light noleftmargin" type="submit" style="margin-top:15px;" id="submit" name="submit">Save</button>
        </form>
        <!--<p class="nobottommargin"><small><em>*We hate Spam &amp; Junk Emails.</em></small></p>-->
      </div>
    </div>
  </div>
  <!-- end of modal -->
  <!-- #content end -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="customjs/js_round.js"></script>
  
  <script>
		$(document).ready(function() {
			refereshrounds(<?php echo $_REQUEST['iid']; ?>);
			fillminexperience();
			fillmaxexperinece();
		});
	</script>
	
  <?php
include_once("footer.php");
?>
