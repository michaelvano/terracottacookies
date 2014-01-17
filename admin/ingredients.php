<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Ingredients";
$mdesc = "";	
$mbots = "";
$canon = "";
$page = "admin";
$subPage = "ingredients";
$thisPage = "/admin/ingredients.php";

$database_table = 'ingredient';

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');






/* =======================
	DELETES USERS
=========================*/
if ($_action == "delete" && $_id != "")
{
	$delete = deleteInfo($database_table, "id", $_id);	
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
	if ($ingredients == "") {$ingredientsNeeded = true;}
	if ($order == "")
	{
		$maxID = mysql_query("SELECT MAX(`order`) AS `maxOrder` FROM `".$database_table."`;");
		if (mysql_num_rows($maxID) > 0) { $getMaxOrder = mysql_fetch_assoc($maxID); $order = $getMaxOrder['maxOrder']+1; }
	}
	elseif (!is_numeric($order)) {$numberNeeded = true;}
	
	if (!$nameNeeded && !$ingredientsNeeded)
	{
		
		$fields = array("name", "ingredients", "order");
		$values = array($name, $ingredients, $order);
		
		// insert information
		if ($_action == "insert")
		{			
			// create arrays to use in insert and update functions
			$insert = insertInfo($database_table, $fields, $values);
			if ($insert) {$_msg = 1;} else {$_msg = 2; $_action = "add";}
		}
		
		elseif ($_action == "update")
		{		
			$update = updateInfo($database_table, $fields, $values, "id", $_id);
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
			Ingredients
			<?
			switch($_action)
			{
				case "add": echo ' - Add Ingredients'; break;
				case "edit": echo ' - Edit Ingredients'; break;
			}
			?>
		</h1>		
		
		<div class="right" style="margin:0 0 20px 0;">
			<div class="clear10"></div>
			<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add Ingredients + </a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View All Ingredients</a>
		</div>
		
		<div class="clear"></div>
		
		<?
		
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Ingredients has been added.</div>'; break;
				case 2: echo '<div class="error">Ingredients could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">Ingredients has been updated.</div>'; break;
				case 4: echo '<div class="error">Ingredients could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">Ingredients has been deleted.</div>'; break;
				case 6: echo '<div class="error">Ingredients could not be deleted. Please try again.</div>'; break;
			}		
			echo '<div class="clear10"></div>';
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			FORM
		=========================*/
		if ($_action == "add" || $_action == "edit") 
		{
			if ($_action == "edit")
			{
				$get_info = getInfo($database_table, "id", $_id);
				extract($get_info[0]);
			}
			
			if ($error) {
				echo '<div class="error">';
					if ($nameNeeded) {echo '- Name Required.<br />';}				
					if ($ingredientsNeeded) {echo '- Ingredients required.<br />';}
				echo '</div>';
				echo '<div class="clear10"></div>';
			}
			?>
			
			<form enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>">
				
				<label>Product Name: </label>
				<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($nameNeeded) {echo 'required';} ?>" />
				<div class="clear"></div>
							
				<label>Ingredients: </label>
				<textarea name="ingredients" class="<? if ($ingredientsNeeded) {echo 'required';} ?>"><? echo stripslashes($ingredients); ?></textarea>
				<div class="clear"></div>
				
				<label>Order No.: </label>
				<input type="text" name="order" value="<? echo stripslashes($order); ?>" />
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
					if ($_action == "edit") {echo 'Update Ingredients';}
					elseif ($_action == "add") {echo 'Add Ingredients';} 
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
			$users = getInfo($database_table, "", "", "order", "ASC");
			
			?>
			<table class="listing tablePadding">
				<thead>
					<tr>				
						<th class="textLeft">Name</th>
						<th colspan="2"></th>		
					</tr>
				</thead>
				<?
				if (empty($users)) {echo '<td colspan="3">There are no ingredients listed.</td>';}
				else
				{
					foreach ($users AS $row)
					{
						?>
						<tr valign="top">
							<td><? echo stripslashes($row['name']); ?></td>
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
			
			<?
		}
		
		
		
		
		
		
		
		
		?>
	
	</div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>