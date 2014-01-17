<?
require_once('a/inc/bootstrap.php');

if (
	$_subPage != "how-it-works" &&
	$_subPage != "get-started" &&
	$_subPage != ""
)
{	
	header("Status: 404 Not Found", true, 404);
	include('404.php');
	exit();
}

elseif ($_subPage == "how-it-works" || $_subPage == "")
{
	$title = "Cookie Dough Fundraisers Ontario";
	$canon = "/fundraising/";
	$mdesc = "Terra Cotta Cookies offer a simple Cookie Dough Fundraiser program. Get started today with our Nut & Preservative free gourment cookies!";	
	$subPage = "works";
	if ($_subPage == "how-it-works") {$breadcrumbSub = "How It Works"; $subLink = "/fundraising/how-it-works/";}
}

elseif ($_subPage == "get-started")
{
	$title = "Get Started with Fundraising";
	$canon = "";
	$subPage = "start";
	$mdesc = "";	
	$breadcrumbSub = "Get Started";
	$subLink = "/fundraising/get-started/";
}









// META DESCRIPTIONS

$mbots = "INDEX, FOLLOW";
$page = "fundraising";
$breadcrumbMain = "Fundraising";
$mainLink = "/fundraising/";

include('a/inc/header.php');









// ABOUT US SUB NAV
$pdfs = getInfo('pdf', '', '', 'order', 'ASC');

?>
<div id="subNav">
	<a href="/fundraising/how-it-works/" class="<? checkPage($subPage, "works"); ?>" >How It Works</a>
	<a href="/fundraising/get-started/" class="<? checkPage($subPage, "start"); ?>">Get Started</a>
	
	<?
	if (!empty($pdfs))
	{
		foreach($pdfs AS $a)
		{
			if ($a['file'] != '' && file_exists($_SERVER['DOCUMENT_ROOT'].'/a/pdfs/'.$a['file']))
			{
				?>
				<a href="/a/pdfs/<?= $a['file']; ?>" class="download" target="_blank">
					<img src="/a/i/site/icon_arrow-down.png" />
					<div><?= stripslashes($a['name']); ?></div>
				</a>
				<?
			}
		}
	}
	?>
	
	<? /*
	<a href="/a/pdfs/six-reasons-to-choose-terra-cotta-cookies-fundraising.pdf" class="download" target="_blank">
		<img src="/a/i/site/icon_arrow-down.png" />
		<div>6 Reasons to choose us</div>
	</a>
	
	<a href="/a/pdfs/dough-fundraising-price-list.pdf" class="download" target="_blank">
		<img src="/a/i/site/icon_arrow-down.png" />
		<div>Price List</div>
	</a>
	
	<a href="/a/pdfs/fundraising-order-form.pdf" class="download" target="_blank">
		<img src="/a/i/site/icon_arrow-down.png" />
		<div>Order Form</div>
	</a>
	
	<a href="/a/pdfs/terra-cotta-cookie-co-fundraising-brochure.pdf" class="download" target="_blank">
		<img src="/a/i/site/icon_arrow-down.png" />
		<div>Fundraising Brochure</div>
	</a>
	
	<a href="/a/pdfs/helpful-hints-to-a-successful-fundraiser.pdf" class="download" target="_blank">
		<img src="/a/i/site/icon_arrow-down.png" />
		<div class="multiLines">Helpful Hints for a Successful Fundraiser</div>
	</a>
	
	
	
	<a href="/a/pdfs/dough-fundraising-tally-sheet.pdf" class="download" target="_blank">
		<img src="/a/i/site/icon_arrow-down.png" />
		<div class="multiLines">Fundraising Tally Sheet</div>
	</a>
	*/ ?>
	
	<div class="clear"></div>
</div>
<?










?><div class="mainContent"><?









