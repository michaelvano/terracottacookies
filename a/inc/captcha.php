<?php 
session_start();
	
header("Content-Type: image/png");
//$text = rand(1000000,9999999); 


$text = "";
$length = 7;
$possible = "12346789BCDFGHJKLMNPQRTVWXYZ";
$maxlength = strlen($possible);
if ($length > $maxlength) { $length = $maxlength; }
$i = 0;
while ($i < $length)
{ 
	$char = substr($possible, mt_rand(0, $maxlength-1), 1);
	if (!strstr($password, $char))
	{ 
		$text .= $char;
		$i++;
	}
}



$_SESSION["vercode"] = $text; 

$height = 32; 
$width = 83;	
$image_p = imagecreate($width, $height); 

$bg = imagecolorallocate($image_p, 56, 33, 25); 
$text_color = imagecolorallocate($image_p, 255, 255, 255);

$font_size = 14;  
imagestring($image_p, $font_size, 10, 8, $text, $text_color); 
imagepng($image_p);
?>

