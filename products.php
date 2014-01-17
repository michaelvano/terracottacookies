<?
require_once('a/inc/bootstrap.php');

if (
	$_subPage != "our-products" &&
	$_subPage != ""
)
{	
	header("Status: 404 Not Found", true, 404);
	include('404.php');
	exit();
}

elseif ($_subPage == "our-products" || $_subPage == "")
{
	$title = "Gluten & Nut Free Cookies";
	$canon = "/products/";
	$subPage = "products";
	if ($_subPage == "products") {$breadcrumbSub = "Products"; $subLink = "/products/our-products/";}
}








// META DESCRIPTIONS
$mdesc = "Terra Cotta Cookies is a Canadian Cookie Company that makes all natural, gluten and nut free cookies & cookie dough.";	
$mbots = "INDEX, FOLLOW";
$page = "products";
$breadcrumbMain = "Products";
$mainLink = "/products/";

include('a/inc/header.php');









// ABOUT US SUB NAV
?>
<div id="subNav">
	<a href="/products/our-products/" class="<? checkPage($subPage, "products"); ?>" >Our Products</a>
	<a href="/schools/products/">School Products</a>
</div>
<?










?><div class="mainContent"><?









// OUR PRODUCTS - MAIN PAGE 
if ($subPage == "products")
{
	$content = getSingleValue('content', 'content', 'id', 2);
	?>
	<h1>Nut Free Cookies &amp; Products</h1>
	
	<img src="/a/i/site/our-products_001.png" alt="Terra Cotta Cookie Co. Products" style="margin:0 0 0 -12px;" />
	
	<?= stripslashes($content); ?>
	
	<? /*
	<h2 class="red">ORIGINAL GOURMET COOKIES, SNACKS & DOUGH</h2>
	<span class="italic">All of our Original Gourmet products have been produced with all natural ingredients, with no preservatives added and are manufactured in a peanut and nut free facility.</span>
	<div class="clear10"></div>
	<ul>
		<li>Chocolate Chip</li>
		<li>White Chocolate Chip </li>
		<li>White Chocolate Fudge  </li>
		<li>Double Chocolate Fudge </li>
		<li>Oatmeal Chocolate Chip </li>
		<li>Caramel & Chocolate Chip </li>
		<li>Oatmeal Raisin </li>
		<li>Chocolate Chip with Cinnamon</li>
		<li>Double Fudge Brownie</li>
	</ul>
	<div class="clear30"></div>
	
	<h3 class="red">GLUTEN FREE GOURMET COOKIES & SNACKS</h3>
	<span class="italic">All of our gluten Free Gourmet products have been produced with all natural ingredients, with no preservatives added, no artifical colours or flavours, in a peanut and nut free facility.</span>
	<div class="clear10"></div>
	<ul>
		<li>Chocolate Chip Cookies</li>
		<li>Shortbread Cookies</li>
		<li>Banana & Chocolate Chip Muffins</li>
		<li>Blueberry Muffins</li>
		<li>Carrot Muffins</li>
		<li>Chocolate & Zucchini Muffins</li>
		<li>Fudge Brownie Slab</li>
		<li>Carrot Cake with Cream Cheese Frosting</li>
		<li>Macaroon Dough</li>
	</ul>
	<div class="clear30"></div>
	
	<h4 class="red">HEALTHIER GOURMET COOKIES & DOUGH</h4>
	<span class="uppercase garamond size16">ONTARIO SCHOOL COMPLIANT MENU ITEMS, 80% SELL CATEGORY</span><br />
	<span class="italic">Healthier Gourmet Cookies & Dough products compliant with Ontario School 80% Sell Category and have been produced with all natural ingredients, with no preservatives added, no aritifical colours or flavours, and are manufactured in a peanut and nut free facility. All 80% Sell Category cookies are made with unsweetened apple sauce and contain 2 grams of fibre.</span>
	<div class="clear10"></div>
	<ul>
		<li>Chocolate Chip Delight</li>
		<li>Fudge Chip Delight</li>
		<li>White Chunk Fudge Delight</li>
		<li>Caramel & Chocolate Chip Delight</li>
		<li>Oatmeal Chocolate Chip Delight</li>
		<li>Oatmeal Delight</li>
		<li>Oatmeal Raisin Delight</li>
	</ul>
	<div class="clear30"></div>
	
	<h5 class="red">HEALTHIER GOURMET COOKIES & DOUGH</h5>
	<span class="uppercase garamond size16">ONTARIO SCHOOL COMPLIANT MENU ITEMS, 20% SELL CATEGORY</span><br />
	<span class="italic">Healthier Gourmet Cookies & Dough products compliant with Ontario School 20% Sell Category are produced with no preservatives added in a peanut and nut free facility.</span>
	<div class="clear10"></div>
	<ul>
		<li>Gluten Free Chocolate Chip</li>
		<li>Vanilla Pumpkin</li>
		<li>Vanilla Snowman</li>
		<li>Gingerbread Teddy</li>
		<li>Vanilla Heart</li>
		<li>Vanilla Butterfly</li>
	</ul>
	<div class="clear30"></div>
	<?
	*/
}

	
	
	
	
	
	
	
	
	?>
	<div class="clear10"></div>
</div><?










?>

<? include('a/inc/footer.php'); ?>