// HOW IT WORKS - MAIN PAGE 
if ($subPage == "works")
{
	?>
	<h1>Raising Money? We Can Help!</h1>
	<div class="brownDividerLine"></div>
	<div class="clear"></div>
	<img src="/a/i/site/fundraising_how-it-works_001.png" class="right spacingLeft" alt="Ontario Cookie Dough Fundraisers" />
	<h2>How it Works</h2>
	<ol>
		<li>Before signing up, select a group captain to lead the fundraiser</li>
		<li>Determine the number of participants in your group</li>
		<li>Fill out the fundraising form or contact us to sign up</li>
		<li>Receive and review fundraising kit</li>
		<li>Create a fundraising goal</li>
		<li>Distribute brochures to team members</li>
		<li>Sell some dough! View our fundraising tips anytime for ideas on how to spread the word.</li>
		<li>At the end of your dough selling period, group members submit their fundraising tally sheets, money raised and order forms to group captain</li>
		<li>Group captain determines amount owed and submits dough orders to us</li>
		<li>We will ship all dough orders to group </li>
	</ol>
	<br />
	<a href="/fundraising/get-started/" class="redButtonLarge left">Get Started!</a>
	<br><br style="clear: both">
	
	<p><span class="bold">Schools, teams, clubs and organizations can purchase our cookie dough products for a discounted price of $7 each.</span><br><br>
	Our cookie dough flavours contain 36-40 pre-portioned cookie dough drops.<br>
	A listing of cookie dough and fundraising products can be found in our fundraising brochure. </p>
	
	<h3 class="red">School Cookie Dough Fundraisers</h3>
	 
	<p>Our school cookie dough fundraisers have been a great way for schools to raise money throughout the year. The school will receive a fundraising kit when they sign up which includes cookie dough product order forms, tally sheets to consolidate orders and money raised and helpful tips to help promote their fundraiser.  Schools will need to determine how often and how long they would like to schedule their school cookie dough fundraisers for. Some schools send order forms home with kids each month, a few times per year, or just once per year.  The parents, friends and family interested in placing an order, are usually given a few weeks to get their order in.  The school council, teachers, parents or administrative staff are usually responsible for organizing the fundraiser at the school and will often promote the fundraiser in the school newsletter, social media sites, during morning announcements, and with posters around the school.</p>
	 
	<h4 class="red">Team Cookie Dough Fundraisers & Club Cookie Dough Fundraisers</h4>
	 
	<p>Many teams and clubs also use our products to help raise money. To explain how this works, if you’re having a Hockey Team Cookie Dough Fundraiser, the main objective for most hockey teams would be to build funds to pay for tournament fees, purchasing extra equipment or for uniforms.  Players often start selling cookie dough from the day that they register for the team but this can start or occur at any time throughout the season.  The cookie dough order forms can be distributed to each player when they register and some teams post a downloadable form on their website.  Successful hockey team cookie dough fundraisers usually communicate clear details well in advance, such as the date the order forms and money are due and tips for spreading the word to family and friends.  Players who sell the most dough will often receive a prize or incentive determined by the team or club cookie dough fundraiser captain.  </p>
	<?
}









// GET STARTED
elseif ($subPage == "start")
{
	?>
	<h1>Start Fundraising!</h1>
	<div class="brownDividerLine"></div>
	<span class="bold size24 helvetica" style="line-height:1em;">Please fill in your information so that we can contact you. <br />Thank you!</span>
	<div class="clear20"></div>
	
	<form method="post" action="/a/inc/process/start-fundraising.php" id="fundraiser" class="submitForm">
		
		<label>First Name: <span class="error">*</span></label>
		<input type="text" name="firstName" placeholder="First Name" value="" />
		<div class="clear"></div>
		
		<label>Last Name: <span class="error">*</span></label>
		<input type="text" name="lastName" placeholder="Last Name" value="" />
		<div class="clear"></div>
		
		<label>Company: </label>
		<input type="text" name="organization" placeholder="Company / Oragnization" />
		<div class="clear"></div>
		
		<input type="checkbox" name="school" value="1" class="checkbox" id="youSchool" /><label for="youSchool" class="checkbox">  Are you a school?</label>
		<div class="clear5"></div>
		
		<label>No. of People: </label>
		<input type="text" name="numberOfPeopleInGroup" placeholder="Number of people in your group?" value="" />
		<div class="clear"></div>
		
		<label>Postal Code:</label>
		<input type="text" name="postalCode" placeholder="Postal Code" value="" />
		<div class="clear"></div>
		
		<label>Email <span class="error">*</span></label>
		<input type="text" name="email" placeholder="Email" value="" />
		<div class="clear"></div>
		
		<label>Phone </label>
		<input type="text" name="phone" placeholder="Phone" value="" />
		<div class="clear"></div>
		
		<label>Additional Info: </label>
		<div class="clear"></div>
		<textarea name="message" placeholder="Additional Information?"></textarea>
		<div class="clear"></div>
		
		<div class="clear5"></div>
		<label>Enter Code:<span class="error">*</span></label>
		<img src="/a/inc/captcha.php" alt="Verification Code" class="left" id="captcha" />
		<input type="text" id="vercode" name="vercode" placeholder="Enter Code"  />
		<div class="clear20"></div>
		
		<button type="submit" class="redButtonLarge left spacingLeft">Submit</button>
		<label id="loader" class="textRight"></label>
					
		<div class="clear"></div>
							
	</form>	
	<?
}










?>
	<div class="clear40"></div>
</div><?










?>

<? include('a/inc/footer.php'); ?>