<?


/*==================
	GENERAL
===================*/

// Function to check if in dev site or not
function is_dev()
{
	if (strstr($_SERVER['HTTP_HOST'], 'dev.')) { return true; }
	else { return false; }
}

// Gets the current pages url
function thisPageUrl() {
	
	$pageURL = 'http';
	
	if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	
	$pageURL .= "://";
	
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
	  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}


// gets the file extension of a file
function getFileExtension($filename) {
	$explode = explode('.', $filename);
	$ext = end($explode);
	return $ext;
	// $ext = pathinfo($filename);
	// return $ext['extension'];
	//return substr(strrchr($filename,'.'),1);
}





// CREATES A SAFE EMAIL ADDRESS
function safeEmail($email) {
    $email = eregi_replace('#','', $email);
    $length = strlen($email);
    for ($i = 0; $i < $length; $i++)
        $obfuscatedEmail .= "&#" . ord($email[$i]);  // creates ASCII HTML entity
    $return = '<a href="mailto:' . $obfuscatedEmail . '">'.$obfuscatedEmail.'</a>';
    echo $return;
}



function checkChecked($value, $array) {
	if (is_array($array)) {
		if (in_array($value, $array)) {echo 'checked="checked"';}
	} else {
		echo $array.' is not an array.';
	}
}


function checkSelected($this, $value) {	if ($this == $value) {echo 'selected="selected"';} }








// CREATES THE SEO NAME
function seoName($name) {
	$seoName = preg_replace("/[^A-z0-9\\s]+/", "", trim(stripslashes(strtolower($name))));
	$seoName = preg_replace("/\\s+/", "-", $seoName);
	$seoName = preg_replace("/\\-{2,}/", "-", $seoName);
	return $seoName;
}


// CREATES A SAFE FILE NAME WITH CURRENT DATE
function safeFileName($name) {
	$newFileName = preg_replace("/[^A-z0-9.\\s]+/", "", trim(stripslashes(strtolower($name))));
	$newFileName = preg_replace("/\\s+/", "-", $newFileName);
	$newFileName = preg_replace("/\\-{2,}/", "-", $newFileName);
	$newFileName = date("YmdHis").'_'.$newFileName;
	return $newFileName;
}

// CREATES AN ARRAY FROM AN XML FILE
function toArray($xml) {
	$array = json_decode(json_encode($xml), TRUE);
	
	foreach ( array_slice($array, 0) as $key => $value ) {
		if ( empty($value) ) $array[$key] = NULL;
		elseif ( is_array($value) ) $array[$key] = toArray($value);
	}

	return $array;
}



function showPageNumbers($pageNumber, $numberOfPages, $thisPage) {
	?>
	<div class="pageNumbers">
		<?
		if ($pageNumber != 0)
		{
			if ($pageNumber == 1 || $pageNumber == 0) {echo '<a href="'.$thisPage.'" class="prev">Prev</a>';}
			else { echo '<a href="'.$thisPage.'page/'.($pageNumber).'/" class="prev">Prev</a>'; }
			echo '<a href="'.$thisPage.'">1</a>';
		}
		if (($pageNumber-5) >= 1) {echo '. . .';}
		if (($pageNumber-4) >= 1) {echo '<a href="'.$thisPage.'page/'.($pageNumber-3).'/">'.($pageNumber-3).'</a>';}
		if (($pageNumber-3) >= 1) {echo '<a href="'.$thisPage.'page/'.($pageNumber-2).'/">'.($pageNumber-2).'</a>';}
		if (($pageNumber-2) >= 1) {echo '<a href="'.$thisPage.'page/'.($pageNumber-1).'/">'.($pageNumber-1).'</a>';}
		if (($pageNumber-1) >= 1) {echo '<a href="'.$thisPage.'page/'.($pageNumber).'/">'.($pageNumber).'</a>';}
		if ($pageNumber == 0) { echo '<a href="'.$thisPage.'" class="active">'.($pageNumber+1).'</a>'; } else {echo '<a href="'.$thisPage.'page/'.($pageNumber+1).'/" class="active">'.($pageNumber+1).'</a>'; }
		if (($pageNumber+1) <= ($numberOfPages-2)) {echo '<a href="'.$thisPage.'page/'.($pageNumber+2).'/">'.($pageNumber+2).'</a>';}
		if (($pageNumber+2) <= ($numberOfPages-2)) {echo '<a href="'.$thisPage.'page/'.($pageNumber+3).'/">'.($pageNumber+3).'</a>';}
		if (($pageNumber+3) <= ($numberOfPages-2)) {echo '<a href="'.$thisPage.'page/'.($pageNumber+4).'/">'.($pageNumber+4).'</a>';}
		if (($pageNumber+4) <= ($numberOfPages-2)) {echo '<a href="'.$thisPage.'page/'.($pageNumber+5).'/">'.($pageNumber+5).'</a>';}
		if (($pageNumber+5) <= ($numberOfPages-2)) {echo '. . .';}
		if ($pageNumber != ($numberOfPages-1)) {
			echo '<a href="'.$thisPage.'page/'.($numberOfPages).'/">'.$numberOfPages.'</a>';
			echo '<a href="'.$thisPage.'page/'.($pageNumber+2).'/" class="next">Next</a>';
		}
		?>
	</div>
	<?
}









