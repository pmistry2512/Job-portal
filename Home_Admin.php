<?php include('header.php');
include("ValidAdmin.php");
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
				$res=@mysql_query("Select count(*) As cntjob From tbljob where jobstatus='Active'") or die(mysql_error());
				$cntjob=@mysql_fetch_assoc($res); 
								
			 ?>
          <div class="testi-image">
            <div class="counter counter-large" style="color: #3498db;"><span data-from="0" data-to="<?php echo $cntjob['cntjob']; ?>" data-refresh-interval="50" data-speed="2000"></span></div>
          </div>
          <div class="testi-content">
            <h4>Active Jobs</h4>
            <p>Jobs posted by registered companies in different departments.All these Jobs are currently active.</p>
          </div>
        </div>
      </li>
      <li>
        <div class="testimonial">
          <?php
				$res=@mysql_query("Select count(*) As cntcompany From tblcompany where status='Active'") or die(mysql_error());
				$cntcompany=@mysql_fetch_assoc($res); 
								
			 ?>
          <div class="testi-image">
            <div class="counter counter-large" style="color: #e74c3c;"><span data-from="0" data-to="<?php echo $cntcompany['cntcompany']; ?>" data-refresh-interval="50" data-speed="2500"></span></div>
          </div>
          <div class="testi-content">
            <h4>Company Registered</h4>
            <p>Companies are registered with placement portal. All these companies are active. </p>
          </div>
        </div>
      </li>
      <li>
        <div class="testimonial">
          <?php
				$res=@mysql_query("Select count(*) As cntcompany From tbljobapply where applicationstatus='Approved'") or die(mysql_error());
				$cntcompany=@mysql_fetch_assoc($res); 
								
			 ?>
          <div class="testi-image">
            <div class="counter counter-large" style="color: #16a085;"><span data-from="0" data-to="<?php echo $cntcompany['cntcompany']; ?>" data-refresh-interval="50" data-speed="3500"></span></div>
          </div>
          <div class="testi-content">
            <h4>Job Applications</h4>
            <p>Total job applications arrived through candidate</p>
          </div>
        </div>
      </li>
      <li>
        <div class="testimonial">
          <?php
				$res=@mysql_query("Select count(*) As cntcompany From tbljobapply where applicationstatus='Hired'") or die(mysql_error());
				$cntcompany=@mysql_fetch_assoc($res); 
								
			 ?>
          <div class="testi-image">
            <div class="counter counter-large" style="color: #9b59b6;"><span data-from="0" data-to="<?php echo $cntcompany['cntcompany']; ?>" data-refresh-interval="30" data-speed="2700"></span></div>
          </div>
          <div class="testi-content">
            <h4>Students Hired</h4>
            <p>Students Hired for Job through this placement portal.</p>
          </div>
        </div>
      
      </li>
	   <li style="width:1050px !important;">
        <div class="testimonial" align="center">
          <?php
				$res=@mysql_query("Select MAX(salarypackage) as salarypackage from tbljobapply where applicationstatus='Hired'") or die(mysql_error());
				$cntjob=@mysql_fetch_assoc($res); 
								
			 ?>
          <div class="testi-image">
		  <br />
            <div class="counter counter-small" style="color: #3498db; font-size:25px !important; text-align:right !important; width:300px !important;"><span data-from="0" data-to="<?php echo $cntjob['salarypackage']; ?>" data-refresh-interval="50" data-speed="2000"></span></div>
          </div>
          <div class="testi-content">
            <h4>Highest Package</h4>
            <p>Student Hired With Salary package from College, Through the portal.</p>
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
