// JavaScript Document
function refereshrounds(iid)
{

	$.ajax({
		   
		url  : 'Controller/RoundController.php',
		data : {callfunction:"GetAllRounds",iid:iid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			
				$('#roundtablebody').html(response);
				$('#roundtable').dataTable();
			  }
		});
}

function fillminexperience()
{
	var options;
	for(i=10;i<=500;i++)
	{
		options+="<option value='"+i+"'>"+i+"</option>";
	}
	$('#drpminexp').html(options);
}

function fillmaxexperinece()
{
	var start=parseInt($('#drpminexp').val());
	var options;
	for(i=10;i<=start;i++)
	{
		options+="<option value='"+i+"'>"+i+"</option>";
	}
	$('#drpmaxexp').html(options);
}


function addNewRound()
{
	$('#callfunction').val("AddRound");
	$('#modalheading').html("Add Round");
	
	
	//clearForm();
	
	
}

function MarkComplete(ird,iid)
{
	$.ajax({
		   
		url  : 'Controller/RoundController.php',
		data : {callfunction:"MarkComplete",ird:ird,iid:iid},
		type : 'POST',
		dataType : 'json',
		success : function(response){
			
				if(response.status == "success")
					{
						
						refereshrounds($('#iid').val());
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$("#msgsuc").fadeOut(6000);
					}
					else
					{
						
						$('#msgerrtext').html(response.msg);
						$('#msgerr').show();
						$("#msgerr").fadeOut(6000);
					}
				
			  }
		});
}

$(document).ready(function(e) {
    $('#formround').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/RoundController.php',
			data : $('#formround').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
				
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refereshrounds($('#iid').val());
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