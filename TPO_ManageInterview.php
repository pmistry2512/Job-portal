<?php include("header.php");
include("ValidTPO.php"); ?>

<section id="page-title">
    <div class="container clearfix">
      <h1>Interview Schedules</h1>
      <span>Manage Interview schdules</span> </div>
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
				$sql=@mysql_query("select * from tblinterview,tblcompany,tbljob,tbldesignation where tbljob.designation=tbldesignation.designationid And tblinterview.jobid=tbljob.jobid And tbljob.companyid=tblcompany.companyid And tbljob.departmentid=$_SESSION[LoggedDeptId] And tblinterview.status='Applied'") or die (mysql_error());
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
										
										<h2>Interview Scheduled for job of <?php echo $row['jobname']; ?></h2>
										<h2><a href="#"><?php echo $row['companyname']; ?></a></h2>
									</div>
									<br>
									<h4>Designation : <?php echo $row['designationname']; ?></h4>
									<ul class="entry-meta clearfix">
										<li><a href="#"><i class="icon-calendar"></i>On &nbsp;<?php echo $row['interviewdate']; ?></a></li>
										<li><a href="#"><i class="icon-time"></i> <?php echo $row['interviewtime']; ?></a></li>
										<li><a href="#"><i class="icon-map-marker2"></i>At &nbsp;<?php echo $row['interviewlocation']; ?></a></li>
										
									</ul>
									<div class="entry-content">
										<a href="javascript:void(0);" onClick="ApproveSchedule(<?php echo $row['interviewid']; ?>)" class="btn btn-default">Approve</a>&nbsp;
										<a href="javascript:void(0);" onClick="RejectSchedule(<?php echo $row['interviewid']; ?>)" class="btn btn-danger">Reject</a>
									</div>
								</div>
							</div>
					
				<?php
				} 
				}
				else
				{?>
					<div class="style-msg successmsg" id="msgsuc" >
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;No Any Interview Scheduled From Company</div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
				<?php }
				?>
			
				</div>
				
			</div>
			
</section>
<script type="text/javascript" src="customjs/js_TPOInterview.js"></script>
<?php include("footer.php"); ?>