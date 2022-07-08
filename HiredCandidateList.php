<?php include("header.php"); ?>
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="nobottommargin clearfix">
		
          <div class="col-lg-7"><h4><span>&nbsp;Candidates Hired By Company</span></h4></div>
		 
		 
		  <br><br><br>
		  <div class="col-lg-12">
		  <div class="table-responsive">
            <table class="table" width="100%">
              <thead>
                <tr>
                  <th>Photo</th>
				<th>Name</th>
				<th>Job Name</th>
				<th>Company Name</th>
				<th>Salary Package</th>
				<th>Designation</th>
                </tr>
              </thead>
              <tbody>
                <?php
		$sql='';
		
		
			$sql=@mysql_query("Select * from tbljobapply,tbljob,tblcandidate,tblcompany,tbldesignation,tbladmin where tblcandidate.departmentid=tbladmin.departmentid And tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.jobid=tbljob.jobid And tbljobapply.applicationstatus='Hired' And tbladmin.adminid=$_SESSION[LoggedUserId]") or die(mysql_error());
		
		if(@mysql_num_rows($sql)>0)
		{
			while($row=@mysql_fetch_array($sql))
			{
	?>
                <tr>
                  <td><div class="company-info"><img src="<?php echo 'uploadedphotos/'.$row['candidateimage'];?>" style="height:100px !important; width:100px !important;" alt="CandidatePhoto"></div></td>
				<td><?php echo $row['candidatename']; ?></td>
				
				<td><?php echo $row['jobname'];?></td>
				<td><?php echo $row['companyname'];?></td>
				<td><?php echo $row['salarypackage'];?></td>
				<td><?php echo $row['designationname']; ?></td>
                </tr>
                <?php 
				}
		}
		else
		{
		?>
		<tr>
		<td colspan="7" bgcolor="#CCCCCC">No Data to Display</td>
		</tr>
		<?php
		}
				?>
              </tbody>
            </table>
          </div>
		  
          <!-- /.table-responsive -->
		  
		  
		  
		   <div class="col-lg-7"><h4><span>List Of Job Accepted By Candidate</span></h4></div>
		 
		 
		  <br><br><br>
		  <div class="col-lg-12">
		  <div class="table-responsive">
            <table class="table" width="100%">
              <thead>
                <tr>
                <th>Photo</th>
				<th>Name</th>
				<th>Job Name</th>
				<th>Company Name</th>
				<th>Salary Package</th>
				<th>Designation</th>
				
                </tr>
              </thead>
              <tbody>
                <?php
		$sql='';
		
		
			$sql=@mysql_query("Select * from tbljobapply,tbljob,tblcandidate,tblcompany,tbldesignation,tbladmin where  tblcandidate.departmentid=tbladmin.departmentid And tbljob.designation=tbldesignation.designationid And tbljob.companyid=tblcompany.companyid And tbljobapply.candidateid=tblcandidate.candidateid And tbljobapply.jobid=tbljob.jobid And tbljobapply.applicationstatus='jobAccepted' And tbladmin.adminid=$_SESSION[LoggedUserId]") or die(mysql_error());
		
		if(@mysql_num_rows($sql)>0)
		{
			while($row=@mysql_fetch_array($sql))
			{
	?>
                <tr>
                  <td><div class="company-info"><img src="<?php echo 'uploadedphotos/'.$row['candidateimage'];?>" style="height:100px !important; width:100px !important;" alt="CandidatePhoto"></div></td>
				<td><?php echo $row['candidatename']; ?></td>
				
				<td><?php echo $row['jobname'];?></td>
				<td><?php echo $row['companyname'];?></td>
				<td><?php echo $row['salarypackage'];?></td>
				<td><?php echo $row['designationname']; ?></td>
                </tr>
                <?php 
				}
		}
		else
		{
		?>
		<tr>
		<td colspan="7" bgcolor="#CCCCCC">No Data to Display</td>
		</tr>
		<?php
		}
				?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <?php include("footer.php"); ?>
