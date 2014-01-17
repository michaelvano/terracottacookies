<?
session_start();

require($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');

if (is_dev()) { $toEmail = 'michael@nobulmedia.com'; }
else { $toEmail = 'ktaal@terracottacookies.com'; }

// GET POST INFORMATION
extract($_POST);


// CHECK FOR REQUIRED FIELDS
if ($firstName == "" || $firstName == "First Name") {$firstNameNeeded = true; $firstName == "";}
if ($lastName == "" || $lastName == "Last Name") {$lastNameNeeded = true;}
if ($email == "" || $email == "Email") {$emailNeeded = true;}
elseif (!validEmail($email)) {$invalidEmail = true;}

if ($vercode == "") {$verificationNeeded = true;}
elseif (strtoupper($vercode) != $_SESSION['vercode']) {$verificationFailed = true;}










if (
	$firstNameNeeded ||
	$lastNameNeeded ||
	$emailNeeded ||
	$invalidEmail ||
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
		if ($verificationNeeded) {echo '* Verification Code Required<br />';}
		if ($verificationFailed) {echo '* Verification Incorrect<br />';}
		?>
	</div>
	<div class="clear10"></div>
	
	<label>First Name: <span class="error">*</span></label>	
	<input type="text" name="firstName" placeholder="First Name" class="<? if ($firstNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($firstName); ?>" />
	<div class="clear"></div>
	
	<label>Last Name: <span class="error">*</span></label>
	<input type="text" name="lastName" placeholder="Last Name" class="<? if ($lastNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($lastName); ?>" />
	<div class="clear"></div>

	<label>Company: </label>
	<input type="text" name="organization" placeholder="Company / Oragnization"  value="<? echo stripslashes($organization); ?>"/>
	<div class="clear"></div>
	
	<input type="checkbox" name="school" value="1" class="checkbox" id="youSchool" <? if (isset($school)) {echo 'checked="checked"';} ?> /><label for="youSchool" class="checkbox">  Are you a school?</label>
	<div class="clear5"></div>
	
	<label>No. of People: </label>
	<input type="text" name="numberOfPeopleInGroup" placeholder="Number of people in your group?" value="<? echo stripslashes($numberOfPeopleInGroup); ?>" />
	<div class="clear"></div>
	
	<label>Postal Code:</label>
	<input type="text" name="postalCode" placeholder="Postal Code" value="<? echo stripslashes($postalCode); ?>" />
	<div class="clear"></div>
	
	<label>Email <span class="error">*</span></label>
	<input type="text" name="email" placeholder="Email" class="<? if ($emailNeeded || $invalidEmail) {echo 'required';} ?>" value="<? echo stripslashes($email); ?>" />
	<div class="clear"></div>
	
	<label>Phone </label>
	<input type="text" name="phone" placeholder="Phone" value="<? echo stripslashes($phone); ?>"/>
	<div class="clear"></div>
	
	<label>Additional Info: </label>
	<textarea name="message" placeholder="Additional Information?"><? echo stripslashes($message); ?></textarea>
	<div class="clear"></div>
	
	<div class="clear5"></div>
	<label>Enter Code:<span class="error">*</span></label>
	<img src="/a/inc/captcha.php" alt="Verification Code" class="left" id="captcha" />
	<input type="text" id="vercode" name="vercode" placeholder="Enter Code" class="<? if ($verificationNeeded || $verificationFailed) {echo 'required';} ?>"  />
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
	
	$subject = "Fundraiser Request Made from the Website";

	if ($school == 1) {$school = "Yes";} else {$school = "no";}
	
	$message = '
	<html>
		<body>
			<table cellpadding="4" cellspacing="4" style="font-family:Arial; font-size:14px; border:1px solid #aaa;">	
				<tr><td><b>Name: </b></td><td>'.stripslashes($firstName).' '.stripslashes($lastName).'</td></tr>
				<tr><td><b>Oraganization: </b></td><td>'.stripslashes($organization).'</td></tr>
				<tr><td><b>Is A School?: </b></td><td>'.stripslashes($school).'</td></tr>
				<tr><td><b>Number of people in Group?: </b></td><td>'.stripslashes($numberOfPeopleInGroup).'</td></tr>
				<tr><td><b>Postal Code: </b></td><td>'.stripslashes($postalCode).'</td></tr>
				<tr><td><b>Email: </b></td><td>'.stripslashes($email).'</td></tr>
				<tr><td><b>Phone:</b></td><td>'.stripslashes($phone).'</td></tr>
				<tr><td valign="top"><b>Additional Information:</b></td><td>'.stripslashes(nl2br($message)).'</td></tr>				
				<tr height="15"><td></td></tr>
			</table>			
		</body>
	</html>
	';
	
	// SENDS OUT MAIL
	if(mail($toEmail, $subject, $message, $header)) {
		echo '<div class="success">An email has been sent with your request to start a fundraiser. If you do not hear back within 24 hours, please call us immediately at 905-877-4216.</div>';


		
	//IF MAIL FAILS AND DOESN'T SEND, SHOW CONTACT FORM AGAIN
	} else {
		?>
		<div class="error">There was an sending your message. Please try again.</div>
		<div class="clear10"></div>
		
		<label>First Name: <span class="error">*</span></label>	
		<input type="text" name="firstName" placeholder="First Name" class="<? if ($firstNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($firstName); ?>" />
		<div class="clear"></div>
		
		<label>Last Name: <span class="error">*</span></label>
		<input type="text" name="lastName" placeholder="Last Name" class="<? if ($lastNameNeeded) {echo 'required';} ?>" value="<? echo stripslashes($lastName); ?>" />
		<div class="clear"></div>
	
		<label>Company: </label>
		<input type="text" name="organization" placeholder="Company / Oragnization"  value="<? echo stripslashes($organization); ?>"/>
		<div class="clear"></div>
		
		<input type="checkbox" name="school" value="1" class="checkbox" id="youSchool" <? if (isset($school)) {echo 'checked="checked"';} ?> /><label for="youSchool" class="checkbox">  Are you a school?</label>
		<div class="clear5"></div>
		
		<label>No. of People: </label>
		<input type="text" name="numberOfPeopleInGroup" placeholder="Number of people in your group?" value="<? echo stripslashes($numberOfPeopleInGroup); ?>" />
		<div class="clear"></div>
		
		<label>Postal Code:</label>
		<input type="text" name="postalCode" placeholder="Postal Code" value="<? echo stripslashes($postalCode); ?>" />
		<div class="clear"></div>
		
		<label>Email <span class="error">*</span></label>
		<input type="text" name="email" placeholder="Email" class="<? if ($emailNeeded || $invalidEmail) {echo 'required';} ?>" value="<? echo stripslashes($email); ?>" />
		<div class="clear"></div>
		
		<label>Phone </label>
		<input type="text" name="phone" placeholder="Phone" value="<? echo stripslashes($phone); ?>"/>
		<div class="clear"></div>
		
		<label>Additional Info: </label>
		<textarea name="message" placeholder="Additional Information?"><? echo stripslashes($message); ?></textarea>
		<div class="clear"></div>
		
		<div class="clear5"></div>
		<label>Enter Code:<span class="error">*</span></label>
		<img src="/a/inc/captcha.php" alt="Verification Code" class="left" id="captcha" />
		<input type="text" id="vercode" name="vercode" placeholder="Enter Code" class="<? if ($verificationNeeded || $verificationFailed) {echo 'required';} ?>"  />
		<div class="clear20"></div>
		
		<button type="submit" class="redButtonLarge left spacingLeft">Submit</button>
		<label id="loader" class="textRight"></label>
					
		<div class="clear"></div>

		<?
	}
	
}


?>