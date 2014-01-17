<?
require_once('a/inc/bootstrap.php');

if (
	$_subPage != "welcome" &&
	$_subPage != "products" &&
	$_subPage != "ingredients" &&
	$_subPage != "nutritional-facts" &&
	$_subPage != "order" &&
	$_subPage != "original-menu" &&
	$_subPage != "combo-menu" &&
	$_subPage != "delivery" &&
	$_subPage != "newsletter" &&
	$_subPage != ""
)
{	
	header("Status: 404 Not Found", true, 404);
	include('404.php');
	exit();
}

elseif ($_subPage == "welcome" || $_subPage == "")
{
	$title = "School Cookie Dough Fundraisers";
	$canon = "/schools/";
	$mdesc = "Terra Cotta Cookie Co. is the forerunner to providing healthy, lower fat, trans-fat free, peanut and nut free snacks and drinks to schools. Since 1984, we have been committed to manufacturing these cookies and snacks without any additives, preservatives, artificial flavours or colours.";	
	$subPage = "welcome";
	if ($_subPage == "welcome") {$breadcrumbSub = "Welcome"; $subLink = "/schools/welcome/";}
}

elseif ($_subPage == "products")
{
	$title = "Products - Schools";
	$canon = "";
	$subPage = "products";
	$breadcrumbSub = "Products";
	$subLink = "/schools/products/";
}

elseif ($_subPage == "ingredients")
{
	$title = "Ingredients - Schools";
	$canon = "";
	$subPage = "ingredients";
	$breadcrumbSub = "Our Blog";
	$subLink = "/about-us/our-blog/";
	
	$ingredients = getInfo("ingredient", "", "", "order", "ASC");
}

elseif ($_subPage == "nutritional-facts")
{
	$title = "Nutritional Facts - Schools";
	$canon = "";
	$subPage = "nutritional";
	$breadcrumbSub = "Nutritional Facts";
	$subLink = "/schools/nutritional-facts/";
}

elseif ($_subPage == "order")
{
	$title = "Order Online - Schools";
	$canon = "";
	$subPage = "order";
	$breadcrumbSub = "Order";
	$subLink = "/schools/order/";
}

elseif ($_subPage == "original-menu")
{
	$title = "Original Menu - Schools";
	$canon = "";
	$subPage = "order";
	$subSubPage = "original";
	$breadcrumbSub = "Original Order Menu";
	$subLink = "/schools/original-menu/";
}

elseif ($_subPage == "combo-menu")
{
	$title = "Combo Menu - Schools";
	$canon = "";
	$subPage = "order";
	$subSubPage = "combo";
	$breadcrumbSub = "Combo Order Menu";
	$subLink = "/schools/combo-menu/";
}

elseif ($_subPage == "delivery")
{
	$title = "Delivery Schedule - Schools";
	$canon = "";
	$subPage = "delivery";
	$breadcrumbSub = "Delivery Schedule";
	$subLink = "/schools/delivery/";
}

elseif ($_subPage == "newsletter")
{
	$title = "Newsletter - Schools";
	$canon = "";
	$subPage = "newsletter";
	$breadcrumbSub = "Newsletters";
	$subLink = "/schools/newsletter/";
}









// META DESCRIPTIONS

$mbots = "INDEX, FOLLOW";
$page = "schools";
$breadcrumbMain = "Schools";
$mainLink = "/schools/";

include('a/inc/header.php');









