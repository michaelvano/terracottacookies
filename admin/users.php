<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Users";
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";
$page = "admin";
$subPage = "users";
$thisPage = "/admin/users.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');









/* =======================
	DELETES ADMINS
=========================*/
if ($_action == "delete" && $_id != "")
{
	$delete = deleteInfo("users", "id", $_id);	
	if ($delete) {$_msg = 7;} else {$_msg = 8;}
}









/* =======================
	EDIT USERS / LOG HISTORY
=========================*/
if ($_action == "update_user" && $_id != '')
{
	extract($_POST);
	
	// Validation Checks
	if ($name == '') {$name_needed = true;}
	if ($new_email == '' && $password == '') {$one_needed = true;}
	else
	{
		if ($new_email != '')
		{
			$check = getInfo('users', 'email', $new_email);
			if ($new_email == $old_email) {$email_must_be_different = true;}
			elseif (!empty($check)) {$already_exists = true;}
			elseif (!validEmail($new_email)) {$invalid_email = true;}
		}
		
		if ($password != '')
		{
			if ($retype == '') {$retype_needed = true;}
			elseif ($password !== $retype) {$dont_match = true;}
		}
	}
	
	
	if (
		$name_needed ||
		$one_needed ||
		$email_must_be_different ||
		$already_exists ||
		$invalid_email ||
		$retype_needed ||
		$dont_match
	)
	{		
		$error = true;
		$_action = 'edit_user';
	}
	else
	{
		$fields = array('name', 'date_requested', 'user_id', 'edited_by');
		$values = array($name, 'NOW()', $_id, $_SESSION['name']);
		
		if ($new_email != '')
		{
			array_push($fields, 'old_email', 'new_email');
			array_push($values, $old_email, $new_email);
			
			updateInfo('users', array('email'), array($new_email), 'id', $_id);
		}
		
		if ($password != '')
		{
			// Creates default password
			$salthash = hash('sha1', 'apple83792');
			$password = createHash($password, $salthash, $mode='sha1');
			
			array_push($fields, 'password_changed');
			array_push($values, 1);
			
			updateInfo('users', array('password'), array($password), 'id', $_id);
		}
		
		$insert = insertInfo('user_history', $fields, $values);
		
		if ($insert) {$_msg = 7;}  else {$_msg = 8;}
	}
}
		








/* =======================
	ADD/EDIT ADMINS
=========================*/
if ($_action == "insert" || $_action == "update")
{
	extract($_POST);
		
	//check for errors
	if ($firstName == "") {$firstNameNeeded = true;}
	if ($email == "") {$emailNeeded = true;}
	elseif (!validEmail($email)) {$invalidEmail = true;}
	elseif ($_action == "insert")
	{
		$checkEmail = getInfo("users", "email", $email);
		if (!empty($checkEmail)) {$emailAlreadyExists = true;}
	}
	
	if (!$firstNameNeeded && !$emailNeeded && !$invalidEmail && !$emailAlreadyExists)
	{
		// insert information
		if ($_action == "insert")
		{
			// Creates default password
			$salthash = hash('sha1', 'apple83792');
			$password = createHash("terracotta123", $salthash, $mode='sha1');
			
			// create arrays to use in insert and update functions
			$fields = array("firstName", "lastName", "email", "password", "dateRegistered", "permissionLevel");
			$values = array($firstName, $lastName, $email, $password, "NOW()", 9);
			$insert = insertInfo("users", $fields, $values);
			if ($insert) {$_msg = 1;} else {$_msg = 2; $_action = "add";}
		}
				
		elseif ($_action == "update")
		{
			$fields = array("firstName", "lastName");
			$values = array($firstName, $lastName);
			
			$update = updateInfo("users", $fields, $values, "id", $_id);
			if ($update) {$_msg = 5;} else {$_msg = 6; $_action = "edit";}			
		}			
	}
	
	else
	{
		$error = true;
		if ($_action == "insert") {$_action = "add";}
		elseif ($_action == "insertAdmin") {$_action = "addAdmin";}
		elseif ($_action == "update") {$_action = "edit";}
	}

}









