<?

session_start();

$savedPage = $_SESSION['savedPage'];

$_SESSION = array();

if (session_destroy())
{
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=/admin/index.php?_msg=100">'; exit;
}


?>