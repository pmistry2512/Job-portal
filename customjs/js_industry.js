// JavaScript Document
function refreshindustry()
{
	$.ajax({
		url  : 'Controller/IndustryController.php',
		data : {callfunction:"GetAllIndustry"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tblindustrybody').html(response);
				$('#tableindustry').dataTable();
			  }
		});
}

function deleteIndustry(indusid)
{
	if(confirm("Are You Sure Want to Delete This Industry?"))
	{
		$.ajax({
			url  : 'Controller/IndustryController.php',
			data : {indusid:indusid,callfunction:"DeleteIndustry"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshindustry();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewIndustry()
{
	clearForm();
	$('#callfunction').val("AddIndustry");
	$('#modalheading').html("Add Industry");
}

function clearForm()
{
	$('#callfunction').val("");
	$('#modalheading').val("");
	$('#indusname').val("");
	$('#indusid').val("");
}

function editIndustry(indusid)
{
	clearForm();
	$('#callfunction').val("EditIndustry");
	$('#modalheading').html("Edit Industry");
	$('#editindustry').click();
	$.ajax({
		url  : 'Controller/IndustryController.php',
		data : {callfunction:"GetIndustry",indusid:indusid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			var arr=response.split("@@");
			$('#indusid').val(arr[0]);
			$('#indusname').val(arr[1]);		
		}
	});
}

$(document).ready(function(e) {
    $('#formindustry').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/IndustryController.php',
			data : $('#formindustry').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refreshindustry();
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