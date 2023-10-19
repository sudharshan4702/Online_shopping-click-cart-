<?php include "header.php"; ?>
<section class="main-content">				
				<div class="row">
					
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Admin Login</strong></span></h4>
						<form action="" method="post" class="form-stacked">
							<fieldset>
							
								
	<div class="control-group">
									<label class="control-label">Username</label>
									<div class="controls">
										<input type="text" name="uname" class="input-xlarge" required>
									</div>
								</div>
							
															
								<div class="control-group">
									<label class="control-label">Password:</label>
									<div class="controls">
										<input type="password" name="upass" class="input-xlarge" required>
									</div>
								</div>							                            

								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="submit" value="Login"></div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>
  <?php
if(isset($_POST['submit']))
{
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$q=mysql_query("select * from admin where aname='$uname' and apass='$upass'")or die(mysql_error());
$n=mysql_num_rows($q);
if($n>0)
{
$r=mysql_fetch_array($q);
$_SESSION['aid']=$aid=$r['aid'];
$_SESSION['aname']=$uname=$r['uname'];
echo "<script type='text/javascript'>alert('Admin Login Successfull');</script>";
echo '<meta http-equiv="refresh" content="0;url=admindashboard.php">';
}
else
{
echo "<script type='text/javascript'>alert('You are not authorised user');</script>";
}

}
?>   			
<?php include "footer.php"; ?>