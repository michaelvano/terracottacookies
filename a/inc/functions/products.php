<?

function showProducts($products="", $today="", $isDealer, $thisPage="", $_page="", $numberOfPages="") 
{
	
	if ($numberOfPages > 1) { showPageNumbersProducts($_page, $numberOfPages, $thisPage); }
	echo '<div class="clear10"></div>';
	
	$y = 1;
	if (empty($products)) {echo 'There are no products listed in this category yet.';}
	else 
	{

		foreach ($products AS $product)
		{
			$subCategory = getInfo("store_categories", "id", $product['category_id']);
			$subCategorySeo = $subCategory[0]['seo_name'];
			$category = getInfo("store_categories", "id", $subCategory[0]['cat_id']);
			$categorySeo = $category[0]['seo_name'];
			
			$productImage = getSingleValue("image", "store_products_images", "product_id", $product['id']);
			
			?>
			<div class="product <? if ($y != 3) {echo ' spacer ';} ?>">
				<div class="imageContainer">
					<a href="/products/<? echo $categorySeo; ?>/<? echo $subCategorySeo; ?>/<? echo $product['seo_name']; ?>/">
						<?
						if ($productImage != "") {echo '<img src="/a/i/products/'.$productImage.'" />';}
						else {echo '<img src="/a/i/default.png" />';}
						?>						
					</a>
				</div>
				<a href="/products/<? echo $categorySeo; ?>/<? echo $subCategorySeo; ?>/<? echo $product['seo_name']; ?>/" class="bold szie14 darkGrey"><? echo stripslashes($product['name']); ?></a>
				<div class="clear10"></div>
				<?
				if ($product['out_of_stock'] == 1)
				{
					if (!$isDealer) { ?> <span class="onSale">$<? echo number_format($product['price'], 2); ?></span> <? } ?>
					<span class="error">(Out of Stock)</span>
					<?
				}
				elseif ($product['sale_price'] != "0.00" && $today < $product['sale_until'])
				{
					if (!$isDealer) { ?> <span class="onSale">$<? echo number_format($product['price'], 2); ?></span> &nbsp; <span class="green bold">$<? echo number_format($product['sale_price'], 2); ?></span> <? }
				}
				else
				{
					if (!$isDealer) { ?> <span class="green">$<? echo number_format($product['price'], 2); ?></span> <? }
				}
				
				?>
				<div class="clear10"></div>
				<a href="/products/<? echo $categorySeo; ?>/<? echo $subCategorySeo; ?>/<? echo $product['seo_name']; ?>/" class="purpleButton left">Learn More &#9658; </a>
				<div class="clear"></div>
			</div>
			<?
			if ($y == 3) {echo '<div class="clear40"></div>'; $y = 0;}
			
			$y++;
		}
	}
	
	echo '<div class="clear10"></div>';
	if ($numberOfPages > 1) { showPageNumbersProducts($_page, $numberOfPages, $thisPage); }
}

?>