// ABOUT US SUB NAV
?>
<div id="subNav">
	<a href="/schools/welcome/" class="<? checkPage($subPage, "welcome"); ?>" >Welcome</a>
	<a href="/schools/order/" class="<? if ($subPage == "order") {echo 'active';} else {echo 'brown';} ?>" >Order &nbsp; &nbsp;<? if ($subPage == "order") {echo '&#9660;';} else {echo '&#9658;';} ?></a>
	<?
	if ($subPage == "order")
	{
		?>
		<div class="dropdown">
			<a href="/schools/original-menu" class="<? checkPage($subSubPage, "original"); ?>">&bull; Original Order Menu</a>
			<a href="/schools/combo-menu" class="<? checkPage($subSubPage, "combo"); ?>">&bull; Combo Order Menu</a>
		</div>
		<?
	}
	?>
	<a href="/schools/products/" class="<? checkPage($subPage, "products"); ?>" >Products &nbsp; &nbsp;<? if ($subPage == "products") {echo '&#9660;';} else {echo '&#9658;';} ?></a>
	<?
	if ($subPage == "products")
	{
		// $mainCategories = getInfo("category", "parent", 0, "id", "ASC");
		$mainCategories = array();
		$query = mysql_query(" SELECT * FROM `category` WHERE `parent`=0 AND `is_combo`=0 ORDER BY `id` ASC ");
		if (mysql_num_rows($query) > 0) { while($x = mysql_fetch_assoc($query)) {$mainCategories[] = $x;} }
		
		?>
		<div class="dropdown">
			<?
			foreach($mainCategories AS $row)
			{
				if ($row['name'] != "")
				{
					?>
					<a href="#<? echo $row['id']; ?>">&bull; <? echo stripslashes($row['name']); ?></a>
					<?
				}
			}
			?>
		</div>
		<?
	}
	?>
	<a href="/fundraising/" class="<? checkPage($subPage, "fundraising"); ?>" >School Fundraising</a>
	<a href="/schools/ingredients/" class="<? checkPage($subPage, "ingredients"); ?>" >Ingredients</a>
	<a href="/schools/nutritional-facts/" class="<? checkPage($subPage, "nutritional"); ?>" >Nutritional Facts</a>
	<a href="/schools/delivery/" class="<? checkPage($subPage, "delivery"); ?>" >Delivery</a>
	<a href="/schools/newsletter/" class="<? checkPage($subPage, "newsletter"); ?>" >Newsletter</a>
	
	<div class="clear"></div>
</div>
<?










?> <div class="mainContent"> <?









// WELCOME - MAIN PAGE 
if ($subPage == "welcome")
{
	?>
	<h1>Welcome</h1>
	
	<img src="/a/i/site/schools_welcome_001.png" alt="Welcome Schools" style="margin:0 0 0 -12px;" />
	<p>Terra Cotta Cookie Co. is the forerunner to providing healthy, lower fat, trans-fat free, peanut and nut free snacks and drinks to schools. Since 1984, we have been committed to manufacturing these cookies and snacks without any additives, preservatives, artificial flavours or colours.</p>
	<div class="clear40"></div>
	<div class="clear40"></div>
	<?
}









// PRODUCTS
elseif ($subPage == "products")
{
	?>
	<a name="top"></a>
	<h1>
		Products
		<div class="clear5"></div>           
		<span class="bold size18 brown">Terra Cotta Cookies Co.</span>		
	</h1>
	<div class="brownDividerLine"></div>
	
	<?
	$i=0;
	foreach($mainCategories AS $row)
	{
		?>
		<table class="products">
			<thead>
				<tr>
					<th colspan="6"><? echo stripslashes($row['name']).'<a name="'.stripslashes($row['id']).'"></a>'; if ($i != 0) {echo '<a href="#top" class="right blackButton">Back To Top</a>';} ?></th>					
				</tr>
				<? listCategoriesAndProducts($row['id'], 0, false, $subPage); ?>
			</thead>		
		</table>
		<?
		$i++;
	}

}









