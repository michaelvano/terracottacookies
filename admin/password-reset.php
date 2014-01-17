<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');

if ($_GET['_key'] != "") {$_key = $_GET['_key'];} elseif ($_POST['_key'] != "") {$_key = $_POST['_key'];}



// META DESCRIPTIONS
$title = "Password Reset";
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";
$page = "password";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');









// PROCESS PASSWORD RESET
if (isset($_POST['passwordReset'])) {
	
	extract($_POST);
	
	if ($password == "") {$_msg = 1;}
	elseif ($retype == "") {$_msg = 2;}
	elseif ($password != $retype) {$_msg = 3;}
	else {
		
		$salthash = hash('sha1', 'apple83792');
		$hashPassword = createHash($password, $salthash, "sha1");
		
		$fields = array("password", "resetPassword");
		$values = array($hashPassword, "");
		
		$update = updateInfo("users", $fields, $values, "id", $_id);
		if ($update) {
			if ($loggedIn) {$_msg = 5;}
			else { echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/index.php?_msg=101">'; exit; }
		}
		else {$_msg = 4;}	
	
	}
	
}








// GET INFORMATOIN FROM LINK

if ($_key != "" && $_id != "") 
{
	$query = "SELECT * FROM `users` WHERE `id`='".$_id."' AND `resetPassword`='".$_key."'";
	$checkUser = mysql_query($query);
	if (mysql_num_rows($checkUser) == 0) {$notRequested = true;}
	else {
		$info = mysql_fetch_assoc($checkUser);
		$forgotPassword = true;
	}
}





elseif ($loggedIn) {
	$permissionDenied = false;
	//$ID = $_SESSION['ID'];
	$getInfo = getInfo("users", "id", $_id);
	if (empty($getInfo)) {$permissionDenied = true;}
	else {
		$user = $info[0];
	}
}




else {$permissionDenied = true;}
?>






<?
if ($permissionDenied) {echo '<span class="error">You do not have permissions to view this page';}
else {
	
	if ($loggedIn && $isAdmin) { include($_SERVER['DOCUMENT_ROOT'].'/admin/nav.php'); }
	else { ?> <div id="subNav"></div> <? }
	?>
	
	<div class="mainContent">
		<div class="clear40"></div>
		<div id="login" class="fullBorder">
			<h2>Reset your password here.</h2>
			
			<?		
			switch($_msg) {
				case 1: echo '<span class="error">* Password required</span>'; break;
				case 2: echo '<span class="error">* Please retype your password</span>'; break;
				case 3: echo '<span class="error">* Passwords do not match.</span>'; break;
				case 4: echo '<span class="error">* Password could not be reset, please try again.</span>'; break;
				case 5: echo '<span class="success">Your password has been reset.</span>'; break;
				case 200: echo '<span class="success">Please change your password from the default.</span>'; break;
			}
			if ($_msg != "") {echo '<div class="clear10"></div>';}
			?>
			
			<form id="resetPassword" action="/password/reset/" method="post">
			
				<label>New Password:</label>
				<input type="password" name="password" value="<? echo $password; ?>" class="<? if ($_msg == 1 || $_msg == 3) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Retype Password:</label>
				<input type="password" name="retype" value="<? echo $retype; ?>" class="<? if ($_msg == 2 || $_msg == 3) {echo 'required';} ?>"/>
				<div class="clear20"></div>
				
				<?
				if ($forgotPassword) 
				{
					?>
					<input type="hidden" name="_id" value="<? echo stripslashes($info['id']); ?>" />
					<input type="hidden" name="_key" value="<? echo stripslashes($info['resetPassword']); ?>" />
					<?
				}
				else 
				{
					?>
					<input type="hidden" name="_id" value="<? echo stripslashes($_SESSION['ID']); ?>" />
					<input type="hidden" name="_key" value="<? echo stripslashes($_key); ?>" />
					<?
				}
				?>
				 
				<button type="submit" class="redButtonSmall left" name="passwordReset">Reset Password</button>
				<div class="clear"></div>
				
			</form>
		</div>
	</div>
	<?
}
?>

















<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>