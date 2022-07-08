// JavaScript Document
//Accept INvitation By Candidate
function AcceptInvitation(jobid,inviteid)
{
		if(confirm("Are You Sure Want to Accept Invitation?"))
	{
		$.ajax({
			url  : 'Controller/InvitationController.php',
			data : {jobid:jobid,inviteid:inviteid,callfunction:"AccpetInvite"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{	
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						location.reload(); 
						$( "#msgsuc").fadeOut(6000);
						
					}
				  }
			});
	}
}

//Approve Invitation By TPO
function ApproveInvitation(inviteid)
{
		if(confirm("Are You Sure Want to Approve Invitation?"))
	{
		$('#msgwait').show();

		$.ajax({
			url  : 'Controller/InvitationController.php',
			data : {inviteid:inviteid,callfunction:"ApproveInvite"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{	
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$('#msgwait').hide();
						location.reload(); 
						$( "#msgsuc").fadeOut(6000);
						
					}
				  }
			});
	}
}

//Reject Invitation By Candidate
function RejectInvitation(inviteid)
{
		if(confirm("Are You Sure Want to Reject Invitation?"))
	{
		$('#msgwait').show();
		$.ajax({
			url  : 'Controller/InvitationController.php',
			data : {inviteid:inviteid,callfunction:"RejectInvite"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{	
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$('#msgwait').hide();
						location.reload(); 
						$( "#msgsuc").fadeOut(6000);
						
					}
				  }
			});
	}
}

//Reject Invitation By TPO
function RejectInvitationTPO(inviteid)
{
		if(confirm("Are You Sure Want to Reject Invitation?"))
	{
		$('#msgwait').show();
		$.ajax({
			url  : 'Controller/InvitationController.php',
			data : {inviteid:inviteid,callfunction:"RejectInviteTPO"},
			type : 'POST',
			dataType : 'json',
			success : function(response){
					if(response.status=="success")
					{	
						
						$('#msgsuctext').html(response.msg);
						$('#msgsuc').show();
						$('#msgwait').hide();
						location.reload(); 
						$( "#msgsuc").fadeOut(6000);
						
					}
				  }
			});
	}
}
