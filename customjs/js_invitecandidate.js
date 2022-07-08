// JavaScript Document
var depts=[];
var genders=[];
var locations=[];
var skills=[];
var deldept="";
var delskill="";
var delloc="";
var delgender="";

function checkDept(id,name)
{
	var chkvalue=$("input[name='chkdept"+id+"']:checked").val();
	if(chkvalue==undefined)
	{
		$.each(depts, function(index, value) {
			if(value==name)
			{
				deldept=index;
			}
		});
		depts.splice(deldept, 1);
	}
	else
	{
		depts.push("'"+name+"'");
	}
	filterCandidates();
}

function checkSkill(id,name)
{
	var chkvalue=$("input[name='chkskill"+id+"']:checked").val();
	if(chkvalue==undefined)
	{
		$.each(skills, function(index, value) {
			if(value==name)
			{
				delskill=index;
			}
		});
		skills.splice(delskill, 1);
	}
	else
	{
		skills.push(name);
	}
	filterCandidates();
}

function checkLocation(id,name)
{
	var chkvalue=$("input[name='chklocation"+id+"']:checked").val();
	if(chkvalue==undefined)
	{
		$.each(locations, function(index, value) {
			if(value==name)
			{
				delloc=index;
			}
		});
		locations.splice(delloc, 1);
	}
	else
	{
		locations.push("'"+name+"'");
	}
	filterCandidates();
}

function checkGender(id,name)
{
	var chkvalue=$("input[name='chkgender"+id+"']:checked").val();
	if(chkvalue==undefined)
	{
		$.each(genders, function(index, value) {
			if(value==name)
			{
				delgender=index;
			}
		});
		genders.splice(delgender, 1);
	}
	else
	{
		genders.push("'"+name+"'");
	}
	filterCandidates();
}

function filterCandidates()
{
	$.ajax({
		url  : 'Controller/InviteCandidateController.php',
		data : {callfunction:"filterCandidate",departmentname:depts.toString(),skills:skills.toString(),location:locations.toString(),gender:genders.toString()},
		type : 'POST',
		dataType : 'html',
		
		success : function(response){
				$('#shop').html(response);
			  }
		});
}
function showdetail(candid)
{
	$('#candid').val(candid);
	$('#callfunction').val("showdetail");
	//$('#modl').click;
	$.ajax({
		  
		url  : 'Controller/InviteCandidateController.php',
		data : {callfunction:"showdetail",candid:candid},
		type : 'POST',
		dataType : 'html',
		success : function(response){

			$('#modlcontent').html(response);

		}
	});
}

function inviteCandidate()
{
	
	$('#callfunction').val("InviteCandidate");
	//$('#modl').click;
	$.ajax({
		  
		url  : 'Controller/InviteCandidateController.php',
		data : {callfunction:"InviteCandidate",candid:$('#scandid').val(),jobid:$('#drpjob').val()},
		type : 'POST',
		dataType : 'json',
		success : function(response){
			
			if(response.status == "success")
			{
				$('#msgsuctext').html(response.msg);
				$('#msgsuc').show();
				$( "#msgsuc").fadeOut(6000,function(){
					$('#closeme').click()
				});
			}
			else
			{
				$('#msgerrtext').html(response.msg);
				$('#msgerr').show();
				$( "#msgerr").fadeOut(6000);
			}
		}

		
	});
}

function setDetails(canid)
{
	$('#scandid').val(canid);
}

function inviteall()
{
	filterCandidates();
	$.ajax({
		url  : 'Controller/InviteCandidateController.php',
		data : {callfunction:"InviteAll",jobid:$('#drpinvitejob').val(),departmentname:depts.toString(),skills:skills.toString(),location:locations.toString(),gender:genders.toString()},
		type : 'POST',
		dataType : 'json',
		success : function(response){
			
				
				$('#msgsuc').html(response.msg);
				$('#msgsucc').show();
				$( "#msgsucc").fadeOut(6000,function(){
				$('#closemeall').click()
				});
			
			
		}
		});
}


$(document).ready(function(e) {
    filterCandidates();
});