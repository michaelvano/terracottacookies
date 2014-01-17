<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Products";
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";
$page = "admin";
$subPage = "products";
$thisPage = "/admin/products.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');






/* =======================
	DELETES CATEGORY
=========================*/
if (($_action == "deleteCat") && $_id != "")
{
	$delete = deleteInfo("category", "id", $_id);
	if ($delete) {$_msg = 5;} else {$_msg = 6;}
	$_action = "viewCat";
}









/* =======================
	ADDS / EDITS CATEGORIES
=========================*/
if ($_action == "insertCat" || $_action == "updateCat")
{
	extract($_POST);
	$seoName = seoName($name);	
	if ($name == "") {$nameNeeded = true;}
	else
	{
		if ($_action == "insertCat")
		{
			// CHECKS IF CATEGORY EXISTS ALREADY
			if ($parent != "")
			{
				$doCheckName = mysql_query("SELECT `id` FROM `category` WHERE `seo`='".$seoName."' AND `parent`='".$parent."'");
				if (mysql_num_rows($doCheckName) > 0) {$checkName = mysql_fetch_assoc($doCheckName);} else {$checkName = array();}
			}
 			else { $checkName = getInfo("category", "seo", $seoName); }
 			
			if (!empty($checkName)) {$alreadyExists = true;}
		} 
		elseif ($_action == "updateCat")
		{
			$oldName = getSingleValue("seo", "category", "id", $_id);
			if ($oldName != $seoName)
			{
				if ($parent != "")
				{
					$doCheckName = mysql_query("SELECT `id` FROM `category` WHERE `seo`='".$seoName."' AND `parent`='".$parent."'");
					if (mysql_num_rows($doCheckName) > 0) {$checkName = mysql_fetch_assoc($doCheckName);} else {$checkName = array();}
				}
	 			else { $checkName = getInfo("category", "seo", $seoName); }
				$checkName = getInfo("category", "seo", $seoName);
				if (!empty($checkName)) {$alreadyExists = true;}
			}
		}
	}
	
	if (!$nameNeeded && !$alreadyExists)
	{
		if ($parent == "") {$parent = 0;}
		
		$fields = array("name", "seo", "parent");
		$values = array($name, $seoName, $parent);
		if ($_action == "insertCat")
		{
			array_unshift($fields, "is_combo");
			array_unshift($values, $type);
			$insert = insertInfo("category", $fields, $values);
			if ($insert) {$_msg = 1; $_action = "viewCat";} else {$_msg = 2; $_action = "addCat";}
		}
		elseif ($_action == "updateCat" && $_id != "")
		{
			if (isset($type))
			{
				array_unshift($fields, "is_combo");
				array_unshift($values, $type);
			}
			$update = updateInfo("category", $fields, $values, "id", $_id);
			if ($update) {$_msg = 3; $_action = "viewCat";} else {$_msg = 4; $_action = "editCat";}
		}
	} 
	else 
	{
		$error = true;
		if ($_action == "insertCat") {$_action = "addCat";}
		elseif ($_action == "updateCat") {$_action = "editCat";}
	}
}









/* =======================
	DELETES PRODUCT
=========================*/
if ($_action == "delete" && $_id != "")
{
	$delete = deleteInfo("product", "id", $_id);
	if ($delete) {$_msg = 11;} else {$_msg = 12;}
	
}









/* =======================
	ADD/EDIT PRODUCT
=========================*/
if ($_action == "insert" || $_action == "update")
{
	extract($_POST);
		
	//check for errors
	if ($category == "") {$categoryNeeded = true;}
	if ($name == "") {$nameNeeded = true;}
	if ($code == "") {$codeNeeded = true;}
	if ($price != "" && !is_numeric($price)) {$priceNotNumber = true;}
	elseif ($price != "" && !is_float($price)) {floatval($price);}
	if ($each != "" && !is_numeric($each)) {$eachNotNumber = true;}
	elseif ($each != "" && !is_float($each)) {floatval($each);}
	if (!empty($availability)) {$availability = serialize($availability);}
	
	// create arrays to use in insert and update functions
	$fields = array("category", "name", "code", "size", "pack", "price", "each", "availability", "is_taxable", "taxable_amount");
	$values = array($category, $name, $code, $size, $pack, $price, $each, $availability, $is_taxable, $taxable_amount);
	
	if (!$categoryNeeded && !$nameNeeded && !$codeNeeded && !$priceNotNumber && !$eachNotNumber)
	{
		// insert information
		if ($_action == "insert")
		{			
			$insert = insertInfo("product", $fields, $values);
			
			if ($insert) {$_msg = 7;} else {$_msg = 8; $_action = "add";}
		}
		elseif ($_action == "update")
		{
			$update = updateInfo("product", $fields, $values, "id", $_id);
			
			if ($update) {$_msg = 9;}	else {$_msg = 10; $_action = "edit";}			
		}
		
		
	}
	else
	{
		$error = true;
		if ($_action == "insert") {$_action = "add";}
		elseif ($_action == "update") {$_action = "edit";}
	}

}









