<?php
session_start();
include("config.php"); 
include("Mail.php");

/*Code for all user Login*/
if($_POST['functionname'] == "CheckLogin")
{
	
	$flag=0;
	$pass=base64_encode($_POST["pass"]);
	$res=@mysql_query("Select * From tbladmin Where adminemail='$_POST[email]' And adminpass='$pass'");
	if(mysql_num_rows($res)>0)
	{
		
		$row=@mysql_fetch_assoc($res);
		
			$_SESSION['LoggedUserName']=$row['adminname'];
			$_SESSION['LoggedUserId']=$row['adminid'];
			$_SESSION['LoggedDeptId']=$row['departmentid'];
			$_SESSION['LoggedUser']=$_POST['email'];
			if($row["issuperadmin"]==1)
			{
				$_SESSION['LoggedUserRole']="Admin";
			}
			else
			{
				$_SESSION['LoggedUserRole']="TPO";
			}
		
		$flag=1;
		
	}
	else
	{	
		$rese=@mysql_query("Select * From tblcompany Where companyemail='$_POST[email]' And companypass='$pass'");
		if(mysql_num_rows($rese)>0)
		{
			$row=@mysql_fetch_assoc($rese);
			if($row['status']=='Applied')
			{
				$flag=2;
			}
			else
			{
				$_SESSION['LoggedUserName']=$row['companyname'];
				$_SESSION['LoggedUserId']=$row['companyid'];
				$_SESSION['LoggedUser']=$_POST['email'];
				$_SESSION['LoggedUserRole']="Employer";
				$flag=1;
			}
			
		}
		else
		{	
			$resc=@mysql_query("Select * From tblcandidate Where candidateemail='$_POST[email]' And candidatepass='$pass'");	
			if(mysql_num_rows($resc)>0)
			{
				$rowc=@mysql_fetch_assoc($resc);
				if($rowc['candidatestatus']=='Panding')
		{
			
					$flag=2;
		}
		else
		{
				$_SESSION['LoggedUserName']=$rowc['candidatename'];
				$_SESSION['LoggedUserId']=$rowc['candidateid'];
				$_SESSION['LoggedUser']=$_POST['email'];
				$_SESSION['LoggedUserRole']="Candidate";
				$_SESSION['LoggedUserDepartment']=$rowc['departmentid'];
				$flag=1;
			}
				
			}
		}
	}


	if($flag==1)
	{
		echo json_encode(array("status"=>"success","msg"=>"Login Sucessful","userrole"=>$_SESSION['LoggedUserRole']));	
	}
	else if($flag==0)
	{
		$_SESSION['errormsg']="Emailid or passowrd is wrong";
		echo json_encode(array("status"=>"fail","msg"=>"Login Failed"));
	}
	else
	{
		$_SESSION['errormsg']="Registration not yet approved";
		echo json_encode(array("status"=>"notapprove","msg"=>"Your Account is Not yet Approved"));
	}
	
}


//Check Login Single
if($_POST['functionname'] == "CheckLoginSingle")
{
	if($_POST['g-recaptcha-response']==""){
			echo json_encode(array("status"=>"fail","msg"=>"Please Select Captcha"));
			return;
	}
	else{
				//your site secret key
				$secret = '6LdRXxoUAAAAAOCFI4jE9SvHDZbYpEEBXAyOXawg';
				//get verify response data
				$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
				$responseData = json_decode($verifyResponse);
				
				if($responseData->success){
						$flag=0;
						$pass=base64_encode($_POST["pass"]);
						$res=@mysql_query("Select * From tbladmin Where adminemail='$_POST[email]' And adminpass='$pass'");
						if(mysql_num_rows($res)>0)
						{
							$row=@mysql_fetch_assoc($res);
							$_SESSION['LoggedUserName']=$row['adminname'];
							$_SESSION['LoggedUserId']=$row['adminid'];
							$_SESSION['LoggedDeptId']=$row['departmentid'];
							$_SESSION['LoggedUser']=$_POST['email'];
							if($row["issuperadmin"]==1)
							{
								$_SESSION['LoggedUserRole']="Admin";
							}
							else
							{
								$_SESSION['LoggedUserRole']="TPO";
							}

							$flag=1;
							
						}
						else
						{	
							$rese=@mysql_query("Select * From tblcompany Where companyemail='$_POST[email]' And companypass='$pass'");
							if(mysql_num_rows($rese)>0)
							{
								$row=@mysql_fetch_assoc($rese);
								$_SESSION['LoggedUserName']=$row['companyname'];
								$_SESSION['LoggedUserId']=$row['companyid'];
								$_SESSION['LoggedUser']=$_POST['email'];
								$_SESSION['LoggedUserRole']="Employer";
								$flag=1;
								
							}
							else
							{	
								$resc=@mysql_query("Select * From tblcandidate Where candidateemail='$_POST[email]' And candidatepass='$pass'");	
								if(mysql_num_rows($resc)>0)
								{
									$rowc=@mysql_fetch_assoc($resc);
									$_SESSION['LoggedUserName']=$rowc['candidatename'];
									$_SESSION['LoggedUserId']=$rowc['candidateid'];
									$_SESSION['LoggedUser']=$_POST['email'];
									$_SESSION['LoggedUserRole']="Candidate";
									$_SESSION['LoggedUserDepartment']=$rowc['departmentid'];
									$flag=1;
									
								}
							}
						}
					
					
						if($flag==1)
						{
							echo json_encode(array("status"=>"success","msg"=>"Login Sucessful","userrole"=>$_SESSION['LoggedUserRole']));	
						}
						else
						{
							echo json_encode(array("status"=>"fail","msg"=>"Login Failed"));
						}

				}		
				else
				{
					echo json_encode(array("status"=>"fail","msg"=>"Invalid Captcha. PLease try again."));
				}
			}
	
	
}

