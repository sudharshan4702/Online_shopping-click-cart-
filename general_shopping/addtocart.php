<?php include "header.php"; ?>
<section class="main-content">				
				<div class="row">
					
					<div class="span12">					
						<h4 class="title"><span class="text"><strong>Add to cart</strong></span></h4>
						<form action="" method="post" enctype="multipart/form-data">
         <?php
		 $pid=$_GET['pid'];
		$t=mysql_query("select * from product where pid=$pid");
		while($w=mysql_fetch_array($t))
		{
		$pimage=$w['pimage'];
$pname=$w['pname'];
$pdescp=$w['pdescp'];
$price=$w['med_price'];
$qty=$w['qty'];
		?>
        <table align="left" cellpadding="10" cellspacing="0" border="1" width="100%">
          <tr><td>Product image</td><td>Product name</td><td>Price</td><td>Qty</td><td>Photo Image </td><td>View Review</td></tr>
          <?php
echo "<tr><td><img src='upload/$pimage' height='50px' /></td><td>$pname</td><td>$price</td><td><input type='text' name='qty' required ></td><td><input type='file' name='pfile' ></td><td><a href='view_review.php?pid=$pid'>View Review</a></td></tr>";
		  ?>
          </table>
		  <?php
				}
				?>
				<h3>Payment Details</h3>
				Card number<br>
				<input type='text' name='cnum' required maxlength="16" placeholder="Phone"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');" ><br>
				<br>Expiry date<br>
				<input type='text' name='edate' required maxlength="6"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"><br>
				<br>Cvv number<br>
				<input type='text' name='cvv' required maxlength="6"  oninput="this.value=this.value.replace(/[^0-9]/g,'');" onkeyup="this.value=this.value.replace(/[^0-9]/g,'');"><br><br>
				<input type='submit' name='checkout' value='Checkout' >
                </form>	
								
					</div>				
				</div>
			</section>
 <?php
if(isset($_POST['checkout']))
{
$stid=$_SESSION['stid'];
$pid=$_GET['pid'];
$qty=$_POST['qty'];
$cnum=$_POST['cnum'];
$edate=$_POST['edate'];
$cvv=$_POST['cvv'];
$pfile=$_FILES['pfile']['name'];
$temp=$_FILES['pfile']['tmp_name'];
move_uploaded_file($temp,"upload/$pfile");
$date=date("Y-m-d");
mysql_query("insert into cart(stid,pid,qty,date,pfile,cnum,edate,cvv)values('$stid','$pid','$qty','$date','$pfile','$cnum','$edate','$cvv')")or die(mysql_error());

mysql_query("update product set qty=qty-$qty where pid='$pid'");

echo "<script type='text/javascript'>alert('Product ordered Successfull');</script>";
echo '<meta http-equiv="refresh" content="0;url=order.php">';
}
?>      		
<?php include "footer.php"; ?>