// INGREDIENTS
elseif ($subPage == "ingredients")
{
	/*
	$ingredients = array(
		'product' => array(
			"Chocolate Chip Tiny's:",
			"White Chocolate Fudge Tiny's:",
			"White Chocolate Tiny's:",
			"Chocolate Chip DeLite:",
			"Casey DeLite (Chocolate chips and Caramel bits)",
			"Oatmeal Raisin DeLite",
			"Fudge Chip DeLite", 
			"White Chunk Fudge DeLite",
			"Oatmeal Chocolate Chip DeLite",
			"Oatmeal DeLite",
			"DuneDawg DeLite",
			"MudDawg DeLite",
			"Vanilla",
			"Ginger Teddies",
			"Ice Dawgs I**:",
			"Ice Dawgs IV**",
			"Gluten Free Chocolate Chip",
			"Gluten Free Brownies",
			"CHOCOLATE CHIP WITH ATTITUDE",
			"MACAROON",
			"GINGER SNAP",
			"DOUBLE FUDGE BROWNIE",
			"BUTTERSCOTCH SQUARES:",
			"COTTAGE TEA BISCUIT MIX"
		),
		'ingredients' => array(
			"Unbleached flour, semi-sweet chocolate chips (sugar, chocolate liquor, cocoa butter, soy lecithin, pure vanilla), *non-hydrogenated margarine, sugar, brown sugar, liquid whole egg, sodium bicarbonate.",
			"Unbleached flour, *non-hydrogenated margarine, white chocolate chips (sugar, cocoa butter, whole milk powder, skim milk powder, butteroil, soy lecithin, pure vanilla), sugar, brown sugar, liquid whole egg, cocoa, sodium bicarbonate.",
			"Unbleached flour, *non-hydrogenated margarine, sugar, brown sugar, liquid whole egg, white chocolate chips (sugar, cocoa butter, whole milk powder, skim milk powder, butteroil, soy lecithin, pure vanilla), sodium bicarbonate.",
			"Unbleached flour, brown sugar, sugar, semi-sweet chocolate chips (sugar, chocolate liquor, cocoa butter, soy lecithin, pure vanilla), liquid whole egg,*non-hydrogenated margarine, unsweetened applesauce, inulin, pure vanilla, sodium bicarbonate.",
			"Unbleached flour, brown sugar, sugar, semi-sweet chocolate chips (chocolate liquor, sugar, dextrose, soy lecithin, pure vanilla), caramel bits (sugar, corn syrup, skim milk, cottonseed & soybean oil, butter, salt, mono and diglycerides, natural flavour), liquid whole egg, *non-hydrogenated margarine, unsweetened applesauce, inulin, pure vanilla, sodium bicarbonate, cinnamon.",
			"Unbleached flour, oatmeal, brown sugar, *non-hydrogenated margarine, raisins, sugar, liquid whole egg, unsweetened applesauce, inulin, sodium bicarbonate, pure vanilla.",
			"Unbleached flour, brown sugar, sugar, liquid whole egg, *non-hydrogenated margarine, semi-sweet chocolate chips (sugar, chocolate liquor, cocoa butter, soy lecithin, pure vanilla), unsweetened applesauce, cocoa, inulin, sodium bicarbonate, pure vanilla.",
			"Unbleached flour, brown sugar, sugar, liquid whole egg, *non-hydrogenated margarine, white chocolate chunks (sugar, cocoa butter, whole milk powder, soy lecithin, pure vanilla), unsweetened applesauce, cocoa, inulin, sodium bicarbonate, pure vanilla.",
			"Unbleached flour, oatmeal, brown sugar, sugar, semi-sweet chocolate chips (sugar, chocolate liquor, cocoa butter, soy lecithin, pure vanilla), liquid whole egg, *non-hydrogenated margarine, unsweetened applesauce, inulin, sodium bicarbonate, pure vanilla, cinnamon.",
			"Unbleached flour, oatmeal, brown sugar,*non-hydrogenated margarine, sugar, liquid whole egg, unsweetened applesauce, inulin, sodium bicarbonate, pure vanilla, cinnamon.",
			"Marshmallows (corn syrup, sugar, corn starch, water, gelatin, artificial flavours), \"rice krispies\" (rice, sugar, and/or glucose/fructose, salt, malt, vitamins), *non-hydrogenated margarine, inulin, pure vanilla.",
			"Marshmallows (corn syrup, sugar, corn starch, water, gelatin, flavours), \"rice krispies\" (rice, sugar and/or glucose/fructose, salt, malt, vitamins),*non-hydrogenated margarine, semi-sweet chocolate chips (sugar, chocolate liquor, cocoa butter, soy lecithin, pure vanilla), inulin.",
			"Unbleached flour, non-hydrogenated margarine, sugar, liquid whole egg, inulin, pure vanilla.",
			"Unbleached flour, molasses, non-hydrogenated margerine, brown sugar, liquid whole egg, inulin, vinegar, sodium bicarbonate, ginger, cinnamon, nutmeg.",
			"Chocolate Chip DeLite - see above ingredients",
			"Fudge Chip DeLite - see above ingredients",
			"Brown sugar, *non-hydrogenated margarine, semi-sweet chocolate chips (sugar, chocolate liquor, cocoa butter, soy lecithin, vanilla extract), white rice flour, liquid whole egg, soya flour, tapioca starch, pure vanilla, sodium bicarbonate, xanthan gum.",
			"White sugar, *non-hydrogenated margarine, white rice flour, liquid whole egg, cocoa, semi-sweet chocolate chips (sugar, chocolate liquor, cocoa butter, soy lecithin, vanilla extract), pure vanilla.",
			"Unbleached flour, soya oil margarine, sugar, brown sugar, milk chocolate chips, semi-sweet chocolate chips, liquid whole egg, corn syrup, pure vanilla, sodium bicarbonate, cinnamon",
			"Coconut, sweetened condensed milk, pure vanilla",
			"Unbleached flour, sugar, soya oil margarine, molasses, liquid whole egg, sodium bicarbonate, cinnamon, ginger, nutmeg",
			"Sugar, unbleached flour, semi-sweet chocolate chips, soya oil margarine, water, liquid whole egg, cocoa, sodium bicarbonate",
			"Brown sugar, unbleached flour, liquid whole egg, soya oil margarine, oatmeal, butter, pure vanilla, baking powder.",
			"Unbleached flour, soya oil margarine, buttermilk powder, baking powder, sugar, cream of tartar"
		)
	);
	*/
	?>
	<h1>Ingredients</h1>
	<div class="brownDividerLine"></div>
	<?
	if (!empty($ingredients))
	{
		foreach($ingredients AS $a)
		{
			?>
			<p>
				<span class="size21 garamond red uppercase"><? echo stripslashes($a['name']); ?></span><br />
				<? echo nl2br(stripslashes($a['ingredients'])); ?>
			</p>
			<div class="clear5"></div>
			<?
		}
	}
	/*
	for ($i=0; $i < count($ingredients['product']); $i++)
	{
		?>
		<p>
			<span class="size21 garamond red uppercase"><? echo stripslashes($ingredients['product'][$i]); ?></span><br />
			<? echo stripslashes($ingredients['ingredients'][$i]); ?>
		</p>
		<div class="clear5"></div>
		<?
	}
	*/
	?>
	<?
}









