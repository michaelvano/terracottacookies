<?
require_once('a/inc/bootstrap.php');









// META DESCRIPTIONS
$mdesc = "";	
$mbots = "INDEX, FOLLOW";
$canon = "";

$title = "Email Club Sign Up";
$page = "club";
$breadcrumbMain = "Email Club Sign Up";
$mainLink = "/email-club-sign-up/";

include('a/inc/header.php');









$organizationOptions = array(
	"Business",
	"School",
	"Team",
	"Other"
);









// ABOUT US SUB NAV
?>
<div id="subNav">
	<a href="/email-club-sign-up/" class="<? checkPage($page, "club"); ?>" >Email Club Sign Up</a>
</div>


<div class="mainContent">

	<h1>Email Club Sign Up</h1>
	<div class="brownDividerLine"></div>
	
	<p class="bold size18 helvetica">Please fill out the form below to join our Email Club!</p>
	
	<form method="post" action="/a/inc/process/email-club-sign-up.php" class="submitForm">
		
		<label>First Name: <span class="error">*</span></label>
		<input type="text" name="firstName" />
		<div class="clear"></div>
		
		<label>Last Name: <span class="error">*</span></label>
		<input type="text" name="lastName" />
		<div class="clear"></div>
		
		<label>Organization: <span class="error">*</span></label>
		<select name="organization">
			<option value="">Please Choose One</option>
			<?
			foreach($organizationOptions AS $option)
			{
				?>
				<option value="<? echo stripslashes($option); ?>"><? echo stripslashes($option); ?></option>
				<?
			}
			?>
		</select>
		<div class="clear"></div>
		
		<label>Org. Name: <span class="error">*</span></label>
		<input type="text" name="organizationName" />
		<div class="clear"></div>

		<label>Email Address: <span class="error">*</span></label>
		<input type="text" name="email" value="<? echo $_POST['email']; ?>" />
		<div class="clear"></div>
		
		<label>Address: <span class="error">*</span></label>
		<input type="text" name="address" />
		<div class="clear"></div>
		
		<label>City: <span class="error">*</span></label>
		<input type="text" name="city" />
		<div class="clear"></div>
		
		<label>Postal Code: <span class="error">*</span></label>
		<input type="text" name="postalCode" />
		<div class="clear"></div>
		
		<label>Phone Number:</label>
		<input type="text" name="phone"  />
		<div class="clear"></div>
		
		<label>Enter Code:</label>
		<img src="/a/inc/captcha.php" alt="Verification Code" class="left" id="captcha" />
		<input type="text" id="vercode" name="vercode" placeholder="Enter Code"  />
		<div class="clear30"></div>
		
		<button type="submit" class="redButtonLarge left spacingLeft">Subscribe</button>
		<label id="loader" class="textRight"></label>
					
		<div class="clear40"></div>
		<div class="clear40"></div>
							
	</form>	
	
</div><?










?>

<? include('a/inc/footer.php'); ?>