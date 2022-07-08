// JavaScript Document

//Company Wise Jobs..
function getjob()
{
	
	$.ajax({	
		url  : 'Controller/ReportController.php',
		data : {callfunction:"GetAllJobs",id:$('#drpcompany').val()},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			
				$('#data').html(response);
				
			  }
		});
}



//Company Wise Hired Candidate..
function getcandidatebycompany()
{
	
	$.ajax({	
		url  : 'Controller/ReportController.php',
		data : {callfunction:"Getcandidate",cid:$('#company').val()},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			
				$('#data').html(response);
				
			  }
		});
}

//Department wise Hired Candidate...
function getdeptwisecandidate()
{
	
	$.ajax({	
		url  : 'Controller/ReportController.php',
		data : {callfunction:"GetDeptWiseCandidate",cid:$('#drpdepartment').val()},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			
				$('#data').html(response);
				
			  }
		});
}

//Designation wise hired candidate...
function getdesigwisecandidate()
{
	
	$.ajax({	
		url  : 'Controller/ReportController.php',
		data : {callfunction:"GetDesigWiseCandidate",cid:$('#drpdesig').val()},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			
				$('#data').html(response);
				
			  }
		});
}


//Year wise Hired Candidate...
function getyearwiseplacement()
{
	
	$.ajax({	
		url  : 'Controller/ReportController.php',
		data : {callfunction:"GetYearWiseCandidate",cid:$('#drpyear').val()},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			
				$('#data').html(response);
				
			  }
		});
}



//date wise Hired Candidate...
function getdatewiseplacement()
{
	
	$.ajax({	
		url  : 'Controller/ReportController.php',
		data : {callfunction:"GetDateWiseCandidate",sdate:$('#sdate').val(),tdate:$('#tdate').val()},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			
				$('#data').html(response);
				
			  }
		});
}



//Designation wise Scheduled Interview...
function getdesigwiseinterview()
{
	
	
	$.ajax({	
		url  : 'Controller/ReportController.php',
		data : {callfunction:"GetDesigWiseInterview",cid:$('#drpdesig').val()},
		type : 'POST',
		dataType : 'html',
		success : function(response){
			
				$('#data').html(response);
				
			  }
		});
}

//Registered Companies
function getcompany()
{
	
	search=$('#txtsearch').val();
	if(search=="")
	{
		window.open("Report_RegisteredCompanyPdf.php","_blank");
	}
	else
	{
		window.open("Report_RegisteredCompanyPdf.php?id="+search,"_blank");
	}
	
}

//Designation wise scheduled interview
function getinterviewpdf()
{
	
	cid=$('#drpdesig').val();
	userrole=$('#user').val();
	deptid=$('#deptid').val();
	userid=$('#userid').val();
	window.open("Report_CompanyInterviewpdf.php?cid="+cid+"&user="+userrole+"&deptid="+deptid+"&userid="+userid,"_blank");
	
	
}

//Designation wise scheduled interview
function getcompanywiseplacementpdf()
{
	
	cid=$('#company').val();
	window.open("Report_CompanyWiseHiredCandidatepdf.php?cid="+cid,"_blank");
	
	
}

//Company Wise Jobs
function getcompanywisejobpdf()
{
	
	id=$('#drpcompany').val();
	window.open("Report_CompanyWiseJobpdf.php?id="+id,"_blank");
	
	
}

//Date Wise Placements
function getdatewiseplacementpdf()
{
	
	sdate=$('#sdate').val();
	tdate=$('#tdate').val();
	window.open("Report_DateWisePlacementPdf.php?sdate="+sdate+"&tdate="+tdate,"_blank");
	
}

//Departmentwise Placements
function getdeptwiseplacementpdf()
{
	
	cid=$('#drpdepartment').val();
	window.open("Report_DepartmentWisePlacementPdf.php?cid="+cid,"_blank");
	
	
}


//Designation Wise Placements
function getdesigwiseplacement()
{
	cid=$('#drpdesig').val();
	userrole=$('#user').val();
	deptid=$('#deptid').val();
	userid=$('#userid').val();
	window.open("Report_DesignationWiseHiredCandidatePdf.php?cid="+cid+"&user="+userrole+"&deptid="+deptid+"&userid="+userid,"_blank");
	
	
}


//Registered Candidate
function getcandidate()
{
	
	search=$('#txtsearch').val();
	if(search=="")
	{
		window.open("Report_RegisteredCandidatePdf.php","_blank");
	}
	else
	{
		window.open("Report_RegisteredCandidatePdf.php?id="+search,"_blank");
	}
	
}

//Year Wise Placements
function getyearwiseplacementpdf()
{
	userrole=$('#user').val();
	cid=$('#drpyear').val();
	deptid=$('#deptid').val();
	userid=$('#userid').val();
	window.open("Report_YearWisePlacementPdf.php?cid="+cid+"&user="+userrole+"&deptid="+deptid+"&userid="+userid,"_blank");
	
	
}


