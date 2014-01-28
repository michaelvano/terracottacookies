				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div> <!-- #CONTENT/SECTION -->
		<div id="clearFooter" <? if ($page == "home") {echo 'style="height:370px;"';} ?>></div>
	</div> <!-- #CONTAINER -->

	<div class="clear"></div>
	
	<div id="footer" <? if ($page == "home") {echo 'style="height:370px;"';} ?> >
		
		<div id="navFooter">
			<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/nav.php'); ?>
		</div>
		
		<div class="container">
			<div class="clear20"></div>
			
			<div class="column first">
				<h2>Welcome To Terra Cotta Cookie Co.</h2>
				<p>Since 1984, we have been making cookies with care and passion. Our facility is 100% nut and peanut free and we use only the finest, all natural ingredients. In addition to our traditional favourite recipes, we also offer an extensive line of Gluten Free items.</p>
				<a href="/about-us/our-story/">Learn More About Us &#187;</a>
			</div>
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
				Terra Cotta Cookie Co.<br />
				1-20 Armstrong Ave.<br />
				Georgetown, ON. L7G 4R9
				
			</div>
			
			<div class="clear"></div>
			
		</div>
		
		<div class="clear10"></div>
		
		<?
		if ($page == "home") 
		{
			?>
			<div id="homeFooter">
				<div class="container">
					<div class="dancing bold size24 left" style="line-height:60px;">Terra Cotta Cookie Co. Since 1984</div>
					<a href="/a/pdfs/haccp-certificate.pdf" class="options" target="_blank">
						<img src="/a/i/site/icon_haccp-certified.png" class="left" />
						H.A.C.C.P<br />
						Certified
					</a>
					<div class="options">
						<img src="/a/i/site/icon_gluten-free.png" class="left" />
						Gluten Free<br />
						Options
					</div>
					<div class="options">
						<img src="/a/i/site/icon_peanut-free.png" class="left" />
						Peanut &<br />
						Nut Free
					</div>
				</div>
			</div>
			<?
		}
		?>
		
		<div id="copyright">
			<div class="clear10"></div>
			<div class="container">
				<div class="left">&copy; Copyright <? echo date("Y"); ?> Terra Cotta Cookie Co. All Rights Reserved. | <a href="/admin/">Login</a></div>
				<div class="right">Website Design & SEO by <a href="http://www.nobulmedia.com/" target="_blank" rel="nofollow">noBul Media</a></div>
			</div>
		</div>
	
		
	</div> <!-- #FOOTER -->
	<? /* <!--[if lte IE 7]><script src="/a/ie6/warning.js"></script><script>window.onload=function(){e("/a/ie6/")}</script><![endif]--> */ ?>
	<!-- Piwik --> 
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
<!-- End Piwik Tracking Code -->
</body>
</html>