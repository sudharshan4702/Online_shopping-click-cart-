<?php include "header.php"; ?>
<section class="header_text sub">
				<h4><span>New products</span></h4>
			</section>
<section class="main-content">
				
				<div class="row">						
					<div class="span12">								
						<ul class="thumbnails listing-products">
						<?php
		$cat=$_GET['cat'];
		if($cat!='')
		{
		$t=mysql_query("select * from product where cat='$cat'");
		}
		else
		{
		$t=mysql_query("select *,product.pid as pid1 from product left join classification on product.pid=classification.pid order by classification.positive desc");
		}
		while($w=mysql_fetch_array($t))
		{
		$pimage=$w['pimage'];
$pname=$w['pname'];
$pdescp=$w['pdescp'];
$price=$w['med_price'];
$qty=$w['qty'];
$cat=$w['cat'];
$subcat=$w['subcat'];
$pid1=$w['pid1'];
		?>
		
							<li class="span3">
								<div class="product-box">
									<span class="sale_tag"></span>												
									<img alt="" src="<?php echo "upload/$pimage"; ?>" height="100px"><br/>
									<a href="" class="title"><?php echo "$pname"; ?></a><br/>
									<?php echo "$pdescp"; ?>
									<p class="price"><?php echo "$med_price"; ?></p>
									<a href="addtocart.php?pid=<?php echo $pid1; ?>"><input type="button" value="View Product" class="btn btn-inverse large" /></a>
								</div>
							</li>
							<?php
							}
							?>
							       

						</ul>								
						<hr>
						
					</div>
					
				</div>
			</section>
 			
<?php include "footer.php"; ?>