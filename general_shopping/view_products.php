<?php
include "header.php";
?>
<section class="main-content">				
				<div class="row">
					
					<div class="span12">					
						<h4 class="title"><span class="text"><strong>View Product</strong></span></h4>
        <table align="center" cellpadding="5" cellspacing="0" border="1" style="text-align:center;" width="100%">
          <tr><td>Product name</td><td>Product image</td><td>Price</td><td>Quantity</td></tr>
          <?php
		
$u=mysql_query("select * from product");
		while($y=mysql_fetch_array($u))
		{
$pname=$y['pname'];
$cat=$y['cat'];
$price=$y['med_price'];
$qty=$y['qty'];
$pimage=$y['pimage'];
$psize=$y['psize'];

		?>

          <?php
		
echo "<tr><td>$pname</td><td><img src='upload/$pimage' width='50px'/></td><td>$price</td><td>$qty</td></tr>";
		  ?>
          
                <?php
				
				}
				?>
                </table>
           </div>				
				</div>
			</section>
<?php
include "footer.php";
?>   