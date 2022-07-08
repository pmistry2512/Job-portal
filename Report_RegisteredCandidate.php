<?php include("header.php"); ?>
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="nobottommargin clearfix">
		<form method="post">
          <div class="col-lg-7"><h4><span>All Registered Candidates</span></h4></div>
		 
		  <div class="col-lg-2" align="left">
		  <input type="text" id="txtsearch" name="txtsearch" class="form-control" value="<?php if(isset($_POST['txtsearch'])){ echo $_POST['txtsearch'];}?>" placeholder="Search Candidate">
		  </div>
		  <div class="col-lg-1" align="left">
          <input type="submit" name="btsearch" id="btsearch" value="Search" class="button"> 
             
           </div>
		   <div class="col-lg-2" align="right">
          <input type="button" name="download" id="download" value="Download" class="button" onClick="getcandidate()"> 
           </div>
		  </form>
		  <br><br><br>
		  <div class="col-lg-12">
		  <div class="table-responsive">
            <table class="table" width="100%">
              <thead>
                <tr>
                  <th>Photo</th>
				<th>Name</th>
				<th>EnrollMentNo</th>
				<th>Department</th>
				<th>EmailId</th>
				<th>MobileNo</th>
				<th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
		$sql='';
		if(isset($_POST['txtsearch']))
		{
			$sql=@mysql_query("Select tblcandidate.*,tbldepartment.* From tblcandidate,tbldepartment  Where tblcandidate.departmentid=tbldepartment.departmentid And tblcandidate.candidatename Like '%$_POST[txtsearch]%'") or die(mysql_error());
		}
		else
		{
			$sql=@mysql_query("Select tblcandidate.*,tbldepartment.* from tblcandidate,tbldepartment where tblcandidate.departmentid=tbldepartment.departmentid") or die(mysql_error());
		}
		if(@mysql_num_rows($sql)>0)
		{
			while($row=@mysql_fetch_array($sql))
			{
	?>
                <tr>
                  <td><div class="company-info"><img src="<?php echo 'uploadedphotos/'.$row['candidateimage'];?>" style="height:100px !important; width:100px !important;" alt="CandidatePhoto"></div></td>
				<td><?php echo $row['candidatename']; ?></td>
				<td><?php echo $row['candidateenrollno'];?></td>
				<td><?php echo $row['departmentname'];?></td>
				<td><?php echo $row['candidateemail'];?></td>
				<td><?php echo $row['candidatemobile'];?></td>
				<td><?php echo $row['candidatestatus']; ?></td>
                </tr>
                <?php 
				}
		}
				?>
              </tbody>
            </table>
          </div>
		  
          <!-- /.table-responsive -->
        </div>
      </div>
    </div>
  </section>
   <script type="text/javascript" src="customjs/js_report.js"></script>
  <?php include("footer.php"); ?>
