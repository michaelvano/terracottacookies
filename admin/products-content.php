<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Products Content";
$mdesc = "";	
$mbots = "";
$canon = "";
$page = "admin";
$subPage = "products-content";
$thisPage = "/admin/products-content.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');

$database_table = 'content';

// $image_path = $_SERVER['DOCUMENT_ROOT']."/a/i/special-offer/";


/* =======================
	DELETES POST
=========================*/
/*
if (($_action == "delete") && $_id != "")
{
	$delete = deleteInfo($database_table, "id", $_id);
	if ($delete) {$_msg = 5;} else {$_msg = 6;} 
}
*/


/* =======================
	ADDS / UPDATES POSTS
=========================*/
if ($_action == "insert" || $_action == "update")
{
	extract($_POST);
	// $image = $_FILES['image'];
	
	// $accepted_formats = array("jpg", "jpeg", "gif", "png");
	
	//check for errors
	if ($postContent == "") {$content_needed = true;}
	
	// if updating get old image link
	// if ($_action == "update") { $old_image = getSingleValue("image", $database_table, "id", 2); }
	
	// checks the images file and uploads it
	/*
	if ($image['name'] != "" && $image['size'] > 1000000) {$too_big = true;}
	elseif ($image['name'] != "" && !in_array(strtolower(getFileExtension($image['name'])), $accepted_formats)) {$invalid_format = true;}
	elseif ($image['name'] != "")
	{
		if ($_action == "update" && $old_image != "") { unlink($image_path.$old_image); }
		if (!$content_needed)
		{
			$new_image_name = safeFileName($image['name']);
			$upload_image = move_uploaded_file($image['tmp_name'], $image_path.$new_image_name);
			if (!$upload_image) {$upload_failed = true;}
		}
	}
	elseif ($image['name'] == "" && $_action == "update") { $new_image_name = $old_image; }
	*/
		
	// create arrays to use in insert and update functions
	$fields = array("content");
	$values = array($postContent);
	
	if (!$content_needed)
	{	
		// update information
		if ($_action == "update")
		{
			$update = updateInfo($database_table, $fields, $values, "id", 2);
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
			Product Content - Nut Free Cookies & Products
			<?
			switch($_action)
			{
				case "add": echo ' - Add Post'; break;
				case "edit": echo ' - Edit Post'; break;
			}
			?>
		</h1>	
		
		<? // BUTTONS ?>		
		<div class="right" style="margin:0 0 20px 0;">
			<div class="clear10"></div>
			<?
			if($_action == "edit")
			{
				?>
				<a href="<? echo $thisPage; ?>" class="redButtonSmall right" style="margin:0 0 0 15px">Preview Content </a>	
				<?
			}
			else 
			{
				?>
				<a href="<? echo $thisPage; ?>?_action=edit" class="redButtonSmall right" style="margin:0 0 0 15px">Edit Content + </a>	
				<?
			}
			?>
		</div>
		
		<div class="clear"></div>	
		
		<?
		// NOTIFICATIONS
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Content has been added.</div>'; break;
				case 2: echo '<div class="error">Content could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">Content has been updated.</div>'; break;
				case 4: echo '<div class="error">Content could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">Content has been deleted.</div>'; break;
				case 6: echo '<div class="error">Content could not be deleted. Please try again.</div>'; break;
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
				$get = getInfo($database_table, "id", 2);
				extract($get[0]);
			}
			
			if ($error)
			{
				echo '<div class="error">';
					if ($content_needed) {echo '- Content Required.<br />';}				
					if ($too_big) {echo '- Image file size too big.<br />';}
					if ($invalid_formats) {echo '- Not an acceptable image format.<br />';}
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
				<?
				/*
				if ($image != "" && file_exists($image_path.$image)) {
					echo '
						<label>Current Image</label>
						<img src="/a/i/special-offer/'.$image.'" style="max-width:100px; max-height:100px;" />
						<div class="clear"></div>
					';
				}
				?>
				
				<label for="image">Image</label>
				<input type="file" id="image" name="image" />
				<div class="clear10"></div>
				*/ 
				?>
				
				<label>Content *</label>
				<div class="clear"></div>					
				<?
				include_once '../a/ckeditor/ckeditor.php';
				include_once '../a/ckfinder/ckfinder.php';
				
				$ckeditor = new CKEditor();
				$ckeditor->basePath = '../a/ckeditor/';
				CKFinder::SetupCKEditor($ckeditor, '../a/ckfinder/');
				$ckeditor->config['toolbar'] = 'base';
				$ckeditor->config['resize_enabled'] = false;
				$ckeditor->config['height'] = '450px';
				$ckeditor->config['width'] = '95%';
				$ckeditor->editor('postContent', stripslashes($content));
				?>
				
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
					Content
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
			$get = getInfo($database_table, "id", 2);
			
			/*
			?>
			<a href="/a/i/special-offer/<?= $get[0]['image']; ?>" target="_blank">
				<img src="/a/i/special-offer/<?= $get[0]['image']; ?>" class="left" style="max-width:200px; max-height:260px;" />
			</a>
		
			<div class="left" style="width:400px; margin:-15px 0 0 10px;">
				<p class="size21 garamond uppercase red">SPECIAL OFFER</p>
				<?= stripslashes($get[0]['content']); ?>
			</div>
			<?
			*/
			echo stripslashes($get[0]['content']);
		}
		
		
		
		
		
		
		
		
		?>
	
		<div class="clear40"></div>
	</div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>