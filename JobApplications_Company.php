<?php include('header.php');
include("ValidCompany.php"); ?>

<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">

					<!-- Post Content
					============================================= -->
					<div class="nobottommargin clearfix">
					<div class="style-msg successmsg" id="msgsuc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
		  <div class="style-msg successmsg" id="msgwait" style="display:none;">
            <div class="sb-msg"><strong>Please Wait Processing...!</strong></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>

						<h4>Candidate Application</h4>

						<div class="row">
						<?php 
	$sql=@mysql_query("Select tbljobapply.*, tbljob.jobid, candidatename,candidateimage,candidateemail,candidateregdate,candidatepersonaldescription from tbljob,tblcandidate,tbljobapply where tbljobapply.applicationstatus='Approved' And tbljobapply.jobid=tbljob.jobid And tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.jobid=$_REQUEST[jobid]") or die(mysql_error());
					
					if(@mysql_num_rows($sql)>0)
					{
					while($row=@mysql_fetch_array($sql))
				{
	
	?>
						  <div class="col-md-3 col-md-4">
							<div class="thumbnail">
							  <img data-src="holder.js/200x200" alt="200x200" src="uploadedphotos/<?php echo $row['candidateimage']; ?>" style="display: block; max-width:50%">
							  <div class="caption">
								<h3><?php echo $row['candidatename']; ?></h3>
								<p><?php echo $row['candidatepersonaldescription']; ?></p>
								<a href="#" class="btn btn-primary" role="button" onClick="ApproveApplication(<?php echo $row['candidateid']; ?>,<?php echo $row['jobid']; ?>)">Accept</a>&nbsp;&nbsp;
								<input type="hidden" id="callfunction" name="callfunction" value="">

		<a href="#" class="btn btn-default" role="button" onClick="RejectApplication(<?php echo $row['candidateid']; ?>,<?php echo $row['jobid']; ?>)">Reject</a>&nbsp;&nbsp;
		<a href="candidate_Profile.php?candid=<?php echo $row['candidateid']; ?>" class="btn btn-primary">Detail</a>
								
							  </div>
							</div>
						  </div>
						  
				<?php }
				}
						else
						{?>
						
						<div class="style-msg successmsg" id="msgwait">
            <div class="sb-msg"><strong>No Any job Applications to Display.</strong></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
						
						<?php
						} ?>
				
				
				
				
				
				
				<!--<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
								<div class="modal-body">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel"><?php echo $row['candidatename']; ?></h4>
										</div>
										<div class="modal-body">
											<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
											<p>Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
											<p>Cras mattis consectetur purus sit amet fermentum. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Morbi leo risus, porta ac consectetur ac, vestibulum at eros.</p>
											<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor.</p>
											<p class="nobottommargin">Aenean lacinia bibendum nulla sed consectetur. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Donec sed odio dui. Donec ullamcorper nulla non metus auctor fringilla.</p>
										</div>
									</div>
								</div>
							</div>
						</div>-->
						

						

						</div>

						

						
						

					</div><!-- .postcontent end -->

					

				</div>

			</div>

		</section><!-- #content end -->

<script type="text/javascript" src="js/jquery.js"></script> 
  <script type="text/javascript" src="customjs/js_job.js"></script> 

<?php include('footer.php'); ?>