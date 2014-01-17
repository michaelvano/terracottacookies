<?

function validLength($p_text, $p_min = 1, $p_max = 10){
	$isValid = true;
	$len = strlen($p_text);
	if ($len <= 0 || $len < $p_min || $len > $p_max) {
		$isValid = false;
	}
	return $isValid;
}
//	Description:	Procedure to validate that inputs are not left blank
//	Parameters:		$p_text	-	Expects a string value to be validated for length
//					$p_min	-	OPTIONAL. Expects an integer value containing the minimum length of the string. Default is 1.
//					$p_max	-	OPTIONAL. Expects an integer value containing the maximum length of the string. Default is 10.
//	Returns:		Boolean value indicating whether input field is valid. True indicates a non-zero length, False indicates an empty field.

function validEmail($p_email){
	$isValid = true;
	$atIndex = strrpos($p_email, "@");
	if (is_bool($atIndex) && !$atIndex){$isValid = false;}
	else{
		$domain = substr($p_email, $atIndex+1);
		$local = substr($p_email, 0, $atIndex);
		$localLen = strlen($local);
		$domainLen = strlen($domain);
		if ($localLen < 1 || $localLen > 64){$isValid = false;}
		else if ($domainLen < 1 || $domainLen > 255){$isValid = false;}
		else if ($local[0] == '.' || $local[$localLen-1] == '.'){$isValid = false;}
		else if (preg_match('/\\.\\./', $local)){$isValid = false;}
		else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain)){$isValid = false;}
		else if (preg_match('/\\.\\./', $domain)){$isValid = false;}
		else if (!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local))){
			if (!preg_match('/^"(\\\\"|[^"])+"$/', str_replace("\\\\","",$local))){
				$isValid = false;
			}
		}
		if ($isValid && !(checkdnsrr($domain,"MX") || !checkdnsrr($domain,"A"))) {$isValid = false;}
	}
	return $isValid;
}
//	Description:	Procedure to validate that sumbitted email address complies to IETF specs, and that
//					address domain is valid and responding to lookups.
//	Parameters:		$p_email - Expects a string value containing the email address to be validated.
//	Returns:		Boolean value indicating whether input email is valid. True indicates a good address,
//					false indicates a bad address.

function validLocale($name) {return preg_match("/^([A-Z'\\-]{1}[a-z'\\-]+)+(\\s{1}[A-Z'\\-]{1}[a-z'\\-]+)?$/", $name);}
//	Description:	Function to validate a typed locale name (ex. City Name, County Name)
//	Parameters:		$name	-	Expects a string value containing the locale to be validated
//	Returns:		Boolean value indicating whether input locale is valid. True indicates a valid locale, false indicates a invalid one.

function validAddress ($addy) {
	if (preg_match("/^([A-z]|[0-9])+\\s{1}([A-z]|[0-9])+/",$addy)) {return true;}
	else {return false;}
}
//	Description:	Function to validate that submitted address info is in a valid format
//	Parameters:		$addy	-	Expects a string value containing the address line to be validated
//	Returns:		Boolean value indicating whether input address line is valid. True indicates a good address, false indicates a bad one.

function validPostal ($code) {
	if (preg_match("/^([a-ceghj-npr-tv-z]){1}[0-9]{1}[a-ceghj-npr-tv-z]{1}(\\s)?[0-9]{1}[a-ceghj-npr-tv-z]{1}[0-9]{1}$/i",$code)) {return true;}
	elseif (preg_match("/^([0-9]{5})(-[0-9]{4})?$/i", $code)) {return true;}
	else {return false;}
}
//	Description:	Function to validate that submitted postal code is in proper Canadian format
//	Parameters:		$code	-	Expects a string value containing the postal code to be validated.
//	Returns:		Boolean value indicating whether input postal code is valid. True inidcates a good postal code,
//					false indicates an invalid entry.

function validFirstName ($name) {
	if (preg_match("/^[A-Z]{1}[a-z]*$/", $name)) {return true;}
	else {return false;}
}
//	Description:	Function to validate that first name submitted has proper capitalization
//	Parameters:		$name	-	Expects a string value containing the name to be validated.
//	Returns:		Boolen value indicating whether input name is valid. True indicates a valid name, False indicates the name is not in the 
//					proper format

function validLastName ($name) {
	if (preg_match("/^[A-Z]{1}[a-z]*(\s|-|\.|\\\\|\/)?[A-Z]?[a-z]*$/", $name)) {return true;}
	else {return false;}
}
//	Description:	Function to validate that last name submitted has proper capitalization
//	Parameters:		$name	-	Expects a string value containing the name to be validated.
//	Returns:		Boolen value indicating whether input name is valid. True indicates a valid name, False indicates the name is not in the 
//					proper format

function validFullName ($name) {
	if (preg_match("/^[A-Z]{1}[a-z]*\s{1}[A-Z]{1}[a-z]*(\s|-|\.|\\\\|\/)?[A-Z]?[a-z]*$/", $name)) {return true;}
	else {return false;}
}
//	Description:	Function to validate that name submitted is first and last, with proper capitalization
//	Parameters:		$name	-	Expects a string value containing the name to be validated.
//	Returns:		Boolen value indicating whether input name is valid. True indicates a valid name, False indicates the name is not in the 
//					proper format

function validPhone ($phone) {	
	if (preg_match("/^\(?[0-9]{3}\)?(\s|\.|-)?[0-9]{3}(\s|\.|-)?[0-9]{4}(\\s{1}(x|ext{\\.}?)?\\s?[0-9]+)?$/", $phone)) {return true;}
	else {return false;}
}
//	Description:	Function to validate that phone number submitted fits the desired format
//	Paramters:		$phone	-	Expects a string value containing the phone number to be validated.
//	Returns:		Boolean value indicating whether the input number is valid. True indicates it is in the proper format, false indicates that
//					the number deviates from the format.

function validDate($date) {
	if (preg_match("/^\\d{2}\\/\\d{2}\\/\\d{4}$/", $date)) {return true;}
	else {return false;}
}
//	Description:	Function to validate that date submitted fits the desired format (ie mm/dd/yyyy)
//	Parameters:		$date	-	Expects a date value containing the phone number to be validated.
//	Returns:		Boolean value indicating whether the input date is valid. True indicates it is in the proper format, false indicates that
//					the date deviates from the format

function validCreditCard($cardno) {
	if (preg_match("/^[0-9]{4}\\s?[0-9]{4}\\s?[0-9]{4}\\s?[0-9]{4}$/", $cardno)) {return true;}
	else {return false;}
}
//	Description:	Function to validate that credit card submitted contains 16 digits, with our without spaces between
//	Parameters:		$cardno	-	Expects a string value containing the credit card number to be validated.
//	Returns:		Boolean value indicating whether or not the number is valid. True is valid, False is invalid.

function _empty($string){ 
     $string = trim($string); 
     if(!is_numeric($string)) return empty($string); 
     return FALSE; 
}

?>