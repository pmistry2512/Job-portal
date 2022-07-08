<?php
Session_start();
include("config.php"); 
include("Mail.php");
if($_POST['callfunction'] == "filterCandidate")
{
	$query="Select * from tblcandidate,tblcity,tbldepartment where tblcandidate.cityid=tblcity.cityid and tblcandidate.departmentid=tbldepartment.departmentid and tblcandidate.candidatestatus='Active'";
	$filter="";
	if($_POST["departmentname"]!="")
	{
		$filter.=" and departmentname In ($_POST[departmentname])";
	}
	
	if($_POST["gender"]!="")
	{
		$filter.=" and candidategender In ($_POST[gender])";
	}
	if($_POST["location"]!="")
	{
		$filter.=" and cityname In ($_POST[location])";
	}
	if($_POST["skills"]!="")
	{
		$filter.=" and (";
		$skills=explode(",",$_POST["skills"]);
		foreach($skills as $skl)
		{
			$filter.=" candidateskills Like '%$skl%' Or";
		}
		$filter=substr($filter,0,strlen($filter)-3).")";
		
	}
	$query=$query.$filter;
	$result=@mysql_query($query) or die(mysql_error());
	$str="";
	if(@mysql_num_rows($result)==0)
	{
		$str.='<div class="style-msg errormsg" id="msgerr">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;No Search Candidate Found...</div>
          </div>';
	}
	else
	{
		
		while($row=@mysql_fetch_array($result))
		{
						
				
				
				$str.='<div class="product sf-dress clearfix">
								<div class="product-image">
								<center><img src="uploadedphotos/'.$row["candidateimage"].'" alt="'.$row["candidatename"].'" style="!important display: block;width:150px; height:150px; align:center"></center>
									
									
									<div class="product-overlay">
										<a class="item-quick-view add-to-cart" data-toggle="modal" data-target="#jobModal" onclick="setDetails('.$row['candidateid'].')"><span>Invite</span></a>
										<input type="hidden" id="candid'.$row['candidateid'].'" name="candid'.$row['candidateid'].'" value="'.$row['candidateid'].'"/>
										<a class="item-quick-view" data-toggle="modal" data-target="#myModal" onClick="showdetail('.$row["candidateid"].')"><i class="icon-zoom-in2"></i><span>Detail</span></a>
									</div>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3>'.$row["candidatename"].'</h3></div>
									<div>'.$row["departmentname"].'</div>
									<div>'.$row["candidategender"].'</div>
									<div>'.$row["cityname"].'</div>
									<div class="product-price"><ins>'.$row["candidateskills"].'</ins></div>
									
									
								</div>
							</div>';
				
				
				
				
		}
		
	}
	
	echo $str;
	
}

if($_POST['callfunction']=="showdetail")
{
 	$str="";
	
	$sql=@mysql_query("select tblcandidate.*,tblcity.*,tblstate.* from tblcandidate,tblcity,tblstate where tblcandidate.cityid=tblcity.cityid And tblcandidate.stateid=tblstate.stateid And candidateid=$_POST[candid] And tblcandidate.candidatestatus='Active'") or die(mysql_error());
	
	$row=@mysql_fetch_assoc($sql);
	
	$str.='	
						<div class="modal-header">
						<b>'.$row["candidatename"].'</b>
						</div>
          				<div class="modal-body">
						<b>Candidate Name : </b>'.$row["candidatename"].'<br>
						<b>Languages Known : </b>'.$row["candidatelanguages"].'
						<br><br>
						<b>	Candidate Personal Description:</b><br>
						 <p> '.$row["candidatepersonaldescription"].'</p>
						 
						 <ul class="portfolio-meta bottommargin">
            <li><span><i class="icon-user"></i>Enrollment No :</span>'.$row['candidateenrollno'].'</li>
			 <li><span><i class="icon-map-marker"></i>Address :</span> '.$row['candidateadd'].','.$row['cityname'].','.$row['statename'].'</li>
            <li><span><i class="icon-book"></i>Skills :</span> '.$row['candidateskills'].'</li>
            <li><span><i class="icon-envelope"></i>Email :</span>'.$row['candidateemail'].'</li>
            <li><span><i class="icon-phone"></i>Contact No:</span>'.$row['candidatemobile'].' , '. $row['candidatephone1'].' </li>
			<b><a href="uploadedresumes/'.$row['candidateresume'].'"><i class="icon-download"></i>&nbsp;&nbsp;Download Resume</a></b>
        </ul>
		
		 <div class="si-share clearfix">
            <span>Social Profiles:</span>
            <div>
                <a href="'.$row['facebook'].'" class="social-icon si-borderless si-facebook">
                    <i class="icon-facebook"></i>
                    <i class="icon-facebook"></i>
                </a>
                <a href="'.$row['twitter'].'" class="social-icon si-borderless si-twitter">
                    <i class="icon-twitter"></i>
                    <i class="icon-twitter"></i>
                </a>
               
                <a href="'.$row['googleplus'].'" class="social-icon si-borderless si-gplus">
                    <i class="icon-gplus"></i>
                    <i class="icon-gplus"></i>
                </a>
               
                <a href="'.$row['candidateemail'].'" class="social-icon si-borderless si-email3">
                    <i class="icon-email3"></i>
                    <i class="icon-email3"></i>
                </a>
            </div>
        </div>
						 
						</div>
          				<div class="modal-footer">
                				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                				
              			</div>
			';
	
		echo $str;			
}


