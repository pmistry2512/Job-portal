// JavaScript Document
function acceptjob(jobapplyid)
{
		if(confirm("Are You Sure Want to Accept this Job?"))
	{
		$('#msgwait').show();
		$.ajax({
			url  : 'Controller/CandidateHiredJobController.php',
			data : {jobapplyid:jobapplyid,callfunction:"AcceptJob"},
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

function rejectjob(jobapplyid)
{
		if(confirm("Are You Sure Want to Reject this job?"))
	{
		$('#msgwait').show();
		$.ajax({
			url  : 'Controller/CandidateHiredJobController.php',
			data : {jobapplyid:jobapplyid,callfunction:"RejectJob"},
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