<?

function getExtension($str)
{
	$getArray = explode('.', $str);
	$ext = end($getArray);
	return $ext;
	/*
	$dec = strrpos($str, ".");
	if (!$dec) {return "";}
	$len = strlen($str) - $dec;
	$ext = substr($str, $dec+1, $len);
	echo $ext;
	return $ext;
	*/
}









function random_name() {
	$rand_name = md5(time());
	$rand_name= rand(0,999999999);
	return $rand_name;
}










function resize_upload ($file, $dest, $maxw = 50, $maxh = 50, $grey = false, $wm = false, $mark = "a/i/watermark.png", $opa = 40) {
	
	$allowext = array("gif", "jpg", "png", "jpeg");		
	$fileext = strtolower(getExtension($file['name']));	
	/*
	if (!in_array($fileext,$allowext)) {
		echo $fileext;
		echo "Wrong file extension.";
		exit();
	}
	*/
	list($width, $height, $imgcon) = getimagesize($file['tmp_name']);	
	if ($file['size'] && ($width > $maxw || $height > $maxh)) {		
		if($file['type'] == "image/pjpeg" || $file['type'] == "image/jpeg"){$newimg = imagecreatefromjpeg($file['tmp_name']);}
		elseif($file['type'] == "image/x-png" || $file['type'] == "image/png"){$newimg = imagecreatefrompng($file['tmp_name']);}
		elseif($file['type'] == "image/gif"){$newimg = imagecreatefromgif($file['tmp_name']);}			
		$ratio = $width/$height;
		if ($ratio < 1) { // Width < Height
			$newheight = $maxh;
			$newwidth = $width * ($maxh/$height);
			if ($newwidth > $maxw) {
				$newheight = $newheight * ($maxw/$newwidth);
				$newwidth = $maxw;				
			}
		} elseif ($ratio == 1) { // Width = Height
			if ($maxw < $maxh) {
				$newheight = $maxw;
				$newwidth = $maxw;
			} elseif ($maxw == $maxh) {
				$newheight = $maxh;
				$newwidth = $maxw;
			} elseif ($maxw > $maxh) {
				$newheight = $maxh;
				$newwidth = $maxh;
			}
		} elseif ($ratio > 1) { // Width > Height			
			$newwidth = $maxw;
			$newheight = $height * ($maxw/$width);
			if ($newheight > $maxh) {
				$newwidth = $newwidth * ($maxh/$newheight);
				$newheight = $maxh;
			}
		}		
		if (function_exists(imagecreatetruecolor)) {$resize = imagecreatetruecolor($newwidth, $newheight);}				
		if (($imgcon == IMAGETYPE_GIF)) {
			$trnprt_indx = imagecolortransparent($newimg);
   		    if ($trnprt_indx >= 0) {
   				$trnprt_color = imagecolorsforindex($newimg, $trnprt_indx);
   				$trnprt_indx = imagecolorallocate($resize, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
   				imagefill($resize, 0, 0, $trnprt_indx);
   				imagecolortransparent($resize, $trnprt_indx);
   			}
   		} elseif ($imgcon == IMAGETYPE_PNG) {
 			imagealphablending($resize, false);
   			$color = imagecolorallocatealpha($resize, 0, 0, 0, 127);
   			imagefill($resize, 0, 0, $color);
			imagesavealpha($resize, true);
      	}
     	imagecopyresampled($resize, $newimg, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
		if ($wm) {			
			$watermark = imagecreatefrompng($mark);
			imagealphablending($resize, true);
			$wm_width = imagesx($watermark);
			$wm_height = imagesy($watermark);
			$destx = $newwidth - $wm_width - 5;
			$desty = $newheight - $wm_height - 5;
			imagecopymerge($resize, $watermark, $destx, $desty, 0, 0, $wm_width, $wm_height, $opa);
			imagedestroy($watermark);
		}
     	// $filename = random_name().".".$fileext;
     	$filename = safeFileName($file['name']);
		if ($grey) {imagefilter($resize, IMG_FILTER_GRAYSCALE);}
		if($file['type'] == "image/pjpeg" || $file['type'] == "image/jpeg"){$new = imagejpeg($resize, $dest."/".$filename, 100);}
		elseif($file['type'] == "image/x-png" || $file['type'] == "image/png"){$new = imagepng($resize, $dest."/".$filename, 0);}
		elseif($file['type'] == "image/gif"){$new = imagegif($resize, $dest."/".$filename);}		
		imagedestroy($resize);
		imagedestroy($newimg);		
		return $filename;
	} elseif ($file['size']) {
		//$filename = random_name().".".getExtension($file['name']);
		$filename = safeFileName($file['name']);
		if ($grey || $wm) {
			if($file['type'] == "image/pjpeg" || $file['type'] == "image/jpeg"){$newimg = imagecreatefromjpeg($file['tmp_name']);}
			elseif($file['type'] == "image/x-png" || $file['type'] == "image/png"){$newimg = imagecreatefrompng($file['tmp_name']);}
			elseif($file['type'] == "image/gif"){$newimg = imagecreatefromgif($file['tmp_name']);}
			$width = imagesx($newimg);
			$height = imagesy($newimg);
			if ($wm) {			
				$watermark = imagecreatefrompng($mark);
				imagealphablending($newimg, true);
				$wm_width = imagesx($watermark);
				$wm_height = imagesy($watermark);
				$destx = $width - $wm_width - 5;
				$desty = $height - $wm_height - 5;
				imagecopymerge($newimg, $watermark, $destx, $desty, 0, 0, $wm_width, $wm_height, $opa);
				imagedestroy($watermark);
			}
			if ($grey) {imagefilter($newimg, IMG_FILTER_GRAYSCALE);}
			if($file['type'] == "image/pjpeg" || $file['type'] == "image/jpeg"){imagejpeg($newimg, $dest."/".$filename);}
			elseif($file['type'] == "image/x-png" || $file['type'] == "image/png"){imagepng($newimg, $dest."/".$filename);}
			elseif($file['type'] == "image/gif"){imagegif($newimg, $dest."/".$filename);}
			imagedestroy($newimg);
			return $filename;
		} else {
			$upload = file_upload($file, $dest);
			return $upload;
		}
	}
}
//	Description:	Function to resize an uploaded image, and convert to grayscale if specified, returning the new file name
//	Parameters:		$file	-	Expects an array containing the $_FILES['image'] variable associated with your file upload control
//					$dest	-	Expects a string value containing the directory path to upload the file to
//					$maxw	-	OPTIONAL. Expects an integer value containing the maximum width (in pixels) that the new image can be. Defaults to 50px. 
//								Note that the image may be resized smaller to preserve aspect ratio
//					$maxh	-	OPTIONAL. Expects an integer value containing the maximum height (in pixels) that the new image can be. Defaults to 50px.
//								Note that the image may be resized smaller to preserve aspect ratio
//					$grey	-	OPTIONAL. Boolean value indicating whether or not you wish to conver the image to grayscale. True converts the image to 
//								black and white, false preserves the original colours. Defaults to false.
//					$wm		-	OPTIONAL. Boolean value indicating whether or not the image should be watermarked. True watermarks the image, 
//								false suppresses watermarking. Defaults to false.
//					$mark	-	OPTIONAL. String value containing the path to the image to use for watermarking. Should resolve to an 8-bit .PNG
//								file for best results. Defaults to 'a/i/watermark.png'
//					$opa	-	OPTIONAL. Integer value containing the percentage opacity to apply to the watermark. Defaults to 40% opacity 
//								(60% transparency)
//	Returns:		String value containing the filename of the newly resized image.

/*
function resize_upload ($ft, $fn, $fs, $fm, $maxw, $maxh, $dest, $grey) {
	$allowext = array("gif", "jpg", "png", "jpeg", "bmp");	
	 if (!is_uploaded_file($fm)) {
		echo "Error: Please select a file to upload!";
		exit();
	} 
	$fileext = strtolower(getExtension($fn));
	if (!in_array($fileext,$allowext)) {
		echo "Wrong file extension.";
		exit();
	}
	list($width, $height, $imgcon) = getimagesize($fm);
	if ($fs && ($width > $maxw || $height > $maxh)) {
		if($ft == "image/pjpeg" || $ft == "image/jpeg"){$newimg = imagecreatefromjpeg($fm);}
		elseif($ft == "image/x-png" || $ft == "image/png"){$newimg = imagecreatefrompng($fm);}
		elseif($ft == "image/gif"){$newimg = imagecreatefromgif($fm);}		
		$ratio = $width/$height;
		if ($ratio < 1) { // Width < Height
			$newheight = $maxh;
			$newwidth = $width * ($maxh/$height);
			if ($newwidth > $maxw) {
				$newheight = $newheight * ($maxw/$newwidth);
				$newwidth = $maxw;				
			}
		}
		elseif ($ratio == 1) { // Width = Height
			if ($maxw < $maxh) {
				$newheight = $maxw;
				$newwidth = $maxw;
			}
			elseif ($maxw == $maxh) {
				$newheight = $maxh;
				$newwidth = $maxw;
			}
			elseif ($maxw > $maxh) {
				$newheight = $maxh;
				$newwidth = $maxh;
			}
		}
		elseif ($ratio > 1) { // Width > Height			
			$newwidth = $maxw;
			$newheight = $height * ($maxw/$width);
			if ($newheight > $maxh) {
				$newwidth = $newwidth * ($maxh/$newheight);
				$newheight = $maxh;
			}
		}		
		if (function_exists(imagecreatetruecolor)) {$resize = imagecreatetruecolor($newwidth, $newheight);}
		if (($imgcon == IMAGETYPE_GIF)) {
			$trnprt_indx = imagecolortransparent($newimg);
   		    if ($trnprt_indx >= 0) {
   				$trnprt_color = imagecolorsforindex($newimg, $trnprt_indx);
   				$trnprt_indx = imagecolorallocate($resize, $trnprt_color['red'], $trnprt_color['green'], $trnprt_color['blue']);
   				imagefill($resize, 0, 0, $trnprt_indx);
   				imagecolortransparent($resize, $trnprt_indx);
   			}
   		} 
		elseif ($imgcon == IMAGETYPE_PNG) {
 			imagealphablending($resize, false);
   			$color = imagecolorallocatealpha($resize, 0, 0, 0, 127);
   			imagefill($resize, 0, 0, $color);
			imagesavealpha($resize, true);
      	}
     	imagecopyresampled($resize, $newimg, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
     	$file = random_name().".".$fileext;
		if ($grey) {imagefilter($resize, IMG_FILTER_GRAYSCALE);}
		if($ft == "image/pjpeg" || $ft == "image/jpeg"){imagejpeg($resize, $dest."/".$file, 100);}
		elseif($ft == "image/x-png" || $ft == "image/png"){imagepng($resize, $dest."/".$file, 0);}
		elseif($ft == "image/gif"){imagegif($resize, $dest."/".$file);}
		imagedestroy($resize);
		imagedestroy($newimg);
		return $file;
	}
	elseif ($fs) {
		$file = random_name().".".getExtension($fn);
		if ($grey) {
			if($ft == "image/pjpeg" || $ft == "image/jpeg"){$newimg = imagecreatefromjpeg($fm);}
			elseif($ft == "image/x-png" || $ft == "image/png"){$newimg = imagecreatefrompng($fm);}
			elseif($ft == "image/gif"){$newimg = imagecreatefromgif($fm);}
			imagefilter($newimg, IMG_FILTER_GRAYSCALE);
			if($ft == "image/pjpeg" || $ft == "image/jpeg"){imagejpeg($newimg, $dest."/".$file);}
			elseif($ft == "image/x-png" || $ft == "image/png"){imagepng($newimg, $dest."/".$file);}
			elseif($ft == "image/gif"){imagegif($newimg, $dest."/".$file);}
			imagedestroy($newimg);
			return $file;
		}
		else {
			$upload = file_upload($fn, $fm, $dest);
			return $upload;
		}
	}
}
*/







function file_upload ($file, $dest) {
	// $filename = random_name().".".getExtension($file['name']);
	$filename = safeFileName($file['name']);
	copy($file['tmp_name'], $dest."/".$filename);
	return $filename;
}
/*
function file_upload ($p_fn, $p_fm, $p_dest) {
	$file = random_name().".".getExtension($p_fn);
	copy($p_fm, $p_dest."/".$file);
	return $file;
}
*/