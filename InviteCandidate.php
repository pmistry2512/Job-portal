<?php include('header.php');
include("ValidCompany.php");?>
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
	  				
        <!-- Post Content
					============================================= -->
        <div class="postcontent nobottommargin col_last">
		
          <!-- Shop
						============================================= -->

          <div id="shop" class="shop product-3 clearfix">

		  
           
          </div>
          <!-- #shop end -->
        </div>
        <!-- .postcontent end -->
        <!-- Sidebar
					============================================= -->
        <div class="sidebar nobottommargin">
          <div class="sidebar-widgets-wrap">
            <div class="widget">
			<a class="button" data-toggle="modal" data-target="#invitejobModal"><span>Invite All Candidate</span></a>
			<br />
			<br />
              <h4>Select Department</h4>
              <ul class="custom-filter" data-container="#shop" style="list-style-type:none;">
                <!--<li style="list-style-type:none;">
                                        <input type="checkbox" onClick="checkDept(0,'All')" name="chk0" value="All" >                                         &nbsp;All
                                    </li>-->
                <?php
									$qry="Select * From tbldepartment Where departmentid In(Select departmentid from tblcandidate)";
									$cnt=1;
									$resdept=@mysql_query($qry) or die(mysql_error());
									while($rowdept=@mysql_fetch_array($resdept))
									{
									?>
                <li style="list-style-type:none;">
                  <input type="checkbox" onClick="checkDept(<?php echo $cnt;?>,'<?php echo $rowdept["departmentname"];?>')" name="chkdept<?php echo $cnt;?>" value="<?php echo $rowdept["departmentid"];?>" >
                  &nbsp;<?php echo $rowdept["departmentname"];?> </li>
                <?php	
									$cnt++;
									}
									?>
              </ul>
            </div>
            <div class="widget">
              <h4>Select Skill</h4>
              <ul class="custom-filter" data-container="#shop" style="list-style-type:none;">
                <!--<li style="list-style-type:none;">
                                        <input type="checkbox" onClick="checkDept(0,'All')" name="chk0" value="All" >                                         &nbsp;All
                                    </li>-->
                <?php
					$qry="Select * From tblcandidate";
					$cnt=0;
					$skillarray=array();
					$resskill=@mysql_query($qry) or die(mysql_error());
					while($rowskill=@mysql_fetch_array($resskill))
					{
						$skill=$rowskill["candidateskills"];
						$skill=explode(",",$skill);
						foreach($skill as $skl)
						{
							if(!in_array($skl,$skillarray))
							{
								$skillarray[$cnt++]=$skl;
							}
						}
					}
					$cnt=1;
					foreach($skillarray as $skill)
					{
					?>
                <li style="list-style-type:none;">
                  <input type="checkbox" onClick="checkSkill(<?php echo $cnt;?>,'<?php echo $skill;?>')" name="chkskill<?php echo $cnt;?>" value="<?php echo $skill;?>" >
                  &nbsp;<?php echo $skill;?> </li>
                <?php
					$cnt++;
					}
					?>
              </ul>
            </div>
            <div class="widget">
              <h4>Select Location</h4>
              <ul class="custom-filter" data-container="#shop" style="list-style-type:none;">
                <!--<li style="list-style-type:none;">
                                        <input type="checkbox" onClick="checkDept(0,'All')" name="chk0" value="All" >                                         &nbsp;All
                                    </li>-->
                <?php
					$qry="Select * From tbljob";
					$cnt=0;
					$locationarray=array();
					$resloc=@mysql_query($qry) or die(mysql_error());
					while($rowloc=@mysql_fetch_array($resloc))
					{
						$locs=$rowloc["joblocation"];
						$locs=explode(",",$locs);
						foreach($locs as $loc)
						{
							if(!in_array($loc,$locationarray))
							{
								$locationarray[$cnt++]=$loc;
							}
						}
					}
					$cnt=1;
					foreach($locationarray as $loc)
					{
					?>
                <li style="list-style-type:none;">
                  <input type="checkbox" onClick="checkLocation(<?php echo $cnt;?>,'<?php echo $loc;?>')" name="chklocation<?php echo $cnt;?>" value="<?php echo $loc;?>" >
                  &nbsp;<?php echo $loc;?> </li>
                <?php
					$cnt++;
					}
					?>
              </ul>
            </div>
            <div class="widget">
              <h4>Select Gender</h4>
              <ul class="custom-filter" data-container="#shop" style="list-style-type:none;">
                <!--<li style="list-style-type:none;">
                                        <input type="checkbox" onClick="checkDept(0,'All')" name="chk0" value="All" >                                         &nbsp;All
                                    </li>-->
                <li style="list-style-type:none;">
                  <input type="checkbox" onClick="checkGender(1,'Male')" name="chkgender1" value="Male" >
                  &nbsp;Male </li>
                <li style="list-style-type:none;">
                  <input type="checkbox" onClick="checkGender(2,'Female')" name="chkgender2" value="Female" >
                  &nbsp;Female </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- .sidebar end -->
      </div>
    </div>
    <!--<a href="#myModal" data-lightbox="inline" class="fright" id="modl"></a>-->

	</section>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog">
      <div class="modal-body">
        <div class="modal-content" id="modlcontent"> 
		</div>
      </div>
    </div>
  </div>
  
  
  <!-- Job Modal -->
  <div class="modal subscribe-widget" id="jobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog">
      <div class="modal-body">
        <div class="modal-content"> 
		<form class="widget-subscribe-form2" method="post"  name="formjob" id="formjob">
        <input type="hidden" id="callfunction" name="callfunction" value="">
        <input type="hidden" id="scandid" name="scandid" value="">
		<div class="modal-header">
			
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="closeme">×</button>
			<h4 class="modal-title" id="myModalLabel">Select Job to Invite</h4>
		</div>
		<div class="modal-body"> 

	<div class="style-msg successmsg" id="msgsuc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;<span id="msgsuctext"></span></div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
			
			<select class="sm-form-control" id="drpjob" name="drpjob" >
  													<?php
														$sql=@mysql_query("Select * From tbljob where delstatus='N' And jobstatus='Active' And companyid=$_SESSION[LoggedUserId]") or die(mysql_error());
														while($r=@mysql_fetch_array($sql))
														{
													?>
																<option value="<?php echo $r['jobid'];?>"><?php echo $r['jobname'];?></option>
													<?php
															}
													?>
			</select>

        <br>
        <button class="button button-rounded button-border button-dark noleftmargin" type="button" style="margin-top:15px;" id="btsubmit" name="btsubmit" onClick="inviteCandidate()" >Send Invite</button>
		</div>
      </form>

		</div>
      </div>
    </div>
  </div>
  
  
  
  <!-- Job Modal End -->
  
  <!-- Invite All Job Modal -->
  <div class="modal subscribe-widget" id="invitejobModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" >
    <div class="modal-dialog">
      <div class="modal-body">
        <div class="modal-content"> 
		<form class="widget-subscribe-form2" method="post"  name="formalljob" id="formalljob">
        <input type="hidden" id="callfunction" name="callfunction" value="">
        <input type="hidden" id="scandid" name="scandid" value="">
		<div class="modal-header">
			
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="closemeall">×</button>
			<h4 class="modal-title" id="myModalLabel">Select Job to Invite</h4>
		</div>
		<div class="modal-body"> 

	<div class="style-msg successmsg" id="msgsucc" style="display:none;">
            <div class="sb-msg"><i class="icon-thumbs-up"></i><strong>Success!</strong>&nbsp;&nbsp;Candidate Invited Sucessfully</div>
            <!--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>--> 
          </div>
          <div class="style-msg errormsg" id="msgerr" style="display:none;">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;<span id="msgerrtext"></span></div>
          </div>
			
			<select class="sm-form-control" id="drpinvitejob" name="drpinvitejob" >
  													<?php
														$sql=@mysql_query("Select * From tbljob where delstatus='N' And jobstatus='Active' And companyid=$_SESSION[LoggedUserId]") or die(mysql_error());
														while($r=@mysql_fetch_array($sql))
														{
													?>
																<option value="<?php echo $r['jobid'];?>"><?php echo $r['jobname'];?></option>
													<?php
															}
													?>
			</select>

        <br>
        <button class="button button-rounded button-border button-dark noleftmargin" type="button" style="margin-top:15px;" id="btsubmit" name="btsubmit" onClick="inviteall()" >Send Invite</button>
		</div>
      </form>

		</div>
      </div>
    </div>
  </div>
  
  <!-- #content end -->
  <?php include('footer.php'); ?>
<script type="text/javascript" src="customjs/js_invitecandidate.js"></script>
