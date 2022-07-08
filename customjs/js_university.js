// JavaScript Document
function refreshuniversity()
{
	$.ajax({
		url  : 'Controller/UniversityController.php',
		data : {callfunction:"GetAllUniversity"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tbluniversitybody').html(response);
				$('#tableuniversity').dataTable();
			  }
		});
}

function deleteUniversity(uniid)
{
	if(confirm("Are You Sure Want to Delete This University?"))
	{
		$.ajax({
			url  : 'Controller/UniversityController.php',
			data : {uniid:uniid,callfunction:"DeleteUniversity"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshuniversity();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewUniversity()
{
	clearForm();
	$('#callfunction').val("AddUniversity");
	$('#modalheading').html("Add University");
}

function clearForm()
{
	$('#callfunction').val("");
	$('#modalheading').val("");
	$('#uniname').val("");
	$('#uniid').val("");
}

function editUniversity(uniid)
{
	clearForm();
	$('#callfunction').val("EditUniversity");
	$('#modalheading').html("Edit University");
	$('#edituniversity').click();
	$.ajax({
		url  : 'Controller/UniversityController.php',
		data : {callfunction:"GetUniversity",uniid:uniid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			var arr=response.split("@@");
			$('#uniid').val(arr[0]);
			$('#uniname').val(arr[1]);		
		}
	});
}

$(document).ready(function(e) {
    $('#formuniversity').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/UniversityController.php',
			data : $('#formuniversity').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refreshuniversity();
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