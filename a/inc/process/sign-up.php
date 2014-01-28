<?
session_start();

require($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');

// GET POST INFORMATION
extract($_POST);


// CHECK FOR REQUIRED FIELDS
if ($firstName == "") {$nameNeeded = true;}
if ($lastName == "") {$nameNeeded = true;}
if ($address == "") {$addressNeeded = true;}
if ($city == "") {$cityNeeded = true;}
if ($postal_code == "") {$postalCodeNeeded = true;}
if ($phone == "") {$phoneNeeded = true;}
if ($email == "") {$emailNeeded = true;}
elseif (!validEmail($email)) {$invalidEmail = true;}
else 
{
	$check = getInfo('users', 'email', $email);
	if (!empty($check)) {$alreadyExists = true;}
}
if ($password == "") {$passwordNeeded = true;}
elseif ($retype == "") {$retypeNeeded = true;}
elseif ($password !== $retype) {$dontMatch = true;}



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
	?>
	<div class="error">
		<?
		if ($nameNeeded) {echo '* First and Last names required<br />';}
		if ($addressNeeded) {echo '* Address required<br />';}
		if ($cityNeeded) {echo '* City required<br />';}
		if ($postalCodeNeeded) {echo '* Postal Code required <br />';}
		if ($phoneNeeded) {echo '* Phone required<br />';}
		if ($emailNeeded) {echo '* Email required<br />';}
		if ($invalidEmail) {echo '* Invalid email<br />';}
		if ($alreadyExists) {echo '* Email already exists. Please use a different email address.<br />';}
		if ($passwordNeeded) {echo '* Password required<br />';}
		if ($retypeNeeded) {echo '* Please retype your password<br />';}
		if ($dontMatch) {echo '* The passwords do not match<br />';}
		?>
	</div>
	<div class="clear10"></div>
	<?
	include($_SERVER['DOCUMENT_ROOT'].'/a/inc/forms/sign-up.php');
}

else
{
	// Creates hashed password
	$salthash = hash('sha1', 'apple83792');
	$password = createHash($password, $salthash, $mode='sha1');
	
	// create arrays to use in insert and update functions
	$fields = array("firstName", "lastName", "school", "address", "city", "postal_code", "phone", "mobile", "email", "is_subscribed", "do_not_contact", "password", "dateRegistered", "permissionLevel");
	$values = array($firstName, $lastName, $school, $address, $city, $postal_code, $phone, $mobile, $email, $subscribe, $do_not_contact, $password, "NOW()", 1);
	$insert = insertInfo('users', $fields, $values);
	
	if ($insert) 
	{
		
		// Send an email out if the user wishes to be added to the newsletter list
		if ($subscribe == 1)
		{
			if (is_dev()) { $to_email = 'michael@nobulmedia.com'; }
			else { $to_email = 'ktaal@terracottacookies.com'; }
			
			$email_header = 'Content-type: text/html; charset=UTF-8\r\n';
			$email_subject = 'Email to be added to the newsletter list';
			$email_content = $email;
			mail($to_email, $email_subject, $email_content, $email_header);
		}
		
		// CREATES EMAIL MESSAGE TO BE SENT OUT
		$toEmail = $email;
		
		// $header .= "From: no-reply@terracottacookies.com\r\n";
		$header .= "Reply-To: ".$email."\r\n";
		$header .= "Content-type: text/html; charset=UTF-8\r\n";
		
		$subject = "Welcome to Terra Cotta Cookies!";
	
		$message = '
		<html>
			<body>
				<p>Hello '.stripslashes($firstName.' '.$lastName).',</p>
				<br />
				<p>Welcome to Terra Cotta Cookies! Here are the new features available to you through our online ordering system.</p>
				
				<p>
					The "View History" page  is available to you showing all your purchase made from this day forward.<br />
					You can re-order a previous order you\'ve made through your "My Account" page. <br />
					- Look through your past orders and see which one you wish to re-order. <br />
					- You can click on the "Re-order" button and it will populate your shopping cart with the previous order you made! <br />
					- You can still add or remove from any items through the shopping cart at this point to make your order exactly how you want it. <br />
				</p>
				<p>Your feedback on this new online process is welcomed, send to office@terracottacookies.com.</p>
				<br />
				<p>
					Best Regards,<br />
					The Terra Cotta Cookies Team
				</p>
			</body>
		</html>
		';
	
		// SENDS OUT MAIL
		mail($toEmail, $subject, $message, $header)
		
		?>
		<div class="success">
			You have successfully registered with us. <br />
			You can now <a href="/login.php">Login</a> with your new username and password.
		</div>
		<?
	}
	else
	{
		?>
		<div class="error">
			There was an error processing your submission. Please try again.
		</div>
		<div class="clear10"></div>
		<?
		include($_SERVER['DOCUMENT_ROOT'].'/a/inc/forms/sign-up.php');
	}
}
?>