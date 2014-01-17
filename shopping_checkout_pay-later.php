<?
require_once('a/inc/bootstrap.php');








// CHECKS OF SHOPPING CART HAS BEEN MADE, IF NOT CREATE IT
$getItems = getInfo("store_temp_items", "session_id", $sessionID);
if (empty($getItems)) { header('Location: /shopping-cart.php'); }









/* =======================
	PROCESS CONTACT INFORMATION
=========================*/
if ($_action == "placeOrder")
{
	extract($_POST);
	
	if ($name == "") {$nameNeeded = true;}
	if ($address == "") {$addressNeeded = true;}
	if ($city == "") {$cityNeeded = true;}
	if ($postal_code == "") {$postalCodeNeeded = true;}
	if ($phone == "") {$phoneNeeded = true;}
	if ($email == "") {$emailNeeded = true;}
	elseif (!validEmail($email)) {$invalidEmail = true;}
	if ($shipping_date == "") {$shippingDateNeded = true;}
	
	if (!$nameNeeded && !$addressNeeded && !$cityNeeded  && !$postalCodeNeeded  && !$phoneNeeded  && !$emailNeeded  && !$invalidEmail  && !$shippingDateNeded )
	{
		$fields = array("ip_address", "school_name", "name", "address1", "city", "province", "postal_code", "phone", "mobile", "email", "shipping_same", "shipping_date", "is_pay_later", "wants_poster", "comments");
		$values = array($ipAddress, $school, $name, $address, $city, $province, $postal_code, $phone, $mobile, $email, 1, $shipping_date, 1, $wantsPoster, $comments);
		$update = updateInfo("store_temp_carts", $fields, $values, "session_id", $sessionID);
		if ($update) { header('Location: /shopping_checkout_pay-later_approved.php?confirmedOrder=1'); }
	}
	else { $error = true; }
}









$today = date("Y-m-d");










// META DESCRIPTIONS
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";

$title = "Checking Out - Pay Later";
$page = "checkout";
$breadcrumbMain = "Checking Out - Pay Later";
$mainLink = "/shopping_checkout_pay-later.php";
$thisPage = "/shopping_checkout_pay-later.php";

include('a/inc/header.php');










?>

<script>
	$(document).ready(function() {		
		$(function() {$( "#shipping_date" ).datepicker({dateFormat: 'yy-mm-dd'});});
	});
</script>

<div id="checkingOut">

	<h1>Pay Later</h1>
	
	<div class="brownDividerLine"></div>
	
	<?
	// NOTIFICATIONS
	if ($error)
	{
		echo '<div class="error">';
			if ($nameNeeded) {echo '&bull; Contact Name needed.<br />';}
			if ($addressNeeded) {echo '&bull; Address needed.<br />';}
			if ($cityNeeded) {echo '&bull; City Name needed.<br />';}
			if ($postalCodeNeeded) {echo '&bull; Postal Code needed.<br />';}
			if ($phoneNeeded) {echo '&bull; Phone needed.<br />';}
			if ($emailNeeded) {echo '&bull; Email needed.<br />';}
			if ($invalidEmail) {echo '&bull; Invalid Email address.<br />';}
			if ($shippingDateNeded) {echo '&bull; Shipping Date needed.<br />';}
		echo '</div>';
		echo '<div class="clear20"></div>';
	}
	?>
	
	<span class="bold size18 helvetica">Contact Information:</span>
	<div class="clear30"></div>
	
	<form enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>"> 
		
		<label>Name of School: </label>
		<input type="text" name="school" value="<? echo stripslashes($school); ?>" />
		<div class="clear"></div>
		
		<label>Contact Name: </label>
		<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($nameNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Address: </label>
		<input type="text" name="address" value="<? echo stripslashes($address); ?>" class="<? if ($addressNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>City: </label>
		<input type="text" name="city" value="<? echo stripslashes($city); ?>" class="<? if ($cityNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Postal Code: </label>
		<input type="text" name="postal_code" value="<? echo stripslashes($postal_code); ?>" class="<? if ($postalCodeNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Phone 1: </label>
		<input type="text" name="phone" value="<? echo stripslashes($phone); ?>" class="<? if ($phoneNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Phone 2: </label>
		<input type="text" name="mobile" value="<? echo stripslashes($mobile); ?>" />
		<div class="clear"></div>
		
		<label>Email: </label>
		<input type="text" name="email" value="<? echo stripslashes($email); ?>" class="<? if ($emailNeeded || $invalidEmail) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Comments: </label>
		<textarea name="comments" style="width:335px; height:150px;"><? echo stripslashes($comments); ?></textarea>
		<div class="clear"></div>
		
		
		<input type="checkbox" name="wantsPoster" value="1" class="checkbox" <? if ($wantsPoster == 1) {echo 'checked="checked"';} ?> />
		<label class="checkbox" style="width:auto;">Yes I would like a cookie poster sent with my order to help promote my cookie day</label>
		<div class="clear"></div>
		
		<div class="clear40"></div>
		<span class="bold size18 helvetica">Delivery Information:</span><br />
		<span class="arial bold size14">For More Delivery Information Check our <a href="/schools/delivery/" target="_blank">Delivery Schedule</a>
		<div class="clear20"></div>
		
		<label>Today's Date: </label>
		<input type="text" value="<? echo $today; ?>" readonly="readonly"  class="width80" />
		<div class="clear"></div>
		
		<label>Delivery Date: </label>
		<input type="text" name="shipping_date" id="shipping_date" class="width80 <? if ($shippingDateNeded) {echo 'required';} ?>"  value="<? echo stripslashes($shipping_date); ?>" />
		<div class="clear"></div>
		
		<div class="clear30"></div>
		
		<input type="hidden" name="_action" value="placeOrder" />
		<button type="submit" class="redButtonLarge"> Place Order </button>
		<div class="clear"></div>
	</form>

	
	<div class="clear40"></div>
	
</div>
<?










?>

<? include('a/inc/footer.php'); ?>