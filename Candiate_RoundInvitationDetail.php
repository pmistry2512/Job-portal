<?php include('header.php'); 
include("ValidCandidate.php");?>
<!-- Page Title
		============================================= -->
<section id="page-title">
  <div class="container clearfix">
    <?php
		$q=@mysql_query("select * from tbljob where jobid=$_REQUEST[id]")or die(mysql_error());
		$r=@mysql_fetch_assoc($q);
	 ?>
    <h1>Interview Rounds For job of <?php echo $r['jobname']; ?></h1>
    <span></span> </div>
</section>
<!-- #page-title end -->
<!-- Content============================================= -->
<section id="content">
<div class="content-wrap">
  <div class="container clearfix">
    <!-- Posts
					============================================= -->
    <?php 
		 	$res=@mysql_query("Select * from interviewround,tblinterviewcandidate,tblinterview,tbljob where tblinterview.jobid=tbljob.jobid And tblinterview.interviewid=interviewround.interviewid And tblinterview.jobid=$_REQUEST[id] And interviewround.roundstatus='Pending' And tblinterviewcandidate.interviewroundid=interviewround.interviewroundid and tblinterviewcandidate.candidateid=$_SESSION[LoggedUserId]") or die(mysql_error());
			
			while($job=@mysql_fetch_array($res))
			{
		  	?>
			<div class="owl-item active">
    <div class="ievent clearfix">
      
      <div class="entry-c">
        <div class="entry-title">
          <h3><?php echo $job['roundname']; ?></h3>
		   <ul class="entry-meta clearfix">
          <li> <span class="label label-info"><?php echo $job['roundstatus']; ?></span> </li>
          <li> <i class="icon-time"></i><?php echo $job['interviewtime']; ?></li>
          <li> <i class="icon-map-marker"></i><?php echo $job['interviewlocation']; ?> </li>
        </ul>
		<br>
		  <ul>
				<li><b>Total Marks :</b><?php echo $job['totalmarks']; ?></li>
				<li><b>Passing Marks :</b><?php echo $job['passingmark']; ?></li>
			</ul>
        </div>
	
      </div>
	  </div>
	  <br>
      <?php 
			}
			?>
    </div>
  </div>
  </section>
  <!-- #content end -->
  <?php include('footer.php'); ?>