if($_POST['callfunction']=="InviteCandidate")
{

	$res=@mysql_query("Select * From tbljobinvite Where jobid=$_POST[jobid] and candidateid=$_POST[candid]");
			
	if(@mysql_num_rows($res)==0)
	{
	
	
	@mysql_query("insert into tbljobinvite (jobid,companyid,invitedate,candidateid,invitestatus) values($_POST[jobid],$_SESSION[LoggedUserId],curdate(),$_POST[candid],'Invited')") or die (mysql_error());
		$q=@mysql_query("select * from tblcandidate where candidateid=$_POST[candid]") or die (mysql_error());
		$r=@mysql_fetch_assoc($q);
		$mail=new Mail();
		$result=$mail->SendMail($r['candidateemail'],"Invitation For Job","You are invited for a job Plaese Login to your Account for more details");
		echo json_encode(array("status"=>"success","msg"=>"Candidate Invited Successfully"));
		
	}
	else
	{
		echo json_encode(array("status"=>"error","msg"=>"Candidate Already Invited for this Job"));
	}
		
		
		
}


if($_POST['callfunction'] == "InviteAll")
{
	$query="Select * from tblcandidate,tblcity,tbldepartment where tblcandidate.cityid=tblcity.cityid and tblcandidate.departmentid=tbldepartment.departmentid and tblcandidate.candidatestatus='Active'";
	$filter="";
	if($_POST["departmentname"]!="")
	{
		$filter.=" and departmentname In ($_POST[departmentname])";
	}
	
	if($_POST["gender"]!="")
	{
		$filter.=" and candidategender In ($_POST[gender])";
	}
	if($_POST["location"]!="")
	{
		$filter.=" and cityname In ($_POST[location])";
	}
	if($_POST["skills"]!="")
	{
		$filter.=" and (";
		$skills=explode(",",$_POST["skills"]);
		foreach($skills as $skl)
		{
			$filter.=" candidateskills Like '%$skl%' Or";
		}
		$filter=substr($filter,0,strlen($filter)-3).")";
		
	}
	$query=$query.$filter;
	$result=@mysql_query($query) or die(mysql_error());
	$str="";
	if(@mysql_num_rows($result)==0)
	{
		$str.='<div class="style-msg errormsg" id="msgerr">
            <div class="sb-msg"><i class="icon-remove"></i><strong>Error!</strong>&nbsp;&nbsp;No Search Candidate Found...</div>
          </div>';
	}
	else
	{
		
		while($row=@mysql_fetch_array($result))
		{
			$sql=@mysql_query("select * from tbljobinvite where jobid=$_POST[jobid] And candidateid=$row[candidateid]");
			if(@mysql_num_rows($sql)==0)
			{
			@mysql_query("insert into tbljobinvite (jobid,companyid,invitedate,candidateid,invitestatus) values($_POST[jobid],$_SESSION[LoggedUserId],curdate(),$row[candidateid],'Invited')") or die (mysql_error());
			
			
			}
			
		}
		echo json_encode(array("status"=>"success","msg"=>"Candidate Invited Successfully"));
		
	}
	
	echo $str;
	
}


?>
