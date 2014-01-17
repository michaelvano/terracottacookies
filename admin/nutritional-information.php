<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Nutritional Information";
$mdesc = "";	
$mbots = "";
$canon = "";
$page = "admin";
$subPage = "nutrition";
$thisPage = "/admin/nutritional-information.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');

$database_table = "nutritional_information";

$thumbnail_path = $_SERVER['DOCUMENT_ROOT'].'/a/i/nutritional/thumbnails/';
$image_path = $_SERVER['DOCUMENT_ROOT'].'/a/i/nutritional/large/';






/* =======================
	DELETES POST
=========================*/
if (($_action == "delete") && $_id != "")
{
	$delete = deleteInfo($database_table, "id", $_id);
	if ($delete) {$_msg = 5;} else {$_msg = 6;} 
}









/* =======================
	ADDS / UPDATES POSTS
=========================*/
if ($_action == "insert" || $_action == "update")
{
	extract($_POST);
	$thumbnail = $_FILES['thumbnail'];
	$image = $_FILES['image'];
	
	$accepted_files = array("jpg", "jpeg", "gif", "png");
	
	//check for errors
	if ($name == "") {$name_needed = true;}
	if ($thumbnail['name'] == "") {$thumbnail_needed = true;}
	if ($image['name'] == "") {$image_needed = true;}
	
	// if updating get old images
	if ($_action == "update" && $_id != "")
	{
		$old_thumbnail = getSingleValue("thumbnail", $database_table, "id", $_id);
		$old_image = getSingleValue("image", $database_table, "id", $_id);
	}
	
	// checks the large image file and uploads it
	if ($thumbnail['name'] != "" && $thumbnail['size'] > 1024000) {$file_too_big = true;}
	elseif ($thumbnail['name'] != "" && !in_array(strtolower(getFileExtension($thumbnail['name'])), $accepted_files)) {$invalid_format = true;}
	elseif ($thumbnail['name'] != "")
	{
		if ($_action == "update" && $old_thumbnail != "") { unlink($thumbnail_path.$old_thumbnail); }
		if (!$name_needed)
		{
			/*
			$large_image = safeFileName($image['name']);
			$uploadImage = move_uploaded_file($image['tmp_name'], $image_path.$safeImageName);
			if (!$uploadImage) {$uploadImageFailed = true;}
			*/
			$small_image = resize_upload($thumbnail, $thumbnail_path, 224, 385);
		}
	}
	elseif ($thumbnail['name'] == "" && $_action == "update") { $small_image = $old_thumbnail; }
	
	// checks the large image file and uploads it
	if ($image['name'] != "" && $image['size'] > 1024000) {$file_too_big = true;}
	elseif ($image['name'] != "" && !in_array(strtolower(getFileExtension($image['name'])), $accepted_files)) {$invalid_format = true;}
	elseif ($image['name'] != "")
	{
		if ($_action == "update" && $old_image != "") { unlink($image_path.$old_image); }
		if (!$name_needed)
		{
			/*
			$large_image = safeFileName($image['name']);
			$uploadImage = move_uploaded_file($image['tmp_name'], $image_path.$safeImageName);
			if (!$uploadImage) {$uploadImageFailed = true;}
			*/
			$large_image = resize_upload($image, $image_path, 449, 771);
		}
	}
	elseif ($image['name'] == "" && $_action == "update") { $large_image = $old_image; }
	
	
		
	
	
	if ($order == "")
	{
		$maxID = mysql_query("SELECT MAX(`order`) AS `maxOrder` FROM `".$database_table."`;");
		if (mysql_num_rows($maxID) > 0) { $getMaxOrder = mysql_fetch_assoc($maxID); $order = $getMaxOrder['maxOrder']+1; }
	}
	
	// create arrays to use in insert and update functions
	$fields = array("name", "thumbnail", "image", "order");
	$values = array($name, $small_image, $large_image, $order);
	
	if (!$name_needed && !$thumbnail_needed && !$image_needed)
	{
		// insert information
		if ($_action == "insert")
		{			
			$insert = insertInfo($database_table, $fields, $values);
			if ($insert) {$_msg = 1;} else {$_msg = 2; $_action = "add";}
		}
		
		// update information
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
	// ADMIN NAV
	include($_SERVER['DOCUMENT_ROOT']."/admin/nav.php");
	?>
		
	<div class="mainContent">
	
		<div class="clear10"></div>
		
		
		
		
		
		
		
		
		
		<? // MAIN TITLE ?>
		<h1 class="left">
			Nutritional Info
			<?
			switch($_action)
			{
				case "add": echo ' - Add Nutri Info'; break;
				case "edit": echo ' - Edit Nutri Info'; break;
			}
			?>
		</h1>

		
		
		
		
		
		
		
		
		<? // BUTTONS ?>		
		<div class="right" style="margin:0 0 20px 0;">
			<div class="clear10"></div>
			<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add Nutri Info + </a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View All Nutri Info</a>
		</div>
		
		<div class="clear"></div>
		
		
		
		
		
		
		
		
		
		<?
		// NOTIFICATIONS
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Nutritional Information has been added.</div>'; break;
				case 2: echo '<div class="error">Nutritional Information could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">Nutritional Information has been updated.</div>'; break;
				case 4: echo '<div class="error">Nutritional Information could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">Nutritional Information has been deleted.</div>'; break;
				case 6: echo '<div class="error">Nutritional Information could not be deleted. Please try again.</div>'; break;
			}		
			echo '<div class="clear10"></div>';
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			MEDIA FORM
		=========================*/
		if ($_action == "add" || $_action == "edit") 
		{
			if ($_action == "edit")
			{
				$get_info = getInfo($database_table, "id", $_id);
				if (!empty($get_info))
				{
					extract($get_info[0]);
				}
			}
			
			if ($error)
			{
				echo '<div class="error">';
					if ($name_needed) {echo '- Product Name Required.<br />';}				
					if ($thumbnail_needed) {echo '- Thumbnail required.<br />';}
					if ($image_needed) {echo '- Large Image Required.<br />';}
				echo '</div>';
				echo '<div class="clear10"></div>';
			}
			?>
			
			<script>
				$(document).ready(function(){
					$('#loading').hide();
					$('#blogForm').submit(function(){
						$('#loading').fadeIn(200);
					});
				});
			</script>
			
			<form id="blogForm" enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>">
			
				<label>Product Name *</label>
				<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($name_needed) {echo 'required';} ?>"/>
				<div class="clear"></div>
				
				<?
				if ($thumbnail != "" && file_exists($thumbnail_path.$thumbnail))
				{
					$thumb_src = '/a/i/nutritional/thumbnails/'.$thumbnail;
					echo '
						<label>Current Thumbnail Image</label>
						<a href="'.$thumb_src.'" target="_blank">
							<img src="'.$thumb_src.'" style="max-width:100px; max-height:100px;" />
						</a>
						<div class="clear"></div>
					';
				}
				?>
				
				<label for="image">Thumbnail Image<br /> <span style="font-size:10px;">(224px x 385px)</span></label>
				<input type="file" id="image" name="thumbnail" />
				<div class="clear10"></div>
				
				<?
				if ($image != "" && file_exists($image_path.$image))
				{
					$image_src = '/a/i/nutritional/large/'.$image;
					echo '
						<label>Current Large Image</label>
						<a href="'.$image_src.'" target="_blank">
							<img src="'.$image_src.'" style="max-width:100px; max-height:100px;" />
						</a>
						<div class="clear"></div>
					';
				}
				?>
				
				<label for="image">Large Image<br /> <span style="font-size:10px;">(449px x 771px)</span></label>
				<input type="file" id="image" name="image" />
				<div class="clear10"></div>
				
				<label>Order</label>
				<input type="text" name="order" value="<? echo stripslashes($order); ?>" />
				<div class="clear"></div>
				
				<div class="clear40"></div>
				
				<?
				if ($_action == "edit") {echo '
					<input type="hidden" name="_id" value="'.$_id.'" />
					<input type="hidden" name="_action" value="update" />
				'; }
				elseif ($_action == "add") { echo '<input type="hidden" name="_action" value="insert" />'; }
				?>
				
				<button type="submit" class="redButtonSmall">
					<?
					if ($_action == "edit") {echo "Update";}
					elseif ($_action == "add") {echo "Add";}
					?>
					Nutritional Information
				</button>
				<div id="loading" class="left">
					<div class="clear10"></div>
					<img src="/a/i/loader.gif" class="vMiddle" style="margin:0 10px 0 10px;" />Saving...
				</div>
			</form>
			
			<div class="clear20"></div>
			<?
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			SHOW POSTS
		=========================*/
		else
		{
			$posts = getInfo($database_table, "", "", "order", "ASC");
			?>
			<table class="listing tablePadding">
				<thead>
					<tr>				
						<th class="textLeft">Name</th>
						<th colspan="2"></th>		
					</tr>
				</thead>
				<tbody>
					<?
					if (empty($posts)) {echo '<tr><td colspan="3">There is no nutritional information.</td></tr>';}
					else {
						foreach($posts AS $post)
						{
							?>
							<tr valign="top">
								<td class="vMiddle"><? echo stripslashes($post['name']); ?></td>
								<td class="textCenter vMiddle"><a href="<? echo $thisPage; ?>?_action=edit&_id=<? echo stripslashes($post['id']); ?>">[EDIT]</a></td>
								<td class="textCenter vMiddle"><a href="<? echo $thisPage; ?>?_action=delete&_id=<? echo stripslashes($post['id']); ?>" class="delete">[DELETE]</a></td>
							</tr>
							<?	
							$i = $i + 1;;
						}
					}
					?>
				</tbody>
			</table>
			<?
		}
		
		
		
		
		
		
		
		
		?>
	
		<div class="clear40"></div>
	</div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>