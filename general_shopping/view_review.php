<?php include "header.php"; ?>
<section class="main-content">				
				<div class="row">
					
					<div class="span12">					
						<h4 class="title"><span class="text"><strong>View Product Review</strong></span></h4>
						        <table align="left" cellpadding="10" cellspacing="0" border="1" width="100%">
          <tr><td>User</td><td>Product name</td><td>Image</td><td>Price</td><td>Quantity</td><td>Review Date</td><td>View Review</td></tr>
         <?php
		 $pid=$_GET['pid'];
		 if(isset($_SESSION['aid']))
				{
						$t=mysql_query("select * from reviews");

				}
				else
				{
		$t=mysql_query("select * from reviews where pid='$pid'");
		}
		while($w=mysql_fetch_array($t))
		{
		$review=$w['review'];
		$stid=$w['stid'];
		$date=$w['date'];
		$pid=$w['pid'];
$q=mysql_query("select * from user where stid='$stid'")or die(mysql_error());
$r=mysql_fetch_array($q);
$usr=$r['stname'];


$u=mysql_query("select * from product where pid=$pid");
$y=mysql_fetch_array($u);
		
		$pimage=$y['pimage'];
$pname=$y['pname'];		
$qty=$y['qty'];
$med_price=$y['med_price'];


		?>

          <?php
echo "<tr><td>$usr</td><td>$pname</td><td><img src='upload/$pimage' style='height:50px;' /></td><td>$med_price</td><td>$qty</td><td>$date</td><td>$review</td></tr>";
		  ?>
         
		  <?php
				}
				?>
			 </table>
								
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