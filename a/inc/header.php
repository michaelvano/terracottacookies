<?
include($_SERVER['DOCUMENT_ROOT'].'/a/inc/header_base.php'); 

?>

<div id="container" <? if ($page != "cart" && $page != "checkout") {echo 'class="contentBG"'; } else {echo 'class="noLeftBG"';} ?>>
	
	
	<div id="header">
		<div class="container">
			
			<a href="/">
				<?
				if ($page == "schools") {echo '<img src="/a/i/site/logo_alternate.png" class="left" alt="Terra Cotta Cookie Company" />';}
				else {echo '<img src="/a/i/site/logo.png" class="left" alt="Terra Cotta Cookie Company" />';}
				?>
			</a>
			
			<div class="contactSocial">
				<div class="phone textCenter">
					<div class="clear10"></div>
					<span class="size18 dancing bold red">Call Us Toll Free</span><br />					
					<span class="garamond size24 darkGrey">1-800-561-8833</span>
				</div>
				<div class="clear10"></div>
				<div class="socialIcons">
					<a href="https://www.facebook.com/TCCookieCo" target="_blank"><img src="/a/i/site/icon_social-media_facebook.png" alt="Like Us On Facebook" /></a>
					<a href="https://twitter.com/TCCookieCo" target="_blank"><img src="/a/i/site/icon_social-media_twitter.png" alt="Follow Us On Twitter" /></a>
					<a href="/blog/"><img src="/a/i/site/icon_blog.png" alt="Follow Our Blog" /></a>
				</div>
			</div>
			
			<?
			if ($isAdmin) 
			{
				?>
				<div class="right" style="margin:0 20px 0 0; color:#4c2d22;">
					<div class="clear10"></div>
					Welcome <? echo $_SESSION['name']; ?> |
					<a href="/admin/">Admin Dashboard</a> |
					<!-- <a href="/password/reset/">Reset Password</a> | -->
					<a href="/admin/logout.php">Logout</a>
				</div>
				<?
			}
			elseif ($isUser)
			{
				?>
				<div class="right" style="margin:0 20px 0 0; color:#4c2d22;">
					<div class="clear10"></div>
					Welcome <? echo $_SESSION['name']; ?> |
					<a href="/my-account.php">My Account</a> |					
					<a href="/logout.php">Logout</a>
				</div>
				<?
			}
			else 
			{
				?>
				<div class="right" style="margin:0 20px 0 0; color:#4c2d22;">
					<div class="clear10"></div>
					<a href="/login.php">Login</a> |
					<a href="/shopping_register-user.php">Register</a>
				</div>
				<?
			}
			?>
		</div>
	</div> <!-- HEADER!! -->
	
	
	
	
	<div id="nav">
		<div class="container">
			<? include($_SERVER['DOCUMENT_ROOT'].'/a/inc/nav.php'); ?>
		</div>
	</div> <!-- NAV -->
	
	
	
	
	<div id="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs">
				&nbsp;&nbsp;
				<a href="/"><img src="/a/i/site/icon_home.png" /></a>
				<?
				if ($breadcrumbMain != "")
				{
					?>
					<img src="/a/i/site/icon_breadcrumbs-divider.png" class="divider" />
					<a href="<? echo $mainLink; ?>"><? echo $breadcrumbMain; ?></a>
					<?
					
				}
				if ($breadcrumbSub != "")
				{
					?>
					<img src="/a/i/site/icon_breadcrumbs-divider.png" class="divider" />
					<a href="<? echo $subLink; ?>"><? echo $breadcrumbSub; ?></a>
					<?
					
				}
				if ($breadcrumbTer != "")
				{
					?>
					<img src="/a/i/site/icon_breadcrumbs-divider.png" class="divider" />
					<a href="<? echo $subLink; ?>"><? echo $breadcrumbSub; ?></a>
					<?
					
				}
				?>
			</div>
			<?
			
			if ($page == "schools" || $page == "cart" || $page == "checkout") 
			{
				?>
				<div class="right"><a href="/shopping-cart.php"><img src="/a/i/site/icon_shopping-cart.png" class="vMiddle" style="margin:-2px 5px 0 0;" />Shopping Cart</a></div>
				<?
			}
			?>
			
		</div>
	</div>
 

	<div id="content">
		<div class="container">	