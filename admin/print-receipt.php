<?
require_once($_SERVER['DOCUMENT_ROOT'].'/a/inc/bootstrap.php');

if ($_id == "") {  header('Location: /admin/orders.php'); }

$receipt = generateReceipt($_id, 2);
?>

<!DOCTYPE HTML>
<html lang="en">
	<head>				
		<title></title>		
		<style>
			.pageBreak {page-break-after:always;}
		</style>
	</head>
	<body onload="window.print(); window.close();">	
		<? echo $receipt; ?>
	</body>
</html>