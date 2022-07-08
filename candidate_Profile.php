<?php
include_once("header.php");

if($_SESSION['LoggedUserRole']=='Candidate') 
{
	$candid=$_SESSION['LoggedUserId'];
}
else
{
	$candid=$_REQUEST['candid'];
}

$res=@mysql_query("select tblcandidate.*,tblcity.*,tblstate.*,tbldepartment.* from tblcandidate,tblcity,tblstate,tbldepartment where tblcandidate.cityid=tblcity.cityid And tblcandidate.stateid=tblstate.stateid And tblcandidate.departmentid=tbldepartment.departmentid And tblcandidate.candidateid=$candid") or die(mysql_error());
							$row=@mysql_fetch_assoc($res);
						
						
/*$res1=@mysql_query("select * from tblcandidategraduation,tblgraduationspecialization,tblcandidate,tbluniversity,tblgraduation where tblcandidategraduation.graduationid=tblgraduation.graduationid And tblcandidategraduation.gradspecid=tblgraduationspecialization.gradspecid And tblcandidategraduation.candidateid=tblcandidate.candidateid And tblcandidategraduation.universityid=tbluniversity.universityid And tblcandidategraduation.candidateid=$candid") or die(mysql_error());
							$row1=@mysql_fetch_assoc($res1);
				
$res2=@mysql_query("select * from tblcandidatepostgrad,tblpostgradspecialization,tblcandidate,tbluniversity,tblpostgraduation where tblcandidatepostgrad.postgraduationid=tblpostgraduation.postgraduationid And tblcandidatepostgrad.postspecid=tblpostgradspecialization.postspecid And tblcandidatepostgrad.candidateid=tblcandidate.candidateid And tblcandidatepostgrad.universityid=tbluniversity.universityid And tblcandidatepostgrad.candidateid=$candid") or die(mysql_error());
							$row2=@mysql_fetch_assoc($res2);*/			

?>

