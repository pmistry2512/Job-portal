// JavaScript Document
function ApproveSchedule(intid)
{
		if(confirm("Are You Sure Want to Approve this interview schedule?"))
	{
		$('#msgwait').show();
		$.ajax({
			url  : 'Controller/TPOInterviewController.php',
			data : {intid:intid,callfunction:"ApproveApp"},
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

function RejectSchedule(intid)
{
		if(confirm("Are You Sure Want to Reject Interview Schedule?"))
	{
		$('#msgwait').show();
		$.ajax({
			url  : 'Controller/TPOInterviewController.php',
			data : {intid:intid,callfunction:"RejectApp"},
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