if (!$loggedIn) {echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/?_msg=102">'; exit;}
elseif (!$isAdmin) {echo 'You do not have permissions to view this page';}
else
{
	include($_SERVER['DOCUMENT_ROOT']."/admin/nav.php");
	?>
		
	<div class="mainContent">
	
		<div class="clear10"></div>
		
		<? // HEADING TEXT ?>	
		<h1 class="left">
			<?
			switch($_action)
			{
				case "add": echo 'Add Product'; break;
				case "edit": echo 'Edit Product'; break;
				case "addCat": echo 'Add Category'; break;
				case "addSubCat": echo 'Add Category'; break;
				case "editCat": echo 'Edit Category'; break;
				case "viewCat": echo 'Categories'; break;
				default: echo 'Manage Products'; break;
			}
			?>
		</h1>
		
		
		
		
		
		
		
		
		
		<?
		// SUB MENU AT TOP
		if ($_action == "viewCat" || $_action == "addCat" || $_action == "editCat" || $_action == "addSubCat")
		{
			?>
			<div class="right" style="margin:0 0 20px 0;">
				<div class="clear10"></div>
				<a href="<? echo $thisPage; ?>?_action=addCat" class="redButtonSmall right" style="margin:0 0 0 15px">Add Main Category + </a>
				<a href="<? echo $thisPage; ?>?_action=viewCat" class="redButtonSmall right" >View Categories</a>
			</div>
			<?
		}
		
		else 
		{
			?>
			<div class="right" style="margin:0 0 20px 0;">
				<div class="clear10"></div>
				<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add Product + </a>
				<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View Products</a>
			</div>
			<?
		}
				
		?> <div class="clear20"></div> <?
		
		
		
		
		
		
		
		
		
		// NOTIFICATIONS
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Category has been added.</div>'; break;
				case 2: echo '<div class="error">Category could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">Category has been updated.</div>'; break;
				case 4: echo '<div class="error">Category could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">Category has been deleted.</div>'; break;
				case 6: echo '<div class="error">Category could not be deleted. Please try again.</div>'; break;
				
				case 7: echo '<div class="success">Product has been added.</div>'; break;
				case 8: echo '<div class="error">Product could not be added. Please try again.</div>'; break;
				case 9: echo '<div class="success">Product has been updated.</div>'; break;
				case 10: echo '<div class="error">Product could not be updated. Please try again.</div>'; break;
				case 11: echo '<div class="success">Product has been deleted.</div>'; break;
				case 12: echo '<div class="error">Product could not be deleted. Please try again.</div>'; break;
			}		
			echo '<div class="clear10"></div>';
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			SHOW CATEGORY FORM
		=========================*/
		if ($_action == "addCat" || $_action == "editCat" || $_action == "addSubCat") 
		{
			if ($error)
			{
				echo '<div class="error">';
					if ($nameNeeded) {echo '<span class="error">Categroy Name is needed.</span>';}				
					if ($alreadyExists) {echo '<span class="error">Name already exists in that category.</span>';}
				echo '</div>';
				echo '<div class="clear10"></div>';
			}
			
			$categories = getInfo("category", "parent", 0, "name", "ASC");
				
			if (($_action == "addSubCat") && empty($categories)) { echo 'Please create a main category first before creating a sub category';}
			else
			{
				if ($_action == "addSubCat" && $_id != "") {$parent = $_id;}
				elseif ($_action == "editCat")
				{
					$getCategoryInfo = getInfo("category", "id", $_id);
					extract($getCategoryInfo[0]);
				}
				
				?>		
				<form enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>">
					<?
					if ($_action == "addSubCat" || $parent != 0)
					{
						?>
						<label>Parent Category: </label>
						<select name="parent">
							<?
							foreach($categories AS $option)
							{
								?>
								<option value="<? echo $option['id']; ?>" <? checkSelected($option['id'], $parent); ?> >
									<? echo stripslashes($option['name']); ?>
								</option>
								<?
								getCategoryList($option['id'], 0, $parent);
							}
							?>
						</select>
						<div class="clear"></div>
						<?
					}
					
					if ($_action != "addSubCat" && $parent == 0)
					{
						?>
						<label>Category Type: </label>
						<select name="type">
							<option value="0" <? checkSelected($is_combo, 0); ?>>Original Menu</option>
							<option value="1" <? checkSelected($is_combo, 1); ?>>Combo Menu</option>
						</select>
						<div class="clear"></div>
						<?
					}
					?>
					<label>Category Name: </label>
					<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($nameNeeded || $alreadyExists) {echo 'required';} ?>" />
					<div class="clear"></div>
					<?
					if ($_action == "editCat") { echo '<input type="hidden" name="_action" value="updateCat" /><input type="hidden" name="_id" value="'.$_id.'" />'; }
					elseif ($_action == "addCat" || $_action == "addSubCat") { echo '<input type="hidden" name="_action" value="insertCat" />';}
					?>
					<button type="submit" class="redButtonSmall">
						<?
						switch($_action) 
						{
							case "addCat": echo 'Add Category'; break;
							case "addSubCat": echo 'Add Sub Category'; break;
							case "editCat": echo 'Update Category'; break;
						}
						?>
					</button>
					<div class="clear"></div>
				</form>
				<?
			}
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			PRODUCTS FORM
		=========================*/
		elseif ($_action == "add" || $_action == "edit") 
		{
			$categories = getInfo("category", "parent", 0, "name", "ASC");
			$months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'Sepetember', 'October', 'November', 'December');
			$monthNumbers = array(1,2,3,4,5,6,7,8,9,10,11,12);
						
			if ($_action == "edit")
			{
				$productInfo = getInfo("product", "id", $_id);
				extract($productInfo[0]);
				if ($availability != "") {$availability = unserialize($availability);}
				
			}
			
			if ($error)
			{
				echo '<div class="error">';
					if ($categoryNeeded) {echo '<span class="error">Please select a category.</span><br />';}				
					if ($nameNeeded) {echo '<span class="error">Product name needed.</span><br />';}
					if ($codeNeeded) {echo '<span class="error">Product Code is needed.</span><br />';}
					if ($priceNotNumber) {echo '<span class="error">Please enter a valid number for price.</span><br />';}
					if ($eachNotNumber) {echo '<span class="error">Please enter a valid number for each.</span><br />';}
				echo '</div>';
				echo '<div class="clear20"></div>';
			}
			?>
			
			<script>		
				$(document).ready(function()
				{	
					<? if ($is_taxable != 1) { echo '$("#taxableAmount").hide();'; } ?>
					
					$("#is_taxable").change(function() {
						if ($(this).val() == 1) { $("#taxableAmount").fadeIn(400); }
						else { $("#taxableAmount").fadeOut(400); }
					});
					
					
				});		
			</script>
			
			<style>
				label {width:150px;}
			</style>

				
			<form enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>"> 
				
				<label>Category: </label>
				<select name="category">
					<?
					foreach($categories AS $option)
					{
						?>
						<option value="<? echo $option['id']; ?>" <? checkSelected($option['id'], $category); ?> >
							<? echo stripslashes($option['name']); ?>
						</option>
						<?
						getCategoryList($option['id'], 0, $category);
					}
					?>
				</select>
				<div class="clear"></div>
				
				<label>Product Name: </label>
				<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($nameNeeded || $productAlreadyExists) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Code: </label>
				<input type="text" name="code" value="<? echo stripslashes($code); ?>" class="<? if ($codeNeeded) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Size / Combo: </label>
				<input type="text" name="size" value="<? echo stripslashes($size); ?>" />
				<div class="clear"></div>
				
				<label>Pack / Case Amount: </label>
				<textarea name="pack" style="resize:none; width:335px; height:30px;"><? echo stripslashes($pack); ?></textarea>
				<? /* <input type="text" name="pack" value="<? echo stripslashes($pack); ?>" /> */ ?>
				<div class="clear"></div>
				
				<label>Price: $</label>
				<input type="text" name="price" value="<? echo stripslashes($price); ?>" class="<? if ($priceNotNumber) {echo 'required';} ?>" />
				<div class="clear"></div>			
				
				<label>Each: $</label>
				<input type="text" name="each" value="<? echo stripslashes($each); ?>" class="<? if ($eachNotNumber) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Is Taxable: </label>
				<select name="is_taxable" id="is_taxable">
					<option value="1" <? checkSelected($is_taxable, 1); ?>>Yes</option>
					<option value="0" <? checkSelected($is_taxable, 0); ?>>No</option>
				</select>
				<div class="clear"></div>
				
				<div id="taxableAmount">
					<label>Taxable Amount: $</label>
					<input type="text" name="taxable_amount" value="<? echo stripslashes($taxable_amount); ?>" />
					<div class="right" style="margin:0 0 0 5px; width:170px; ">Note: Leave empty or put 0.00 to make full amount taxable.</div>
					<div class="clear"></div>
				</div>
				
				<label>Availability:</label>
				<div class="clear"></div>
				<span class="italic">Do not check anything if product is available all year round.</span>
				<div class="clear"></div>
				<?
				for ($i=0; $i<12; $i++)
				{
					?>
					<input id="month<? echo $i; ?>" type="checkbox" name="availability[]" class="checkbox" value="<? echo $monthNumbers[$i]; ?>" <? checkChecked($monthNumbers[$i], $availability); ?> />
					<label for="month<? echo $i; ?>" class="checkbox"><? echo stripslashes($months[$i]); ?></label>	
					<?
					if ($i == 5) {echo '<div class="clear"><div>';}
				}
				?>
				
								
				<div class="clear20"></div>
				
				<?
				if ($_action == "edit")
				{
					?>
					<input type="hidden" name="_action" value="update" />
					<input type="hidden" name="_id" value="<? echo $_id; ?>" />
					<?
				}
				elseif ($_action == "add")
				{
					?>
					<input type="hidden" name="_action" value="insert" />
					<?
				}
				?>
		
				<button type="submit" class="redButtonSmall">
					<? if ($_action == "edit") {echo 'Update';} elseif ($_action == "add") {echo 'Add';} ?>
					Product
				</button>
				<div class="clear"></div>
			</form>
			<?
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			SHOW CATEGORIES
		=========================*/
		elseif ($_action == "viewCat") 
		{
			$originalCategories = array();
			$originalQuery = mysql_query(" SELECT * FROM `category` WHERE `parent`=0 AND `is_combo`=0 ORDER BY `name` ASC; ");
			if (mysql_num_rows($originalQuery) > 0) {while ($x = mysql_fetch_assoc($originalQuery)) {$originalCategories[] = $x;} }
			
			$comboCategories = array();
			$comboQuery = mysql_query(" SELECT * FROM `category` WHERE `parent`=0 AND `is_combo`=1 ORDER BY `name` ASC; ");
			if (mysql_num_rows($comboQuery) > 0) {while ($x = mysql_fetch_assoc($comboQuery)) {$comboCategories[] = $x;} }
			
			?>
			<h2> Original Menu Categories </h2>
			<table class="listing tablePadding">
				<thead>
					<tr>				
						<th class="textLeft">Name</th>
						<th colspan="3"></th>		
					</tr>
				</thead>
				<?
				if (empty($originalCategories)) {echo '<td colspan="3">There are no categories.</td>';}
				else
				{
					foreach ($originalCategories AS $row)
					{
						?>
						<tr valign="top">
							<td class="bold"><? echo strtoupper(stripslashes($row['name'])); ?></td>	
							<td class="textCenter width100"><a href="<? echo $thisPage; ?>?_action=addSubCat&_id=<? echo $row['id'] ?>">[Add Sub Category]</a></td>
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=editCat&_id=<? echo $row['id'] ?>">[EDIT]</a></td>
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=deleteCat&_id=<? echo $row['id'] ?>" class="delete">[DELETE]</a></td>
							</td>
						</tr>
						<?
						getSubCategories($row['id']);
					}
				}
				?>
				
			</table>
			<div class="clear40"></div>
			<div class="brownDividerLine"></div>
			<div class="clear30"></div>
			
			<h2> Combo Menu Categories </h2>
			<table class="listing tablePadding">
				<thead>
					<tr>				
						<th class="textLeft">Name</th>
						<th colspan="3"></th>		
					</tr>
				</thead>
				<?
				if (empty($comboCategories)) {echo '<td colspan="3">There are no categories.</td>';}
				else
				{
					foreach ($comboCategories AS $row)
					{
						?>
						<tr valign="top">
							<td class="bold"><? echo strtoupper(stripslashes($row['name'])); ?></td>	
							<td class="textCenter width100"><a href="<? echo $thisPage; ?>?_action=addSubCat&_id=<? echo $row['id'] ?>">[Add Sub Category]</a></td>
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=editCat&_id=<? echo $row['id'] ?>">[EDIT]</a></td>
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=deleteCat&_id=<? echo $row['id'] ?>" class="delete">[DELETE]</a></td>
							</td>
						</tr>
						<?
						getSubCategories($row['id']);
					}
				}
				?>
				
			</table>
			<?
		}
		
		
		
		
		
		
		
		
		/* =======================
			SHOWS PRODUCTS
		=========================*/
		else
		{
			
			if (isset($_POST['filterCategory'])) {$_SESSION['filter_category'] = $_POST['filterCategory'];}
			
			$mainCategories = getInfo("category", "parent", 0, "name", "ASC");
			
			// $products = getInfo("product", "", "", "code", "ASC", $_start, $_limit);
			
			$products = getInfo("product", "", "", "code", "ASC");
			
			/*
			$getAllProducts = getInfo("product");
			$totalProducts = count($getAllProducts);
			$numberOfPages = ceil($totalProducts/$_limit);
			*/
			
			// if ($numberOfPages > 1) { showPageNumbers($_page, $numberOfPages, $thisPage); }
			?>
			
			<?
			/*
			<script>		
				$(document).ready(function()
				{	
					$("#selectCategory").change(function() {
						$("#filterCategory").submit();
					});				
				});		
			</script>
			
			<form id="filterCategory" method="post" action="/admin/products.php">
				<label>Filter Products:</label>
				<select name="filterCategory" id="selectCategory"> 
					<option value="">== No Filter ==</option>
					<?
					if (!empty($mainCategories))
					{
						foreach($mainCategories AS $row)
						{
							?>
							<option value="<? echo $row['id']; ?>" <? checkSelected($_SESSION['filter_category'], $row['id']); ?>>
								<? echo stripslashes($row['name']); ?>
							</option>
							<?
						}
					}
					?>
				</select>
			</form>
			*/ 
			?>
			
			<table class="listing tablePadding">
				<thead>
					<tr>
						<th class="textLeft">Code</th>				
						<th class="textLeft">Product</th>
						<th>Category</th>
						<th>Main Category</th>
						<th colspan="2"></th>		
					</tr>
				</thead>
				<?
				if (empty($products)) {echo '<td colspan="5">There are no products.</td>';}
				else
				{
					foreach ($products AS $row)
					{
						$getCategory = getInfo("category", "id", $row['category']);
						$categoryInfo = $getCategory[0];
						
						// GETS MAIN CATEGORY NAME
						if ($categoryInfo['parent'] != 0)
						{
							$mainCategory = false;
							$parentID = $categoryInfo['parent'];
							
							while(!$mainCategory)
							{
								$getParentCategory = getInfo("category", "id", $parentID);
								$checkCategory = $getParentCategory[0];
								if ($checkCategory['parent'] == 0)
								{
									$mainCategory = true;
									$mainCategoryName = stripslashes($checkCategory['name']);
								}
								
								else {$parentID = $checkCategory['parent'];}
							}
						}
						else { $mainCategoryName = stripslashes($categoryInfo['name']); }
					
						?>
						<tr valign="top">
							<td><? echo stripslashes($row['code']) ?></td>
							<td><? echo stripslashes($row['name']) ?></td>
							<td class="textCenter"><? echo stripslashes($categoryInfo['name']); ?></td>
							<td class="textCenter"><? echo stripslashes($mainCategoryName); ?></td>				
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=edit&_id=<? echo $row['id'] ?>">[EDIT]</a></td>
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=delete&_id=<? echo $row['id'] ?>" class="delete">[DELETE]</a></td>
						</tr>
						<?
						$i++;
					};
				};
				?>
				
			</table>
			<div class="clear20"></div>
			<?//	if ($numberOfPages > 1) { showPageNumbers($_page, $numberOfPages, $thisPage); } ?>
			
			<?
		}
		
		
		
		
		
		
		
		
		?>
	
	</div>
	
	<div class="clear40"></div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>