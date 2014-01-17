<?
require_once('a/inc/bootstrap.php');

$certifications = getInfo("certification", "", "", "date", "DESC");


// META DESCRIPTIONS
$title = "Certifications";
$mbots = "INDEX, FOLLOW";
$page = "certification";
$breadcrumbMain = "Certification";
$mainLink = "/certifications/";
$subPage = "certification";
$canon = "";

include('a/inc/header.php');


// ABOUT US SUB NAV



?>
<div id="subNav">
	<a href="/certifications/" class="active">Certifications</a>
</div>
<div class="mainContent">
	
	<h1>Certifications</h1>
	<div class="brownDividerLine"></div>
	<?		
	if (!empty($certifications))
	{
		$file_path = 'a/certifications/files/';
		$image_path = 'a/certifications/thumbnails/';
	
		if (!empty($certifications))
		{
			foreach($certifications AS $a)
			{
				$dateCreate = date_create($a['date']);
				$datePosted = date_format($dateCreate, "F d, Y");
				?>
				<div class="article">
					<div class="image">
						<a href="/<?= $file_path.$a['pdf']; ?>" target="_blank">
							<?
							if ($a['image'] != "" && file_exists($image_path.$a['image']))
							{
								?>
								<img src="/a/inc/timthumb.php?src=/<?= $image_path.$a['image']; ?>&h=82&w=62&zc=1" class="thumbnails" />
								<?
							}
							else { ?> <img src="/a/inc/timthumb.php?src=/a/i/default02.jpg&h=82&w=62&zc=1" class="thumbnails"  /> <? }
							?>
						</a>
					</div>
					<div class="content">
						<div class="clear5"></div>
						<a href="/<? echo $file_path.$a['pdf']; ?>" target="_blank">
							<span class="arial bold size22 brown"><? echo stripslashes($a['name']); ?></span>
						</a><br />
						<span class="size14 italic">Posted <? echo $datePosted; ?></span>
						<div class="clear10"></div>
						<a href="/<? echo $file_path.$a['pdf']; ?>" target="_blank" class="redButtonSmall left">Download</a>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="brownDividerLine"></div>
				
				<?
			}
		}
	}
	?>
	<div class="clear40"></div>
</div><?










?>

<? include('a/inc/footer.php'); ?>