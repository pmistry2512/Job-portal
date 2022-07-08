// JavaScript Document
function refreshdesignation()
{
	$.ajax({
		url  : 'Controller/DesignationController.php',
		data : {callfunction:"GetAllDesignation"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tbldesignationbody').html(response);
				$('#tabledesignation').dataTable();
			  }
		});
}

function deleteDesignation(desigid)
{
	if(confirm("Are You Sure Want to Delete This Designation?"))
	{
		$.ajax({
			url  : 'Controller/DesignationController.php',
			data : {desigid:desigid,callfunction:"DeleteDesignation"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshdesignation();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewDesignation()
{
	clearForm();
	$('#callfunction').val("AddDesignation");
	$('#modalheading').html("Add Designation");
}

function clearForm()
{
	$('#callfunction').val("");
	$('#modalheading').val("");
	$('#designame').val("");
	$('#desigid').val("");
}

function editDesignation(desigid)
{
	clearForm();
	$('#callfunction').val("EditDesignation");
	$('#modalheading').html("Edit Designation");
	$('#editdesignation').click();
	$.ajax({
		url  : 'Controller/DesignationController.php',
		data : {callfunction:"GetDesignation",desigid:desigid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			var arr=response.split("@@");
			$('#desigid').val(arr[0]);
			$('#designame').val(arr[1]);		
		}
	});
}

$(document).ready(function(e) {
    $('#formdesignation').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/DesignationController.php',
			data : $('#formdesignation').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refreshdesignation();
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