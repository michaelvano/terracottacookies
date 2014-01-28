<?
require_once('a/inc/bootstrap.php');

if ($loggedIn) {header('Location: /shopping_checkout_pay-later.php'); exit;}



// META DESCRIPTIONS
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";

$title = "Login";
$page = "cart";
$breadcrumbMain = "Checking Out - Login";
$mainLink = "/login.php";
$thisPage = "/login.php";

include('a/inc/header.php');


?>
<div class="clear40"></div>
<div id="login" class="fullBorder">

	<h2>Login</h2>
	<p>If you are checking out, please login first before continuing on.</p>
	<?
	if ($_msg != "") 
	{
		switch ($_msg)
		{
			case 1: echo '<span class="error">* Email Needed</span>'; break;
			case 2: echo '<span class="error">* Password Needed</span>'; break;
			case 3: echo '<span class="error">* Email does not exist</span>'; break;
			case 4: echo '<span class="error">* Invalid Password</span>'; break;
			case 100: echo '<span class="success">You have been logged out.</span>'; break;
			case 101: echo '<span class="success">Your password has been reset! You can now log in with your new password.</span>'; break;
			case 102: echo '<span class="error">Please log in to access that page.</span>'; break;
		}
		echo '<div class="clear10"></div>';
	}
	?>
	
	<form method="post" action="<? echo $thisPage; ?>" enctype="multipart/form-data">
		<label>Email</label>
		<input type="text" name="email" placeholder="you@domain.com" value="<? echo stripslashes($_POST['email']); ?>" class="<? if ($_msg == 1 || $_msg == 3) {echo 'required';} ?>" />
		<div class="clear"></div>
	
		<label>Password</label>
		<input type="password" name="password" value="<? echo stripslashes($_POST['password']); ?>" class="<? if ($_msg == 2 || $_msg == 4) {echo 'required';} ?>" />
		<div class="clear"></div>
		<a href="/password/forget/">Forget Password?</a>
		<button type="submit" name="tryLogin" class="redButtonSmall right">Submit</button>
		<div class="clear"></div>
		
	</form>
	<div class="clear20"></div>
	<div class="textCenter">
		<a href="/shopping_register-user.php">Don't have an account? Click here to register.</a>
	</div>
		
</div>
<div class="clear40"></div>

<? include('a/inc/footer.php'); ?>