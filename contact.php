<?
require_once('a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Contact Us";
$mdesc = "";	
$mbots = "INDEX, FOLLOW";
$canon = "";
$page = "contact";

include('a/inc/header.php');

?>

<div id="contactInfo">

	<h2 class="green">Contact Us</h2>	
	<span class="bold">Address:</span><br />
	80 Centennial Road, Unit 9<br />
	Orangeville, Ontario<br />
	L9W 1P9
	
	<div class="clear30"></div>
	
	<span class="bold">Phone Number:</span><br />
	519-307-6100
	<div class="clear30"></div>
	
	<span class="bold">Fax Number:</span><br />
	519-307-6200
	<div class="clear30"></div>
	
	<span class="bold uppercase">Email:</span><br />
	<span class="bold italic purple">For Sales Inquiries, Pricing:</span><br />
	<? safeEmail('sales@trilliumsales.com'); ?>
	<div class="clear30"></div>
	
	<span class="bold italic purple">Order or Account Inquiries, Placing Orders:</span><br />
	<? safeEmail('customerservice@trilliumsales.com'); ?>
	<div class="clear30"></div>
	
	<span class="bold italic purple">Shipping or Receiving Inquiries:</span><br />
	<? safeEmail('warehouse@trilliumsales.com'); ?>
	
</div>



<div id="contactForm">
	
	<h2 class="green">Send Us an Email</h2>
	<span>Please let us know if you would like more information!</span>
	
	<div class="clear30"></div>
	<form method="post" action="/a/inc/process/contact-us.php" id="contact">				
		
		<label>Name: <span class="error">*</span></label>
		<input type="text" name="name" />
		<div class="clear"></div>
		
		<label>Email: <span class="error">*</span></label>
		<input type="text" name="email" />
		<div class="clear"></div>
		
		<label>Please Select:</label>
		<select name="customerType">
			<option value="Retailer">Retailer</option>
			<option value="Consumer">Consumer</option>
		</select>
		<div class="clear"></div>
		
		<label>Phone:</label>
		<input type="text" name="phone"  />
		<div class="clear"></div>
			
		<label>Comments: <span class="error">*</span></label>
		<textarea name="comments"></textarea>
		<div class="clear"></div>
		
		<label>Enter Code:</label>
		<img src="/a/inc/captcha.php" alt="Verification Code" class="left" id="captcha"/>
		<input type="text" id="vercode" name="vercode" placeholder="Enter Code"  />
		<button type="submit" class="greenButtonSmall left spacingLeft">Submit &#9658; </button>
		<div class="clear"></div>
		<label id="loader" class="textRight"></label>
					
		<div class="clear"></div>
							
	</form>	



</div>





<? include('a/inc/footer.php'); ?>