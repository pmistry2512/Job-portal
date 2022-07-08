// JavaScript Document

function ApproveApplication(candid,jobid)
{
		if(confirm("Are You Sure Want to Select Candidate?"))
	{
		$.ajax({
			url  : 'Controller/TPOJobController.php',
			data : {candid:candid,jobid:jobid,callfunction:"ApproveApp"},
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

function RejectApplication(candid,jobid)
{
		if(confirm("Are You Sure Want to Reject Candidate?"))
	{
		$.ajax({
			url  : 'Controller/TPOJobController.php',
			data : {candid:candid,jobid:jobid,callfunction:"RejectApp"},
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