// JavaScript Document

function checkCompany(id)
{
	$.ajax({
		  
		url  : 'Controller/JobByCompanyController.php',
		data : {callfunction:"JobByCompany",id:id},
		type : 'POST',
		dataType : 'html',
		success : function(response){

			$('#shop').html(response);

		}
	});
}

function checkDesignation(id)
{
	$.ajax({
		  
		url  : 'Controller/JobByCompanyController.php',
		data : {callfunction:"JobByDesignation",id:id},
		type : 'POST',
		dataType : 'html',
		success : function(response){

			$('#shop').html(response);

		}
	});
}

function checkLocation(id)
{
	$.ajax({
		  
		url  : 'Controller/JobByCompanyController.php',
		data : {callfunction:"JobByLocation",id:id},
		type : 'POST',
		dataType : 'html',
		success : function(response){

			$('#shop').html(response);

		}
	});
}

function checkIndustry(id)
{
	$.ajax({
		  
		url  : 'Controller/JobByCompanyController.php',
		data : {callfunction:"JobByIndustry",id:id},
		type : 'POST',
		dataType : 'html',
		success : function(response){

			$('#shop').html(response);

		}
	});
}

function applyforjob(jobid)
{
	$.ajax({
		  
		url  : 'Controller/JobByCompanyController.php',
		data : {callfunction:"ApplyForJob",jobid:jobid},
		type : 'POST',
		dataType : 'json',
		success : function(response){
					if(response.status == "success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
					else
					{
						
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$( "#msgerr").fadeOut(6000);
					}
				  }
	});
}

function ApplyByCompany(jobid)
{
	$.ajax({
		  
		url  : 'Controller/JobByCompanyController.php',
		data : {callfunction:"ApplyByCompany",jobid:jobid},
		type : 'POST',
		dataType : 'json',
		success : function(response){
					if(response.status == "success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
					else
					{
						
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$( "#msgerr").fadeOut(6000);
					}
				  }
	});
}

function ApplyByDesignation(jobid)
{
	$.ajax({
		  
		url  : 'Controller/JobByCompanyController.php',
		data : {callfunction:"ApplyByDesignation",jobid:jobid},
		type : 'POST',
		dataType : 'json',
		success : function(response){
					if(response.status == "success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
					else
					{
						
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$( "#msgerr").fadeOut(6000);
					}
				  }
	});
}

function ApplyByIndustry(jobid)
{
	$.ajax({
		  
		url  : 'Controller/JobByCompanyController.php',
		data : {callfunction:"ApplyByIndustry",jobid:jobid},
		type : 'POST',
		dataType : 'json',
		success : function(response){
					if(response.status == "success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
					else
					{
						
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$( "#msgerr").fadeOut(6000);
					}
				  }
	});
}

function ApplyByLocation(jobid)
{
	$.ajax({
		  
		url  : 'Controller/JobByCompanyController.php',
		data : {callfunction:"ApplyByLocation",jobid:jobid},
		type : 'POST',
		dataType : 'json',
		success : function(response){
					if(response.status == "success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
					else
					{
						
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$( "#msgerr").fadeOut(6000);
					}
				  }
	});
}
