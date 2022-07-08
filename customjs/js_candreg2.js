// JavaScript Document
function refereshgraduation(candid)
{
	$.ajax({
		url  : 'Controller/candreg2Controller.php',
		data : {callfunction:"GetAllGraduation",candid:candid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				
				$('#tablegraduationbody').html(response);
				$('#tablegraduation').dataTable();
			  }
		});
}

function refershpostgraduation(candid)
{
	$.ajax({
		url  : 'Controller/candreg2Controller.php',
		data : {callfunction:"GetAllPostGraduation",candid:candid},
		type : 'POST',
		dataType : 'html',
		success : function(response){

				$('#tablepostgraduationbody').html(response);
				$('#tablepostgraduation').dataTable();
			  }
		});
}

function addNewGraduation()
{
	$('#callfunction').val("AddGraduation");
	//refereshgraduation();
	
}

function deleteGraduation(candgradid)
{
	if(confirm("Are You Sure Want to Delete This Department?"))
	{
		$.ajax({
			url  : 'Controller/candreg2Controller.php',
			data : {candgradid:candgradid,callfunction:"DeleteGraduation"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refereshgraduation();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function deletePostGraduation(candpostgradid)
{
	if(confirm("Are You Sure Want to Delete This Department?"))
	{
		$.ajax({
			url  : 'Controller/candreg2Controller.php',
			data : {candpostgradid:candpostgradid,callfunction:"DeletePostGraduation"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refershpostgraduation();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewPostGraduation()
{
	$('#callfunction').val("AddPostGraduation");
	//refereshgraduation();
	
}

$(document).ready(function(e) {
    $('#register-form').submit(function(e){

		e.preventDefault();
		var $form = $(this);

		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/candreg2Controller.php',
			data : $('#register-form').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refereshgraduation();
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

$(document).ready(function(e) {
    $('#postgradform').submit(function(e){

		e.preventDefault();
		var $form = $(this);

		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/candreg2Controller.php',
			data : $('#postgradform').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refershpostgraduation();
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

