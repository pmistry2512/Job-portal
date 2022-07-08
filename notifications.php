
<?php 

include "header.php";?>

  <section id="content">
    <div class="content-wrap">
      <div class="container clearfix">
        <div class="nobottommargin clearfix" style="margin-right:0px !important;">
          <h3>NOTIFICATIONS</h3>
          <?php
		  	
            $res=@mysql_query("Select * From tblnotification where candidateid=$_SESSION[LoggedUserId] and user='$_SESSION[LoggedUserRole]' order by notificationdate desc");
            while($row=@mysql_fetch_array($res))
            {
                $date=strtotime($row["notificationdate"]);
				if($row["status"]=="Unread")
				{
					 echo '<blockquote style="background-color:#F9F9F9 !important;">
			            	<p><a href="'.$row["pageurl"].'" onClick=setRead('.$row["notificationid"].')>'.$row["message"].'</a></p>			
                                <footer>'.date("d/M/y H:i a",$date).'</footer>
                       </blockquote>
                       ';
				}
				else
				{
                	 echo '<blockquote>
			            	<p><a href="'.$row["pageurl"].'" onClick=setRead('.$row["notificationid"].')>'.$row["message"].'</a></p>			
                                <footer>'.date("d/M/y H:i a",$date).'</footer>
                       </blockquote>
                       ';
				}
            }
			?>
        </div>
      </div>
    </div>
  </section>
  <?php include "footer.php"; ?>