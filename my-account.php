<?
require_once('a/inc/bootstrap.php');

if (!isset($_SESSION['ID']) || $_SESSION['ID'] == '') { header('Location: /login.php'); }

$total_orders = getInfo('store_confirmed_carts', 'user_id', $_SESSION['ID']);
$total_pages = ceil(count($total_orders)/$_limit);
$pagination_link = '/my-account.php?_page=';

// Re-order 
if ($_action == 'reorder' && $_id != '')
{
	// create shopping cart
	$fields = array("session_id", "date_created", "ip_address");
	$values = array($sessionID, "NOW()", $ipAddress);
	$insert = insertInfo("store_temp_carts", $fields, $values);
		
	$get = getInfo('store_confirmed_items', 'order_id', $_id, 'id', 'ASC');
	
	if (!empty($get))
	{
		foreach($get AS $a)
		{
			// check if product is still in database
			$check = getInfo('product', 'id', $a['product_id']);
			if (!empty($check))
			{
				$item_fields = array('session_id', 'product_id', 'quantity');
				$item_values = array($sessionID, $a['product_id'], $a['quantity']);
				$insert_item = insertInfo('store_temp_items', $item_fields, $item_values);
			}
		}
		
		header('Location: /shopping-cart.php');
	}
}
	
	

$orders = getInfo('store_confirmed_carts', 'user_id', $_SESSION['ID'], 'order_date', 'DESC', $_start, $_limit);


// META DESCRIPTIONS
$title = "Purhcase History";
$canon = "";
$subPage = "my-account";
$mbots = "NOINDEX, NOFOLLOW";
$page = "about";
$breadcrumbMain = "My Account";
$mainLink = "/my-account.php";
$breadcrumbSub = "Purhcase History";
$subLink = "/my-account.php";

$thisPage = '/my-account.php';

include('a/inc/header.php');


// INCLUDE NAV
include($_SERVER['DOCUMENT_ROOT'].'/a/inc/navs/my-account.php');


?>
<div class="mainContent">
<?

	// View receipt
	if ($_action == 'view' && $_id != '')
	{
		$isClosed = getSingleValue("is_closed", "store_confirmed_carts", "id", $_id);
		$payLater = getSingleValue("is_pay_later", "store_confirmed_carts", "id", $_id);
		?>
		
		<h1>Viewing Order #<?= $_id; ?></h1>
		
		<? echo generateReceipt($_id, 0); ?>
		<a href="<? echo $thisPage; ?>?_action=reorder&_id=<? echo $_id; ?>" class="redButtonLarge right">RE-ORDER</a>
		<a href="<? echo $thisPage; ?>" class="redButtonLarge right" style="margin-right:10px;" >View History</a> 
		<div class="clear40"></div>	
		<?
	}
	
	
	// Show Orders
	else 
	{
		?>
		<h1>Purhcase History</h1>
	
		<div class="clear40"></div>	
	
		<table class="listing tablePadding">
			<thead>
				<tr>				
					<th style="width:5%">#</th>
					<th class="textLeft">Date</th>
					<th class="textLeft" style="width:15%">Total</th>
					<th style="width:10%"></th>
					<th style="width:14%"></th>
				</tr>
			</thead>
			<tbody>
				<?
				if (empty($orders)) {echo '<tr><td colspan="5">You have not made any orders yet.</td></tr>';}
				else {
					foreach($orders AS $a)
					{
						?>
						<tr valign="top">
							<td class="vMiddle"><?= $a['id']; ?></td>
							<td class="textLeft vMiddle"><?= date_format(date_create($a['order_date']), 'F d,Y'); ?></td>	
							<td class="textCenter vMiddle"><?= '$'.$a['total']; ?></td>	
							<td class="textCenter vMiddle"><a href="<? echo $thisPage; ?>?_action=view&_id=<?= $a['id']; ?>">[VIEW]</a></td>
							<td class="textCenter vMiddle"><a href="<? echo $thisPage; ?>?_action=reorder&_id=<?= $a['id']; ?>">[RE-ORDER]</a></td>
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
</div>

<? include('a/inc/footer.php'); ?>