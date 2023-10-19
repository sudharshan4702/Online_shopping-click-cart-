<?php include "header.php"; ?>
<section class="main-content">				
				<div class="row">
					
					<div class="span7">					
						<h4 class="title"><span class="text"><strong>Add Product</strong></span></h4>
						<form action="" method="post" class="form-stacked" enctype="multipart/form-data">
							<fieldset>
							
															
								<div class="control-group">
									<label class="control-label">Product name:</label>
									<div class="controls">
										<input type="text" name="pname" class="input-xlarge" required>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Product image:</label>
									<div class="controls">
										<input type="file" name="pimg" class="input-xlarge" required>
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label">Product price:</label>
									<div class="controls">
										<input type="text" maxlength="5" name="med_price" class="input-xlarge" required oninput="this.value=this.value.replace(/[^0-9]/g,'');" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" >
									</div>
								</div>	
								
								<div class="control-group">
									<label class="control-label">Quantity:</label>
									<div class="controls">
										<input type="text" name="qty" class="input-xlarge" oninput="this.value=this.value.replace(/[^0-9]/g,'');" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" maxlength="5" required>
									</div>
								</div>							                            

								<hr>
								<div class="actions"><input tabindex="9" class="btn btn-inverse large" type="submit" name="submit" value="Add product"></div>
							</fieldset>
						</form>					
					</div>				
				</div>
			</section>
  <?php
if(isset($_POST['submit']))
{
$pimage=$_FILES['pimg']['name'];
$pname=mysql_real_escape_string($_POST['pname']);
$med_price=$_POST['med_price'];
$qty=$_POST['qty'];

mysql_query("insert into product(pname,med_price,qty,pimage)values('$pname','$med_price','$qty','$pimage')")or die(mysql_error());
move_uploaded_file($_FILES['pimg']['tmp_name'],"upload/$pimage");
echo "<script type='text/javascript'>alert('Product added Successfull');</script>";
echo '<meta http-equiv="refresh" content="0;url=admindashboard.php">';
}
?>   			
<?php include "footer.php"; ?>