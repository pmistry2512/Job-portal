// JavaScript Document
function refreshdepartment()
{
	$.ajax({
		url  : 'Controller/DepartmentController.php',
		data : {callfunction:"GetAllDepartment"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				$('#tbldepartmentbody').html(response);
				$('#tabledepartment').dataTable();
			  }
		});
}

function deleteDepartment(deptid)
{
	if(confirm("Are You Sure Want to Delete This Department?"))
	{
		$.ajax({
			url  : 'Controller/DepartmentController.php',
			data : {deptid:deptid,callfunction:"DeleteDepartment"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{
						refreshdepartment();
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$( "#msgsuc").fadeOut(6000);
					}
				  }
			});
	}
}

function addNewDepartment()
{
	clearForm();
	$('#callfunction').val("AddDepartment");
	$('#modalheading').html("Add Department");
}

function clearForm()
{
	$('#callfunction').val("");
	$('#modalheading').val("");
	$('#deptname').val("");
	$('#deptid').val("");
}

function editDepartment(deptid)
{
	clearForm();
	$('#callfunction').val("EditDepartment");
	$('#modalheading').html("Edit Department");
	$('#editdepartment').click();
	$.ajax({
		url  : 'Controller/DepartmentController.php',
		data : {callfunction:"GetDepartment",deptid:deptid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			var arr=response.split("@@");
			$('#deptid').val(arr[0]);
			$('#deptname').val(arr[1]);		
		}
	});
}


$(document).ready(function(e) {
    $('#formdepartment').submit(function(e){
		e.preventDefault();
		var $form = $(this);
		
		if(! $form.valid()) return false;
		$.ajax({
			url  : 'Controller/DepartmentController.php',
			data : $('#formdepartment').serialize(),
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status == "success")
					{
						$('.mfp-close').click();
						refreshdepartment();
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