/*Code for user forget Password*/
if($_POST['functionname'] == "forgetpass")
{
	$flag=0;
	$res=@mysql_query("Select * From tbladmin Where adminemail='$_POST[email]'");
	if(mysql_num_rows($res)>0)
	{
		$flag=1;	
		$row=@mysql_fetch_assoc($res);
		//echo "Your password is " . $row['adminpass']; exit;
		$pass=base64_decode($row["adminpass"]);
		$mail=new Mail();
		$result=$mail->SendMail($row['adminemail'],"Recover Password","<b>Your Password Is:</b>".$pass);
		
	}
					
	
	else
	{	
		$rese=@mysql_query("Select * From tblcompany Where companyemail='$_POST[email]'");
		if(mysql_num_rows($rese)>0)
		{
			$flag=1;
			$rowe=@mysql_fetch_assoc($rese);
			//echo "Your password is " . $row['adminpass'];
		$pass=base64_decode($rowe["companypass"]);
			$mail=new Mail();
			$result=$mail->SendMail($rowe['companyemail'],"Recover Password","<b>Your Password Is:</b>".$pass);
			
		}
		else
		{	
			$resc=@mysql_query("Select * From tblcandidate Where candidateemail='$_POST[email]'");	
			if(mysql_num_rows($resc)>0)
			{
				$flag=1;
				$rowc=@mysql_fetch_assoc($resc);
				//echo "Your password is " . $row['adminpass'];
		$pass=base64_decode($rowc["candidatepass"]);
				$mail=new Mail();
				$result=$mail->SendMail($rowc['candidateemail'],"Recover Password","<b>Your Password Is:</b>".$pass);
				
			}
		}
	}
	if($flag==1)
	{
		echo json_encode(array("status"=>"success","msg"=>"Login Sucessful"));	
	}
	else
	{
		echo json_encode(array("status"=>"fail","msg"=>"Login Failed"));
	}
	
}

/*Code for candidate change password*/
if($_POST['functionname'] == "candiadatechangepass")
{
	$oldpass=base64_encode($_POST["txtcpass"]);
	$res=@mysql_query("Select * From tblcandidate Where candidateemail='$_SESSION[LoggedUser]' And candidatepass='$oldpass'");
	if(@mysql_num_rows($res)>0)
	{
		$newpass=base64_encode($_POST["txtnpass"]);
		@mysql_query("update tblcandidate set candidatepass='$newpass' where candidateemail='$_SESSION[LoggedUser]'") or die(mysql_error());
		echo json_encode(array("status"=>"success","msg"=>"Password Changed Sucessfully"));
	}
	
	else
	{
		echo json_encode(array("status"=>"fail","msg"=>"Invalid Old Pasword"));
	}
	
}

/*Code for Company change password*/
if($_POST['functionname'] == "companychangepass")
{
	$oldpass=base64_encode($_POST["txtcpass"]);
	$res=@mysql_query("Select * From tblcompany Where companyemail='$_SESSION[LoggedUser]' And companypass='$cpass'");
	if(@mysql_num_rows($res)>0)
	{
		$newpass=base64_encode($_POST["txtnpass"]);
		@mysql_query("update tblcompany set companypass='$newpass' where companyemail='$_SESSION[LoggedUser]'") or die(mysql_error());
		echo json_encode(array("status"=>"success","msg"=>"Password Changed Sucessfully"));
	}
	else
	{
		echo json_encode(array("status"=>"fail","msg"=>"Invalid Old Pasword"));
	}
	
}

/*Code for Admin change password*/
if($_POST['functionname'] == "adminchangepass")
{
	$oldpass=base64_encode($_POST["oldpass"]);
	$res=@mysql_query("Select * From tbladmin Where adminemail='$_SESSION[LoggedUser]' And adminpass='$oldpass'");
	if(@mysql_num_rows($res)>0)
	{
		$newpass=base64_encode($_POST["txtnpass"]);
		@mysql_query("update tbladmin set adminpass='$newpass' where adminemail='$_SESSION[LoggedUser]'") or die(mysql_error());
		echo json_encode(array("status"=>"success","msg"=>"Password Changed Sucessfully"));
	}
	else
	{
		echo json_encode(array("status"=>"fail","msg"=>"Invalid Old Pasword"));
	}
	

	
}
?>


