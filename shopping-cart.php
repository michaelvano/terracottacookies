<?
require_once('a/inc/bootstrap.php');








// CHECKS OF SHOPPING CART HAS BEEN MADE, IF NOT CREATE IT
$checkCart = getInfo("store_temp_carts", "session_id", $sessionID);
if (empty($checkCart))
{
	$fields = array("session_id", "date_created", "ip_address");
	$values = array($sessionID, "NOW()", $ipAddress);
	$insert = insertInfo("store_temp_carts", $fields, $values);
}









// REMOVES ITEM FROM CART
if ($_action == "remove" && $_id != "") { $remove = deleteInfo("store_temp_items", "id", $_id); }









// UPDATES THE CART INFORMATION
if ($_action == "updateQuantities" && !empty($_POST['itemID']) && !empty($_POST['quantity']))
{
	$itemID = $_POST['itemID'];
	$quantities = $_POST['quantity'];
	
	$totalItems = count($itemID);
	
	for ($i=0; $i<$totalItems; $i++)
	{
		$update = updateInfo("store_temp_items", array('quantity'), array($quantities[$i]), "id", $itemID[$i]);
		if (!$update) {$updateFailed = true;}
	}
	
	if (!$updateFailed) {$_msg = 1;} else {$_msg = 2;}
	// $update = updateInfo("store_temp_items", $fields, $values, "id", $_id);
}









// ADDS ITEM TO CART IF ACTION IS SET
if ($_action == "addToCart" && !empty($_POST['productID']) && !empty($_POST['productQuantity']))
{	
	$productID = $_POST['productID'];
	$productQuantity = $_POST['productQuantity'];
	
	$totalItems = count($productQuantity );
	
	for($i=0; $i<$totalItems; $i++)
	{
		if ($productQuantity[$i] != "" && is_numeric($productQuantity[$i]) && $productQuantity[$i] != 0)
		{
			$thereIsAValue = true;
			// Checks if item already exists in cart
			$itemExist = mysql_query("SELECT * FROM `store_temp_items` WHERE `session_id`='".$sessionID."' AND `product_id`='".$productID[$i]."'");
			
			// if item exists, update quantity
			if (mysql_num_rows($itemExist) == 1)
			{
				$info = mysql_fetch_assoc($itemExist);
				$quantity = ($info['quantity'] + $productQuantity[$i]);
				$update = mysql_query("UPDATE `store_temp_items` SET `quantity`='".$quantity."' WHERE `session_id`='".$sessionID."' AND `product_id`='".$productID[$i]."'");
			}
			
			// insert the new item into the shopping cart
			else
			{	
				$fields = array("session_id", "product_id", "quantity");
				$values = array($sessionID, $productID[$i], $productQuantity[$i]);
				$insert = insertInfo("store_temp_items", $fields, $values);
			}
		}
		
		if ($productQuantity[$i] != 0 && !is_numeric($productQuantity[$i])) {$notANumber = true;}
	}
}








// CHECK FOR ERRORS AND SUCH
if ($_action == "addToCart" && !$thereIsAValue) {$_msg = 3;}
if ($_action == "addToCart" && $notANumber) {$_msg = 4;}








// GET THE STORE CART ITEMS
$queryItems = "
	SELECT
		p.`id` AS `productID`,
		p.`code` AS `code`,
		p.`name` AS `name`,
		p.`size` AS `size`,
		p.`pack` AS `pack`,
		p.`price` AS `price`,
		p.`is_taxable` AS `is_taxable`,
		p.`taxable_amount` AS `taxable_amount`,
		i.`quantity` AS `quantity`,
		i.`id` AS `itemID`
	FROM `store_temp_items` AS `i`
	LEFT JOIN `product` AS `p` ON `i`.`product_id`=`p`.`id`
	WHERE `i`.`session_id`='".$sessionID."'
	;
";
$getCartItems = mysql_query($queryItems);
$cartItems = array();

while ($x = mysql_fetch_assoc($getCartItems)) {array_push($cartItems, $x);}
//$cartItems = getInfo("store_temp_items", "session_id", $sessionID);









// META DESCRIPTIONS
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";

$title = "Shopping Cart";
$page = "cart";
$breadcrumbMain = "Shopping Cart";
$mainLink = "/shopping-cart.php";
$thisPage = "/shopping-cart.php";

include('a/inc/header.php');









// ABOUT US SUB NAV
?>

