<?php include "header.php"; ?>
<section class="main-content">				
				<div class="row">
					
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Register</strong> Form</span></h4>
						<form action="" method="post" class="form-stacked">
							<fieldset>
							
								<div class="control-group">
									<label class="control-label">Firstname</label>
									<div class="controls">
										<input type="text" class="input-xlarge" name="fname"  required >
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Lastname</label>
									<div class="controls">
										<input type="text" class="input-xlarge" name="lname" required >
									</div>
								</div>
								
								
								<div class="control-group">
									<label class="control-label">Email address:</label>
									<div class="controls">
										<input type="email" name="email" class="input-xlarge" required>
									</div>
								</div>
								
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
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="submit" value="Create your account"></div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>
 <?php
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$uname=$_POST['uname'];
$upass=$_POST['upass'];
$email=$_POST['email'];

$q=mysql_query("select * from  user where stname='$uname' and stpass='$upass'")or die(mysql_error());
$n=mysql_num_rows($q);
if($n>0)
{
echo "<script type='text/javascript'>alert('User account already exists');</script>";
}
else
{
mysql_query("insert into user(stfname,stlname,stemail,stname,stpass)values('$fname','$lname','$email','$uname','$upass')");
echo "<script type='text/javascript'>alert('User account registered successfully');</script>";
echo '<meta http-equiv="refresh" content="0;url=login.php">';
}
}
?>  			
<?php include "footer.php"; ?>