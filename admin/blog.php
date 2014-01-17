<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Blog";
$mdesc = "";	
$mbots = "";
$canon = "";
$page = "admin";
$subPage = "blog";
$thisPage = "/admin/blog.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');

$thumbnailsPath = "../a/i/blog/";






/* =======================
	DELETES POST
=========================*/
if (($_action == "delete") && $_id != "")
{
	$delete = deleteInfo("posts", "id", $_id);
	if ($delete) {$_msg = 5;} else {$_msg = 6;} 
}









/* =======================
	ADDS / UPDATES POSTS
=========================*/
if ($_action == "insert" || $_action == "update")
{
	extract($_POST);
	$image = $_FILES['image'];
	
	$acceptedImageFiles = array("jpg", "jpeg", "gif", "png");
	
	//check for errors
	if ($postTitle == "") {$titleNeeded = true;}
	if ($postContent == "") {$contentNeeded = true;}
	else {
		$postContent = str_replace("<p>&nbsp;</p>", "", $postContent);
		$postContent = str_replace("<p></p>", "", $postContent);
		$postContent = str_replace("<p>&nbsp;\n</p>", "", $postContent);
	}
	
	// if updating get old image link
	if ($_action == "update" && $_id != "") { $oldImage = getSingleValue("image", "posts", "id", $_id); }
	
	// checks the images file and uploads it
	if ($image['name'] != "" && $image['size'] > 1000000) {$fileTooBig = true;}
	elseif ($image['name'] != "" && !in_array(strtolower(getFileExtension($image['name'])), $acceptedImageFiles)) {$invalidFileFormat = true;}
	elseif ($image['name'] != "")
	{
		if ($_action == "update" && $oldImage != "") { unlink($thumbnailsPath.$oldImage); }
		if (!$categoryNeeded && !$titleNeeded && !$contentNeeded)
		{
			$safeImageName = safeFileName($image['name']);
			$uploadImage = move_uploaded_file($image['tmp_name'], $thumbnailsPath.$safeImageName);
			if (!$uploadImage) {$uploadImageFailed = true;}
		}
	}
	elseif ($image['name'] == "" && $_action == "update") { $safeImageName = $oldImage; }
	
	
	// create seo name
	$seo = seoName($postTitle);
	
	
	// checks if the name is already used in a category
	if ($_action == "insert") {
		$checkName = mysql_query("SELECT * FROM `posts` WHERE `seo`='".$seo."'");
		if (mysql_num_rows($checkName) != 0) {$alreadyExists = true;}
	} 
	else {
		$oldName = getSingleValue("seo", "posts", "id", $_id);
		if ($oldName != $seo || $oldCategory != $categories) {
			$checkName = mysql_query("SELECT * FROM `posts` WHERE `seo`='".$seo."'");
			if (mysql_num_rows($checkName) != 0) {$alreadyExists = true;}
		}			
	}
	
	// create arrays to use in insert and update functions
	$fields = array("title", "seo", "content", "image");
	$values = array($postTitle, $seo, $postContent, $safeImageName);
	
	if (!$titleNeeded && !$contentNeeded && !$fileTooBig && !$invalidFileFormat && !$uploadImageFailed && !$alreadyExists)
	{
		// insert information
		if ($_action == "insert")
		{
			array_unshift($fields, "date_posted");
			array_unshift($values, "NOW()");
			
			$insert = insertInfo("posts", $fields, $values);
			if ($insert) {$_msg = 1;} else {$_msg = 2; $_action = "add";}
		}
		
		// update information
		elseif ($_action == "update")
		{
			$update = updateInfo("posts", $fields, $values, "id", $_id);
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
			Blog
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
			<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add Post + </a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View All Posts</a>
		</div>
		
		<div class="clear"></div>
		
		
		
		
		
		
		
		
		
		<?
		// NOTIFICATIONS
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Blog Post has been added.</div>'; break;
				case 2: echo '<div class="error">Blog Post could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">Blog Post has been updated.</div>'; break;
				case 4: echo '<div class="error">Blog Post could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">Blog Post has been deleted.</div>'; break;
				case 6: echo '<div class="error">Blog Post could not be deleted. Please try again.</div>'; break;
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
				$getPosts = getInfo("posts", "id", $_id);
				$postTitle = $getPosts[0]['title'];
				$postContent = $getPosts[0]['content'];
				$postImage = $getPosts[0]['image'];
			}
			
			if ($error)
			{
				echo '<div class="error">';
					if ($titleNeeded) {echo '- Title Required.<br />';}				
					if ($contentNeeded) {echo '- Content required.<br />';}
					if ($fileTooBig) {echo '- Image file size too big.<br />';}
					if ($invalidFileFormat) {echo '- Invalid image format.<br />';}	
					if ($uploadImageFailed) {echo '- Image upload failed';}
					if ($alreadyExists) {echo '- Another blog post with that same title exists. Please choose another title for this blog.';}		
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
			
				<label>Post Title *</label>
				<input type="text" name="postTitle" placeholder="Post's Title" value="<? echo stripslashes($postTitle); ?>" class="<? if ($titleNeeded) {echo 'required';} ?>"/>
				<div class="clear"></div>
				
				<?
				if ($postImage != "" && file_exists($thumbnailsPath.$postImage)) {
					echo '
						<label>Current Image</label>
						<img src="/a/i/blog/'.$postImage.'" style="max-width:100px; max-height:100px;" />
						<div class="clear"></div>
					';
				}
				?>
				
				<label for="image">Thumbnail Image</label>
				<input type="file" id="image" name="image" />
				<div class="clear10"></div>
				
				<label>Content *</label>
				<div class="clear"></div>					
				<?
				include_once '../a/ckeditor/ckeditor.php';
				include_once '../a/ckfinder/ckfinder.php';
				
				$ckeditor = new CKEditor();
				$ckeditor->basePath = '../a/ckeditor/';
				CKFinder::SetupCKEditor($ckeditor, '../a/ckfinder/');
				$ckeditor->config['toolbar'] = 'noBul';
				$ckeditor->config['resize_enabled'] = false;
				$ckeditor->config['height'] = '450px';
				$ckeditor->config['width'] = '95%';
				$ckeditor->editor('postContent', stripslashes($postContent));
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
					Post
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
			$posts = getInfo("posts", "", "", "date_posted", "DESC");
			?>
			<table class="listing tablePadding">
				<thead>
					<tr>				
						<th class="textLeft">Title</th>
						<th style="width:130px;">Date Posted</th>
						<th colspan="2"></th>		
					</tr>
				</thead>
				<tbody>
					<?
					if (empty($posts)) {echo '<tr><td colspan="5">There are no blog posts</td></tr>';}
					else {
						foreach($posts AS $post)
						{
							$createDate = date_create($post['date_posted']);
							$datePosted = date_format($createDate, "F d, Y"); 
							?>
							<tr valign="top">
								<td class="vMiddle"><? echo stripslashes($post['title']); ?></td>
								<td class="textCenter vMiddle"><? echo stripslashes($datePosted); ?></td>	
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