// JavaScript Document
function refreshcandidate()
{
	$.ajax({
		url  : 'Controller/UserManagmentController.php',
		data : {callfunction:"GetAllCandidate"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tblcandidatebody').html(response);
				$('#tablecandidate').dataTable();
			  }
		});
}

function blockCandidate(candid)
{
	
		$.ajax({
			url  : 'Controller/UserManagmentController.php',
			data : {candid:candid,callfunction:"BlockCandidate"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refrescandidate();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	
}

function approveCandidate(candid)
{
	
		$.ajax({
			url  : 'Controller/UserManagmentController.php',
			data : {candid:candid,callfunction:"ApproveCandidate"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshcandidate();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	
}