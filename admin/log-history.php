<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "View Log History";
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";
$page = "admin";
$subPage = "log";
$thisPage = "/admin/log-history.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');


if (!$loggedIn) {echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/?_msg=102">'; exit;}
elseif (!$isAdmin) {echo 'You do not have permissions to view this page';}
else {

	include($_SERVER['DOCUMENT_ROOT']."/admin/nav.php");
	
	?>
	<div class="mainContent">
	
		<div class="clear10"></div>
		
		<h1 class="left">View Log History</h1>
		<div class="clear"></div>
		<p>This page shows all the updates made on User account by Admins.</p>
		<?
		
		if (!isset($_GET['_page']) || $_GET['_page'] == '' || $_GET['_page'] == 0) {$_page = 1;}
		else { $_page = $_GET['_page']; }
		
		$_limit = 25;
		$_start = ($_page-1) * $_limit;
		
		$get_total = getInfo('user_history');
		$total_pages = ceil(count($get_total)/$_limit);
		$pagination_link = $thisPage.'?_page=';
		
		$log = getInfo('user_history', '', '', 'date_requested', 'DESC', $_start, $_limit);
									
		if (!empty($log))
		{
			?>
			<table class="listing tablePadding">
				<thead>
					<tr>				
						<th class="textLeft" width="10%">Date</th>
						<th class="textCenter" width="15%">User</th>
						<th class="textLeft" width="25%">Requested By</th>
						<th class="textLeft" width="25%">Changed By</th>
						<th class="textLeft">Action</th>							
					</tr>
				</thead>
				<tbody>
					<?					
					foreach ($log AS $a)
					{
						$first_name = getSingleValue('firstName', 'users', 'id', $a['user_id']);
						$last_name = getSingleValue('lastName', 'users', 'id', $a['user_id']);
						?>
						<tr valign="top">
							<td><?= date_format(date_create($a['date_requested']), 'Y/m/d H:i:s'); ?></td>
							<td><?= stripslashes($last_name.', '.$first_name); ?></td>
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
				</tbody>
			</table>
			<?	
			if ($total_pages > 1)
			{
				?>
				<div class="clear30"></div>
				<?
				adminPagination($_page, $total_pages, $pagination_link);
			}
			?>
			<div class="clear40"></div>
			<?
		}
		else 
		{
			?>
			There have been no changes made by admins yet on user accounts.
			<?
		}
		?>
	
	</div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>