function adminPagination($pageNumber, $numberOfPages, $thisPage) {
	?>
	<div class="pageNumbers">
		<?
		if ($pageNumber != 0)
		{
			if ($pageNumber == 1 || $pageNumber == 0) {echo '<a href="'.$thisPage.'1" class="prev">Prev</a>';}
			else { echo '<a href="'.$thisPage.($pageNumber).'" class="prev">Prev</a>'; }
			echo '<a href="'.$thisPage.'1">1</a>';
		}
		if (($pageNumber-5) >= 1) {echo '. . .';}
		if (($pageNumber-4) >= 1) {echo '<a href="'.$thisPage.($pageNumber-3).'">'.($pageNumber-3).'</a>';}
		if (($pageNumber-3) >= 1) {echo '<a href="'.$thisPage.($pageNumber-2).'">'.($pageNumber-2).'</a>';}
		if (($pageNumber-2) >= 1) {echo '<a href="'.$thisPage.($pageNumber-1).'">'.($pageNumber-1).'</a>';}
		if (($pageNumber-1) >= 1) {echo '<a href="'.$thisPage.($pageNumber).'">'.($pageNumber).'</a>';}
		if ($pageNumber == 0) { echo '<a href="'.$thisPage.($pageNumber+1).'" class="active">'.($pageNumber+1).'</a>'; } else {echo '<a href="'.$thisPage.($pageNumber+1).'" class="active">'.($pageNumber+1).'</a>'; }
		if (($pageNumber+1) <= ($numberOfPages-2)) {echo '<a href="'.$thisPage.($pageNumber+2).'">'.($pageNumber+2).'</a>';}
		if (($pageNumber+2) <= ($numberOfPages-2)) {echo '<a href="'.$thisPage.($pageNumber+3).'">'.($pageNumber+3).'</a>';}
		if (($pageNumber+3) <= ($numberOfPages-2)) {echo '<a href="'.$thisPage.($pageNumber+4).'">'.($pageNumber+4).'</a>';}
		if (($pageNumber+4) <= ($numberOfPages-2)) {echo '<a href="'.$thisPage.($pageNumber+5).'">'.($pageNumber+5).'</a>';}
		if (($pageNumber+5) <= ($numberOfPages-2)) {echo '. . .';}
		if ($pageNumber != ($numberOfPages-1)) {
			echo '<a href="'.$thisPage.($numberOfPages).'">'.$numberOfPages.'</a>';
			echo '<a href="'.$thisPage.($pageNumber+2).'" class="next">Next</a>';
		}
		?>
	</div>
	<?
}









function justText($text)
{
	$justText = strip_tags($text);
	$justText = stripslashes($justText);
	$justText = trim($justText);
	$justText = str_replace("&nbsp;", "", $justText);
	$justText = str_replace("\\n", " ", $justText);
	$justText = str_replace("\\t", " ",$justText);
	
	return $justText;
}



function generatePassword ($length = 8) {

    // start with a blank password
    $password = "";

    // define possible characters - any character in this string can be
    // picked for use in the password, so if you want to put vowels back in
    // or add special characters such as exclamation marks, this is where
    // you should do it
    $possible = "123467890bcdfghjkmnpqrtvwxyzBCDFGHJKLMNPQRTVWXYZ";

    // we refer to the length of $possible a few times, so let's grab it now
    $maxlength = strlen($possible);
  
    // check for length overflow and truncate if necessary
    if ($length > $maxlength) {
      $length = $maxlength;
    }
	
    // set up a counter for how many characters are in the password so far
    $i = 0; 
    
    // add random characters to $password until $length is reached
    while ($i < $length) { 

      // pick a random character from the possible ones
      $char = substr($possible, mt_rand(0, $maxlength-1), 1);
        
      // have we already used this character in $password?
      if (!strstr($password, $char)) { 
        // no, so it's OK to add it onto the end of whatever we've already got...
        $password .= $char;
        // ... and increase the counter by one
        $i++;
      }

    }

    // done!
    return $password;
}






