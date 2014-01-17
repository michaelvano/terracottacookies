<?
require_once('a/inc/bootstrap.php');

session_regenerate_id();




// CHECK IF ORDER HAS BEEN PLACED
if ($_GET['confirmedOrder'] != 1) { header('Location: /shopping-cart.php'); }




//TRANSFER STORE CART INFO TO CONFIRMED CART
$getStoreCart = getInfo("store_temp_carts", "session_id", $sessionID);

if (!empty($getStoreCart))
{
	$storeCart = $getStoreCart[0];
	extract($storeCart);
	
	$total = $subtotal + $tax;
	
	$storeCartFields = array("session_id", "order_date", "ip_address", "school_name", "name", "address1", "city", "province", "postal_code", "phone", "mobile", "email", "shipping_same", "shipping_date", "is_pay_later", "wants_poster", "comments", "subtotal", "tax", "total");
	$storeCartValues = array($sessionID, "NOW()", $ipAddress, $school_name, $name, $address1, $city, $province, $postal_code, $phone, $mobile, $email, $shipping_same, $shipping_date, $is_pay_later, $wants_poster, $comments, $subtotal, $tax, $total); 
	$insertStoreCart = insertInfo("store_confirmed_carts", $storeCartFields, $storeCartValues);
	$orderID = mysql_insert_id();	
	



	// TRANSFER ALL THE TEMP ITEMS TO CONFIRMED ITEMS
	if ($insertStoreCart)
	{
		$tempStoreItems = getInfo("store_temp_items", "session_id", $sessionID);
	
		if (!empty($tempStoreItems))
		{
			foreach ($tempStoreItems AS $row)
			{
				$price = getSingleValue("price", "product", "id", $row['product_id']);
				$itemFields = array("order_id", "product_id", "quantity", "price");
				$itemValues = array($orderID, $row['product_id'], $row['quantity'], $price);
				$insertConfirmedItem = insertInfo("store_confirmed_items", $itemFields, $itemValues);
			}
		}
	}
	
	
	
	
	// GENERATE RECEIPT
	$message = '
		<html>
			<head></head>
			<body>				
	';
	
	$message .= generateReceipt($orderID, 1);
	
	$message .= '
			</body>
		</html>
	';
	
	
	
	
	// CREATE THE EMAIL AND SEND IT OUT
	$to  = getSingleValue("email", "store_confirmed_carts", "id", $orderID);
	$subject = 'Terra Cotta Cookies.com - Order#: '.$orderID.' Receipt';
	$from = 'orders@terracottacookies.com';
	$headers  = "From: ".$from."\r\n"; 
	$headers .= "Content-type: text/html\r\n";
	// $headers .= 'Bcc: michael@nobulmedia.com' . "\r\n";
	$headers .= 'Bcc: orders@terracottacookies.com' . "\r\n";
	
	mail($to, $subject, $message, $headers);
	
	
	
	
	// META DESCRIPTIONS
	$mdesc = "";	
	$mbots = "NOINDEX, NOFOLLOW";
	$canon = "";
	
	$title = "Order Placed - Pay Later";
	$page = "checkout";
	$breadcrumbMain = "Order Placed";
	$mainLink = "/shopping_checkout_pay-later_approved.php";
	$thisPage = "/shopping_checkout_pay-later_approved.php";
	
	include('a/inc/header.php');	
	
	
	
	
	?>
	<div id="checkingOut">
	
		<h1>Order Placed</h1>
		
		<div class="brownDividerLine"></div>
		
		<p class="bold">Please have cheque made out to: Terra Cotta Cookie Co. or cash ready for the driver when your order is delivered.</p>
		<p>An email has been sent with confirmation of your order and amount due. If you do not receive a confirmation email, or we have not confirmed your order within 24 hours, please call us immediately at 905-877-4216.</p>
		
		<div class="clear40"></div>
	</div>
	<?
	
}

else 
{
	?>
	<div id="checkingOut">
	
		<h1>Error Occured</h1>
		
		<div class="brownDividerLine"></div>
		
		<p class="bold">There was an error in our system and the order could not be made.</p>
		<p>Please notify us at 905-877-4216 of this error as well as your order so we can resolve this issue immediately.</p>
		<p>We apologize for any inconvenience.</p>
		
		<div class="clear40"></div>
	</div>
	<?
}










?>

<? include('a/inc/footer.php'); ?>