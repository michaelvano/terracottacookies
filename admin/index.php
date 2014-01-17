<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Admin Login";
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";
$page = "admin";
$subPage = "dashboard";
$thisPage = "/admin/index.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');









// LOGIN SCREEN
if (!$loggedIn || !$isAdmin)
{
	?>
	<div id="subNav">
		
	</div>
	<?

	?>
	<div class="mainContent">
		<div class="clear40"></div>
		<div id="login" class="fullBorder">
	
			<h2>Please Sign In</h2>
			
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
			
		</div>	
	</div>


	<?
}










else {

	include($_SERVER['DOCUMENT_ROOT'].'/admin/nav.php');
	
	$getInfo = getInfo("store_confirmed_carts", "is_closed", 0);
	$openOrders = count($getInfo);
	
	?>
	<div class="mainContent">
		<h1>Admin Dashboard</h1>
		
		<div class="brownDividerLine"></div>
		
		<span class="size18">You have <span class="bold red"><? echo $openOrders; ?></span> open orders right now. <a href="/admin/orders.php">Click here to view them</a></span> 
		
	</div>
	<?
	
}

?>






<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>