// JavaScript Document
//TPO Registration
$(document).ready(function(){
	$('#tporeg').submit(function(e){
			e.preventDefault();
			var $form = $(this);
	if(! $form.valid()) return false;		
	$.ajax({
		url  : 'Controller/TPOregController.php',
		data : $('#tporeg').serialize(),
		type : 'POST',
		dataType : 'json',
		success : function(response){
				if(response.status == "success")
				{
				  $('.mfp-close').click();
				  $('#msgsucc').show();
				  $( "#msgsucc" ).fadeOut(6000);
				  refreshtpo();
				 
				}
				else
				{
				  $('#msgerr').show();
				  $( "#msgerr" ).fadeOut(6000);
				}
			  }
		   });
		});
	});



$(document).ready(function(){
	$('#tpoedit').submit(function(e){
			e.preventDefault();
			var $form = $(this);
	if(! $form.valid()) return false;		
	$.ajax({
		url  : 'Controller/TPOregController.php',
		data : $('#tpoedit').serialize(),
		type : 'POST',
		dataType : 'json',
		success : function(response){
				if(response.status == "success")
				{
				  $('.mfp-close').click();
				  $('#msgsucc').show();
				  $( "#msgsucc" ).fadeOut(6000); 
				  refreshtpo();
				}
				else
				{
				  $('#msgerr').show();
				  $( "#msgerr" ).fadeOut(6000);
				}
			  }
		   });
		});
	});


function refreshtpo()
{
	$.ajax({
		url  : 'Controller/TPOregController.php',
		data : {callfunction:"GetAllTPO"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tbltpobody').html(response);
				$('#tabletpo').dataTable();
			  }
		});
}

function blockTPO(candid)
{
	
		$.ajax({
			url  : 'Controller/TPOregController.php',
			data : {candid:candid,callfunction:"BlockTPO"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshtpo();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	
}



function editTPO(candid)
{
	
	//clearForm();
	$('#callfunction').val("EditTPO");
	$('#modalheading').html("Edit TPO");
	$('#editdepartment').click();
	
	$.ajax({
		url  : 'Controller/TPOregController.php',
		data : {callfunction:"GetTPO",candid:candid},
		type : 'POST',
		dataType : 'html',
		success : function(response1){
			var arr=response1.split("@@");
			$('#candid').val(arr[0]);
			$('#txtname').val(arr[1]);
			$('#txtemail').val(arr[2]);
			$('#department').val(arr[3]);
			$('#status').val(arr[4]);		
		}
	});
}

