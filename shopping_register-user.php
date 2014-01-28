<?
require_once('a/inc/bootstrap.php');


// META DESCRIPTIONS
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";

$title = "Register User";
$page = "checkout";
$breadcrumbMain = "Register User";
$mainLink = "/shopping_register-user.php";
$thisPage = "/shopping_register-user.php";

include('a/inc/header.php');




?>
<div id="checkingOut">

	<h1>Sign Up</h1>
	
	<div class="brownDividerLine"></div>	
	
	<p class="bold">Sign up to keep track of your orders as well as re-order previously made orders!</p>
	<p class="red bold">All * fields are required</p>
	<p>The email will be used as your login username.</p>
	<p>The address used should be the same as the shipping address.</p>
	
	<form enctype="multipart/form-data" method="post" action="/a/inc/process/sign-up.php" class="submitForm"> 
		<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/forms/sign-up.php'); ?>
	</form>
	
	<div class="clear40"></div>
	
</div>

<? include('a/inc/footer.php'); ?>