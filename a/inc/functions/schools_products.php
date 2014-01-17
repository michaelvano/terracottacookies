<?

function listCategoriesAndProducts($ID, $hierarchy=0, $headingUsed=false, $subPage, $subSubPage="")
{
	// GETS PRODUCTS FOR THIS PARTICULAR CATEGORY
	$products = getInfo("product", "category", $ID, "code", "ASC");
			
	if (!empty($products))
	{
		if (!$headingUsed)
		{
			?>
			<tr class="heading">
				<td <? if ($subSubPage == "combo") {echo 'style="width:80px;"';} ?>>Code</td>
				<td>Product</td>
				<?
				if ($subSubPage == "combo") 
				{
					?>
					<td style="width:120px;">Case Amount</td>
					<td>Combo</td>
					<?
				}
				else 
				{
					?>				
					<td>Size</td>
					<td>Pack</td>
					<?
				}
				?>
				<td>Price</td>
				<td> <? if ($subPage == "products") {echo 'Each';} elseif ($subPage=="order") { echo 'Quantity'; } ?> </td>
			</tr>
			<?
			$headingUsed = true;
		}
		
		foreach($products AS $product)
		{
			if ($product['availability'] != "") { $productAvailability = unserialize($product['availability']); }
			else { $productAvailability = array(); }
			$thisMonth = date('m');
			
			?>
			<tr class="product">
				<td class="bold"><? echo stripslashes($product['code']); ?></td>
				<td><? echo stripslashes($product['name']); ?></td>
				<?
				if ($subSubPage == "combo") 
				{
					?>
					<td><? echo stripslashes(nl2br($product['pack'])); ?></td>
					<td>$<? echo stripslashes($product['size']); ?></td>
					<?
				}
				else
				{
					?>
					<td><? echo stripslashes($product['size']); ?></td>
					<td><? echo stripslashes(nl2br($product['pack'])); ?></td>
					<?				
				}
				?>
				<td class="bold">$<? echo number_format($product['price'], 2); ?></td>
				<td class="textRight">
					<?
					if ($subPage == "products"){ echo number_format($product['each'], 2);}
					elseif ($subPage=="order")
					{
						if (!empty($productAvailability))
						{
							if (in_array($thisMonth, $productAvailability)) { ?> <input type="text" name="productQuantity[]" class="quantity" /> <? }
							else { ?> <input type="text" name="productQuantity[]" class="quantity disabled" readonly="readonly" /> <? }
						}
						else { ?> <input type="text" name="productQuantity[]" class="quantity" /> <? }
						?>
						
						<input type="hidden" name="productID[]" value="<? echo $product['id']; ?>" />
						<?
					}
					?>
				</td>
			</tr>
			<?
		}
	}
	
	
	
	
	// GETS THE SUB CATEGORIES OF THIS CATEGORY
	$getSubCategories = getInfo("category", "parent", $ID);
	
	if (!empty($getSubCategories))
	{	
	 	$hierarchy = $hierarchy + 1;
	 	
		foreach ($getSubCategories AS $row)
		{
			?>
			<tr class="vTop <? if ($hierarchy == 1) { if ($subSubPage == "combo") {echo 'subCombo';} else {echo 'sub';} } elseif ($hierarchy == 2) {echo 'ter';} ?>">
				<td colspan="6">
					<? echo stripslashes($row['name']); ?>
				</td>
			</tr>
			<?
					
			listCategoriesAndProducts($row['id'], $hierarchy, $headingUsed, $subPage, $subSubPage);
		}
		
	}
}


?>