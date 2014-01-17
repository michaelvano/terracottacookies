<?
require_once('a/inc/bootstrap.php');

if (
	$_subPage != "our-story" &&
	$_subPage != "our-team" &&
	$_subPage != "work-with-us" &&
	$_subPage != "blog" &&
	$_subPage != "media-and-testimonials" &&
	$_subPage != "request-information" &&
	$_subPage != ""
)
{	
	header("Status: 404 Not Found", true, 404);
	include('404.php');
	exit();
}

elseif ($_subPage == "our-story" || $_subPage == "")
{
	$title = "A Canadian Cookie Company";
	$canon = "/about-us/";
	$subPage = "story";
	if ($_subPage == "our-story") {$breadcrumbSub = "Our Story"; $subLink = "/about-us/our-story/";}
}

elseif ($_subPage == "our-team")
{
	$title = "Our Team - About Us";
	$canon = "";
	$subPage = "team";
	$breadcrumbSub = "Our Team";
	$subLink = "/about-us/our-team/";
}

elseif ($_subPage == "work-with-us")
{
	$title = "Work With Us - About Us";
	$canon = "";
	$subPage = "work";
	$breadcrumbSub = "Work With Us";
	$subLink = "/about-us/work-with-us/";
}

elseif ($_subPage == "blog")
{
	$title = "blog - About Us";
	$canon = "";
	$subPage = "blog";
	$breadcrumbSub = "Our Blog";
	$subLink = "/about-us/our-blog/";
}

elseif ($_subPage == "media-and-testimonials")
{
	$title = "Media &amp; Testimonials - About Us";
	$canon = "";
	$subPage = "media";
	$breadcrumbSub = "Media & Testimonials";
	$subLink = "/about-us/media-and-testimonials/";
}

elseif ($_subPage == "request-information")
{
	$title = "Request Information - About Us";
	$canon = "";
	$subPage = "request";
	$breadcrumbSub = "Request Information";
	$subLink = "/about-us/request-information/";
}









// META DESCRIPTIONS

$mbots = "INDEX, FOLLOW";
$page = "about";
$breadcrumbMain = "About Us";
$mainLink = "/about-us/";

include('a/inc/header.php');









// ABOUT US SUB NAV
include($_SERVER['DOCUMENT_ROOT'].'/a/inc/navs/about-us.php');










?><div class="mainContent"><?









// OUR STORY - MAIN PAGE 
if ($subPage == "story")
{
	?>
	<h1>The Terra Cotta Story</h1>
	<img src="/a/i/site/our-story_001.png" alt="The Terra Cotta Story" style="margin:0 0 0 -12px;" />
	<p>In 1984, Pat and Peter Coe opened Canadian cookie company, Terra Cotta Cookie Co. Ltd. or T.C.'s Cookies. They made cookies from scratch with NO additives, preservatives, artificial flavours or colours.</p>

	<p>They also reduced the sugar content significantly. Soft unbleached flour, 100% soya oil margarine, fresh whole eggs and lots of pure semi-sweet chocolate chips are still being used. In addition to Original Gourmet cookies, this Canadian cookie manufacturer has more than eight varieties of cookies that are 100% compliant with Ontario school nutritional requirements. New cookies were added, and in 1998 Terra Cotta Cookie Co. became a peanut and nut free facility.</p>

	<p>Recently, Terra Cotta Cookie Co. has become very passionate about developing a new line of gluten free cookies and healthier treat options. They currently serve over 1500 schools and businesses in the GTA as well as various wholesale, catering and private label customers.</p>

	<p>Terra Cotta Cookies Co. is dedicated to manufacturing quality cookies and treats, using only the finest ingredients.</p>
	<?
}









// OUR TEAM
elseif ($subPage == "team")
{

	$ourTeam = getInfo("team", "", "", "order", "ASC");
	
	?>
	<h1>Our Team</h1>
	
	<?
	foreach($ourTeam AS $row)
	{
		?>
		<div class="brownDividerLine"></div>
		
		<div class="clear10"></div>
		
		<span class="garamond size21 red uppercase"><? echo stripslashes($row['name']); ?></span><br />
		<span class="size16 garamond uppercase"><? echo stripslashes($row['position']); ?></span><br />
		<p><? if ($row['profile'] != "") { echo stripslashes($row['profile']);} ?></p>
		
		<?
		if ($row['education'] != "")
		{
			?>
			<p>
				<span class="red garamond size16 uppercase">EDUCATION: </span><br />
				<? echo stripslashes($row['education']); ?>
			</p>
			<?
		}
		
		if ($row['favourite'] != "")
		{
			?>
			<p>
				<span class="red garamond size16 uppercase">FAVOURITE COOKIE:</span><br />
				<? echo stripslashes($row['favourite']); ?>
			</p>
			
			<?
		}
		
		?>
		<p>
			<span class="red garamond size16 uppercase">CONTACT <? echo stripslashes($row['name']); ?>:</span><br />
			e:  <? safeEmail($row['email']); ?><br />
			<? if ($row['phone'] != "") { echo 'p: '.stripslashes($row['phone']).'<br />'; } ?>
			<? if ($row['mobile'] != "") { echo 'm: '.stripslashes($row['mobile']).'<br />'; } ?>
		</p>
		<div class="clear10"></div>
		<?
	}
}









