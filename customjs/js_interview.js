// JavaScript Document
// JavaScript Document
function refreshinterview()
{
	$.ajax({
		url  : 'Controller/InterviewController.php',
		data : {callfunction:"GetAllInterview"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			
				$('#tblinterviewbody').html(response);
				$('#tableinterview').dataTable();
			  }
		});
}

function deleteInterview(intid)
{
	if(confirm("Are You Sure Want to Delete This Interview Schedule?"))
	{
		$.ajax({
			url  : 'Controller/InterviewController.php',
			data : {intid:intid,callfunction:"DeleteInterview"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshinterview();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function markcomplete(intid)
{
	if(confirm("Are You Sure Want to mark as complete this interview?"))
	{
		$.ajax({
			url  : 'Controller/InterviewController.php',
			data : {intid:intid,callfunction:"MarkComplete"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshinterview();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewInterview()
{
	clearForm();
	$('#callfunction').val("AddInterview");
	$('#modalheading').html("Add Inteview");
}

function clearForm()
{
	$('#callfunction').val("");
	$('#modalheading').val("");
	$('#location').val("");
	$('#intdate').val("");
	$('#inttime').val("");
	$('#intid').val("");
}

function editInterview(intid)
{
	clearForm();
	$('#callfunction').val("EditInterview");
	$('#modalheading').html("Edit Interview");
	$('#editinterview').click();
	$.ajax({
		url  : 'Controller/InterviewController.php',
		data : {callfunction:"GetInterview",intid:intid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			var arr=response.split("@@");
			$('#intid').val(arr[0]);
			$('#job').val(arr[1]);		
			$('#location').val(arr[2]);		
			$('#intdate').val(arr[3]);		
			$('#inttime').val(arr[4]);		
			
		}
	});
}

$(document).ready(function(e) {
    $('#forminterview').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/InterviewController.php',
			data : $('#forminterview').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
				
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refreshinterview();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(8000);
					}
					else
					{
						$('.mfp-close').click();
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$( "#msgerr").fadeOut(8000);
					}
				  }
		});
		
	});		
});