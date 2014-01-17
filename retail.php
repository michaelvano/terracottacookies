<?
require_once('a/inc/bootstrap.php');









// META DESCRIPTIONS
$mdesc = "";	
$mbots = "INDEX, FOLLOW";
$canon = "";

$title = "Retail";
$page = "retail";
$breadcrumbMain = "Retail";
$mainLink = "/retail/";

include('a/inc/header.php');









// ABOUT US SUB NAV
?>

<div id="subNav">
	<a href="/retail/" class="<? checkPage($page, "retail"); ?>" >Retail</a>
</div>


<div class="mainContent">

	<h1>Retail</h1>
	<div class="brownDividerLine"></div>
	
	<div id="map">
		<iframe width="346" height="234" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.ca/maps?q=20+Armstrong+Avenue,+Unit+%231+Georgetown,+Ontario+L7G+4R9&amp;hl=en&amp;ie=UTF8&amp;view=map&amp;f=d&amp;daddr=Armstrong+Ave,+Halton+Hills,+ON&amp;geocode=CSlz601snr-7FZcjmgId8MU8-w&amp;t=m&amp;ll=43.656152,-79.902728&amp;spn=0.003633,0.007446&amp;z=16&amp;output=embed"></iframe>
	</div>
	<p class="bold size18 textLeft">We currently offer most of our products in bulk at our factory outlet.</p>
	<p>
		<h2 class="red">LOCATION</h2>
		20 Armstrong Avenue, Unit #1<br />
		Georgetown, Ontario L7G 4R9
	</p>
	<p>
		<h2 class="red">HOURS OF OPERATION</h2>
		Monday to Friday: 9am-5pm 
	</p>
	
	<a target="_blank" href="http://maps.google.ca/maps?q=20+Armstrong+Avenue,+Unit+%231+Georgetown,+Ontario+L7G+4R9&daddr=Armstrong+Ave,+Halton+Hills,+ON&hl=en&view=map&geocode=CSlz601snr-7FZcjmgId8MU8-w&t=m&z=16" class="redButtonLarge left" style="padding:0 30px;" >Get Directions</a>
	
	<div class="clear40"></div>
	<div class="clear40"></div>
	
</div><?










?>

<? include('a/inc/footer.php'); ?>