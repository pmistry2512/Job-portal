// JavaScript Document
function viewjobs(id)
{
	$.ajax({
		url  : 'Controller/InformerController.php',
		data : {callfunction:"ViewJobs",id:id},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#data').html(response);
					
			  }
		});	
}

function sentinformermail()
{
	$.ajax({
		url  : 'Controller/InformerController.php',
		data : {callfunction:"SentInformerMail"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				
					
			  }
		});	
}


function refershinformer()
{
	$.ajax({
		url  : 'Controller/InformerController.php',
		data : {callfunction:"GetAllInformer"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tbldepartmentbody').html(response);
				$('#tabledepartment').dataTable();
			  }
		});
}

function fillminexperience()
{
	var options;
	for(i=0;i<=15;i++)
	{
		options+="<option value='"+i+"'>"+i+"</option>";
	}
	$('#drpminexp').html(options);
}

function fillmaxexperinece()
{
	var start=parseInt($('#drpminexp').val());
	var options;
	for(i=start+1;i<=15;i++)
	{
		options+="<option value='"+i+"'>"+i+"</option>";
	}
	$('#drpmaxexp').html(options);
}

function addNewInformer()
{
	//clearForm();
	$('#callfunction').val("AddInformer");
	$('#modalheading').html("Add Informer");
}

function deleteInformer(deptid)
{
	if(confirm("Are You Sure Want to Delete This Informer?"))
	{
		$.ajax({
			url  : 'Controller/InformerController.php',
			data : {deptid:deptid,callfunction:"DeleteInformer"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshinformer();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

$(document).ready(function(e) {
    $('#forminformer').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/InformerController.php',
			data : $('#forminformer').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refershinformer();
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