// JavaScript Document
function refreshcompany()
{
	$.ajax({
		url  : 'Controller/UserManagmentController.php',
		data : {callfunction:"GetAllCompany"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tblcompanybody').html(response);
				$('#tablecompany').dataTable();
			  }
		});
}

function blockCompany(candid)
{
	$('#msgwait').show();
		$.ajax({
			url  : 'Controller/UserManagmentController.php',
			data : {candid:candid,callfunction:"BlockCompany"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$('#msgwait').hide();
						refreshcompany();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	
}

function approveCompany(candid)
{
		$('#msgwait').show();
		$.ajax({
			url  : 'Controller/UserManagmentController.php',
			data : {candid:candid,callfunction:"ApproveCompany"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$('#msgwait').hide();
						refreshcompany();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	
}