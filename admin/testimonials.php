<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Testimonials";
$mdesc = "";	
$mbots = "";
$canon = "";
$page = "admin";
$subPage = "testimonials";
$thisPage = "/admin/testimonials.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');






/* =======================
	DELETES USERS
=========================*/
if ($_action == "delete" && $_id != "")
{
	$delete = deleteInfo("testimonials", "id", $_id);	
	if ($delete) {$_msg = 5;} else {$_msg = 6;}
}









/* =======================
	ADD/EDIT USERS / RETAILER
=========================*/
if ($_action == "insert" || $_action == "update")
{
	extract($_POST);
		
	//check for errors
	if ($testimonial == "") {$testimonialNeeded = true;}
	if ($name == "") {$nameNeeded = true;}
	
	if (!$testimonialNeeded && !$nameNeeded)
	{
		$fields = array("testimonial", "name", "position", "company");
		$values = array($testimonial, $name, $position, $company);
		
		// insert information
		if ($_action == "insert")
		{			
			// create arrays to use in insert and update functions
			$insert = insertInfo("testimonials", $fields, $values);
			if ($insert) {$_msg = 1;} else {$_msg = 2; $_action = "add";}
		}
		
		elseif ($_action == "update")
		{		
			$update = updateInfo("testimonials", $fields, $values, "id", $_id);
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
				case "add": echo ' - Add Testimonial'; break;
				case "edit": echo ' - Edit Testimonial'; break;
			}
			?>
		</h1>		
		
		<div class="right" style="margin:0 0 20px 0;">
			<div class="clear10"></div>
			<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add Testimonial + </a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View All Testimonials</a>
		</div>
		
		<div class="clear"></div>
		
		<?
		
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Testimonial has been added.</div>'; break;
				case 2: echo '<div class="error">Testimonial could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">Testimonial has been updated.</div>'; break;
				case 4: echo '<div class="error">Testimonial could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">Testimonial has been deleted.</div>'; break;
				case 6: echo '<div class="error">Testimonial could not be deleted. Please try again.</div>'; break;
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
				$getInfo = getInfo("testimonials", "id", $_id);
				extract($getInfo[0]);
			}
			
			if ($error) {
				echo '<div class="error">';
					if ($testimonialNeeded) {echo '- Position required.<br />';}
					if ($nameNeeded) {echo '- Name Required.<br />';}
				echo '</div>';
				echo '<div class="clear10"></div>';
			}
			?>
			
			<form enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>">
				
				<label>Testimonial: </label>
				<textarea name="testimonial" class="<? if ($testimonialNeeded) {echo 'required';} ?>"><? echo stripslashes($testimonial); ?></textarea>
				<div class="clear"></div>
				
				<label>Name: </label>
				<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($nameNeeded) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Position: </label>
				<input type="text" name="position" value="<? echo stripslashes($position); ?>" class="<? if ($positionNeeded) {echo 'required';} ?>" />
				<div class="clear"></div>

				<label>Company: </label>
				<input type="text" name="company" value="<? echo stripslashes($company); ?>" />
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
					if ($_action == "edit") {echo 'Update Testimonial';}
					elseif ($_action == "add") {echo 'Add Testimonial';} 
					?>
				</button>
				<div class="clear"></div>
			</form>
			
			<div class="clear20"></div>
			<?
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			SHOWS TESTIMONIALS
		=========================*/
		else
		{
			$testimonials = getInfo("testimonials", "", "", "name", "ASC");
			
			?>
			<table class="listing tablePadding">
				<thead>
					<tr>
						<th class="textLeft">Testimonial</th>				
						<th class="textLeft">Name</th>
						<th colspan="2"></th>		
					</tr>
				</thead>
				<?
				if (empty($testimonials)) {echo '<td colspan="4">There are no testimonials.</td>';}
				else
				{
					foreach ($testimonials AS $row)
					{
						?>
						<tr valign="top">
							<td><? echo substr(stripslashes($row['testimonial']),0, 100); if (strlen($row['testimonial']) > 100) {echo '...';} ?></td>
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
			<?	if ($numberOfPages > 1) { showPageNumbers($_page, $numberOfPages, $thisPage); } ?>
			
			<?
		}
		
		
		
		
		
		
		
		
		?>
	
	</div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>