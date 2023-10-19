<?php include "header.php"; ?>
<section class="main-content">				
				<div class="row">
					
					<div class="span12">					
						<h4 class="title"><span class="text"><strong>View Order</strong></span></h4>
						<form action="" method="post">
         
        <table align="left" cellpadding="20" cellspacing="0" border="1" width="100%">
          <tr><td>Order Id</td><td>Product image</td><td>Product name</td><td>Photo Image</td><td>Price</td><td>Qty</td><td>Total Price</td><td>Order date</td><td>Status</td></tr>
          <?php
		$stid=$_SESSION['stid'];
		$t=mysql_query("select * from cart where stid=$stid");
		while($w=mysql_fetch_array($t))
		{
$pid=$w['pid'];
$cid=$w['cid'];
$status=$w['status'];
$qty=$w['qty'];
$date=$w['date'];
$pfile=$w['pfile'];
$u=mysql_query("select * from product where pid=$pid");
		while($y=mysql_fetch_array($u))
		{

		$pimage=$y['pimage'];
$pname=$y['pname'];
$pdescp=$y['pdescp'];
$price=$y['med_price'];


		?>

          <?php
		  $tot=($qty*$price);

		  if($pfile=='')
		  {

if($status=='')
		  {
echo "<tr><td><input type='radio' name='cid' value='$cid'>$cid</td><td><img src='upload/$pimage' height='50px'   /></td><td>$pname</td><td></td><td>$price</td><td>$qty</td><td>$tot</td><td>$date</td><td><a href=order.php?cid=$cid&status=cancel>Cancel</a></td></tr>";
}
else
{
echo "<tr><td><input type='radio' name='cid' value='$cid'>$cid</td><td><img src='upload/$pimage' height='50px' /></td><td>$pname</td><td></td><td>$price</td><td>$qty</td><td>$tot</td><td>$date</td><td>$status</td></tr>";
}

}
else
{
if($status=='')
		  {
echo "<tr><td><input type='radio' name='cid' value='$cid'>$cid</td><td><img src='upload/$pimage' height='50px' /></td><td>$pname</td><td><img src='upload/$pfile' height='50px' /></td><td>$price</td><td>$qty</td><td>$tot</td><td>$date</td><td><a href=order.php?cid=$cid&status=cancel>Cancel</a></td></tr>";
}
else
{
echo "<tr><td><input type='radio' name='cid' value='$cid'>$cid</td><td><img src='upload/$pimage' height='50px' /></td><td>$pname</td><td><img src='upload/$pfile' height='50px' /></td><td>$price</td><td>$qty</td><td>$tot</td><td>$date</td><td>$status</td></tr>";
}	
}

		  
		  ?>
          
                <?php
				}
				}
				?>
                </table>
		 <h3>Add Review</h3>
				Review<br>
				<input type='text' name='review' required ><br>
				<input type='submit' name='checkout' value='Add Review' >
                </form>	
								
					</div>				
				</div>
			</section>
<?php
if(isset($_POST['checkout']))
{
$stid=$_SESSION['stid'];
$cid=$_POST['cid'];
$t=mysql_query("select * from cart where stid=$stid and cid='$cid'");
$w=mysql_fetch_array($t);
$pid=$w['pid'];

$review=$_POST['review'];
$date=date("Y-m-d");
$q=mysql_query("select * from  reviews where stid='$stid' and cid='$cid' and pid='$pid'")or die(mysql_error());
$n=mysql_num_rows($q);
if($n>0)
{
//mysql_query("update reviews set review='$review',date='$date' where cid='$cid' and pid='$pid' and stid='$stid'");
echo "<script type='text/javascript'>alert('Product order review already added');</script>";
}
else
{
	
$pr=0;
		$nr=0;
		$review_txt=$_POST['review'];
$negatives= array('bad', 'worst', 'worse' ,'low','less','poor');

foreach ($negatives as $negative) {
  if (strpos($review_txt, $negative) !== FALSE) {
$nr++;
    }
}

$postives= array('good', 'best', 'better' ,'high','righ','more','cute','love');

foreach ($postives as $postive) {
  if (strpos($review_txt, $postive) !== FALSE) {
$pr++;
    }
}	
	
	$q=mysql_query("select * from classification where pid='$pid'");
	$w=mysql_num_rows($q);
	if($w>0)
	{
		$q=mysql_query("select * from classification where pid='$pid'");
	
	while($r=mysql_fetch_array($q))
		{
		$pr1=$pr+$r['positive'];
		$nr1=$nr+$r['negative'];

		mysql_query("update classification set positive='$pr1',negative='$nr1' where pid='$pid'")or die(mysql_error(0));
		}
		
		
	}
	else
	{
	mysql_query("insert into classification(pid,positive,negative)values('$pid','$pr','$nr')");
	
	}
	
	
	
mysql_query("insert into reviews(stid,cid,review,date,pid)values('$stid','$cid','$review','$date','$pid')")or die(mysql_error());
echo "<script type='text/javascript'>alert('Product order review added Successfully');</script>";
}
}
$status=$_GET['status'];
$cid=$_GET['cid'];
if($status=='cancel')
{
mysql_query("update cart set status='cancel' where cid='$cid'");

$t=mysql_query("select * from cart where cid=$cid");
		while($w=mysql_fetch_array($t))
		{
$pid=$w['pid'];
$cid=$w['cid'];
$status=$w['status'];
$qty=$w['qty'];
mysql_query("update product set qty=qty+$qty where pid='$pid'");
}

echo "<script type='text/javascript'>alert('Product order cancelled Successfull');</script>";
echo '<meta http-equiv="refresh" content="0;url=order.php">';
}
include "footer.php";
?>   