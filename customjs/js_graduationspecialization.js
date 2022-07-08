// JavaScript Document
function refreshgraduationspecialization()
{
	$.ajax({
		url  : 'Controller/GraduationspecializationController.php',
		data : {callfunction:"GetAllGraduationspecialization"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tblgraduationspecializationbody').html(response);
				$('#tablegraduationspecialization').dataTable();
			  }
		});
}

function deleteGraduationspecialization(gradspid)
{
	if(confirm("Are You Sure Want to Delete This Graduationspecialization?"))
	{
		$.ajax({
			url  : 'Controller/GraduationspecializationController.php',
			data : {gradspid:gradspid,callfunction:"DeleteGraduationspecialization"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshgraduationspecialization();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewGraduationspecialization()
{
	clearForm();
	$('#callfunction').val("AddGraduationspecialization");
	$('#modalheading').html("Add Graduationspecialization");
}

function clearForm()
{
	$('#callfunction').val("");
	$('#modalheading').val("");
	$('#gradspname').val("");
	$('#gradspid').val("");
}

function editGraduationspecialization(gradspid)
{
	clearForm();
	$('#callfunction').val("EditGraduationspecialization");
	$('#modalheading').html("Edit Graduationspecialization");
	$('#editgraduationspecialization').click();
	$.ajax({
		url  : 'Controller/GraduationspecializationController.php',
		data : {callfunction:"GetGraduationspecialization",gradspid:gradspid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			var arr=response.split("@@");
			$('#gradspid').val(arr[0]);
			$('#gradspname').val(arr[1]);
			$('#drpgrad').val(arr[2]);
		}
	});
}

$(document).ready(function(e) {
    $('#formgraduationspecialization').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/GraduationspecializationController.php',
			data : $('#formgraduationspecialization').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refreshgraduationspecialization();
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
});// JavaScript Document