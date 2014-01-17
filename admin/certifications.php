<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Certifications";
$mdesc = "";	
$mbots = "";
$canon = "";
$page = "admin";
$subPage = "certifications";
$thisPage = "/admin/certifications.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');

$thumbnailsPath = "../a/certifications/thumbnails/";
$pdfsPath = "../a/certifications/files/";






/* =======================
	DELETES
=========================*/
if ($_action == "delete" && $_id != "")
{
	// delete image
	$old_image = getSingleValue("image", "certification", "id", $_id);
	if ($old_image != "" && file_exists($thumbnailsPath.$old_image)) {unlink($thumbnailsPath.$old_image);}
	
	// delete file
	$old_file = getSingleValue("pdf", "certification", "id", $_id);
	if ($old_file != "" && file_exists($pdfsPath.$old_file)) {unlink($pdfsPath.$old_file);}	
	
	$delete = deleteInfo("certification", "id", $_id);	
	if ($delete) {$_msg = 5;} else {$_msg = 6;}
}









/* =======================
	ADD/EDIT
=========================*/
if ($_action == "insert" || $_action == "update")
{
	extract($_POST);
	$thumbnail = $_FILES['thumbnail'];
	$pdf = $_FILES['pdf'];
	
	$acceptedImageFiles = array("jpg", "jpeg", "gif", "png");
		
	//check for errors
	if ($name == "") {$nameNeeded = true;}
	if ($pdf['name'] == "" && $_action == "insert") {$pdfNeeded = true;}
	
	//process imagefile
	if ($_action == "insert" && $thumbnail['name'] != "") 
	{
		if ($thumbnails['size'] > 1024000) {$imageTooBig = true;}
		elseif (!in_array(getFileExtension($thumbnail['name']), $acceptedImageFiles)) {$invalidImageFormat = true;} 
		else
		{
			$safeImageName = safeFileName($thumbnail['name']);
			$thumbnailToUpload = true;
		}
	}
	elseif ($_action == "update")
	{
		if ($thumbnail['name'] != "") 
		{
			if ($thumbnails['size'] > 1024000) {$imageTooBig = true;}
			elseif (!in_array(getFileExtension($thumbnail['name']), $acceptedImageFiles)) {$invalidImageFormat = true;} 
			else
			{
				$oldImage = getSingleValue("image", "certification", "id", $_id);
				$safeImageName = safeFileName($thumbnail['name']);
				$thumbnailToUpload = true;
			}
			
		}
		else { $safeImageName = getSingleValue("image", "certification", "id", $_id); }
	}	
	
	// process pdf
	if ($_action == "insert" && $pdf['name'] != "") 
	{
		if (getFileExtension($pdf['name']) != "pdf") {$invalidPDFFormat = true;} 
		else
		{
			$safePDFName = safeFileName($pdf['name']);
			$pdfToUpload = true;
		}
	}
	elseif ($_action == "update")
	{
		if ($pdf['name'] != "") 
		{
			if (getFileExtension($pdf['name']) != "pdf") {$invalidPDFFormat = true;} 
			else
			{
				$oldPDF = getSingleValue("pdf", "certification", "id", $_id);
				$safePDFName = safeFileName($pdf['name']);
				$pdfToUpload = true;
			}
		}
		else { $safePDFName = getSingleValue("pdf", "certification", "id", $_id); }
	}
	
	
	if (!$titleNeeded && !$pdfNeeded && !$imageTooBig && !$invalidImageFormat && !$invalidPDFFormat && !$thumbnailUploadFailed && !$pdfUploadFailed)
	{
		$fields = array("name", "image", "pdf");
		$values = array($name, $safeImageName, $safePDFName);
		
		// insert information
		if ($_action == "insert")
		{			
			array_unshift($fields, "date");
			array_unshift($values, "NOW()");
			$insert = insertInfo("certification", $fields, $values);
			if ($insert)
			{
				$_msg = 1;
				
			}
			else {$_msg = 2; $_action = "add";}
		}
		
		elseif ($_action == "update")
		{		
			$update = updateInfo("certification", $fields, $values, "id", $_id);
			if ($update) {$_msg = 3;} else {$_msg = 4; $_action = "edit";}			
		}
		
		if ($_msg == 1 || $_msg == 3)
		{
			// UPLOAD THUMBNAIL IF THERE IS
			if ($thumbnailToUpload)
			{
				if ($_action == "update" && $oldImage != "" && file_exists($thumbnailsPath.$oldImage)) { unlink($thumbnailsPath.$oldImage); }
				$uploadThumbnail = move_uploaded_file($thumbnail['tmp_name'], $thumbnailsPath.$safeImageName);
			}
			
			// UPLOAD PDF
			if ($pdfToUpload)
			{
				if ($_action == "update" && $oldPDF != "" && file_exists($thumbnailsPath.$oldPDF)) { unlink($pdfsPath.$oldPDF); }
				$uploadPDF = move_uploaded_file($pdf['tmp_name'], $pdfsPath.$safePDFName);
			}
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
			Certifications
			<?
			switch($_action)
			{
				case "add": echo ' - Add'; break;
				case "edit": echo ' - Edit'; break;
			}
			?>
		</h1>

		
		
		
		
		
		
		
		
		<? // BUTTONS ?>		
		<div class="right" style="margin:0 0 20px 0;">
			<div class="clear10"></div>
			<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add Certification + </a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View Certifications</a>
		</div>
		
		<div class="clear"></div>
		
		
		
		
		
		
		
		
		
		<?
		// NOTIFICATIONS
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Certification has been added.</div>'; break;
				case 2: echo '<div class="error">Certification could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">Certification has been updated.</div>'; break;
				case 4: echo '<div class="error">Certification could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">Certification has been deleted.</div>'; break;
				case 6: echo '<div class="error">Certification could not be deleted. Please try again.</div>'; break;
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
				$getInfo = getInfo("certification", "id", $_id);
				extract($getInfo[0]);
			}
			
			if ($error) {
				echo '<div class="error">';
					if ($nameNeeded) {echo '- Name Required.<br />';}				
					if ($pdfNeeded) {echo '- PDF Certification required.<br />';}
					if ($imageTooBig) {echo '- Image file size too big.<br />';}
					if ($invalidImageFormat) {echo '- Invalid image format.<br />';}	
					if ($invalidPDFFormat) {echo '- Please select a .pdf file to upload';}
					if ($thumbnailUploadFailed) {echo '- Image upload failed';}		
					if ($pdfUploadFailed) {echo '- PDF Upload Failed';}		
				echo '</div>';
				echo '<div class="clear10"></div>';
			}
			?>
			
			<script>
				$(document).ready(function(){
					$('#loading').hide();
					$('#newsletterForm').submit(function(){
						$('#loading').fadeIn(200);
					});
				});
			</script>
			
			<form id="newsletterForm" enctype="multipart/form-data" method="post" action="<? echo $thisPage; ?>">
				
				<label>Title: </label>
				<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($nameNeeded) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<?
				if ($_action == "edit" && $image != "")
				{
					?>
					<label>Current Image: </label>
					<img src="/a/certifications/thumbnails/<? echo $image; ?>" class="maxImageSize" />
					<div class="clear"></div>
					<?
				}
				?>
				
				<label>Image <span class="size10">(1mb max)</span>: </label>
				<input type="file" name="thumbnail" class="<? if ($imageTooBig || $invalidImageFormat) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<?
				if ($_action == "edit" && $pdf != "")
				{
					?>
					<label>Current File: </label>
					<label><a href="/a/certifications/files/<? echo $pdf; ?>" target="_blank">View Certification</a></label>
					<div class="clear"></div>
					<?
				}
				?>

				<label>Certification File: </label>
				<input type="file" name="pdf" class="<? if ($pdfNeeded || $invalidPDFFormat) {echo 'required';} ?>" />
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
				<button type="submit" class="redButtonLarge left">
					<?
					if ($_action == "edit") {echo 'Update Certification';}
					elseif ($_action == "add") {echo 'Add Certification';} 
					?>
				</button>
				<div id="loading" class="left">
					<div class="clear10"></div>
					<img src="/a/i/loader.gif" class="vMiddle" style="margin:0 10px 0 10px;" />Saving...
				</div>
				<div class="clear"></div>
			</form>
			
			<div class="clear20"></div>
			<?
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			SHOWS NEWSLETTERS
		=========================*/
		else
		{
			$newsletters = getInfo("certification", "", "", "date", "DESC");
			
			?>
			<table class="listing tablePadding">
				<thead>
					<tr>
						<th></th>
						<th class="textLeft">Name</th>
						<th class="textLeft">Date Posted</th>
						<th colspan="2"></th>		
					</tr>
				</thead>
				<?
				if (empty($newsletters)) {echo '<td colspan="4">There are no newsletters created.</td>';}
				else
				{
					foreach ($newsletters AS $row)
					{
						$dateCreate = date_create($row['date_posted']);
						$datePosted = date_format($dateCreate, "F d, Y");
						?>
						<tr valign="top">
							<td>
								<?
								if ($row['image'] != "" && file_exists($thumbnailsPath.$row['image'])) {echo '<img src="/a/certifications/thumbnails/'.$row['image'].'" class="thumbnails" />'; }
								?>
							</td>
							<td><? echo '<a href="/a/certifications/files/'.$row['pdf'].'" target="_blank">'.stripslashes($row['name']).'</a>'; ?></td>
							<td><? echo $datePosted ?></td>
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