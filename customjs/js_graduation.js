// JavaScript Document
function refreshgraduation()
{
	$.ajax({
		url  : 'Controller/GraduationController.php',
		data : {callfunction:"GetAllGraduation"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tblgraduationbody').html(response);
				$('#tablegraduation').dataTable();
			  }
		});
}

function deleteGraduation(gradid)
{
	if(confirm("Are You Sure Want to Delete This Graduation?"))
	{
		$.ajax({
			url  : 'Controller/GraduationController.php',
			data : {gradid:gradid,callfunction:"DeleteGraduation"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshgraduation();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewGraduation()
{
	clearForm();
	$('#callfunction').val("AddGraduation");
	$('#modalheading').html("Add Graduation");
}

function clearForm()
{
	$('#callfunction').val("");
	$('#modalheading').val("");
	$('#gradname').val("");
	$('#gradid').val("");
}

function editGraduation(gradid)
{
	clearForm();
	$('#callfunction').val("EditGraduation");
	$('#modalheading').html("Edit Graduation");
	$('#editgraduation').click();
	$.ajax({
		url  : 'Controller/GraduationController.php',
		data : {callfunction:"GetGraduation",gradid:gradid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			var arr=response.split("@@");
			$('#gradid').val(arr[0]);
			$('#gradname').val(arr[1]);		
		}
	});
}

$(document).ready(function(e) {
    $('#formgraduation').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/GraduationController.php',
			data : $('#formgraduation').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refreshgraduation();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
					else
					{
						$('.mfp-close').click();
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$( "#msgerr").fadeOut(6000);
					}
				  }
		});
		
	});		
});