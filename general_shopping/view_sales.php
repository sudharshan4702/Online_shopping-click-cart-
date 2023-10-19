<?php
include "config.php";
include "header.php";
?>
  <!-- Main -->
  <div id="main">
    <div class="cl">&nbsp;</div>
    <!-- Content -->
    <div id="content">
      <!-- Content Slider -->
      
      <!-- End Content Slider -->
      <!-- Products -->
      <div class="products">
        <div class="cl">&nbsp;</div>
          <div class="box search">
        <h2>View Order Details</h2>
<form action="" method="post">
        <table align="center" cellpadding="20" cellspacing="0" border="1" style="text-align:center;" width="100%">
          <tr><td>Order Id</td><td>Order date</td><td>Customer name</td><td>Product name</td><td>Price Per unit </td><td>Qty sold</td><td>Total Amount</td><td>Photo Image </td><td>Status</td></tr>
          <?php
		$t=mysql_query("select * from cart");
		while($w=mysql_fetch_array($t))
		{
$pid=$w['pid'];
$status=$w['status'];
if($status=='')
{
$status='Ordered';
}
$cqty=$w['qty'];
$date=$w['date'];
$pfile=$w['pfile'];
$stid=$w['stid'];
$cid=$w['cid'];
$k=mysql_query("select * from  user where stid='$stid'")or die(mysql_error());
$b=mysql_fetch_array($k);
$stname=$b['stname'];
$u=mysql_query("select * from product where pid=$pid");
		while($y=mysql_fetch_array($u))
		{

$pname=$y['pname'];
$pcode=$y['pcode'];
$price=$y['med_price'];

		?>

          <?php
		  $tot=($cqty*$price);
		    if($pfile=='')
		  {
echo "<tr><td><input type='radio' name='cid' value='$cid'>$cid</td><td>$date</td><td>$stname</td><td>$pname</td><td>$price</td><td>$cqty</td><td>$tot</td><td></td><td>$status</td></tr>";
		  }
		  else
		  {
echo "<tr><td><input type='radio' name='cid' value='$cid'>$cid</td><td>$date</td><td>$stname</td><td>$pname</td><td>$price</td><td>$cqty</td><td>$tot</td><td><img src='upload/$pfile' style='height:50px;'/></td><td>$status</td></tr>";
			  
		  }
		  ?>
          
                <?php
				}
				}
				?>
                </table>
				
				  <h3>Update Order status</h3>
				Status<br>
				<select name="ostatus" required>
				<option value="">Select</option>
				<option value="Pending">Pending</option>
				<option value="Delivered">Delivered</option>
				<option value="Cancelled">Cancelled</option>
				</select><br>
				<input type='submit' name='checkout' value='Update Order' >
                </form>	
				
				</form>	
            </div>
       
        
      </div>
        <div class="cl">&nbsp;</div>
      </div>
      <!-- End Products -->
    </div>
    <!-- End Content -->
    <!-- Sidebar -->
    <div id="sidebar">
      <!-- Categories -->
      <?php
	  include "sidebar.php";
	  ?>
      <!-- End Categories -->
    </div>
    <!-- End Sidebar -->
    <div class="cl">&nbsp;</div>
  </div>
  <!-- End Main -->  
 
<?php


if(isset($_POST['checkout']))
{
$ostatus=$_POST['ostatus'];
$cid=$_POST['cid'];
$date=date("Y-m-d");

mysql_query("update cart set status='$ostatus',date='$date' where cid='$cid'");
echo "<script type='text/javascript'>alert('Product order updated Successfull');</script>";
echo '<meta http-equiv="refresh" content="0;url=view_sales.php">';

}

include "footer.php";
?>   