// NUTRITIONAL FACTS
elseif ($subPage == "nutritional")
{
	$nutritional = getInfo("nutritional_information", "", "", "order", "ASC");
	
	
	$nutritionalInformation = array(
		"chocolate-chip-de-lite",
		"casey-de-lite",
		"oatmeal-raisin-de-lite",
		"fudge-chip-de-lite",
		"white-chunk-fudge-de-lite",
		"oatmeal-chocolate-chip",
		"oatmeal-de-lite",
		"dune-dawg-de-lite",
		"mud-dawg-de-lite",
		"vanilla-de-lite",
		"ice-dawg-iv",
		"ice-dawg-i"
	);
	
	$fullName = array (
		"Chocolate Chip DeLite",
		"Casey DeLite",
		"Oatmeal Raisin DeLite",
		"Fudge Chip DeLite",
		"White Chunk Fudge DeLite",
		"Oatmeal Chocolate Chip",
		"Oatmeal DeLite",
		"DuneDawg DeLite",
		"MudDawg DeLite",
		"Vanilla Delite",
		"Ice Dawg IV",
		"Ice Dawg I"
	);
	
	
	?>
	<script type='text/javascript' src='/a/jzoom/js/jquery.jqzoom-core.js'></script>  
	<link rel="stylesheet" type="text/css" href="/a/jzoom/css/jquery.jqzoom.css" /> 
	<script>
		$(document).ready(function(){  
			<?
			foreach($nutritional AS $a)
			{ 
				?>
				$('#info<? echo $a['id']; ?>').jqzoom({zoomType: 'innerzoom'});
				<?
			}
			/*
			for ($i=0; $i<count($nutritionalInformation); $i++)
			{ 
				?>
				$('#info<? echo $i; ?>').jqzoom({zoomType: 'innerzoom'});
				<?
			}
			*/
			?>
		});
	</script>
	
	<h1>Nutritional Facts</h1>
	
	<div id="nutritionalFacts">
		<?
		
		$c = 1;
		foreach($nutritional AS $a)
		{
			?>
			<a href="/a/i/nutritional/large/<? echo $a['image']; ?>" id="info<? echo $a['id']; ?>" title="<? echo stripslashes($a['name']); ?>" >
				<img src="/a/i/nutritional/thumbnails/<? echo $a['thumbnail']; ?>"  title="<? echo stripslashes($a['name']); ?>" alt="<? echo stripslashes($a['name']); ?>" <? if ($c != 3) {echo 'class="spacer"';} else {$c = 0;} ?> style="width:224px; height:385px;">
			</a>
			<?
			$c++;
			
		}
		/*
		$c = 1;
		for ($i=0; $i < count($nutritionalInformation); $i++)
		{
			?>
			<a href="/a/i/nutritional-information/<? echo $nutritionalInformation[$i]; ?>_large.png" id="info<? echo $i; ?>" title="<? echo $fullName[$i]; ?>" >
				<img src="/a/i/nutritional-information/<? echo $nutritionalInformation[$i]; ?>.png"  title="<? echo $fullName[$i]; ?>" alt="<? echo $fullName[$i]; ?>" <? if ($c != 3) {echo 'class="spacer"';} else {$c = 0;} ?>>
			</a>
			<?
			$c++;
		}
		*/
		?>
	</div>
	<?
	
}









