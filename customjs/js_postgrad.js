// JavaScript Document
function refreshpostgrad()
{
	$.ajax({
		url  : 'Controller/PostGraduationController.php',
		data : {callfunction:"GetAllPostgrad"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tblpostgradbody').html(response);
				$('#tablepostgrad').dataTable();
			  }
		});
}

function deletePostgrad(pgid)
{
	if(confirm("Are You Sure Want to Delete This Postgraduation?"))
	{
		$.ajax({
			url  : 'Controller/PostGraduationController.php',
			data : {pgid:pgid,callfunction:"DeletePostgrad"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshpostgrad();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewPostgrad()
{
	clearForm();
	$('#callfunction').val("AddPostgrad");
	$('#modalheading').html("Add PostGraduation");
}

function clearForm()
{
	$('#callfunction').val("");
	$('#modalheading').val("");
	$('#pgname').val("");
	$('#pgid').val("");
}

function editPostgrad(pgid)
{
	clearForm();
	$('#callfunction').val("EditPostgrad");
	$('#modalheading').html("Edit PostGraduation");
	$('#editpostgrad').click();
	$.ajax({
		url  : 'Controller/PostGraduationController.php',
		data : {callfunction:"GetPostgrad",pgid:pgid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			var arr=response.split("@@");
			$('#pgid').val(arr[0]);
			$('#pgname').val(arr[1]);		
		}
	});
}

$(document).ready(function(e) {
    $('#formpostgrad').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/PostGraduationController.php',
			data : $('#formpostgrad').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refreshpostgrad();
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