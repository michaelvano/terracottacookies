<?

/* =================================================================
- Nobul Media
- includes/functions/database.php
- Version 1.0 - 2012-05-07
- Functions used in the login process and passwords 
====================================================================*/









// HASHES THE TEXT GIVEN TO THE FUNCTION
function createHash($inText, $saltHash, $mode='sha1'){ 
    // hash the text // 
    $textHash = hash($mode, $inText); 
	// set where salt will appear in hash // 
	$saltStart = strlen($inText); 
	// if no salt given create random one // 
	if($saltHash == NULL) {$saltHash = hash($mode, uniqid(rand(), true));} 
	// add salt into text hash at pass length position and hash it // 
	if($saltStart > 0 && $saltStart < strlen($saltHash)) { 
		$textHashStart = substr($textHash,0,$saltStart); 
		$textHashEnd = substr($textHash,$saltStart,strlen($saltHash)); 
		$outHash = hash($mode, $textHashEnd.$saltHash.$textHashStart); 
	} elseif($saltStart > (strlen($saltHash)-1)) {$outHash = hash($mode, $textHash.$saltHash);} 
	else {$outHash = hash($mode, $saltHash.$textHash);} 
	// put salt at front of hash // 
	$output = $saltHash.$outHash; 
	return $output; 
}








function login($username="", $password="", $page="") {
	
	if ($username == "") {return 1;}
	if ($password == "") {return 2;} 
	
	$salthash = hash('sha1', 'apple83792');
	$hashPassword = createHash($password, $salthash, $mode='sha1');
	$query = "SELECT * FROM `users` WHERE `email`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($hashPassword)."'";
	$tryLogin = mysql_query($query);
	
	if (mysql_num_rows($tryLogin) == 0) {
		$checkEmailExist = mysql_query("SELECT * FROM `users` WHERE `email`='".$username."'");
		if (mysql_num_rows($checkEmailExist) == 0) {return 3;}
		elseif (mysql_num_rows($checkEmailExist) == 1) {return 4;}
		
	} else {
		
		mysql_query("UPDATE `users` SET `ip_address`='".$_SERVER['REMOTE_ADDR']."' WHERE `email`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($hashPassword)."'");
		
		$info = mysql_fetch_assoc($tryLogin);
		$_SESSION['name']				= $info['firstName'].' '.$info['lastName'];
		$_SESSION['company']			= $info['company'];
		$_SESSION['email']				= $info['email'];
		$_SESSION['ID']					= $info['id'];		
		$_SESSION['permissionLevel']	= $info['permissionLevel'];
		$_SESSION['CKFinder_UserRole']	= 'admin';
		$_SESSION['resetPassword']		= $info['resetPassword'];
		
		if ($info['resetPassword'] != "") { echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/password/reset/">'; exit;	}
		elseif ($_SESSION['permissionLevel'] >= 9) { echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/">'; exit; }
		
	}
	
}
?>