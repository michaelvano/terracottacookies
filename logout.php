<?
session_start();

$_SESSION = array();

if (session_destroy())
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/login.php?_msg=100">'; exit;
}


?>