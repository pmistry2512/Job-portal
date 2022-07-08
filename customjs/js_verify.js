// JavaScript Document

function candidateVerify(candid)
{
	
		$.ajax({
			url  : 'Controller/VerifyController.php',
			data : {candid:candid,callfunction:"CandidateVerify"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	
}

function companyVerify(candid)
{
	
		$.ajax({
			url  : 'Controller/VerifyController.php',
			data : {candid:candid,callfunction:"ComapnyVerify"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
						
					}
				  }
			});
	
}

$(document).ready(function(e) {
    $('#verification').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/VerifyController.php',
			data : $('#verification').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000,function(){
						window.location.href="Home_Candidate.php";
						});
					}
					else
					{
						
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$( "#msgerr").fadeOut(6000);
					}
				  }
		});
		
	});		
});

$(document).ready(function(e) {
    $('#verificationcompany').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/VerifyController.php',
			data : $('#verificationcompany').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000,function(){
						window.location.href="Home_Company.php";
						});
					}
					else
					{
						
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$( "#msgerr").fadeOut(6000);
					}
				  }
		});
		
	});		
});