if (!$loggedIn) {echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/?_msg=102">'; exit;}
elseif (!$isAdmin) {echo 'You do not have permissions to view this page';}
else {

	include($_SERVER['DOCUMENT_ROOT']."/admin/nav.php");
	
	?>
	<div class="mainContent">
	
		<div class="clear10"></div>
		
		<h1 class="left">
			<?
			switch($_action)
			{
				case "add": echo 'Add User'; break;
				case "edit": echo 'Edit Admin'; break;
				case "edit_user": echo 'Edit User'; break;
				case "view": echo 'View User Info'; break;
				default: echo 'Manage Users'; break;
			}
			?>
		</h1>
		
		<div class="right" style="margin:0 0 20px 0;">
			<div class="clear10"></div>
			<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add Admin + </a>
			<a href="<? echo $thisPage; ?>?_action=view_admins" class="redButtonSmall right" style="margin:0 0 0 15px" >View Admins</a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right"  >View Users</a>
			
		</div>
		
		<div class="clear20"></div>
		
		<?
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Admin has been added.</div>'; break;
				case 2: echo '<div class="error">Admin could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">Admin has been updated.</div>'; break;
				case 4: echo '<div class="error">Admin could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">Admin has been deleted.</div>'; break;
				case 6: echo '<div class="error">Admin could not be deleted. Please try again.</div>'; break;
				case 7: echo '<div class="success">User has been updated.</div>'; break;
				case 8: echo '<div class="error">User could not be updated. Please try again.</div>'; break;
			}		
			echo '<div class="clear10"></div>';
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			VIEW USER INFO
		=========================*/
		if ($_action == 'view' && $_id != '')
		{
			$get = getInfo('users', 'id', $_id);
			$log = getInfo('user_history', 'user_id', $_id, 'date_requested', 'DESC');
			
			if (!empty($get)) { $info = $get[0]; }
			
			?>
			<div class="size22" style="line-height:1.5em;">
				<strong>Name: </strong> <?= stripslashes($info['lastName'].', '.$info['firstName']); ?> <br />
				<strong>Email: </strong> <?= stripslashes($info['email']); if ($info['do_not_contact'] == 1) {echo ' (do not contact through this email)';} ?> <br />
				<strong>Date Registered: </strong> <?= date_format(date_create($info['dateRegistered']), 'F d, Y'); ?> <br />
				<strong>School: </strong> <?= stripslashes($info['school']); ?> <br />
				<strong>Address: </strong> <?= stripslashes($info['address']); ?> <br />
				<strong>City: </strong> <?= stripslashes($info['city']); ?> <br />
				<strong>Postal Code: </strong> <?= stripslashes($info['postal_code']); ?> <br />
				<strong>Phone: </strong> <?= stripslashes($info['phone']); ?> <br />
				<strong>Mobile: </strong> <?= stripslashes($info['mobile']); ?> <br />
			</div>
			
			<div class="clear10"></div>
			<a href="<? echo $thisPage; ?>?_action=edit_user&_id=<?= $_id; ?>" class="redButtonLarge right">Edit Account</a>
			<?	
			
			if (!empty($log))
			{
				?>
				<div class="clear40"></div>
				<h2>Account Updates Log</h2>
				<table class="listing tablePadding">
					<thead>
						<tr>				
							<th class="textLeft" width="22%">Date</th>
							<th class="textLeft" width="25%">Requested By</th>
							<th class="textLeft" width="25%">Changed By</th>
							<th class="textLeft">Action</th>							
						</tr>
					</thead>
					<?					
					foreach ($log AS $a)
					{
						?>
						<tr valign="top">
							<td><?= date_format(date_create($a['date_requested']), 'F d, Y H:i:s'); ?></td>
							<td><?= stripslashes($a['name']); ?></td>
							<td><?= stripslashes($a['edited_by']); ?></td>
							<td>
								<?
								if ($a['password_changed'] == 1) 
								{
									?>
									- Password Changed <br />
									<?
								}
								if ($a['new_email'] != '') 
								{
									?>
									- Email changed from <?= stripslashes($a['old_email']); ?> to <?= stripslashes($a['new_email']); ?><br />
									<?
								}
								?>
							</td>
						</tr>
						<?
	
					}
					?>
					
				</table>
				<div class="clear40"></div>
				<?
			}
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			EDIT USER INFO
		=========================*/
		elseif ($_action == 'edit_user' && $_id != '')
		{
			$get = getInfo('users', 'id', $_id);
			
			if (!empty($get)) { $info = $get[0]; $old_email = $info['email']; }
			?>
			<style>
				input[readonly] {background-color:#ededed;}
			</style>
			<?
			if ($error)
			{
				echo '<div class="error">';
					if ($name_needed) {echo '<span class="error">- You must enter whom is making the request to change this account</span><br />';}				
					if ($one_needed) {echo '<span class="error">- You need to change at least one setting for the account</span><br />';}
					if ($email_must_be_different) {echo '<span class="error">- The new email given is the same as the old one.</span><br />';}				
					if ($already_exists) {echo '<span class="error">- The new email given already exists. Please use another one.</span><br />';}
					if ($invalid_email) {echo '<span class="error">- An invalid email was given.</span><br />';}
					if ($retype_needed) {echo '<span class="error">- Please re-type the new password. </span><br />';}
					if ($dont_match) {echo '<span class="error">- The passwords do not match.</span><br />';}
				echo '</div>';
				echo '<div class="clear10"></div>';
			}
			?>
			<div class="size22 bold">Editing Account # <?= $info['id']; ?> - <?= stripslashes($info['lastName'].', '.$info['firstName']); ?></div>
			<form enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>"> 
				
				<p class="bold">These changes will be tracked to ensure there is no confusion on the part of customers.</p>
				<p class="bold">You can only edit the email or password here. Any other user account settings can be changed by the users themselves.</p>
				
				<label>Requested By: </label>
				<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($name_needed) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Current Email: </label>
				<input type="text" name="old_email" value="<? echo stripslashes($old_email); ?>" readonly />
				<div class="clear"></div>

				<label>New Email: </label>
				<input type="text" name="new_email" value="<? echo stripslashes($new_email); ?>" class="<? if ($email_must_be_different || $one_needed || $email_needed || $invalid_email || $already_exists) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<div class="spacer10"></div>
				<p class="bold">To change the password is usually in the case they can't access the account email and have forgotten the password. Leave it empty if just updating the email.</p>
				
				<label>Password: </label>
				<input type="password" name="password" value="<? echo stripslashes($password); ?>" class="<? if ($one_needed || $dont_match) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Retype: </label>
				<input type="password" name="retype" value="<? echo stripslashes($retype); ?>" class="<? if ($dont_match || $retype_needed) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<input type="hidden" name="_action" value="update_user" />
				<input type="hidden" name="_id" value="<?= $_id; ?>" />
					
				<button type="submit" class="redButtonSmall">
					Update Account
				</button>
				<div class="clear"></div>
			</form>
			<?	
		}
		
		
		
		
		
		
		
		
		/* =======================
			ADMIN FORM
		=========================*/
		elseif ($_action == "add" || $_action == "edit") 
		{
			if ($_action == "edit")
			{
				$getUserInfo = getInfo("users", "id", $_id);
				extract($getUserInfo[0]);
			}
			
			if ($error) {
				echo '<div class="error">';
					if ($firstNameNeeded) {echo '<span class="error">First Name Required.</span><br />';}				
					if ($emailNeeded) {echo '<span class="error">Email reqiuired.</span><br />';}
					if ($invalidEmail) {echo '<span class="error">Invalid Email.</span><br />';}				
					if ($emailAlreadyExists) {echo '<span class="error">Email already being used in database.</span><br />';}
				echo '</div>';
				echo '<div class="clear10"></div>';
			}
			?>
				
			<form enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>"> 
				
				<label>First Name: </label>
				<input type="text" name="firstName" value="<? echo stripslashes($firstName); ?>" class="<? if ($firstNameNeeded) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Last Name: </label>
				<input type="text" name="lastName" value="<? echo stripslashes($lastName); ?>" />
				<div class="clear"></div>

				<label>Email: </label>
				<input type="text" name="email" value="<? echo stripslashes($email); ?>" <? if ($_action == "edit") {echo 'readonly="readonly"';} ?> class="<? if ($emailNeeded || $invalidEmail || $emailAlreadyExists) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<?		
				if ($_action == "edit")
				{
					?>
					<input type="hidden" name="_action" value="update" />
					<input type="hidden" name="_id" value="<? echo $_id; ?>" />
					<?
				}
				elseif ($_action == "add")
				{
					?>
					<input type="hidden" name="_action" value="insert" />
					<?
				}
				
				elseif ($_action == "addAdmin")
				{
					?>
					<input type="hidden" name="_action" value="insertAdmin" />
					<?
				}
				?>
		
				<button type="submit" class="redButtonSmall">
					<?
					if ($_action == "edit") {echo 'Update User';}
					elseif ($_action == "add") {echo 'Add User';} 
					?>
				</button>
				<div class="clear"></div>
			</form>
			<?
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			SHOWS USERS
		=========================*/
		else
		{
			if (!isset($_GET['_page']) || $_GET['_page'] == '' || $_GET['_page'] == 0) {$_page = 1;}
			else { $_page = $_GET['_page']; }
			
			$_limit = 20; 
			$_start = ($_page-1) * $_limit;
			
			if ($_action == 'view_admins')
			{
				$get_total = getInfo("users", "permissionLevel", 9);
				$total_pages = ceil(count($get_total)/$_limit);
				$pagination_link = '/admin/users.php?_action=view_admins&_page=';
				
				$users = getInfo("users", "permissionLevel", 9, "lastName", "ASC", $_start, $_limit);				
			}
			else
			{
				$get_total = getInfo("users", "permissionLevel", 1);
				$total_pages = ceil(count($get_total)/$_limit);
				$pagination_link = '/admin/users.php?_page=';
				
				$users = getInfo("users", "permissionLevel", 1, "lastName", "ASC", $_start, $_limit);				
			} 
			
			?>
			
			<table class="listing tablePadding">
				<thead>
					<tr>				
						<th class="textLeft">Name</th>
						<th class="textLeft">Email</th>
						<th class="textLeft">Phone</th>
						<th colspan="2"></th>		
					</tr>
				</thead>
				<?
				if (empty($users)) {echo '<td colspan="4">There are no users to show.</td>';}
				else
				{
					foreach ($users AS $a)
					{
						if ($_SESSION['ID'] != $a['id'])
						{
							?>
							<tr valign="top">
								<td><? echo stripslashes($a['lastName'].', '.$a['firstName']); ?></td>
								<td>
									<?
									echo stripslashes($a['email']);
									if ($a['do_not_contact'])
									{
										echo '<br />(Do not contact through email)';
									}
									?>
								</td>
								<td><? echo stripslashes($a['phone']); ?></td>
								<?
								if ($_action == 'view_admins')
								{
									?>
									<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=edit&_id=<? echo $a['id'] ?>">[EDIT]</a></td>
									<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=delete&_id=<? echo $a['id'] ?>" class="delete">[DELETE]</a></td>
									<?
								}
								else
								{
									?>
									<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=view&_id=<? echo $a['id'] ?>">[VIEW]</a></td>
									<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=edit_user&_id=<? echo $a['id'] ?>">[EDIT]</a></td>
									<?
								}
								?>
							</tr>
							<?
						}
					};
				};
				?>
				
			</table>
			<div class="clear40"></div>
			<?
			
			if ($total_pages > 1) 
			{
				adminPagination($_page, $total_pages, $pagination_link);
			}
		}
		
		
		
		
		
		
		
		
		?>
	
	</div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>