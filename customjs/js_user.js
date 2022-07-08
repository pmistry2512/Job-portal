// JavaScript Document

//Login
$(document).ready(function(){
	$('#login').submit(function(e){
			e.preventDefault();
			var $form = $(this);
			
			if(! $form.valid()) return false;
			$.ajax({
			url  : 'Controller/UserController.php',
			data : $('#login').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					
					if(response.status == "success")
					{
											
						if(response.userrole=="Employer")
						{
							window.location.href="Home_Company.php";
						}
						else if(response.userrole=="Candidate")
						{
							window.location.href="Home_Candidate.php";
						}
						else if(response.userrole=="Admin")
						{
							window.location.href="Home_Admin.php";
						}
						else if(response.userrole=="TPO")
						{
							
							window.location.href="Home_TPO.php";
						}
						else
						{
							window.location.href="index.php"
						}
						
						//$("#output").html("<span style='color:green'>"+response.msg+"<span>");
					}
					else 
					{
						
						
						window.location.href="Login.php?showerror=true";

						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
				 	    $("#msgerr").fadeOut(6000);
						
						
					}
					
				  }
			});
			
		});						
});

//Login Single
$(document).ready(function(){
	$('#loginsingle').submit(function(e){
			e.preventDefault();
			var $form = $(this);
			
			
	if(! $form.valid()) return false;		
	$.ajax({
		url  : 'Controller/UserController.php',
		data : $('#loginsingle').serialize(),
		type : 'POST',
		dataType : 'json',
		success : function(response){
			
				
				  if(response.status == "success")
					{
						
						if(response.userrole=="Employer")
						{
							window.location.href="Home_Company.php";
						}
						else if(response.userrole=="Candidate")
						{
							window.location.href="Home_Candidate.php";
						}
						else if(response.userrole=="Admin")
						{
							window.location.href="Home_Admin.php";
						}
						else if(response.href=="TPO")
						{
							window.location.href="Home_TPO.php";
						}
						else
						{
							window.location.href="index.php"
						}
				}
				else
				{
					$('#errmsg').html(response.msg);
				  $('#msgerr').show();
				  $("#msgerr").fadeOut(6000);
				}
				
			  }
		   });
		});
	});

//Forget Password
$(document).ready(function(){
						  
	$('#forgetpassfrm').submit(function(e){
										
			e.preventDefault();
			var $form = $(this);
	if(! $form.valid()) return false;		
	$.ajax({
		url  : 'Controller/UserController.php',
		data : $('#forgetpassfrm').serialize(),
		type : 'POST',
		dataType : 'json',
		success : function(response){
				if(response.status == "success")
				{
				  $('#mgsuc').show();
				  $('#mgsuc').fadeOut( 10000, function() {
					$('.mfp-close').click();
				  });
				}
				else
				{
				  $('#mgerr').show();
				  $('#mgerr').fadeOut(10000);
				}
			  }
		   });
		});
	});


//Company Registration
$(document).ready(function(){
	$('#companyreg').submit(function(e){
			e.preventDefault();
			if($('#txtpass').val()!=$('#txtrepass').val())
			{
				$("html, body").animate({ scrollTop: 0 });
				$('#msgerr').show();
				$('#errortext').html("Password do not match");
				$('#msgerr').fadeOut(8000);
				return;
			}
			var $form = $(this);
			
			if(! $form.valid()) return false;
			
			
			
		});						
});

//Candidate Registration-1
$(document).ready(function(){
	$('#candidatereg').submit(function(e){
			e.preventDefault();
			
			if($('#txtpass').val()!=$('#txtrepass').val())
			{
				$("html, body").animate({ scrollTop: 0 });
				$('#msgerr').show();
				$('#errortext').html("Password do not match");
				$('#msgerr').fadeOut(8000);
				return;
			}
			var $form = $(this);
			
			if(! $form.valid()) return false;
		});						
});


//Candidate Registration-2
$(document).ready(function(){
	$('#candidatereg2').submit(function(e){
			e.preventDefault();
			var $form = $(this);
			
			if(! $form.valid()) return false;
			var filename=$('.file-caption-name').attr("title");
			$.ajax({
			url  : 'Controller/UserController.php',
			data : $('#candidatereg2').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						window.location.href="candidate_registration3.php";
						//$("#output").html("<span style='color:green'>"+response.msg+"<span>");
					}
					else
					{
						window.location.href="Login.php?showerror=true";
						//$("#output").html("<span style='color:red'>"+response.msg+"<span>");
					}
				  }
			});
			
		});						
});

//Candidate Registration-3
$(document).ready(function(){
	$('#candidatereg3').submit(function(e){
			e.preventDefault();
			
		});						
});


//Candidate Change Password
$(document).ready(function(){
						  
	$('#candchangepass').submit(function(e){
										
			e.preventDefault();
			var $form = $(this);
	if(! $form.valid()) return false;		
	$.ajax({
		url  : 'Controller/UserController.php',
		data : $('#candchangepass').serialize(),
		type : 'POST',
		dataType : 'json',
		success : function(response){
				if(response.status == "success")
				{
				  $('#msgsucc').show();
				  $('#msgsucc').fadeOut( 10000);
				}
				else
				{
				  $('#msgerr').show();
				  $('#msgerr').fadeOut(10000);
				}
			  }
		   });
		});
	});

//Company Change Password
$(document).ready(function(){
						  
	$('#compchangepass').submit(function(e){
										
	e.preventDefault();
	var $form = $(this);
	if(! $form.valid()) return false;		
	$.ajax({
		url  : 'Controller/UserController.php',
		data : $('#compchangepass').serialize(),
		type : 'POST',
		dataType : 'json',
		success : function(response){
				if(response.status == "success")
				{
				  $('#msgsucc').show();
				  $('#msgsucc').fadeOut( 10000);
				}
				else
				{
				  $('#msgerr').show();
				  $('#msgerr').fadeOut(10000);
				}
			  }
		   });
		});
	});

//Admin Change Password
$(document).ready(function(){
						  
	$('#adminchangepass').submit(function(e){
										
	e.preventDefault();
	var $form = $(this);
	if(! $form.valid()) return false;		
	$.ajax({
		url  : 'Controller/UserController.php',
		data : $('#adminchangepass').serialize(),
		type : 'POST',
		dataType : 'json',
		success : function(response){
				if(response.status == "success")
				{
				  $('#msgsucc').show();
				  $('#msgsucc').fadeOut( 10000);
				}
				else
				{
				  $('#msgerr').show();
				  $('#msgerr').fadeOut(10000);
				}
			  }
		   });
		});
	});

