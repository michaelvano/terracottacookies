<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');


// META DESCRIPTIONS
$title = "Manage Orders";
$mdesc = "";	
$mbots = "NOINDEX, NOFOLLOW";
$canon = "";
$page = "admin";
$subPage = "orders";
$thisPage = "/admin/orders.php";

include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header.php');









/* =======================
	CLOSES ORDER
=========================*/
if ($_action == "close" && $_id != "")
{
	$dateClosed = date("Y-m-d H:i:s");
	$fields = array("is_closed", "date_closed");
	$values = array(1, $dateClosed);
	$updateOrder = updateInfo("store_confirmed_carts", $fields, $values, "id", $_id);
	
	if ($updateOrder) {$msg = 1;} else {$msg = 2;}	
}









if (!$loggedIn) {echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/index.php?_msg=102">'; exit;}
elseif (!$isAdmin) {echo 'You do not have permissions to view this page';}
else
{
	include($_SERVER['DOCUMENT_ROOT']."/admin/nav.php");
	?>
	
	<div class="mainContent">
	
		<h1 class="left">
			<?
			switch($_action)
			{
				case "viewAll": echo 'All Orders'; break;
				case "viewClosed": echo 'Closed Orders'; break;
				case "view": echo 'Viewing Order #'.$_id; break;
				default: echo 'Open Orders'; break;
			}
			?>
		</h1 class="left">
		
		
		<div class="right" style="margin:10px 0 20px 0;">
			<div class="clear10"></div>
			<a href="<? echo $thisPage; ?>?_action=viewClosed" class="redButtonSmall right" style="margin:0 0 0 15px">View Closed</a>
			<a href="<? echo $thisPage; ?>?_action=viewAll" class="redButtonSmall right" style="margin:0 0 0 15px" >View All</a>
			<a href="<? echo $thisPage; ?>" class="redButtonSmall right" >View Open</a>
		</div>
		<div class="clear"></div>
		
		<?
		
		if ($_msg != "") 
		{
			switch($_msg) 
			{
				case 1: echo '<div class="success">Order has been closed.</div>'; break;
				case 2: echo '<div class="error">Order could not be closed. Please try again.</div>'; break;
			}		
			echo '<div class="clear10"></div>';
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			VIEW DETAILS OF THE ORDER
		=========================*/
		if ($_action == "view" && $_id != "")
		{
			$isClosed = getSingleValue("is_closed", "store_confirmed_carts", "id", $_id);
			$payLater = getSingleValue("is_pay_later", "store_confirmed_carts", "id", $_id);
			
			?>
			<a href="/admin/orders.php" class="redButtonSmall right">Back to Orders</a>
			<a href="/admin/print-receipt.php?_id=<? echo $_id; ?>" class="redButtonSmall right" style="margin:0 10px 0 0;" target="_blank">Print Receipt</a>
			<div class="clear20"></div>
			<?
			
			if ($isClosed == 1) {echo '<div class="error size16">This Order is closed</div><div class="clear20"></div>';}
			if ($payLater == 1) {echo '<div class="size16 bold">This order will be paid upon delivery.</div><div class="clear20"></div>';}
			elseif ($payLater == 0) {echo '<div class="size16 bold">This order has already been paid.</div><div class="clear20"></div>';}
			
			echo generateReceipt($_id, 0);
			
			if ($isClosed == 0)
			{
				?> 
				<div class="clear20"></div>
				<a href="<? echo $thisPage; ?>?_action=close&_id=<? echo $_id; ?>" class="redButtonLarge right">Close Order</a>
				<?
			}
			?>
			<div class="clear40"></div>	
			<?
		}
		
		
		
		
		
		
		
		
		
		/* =======================
			SHOW ORDERS
		=========================*/
		else 
		{
			if (!isset($_GET['_page']) || $_GET['_page'] == '' || $_GET['_page'] == 0) {$_page = 1;}
			else { $_page = $_GET['_page']; }
			
			$_limit = 35; 
			$_start = ($_page-1) * $_limit;
			
			if ($_action == "viewClosed")
			{
				$get_total = getInfo("store_confirmed_carts", "is_closed", 1, "id", "DESC");
				$total_pages = ceil(count($get_total)/$_limit);
				
				$getInfo = getInfo("store_confirmed_carts", "is_closed", 1, "id", "DESC", $_start, $_limit);
				$pagination_link = '/admin/orders.php?_action=viewClosed&_page=';
			}
			
			elseif ($_action == "viewAll")
			{
				$get_total = getInfo("store_confirmed_carts", "", "", "id", "DESC");
				$total_pages = ceil(count($get_total)/$_limit);
				
				$getInfo = getInfo("store_confirmed_carts", "", "", "id", "DESC", $_start, $_limit);
				$pagination_link = '/admin/orders.php?_action=viewAll&_page=';
			}
			
			else
			{
				$get_total = getInfo("store_confirmed_carts", "is_closed", 0, "id", "DESC");
				$total_pages = ceil(count($get_total)/$_limit);
				
				$getInfo = getInfo("store_confirmed_carts", "is_closed", 0, "id", "DESC", $_start, $_limit);
				$pagination_link = '/admin/orders.php?_page=';
			}
			
			switch($msg)
			{
				case 1: echo '<span class="success">Order has been closed.</span>'; break;
				case 2: echo '<span class="error">Order could not be closed. Please try again.</span>'; break;
			}
			if ($msg != "") {echo '<div class="clear20"></div>';}
			?>
			
			<table class="listing tablePadding">
				<thead>
					<tr>				
						<th>#</th>
						<th>SCHOOL</th>
						<th>NAME</th>
						<th class="textCenter">TOTAL</th>
						<th class="textCenter">ORDER DATE</th>
						<th colspan="2" class="textCenter"></th>		
					</tr>
				</thead>
				
				<? 
				$i = 1;
				
				if (empty($getInfo)) {echo '<tr><td colspan="8">There are no order to be shown</td></tr>';}
				else 
				{
					foreach($getInfo AS $row)
					{
						$createDate = date_create($row['order_date']);
						$orderDate = date_format($createDate, "F d, Y");
						?>
						<tr <? if ($row['is_closed'] == 1) {echo 'style="background:#fdd;"';} ?>>
							<td class="textCenter"><? echo stripslashes($row['id']); ?></td>
							<td><? echo stripslashes($row['school_name']); ?></td>
							<td><? echo stripslashes($row['name']); ?></td>
							<td class="textRight"><? echo '$'.stripslashes(number_format($row['total'], 2)); ?></td>
							<td class="textCenter" ><? echo stripslashes($orderDate); ?></td>
							<?
							if ($row['is_closed'] == 1)
							{
								$dateCreate = date_create($row['date_closed']);
								$dateClosed = date_format($dateCreate, "F d, Y");
								?>
								<td colspan="2" class="textCenter">
									<a href="<? echo $thisPage; ?>?_action=view&_id=<? echo $row['id'] ?>">
										<? echo $dateClosed; ?>
									</a>
								</td> 
								<?
							} else {
								?>
								<td class="textCenter" ><a href="<? echo $thisPage; ?>?_action=view&_id=<? echo $row['id'] ?>">[DETAILS]</a></td>
								<td class="textCenter" ><a href="<? echo $thisPage; ?>?_action=close&_id=<? echo $row['id'] ?>">[CLOSE]</a></td>
								<?
							}
							?>
						</tr>
						<?
					}
				}
				?>
			
			</table>
			<div class="clear30"></div>
			<?
			if ($total_pages > 1)
			{
				adminPagination($_page, $total_pages, $pagination_link);
			}
		}
		
		
		
		
		
		
		
		
		?>
	
	</div>
	<?
}
?>



<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/footer.php'); ?>