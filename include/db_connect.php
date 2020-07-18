<?php
	defined('lidmarshop123456') or header("Location: ../index.php");
$db_host		='localhost';
$db_user		='Hayk';
$db_pass		='R6l4U3s5';
$db_database	='db_shop';

$link = mysql_connect($db_host, $db_user, $db_pass);

mysql_select_db($db_database,$link) or die ("Ոչինչ չի հայտնաբերվել".mysql_error());
mysql_query("SET names UTF-8");

?>