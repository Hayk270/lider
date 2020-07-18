<?php
define('lidmarshop123456', true);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
include("db_connect.php");
include("../functions/functions.php");

$result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);
if (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);

do
{
$count = $count + $row["cart_count"];    
$int = $int + ($row["price"] * $row["cart_count"]); 
}
 while ($row = mysql_fetch_array($result));
 
if ($count >= 1) {( $str = ' ապրանք');}
	
if ($count >= 30) {( $str = ' ապր.');}
 
     echo '<span>'.$count.$str.'</span>  <span>'.group_numerals($int+500).'</span> դրամ';
}
else
{
     echo '0';
}
}
?>