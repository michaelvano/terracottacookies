<?

// CREATES A SAFE EMAIL ADDRESS
function safeEmail($email) {
    $email = eregi_replace('#','', $email);
    $length = strlen($email);
    for ($i = 0; $i < $length; $i++)
        $obfuscatedEmail .= "&#" . ord($email[$i]);  // creates ASCII HTML entity
    $return = '<a href="mailto:' . $obfuscatedEmail . '">'.$obfuscatedEmail.'</a>';
    echo $return;
}

// META DESCRIPTIONS
$title = "Gluten Free and Natural Foods";
$mdesc = "Since 1984, we have been making cookies with care and passion. Our facility is 100% nut and peanut free and we use only the finest, all natural ingredients. In addition to our traditional favourite recipes, we also offer an extensive line of Gluten Free items.";	
$mbots = "INDEX, FOLLOW";
$canon = "";
$page = "home";
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title><?php echo $title; ?> | Terra Cotta Gluten-Free Foods.</title>
	<link rel="shortcut icon" href="favicon.ico" />

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?
	if ($mdesc != "") {echo '<meta name="description" content="'.$mdesc.'" />'; }
	if ($mkey != "") {echo '<meta name="keywords" content="'.$mkey.'" />';}
	if ($mbots != "") {echo '<meta name="robots" content="'.$mbots.'" />';}
	if ($canon != "") {echo '<link rel="canonical" href="'.$canon.'" />';} 
	?>
	
	<link href="http://www.terracottacookies.com/a/css/style.css" rel="stylesheet" type="text/css" />
	<link href="http://www.terracottacookies.com/a/css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<!--[if lte IE 7]><link href="/a/css/style_ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
	<!--[if IE]><link href="/a/css/style_ie.css" rel="stylesheet" type="text/css" /><![endif]-->
	<link href='http://fonts.googleapis.com/css?family=EB+Garamond|Dancing+Script' rel='stylesheet' type='text/css'>


	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	
	<? /*
	<script type="text/javascript">
	
	  var _gaq = _gaq || [];
	  _gaq.push(['_setAccount', 'UA-39466458-1']);
	  _gaq.push(['_trackPageview']);
	
	  (function() {
	    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
	    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	  })();
	
	</script>
	*/ ?>	

	
	<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>


<body>

	<div id="fb-root"></div>
	<script>
		(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;	
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));
	</script>
	
	<div id="container" class="gluten-free" style="margin-bottom:-304px;">
		<div>
			<div>
				<div id="homeSpacer"></div>	
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div> <!-- #CONTENT/SECTION -->
		<div id="clearFooter" style="height:300px;"></div>
	</div> <!-- #CONTAINER -->

	<div class="clear"></div>
	
	<div id="footer-top">
	</div>
	
	<div id="footer" style="height:300px;">
		
		<div  class="container gluten-free">
			<div class="clear10"></div>
			
			<div class="divider"></div>
			
			<div class="column connect">
				<h2>Connect With Us</h2>
				<div class="clear10"></div>
				<div class="clear5"></div>
				<a href="https://www.facebook.com/TCCookieCo" target="_blank">
					<img src="/a/i/site/icon_social-media_facebook.png" class="left">
					Like Us On <br />
					<span>Facebook</span>
				</a>
				<a href="https://twitter.com/TCCookieCo" target="_blank">
					<img src="/a/i/site/icon_social-media_twitter.png" class="left">
					Follow Us On <br />
					<span>Twitter</span>
				</a>
				<a href="/blog/"> 
					<img src="/a/i/site/icon_blog.png" class="left">
					Read Our <br />
					<span>Blog</span>
				</a>
			</div>
			<div class="divider"></div>
			
			<div class="column subscribe">
				<h2>Email Club Sign Up</h2>
				<div class="clear10"></div>
				<div class="clear5"></div>
				<form method="post" action="/email-club-sign-up/">
					<input type="text" name="email" placeholder="Your Email Address" />
					<div class="clear"></div>
					<button type="submit" class="redButtonSmall">Subscribe</button>
				</form>
				<div class="clear5"></div>
				<a href="http://www.surveymonkey.com/s/RNQ2Y6T" target="_blank"><h2><span class="size17">Customer Feedback Survey</span></h2></a>
			</div>
			<div class="divider"></div>			
			
			<div class="column contactUs">
				<h2>Contact Us</h2>
				<div class="clear10"></div>
				<span class="uppercase bold">Toll Free:</span> 1-800-561-8833<br />
				<span class="uppercase bold">Phone:</span> 905-877-4216
				<div class="clear10"></div>
				<? safeEmail('office@terracottacookies.com'); ?>
				<div class="clear10"></div>				
			</div>
			
			<div class="column contactUs">
				<div class="clear40"></div>
				Terra Cotta Cookie Co.<br />
				20 Armstrong Ave., Unit 1,<br />
				Georgetown, ON. L7G 4R9<br />
				<br />
				<a href="http://www.terracottacookies.com/retail/" class="redButtonSmall white left">Contact</a>
			</div>
			
			<div class="divider" style="float:right;"></div>
			
			<div class="clear10"></div>
			
		</div>
		
		<div class="certification">
			<div class="container">
				<div class="left">
					<span class="dancing size24">A division of Terra Cotta Cookie Co. Ltd.</span>
				</div>
				<div class="right">
					
					<a href="http://www.celiac.ca/" target="_blank"  style="float:right;">
						<img src="http://www.terracottacookies.com/a/i/gluten-free/logo_canadian-celiac-association.png" alt="Certifications" title="Certifications" style="margin:2px 0 0 0;" />
					</a>
					<a href="http://www.terracottacookies.com/certifications.php" class="brownButtonSmall" style="float:right; margin:13px 18px 0 0;">
						CERTIFICATIONS
					</a>					
				</div>
			</div>
		</div>
		
				
		<div id="copyright">
			<div class="clear10"></div>
			<div class="container">
				<div class="left">&copy; Copyright <? echo date("Y"); ?> Terra Cotta Cookie Co. All Rights Reserved.</div>
				<div class="right">Website Design & SEO by <a href="http://www.nobulmedia.com/" rel="nofollow" target="_blank">noBul Media</a></div>
			</div>
		</div>
	
		
	</div> <!-- #FOOTER -->
	
	<? /* <!--[if lte IE 7]><script src="/a/ie6/warning.js"></script><script>window.onload=function(){e("/a/ie6/")}</script><![endif]--> */ ?>
	
	<!-- Piwik --> 
	<!-- 
	<script type="text/javascript">
		var pkBaseURL = (("https:" == document.location.protocol) ? "https://www.nobulmedia.com/piwik/" : "http://www.nobulmedia.com/piwik/");
		document.write(unescape("%3Cscript src='" + pkBaseURL + "piwik.js' type='text/javascript'%3E%3C/script%3E"));
		</script><script type="text/javascript">
		try {
		var piwikTracker = Piwik.getTracker(pkBaseURL + "piwik.php", 10);
		piwikTracker.trackPageView();
		piwikTracker.enableLinkTracking();
		} catch( err ) {}
	</script><noscript><p><img src="http://www.nobulmedia.com/piwik/piwik.php?idsite=10" style="border:0" alt="" /></p></noscript>
	-->
	<!-- End Piwik Tracking Code -->
</body>
</html>
	
