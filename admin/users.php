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
	DELETES USERS
=========================*/
if ($_action == "delete" && $_id != "")
{
	$delete = deleteInfo("users", "id", $_id);	
	if ($delete) {$_msg = 7;} else {$_msg = 8;}
}










/* =======================
	ADD/EDIT USERS / RETAILER
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
				case "edit": echo 'Edit User'; break;
				default: echo 'Manage Users'; break;
			}
			?>
		</h1>
		
		<div class="right" style="margin:0 0 20px 0;">
			<div class="clear10"></div>
			<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add User + </a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View Users</a>
		</div>
		
		<div class="clear20"></div>
		
		<?
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">User has been added.</div>'; break;
				case 2: echo '<div class="error">User could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">User has been updated.</div>'; break;
				case 4: echo '<div class="error">User could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">User has been deleted.</div>'; break;
				case 6: echo '<div class="error">User could not be deleted. Please try again.</div>'; break;
			}		
			echo '<div class="clear10"></div>';
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			USERS FORM
		=========================*/
		if ($_action == "add" || $_action == "edit") 
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
			$admins = getInfo("users", "permissionLevel", 9, "firstName", "ASC");
			
			?>
			
			<table class="listing tablePadding">
				<thead>
					<tr>				
						<th class="textLeft">Name</th>
						<th class="textLeft">Email</th>
						<th colspan="2"></th>		
					</tr>
				</thead>
				<?
				if (empty($admins)) {echo '<td colspan="4">There are no admins.</td>';}
				else
				{
					foreach ($admins AS $admin)
					{
						?>
						<tr valign="top">
							<td><? echo stripslashes($admin['firstName']).' '.stripslashes($admin['lastName']); ?></td>
							<td><? echo stripslashes($admin['email']); ?></td>
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=edit&_id=<? echo $admin['id'] ?>">[EDIT]</a></td>
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=delete&_id=<? echo $admin['id'] ?>" class="delete">[DELETE]</a></td>
						</tr>
						<?
						$i++;
					};
				};
				?>
				
			</table>
			<div class="clear40"></div>
				
			<?
		}
		
		
		
		
		
		
		
		
		?>
	
	</div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>