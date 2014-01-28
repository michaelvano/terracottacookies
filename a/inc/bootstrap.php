<?
// Initialize Session
session_start();
$sessionID = session_id();









//GET IP ADDRESS
$ipAddress = $_SERVER['REMOTE_ADDR'];









//TODAY'S DATE
$today = date("Y-m-d");









// INCLUDE THE FUNCTIONS
include('functions.php');









// GET THE PAGE OF THIS URL
// $_SESSION['savedPage'] = thisPageUrl();









// RETRIEVE INFORMATION FROM $_GETS OR $_POSTS

// GETS ERROR MESSAGES
if (isset($_GET['_msg'])) {$_msg = $_GET['_msg'];}

// Log in script
if (isset($_POST['tryLogin'])) { $_msg = login($_POST['email'], $_POST['password'], '', $sessionID); }


// gets action
if (isset($_GET['_action'])) {$_action = $_GET['_action'];}
elseif (isset($_POST['_action'])) {$_action = $_POST['_action'];}

// gets ID
if (isset($_GET['_id']) && $_GET['_id'] != "") {$_id = $_GET['_id'];}
elseif (isset($_POST['_id']) && $_POST['_id'] != "") {$_id = $_POST['_id'];}

// gets the sub page
if (isset($_GET['_subPage']) && $_GET['_subPage'] != "") {$_subPage = $_GET['_subPage'];}









// gets page number and states limit
if (isset($_GET['_page']) && $_GET['_page'] != "") {$_page = $_GET['_page'];} else {$_page = 0;}
$_limit = 10;
$_start = ($_page*$_limit);









// CHECKS IF USER IS LOGGED IN
if (isset($_SESSION['ID']) && $_SESSION['ID'] != "") {$loggedIn = true;}
if ($loggedIn && isset($_SESSION['permissionLevel']) && $_SESSION['permissionLevel'] >= 9) {$isAdmin = true;}
if ($loggedIn && isset($_SESSION['permissionLevel']) && $_SESSION['permissionLevel'] == 1) {$isUser = true;}









// CHECKS IF THE BROWSER IS IE
if(preg_match('/(?i)msie [1-9]/',$_SERVER['HTTP_USER_AGENT'])) {$isIE = true;}
?>