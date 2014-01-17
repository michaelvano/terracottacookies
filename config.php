<?

define("HOSTPATH", "localhost");
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "root");
define("DB_NAME", "tcc_core");
$db = mysql_pconnect(DB_HOST, DB_USER, DB_PASS);
mysql_select_db(DB_NAME);

?>