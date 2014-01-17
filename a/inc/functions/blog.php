<?

/* ===========================
	SHOWS THE MOST RECENT POST ON THE HOME PAGE
===========================*/
function showLatestPost() 
{
	$getLatestPost = getInfo("posts", "", "", "date_posted", "DESC", 0, 1);
	$post = $getLatestPost[0];
	/*
	$getAuthor = getInfo("users", "id" ,$post['author']);
	$author = $getAuthor[0];
	*/
	
	$createDate = date_create($post['date_posted']);
	$datePosted = date_format($createDate, "F d, Y ");
	?>
	<div class="latest">
		<span class="size16 oswald uppercase">
			<a href="/blog/<? echo $post['seo']; ?>">
				<? echo stripslashes($post['title']); ?>
			</a>
		</span>
		<div class="clear5"></div>
		Posted by <? echo stripslashes($author['firstName']).' '.stripslashes($author['lastName']); ?> on <? echo $datePosted; ?><br />
		<div class="image">
			<a href="/blog/<? echo $post['seo']; ?>">
				<?
				if ($post['image'] != "" && file_exists('/a/i/blog/'.$post['image'])) { echo '<img src="/a/inc/timthumb.php?src=/a/i/blog/'.$post['image'].'&h=110&w=322&zc=1" alt="" class="dropBorder" />'; }
				else { echo '<img src="/a/inc/timthumb.php?src=/a/i/default.png&h=110&w=322&zc=1" alt="" class="dropBorder" />'; }
				?>
			</a>
		</div>
		<div class="text">
			<? echo substr(trim(stripslashes(strip_tags($post['content']))), 0, 188); if (strlen(trim(stripslashes(strip_tags($post['content'])))) >= 188) {echo '...';} ?>
			<a href="/blog/<? echo $post['seo']; ?>" class="bold blue">Read More</a>
		</div>
	</div>
	<div class="clear"></div>
	<div class="greyDividerLine"></div>
	<?
}









/* ===========================
	SHOW RECENT POSTS
===========================*/
function showRecentPosts()
{
	$recentPosts = getInfo("posts", "", "", "id", "DESC", 0, 5);
	
	if (empty($recentPosts)) {echo 'There are no posts to be shown';}
	else 
	{
		echo '<div class="recentPosts">';
		$i=1;
		foreach ($recentPosts AS $row)
		{
			$dateCreate = date_create($row['post_date']);
			$datePosted = date_format($dateCreate, "F d, Y");
			?>
			<a href="/blog/<? echo $row['seo']; ?>" <? if ($i == 5) {echo 'class="last"';} ?>>
				<? echo substr(justText($row['title']), 0, 22); if (strlen(justText($row['title'])) >= 22) {echo '...';} ?><br />
				<span class="size14"><? echo $datePosted; ?></span>
			</a>
			<?
			$i++;
		}
		echo '</div>';
	}	
}








/* ===========================
	SHOW ARCHIVED POSTS
===========================*/
function showArchivedPosts()
{
	$archived = getInfo("posts");
	$archived = array_filter($archived);
	$total = count($archived);
	$limit = ($total-1);
	
	if ($total > 5) {$showAmount = 5;}
	else {$showAmount = $total;}
	
	$numbersUsed = array();
	$x = rand(0, $limit);
	
	if (empty($archived)) {echo 'There are no posts to be shown';}
	else 
	{
		echo '<ul class="recentPosts size14">';
		for ($i=0; $i<$showAmount; $i++) {
			array_push($numbersUsed, $x);
			?>
			<li>
				<a href="/blog/<? echo $archived[$x]['seo']; ?>" class="size14">
					<? echo substr(justText($archived[$x]['title']), 0, 24); if (strlen(justText($archived[$x]['title'])) >= 24) {echo '...';} ?>
				</a>
			</li>
			<?
			if ($limit != 0) {	
				if (($i+1) != $showAmount) { while(in_array($x, $numbersUsed)) { $x = rand(0, $limit); } }
			}
		}
		echo '</ul>';
		echo '<div class="clear40"></div>';
	}	
}







/* ===========================
	SHOWS THE POSTS THAT HAVE BEEN GIVEN
===========================*/
function showPosts($posts="") 
{
	if (!empty($posts)) 
	{
		$total = count($posts);
		$i = 1;
		foreach($posts AS $row)
		{
			$getAuthor = getInfo("users", "id" ,$row['author']);
			$author = $getAuthor[0];
			$createDate = date_create($row['date_posted']);
			$datePosted = date_format($createDate, "F d, Y");
			?>
			<div class="post">
				<div class="image">
					<a href="/blog/<? echo $row['seo']; ?>">
						<?
						if ($row['image'] != "" && file_exists('a/i/blog/'.$row['image'])) { echo '<img src="/a/inc/timthumb.php?src=/a/i/blog/'.$row['image'].'&h=150&w=200&zc=1" alt="" />'; }
						else { echo '<img src="/a/inc/timthumb.php?src=/a/i/default.png&h=150&w=200&zc=1" alt="" />'; }
						?>
					</a>
				</div>
				<div class="text">
					<a href="/blog/<? echo $row['seo']; ?>/"><span class="size24 bold brown capitalize"><? echo stripslashes($row['title']); ?></span></a>
					<div class="clear"></div>
					<span class="italic">Posted on <? echo $datePosted; ?></span>
					<p class="siz14"><? echo substr(trim(str_replace("&nbsp;", "", stripslashes(strip_tags($row['content'])))), 0, 193); if (strlen(trim(str_replace("&nbsp;", "", stripslashes(strip_tags($row['content']))))) >= 193) {echo '...';} ?></p>
					<div class="clear"></div>
					<a href="/blog/<? echo $row['seo']; ?>/" class="redButtonSmall styledButton left">Read Article<div class="arrow"></div></a>
				</div>
				<div class="clear"></div>
			</div>
			<?
			if ($i != $total) {echo '<div class="brownDividerLine"></div>';}
			$i++;
		}
	} else {echo 'There are currently no posts here';}
}








?>