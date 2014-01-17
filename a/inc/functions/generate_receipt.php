<?
function generateReceipt($orderID, $forEmail)
{
	/*
	$forEmail 
		0: It is meant to be viewed in the back end Ordering system
		1: It is to be sent out for email and includes certain items and style for the customer
		2: Meant for printing out the receipt.
	*/
	
	$getConfirmedInfo = getInfo("store_confirmed_carts", "id", $orderID);
	$info = $getConfirmedInfo[0];
	$createDate = date_create($info['order_date']);
	$orderDate = date_format($createDate, "F d, Y");
	$dateCreate = date_create($info['shipping_date']);
	$requestedShippingDate = date_format($dateCreate, "F d, Y");
	
	// GET THE STORE CART ITEMS
	$queryItems = "
		SELECT
			p.`code` AS `code`,
			p.`name` AS `name`,
			p.`size` AS `size`,
			p.`pack` AS `pack`,
			i.`price` AS `price`,
			i.`quantity` AS `quantity`,
			i.`id` AS `itemID`
		FROM `store_confirmed_items` AS `i`
		LEFT JOIN `product` AS `p` ON `i`.`product_id`=`p`.`id`
		WHERE `i`.`order_id`='".$orderID."'
		ORDER BY p.`code` ASC
		;
	";
	$getCartItems = mysql_query($queryItems);
	$cartItems = array();

	while ($x = mysql_fetch_assoc($getCartItems)) {array_push($cartItems, $x);}
	
	// $getCartItems = getInfo("store_confirmed_items", "order_id", $orderID, "id", "ASC");
	$receipt = '
		<style>
			.clear {clear:both;}
			
			h1 {font-size:24px; font-family:Arial;}
			h2 {font-size:18px}
			
			.bold {font-weight:600;}
			
			.textRight {text-align:right;}
			.textLeft {text-align:left;}
			.textCenter {text-align:center;}
			
	';
	
	if ($forEmail == 2) {$receipt .= 'body {font-family: Arial; font-size:12px;}';}
	
	if ($forEmail == 1) { $receipt .= '#receipt {width:860px; padding:0 20px;}'; }
	elseif ($forEmail == 0 || $forEmail == 2) {$receipt .= '#receipt {width:95%; padding:0 20px;}';}
	
	$receipt .= '
			
			.shippedTo {float: left;}
			
			.orderInfo {
				float: right;
				margin: 0;
				border: 1px solid #000;
				width:300px;
				text-align:right;
				padding:10px;
				font-weight: bold;
			}
			
			.orderItems { border-collapse: collapse; width:100%; }
			.orderItems td, .orderItems th {padding:10px 12px;}
			.orderItems td {
				font-family:Arial;
	';
	
	if ($forEmail == 2) { $receipt .=' font-size:12px;'; }
	else { $receipt .= 'font-size:14px;'; }
	
	$receipt .='
				border:1px solid #000;
				vertical-align:top
			}
	';
	
	if ($forEmail == 2)
	{
		$receipt .= '
				.orderItems tr th {
					font-size:12px;
					font-weight:600;
					color:#000;
					background:#fff;
					border:1px solid #000;
					text-transform:uppercase;
				}
		';
	}
	
	else 
	{
		$receipt .= '
				.orderItems tr th {
					font-size:14px;
					font-weight:600;
					color:#fff;
					background:#000;
					border:1px solid #000;
					text-transform:uppercase;
				}
		';
	}
	
	$receipt .='
			
			.totals {
				font-family:Arial;
	';
	
	if ($forEmail == 2) { $receipt .= ' font-size:12px; '; }
	else {$receipt .= ' font-size:14px;'; }
	
	$receipt .= '
				font-weight:bold;
				text-transform:uppercase;
				float:right;
			}
			
		</style>
		
		<div id="receipt">
	';
	
	if ($forEmail == 1) { $receipt .= '<h1>Thank You for Your Order! </h1>'; }
	
	
	$receipt .= '
			<div class="shippedTo">
				<span class="bold">WILL BE SHIPPED TO:</span><br />
	';
	
	if ($info['school_name'] != "") {$receipt .= '<span class="bold">'.stripslashes($info['school_name']).'</span><br />';}
	
	$receipt .='
				'.stripslashes($info["name"]).'<br/ >
				'.stripslashes($info["address1"]).',<br />
				'.stripslashes($info["phone"]).'<br />
				'.stripslashes($info["city"]).' - ON - '.stripslashes($info['postal_code']).'
			</div>
			
			<div class="orderInfo">
				Order Date: '.$orderDate.'<br />
				Shipping Date: '.$requestedShippingDate.'<br />
				Order #: '.$orderID.'<br />
	';
	
	if ($info['transaction_id'] != "") {$receipt .= 'Transaction: '.$info['transaction_id'].'<br />';}
	
	$receipt .= '
				<table class="totals">
					<tr>
						<td class="textRight">Subtotal:</td>
						<td class="textLeft">$'.number_format($info['subtotal'], 2).'</td>
					</tr>
					<tr>
						<td class="textRight">HST:</td>
						<td class="textLeft">$'.number_format($info['tax'], 2).'</td>
					</tr>
					<tr>
						<td class="textRight">Total:</td>
						<td class="textLeft">$'.number_format($info['total'], 2).'</td>
					</tr>
				</table>
				<div class="clear"></div>
			</div>
			
			<div class="clear" style="height:20px;"></div>
	';
	
	if ($info['wants_poster'] == 1)
	{
		$receipt .= '
			<span class="bold">NOTE: I would like a cookie poster sent with my order to help promote my cookie day</span>
			<div class="clear" style="height:20px;"></div>
		';
	}
	
	if ($info['comments'] != "") 
	{
		$receipt .= '
			<span class="bold">COMMENTS: </span>'.stripslashes(nl2br($info['comments'])).'
			<div class="clear" style="height:20px;"></div>
		';
	}
	
	
	if ($forEmail == 1) { $receipt .='<p><h2> Order Questions? 905-877-4216 - or - orders@terracottacookies.com</h2></p>'; }
			
			
	$receipt .='
			<table class="orderItems">
				<thead>
					<tr>
						<th>Description</th>
						<th width="75px">Quantity</th>
						<th width="80px">Price</th>
						<th width="80px">Total</th>
					</tr>
				</thead>
				<tbody>
	';

	foreach ($cartItems AS $item)
	{
		$itemTotal = ($item['quantity'] * $item['price']);
		$receipt .= '		
				<tr>
					<td>
						<span class="bold">'.stripslashes($item['code']).'</span> | 
						'.stripslashes($item['name']).' - 
						'.stripslashes($item['size']).' - 
						'.stripslashes($item['pack']).'
					</td>
					<td class="textCenter">'.$item['quantity'].'</td>
					<td class="textRight">
						$'.number_format($item['price'], 2).'
					</td>
					<td class="textRight">
						$'.number_format($itemTotal, 2).'
					</td>
				</tr>
		';					
	}

	$receipt .= '
				</tbody>
			</table>
			
			<div class="clear" style="height:30px;"></div>
			
						
		</div>
	';
	
	return $receipt;
}
?>