<div id="checkingOut">

	<h1>
		Cart
		<div class="clear5"></div>
		<span class="helvetica bold size18 brown">Please review your order before checkout</span>
	</h1>
	
	<div class="brownDividerLine"></div>
	
	<?
	if ($_msg != "")
	{
		switch($_msg) 
		{
			case 1: echo '<div class="success">Quantities have been updated</div>'; break;
			case 2: echo '<div class="error">Quantities could not be updated. Please try again.</div>'; break;
			case 3: echo '<div class="error">You did not select any products to add to the cart.</div>'; break;
			case 4: echo '<div class="error">Please enter only numbers in the quantity boxes.</div>'; break;
		}
		echo '<div class="clear20"></div>';
	}
	?>
	
	<form method="post" action="<? echo $thisPage; ?>" >
		<table id="shoppingCart">
			<thead>
				<tr>
					<th></th>
					<th>Product</th>
					<th>Quantity</th> 
					<th>Price</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<?
				if (!empty($cartItems))
				{
					$subTotal = 0;
					$taxableTotal = 0;
					foreach($cartItems AS $row)
					{
						$itemTotal = ($row['quantity'] * $row['price']);
						if ($row['is_taxable'] == 1)
						{
							if ($row['taxable_amount'] == "" || $row['taxable_amount'] == "0.00")
							{
								$taxableTotal = $taxableTotal + $itemTotal;
							}
							else
							{
								$taxableTotal = $taxableTotal + ($row['taxable_amount'] * $row['quantity']);
							}
						}
						?>
						<tr>
							<td class="vMiddle">
								<a href="<? echo $thisPage; ?>?_action=remove&_id=<? echo $row['itemID']; ?>" class="blackButton left">
									Remove
								</a>
							</td>
							<td class="width290">
								<span class="bold"><? echo stripslashes($row['code']); ?></span><br />
								<? echo stripslashes($row['name']); ?><br />
								<? if ($row['size'] != "") {echo stripslashes($row['size']).'<br />';} ?>
								<? if ($row['pack'] != "") {echo stripslashes($row['pack']).'<br />';} ?>
							</td>
							<td class="width175">
								<input type="text" name="quantity[]" value="<? echo $row['quantity']; ?>" />
								<input type="hidden" name="itemID[]" value="<? echo $row['itemID']; ?>" />
							</td>
							<td class="width175"><? echo number_format($row['price'], 2); ?></td>
							<td class="width175 bold">
								<? echo '$'.number_format($itemTotal, 2, ".", ""); ?>
							</td>
						</tr>
						<?
						$subTotal = $subTotal + $itemTotal;
					}
				}
				
				else { echo '<td colspan="5">There are no items in your shopping cart</td>'; }
				
				$tax = ($taxableTotal * 0.13);
				// $tax = ($subTotal * 0.13);
				$grandTotal = $subTotal + $tax;
				
				$cartFields = array("subtotal", "tax");
				$cartValues = array($subTotal, $tax);
				updateInfo("store_temp_carts", $cartFields, $cartValues, "session_id", $sessionID);
				
				?>
			</tbody>
		</table>
		<div class="clear10"></div>
		<input type="hidden" name="_action" value="updateQuantities" />
		<div class="left" style="width:49%;">
			<a href="/schools/original-menu/" class="blackButton left">Back to Original Menu Order Form</a>
			<div class="clear10"></div>
			<a href="/schools/combo-menu/" class="blackButton left">Back to Combo Menu Order Form</a>
		</div>
		<div class="right" style="width:49%;">
			<button type="submit" name="updateQuantities" class="blackButton right">Update Quantities</button>
		</div>
		<div class="clear20"></div>
	</form>
		
	<table class="totals">
		<tr>
			<td class="textRight">Subtotal:</td>
			<td class="textLeft">$<? echo number_format($subTotal, 2); ?></td>
		</tr>
		<tr>
			<td class="textRight">HST:</td>
			<td class="textLeft">$<? echo number_format($tax, 2); ?></td>
		</tr>
		<tr>
			<td class="textRight">Total:</td>
			<td class="textLeft">$<? echo number_format($grandTotal, 2); ?></td>
		</tr>
	</table>
	
	<div class="clear20"></div>
	
	<?
	if (!empty($cartItems))
	{
		?>
		<a href="/login.php" class="redButtonLarge right">
			Pay Later
		</a>
		<?
	}
	?>
	
	<div class="clear40"></div>
	
</div>
<?










?>

<? include('a/inc/footer.php'); ?>