/*==================
	MENU
===================*/

function checkPage($thisPage, $link) { if ($thisPage == $link) {echo 'active';} }
function checkSubPage($subPage, $link) { if ($subPage != $link) {echo 'inactive';}}
function checkStorePage($storePage, $link) { if ($storePage == $link) {echo 'class="active"';} }
function checkOption($postedValue, $thisOption) { if ($postedValue == $thisOption) {echo 'selected="selected"';} }






/*==================
	LEFT SIDE
===================*/
function getSocialButtons($url) {
	?>
	<div id="socialButtons">
		<div id="twitter">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<? echo $url; ?>" data-	text="Name of Site here" data-count="vertical">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0]; if(!d.getElementById(id)){js=d.createElement(s); js.id=id; js.src="//platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</div>
				
		<div id="facebook">
			<div class="fb-like" data-href="<? echo $url; ?>" data-send="false" data-layout="box_count" data-width="43" data-show-faces="false"></div>
		</div>
				
		<div id="googlePlus">
			<script type="text/javascript" src="https://apis.google.com/js/plusone.js" ></script>
			<div class="g-plusone" data-size="tall" data-href="<? echo $url; ?>"></div>
		</div>
		
		<div id="linkedin">
			<script src="http://platform.linkedin.com/in.js" type="text/javascript"></script>
			<script type="IN/Share" data-url="<? echo $url; ?>" data-counter="top"></script>
		</div>
	</div>
	<?
}

function showSocialMedia($facebook=1, $twitter=1) {
	
	if ($facebook == 1) {
		?>
		<div class="fb-like-box" data-href="http://www.facebook.com/platform" data-width="250" data-height="170" data-show-faces="true" data-stream="false" data-header="true"></div>
		<div class="clear" style="height:25px"></div>
		<?
	}
	
	
	if ($twitter == 1) {
		?>
		<div class="">
			<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
			<script>
				new TWTR.Widget({
					version: 2,
					type: 'profile',
					rpp: 1,
					interval: 30000,
					width: 250,
					height: 192,
					theme: {
						shell: {
							background: '#faaf40',
							color: '#ffffff'
						},
						tweets: {
							background: '#67cc3b',
							color: '#ffffff',
							links: '#1b76b8'
						}
					},
					features: {
						scrollbar: false,
						loop: false,
						live: false,
						behavior: 'all'
					}
				}).render().setUser('twitter').start();
			</script>
		</div>
		<div class="clear" style="height:25px"></div>
		<?
	}
}









function showSocialLinks($page="")
{
	?>
	<div class="socialLinks">
		<?
		if ($page == "home" || $page == "contact") { echo '<div class="size27 blue uppercase oswald">'; }
		else { echo '<div class="size20 grey uppercase oswald">'; }
		?>
			Keep in touch with Ida
		</div>
	
		<?
		if ($page != "home") {echo '<div class="greyDividerLine"></div>';}
		else {echo '<div class="clear40"></div>';}
		?>
		
		<a href="http://www.facebook.com/pages/IPro-Realty/343757079046531?ref=hl" target="_blank" class="link">
			<img src="/a/i/site/icon_blue_facebook.png" />
			<div class="text">
				<span class="oswald size16 grey uppercase">Facebook</span><br />
				<span class="size14 gold">Like Us</span>			
			</div>
			<div class="clear"></div>
		</a>
		
		<a href="/contact/?referral=link" class="link">
			<img src="/a/i/site/icon_blue_dollar-sign.png" />
			<div class="text">
				<span class="oswald size16 grey uppercase">Send me a referral</span><br />
				<span class="size14 gold">And Receive A Free iPad</span>			
			</div>
			<div class="clear"></div>
		</a>
		
		<a href="http://www.linkedin.com/profile/view?id=198826680&locale=en_US&trk=tyah2" target="_blank" class="link">
			<img src="/a/i/site/icon_blue_linkedin.png" />
			<div class="text">
				<span class="oswald size16 grey uppercase">Linkedin</span><br />
				<span class="size14 gold">My Professional Network</span>
			</div>
			<div class="clear"></div>
		</a>
		
		<?
		if ($page != "contact")
		{
			?>
			<a href="/contact/" class="link">
				<img src="/a/i/site/icon_blue_email.png" />
				<div class="text">
					<span class="oswald size16 grey uppercase">Email Ida</span><br />
					<span class="size14 gold">Contact Me!</span>
				</div>
				<div class="clear"></div>
			</a>
			<?
		}
		?>
	</div>
	<?
}