// WORK WITH US
elseif ($subPage == "work")
{
	?>
	<h1>Work With Us </h1>
	<img src="/a/i/site/work-with-us_001.png" alt="The Terra Cotta Story" style="margin:0 0 0 -12px;" />
	<p>
		<span class="size18 bold">Join Our Team</span><br />
		Terra Cotta Cookie Co. is looking for commission based Sales Associates to join our team.  We have opportunities to work directly with schools, businesses and non-profit organizations in your area.  
	</p>
	<p>
		We're currently hiring in the following cities:<br />
		&bull; Hamilton, ON<br />
		&bull; Oshawa, ON<br />
		&bull; Barrie, ON <br />
	</p>
	<p class="bold">Questions, inquiries or to apply, contact:</p>
	<p class="bold">
		<span class="red">Kym Taal</span><br />
		Key Account &amp; Fundraising Manager<br />
		e: <span class="normal"><? safeEmail('ktaal@terracottacookies.com'); ?></span><br />
		m: <span class="normal">905.452.4453</span>
	</p>

	<?
}









// MEDIA AND TESTIMONIALS
elseif ($subPage == "media")
{
	$media = getInfo("media", "", "", "date_posted", "DESC", 0, 4);
	$thumbnailsPath = 'a/media/thumbnails/';
	$pdfsPath = 'a/media/pdfs/';
	
	$testimonials = getInfo("testimonials", "", "", "id", "ASC");
	
	if (!empty($media))
	{
		?>
		<h1>Media</h1>
		<div class="brownDividerLine"></div>
		
		<?
		foreach($media AS $row)
		{
			$dateCreate = date_create($row['date_posted']);
			$datePosted = date_format($dateCreate, "F d, Y");
			?>
			<div class="article">
				<div class="image">
					<a href="/<? echo $pdfsPath.$row['pdf']; ?>" target="_blank">
						<?
						if ($row['thumbnail'] != "" && file_exists($thumbnailsPath.$row['thumbnail']))
						{
							?>
							<img src="/a/inc/timthumb.php?src=<? echo '/'.$thumbnailsPath.$row['thumbnail']; ?>&h=82&w=62&zc=1" class="thumbnails" />
							<?
						}
						else { ?> <img src="/a/inc/timthumb.php?src=/a/i/default02.jpg&h=82&w=62&zc=1" class="thumbnails"  /> <? }
						?>
					</a>
				</div>
				<div class="content">
					<div class="clear5"></div>
					<a href="/<? echo $pdfsPath.$row['pdf']; ?>" target="_blank">
						<span class="arial bold size14 brown"><? echo $row['media_title']; ?></span>
					</a><br />
					<span class="size14 italic">Posted <? echo $datePosted; ?></span>
					<div class="clear10"></div>
					<a href="/<? echo $pdfsPath.$row['pdf']; ?>" target="_blank" class="redButtonSmall left">View Article</a>
				</div>
				<div class="clear"></div>
			</div>
			<?
		}
	}
	
	
	if (!empty($testimonials))
	{
		?>
		<div class="clear40"></div>
		
		<div class="bold size30 red">Testimonials</div>
		<div class="brownDividerLine"></div>
		<?
		foreach($testimonials AS $row)
		{
			?>
			<table class="testimonial">
				<tr><td class="top"></td></tr>
				<tr><td class="content">
					<? echo stripslashes($row['testimonial']); ?>
					<div class="clear20"></div>
					<span class="bold italic"><? echo stripslashes($row['name']); ?></span><br />
					<?
					if ($row['position'] != "") {echo stripslashes($row['position']).'<br />';}
					if ($row['company'] != "") {echo stripslashes($row['company']).'<br />';} 
					?>
				</td></tr>
				<tr><td class="bottom"></td></tr>
			</table>
			<?
		}
	}


}









// REQUEST INFORMATION
elseif ($subPage == "request")
{
	?>
	<h1>Request Information</h1>
	
	<div class="brownDividerLine"></div>
	
	<p class="bold size18 helvetica">Please fill out the form below and we will contact you shortly.</p>
	
	<form method="post" action="/a/inc/process/request-information.php" class="submitForm">
		
		<label>First Name: <span class="error">*</span></label>
		<input type="text" name="firstName" />
		<div class="clear"></div>
		
		<label>Last Name: <span class="error">*</span></label>
		<input type="text" name="lastName" />
		<div class="clear"></div>

		
		<label>Email Address: <span class="error">*</span></label>
		<input type="text" name="email" />
		<div class="clear"></div>
		
		<label>Phone Number:</label>
		<input type="text" name="phone"  />
		<div class="clear"></div>
			
		<label>Message: <span class="error">*</span></label>
		<div class="clear"></div>
		<textarea name="message"></textarea>
		<div class="clear"></div>
		
		<label>Enter Code:</label>
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