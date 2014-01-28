<?
require_once('a/inc/bootstrap.php');

if (!isset($_SESSION['ID']) || $_SESSION['ID'] == '') { header('Location: /login.php'); }

if (isset($_POST) && !empty($_POST))
{	
	extract($_POST);
	
	// CHECK FOR REQUIRED FIELDS
	if ($firstName == "") {$nameNeeded = true;}
	if ($lastName == "") {$nameNeeded = true;}
	if ($address == "") {$addressNeeded = true;}
	if ($city == "") {$cityNeeded = true;}
	if ($postal_code == "") {$postalCodeNeeded = true;}
	if ($phone == "") {$phoneNeeded = true;}
	
	if ($password != "")
	{
		if ($retype == "") {$retypeNeeded = true;}
		elseif ($password !== $retype) {$dontMatch = true;}
	}
	
	
	// If any errors, show form with notification
	if (
		$nameNeeded ||
		$addressNeeded ||
		$cityNeeded ||
		$postalCodeNeeded ||
		$phoneNeeded ||
		$emailNeeded ||
		$invalidEmail ||
		$alreadyExists ||
		$passwordNeeded ||
		$retypeNeeded ||
		$dontMatch
	)
	{
		$error = true;
	}
	else
	{
		$fields = array('firstName', 'lastName', 'school', 'address', 'city', 'postal_code', 'phone', 'mobile');
		$values = array($firstName, $lastName, $school, $address, $city, $postal_code, $phone, $mobile);
		
		if ($password != '')
		{
			// Creates hashed password
			$salthash = hash('sha1', 'apple83792');
			$password = createHash($password, $salthash, $mode='sha1');
			array_push($fields, 'password');
			array_push($values, $password);
		}
		
		$update = updateInfo('users', $fields, $values, 'id', $_SESSION['ID']);
		if ($update) {$_msg = 1;} else {$_msg = 2;}
	}
}

$get = getInfo('users', 'id', $_SESSION['ID']);

if (!empty($get))
{
	extract($get[0]);
	
	if ($is_subscribed == 1) {$subscribe = 1;}
}

// META DESCRIPTIONS
$title = "Account Settings";
$canon = "";
$subPage = "account-settings";
$mbots = "NOINDEX, NOFOLLOW";
$page = "about";
$breadcrumbMain = "My Account";
$mainLink = "/my-account.php";
$breadcrumbSub = "Account Settings";
$subLink = "/my-account_settings.php";

include('a/inc/header.php');


// INCLUDE NAV
include($_SERVER['DOCUMENT_ROOT'].'/a/inc/navs/my-account.php');
?>

<div class="mainContent">

	<h1>Account Settings</h1>
	
	<p class="bold">If you wish to update your email, please contact us to make that change for you.</p>
	
	<?
	if ($error)
	{
		?>
		<div class="error">
			<?
			if ($nameNeeded) {echo '* First and Last names required<br />';}
			if ($addressNeeded) {echo '* Address required<br />';}
			if ($cityNeeded) {echo '* City required<br />';}
			if ($postalCodeNeeded) {echo '* Postal Code required <br />';}
			if ($phoneNeeded) {echo '* Phone required<br />';}
			if ($retypeNeeded) {echo '* Please retype your password<br />';}
			if ($dontMatch) {echo '* The passwords do not match<br />';}
			?>
		</div>
		<div class="clear10"></div>
		<?
	}
	
	if ($_msg != '')
	{
		switch($_msg)
		{
			case 1: echo '<div class="success">Your account information has been updated.</div>'; break;
			case 2: echo '<div class="error">Your account information could not be updated. Please try again.</div>'; break;
		}
		?>
		<div class="clear20"></div>
		<?
	}
	?>
	
	<form enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>"> 
				
		<style>
			label.checkbox {width:auto; line-height:16px; margin-left:110px;}
			input[type="checkbox"] {width:auto; height:auto; line-height:20px; margin-right:10px; }
			input[readonly] {background-color:#dedede;}
		</style>
		
		<label>Name of School: </label>
		<input type="text" name="school" value="<? echo stripslashes($school); ?>" />
		<div class="clear"></div>
		
		<label>First Name: *</label>
		<input type="text" name="firstName" value="<? echo stripslashes($firstName); ?>" class="<? if ($nameNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Last Name: *</label>
		<input type="text" name="lastName" value="<? echo stripslashes($lastName); ?>" class="<? if ($nameNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Address: *</label>
		<input type="text" name="address" value="<? echo stripslashes($address); ?>" class="<? if ($addressNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>City: *</label>
		<input type="text" name="city" value="<? echo stripslashes($city); ?>" class="<? if ($cityNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Postal Code: *</label>
		<input type="text" name="postal_code" value="<? echo stripslashes($postal_code); ?>" class="<? if ($postalCodeNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Phone 1: *</label>
		<input type="text" name="phone" value="<? echo stripslashes($phone); ?>" class="<? if ($phoneNeeded) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Phone 2: </label>
		<input type="text" name="mobile" value="<? echo stripslashes($mobile); ?>" />
		<div class="clear"></div>
		
		<label>Email: *</label>
		<input type="text" name="email" value="<? echo stripslashes($email); ?>" readonly />
		<div class="clear"></div>
		
		<p>To update your password, type and re-type in your new password below</p>
		
		<label>Password: *</label>
		<input type="password" name="password"  class="<? if ($passwordNeeded || $dontMatch) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<label>Retype Password: *</label>
		<input type="password" name="retype" class="<? if ($retypeNeeded || $dontMatch) {echo 'required';} ?>" />
		<div class="clear"></div>
		
		<div class="clear30"></div>
		
		<button type="submit" name="update_info" class="redButtonLarge"> Save Info </button>
		<div class="clear"></div>
	</form>


	<div class="clear40"></div>
	
</div>

<? include('a/inc/footer.php'); ?>