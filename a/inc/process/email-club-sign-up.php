<?
session_start();

require($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');

if (is_dev()) { $toEmail = 'michael@nobulmedia.com'; }
else { $toEmail = 'office@terracottacookies.com'; }


// GET POST INFORMATION
extract($_POST);


// CHECK FOR REQUIRED FIELDS
if ($firstName == "") {$firstNameNeeded = true;}
if ($lastName == "") {$lastNameNeeded = true;}
if ($organization == "") {$organizationNeeded = true;}
if ($organizationName == "") {$organizationNameNeeded = true;}
if ($email == "") {$emailNeeded = true;}
elseif (!validEmail($email)) {$invalidEmail = true;}
if ($address == "") {$addressNeeded = true;}
if ($city == "") {$cityNeeded = true;}
if ($postalCode == "") {$postalCodeNeeded = true;}
if ($phone == "") {$phoneNeeded = true;}

if ($vercode == "") {$verificationNeeded = true;}
elseif (strtoupper($vercode) != $_SESSION['vercode']) {$verificationFailed = true;}










if (
	$firstNameNeeded ||
	$lastNameNeeded ||
	$organizationNeeded ||
	$organizationNameNeeded ||
	$emailNeeded ||
	$invalidEmail ||
	$addressNeeded ||
	$cityNeeded ||	
	$postalCodeNeeded ||
	$phoneNeeded ||
	$verificationNeeded ||
	$verificationFailed 
) 
{
	$organizationOptions = array(
		"Business",
		"School",
		"Team",
		"Other"
	);
	
	?>
	<div class="error">
		<?
		if ($firstNameNeeded) {echo '* First Name required<br />';}
		if ($lastNameNeeded) {echo '* First Name required<br />';}
		if ($organizationNeeded) {echo '* Please select an organization type<br />';}
		if ($organizationNameNeeded) {echo '* Please type in the name of your organization.<br />';}
		if ($emailNeeded) {echo '* Email required<br />';}
		if ($invalidEmail) {echo '* Invalid Email <br />';}
		if ($addressNeeded) {echo '* Address required<br />';}
		if ($cityNeeded) {echo '* City required<br />';}
		if ($postalCodeNeeded) {echo '* Postal Code required<br />';}
		if ($phoneNeeded) {echo '* Phone Number required<br />';}
		if ($verificationNeeded) {echo '* Verification Code Required<br />';}
		if ($verificationFailed) {echo '* Verification Incorrect<br />';}
		?>
	</div>
	<div class="clear10"></div>
	
	<label>First Name: <span class="error">*</span></label>
	<input type="text" name="firstName" class="<? if ($firstNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($firstName); ?>" />
	<div class="clear"></div>
	
	<label>Last Name: <span class="error">*</span></label>
	<input type="text" name="lastName" class="<? if ($lastNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($lastName); ?>"/>
	<div class="clear"></div>
		
	<label>Organization: <span class="error">*</span></label>
	<select name="organization" class="<? if ($organizationNeeded) {echo 'required';} ?>">
		<option value="">Please Choose One</option>
		<?
		foreach($organizationOptions AS $option)
		{
			?>
			<option value="<? echo stripslashes($option); ?>" <? checkSelected($option, $organization); ?>><? echo stripslashes($option); ?></option>
			<?
		}
		?>
	</select>
	<div class="clear"></div>
	
	<label>Org. Name: <span class="error">*</span></label>
	<input type="text" name="organizationName" class="<? if ($organizationNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($organizationName); ?>" />
	<div class="clear"></div>

	<label>Email Address: <span class="error">*</span></label>
	<input type="text" name="email" class="<? if ($emailNeeded || $invalidEmail) {echo 'required';} ?>" value="<? echo stripslashes($email); ?>"/>
	<div class="clear"></div>
		
	<label>Address: <span class="error">*</span></label>
	<input type="text" name="address" class="<? if ($addressNeeded) {echo 'required';} ?>" value="<? echo stripslashes($address); ?>" />
	<div class="clear"></div>
	
	<label>City: <span class="error">*</span></label>
	<input type="text" name="city" class="<? if ($cityNeeded) {echo 'required';} ?>" value="<? echo stripslashes($city); ?>" />
	<div class="clear"></div>
	
	<label>Postal Code: <span class="error">*</span></label>
	<input type="text" name="postalCode" class="<? if ($postalCodeNeeded) {echo 'required';} ?>" value="<? echo stripslashes($postalCode); ?>" />
	<div class="clear"></div>
		
	<label>Phone Number:</label>
	<input type="text" name="phone" class="<? if ($phoneNeeded) {echo 'required';} ?>" value="<? echo stripslashes($phone); ?>" />
	<div class="clear"></div>
		
	<label>Enter Code:</label>
	<img src="/a/inc/captcha.php" alt="Verification Code" class="left" id="captcha" />
	<input type="text" id="vercode" name="vercode" placeholder="Enter Code" class="<? if ($verificationNeeded || $verificationFailed) {echo 'required';} ?>" />
	<div class="clear30"></div>
		
	<button type="submit" class="redButtonLarge left spacingLeft">Subscribe</button>
	<label id="loader" class="textRight"></label>
				
	<div class="clear40"></div>
	<div class="clear40"></div>
	
	<?
	
}









else {
	
	// CREATES EMAIL MESSAGE TO BE SENT OUT
	$header .= "From: no-reply@terracottacookies.com\r\n";
	$header .= "Reply-To: ".$email."\r\n";
	$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
	$subject = "Email Club Sign Up Request";

	$message = '
	<html>
		<body>
			<table cellpadding="4" cellspacing="4" style="font-family:Arial; font-size:14px; border:1px solid #aaa;">	
				<tr><td><b>Name: </b></td><td>'.stripslashes($firstName).' '.stripslashes($lastName).'</td></tr>
				<tr><td><b>Organization: </b></td><td>'.stripslashes($organization).'</td></tr>
				<tr><td><b>Organization Name: </b></td><td>'.stripslashes($organizationName).'</td></tr>
				<tr><td><b>Email: </b></td><td>'.stripslashes($email).'</td></tr>
				<tr><td><b>Address: </b></td><td>'.stripslashes($address).'</td></tr>
				<tr><td><b>City: </b></td><td>'.stripslashes($city).'</td></tr>
				<tr><td><b>Postal Code: </b></td><td>'.stripslashes($postalCode).'</td></tr>
				<tr><td><b>Phone:</b></td><td>'.stripslashes($phone).'</td></tr>
				<tr height="15"><td></td></tr>
			</table>			
		</body>
	</html>
	';
	
	// SENDS OUT MAIL
	if(mail($toEmail, $subject, $message, $header)) {
		echo '<div class="success">Thank you! Your email and information has been sent to us and you will now be addeed to our Email Club!</div>';


		
	//IF MAIL FAILS AND DOESN'T SEND, SHOW CONTACT FORM AGAIN
	} else {
		?>
		<div class="error">There was an sending your message. Please try again.</div>
		<div class="clear10"></div>
		
		<label>First Name: <span class="error">*</span></label>
		<input type="text" name="firstName" class="<? if ($firstNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($firstName); ?>" />
		<div class="clear"></div>
		
		<label>Last Name: <span class="error">*</span></label>
		<input type="text" name="lastName" class="<? if ($lastNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($lastName); ?>"/>
		<div class="clear"></div>
			
		<label>Organization: <span class="error">*</span></label>
		<select name="organization" class="<? if ($organizationNeeded) {echo 'required';} ?>" value="<? echo stripslashes($lastName); ?>">
			<option value="">Please Choose One</option>
			<?
			foreach($organizationOptions AS $option)
			{
				?>
				<option value="<? echo stripslashes($option); ?>" <? checkSelected($option, $organization); ?>><? echo stripslashes($option); ?></option>
				<?
			}
			?>
		</select>
		<div class="clear"></div>

		<label>Org. Name: <span class="error">*</span></label>
		<input type="text" name="organizationName" class="<? if ($organizationNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($organizationName); ?>" />
		<div class="clear"></div>

		<label>Email Address: <span class="error">*</span></label>
		<input type="text" name="email" class="<? if ($emailNeeded || $invalidEmail) {echo 'required';} ?>" value="<? echo stripslashes($email); ?>"/>
		<div class="clear"></div>
			
		<label>Address: <span class="error">*</span></label>
		<input type="text" name="address" class="<? if ($addressNeeded) {echo 'required';} ?>" value="<? echo stripslashes($address); ?>" />
		<div class="clear"></div>
		
		<label>City: <span class="error">*</span></label>
		<input type="text" name="city" class="<? if ($cityNeeded) {echo 'required';} ?>" value="<? echo stripslashes($city); ?>" />
		<div class="clear"></div>
		
		<label>Postal Code: <span class="error">*</span></label>
		<input type="text" name="postalCode" class="<? if ($postalCodeNeeded) {echo 'required';} ?>" value="<? echo stripslashes($postalCode); ?>" />
		<div class="clear"></div>
			
		<label>Phone Number:</label>
		<input type="text" name="phone" class="<? if ($phoneNeeded) {echo 'required';} ?>" value="<? echo stripslashes($phone); ?>" />
		<div class="clear"></div>
			
		<label>Enter Code:</label>
		<img src="/a/inc/captcha.php" alt="Verification Code" class="left" id="captcha" />
		<input type="text" id="vercode" name="vercode" placeholder="Enter Code" class="<? if ($verificationNeeded || $verificationFailed) {echo 'required';} ?>" />
		<div class="clear30"></div>
			
		<button type="submit" class="redButtonLarge left spacingLeft">Subscribe</button>
		<label id="loader" class="textRight"></label>
					
		<div class="clear40"></div>
		<div class="clear40"></div>
		<?
	}
	
}


?>