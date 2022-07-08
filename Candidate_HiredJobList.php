<?php include("header.php");
include("ValidCandidate.php"); ?>

<section id="page-title">
    <div class="container clearfix">
      <h1>Hired for Jobs</h1>
      <span>List of jobs in wich you are hired</span> </div>
</section>


<section id="content">

			<div class="content-wrap">

				<div class="container clearfix">
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
				<?php 
				$sql=@mysql_query("Select * from tbljobapply,tbljob,tblcompany,tbldesignation where  tbljob.companyid=tblcompany.companyid And tbljobapply.jobid=tbljob.jobid And tbljobapply.candidateid=$_SESSION[LoggedUserId] And tbljobapply.applicationstatus='Hired' And tbljob.designation=tbldesignation.designationid") or die (mysql_error());
				if(@mysql_num_rows($sql)>0)
				{
				while($row=@mysql_fetch_array($sql))
				{
				?>
				
				<div class="ievent clearfix">
								<div class="entry-image">
									
										<img src="uploadedphotos/<?php echo $row['companylogo']; ?>" style="height:200px !important; width:200px !important;" alt="Inventore voluptates velit totam ipsa">
										
									
								</div>
								<div class="entry-c">
									<div class="entry-title">
										
										<h2>You Are Hired for job of <?php echo $row['jobname']; ?></h2>
										<h2><a href="#"><?php echo $row['companyname']; ?></a></h2>
									</div>
									<br>
									<h4>Designation : <?php echo $row['designationname']; ?></h4>
									<ul class="entry-meta clearfix">
										<li><a href="#"><i class="icon-calendar"></i>&nbsp;<?php echo $row['hireddate']; ?></a></li>
										<li><a href="#"><i class="icon-money"></i> <?php echo $row['salarypackage']; ?> Per Month</a></li>
										<li><a href="#"><i class="icon-map-marker2"></i>At &nbsp;<?php echo $row['joblocation']; ?></a></li>
										
									</ul>
									<div class="entry-content">
										<a href="javascript:void(0);" onClick="acceptjob(<?php echo $row['jobapplyid']; ?>)" class="btn btn-default">Accept Job</a>&nbsp;
										<a href="javascript:void(0);" onClick="rejectjob(<?php echo $row['jobapplyid']; ?>)" class="btn btn-danger">Reject Job</a>
									</div>
								</div>
							</div>
					
				<?php
				} 
				}
				else
				{?>
					<div class="style-msg successmsg" id="msgsuc" >
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;You Are not hired for any jobs yet</div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
				<?php }
				?>
			
				</div>
				
			</div>
			
</section>
<script type="text/javascript" src="customjs/js_candidatehired.js"></script>
<?php include("footer.php"); ?>