// JavaScript Document
function refreshpostgraduationspecialization()
{
	$.ajax({
		url  : 'Controller/PostgraduationspecializationController.php',
		data : {callfunction:"GetAllPostgraduationspecialization"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tblpostgraduationspecializationbody').html(response);
				$('#tablepostgraduationspecialization').dataTable();
			  }
		});
}

function deletePostgraduationspecialization(pgradspid)
{
	if(confirm("Are You Sure Want to Delete This Postgraduationspecialization?"))
	{
		$.ajax({
			url  : 'Controller/PostgraduationspecializationController.php',
			data : {pgradspid:pgradspid,callfunction:"DeletePostgraduationspecialization"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshpostgraduationspecialization();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewPostgraduationspecialization()
{
	clearForm();
	$('#callfunction').val("AddPostgraduationspecialization");
	$('#modalheading').html("Add Post Graduation Specialization");
}

function clearForm()
{
	$('#callfunction').val("");
	$('#modalheading').val("");
	$('#pgradspname').val("");
	$('#pgradspid').val("");
}

function editPostgraduationspecialization(pgradspid)
{
	clearForm();
	$('#callfunction').val("EditPostgraduationspecialization");
	$('#modalheading').html("Edit Postgraduationspecialization");
	$('#editpostgraduationspecialization').click();
	$.ajax({
		url  : 'Controller/PostgraduationspecializationController.php',
		data : {callfunction:"GetPostgraduationspecialization",pgradspid:pgradspid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			var arr=response.split("@@");
			$('#pgradspid').val(arr[0]);
			$('#pgradspname').val(arr[1]);
			$('#drpgrad').val(arr[2]);
		}
	});
}

$(document).ready(function(e) {
    $('#formpostgraduationspecialization').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/PostgraduationspecializationController.php',
			data : $('#formpostgraduationspecialization').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refreshpostgraduationspecialization();
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