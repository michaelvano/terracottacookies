<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage PDFs";
$mdesc = "";	
$mbots = "";
$canon = "";
$page = "admin";
$subPage = "pdfs";
$thisPage = "/admin/pdfs.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');

$file_path = $_SERVER['DOCUMENT_ROOT'].'/a/pdfs/';

$database_table = 'pdf';




/* =======================
	DELETES
=========================*/
if ($_action == "delete" && $_id != "")
{
	$old_file = getSingleValue('file', $database_table, 'id', $_id);
	if ($old_file != '' && file_exists($file_path.$old_file)) { unlink($file_path.$old_file); }
	
	$delete = deleteInfo($database_table, "id", $_id);	
	if ($delete) {$_msg = 5;} else {$_msg = 6;}
}









/* =======================
	ADD/EDIT
=========================*/
if ($_action == "insert" || $_action == "update")
{
	extract($_POST);
		
	$file = $_FILES['pdf'];
	
	$accepted_files = array("jpg", "jpeg", "gif", "png");
		
	//check for errors
	if ($name == "") {$name_needed = true;}
	if ($file['name'] == "" && $_action == "insert") {$file_needed = true;}
	
	// process file
	if ($_action == "insert" && $file['name'] != "") 
	{
		if (strtolower(getFileExtension($file['name'])) != "pdf") {$pdf_only = true;} 
		else
		{
			$safe_file_name = safeFileName($file['name']);
			$pdf_to_upload = true;
		}
	}
	elseif ($_action == "update")
	{
		if ($file['name'] != "") 
		{
			if (strtolower(getFileExtension($file['name'])) != "pdf") {$pdf_only = true;} 
			else
			{
				$old_file = getSingleValue("file", $database_table, "id", $_id);
				$safe_file_name = safeFileName($file['name']);
				$pdf_to_upload = true;
			}
		}
		else { $safe_file_name = getSingleValue("file", $database_table, "id", $_id); }
	}
	
	
	if (!$name_needed && !$file_needed && !$pdf_only)
	{
		$fields = array("page", 'name', 'order', 'file');
		$values = array('fundraising', $name, $order, $safe_file_name);
		
		// insert information
		if ($_action == "insert")
		{			
			$insert = insertInfo($database_table, $fields, $values);
			if ($insert) { $_msg = 1; } else {$_msg = 2; $_action = "add";}
		}
		
		elseif ($_action == "update")
		{		
			$update = updateInfo($database_table, $fields, $values, "id", $_id);
			if ($update) {$_msg = 3;} else {$_msg = 4; $_action = "edit";}			
		}
		
		if ($_msg == 1 || $_msg == 3)
		{		
			// UPLOAD PDF
			if ($pdf_to_upload)
			{
				if ($_action == "update" && $old_file != "" && file_exists($file_path.$old_file)) { unlink($file_path.$old_file); }
				$upload_file = move_uploaded_file($file['tmp_name'], $file_path.$safe_file_name);
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
			Fundraising PDFs
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
			<a href="<? echo $thisPage; ?>?_action=add" class="redButtonSmall right" style="margin:0 0 0 15px">Add PDF + </a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View PDFs</a>
		</div>
		
		<div class="clear"></div>
		
		
		
		
		
		
		
		
		
		<?
		// NOTIFICATIONS
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">PDF has been added.</div>'; break;
				case 2: echo '<div class="error">PDF could not be added. Please try again.</div>'; break;
				case 3: echo '<div class="success">PDF has been updated.</div>'; break;
				case 4: echo '<div class="error">PDF could not be updated. Please try again.</div>'; break;
				case 5: echo '<div class="success">PDF has been deleted.</div>'; break;
				case 6: echo '<div class="error">PDF could not be deleted. Please try again.</div>'; break;
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
				$getInfo = getInfo($database_table, "id", $_id);
				extract($getInfo[0]);
			}
			
			if ($error) {
				echo '<div class="error">';
					if ($name_needed) {echo '- Name Required.<br />';}				
					if ($file_needed) {echo '- PDF Newsletter required.<br />';}
					if ($pdf_only) {echo '- Only PDFs file allowed.<br />';}
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
				
				<label>Name: <br /><span class="size11">(22 char. max)</span> </label>
				<input type="text" name="name" value="<? echo stripslashes($name); ?>" class="<? if ($name_needed) {echo 'required';} ?>" maxlength="22" />
				<div class="clear"></div>
				
				<?
				if ($_action == "edit" && $file != "" && file_exists($file_path.$file))
				{
					?>
					<label>Current File: </label>
					<label><a href="/a/pdfs/<? echo $file; ?>" target="_blank">View File</a></label>
					<div class="clear"></div>
					<?
				}
				?>

				<label>PDF: </label>
				<input type="file" name="pdf" class="<? if ($file_needed || $pdf_only) {echo 'required';} ?>" />
				<div class="clear"></div>
				
				<label>Order: </label>
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
				<button type="submit" class="redButtonLarge left">
					<?
					if ($_action == "edit") {echo 'Update PDF';}
					elseif ($_action == "add") {echo 'Add PDF';} 
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
			SHOWS LIST
		=========================*/
		else
		{
			$get = getInfo($database_table, "", "", "order", "ASC");
			
			?>
			<table class="listing tablePadding">
				<thead>
					<tr>
						<th class="textLeft">File</th>
						<th colspan="2"></th>		
					</tr>
				</thead>
				<?
				if (empty($get)) {echo '<td colspan="4">There are no PDFs added.</td>';}
				else
				{
					foreach ($get AS $row)
					{
						?>
						<tr valign="top">
							<td>
								<? echo '<a href="/a/pdfs/'.$row['file'].'" target="_blank">'.stripslashes($row['name']).'</a>'; ?></td>
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