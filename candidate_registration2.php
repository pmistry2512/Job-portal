<?php
include_once("header.php");

?>

  <!-- Page Title
		============================================= -->
  <section id="page-title">
    <div class="container clearfix">
      <h1>Candidate Registration</h1>
    </div>
  </section>
  <!-- #page-title end -->
  <!-- Content
		============================================= -->
  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="tabs divcenter nobottommargin clearfix" id="tab-login-register" >
          <div class="tab-content clearfix" id="tab-register">
            <div class="panel panel-default nobottommargin">
              <div class="well well-lg nobottommargin" style="padding: 40px;">
                <div class="col_full col_last nobottommargin">
                  <h3>Education Detail.</h3>
                  <h4>Graduation Deatil :</h4>
                  <form id="register-form" name="register-form" class="nobottommargin" method="post">
                    <!-- <input type="hidden" id="gradid" name="gradid" value="">-->
                    <div class="col_one_sixth">
                      <label for="register-form-phone">Graduation:</label>
                      <select class="sm-form-control" id="drpgrad" name="drpgrad" >
                        <?php
																$sql=@mysql_query("Select * From tblgraduation") or die(mysql_error());
																while($row=@mysql_fetch_array($sql))
																{
														?>
                        <option value="<?php echo $row['graduationid'];?>"><?php echo $row['graduationname'];?></option>
                        <?php
																}
														?>
                      </select>
                    </div>
                    <div class="col_one_sixth">
                      <label for="register-form-phone">Specialization:</label>
                      <select class="sm-form-control" id="drpspec" name="drpspec" >
                        <?php
																$sql=@mysql_query("Select * From tblgraduationspecialization") or die(mysql_error());
																while($row=@mysql_fetch_array($sql))
																{
														?>
                        <option value="<?php echo $row['gradspecid'];?>"><?php echo $row['gradspecname'];?></option>
                        <?php
																}
														?>
                      </select>
                    </div>
                    <div class="col_one_sixth">
                      <label for="register-form-phone">University:</label>
                      <select class="sm-form-control" id="drpuni" name="drpuni" >
                        <?php
																$sql=@mysql_query("Select * From tbluniversity") or die(mysql_error());
																while($row=@mysql_fetch_array($sql))
																{
														?>
                        <option value="<?php echo $row['universityid'];?>"><?php echo $row['universityname'];?></option>
                        <?php
																}
														?>
                      </select>
                    </div>
                    <div class="col_one_sixth">
                      <label for="register-form-gradyear">Graduation Year</label>
                      <input type="text" id="year" name="year" value="" class="sm-form-control tleft format" placeholder="YYYY">
                    </div>
                    <div class="col_one_sixth">
                      <label for="register-form-gradyear">Grade</label>
                      <input type="text" value="" id="grade" name="grade" class="sm-form-control tleft format">
                      <input type="hidden" id="callfunction" name="callfunction" value="AddGraduation">
					  <input type="hidden" id="candgradid" name="candgradid" value=""/>
                    </div>
                    <div class="col_one_sixth col_last">
                      <label for="register-form-gradyear"></label>
                      <input class="button" type="submit" value="Add Detail"/>
                    </div>
                  </form>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="table-responsive col-lg-12">
                    <table id="tablegraduation" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Graduation</th>
                          <th>Specialization</th>
                          <th>University</th>
                          <th>Passing Year</th>
                          <th>Grade</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Graduation</th>
                          <th>Specialization</th>
                          <th>University</th>
                          <th>Passing Year</th>
                          <th>Grade</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody id="tablegraduationbody">
                      </tbody>
                    </table>
                  </div>
                  <div class="clear"></div>
                  <form id="postgradform" name="postgradform" method="post" class="nobottommargin">
                    <h4>Post Graduation Deatil:</h4>
                    <div class="col_one_sixth">
                      <label for="register-form-phone">PostGraduation:</label>
                      <select class="sm-form-control" id="drppostgrad" name="drppostgrad" >
                        <?php
															$sql=@mysql_query("Select * From tblpostgraduation") or die(mysql_error());
															while($row=@mysql_fetch_array($sql))
															{
														?>
                        <option value="<?php echo $row['postgraduationid'];?>"><?php echo $row['postgraduationname'];?></option>
                        <?php
															}
														?>
                      </select>
                    </div>
                    <div class="col_one_sixth">
                      <label for="register-form-phone">Specialization:</label>
                      <select class="sm-form-control" id="drppostspec" name="drppostspec" >
                        <?php
																$sql=@mysql_query("Select * From tblpostgradspecialization") or die(mysql_error());
																while($row=@mysql_fetch_array($sql))
																{
														?>
                        <option value="<?php echo $row['postspecid'];?>"><?php echo $row['postspecname'];?></option>
                        <?php
																}
														?>
                      </select>
                    </div>
                    <div class="col_one_sixth">
                      <label for="register-form-phone">University:</label>
                      <select class="sm-form-control" id="drppostgraduni" name="drppostgraduni" >
                        <?php
																$sql=@mysql_query("Select * From tbluniversity") or die(mysql_error());
																while($row=@mysql_fetch_array($sql))
																{
														?>
                        <option value="<?php echo $row['universityid'];?>"><?php echo $row['universityname'];?></option>
                        <?php
																}
														?>
                      </select>
                    </div>
                    <div class="col_one_sixth">
                      <label for="register-form-gradyear">Year</label>
                      <input type="text" id="pgyear" name="pgyear" class="sm-form-control tleft format required" placeholder="YYYY" Required="">
                    </div>
                    <div class="col_one_sixth">
                      <label for="register-form-gradyear">Grade</label>
                      <input type="text" value="" id="pggrade" name="pggrade" class="sm-form-control tleft format">
                      <input type="hidden" id="callfunction" name="callfunction" value="AddPostGraduation">
					   <input type="hidden" id="candpostgradid" name="candpostgradid" value=""/>
                    </div>
                    <div class="col_one_sixth col_last">
                      <label for="register-form-gradyear"></label>
                      <input class="button" type="submit" value="Add Detail"/>
                    </div>
                  </form>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <div class="table-responsive col-lg-12">
                    <table id="tablepostgraduation" class="table table-striped table-bordered" cellspacing="0" width="100%">
                      <thead>
                        <tr>
                          <th>Post Graduation</th>
                          <th>Specialization</th>
                          <th>University</th>
                          <th>Passing Year</th>
                          <th>Grade</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Graduation</th>
                          <th>Specialization</th>
                          <th>University</th>
                          <th>Passing Year</th>
                          <th>Grade</th>
                          <th>Action</th>
                        </tr>
                      </tfoot>
                      <tbody id="tablepostgraduationbody">
                      </tbody>
                    </table>
                  </div>
				  <a href="candidate_registration3.php" class="button">Next</a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- #content end -->
  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="customjs/js_candreg2.js"></script>
  <script>
		$(document).ready(function() {
			refershpostgraduation();
			refereshgraduation();

		});
	</script>
  <?php
include_once("footer.php");
?>