// ORDER 
elseif ($subPage == "order")
{
	?>
	<script>		
		$(document).ready(function()
		{	
			$("#onlineOrderForm").submit(function()
			{	
				var notNumeric = false;
				var atLeastOne = false;
				
				$('.quantity').each(function(){
					var quantity = $(this).val();
					
					if (quantity != "") 
					{
						atLeastOne = true;
						if (isNaN(quantity)) {
							notNumeric = true;
							$(this).addClass('required');
							$(this).focus();
						}
					}
					else { $(this).removeClass('required'); }
				});
				
				if (notNumeric || !atLeastOne) {
					if (notNumeric) { alert("Please enter only numbers"); }
					else if (!atLeastOne) { alert("Please enter a quantity for at least one product"); }
					return false;
				}

			});
	
		});		
	</script>
	<?


	// ORIGINAL ORDER MENU 
	if ($subSubPage == "original")
	{
		// $mainCategories = getInfo("category", "parent", 0, "id", "ASC");
		$mainCategories = array();
		$query = mysql_query(" SELECT * FROM `category` WHERE `parent`=0 AND `is_combo`=0 ORDER BY `id` ASC ");
		if (mysql_num_rows($query) > 0) { while($x = mysql_fetch_assoc($query)) {$mainCategories[] = $x;} }

		?>
			
		<h1>Original Order Menu</h1>
		<div class="brownDividerLine"></div>
		
		<form method="post" action="/shopping-cart.php" id="onlineOrderForm">
			<?
			$i=0;
			foreach($mainCategories AS $row)
			{
				?>
				<table class="products">
					<thead>
						<tr>
							<th colspan="6"><? echo stripslashes($row['name']).'<a name="'.$row['id'].'"></a>'; if ($i != 0) {echo '<a href="#top" class="right blackButton">Back To Top</a>';} ?></th>					
						</tr>
						<? listCategoriesAndProducts($row['id'], 0, false, $subPage); ?>
					</thead>		
				</table>
				<?
				$i++;
			}
			?>
			<div class="clear20"></div>
			<span class="bold italic">* Subject to HST</span>
			<input type="hidden" name="_action" value="addToCart" />
			<button type="submit" id="addToCart" class="redButtonLarge right">Add To Cart</button> 
			<? /* <input type="submit" id="addToCart" class="redButtonLarge right" value="Add To Cart" /> */ ?>
			<div class="clear40"></div>
		</form>
		
		<?
	}
	
	
	// COMBO ORDER MENU 
	elseif ($subSubPage == "combo")
	{
		$special_offer = getInfo("content", "id", 1);
		$special_image = $special_offer[0]['image'];
		$special_content = stripslashes($special_offer[0]['content']); 
		
		// $mainCategories = getInfo("category", "parent", 0, "id", "ASC");
		$mainCategories = array();
		$query = mysql_query(" SELECT * FROM `category` WHERE `parent`=0 AND `is_combo`=1 ORDER BY `id` ASC ");
		if (mysql_num_rows($query) > 0) { while($x = mysql_fetch_assoc($query)) {$mainCategories[] = $x;} }
		?>
			
		<h1>Combo Order Menu</h1>
		<div class="brownDividerLine"></div>
		
		<?
		if ($special_image != "" && file_exists($_SERVER['DOCUMENT_ROOT'].'/a/i/special-offer/'.$special_image))
		{
			?>
			<a href="/a/i/special-offer/<?= $special_image; ?>" target="_blank">
				<img src="/a/i/special-offer/<?= $special_image; ?>" class="left" style="max-width:200px; max-height:260px;" />
			</a>
			<!-- <img src="/a/i/site/combo_special-offer.jpg" class="left" /> -->
			<?
		}
		?>
		
		<div class="left" style="width:400px; margin:-15px 0 0 10px;">
			<p class="size21 garamond uppercase red">SPECIAL OFFER</p>
			<?= $special_content; ?>
		</div>
		
		<div class="clear20"></div>
		
		<form method="post" action="/shopping-cart.php" id="onlineOrderForm">
			<?
			$i=0;
			foreach($mainCategories AS $row)
			{
				?>
				<table class="products">
					<thead>
						<tr>
							<th colspan="6"><? echo stripslashes($row['name']).'<a name="'.$row['id'].'"></a>'; if ($i != 0) {echo '<a href="#top" class="right blackButton">Back To Top</a>';} ?></th>					
						</tr>
						<? listCategoriesAndProducts($row['id'], 0, false, $subPage, $subSubPage); ?>
					</thead>		
				</table>
				<?
				$i++;
			}
			?>
			<div class="clear20"></div>
			<input type="hidden" name="_action" value="addToCart" />
			<button type="submit" id="addToCart" class="redButtonLarge right">Add To Cart</button> 
			<? /* <input type="submit" id="addToCart" class="redButtonLarge right" value="Add To Cart" /> */ ?>
			<div class="clear40"></div>
		</form>
		
		<?
	}
	
	
	
	
	
	
	
	
	// SHOWS THE ORDER LANDING PAGE
	else
	{
		?>
		<h1>Order</h1>
		<div class="brownDividerLine"></div>
		
		<a href="/schools/original-menu">
			<img src="/a/i/site/original-order-menu.png" class="left" style="margin:0 0 0 -10px;" />
		</a>
		
		<a href="/schools/combo-menu">
			<img src="/a/i/site/combo-order-menu.png" class="right" style="margin:0 -12px 0 0;" />
		</a>
		
		<div class="clear40"></div>
		<div class="clear40"></div>
		<?
	}

	
}



















