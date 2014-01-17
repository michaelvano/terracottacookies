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
if ($email == "") {$emailNeeded = true;}
elseif (!validEmail($email)) {$invalidEmail = true;}
if ($message == "") {$messageNeeded = true;}

if ($vercode == "") {$verificationNeeded = true;}
elseif (strtoupper($vercode) != $_SESSION['vercode']) {$verificationFailed = true;}










if (
	$firstNameNeeded ||
	$lastNameNeeded ||
	$emailNeeded ||
	$invalidEmail ||
	$messageNeeded ||
	$verificationNeeded ||
	$verificationFailed 
) {
	
	?>
	<div class="error">
		<?
		if ($firstNameNeeded) {echo '* First Name required<br />';}
		if ($lastNameNeeded) {echo '* First Name required<br />';}
		if ($emailNeeded) {echo '* Email required<br />';}
		if ($invalidEmail) {echo '* Invalid Email <br />';}
		if ($commentsNeeded) {echo '* Comments required<br />';}
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

	
	<label>Email Address: <span class="error">*</span></label>
	<input type="text" name="email" class="<? if ($emailNeeded || $invalidEmail) {echo 'required';} ?>" value="<? echo stripslashes($email); ?>"/>
	<div class="clear"></div>
	
	<label>Phone Number:</label>
	<input type="text" name="phone" value="<? echo stripslashes($phone); ?>" />
	<div class="clear"></div>
		
	<label>Message: <span class="error">*</span></label>
	<div class="clear"></div>
	<textarea name="message" class="<? if ($messageNeeded) {echo 'required';} ?>" ><? echo stripslashes($message); ?></textarea>
	<div class="clear"></div>
	
	<label>Enter Code:</label>
	<img src="/a/inc/captcha.php" alt="Verification Code" class="left" id="captcha" />
	<input type="text" id="vercode" name="vercode" placeholder="Enter Code" class="<? if ($verificationNeeded || $verificationFailed) {echo 'required';} ?>" />
	<div class="clear20"></div>
	
	<button type="submit" class="redButtonLarge left spacingLeft">Submit</button>
	<label id="loader" class="textRight"></label>
				
	<div class="clear"></div>

	<?
	
}









else {
	
	// CREATES EMAIL MESSAGE TO BE SENT OUT
	$header .= "From: no-reply@terracottacookies.com\r\n";
	$header .= "Reply-To: ".$email."\r\n";
	$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
	
	$subject = "Information Request Made from the Website";

	$message = '
	<html>
		<body>
			<table cellpadding="4" cellspacing="4" style="font-family:Arial; font-size:14px; border:1px solid #aaa;">	
				<tr><td><b>Name: </b></td><td>'.stripslashes($firstName).' '.stripslashes($lastName).'</td></tr>
				<tr><td><b>Email: </b></td><td>'.stripslashes($email).'</td></tr>
				<tr><td><b>Phone:</b></td><td>'.stripslashes($phone).'</td></tr>
				<tr><td valign="top"><b>Message:</b></td><td>'.stripslashes(nl2br($message)).'</td></tr>				
				<tr height="15"><td></td></tr>
			</table>			
		</body>
	</html>
	';
	
	// SENDS OUT MAIL
	if(mail($toEmail, $subject, $message, $header)) {
		echo '<div class="success">An email has been sent with your message. If you do not hear back within 24 hours, please call us immediately at 905-877-4216.</div>';


		
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
	
		
		<label>Email Address: <span class="error">*</span></label>
		<input type="text" name="email" class="<? if ($emailNeeded || $invalidEmail) {echo 'required';} ?>" value="<? echo stripslashes($email); ?>"/>
		<div class="clear"></div>
		
		<label>Phone Number:</label>
		<input type="text" name="phone" value="<? echo stripslashes($phone); ?>"  />
		<div class="clear"></div>
			
		<label>Message: <span class="error">*</span></label>
		<div class="clear"></div>
		<textarea name="message" class="<? if ($messageNeeded) {echo 'required';} ?>" ><? echo stripslashes($message); ?></textarea>
		<div class="clear"></div>
		
		<label>Enter Code:</label>
		<img src="/a/inc/captcha.php" alt="Verification Code" class="left" id="captcha" />
		<input type="text" id="vercode" name="vercode" placeholder="Enter Code"  />
		<div class="clear20"></div>
		
		<button type="submit" class="redButtonLarge left spacingLeft">Submit</button>
		<label id="loader" class="textRight"></label>
					
		<div class="clear"></div>

		<?
	}
	
}


?>