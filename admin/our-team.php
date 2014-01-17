<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Our Team";
$mdesc = "";	
$mbots = "";
$canon = "";
$page = "admin";
$subPage = "team";
$thisPage = "/admin/our-team.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');






/* =======================
	DELETES USERS
=========================*/
if ($_action == "delete" && $_id != "")
{
	$delete = deleteInfo("team", "id", $_id);	
	if ($delete) {$_msg = 5;} else {$_msg = 6;}
}









/* =======================
	ADD/EDIT USERS / RETAILER
=========================*/
if ($_action == "insert" || $_action == "update")
{
	extract($_POST);
		
	//check for errors
	if ($name == "") {$nameNeeded = true;}
	if ($email == "") {$emailNeeded = true;}
	elseif (!validEmail($email)) {$invalidEmail = true;}
	if ($position == "") {$positionNeeded = true;}
	if ($order == "")
	{
		$maxID = mysql_query("SELECT MAX(`order`) AS `maxOrder` FROM `team`;");
		if (mysql_num_rows($maxID) > 0) { $getMaxOrder = mysql_fetch_assoc($maxID); $order = $getMaxOrder['maxOrder']; }
	}
	elseif (!is_numeric($order)) {$numberNeeded = true;}
	
	if (!$nameNeeded && !$emailNeeded && !$invalidEmail && !$positionNeeded && !$numberNeeded)
	{
		
		$fields = array("name", "position", "profile", "education", "favourite", "email", "phone", "mobile", "order");
		$values = array($name, $position, $profile, $education, $favourite, $email, $phone, $mobile, $order);
		
		// insert information
		if ($_action == "insert")
		{			
			// create arrays to use in insert and update functions
			$insert = insertInfo("team", $fields, $values);
			if ($insert) {$_msg = 1;} else {$_msg = 2; $_action = "add";}
		}
		
		elseif ($_action == "update")
		{		
			$update = updateInfo("team", $fields, $values, "id", $_id);
			if ($update) {$_msg = 3;} else {$_msg = 4; $_action = "edit";}			
		}			
	}
	
	else
	{
		$error = true;
		if ($_action == "insert") {$_action = "add";}
		elseif ($_action == "update") {$_action = "edit";}
	}

}









if (!$loggedIn) {echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/index.php?_msg=102">'; exit;}
elseif (!$isAdmin) {echo 'You do not have permissions to view this page';}
else
{
	include($_SERVER['DOCUMENT_ROOT']."/admin/nav.php"); ?>
		
	<div class="mainContent">
	
		<div class="clear10"></div>
		
		<h1 class="left">
			Our Team
			<?
			switch($_action)
			{
				case "add": echo ' - Add Member'; break;
				case "edit": echo ' - Edit Member'; break;
			}
			?>
		</h1>		
		
		<div class="right" style="margin:0 0 20px 0;">
			<div class="clear10"></div>
			<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add Team + </a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View All Team</a>
		</div>
		
		<div class="clear"></div>
		
		<?
		
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Team member has been added.</div>'; break;
				case 2: echo '<div class="error">Team member could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">Team member has been updated.</div>'; break;
				case 4: echo '<div class="error">Team member could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">Team member has been deleted.</div>'; break;
				case 6: echo '<div class="error">Team member could not be deleted. Please try again.</div>'; break;
			}		
			echo '<div class="clear10"></div>';
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			TEAM FORM
		=========================*/
		if ($_action == "add" || $_action == "edit") 
		{
			if ($_action == "edit")
			{
				$getUserInfo = getInfo("team", "id", $_id);
				extract($getUserInfo[0]);
			}
			
			if ($error) {
				echo '<div class="error">';
					if ($nameNeeded) {echo '- Name Required.<br />';}				
					if ($positionNeeded) {echo '- Position required.<br />';}
					if ($emailNeeded) {echo '- Email reqiuired.<br />';}
					if ($invalidEmail) {echo '- Invalid Email.<br />';}	
					if ($numberNeeded) {echo '- Please enter a number for the order';}		
				echo '</div>';
				echo '<div class="clear10"></div>';
			}
			?>
			
			<form enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>">
				
				<label>Name: </label>
				<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($nameNeeded) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Position: </label>
				<input type="text" name="position" value="<? echo stripslashes($position); ?>" class="<? if ($positionNeeded) {echo 'required';} ?>" />
				<div class="clear"></div>

				<label>Email: </label>
				<input type="text" name="email" value="<? echo stripslashes($email); ?>" class="<? if ($emailNeeded || $invalidEmail || $emailAlreadyExists) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Phone: </label>
				<input type="text" name="phone" value="<? echo stripslashes($phone); ?>" />
				<div class="clear"></div>
				
				<label>Education: </label>
				<input type="text" name="education" value="<? echo stripslashes($education); ?>" />
				<div class="clear"></div>
				
				<label>Mobile: </label>
				<input type="text" name="mobile" value="<? echo stripslashes($mobile); ?>" />
				<div class="clear"></div>
				
				<label>Fav Cookie: </label>
				<input type="text" name="favourite" value="<? echo stripslashes($favourite); ?>" />
				<div class="clear"></div>
				
				<label>Profile: </label>
				<textarea name="profile"><? echo stripslashes($profile); ?></textarea>
				<div class="clear"></div>
				
				<label>Order No.: </label>
				<input type="text" name="order" value="<? echo stripslashes($order); ?>" class="<? if ($numberNeeded) {echo 'required';} ?>" />
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
				?>
				<div class="clear10"></div>
				<button type="submit" class="redButtonLarge">
					<?
					if ($_action == "edit") {echo 'Update User';}
					elseif ($_action == "add") {echo 'Add User';} 
					?>
				</button>
				<div class="clear"></div>
			</form>
			
			<div class="clear20"></div>
			<?
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			SHOWS TEAM
		=========================*/
		else
		{
			$users = getInfo("team", "", "", "name", "ASC");
			
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
				if (empty($users)) {echo '<td colspan="4">There are no team members listed.</td>';}
				else
				{
					foreach ($users AS $row)
					{
						?>
						<tr valign="top">
							<td><? echo stripslashes($row['name']); ?></td>
							<td><? echo stripslashes($row['email']); ?></td>
							<td class="textCenter"><? echo stripslashes($row['phone']); ?></td>
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=edit&_id=<? echo $row['id'] ?>">[EDIT]</a></td>
							<td class="textCenter width80"><a href="<? echo $thisPage; ?>?_action=delete&_id=<? echo $row['id'] ?>" class="delete">[DELETE]</a></td>
						</tr>
						<?
						$i++;
					};
				};
				?>
				
			</table>		
			<div class="clear20"></div>
			<?	if ($numberOfPages > 1) { showPageNumbers($_page, $numberOfPages, $thisPage); } ?>
			
			<?
		}
		
		
		
		
		
		
		
		
		?>
	
	</div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>