// DELIVERY SCHEDULE
elseif ($subPage == "delivery")
{
	?>
	<h1 class="left">Delivery</h1>
	
	<a href="/a/pdfs/delivery-schedule.pdf" class="redButtonLarge right twoLines" style="line-height:1em;" target="_blank"> 
		Print Delivery <br /> Schedule PDF
	</a>
	<div class="clear"></div>
	<div class="brownDividerLine"></div>
	
	<h2>Schedule</h2>
	<table width="100%">
		<tr>
			<td class="vTop" width="25%">
				<span class="size21 garamond uppercase red">MONDAY</span><br />
				Mississauga<br />
				Etobicoke <br />
				(west of 427 and<br />
				south of 401)
			</td>
			<td class="vTop" width="25%">
				<span class="size21 garamond uppercase red">TUESDAY</span><br />
				Malton<br />
				Toronto<br />
				Markham<br />
				Richmond Hill<br />
				Aurora<br />
				Newmarket<br />
				Oak Ridges<br />
				King City<br />
				Vaughan <br />
				Maple<br />
				Kleinburg<br />
				Woodbridge<br />
				Nobleton<br />
				Bolton<br />
				Macville<br />
				Caledon East<br />
			</td>
			<td class="vTop" width="25%">
				<span class="size21 garamond uppercase red">WEDNESDAY</span><br />
				Silver Creek<br />
				Stewarttown<br />
				Pineview<br />
				Milton<br />
				Oakville<br />
				Burlington<br />
				Waterdown<br />
				Dundas<br />
				Ancaster <br />
				Acton<br />
				Limehouse <br />
				Cambridge<br />
				Kitchener<br />
				Waterloo<br />
				Guelph <br />
				Ponsonby<br />
				Eramosa<br />
				Fergus<br />
				Hamilton<br />
			</td>
			<td class="vTop" width="25%">
				<span class="size21 garamond uppercase red">THURSDAY</span><br />
				Georgetown<br />
				Brampton<br />
				Caledon<br />
				Orangeville <br />
				East Garafaxa <br />
				Alton <br />
				Belfountain<br />
				Erin Hillsburgh<br />
			</td>
		</tr>
	</table>	
	<div class="clear30"></div>
	
	<h2>Terms And Conditions</h2>
	<p>
		1. <span class="bold">Terms:</span> Net on delivery unless previously arranged.<br />
		2. Orders are delivered to the office. Please have cheque ready.<br />
		3. Minimum order: $200.00 or 4 cases of cookies. (some areas may exceed 4 cases)<br />
		4. All goods offered are subject to availablity.<br />
		5. Prices subject to change with notice.<br />
	</p>

	* If your city is not listed, contact us to inquire about placing an order: <? safeEmail('office@terracottacookies.com'); ?> or 905.877.4216
	
	<div class="clear40"></div>

	<?	
}










