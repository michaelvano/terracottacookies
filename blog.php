<?
require_once('a/inc/bootstrap.php');

$_limit = 6;
if (isset($_GET['_page'])) {$_page = ($_GET['_page']-1); }
$_start = ($_page * $_limit);

$isPost = false;









/* =======================
	GETS POST INFO
=========================*/
if (isset($_GET['_post']))
{
	$isPost = true;
	$_post = $_GET['_post'];
	
	$checkPost = mysql_query("SELECT * FROM `posts` WHERE `seo`='".$_post."'");
	
	if (mysql_num_rows($checkPost) == 0) {
		//$doesNotExist = true;
		header("Status: 404 Not Found", true, 404);
		include('404.php');
		exit();
	}
	else 
	{
		$postInfo = mysql_fetch_assoc($checkPost);
		$dateCreate = date_create($postInfo['date_posted']);
		$postDate = date_format($dateCreate, "F d,Y");
		$postImage = $postInfo['image'];
		$postTitle = stripslashes($postInfo['title']);
		$postID = $postInfo['id'];
		$postSeo = $postInfo['seo'];
		$postContent = stripslashes($postInfo['content']);
		
		$getAuthor = getInfo("users", "id" ,$postInfo['author']);
		$author = $getAuthor[0];
		
		// GET FIRST AND LAST IDS IN THE POSTS
		$getFirstID = mysql_query("SELECT `id` FROM `posts` ORDER BY `id` ASC LIMIT 0,1");
		$firstId = mysql_fetch_assoc($getFirstID);
		$firstID = $firstId['id'];
		
		$getLastID = mysql_query("SELECT `id` FROM `posts` ORDER BY `id` DESC LIMIT 0,1");
		$lastId = mysql_fetch_assoc($getLastID);
		$lastID = $lastId['id'];
		
		// GET THE PREV SEO LINK
		if ($postID != $firstID)
		{	
			$prevID = $postID;
			$noPrevID = true;			
			while ($noPrevID)
			{
				$prevID--;
				$checkForPrevPost = getInfo("posts", "id", $prevID);
				if (!empty($checkForPrevPost)) {$noPrevID = false;}
			}
			
			$prevPostInfo = $checkForPrevPost[0];
			$prevSeo = $prevPostInfo['seo'];
		}
		
		// GET THE NEXT SEO LINK
		if ($postID != $lastID)
		{	
			$nextID = $postID;
			$noNextID = true;			
			while ($noNextID)
			{
				$nextID++;
				$checkForNextPost = getInfo("posts", "id", $nextID);
				if (!empty($checkForNextPost)) {$noNextID = false;}
			}
			
			$nextPostInfo = $checkForNextPost[0];
			$nextSeo = $nextPostInfo['seo'];
		}
		
		$title = $postTitle;
		$desc = substr(trim(str_replace("&nbsp;", "", stripslashes(strip_tags($postContent)))), 0, 170);
		$canon = thisPageUrl();
		$thisPage = "/blog/".$_post.'/';
		
	}	
}









/* =======================
	GETS LATEST BLOG POSTS
=========================*/
else 
{
	$getTotal = getInfo("posts");
	$total = count($getTotal);
	$numberOfPages = ceil($total/$_limit);
	
	$posts = getInfo("posts", "", "", "id", "DESC", $_start, $_limit);	
	$title = "Terra Cotta Cookie Company Blog";
	$desc = "";
	if (isset($_page) && $_page != 0) {$title .= " - Page ".($_page+1);}
	$thisPage = "/blog/";
	if ($_page == 0) {$canon = thisPageUrl();}
}









// META DESCRIPTIONS
$mdesc = "";	
$mbots = "INDEX, FOLLOW";
$page = "about";
$subPage = "blog";
$breadcrumbMain = "About Us";
$breadcrumbSub = "Blog";
$mainLink = "/blog/";


require('a/inc/header.php');










// ABOUT US SUB NAV
?>
<div id="subNav">
	<a href="/about-us/our-story/">Our Story</a>
	<a href="/about-us/our-team/">Our Team</a>
	<a href="/about-us/work-with-us/">Our Work With Us</a>
	<a href="/blog/" class="<? checkPage($subPage, "blog"); ?>">Our Blog</a>
	<a href="/about-us/media-and-testimonials/">Media & Testimonials</a>
	<a href="/about-us/request-information/">Request Information</a>
	
	<div class="heading">Most Recent Posts</div>
	<? showRecentPosts(); ?>
		
	<div class="heading">Connect With Us</div>
	<div class="dropdown">
		<a href="https://www.facebook.com/TCCookieCo" target="_blank">
			<img src="/a/i/site/icon_social-media_facebook.png" class="vMiddle" />
			<span class="size14">LIKE US ON FACEBOOK</span>
		</a>
		<a href="https://twitter.com/TCCookieCo" target="_blank">
			<img src="/a/i/site/icon_social-media_twitter.png" class="vMiddle" />
			<span class="size14">FOLLOW US ON TWITTER</span>
		</a>
		<a href="/blog/" class="size12">
			<img src="/a/i/site/icon_blog.png" class="vMiddle" />
			<span class="size14">RSS</span>
		</a>
	</div>
	<div class="clear"></div>
</div>
<?









?>
<div class="mainContent">

	<h1 class="left">Blog</h1>
	
	<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
	<script type="text/javascript">stLight.options({publisher: "bc803272-7b06-4b0f-98cc-d8a7bdab6c01"});</script>
	
	<div class="right socialMedia">
		<span class='st_facebook_hcount' displayText='Facebook'></span>
		<span class='st_googleplus_hcount' displayText='Google +'></span>
		<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
		<span class='st_twitter_hcount' displayText='Tweet'></span>
	</div>
	
	<div class="clear"></div>
	
	<div class="brownDividerLine"></div>

	<div id="blog">

		<div class="left">
			
			<?
			/* =======================
				SHOWS THE POST
			=========================*/
			if ($isPost) 
			{
				
				?>
				<div id="post">
					<div class="bold size24 brown"><? echo $postTitle; ?></div>
					<div class="clear5"></div>
					<span class="arial size14 italic">Posted on <? echo $postDate; ?></span>
					<div class="clear"></div>
					<? if ($postImage != "" && file_exists('a/i/blog/'.$postImage)) {echo '<img src="/a/i/blog/'.$postImage.'" alt="'.$postTitle.'" class="right" style="margin:0 0 20px 20px; max-width:274px; max-height:368px;" />';} ?>
					<? echo $postContent; ?>
					<div class="clear40"></div>
					<div class="fb-comments" data-href="<? echo thisPageUrl(); ?>" data-num-posts="10" data-width="690"></div>
				</div>
				<div class="brownDividerLine"></div>
				<? if ($postID != $firstID && $prevSeo != "") { echo '<a href="/blog/'.$prevSeo.'/" class="prev left">Prev</a>';} ?>
				<? if ($postID != $lastID && $nextSeo != "") { echo '<a href="/blog/'.$nextSeo.'/" class="next right">Next</a>';} ?>
				<?
			}
			
			
			
			
			
			
			
			
			
			/* =======================
				SHOWS LATEST POSTS
			=========================*/
			else { showPosts($posts); }
			?>
			
			
			
			
			
			
			
			
			<div class="clear40"></div>
			<? if ($numberOfPages > 1) { showPageNumbers($_page, $numberOfPages, $thisPage); } ?>
			<div class="clear20"></div>
			
		</div>

	</div>
	
</div>




<? include('a/inc/footer.php'); ?>