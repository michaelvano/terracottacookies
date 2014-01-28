<?
	$getInfo = getInfo("store_confirmed_carts", "is_closed", 0);
	if (!empty($getInfo)) {$closedOrders = count($getInfo);} else {$closedOrders = 0;}
?>

<div id="subNav">
	<a href="/admin/" class="<? checkPage($subPage, "dashboard"); ?>">Dashboard</a>
	<a href="/admin/orders.php" class="<? checkPage($subPage, "orders"); ?>">Orders (<? echo $closedOrders; ?>) &nbsp; &nbsp;<? if ($subPage == "orders") {echo '&#9660;';} else {echo '&#9658;';} ?>  </a>
	<?
	if ($subPage == "orders")
	{
		?>
		<div class="dropdown">
			<a href="/admin/orders.php">&bull; View Open Orders</a>
			<a href="/admin/orders.php?_action=viewClosed">&bull; View Closed Orders</a>
			<a href="/admin/orders.php?_action=viewAll">&bull; View All Orders</a>
		</div>
		<?
	}
	?>
	<a href="/admin/blog.php" class="<? checkPage($subPage, "blog"); ?>">Manage Blog </a>
	<a href="/admin/newsletter.php" class="<? checkPage($subPage, "newsletter"); ?>">Manage Newsletter </a>
	<a href="/admin/ingredients.php" class="<? checkPage($subPage, "ingredients"); ?>">Manage Ingredients </a>
	<a href="/admin/nutritional-information.php" class="<? checkPage($subPage, "nutrition"); ?>">Manage Nutri Info </a>
	<a href="/admin/pdfs.php" class="<? checkPage($subPage, "pdfs"); ?>">Fundraising PDFs </a>
	<a href="/admin/certifications.php" class="<? checkPage($subPage, "certifications"); ?>">Manage Certifications </a>
	<a href="/admin/special-offer.php" class="<? checkPage($subPage, "special"); ?>">Special Offer </a>
	<a href="/admin/products-content.php" class="<? checkPage($subPage, "products-content"); ?>">Nut Free Products </a>
	<a href="/admin/products.php" class="<? checkPage($subPage, "products"); ?>">
		Manage Products &nbsp; &nbsp;<? if ($subPage == "products") {echo '&#9660;';} else {echo '&#9658;';} ?>
	</a>
	<?
	if ($subPage == "products")
	{
		?>
		<div class="dropdown">
			<a href="/admin/products.php">&bull; View Products</a>
			<a href="/admin/products.php?_action=add">&bull; Add Product</a>
			<a href="/admin/products.php?_action=viewCat">&bull; View Categories</a>
			<a href="/admin/products.php?_action=addCat">&bull; Add Main Category</a>
		</div>
		<?
	}
	?>
	<a href="/admin/media.php" class="<? checkPage($subPage, "media"); ?>">Manage Media </a>
	<a href="/admin/testimonials.php" class="<? checkPage($subPage, "testimonials"); ?>">Manage Testimonials</a>
	<a href="/admin/our-team.php" class="<? checkPage($subPage, "team"); ?>">Manage Our Team </a>
	<a href="/admin/users.php" class="<? checkPage($subPage, "users"); ?>">Manage Users</a>
	<a href="/admin/log-history.php" class="<? checkPage($subPage, "log"); ?>">User Log History</a>
	<a href="/admin/logout.php">Logout</a>
</div>