// NEWSLETTER
elseif ($subPage == "newsletter")
{
	$newsletters = getInfo("newsletters", "", "", "date_posted", "DESC");
	$thumbnailsPath = 'a/newswletters/thumbnails/';
	$pdfsPath = 'a/newsletters/pdfs/';
	
	?>
	<h1 class="left">Schools Newsletter</h1>
	<a href="/email-club-sign-up/" class="redButtonLarge right twoLines" style="line-height:1em;"> 
		Sign Up For Our <br /> Newsletter
	</a>
	<div class="clear"></div>
	<div class="brownDividerLine"></div>
	
	<?
	if (!empty($newsletters))
	{
		foreach($newsletters AS $row)
		{
			$dateCreate = date_create($row['date_posted']);
			$datePosted = date_format($dateCreate, "F d, Y");
			?>
			<div class="article">
				<div class="image">
					<a href="/<? echo $pdfsPath.$row['pdf']; ?>" target="_blank">
						<?
						if ($row['thumbnail'] != "" && file_exists($thumbnailsPath.$row['thumbnail']))
						{
							?>
							<img src="/a/inc/timthumb.php?src=<? echo '/'.$thumbnailsPath.$row['thumbnail']; ?>&h=85&w=65&zc=1" class="thumbnails" />
							<?
						}
						else { ?> <img src="/a/inc/timthumb.php?src=/a/i/default02.jpg&h=85&w=65&zc=1" class="thumbnails"  /> <? }
						?>
					</a>
				</div>
				<div class="content">
					<div class="clear5"></div>
					<a href="/<? echo $pdfsPath.$row['pdf']; ?>" target="_blank">
						<span class="arial bold size24 brown"><? echo $row['newsletter_title']; ?></span>
					</a><br />
					<span class="size14 italic">Posted <? echo $datePosted; ?></span>
					<div class="clear10"></div>
					<a href="/<? echo $pdfsPath.$row['pdf']; ?>" target="_blank" class="redButtonSmall left">Download</a>
				</div>
				<div class="clear"></div>
			</div>
			<?
		}
	}
	?>
	
	<div class="clear40"></div>
	<?	
}









?>
	<a href="/a/pdfs/compliance.pdf" target="_blank"><img src="/a/i/site/products_footer.png" alt="Gluten Free Options Available | Peanut & Nut Free! | All Delite Cookies 100% Compliant" style="margin:0 0 0 -10px;" /></a>
	<div class="clear10"></div>
</div><?










?>

<? include('a/inc/footer.php'); ?>