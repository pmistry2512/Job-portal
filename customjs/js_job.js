// JavaScript Document
$(document).ready(function() {
	$('#searchform').submit(function(e){
		e.preventDefault();
		var $form = $(this);

		// check if the input is valid
		if(! $form.valid()) return false;
		$.ajax({
			type:'POST',
			url: 'Controller/JobController.php',
		    data:$('#searchform').serialize(),
			dataType : 'html',
			success: function(data){
				$('#data').html(data);
			}
		}); 
	});
});

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


function deleteJob(jobid)
{
	if(confirm("Are You Sure Want to Delete This Job?"))
	{
		$.ajax({
			url  : 'Controller/JobController.php',
			data : {jobid:jobid,callfunction:"DeleteJob"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						location.reload();
						$( "#msgsuc").fadeOut(6000);
						 
					}
				  }
			});
	}
}

function fillJob(jobid)
{
	if(confirm("Are You Sure Want to Mark as Filled This Job?"))
	{
		$.ajax({
			url  : 'Controller/JobController.php',
			data : {jobid:jobid,callfunction:"FillJob"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{	
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						location.reload(); 
						$( "#msgsuc").fadeOut(6000);
						
					}
				  }
			});
	}
}


function LoadJob(status)
{

		$.ajax({
			url  : 'Controller/JobController.php',
			data : {callfunction:"DisplayJobs",status:status},
			type : 'POST',
			dataType : 'html',
			success : function(response){
				
					$('#portfolio').html(response);
					$('#msglbljob').html(status);
					$('#lbljob').show();
					
				  }
			});
	
}

function ApproveApplication(candid,jobid)
{
		if(confirm("Are You Sure Want to Select Candidate?"))
	{
		$('#msgwait').show();
		$.ajax({
			url  : 'Controller/JobController.php',
			data : {candid:candid,jobid:jobid,callfunction:"ApproveApp"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{	
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$('#msgwait').hide();
						location.reload(); 
						$( "#msgsuc").fadeOut(6000);
						
					}
				  }
			});
	}
}

function RejectApplication(candid,jobid)
{
		if(confirm("Are You Sure Want to Reject Candidate?"))
	{
		$('#msgwait').show();

		$.ajax({
			url  : 'Controller/JobController.php',
			data : {candid:candid,jobid:jobid,callfunction:"RejectApp"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{	
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$('#msgwait').hide();

						location.reload(); 
						$( "#msgsuc").fadeOut(6000);
						
					}
				  }
			});
	}
}




