<?php include("header.php"); ?>
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="nobottommargin clearfix">
		<form method="post">
          <div class="col-lg-7"><h4><span>All Registered Companies</span></h4></div>
		 
		  <div class="col-lg-2" align="right">
		  <input type="text" id="txtsearch" name="txtsearch" class="form-control" value="<?php if(isset($_POST['txtsearch'])){ echo $_POST['txtsearch'];}?>" placeholder="Search Company">
		  </div>
		  <div class="col-lg-1" align="left">
          <input type="submit" name="btsearch" id="btsearch" value="Search" class="button"> 
		  </div>
		  
		  <div class="col-lg-2" align="right">
          <input type="button" name="download" id="download" value="Download" class="button" onClick="getcompany()"> 
           </div>
		  </form>
		  <br><br><br>
		  <div class="col-lg-12">
		  <div class="table-responsive">
            <table class="table" width="100%">
              <thead>
                <tr>
                  <th>Logo</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Website</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
				
		$sql='';
		if(isset($_POST['txtsearch']))
		{
			$sql=@mysql_query("Select * from tblcompany Where tblcompany.companyname Like '%$_POST[txtsearch]%'") or die(mysql_error());
		}
		else
		{
			$sql=@mysql_query("Select * from tblcompany") or die(mysql_error());
		}
		if(@mysql_num_rows($sql)>0)
		{
			while($row=@mysql_fetch_array($sql))
			{
	?>
                <tr>
                  <td><img src="<?php echo 'uploadedphotos/'.$row['companylogo'];?>" alt="Company Logo" style="height:100px !importanr; width:100px !important;"></td>
                  <td><?php echo $row['companyname']; ?></td>
                  <td><?php echo $row['companyaddress'];?></td>
                  <td><a href="<?php echo $row['companywebsite'];?>"><?php echo $row['companywebsite'];?></a></td>
                  <td><?php echo $row['status']; ?></td>
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