<section id="content">
  <div class="content-wrap">
    <div class="container clearfix">
      <div class="row clearfix">
        <div class="col-sm-9"> <img src="uploadedphotos/<?php echo $row['candidateimage']; ?>" class="alignleft img-circle img-thumbnail notopmargin nobottommargin" alt="Avatar" style="max-width: 120px;">
          <div class="heading-block noborder">
            <h3><?php echo $row['candidatename'] ?></h3>
            <span><?php echo $row['candidateenrollno'] ?></span>
            <h5><span><i class="icon-envelope2"></i>&nbsp;&nbsp;<?php echo $row['candidateemail'] ?></span> &nbsp;<i class="icon-map-marker"></i>&nbsp;&nbsp;<?php echo $row['cityname']; echo "," ?>&nbsp;<?php echo $row['statename']; ?>&nbsp;<br>
              <div class="tagcloud"><a href="#"><?php echo $row['candidateskills']; ?></a></div><br />
			  
            </h5>
			
          </div>
          <div class="clear"></div>
          <div class="row clearfix">
            <div class="col-md-12">
              <div class="tabs tabs-alt clearfix" id="tabs-profile">
                <ul class="tab-nav clearfix">
                  <li><a href="#tab-feeds"><i class="icon-person"></i> Personl Detail</a></li>
                  <li><a href="#tab-posts"><i class="icon-cap"></i> Educational Detail</a></li>
                  <!--<li><a href="#tab-replies"><i class="icon-reply"></i> Replies</a></li>
											<li><a href="#tab-connections"><i class="icon-users"></i> Connections</a></li>-->
                </ul>
                <div class="tab-container">
                  <div class="tab-content clearfix" id="tab-feeds">
                    <div class="panel panel-primary">
                      <div class="panel-heading" style="padding:25px 21px!important;">
                        <h3 class="panel-title col-md-11">Candidate Personal Details </h3>
                        <?php 
																if($_SESSION['LoggedUserRole']=='Candidate')
																{
																?>
                        <h3 class="panel-title"><a href="Candidate_EditProfile.php" title="Edit Personal detail"><i class="i-small icon-edit"></i>&nbsp;Edit</a></h3>
                        <?php
											} 
											?>
                      </div>
                      <div class="panel-body"> <br>
                        <b class="col-md-3">Department : </b> <?php echo $row['departmentname']; ?><br>
                        <b class="col-md-3">Enrollment No. : </b> <?php echo $row['candidateenrollno']; ?><br>
                        <div class="divider"> <i class="icon-circle"></i> </div>
                        <b class="col-md-3">Name : </b> <?php echo $row['candidatename']; ?><br>
                        <b class="col-md-3">Date Of Birth : </b><?php echo $row['candidatedob']; ?><br>
                        <b class="col-md-3">Languages Known : </b><?php echo $row['candidatelanguages']; ?>
                        <div class="divider"> <i class="icon-circle"></i> </div>
                        <div class="col-md-6"> &nbsp;&nbsp;&nbsp;<i class="icon-map-marker"></i>&nbsp; <?php echo $row['candidateadd']; ?><br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['cityname']; ?><br>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row['statename']; ?> </div>
                        <div class="col-md-6"> &nbsp;&nbsp;&nbsp;<i class="icon-phone3"></i>&nbsp;&nbsp; <?php echo $row['candidatephone1']; ?><br>
                          <br>
                          &nbsp;&nbsp;&nbsp;<i class="icon-mobile"></i>&nbsp;&nbsp; <?php echo $row['candidatephone1']; ?><br>
                        </div>
                        <div class="divider"> <i class="icon-circle"></i> </div>
                        <b class="col-md-3 col-last">Registartion Date : </b> <?php echo $row['candidateregdate']; ?><br>
                      </div>
                    </div>
                  </div>
                  <div class="tab-content clearfix" id="tab-posts">
                    <div class="clearfix col-lg-8"></div>
                    <div class="col-lg-4 col_last" align="right">
					 <?php 
																if($_SESSION['LoggedUserRole']=='Candidate')
																{
																?>
					<h5><a href="Candidate_registration2.php" title="Edit Educational Detail"><i class="i-small icon-edit"></i>&nbsp;Edit Educational Detail</a></h5>
					<?php } ?>
					
					</div>
					<div class="clearfix"></div>
                    <div class="fancy-title title-dotted-border">
                    <h4> <span>Graduation Details</span> </h4>
                  </div>
                  <div class="table-responsive col-lg-12">
                    <table id="tablegraduation" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Graduation</th>
                          <th>Specialization</th>
                          <th>University</th>
                          <th>Passing Year</th>
                          <th>Grade</th>
                          
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Graduation</th>
                          <th>Specialization</th>
                          <th>University</th>
                          <th>Passing Year</th>
                          <th>Grade</th>
                          
                        </tr>
                      </tfoot>
                      <tbody id="tablegraduationbody">
                      </tbody>
                    </table>
                  </div>
                  <div class="clearfix"></div>
                  <div class="fancy-title title-dotted-border">
                    <h4> <span>Post Graduation Details</span> </h4>
                  </div>
                  <div class="table-responsive col-lg-12">
                    <table id="tablepostgraduation" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Post Graduation</th>
                          <th>Specialization</th>
                          <th>University</th>
                          <th>Passing Year</th>
                          <th>Grade</th>
                         
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Graduation</th>
                          <th>Specialization</th>
                          <th>University</th>
                          <th>Passing Year</th>
                          <th>Grade</th>
                        
                        </tr>
                      </tfoot>
                      <tbody id="tablepostgraduationbody">
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="line visible-xs-block"></div>
      <div class="col-sm-3 clearfix">
        
        <div class="fancy-title topmargin title-border">
          <h4>About Me</h4>
        </div>
        <p><?php echo $row['candidatepersonaldescription'] ?></p>
		<b><a href="uploadedresumes/<?php echo $row['candidateresume']; ?>"><i class="icon-download"></i>&nbsp;&nbsp;Download Resume</a></b>
        <div class="fancy-title topmargin title-border">
          <h4>Social Profiles</h4>
        </div>
        <a href="<?php echo $row['facebook'] ?>" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook"> <i class="icon-facebook"></i> <i class="icon-facebook"></i> </a> <a href="<?php echo $row['googleplus'] ?>" class="social-icon si-gplus si-small si-rounded si-light" title="Google+"> <i class="icon-gplus"></i> <i class="icon-gplus"></i> </a> <a href="<?php echo $row['twitter'] ?>" class="social-icon si-twitter si-small si-rounded si-light" title="Twitter"> <i class="icon-twitter"></i> <i class="icon-twitter"></i> </a> </div>
    </div>
  </div>
  </div>
</section>
<!-- #content end -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="customjs/js_candreg2.js"></script>
<?php 
	$candid=$_SESSION["LoggedUserId"];
	if(isset($_REQUEST["candid"]))
	{
		$candid=$_REQUEST["candid"];
	}
?>
<script>
		$(document).ready(function() {
			refershpostgraduation(<?php echo $candid; ?>);
			refereshgraduation(<?php echo $candid; ?>);

		});
	</script>
<?php
include_once("footer.php");
?>
