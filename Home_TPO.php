<?php include('header.php');
include("ValidTPO.php");
 ?>
<?php $s=@mysql_query("select adminname from tbladmin where adminid=$_SESSION[LoggedUserId]");
					$admin=@mysql_fetch_assoc($s);
			 ?>

<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
    <center>
      <h3>Welcome <?php echo $admin['adminname']; ?></h3>
    </center>
    <ul class="testimonials-grid clearfix">
      <li>
        <div class="testimonial">
          <?php
				$res=@mysql_query("Select count(*) As candidate From tblcandidate where candidatestatus='Pending'") or die(mysql_error());
				$cntjob=@mysql_fetch_assoc($res); 
								
			 ?>
          <div class="testi-image">
            <div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="<?php echo $cntjob['candidate']; ?>" data-refresh-interval="50" data-speed="2000"></span></div>
          </div>
          <div class="testi-content">
            <h4>Registration Pending</h4>
            <p>Student's Registration status Pending from your department.</p>
          </div>
        </div>
      </li>
      <li>
        <div class="testimonial">
          <?php
				$res=@mysql_query("Select count(*) As cntjobapp,tblcandidate.* From tbljobapply,tblcandidate where tbljobapply.applicationstatus='Applied' And tbljobapply.candidateid=tblcandidate.candidateid And tblcandidate.departmentid=$_SESSION[LoggedDeptId] GROUP BY tbljobapply.candidateid") or die(mysql_error());
				$cntcompany=@mysql_fetch_assoc($res); 
				$cnt=@mysql_num_rows($res);				
			 ?>
          <div class="testi-image">
            <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="<?php echo $cnt; ?>" data-refresh-interval="50" data-speed="2500"></span></div>
          </div>
          <div class="testi-content">
            <h4>Student's Job Applications</h4>
            <p>Students Applied For Different Jobs.There Job Applications are Pending.</p>
          </div>
        </div>
      </li>
      <li>
        <div class="testimonial">
          <?php
				$res=@mysql_query("Select * From tblinterview,tbljob where tblinterview.jobid=tbljob.jobid And tbljob.departmentid=$_SESSION[LoggedDeptId] And status='Applied'") or die(mysql_error());
				$cntcompany=@mysql_num_rows($res); 
								
			 ?>
          <div class="testi-image">
            <div class="counter counter-large" style="color: #16a085;"><span data-from="0" data-to="<?php echo $cntcompany; ?>" data-refresh-interval="50" data-speed="3500"></span></div>
          </div>
          <div class="testi-content">
            <h4>Interview Scheduled</h4>
            <p>Interview Scheduled for different jobs.There status are Pending</p>
          </div>
        </div>
      </li>
      <li>
        <div class="testimonial">
          <?php
				$res=@mysql_query("Select tbljobinvite.*,tbljob.* From tbljobinvite,tbljob where tbljobinvite.invitestatus='Invited' And tbljobinvite.jobid=tbljob.jobid And tbljob.departmentid=$_SESSION[LoggedDeptId]") or die(mysql_error());
				$cntcompany=@mysql_num_rows($res); 
								
			 ?>
          <div class="testi-image">
            <div class="counter counter-large" style="color: #9b59b6;"><span data-from="0" data-to="<?php echo $cntcompany; ?>" data-refresh-interval="30" data-speed="2700"></span></div>
          </div>
          <div class="testi-content">
            <h4>Invitations Pending</h4>
            <p>Students Invited For different jobs.There invitation status are Pending</p>
          </div>
        </div>
      
      </li>
	   
      
	  
    </ul>
	
  </div>
  </div>
</section>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="customjs/js_informer.js"></script>
<script>
		$(document).ready(function() {
			sentinformermail();
		});
	</script>
<?php include('footer.php'); ?>
