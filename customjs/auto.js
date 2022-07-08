// JavaScript Document
$(document).ready(function(e) {
    getTopNotification();
});
setInterval(function(){
	getTopNotification();
},10000);

function getTopNotification()
{
	$.ajax({
		url  : 'Controller/CommonController.php',
		data : {callfunction:"GetTopNotification"},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				arr=response.split("@@");
				$('#notificationitems').html(arr[0]);
				$('#notificationcount').html(arr[1]);
			  }
		});
}

function setRead(notificationid)
{
	
	$.ajax({
		url  : 'Controller/CommonController.php',
		data : {callfunction:"setReadNotification",notificationid:notificationid},
		type : 'POST',
		dataType : 'html',
		success : function(response){
				
			  }
		});
}