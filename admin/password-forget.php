<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');



// META DESCRIPTIONS
$title = "Forget Password";
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";
$page = "password";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');









// PROCESS THE SUBMISSION FORM
if (isset($_POST['passwordForget'])) {
	extract($_POST);
	
	if ($email == "") {$_msg = 1;}
	else {
		
		$checkEmail = getInfo("users", "email", $email);
		if (empty($checkEmail)) {$_msg = 2;}
		else {
		
			$passwordReset = generatePassword();
			
			$update = updateInfo("users", array('resetPassword'), array($passwordReset), "email", $email);
			
			if ($update) {
			
				$info = $checkEmail[0];
		
				// CREATES EMAIL MESSAGE TO BE SENT OUT
				$toEmail = $email;
			
				$header .= "From: noreply@terracottacookies.com \r\n";
				$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
		
				$subject = "Reset your Terra Cotta Cookies Login Password";		

				$message = '
					<style>
						body {font-family:arial;}
						.bold {font-weight:600;}
					</style>
					<html>
						<body>
						
						Hello '.$info['firstName'].' '.$info['lastName'].',
						
						<p>To reset your Terra Cotta Cookies password, click the following link.</p>
						<a href="http://'.$_SERVER['SERVER_NAME'].'/password/reset/?_id='.$info['id'].'&_key='.$passwordReset.'" target="_blank">
							http://'.$_SERVER['SERVER_NAME'].'/password/reset/?_id='.$info['id'].'&_key='.$passwordReset.'
						</a>
						<p>If you cannot click on the link, you can copy and paste the entire link into your browser.</p>
						<p> - The Terra Cotta Cookies Team </p>
					
					</body>
				</html>
				';
		

				if(mail($toEmail, $subject, $message, $header)) { $emailSent = true; }
				else {$_msg = 4;}
				
			} else {
				$_msg = 3;		
			}
					
		}
	
	}
		
}

?>







	<div id="subNav"></div>
		
		<div class="mainContent">

		<div id="subNav"></div>
		
		<div class="mainContent">
			<div class="clear40"></div>
			<div id="login" class="fullBorder">
				<h2>Password Reset</h2>
				
				<?
				if ($emailSent) {echo '<span class="success">An email has been sent with a link to reset your password.</span>';}
				else
				{
					?>
					<p>An email will be sent to you with instructions and a specific link for you to reset your password</p>
		
					<?		
					switch($_msg) {
						case 1: echo '<span class="error">* Please enter an email</span>'; break;
						case 2: echo '<span class="error">* That email is not in our database</span>'; break;
						case 3: echo '<span class="error">* Your information could not be updated, please try again.</span>'; break;
						case 4: echo '<span class="error">* An email with the information could not be sent out. Please try again.</span>'; break;
					}		
					?>
					<form id="resetPassword" action="<? echo $_SERVER['REQUEST_URI']; ?>" method="post">
					
						<label>Email:</label>
						<input type="text" name="email" value="<? echo stripslashes($email); ?>" class="<? if ($_msg == 1 || $_msg == 2) {echo 'required';} ?>" />
						<div class="clear"></div>
						
						<button type="submit" class="redButtonSmall left" name="passwordForget">Submit </button>
						<div class="clear"></div>
						
						<div class="clear"></div>
					</form>
					<?
				}
				?>		
			</div>
		
		
	
	</div>








<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>