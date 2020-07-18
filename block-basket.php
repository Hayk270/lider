<?php
define('lidmarshop123456', true);
session_start();
include("include/db_connect.php");
include("include/auth_cookie.php");
//include("functions/functions.php");
$id = clear_string($_GET["id"]);

$result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);
if (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);

do
{ 
$int = $int + ($row["cart_price"] * $row["cart_count"]); 
}
 while ($row = mysql_fetch_array($result));
 

   $itogpricecart = $int;
}   

?>

<!DOCTYPE HTML>
<html lang="hy">	
<body>
<div id="block-basket-content">
	<?php

   $action = clear_string($_GET["action"]);
  switch ($action) {

	    case 'oneclick':
$result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);

echo '<div id="your-basket"><a href="http://html.loc/cart/"><img src="http://html.loc/images/your-basket.png" width="40px"></a><p>Ձեր զամբյուղը</p></div>';		  
if (mysql_num_rows($result) > 0)
{
  
$row = mysql_fetch_array($result);

   echo '
   <div id="header-list-cart-basket"> 
   <div id="head3-basket" >Քանակ</div>
   <div id="head2-basket" >Ապրանք</div>
   <div id="head4-basket" >Գին</div>
   </div> 
   ';

do
{
$count = $count + $row["cart_count"];
$int = $row["cart_price"] * $row["cart_count"];
$all_price = $all_price + $int; 

echo '

<div class="block-list-cart-basket">
<div id="basket-li">
<div class="count-cart-basket">
<ul class="input-count-style-basket">

<li>
<center iid="'.$row["cart_id"].'" class="count-minus-basket"><img src="http://html.loc/Images/minus_icon.png" width="16px"></center>
</li>

<li>
<center><input id="input-id'.$row["cart_id"].'" iid="'.$row["cart_id"].'" class="count-input-basket" maxlength="2" type="text" value="'.$row["cart_count"].'" /></center>
</li>

<li>
<center iid="'.$row["cart_id"].'" class="count-plus-basket"><img src="http://html.loc/Images/plus_icon.png" width="16px"></center>
</li>

</ul>
</div>

<div class="title-cart1">
<p><a href="http://html.loc/products/'.$row["products_id"].'-'.ftranslite($row["title"]).'/">'.$row["title"].'</a></p>
</div>

<div class="price-product1" id="tovar'.$row["cart_id"].'"><p price="'.$row["cart_price"].'" align="right">'.group_numerals($int).' դր</p></div>
</div>
<div class="delete-basket"><a href="http://html.loc/block-basket-delete.php?id='.$row["cart_id"].'&action=delete">
<img src="http://html.loc/images/bsk_item_del.png" /></a></div>
</div>


';
    
}
 while ($row = mysql_fetch_array($result));
 
 echo '
 <div class="price_row">
<span class="dark_gray">Առաքման արժեքը ՝</span>&nbsp;&nbsp;
<span class="dark_red"><b>500 դր</b></span>
</div>
<div class="itog-price-basket">
 Գումարը (<span id="itog-count">'.$count.'</span>) <strong><span id="itog" >'.group_numerals($all_price).'</span> դր</strong>
 </div>
 <p align="right" class="button-next-basket" ><a href="http://html.loc/cart.php?action=confirm" >Պատվիրել</a></p>
  <p align="left" class="all-basket" ><a href="http://html.loc/cart.php?action=oneclick" >Ամբողջ զամբյուղը</a></p>
  <div id="your-basket-clear">
  <a href="http://html.loc/block-basket-delete.php?action=clear">Դատարկել զամբյուղը</a>
  </div>
 ';
  
} 
else
{
    echo '<h3 id="clear-cart-basket">Ձեր զամբյուղը դատարկ է</h3>';
}
	    break;  
		  
	  default:
$result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);

echo '<div id="your-basket"><a href="http://html.loc/cart.php?action=oneclick"><img src="http://html.loc/images/your-basket.png" width="40px"></a><p>Ձեր զամբյուղը</p></div>';		  
if (mysql_num_rows($result) > 0)
{
  
$row = mysql_fetch_array($result);

   echo '
   <div id="header-list-cart-basket"> 
   <div id="head3-basket" >Քանակ</div>
   <div id="head2-basket" >Ապրանք</div>
   <div id="head4-basket" >Գին</div>
   </div> 
   ';

do
{
$count = $count + $row["cart_count"];
$int = $row["cart_price"] * $row["cart_count"];
$all_price = $all_price + $int; 

echo '

<div class="block-list-cart-basket">
<div id="basket-li">
<div class="count-cart-basket">
<ul class="input-count-style-basket">

<li>
<center iid="'.$row["cart_id"].'" class="count-minus-basket"><img src="http://html.loc/Images/minus_icon.png" width="16px"></center>
</li>

<li>
<center><input id="input-id'.$row["cart_id"].'" iid="'.$row["cart_id"].'" class="count-input-basket" maxlength="2" type="text" value="'.$row["cart_count"].'" /></center>
</li>

<li>
<center iid="'.$row["cart_id"].'" class="count-plus-basket"><img src="http://html.loc/Images/plus_icon.png" width="16px"></center>
</li>

</ul>
</div>

<div class="title-cart1">
<p><a href="http://html.loc/products/'.$row["products_id"].'-'.ftranslite($row["title"]).'/">'.$row["title"].'</a></p>
</div>

<div class="price-product1" id="tovar'.$row["cart_id"].'"><p price="'.$row["cart_price"].'" align="right">'.group_numerals($int).' դր</p>
</div>
<div class="delete-basket"><a href="http://html.loc/block-basket-delete.php?id='.$row["cart_id"].'&action=delete">
<img src="http://html.loc/images/bsk_item_del.png" /></a></div>
</div>
</div>


';
    
}
 while ($row = mysql_fetch_array($result));
 
 echo '
 <div class="price_row_basket">
<span class="dark_gray_basket">Առաքման արժեքը ՝</span>&nbsp;&nbsp;
<span class="dark_red_basket"><b>500 դր</b></span>
</div>
 <div class="itog-price-basket">
 Գումարը (<span id="itog-count">'.$count.'</span>) <strong><span id="itog" >'.group_numerals($all_price).'</span> դր</strong></div>
 <p align="right" class="button-next-basket" ><a href="http://html.loc/cart.php?action=confirm" >Պատվիրել</a></p>
  <p align="left" class="all-basket" ><a href="http://html.loc/cart.php?action=oneclick">Ամբողջ զամբյուղը</a></p>
  <div id="your-basket-clear">
  <a href="http://html.loc/block-basket-delete.php?action=clear">Դատարկել զամբյուղը</a>
  </div>
 ';
  
} 
else
{
    echo '<h3 id="clear-cart-basket">Ձեր զամբյուղը դատարկ է</h3>';
}
	    break;
  }
	?>
</div>
</body>
</html>
