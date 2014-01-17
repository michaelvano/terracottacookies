<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

	<title><?php echo $title; ?> | Terra Cotta Cookie Co.</title>
	<link rel="shortcut icon" href="favicon.ico" />

	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<?
	if ($mdesc != "") {echo '<meta name="description" content="'.$mdesc.'" />'; }
	if ($mkey != "") {echo '<meta name="keywords" content="'.$mkey.'" />';}
	if ($mbots != "") {echo '<meta name="robots" content="'.$mbots.'" />';}
	if ($canon != "") {echo '<link rel="canonical" href="'.$canon.'" />';} 
	?>
	
	<link href="/a/css/style.css" rel="stylesheet" type="text/css" />
	<link href="/a/css/jquery-ui.css" rel="stylesheet" type="text/css" />
	<!--[if lte IE 7]><link href="/a/css/style_ie7.css" rel="stylesheet" type="text/css" /><![endif]-->
	<!--[if IE]><link href="/a/css/style_ie.css" rel="stylesheet" type="text/css" /><![endif]-->
	<link href='http://fonts.googleapis.com/css?family=EB+Garamond|Dancing+Script' rel='stylesheet' type='text/css'>


	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script> -->
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
	<script src="/a/js/modernizer.js" type="text/javascript"></script>
	<script src="/a/js/submit-form.js" type="text/javascript"></script>
	
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
	<script>
		$(function() {
			/*
			$('.selectCompany').change(function() { this.form.submit(); });
			$('.selectLocation').change(function() {	this.form.submit(); });
			*/
			$('.delete').click(function() {return confirm('Are you sure you wish to PERMANENTLY delete this item?');});
		});
		
		// MODERNIZER
		<?
		/*
		if(preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT']))
		{ 
			?>
			$(document).ready(function() {
				if (!Modernizr.input.placeholder){
					$("input").each( function(){
						if($(this).val()=="" && $(this).attr("placeholder")!=""){
							$(this).val($(this).attr("placeholder"));
							$(this).focus(function(){
								if($(this).val()==$(this).attr("placeholder")) $(this).val("");
							});
							$(this).blur(function(){
								if($(this).val()=="") $(this).val($(this).attr("placeholder"));
							});
						}
					});
				}
			});
			
			// MAKES PLACEHOLDER WORK IN IE
			$(function() {
				if(!$.support.placeholder) { 
					var active = document.activeElement;
					$(':text').focus(function () {
						if ($(this).attr('placeholder') != '' && $(this).val() == $(this).attr('placeholder')) {
							$(this).val('').removeClass('hasPlaceholder');
						}
					}).blur(function () {
						if ($(this).attr('placeholder') != '' && ($(this).val() == '' || $(this).val() == $(this).attr('placeholder'))) {
							$(this).val($(this).attr('placeholder')).addClass('hasPlaceholder');
						}
					});
					$(':text').blur();
					$(active).focus();
					$('form').submit(function () {
						$(this).find('.hasPlaceholder').each(function() { $(this).val(''); });
					});
				}
			});
			<?
		}
		*/
		?>
		
    </script>
	

	
	<!--[if lt IE 9]><script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	<!--
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', 'UA-30755698-1']);
		_gaq.push(['_trackPageview']);

		(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
	-->
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