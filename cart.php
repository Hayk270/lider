<?php
define('lidmarshop123456', true);
session_start();
include("include/db_connect.php");
include("functions/functions.php");
include("include/auth_cookie.php");

$id = clear_string($_GET["id"]);
$action = clear_string($_GET["action"]);
    
   switch ($action) {

	    case 'clear':
        $clear = mysql_query("DELETE FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);  
		   ?>
		<script>
		goBack();
			
		function goBack() {
  		window.history.back();
		}
		</script>';
<?php
	    break;
        case 'delete':     
        $delete = mysql_query("DELETE FROM cart WHERE cart_id = '$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);
		   ?>
		<script>
		goBack();
			
		function goBack() {
  		window.history.back();
		}
		</script>';
<?php
        break; 
	}
if(isset($_POST['submitdata']))
{	
if ( $_SESSION['auth'] == 'yes_auth' ) 
 {
        
    mysql_query("INSERT INTO orders(order_datetime,order_name,order_surname,order_email,order_phone,order_street,order_house,order_enter,order_flat,order_floar,order_note)
						VALUES(	
                             NOW(),					
							'".$_SESSION['auth_surname'].' '.$_SESSION['auth_name'].' '.$_SESSION['auth_patronymic']."',
                            '".$_SESSION['auth_address']."',
                            '".$_SESSION['auth_phone']."',
                            '".$_POST['order_note']."',
                            '".$_SESSION['auth_email']."'                              
						    )",$link);
	
	$_POST["order_name"] = clear_string($_POST["order_name"]);
    $_POST["order_email"] = clear_string($_POST["order_email"]);
	$_POST["order_surname"] = clear_string($_POST["order_surname"]);
	$_POST["order_phone"] = clear_string($_POST["order_phone"]);
	$_POST["order_street"] = clear_string($_POST["order_street"]);
	$_POST["order_house"] = clear_string($_POST["order_house"]);
	$_POST["order_enter"] = clear_string($_POST["order_enter"]);
	$_POST["order_flat"] = clear_string($_POST["order_flat"]);
    $_POST["order_floar"] = clear_string($_POST["order_floar"]);
	$_POST["order_note"] = clear_string($_POST["order_note"]);
           
     $dataquery = $newpassquery."name='".$_POST["order_name"]."',email='".$_POST["order_email"]."',surname='".$_POST["order_surname"]."',phone='".$_POST["order_phone"]."',street='".$_POST["order_street"]."',house='".$_POST["order_house"]."',enter='".$_POST["order_enter"]."',flat='".$_POST["order_flat"]."',floar='".$_POST["order_floar"]."',additional='".$_POST["order_note"]."'";      
     $update = mysql_query("UPDATE reg_user SET $dataquery WHERE email = '{$_SESSION['auth_email']}'",$link);
      
    if ($newpass){ $_SESSION['auth_pass'] = $newpass; } 
    
    
    $_SESSION['auth_name'] = $_POST["order_name"];
    $_SESSION['auth_email'] = $_POST["order_email"]; 
	$_SESSION['auth_surname'] = $_POST["order_surname"];
    $_SESSION['auth_phone'] = $_POST["order_phone"];
	$_SESSION['auth_street'] = $_POST["order_street"];
	$_SESSION['auth_house'] = $_POST["order_house"];  
	$_SESSION['auth_enter'] = $_POST["order_enter"];
	$_SESSION['auth_flat'] = $_POST["order_flat"];
	$_SESSION['auth_floar'] = $_POST["order_floar"];
	$_SESSION['auth_additional'] = $_POST["order_note"];
          

 }else
 {
$_SESSION["order_name"] = $_POST["order_name"];
$_SESSION["order_surname"] = $_POST["order_surname"];
$_SESSION["order_email"] = $_POST["order_email"];
$_SESSION["order_phone"] = $_POST["order_phone"];
$_SESSION["order_street"] = $_POST["order_street"];
$_SESSION["order_house"] = $_POST["order_house"];
$_SESSION["order_enter"] = $_POST["order_enter"];
$_SESSION["order_flat"] = $_POST["order_flat"];
$_SESSION["order_floar"] = $_POST["order_floar"];
$_SESSION["order_note"] = $_POST["order_note"];

    mysql_query("INSERT INTO orders(order_datetime,order_name,order_surname,order_email,order_phone,order_street,order_house,order_enter,order_flat,order_floar,order_note)
						VALUES(	
                             NOW(),					
							'".clear_string($_POST["order_name"])."',
                           '".clear_string($_POST["order_surname"])."',
						   '".clear_string($_POST["order_email"])."',
						   '".clear_string($_POST["order_phone"])."',
						   '".clear_string($_POST["order_street"])."',
						   '".clear_string($_POST["order_house"])."',
						   '".clear_string($_POST["order_enter"])."',
						   '".clear_string($_POST["order_flat"])."',
                            '".clear_string($_POST["order_floar"])."',
                            '".clear_string($_POST["order_note"])."'                   
						    )",$link);    
 }

                          
 $_SESSION["order_id"] = mysql_insert_id();                          
                            
$result = mysql_query("SELECT * FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);
if (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);    

do{

    mysql_query("INSERT INTO buy_products(buy_id_order,buy_id_product,buy_count_product)
						VALUES(	
                            '".$_SESSION["order_id"]."',					
							'".$row["cart_id_products"]."',
                            '".$row["cart_count"]."'                   
						    )",$link);

} while ($row = mysql_fetch_array($result));
}
                            
header("Location: cart.php?action=completion");
}
	
$result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);
If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);

do
{ 
$int = $int + ($row["cart_price"] * $row["cart_count"]); 
}
 while ($row = mysql_fetch_array($result));
 

   $itogpricecart = $int;
}   
if(isset($_POST['paytype']))
{	      
header("Location: index.php");     
}
?>

<!DOCTYPE HTML>
<html lang="hy">
<head>
	<link rel="icon" href="http://html.loc/Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
    <link href="http://html.loc/CSS/reset.css" rel="stylesheet" type="text/css" />
    <link href="http://html.loc/CSS/shop.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://html.loc/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="http://html.loc/js/jquery.jcarousellite.js"></script>
	<script type="text/javascript" src="http://html.loc/js/shop-script.js"></script>
	<script type="text/javascript" src="http://html.loc/js/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="http://html.loc/js/TextChange.js"></script>
    <meta charset="utf-8" />
	<title>Ձեր զամբյուղը | Lider Market</title>
</head>
	
<body>
<div id="block-body">
<a class="back-to-top"></a>
<?php
	include("include/block-header.php");

   $action = clear_string($_GET["action"]);
  switch ($action) {

	    case 'oneclick':
   $result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);

if (mysql_num_rows($result) > 0)
{
   echo ' 
   <div id="block-step">  
   <div id="name-step">  
   <ul>
   <li><a class="active">1. Ապրանքների զամբյուղ</a></li>
   <li><span>&rarr;</span></li>
   <li><a>2. Առաքման հասցե</a></li>
   <li><span>&rarr;</span></li>
   <li><a>3. Հաստատում</a></li> 
   </ul>  
   </div>  
   <p>Քայլ 1 / 3</p>
   <a href="cart.php?action=clear" >Դատարկել</a>
   </div>
';

$row = mysql_fetch_array($result);

   echo '  
   <div id="header-list-cart">    
   <div id="head1" >Նկար</div>
   <div id="head2" >Ապրանքի նկարագրություն</div>
   <div id="head3" >Քանակ</div>
   <div id="head4" >Գին</div>
   </div> 
   ';

do
{

$int = $row["cart_price"] * $row["cart_count"];
$all_price = $all_price + $int;

if  (strlen($row["image"]) > 0 && file_exists("./uploads_images/".$row["image"]))
{
$img_path = './uploads_images/'.$row["image"];
$max_width = 140; 
$max_height = 110; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 

$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}else
{
$img_path = "/images/noimages.jpeg";
$width = 120;
$height = 105;
} 

echo '

<div class="block-list-cart">

<div class="img-cart">
<p align="center"><a href="view_content.php?id='.$row["products_id"].'"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" id="image-opacity"></a></p>
</div>

<div class="title-cart">
<p><a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a></p>
<p class="cart-mini-features">
'.mb_strimwidth($row["mini_description"], 0, 125, '...', 'UTF-8').'
</p>
</div>

<div class="count-cart">
<ul class="input-count-style">

<li>
<center iid="'.$row["cart_id"].'" class="count-minus"><img src="Images/minus_icon.png" width="23px"></center>
</li>

<li>
<center><input id="input-id'.$row["cart_id"].'" iid="'.$row["cart_id"].'" class="count-input" maxlength="3" type="text" value="'.$row["cart_count"].'" /></center>
</li>

<li>
<center iid="'.$row["cart_id"].'" class="count-plus"><img src="Images/plus_icon.png" width="23px"></center>
</li>

</ul>
</div>

<div class="price-product" id="tovar'.$row["cart_id"].'"><h5><span class="span-count">'.$row["cart_count"].'</span> x <span>'.$row["cart_price"].' դրամ</span></h5><p price="'.$row["cart_price"].'">'.group_numerals($int).' դրամ</p></div>
<div class="delete-cart"><a  href="cart.php?id='.$row["cart_id"].'&action=delete" ><img src="/images/bsk_item_del.png" /></a></div>
<div id="bottom-cart-line"></div>
</div>
';

    
}
 while ($row = mysql_fetch_array($result));
 
 echo '
 <div class="price_row">
<span class="dark_gray">Առաքման արժեքը ՝</span>&nbsp;&nbsp;
<span class="dark_red"><b>500 դր</b></span>
</div>
 <h2 class="itog-price" align="right">Ընդհանուր: <strong>'.group_numerals($all_price).'</strong> դրամ</h2>
 <p align="right" class="button-next" ><a href="cart.php?action=confirm" >Շարունակել</a></p> 
 ';
} 
else
{
    echo '<h3 id="clear-cart" align="center">Ձեր զամբյուղը դատարկ է</h3><ul class="ul_dash">
<li> - Ամենայն հավանականությամբ, Դուք ոչինչ դեռ չեք ավելացրել: Ապրանքը զամբյուղի մեջ ավելացնելու համար անհրաժեշտ է սեղմել <p></p> "Ավելացնել" կոճակը Ձեզ հետաքրքրող ապրանքի կողքին:</li>
<li>- Եթե Դուք արդեն ավելացրել եք որևէ ապրանք զամբյուղի մեջ, Ձեզ միայն հարկավոր է թարմացնել տվյալ էջը:</li>
<li>- Հնարավոր է, որ ընտրված ապրանքներն արդեն իսկ վաճառվել են: </li>
<li>- Հավելյալ հարցերի դեպքում կարող եք կապ հաստատել զանգերի կենտրոնի հետ <b>+374 (55) 10-99-10</b> հեռախոսահամարով
<p class="MsoNormal" style="background: white;"><span style="font-size: 9pt; font-family: Tahoma, sans-serif; color: rgb(4, 4, 4);"><o:p></o:p></span></p>
</li>
</ul>';
}
		  
	    break;
		  
	  case 'confirm':
		  
		  echo ' 
   <div id="block-step">  
   <div id="name-step">  
   <ul>
   <li><a href="cart.php?action=oneclick">1. Ապրանքների զամբյուղ</a></li>
   <li><span>&rarr;</span></li>
   <li><a class="active">2. Առաքման հասցե</a></li>
   <li><span>&rarr;</span></li>
   <li><a>3. Հաստատում</a></li> 
   </ul>  
   </div>  
   <p>Քայլ 2 / 3</p>
   </div>
';
 echo '
<form method="post">
<ul id="info-radio" style="display:none;">
<li>
<input type="radio" name="order_delivery" class="order_delivery" id="order_delivery2" value="Առաքիչ" '.$chck2.' checked>
<label class="label_delivery" for="order_delivery2">Առաքիչ</label>
</li>
</ul>
<h3 class="title-h3" style="margin-left:0px;">Առաքման համար ինֆորմացիա</h3>
<ul id="info-order">
';
 if ( $_SESSION['auth'] == 'yes_auth' ) 
    {
	 echo '
<li><label for="order_name"><span>*</span>Անուն`</label><input autocomplete="off" type="text" name="order_name" id="order_name" value="'.$_SESSION["auth_name"].'"></li>
<li><label for="order_surname"><span>*</span>Ազգանուն`</label><input autocomplete="off" type="text" name="order_surname" id="order_surname" value="'.$_SESSION["auth_surname"].'"></li>
<li><label for="order_email"><span>*</span>Էլ. փոստ`</label><input autocomplete="off" type="text" name="order_email" id="order_email" value="'.$_SESSION["auth_email"].'" /></li>
<li><label for="order_phone"><span>*</span>Հեռախոսահամար`</label><input autocomplete="off" type="text" name="order_phone" id="order_phone" value="'.$_SESSION["auth_phone"].'"></li>
<li><label for="order_street"><span>*</span>Փողոց`</label><input autocomplete="off" type="text" name="order_street" id="order_street" value="'.$_SESSION["auth_street"].'"></li>
<li><label for="order_house">Շենք`</label><input autocomplete="off" style="width:66px;height:40px;" type="text" name="order_house" id="order_house" value="'.$_SESSION["auth_house"].'" />
<label for="order_enter" style="margin-left:107px;margin-top:7px;">Մուտք`</label><input autocomplete="off" style="width:66px;height:40px;margin-left:200px;" type="text" name="order_enter" id="order_enter" value="'.$_SESSION["auth_enter"].'" /></li>
<li><label for="order_flat">Բնակարան`</label><input autocomplete="off" style="width:66px;height:40px;" type="text" name="order_flat" id="order_flat" value="'.$_SESSION["auth_flat"].'" />
<label for="order_floar" style="margin-left:122px;margin-top:7px;">Հարկ`</label><input autocomplete="off" style="width:66px;height:40px;margin-left:200px;" type="text" name="order_floar" id="order_floar" value="'.$_SESSION["auth_floar"].'" /></li>
<li style="margin-top:30px;"><label class="order_label_style" for="order_note">Լրացուցիչ`</label><textarea name="order_note" id="order_note"  >'.$_SESSION["auth_additional"].'</textarea></li>
</ul>';
 }else {
echo '
<li><label for="order_name"><span>*</span>Անուն`</label><input autocomplete="off" type="text" name="order_name" id="order_name" value="'.$_SESSION["order_name"].'"></li>
<li><label for="order_surname"><span>*</span>Ազգանուն`</label><input autocomplete="off" type="text" name="order_surname" id="order_surname" value="'.$_SESSION["order_surname"].'"></li>
<li><label for="order_email"><span>*</span>Էլ. փոստ`</label><input autocomplete="off" type="text" name="order_email" id="order_email" value="'.$_SESSION["order_email"].'" /></li>
<li><label for="order_phone"><span>*</span>Հեռախոսահամար`</label><input autocomplete="off" type="text" name="order_phone" id="order_phone" value="'.$_SESSION["order_phone"].'"></li>
<li><label for="order_street"><span>*</span>Փողոց`</label><input autocomplete="off" type="text" name="order_street" id="order_street" value="'.$_SESSION["order_street"].'"></li>
<li><label for="order_house">Շենք`</label><input autocomplete="off" style="width:66px;height:40px;" type="text" name="order_house" id="order_house" value="'.$_SESSION["order_house"].'" />
<label for="order_enter" style="margin-left:107px;margin-top:7px;">Մուտք`</label><input autocomplete="off" style="width:66px;height:40px;margin-left:200px;" type="text" name="order_enter" id="order_enter" value="'.$_SESSION["order_enter"].'" /></li>
<li><label for="order_flat">Բնակարան`</label><input autocomplete="off" style="width:66px;height:40px;" type="text" name="order_flat" id="order_flat" value="'.$_SESSION["order_flat"].'" />
<label for="order_floar" style="margin-left:122px;margin-top:7px;">Հարկ`</label><input autocomplete="off" style="width:66px;height:40px;margin-left:200px;" type="text" name="order_floar" id="order_floar" value="'.$_SESSION["order_floar"].'" /></li>
<li style="margin-top:30px;"><label class="order_label_style" for="order_note">Լրացուցիչ`</label><textarea name="order_note" id="order_note"  >'.$_SESSION["order_note"].'</textarea></li>
</ul>';
 }
echo '
<p align="right" ><input type="submit" name="submitdata" id="confirm-button-next" value="Հաստատել"></p>
</form>
 ';
      
        break;
		  
	  case 'completion':
		  
		   echo ' 
   <div id="block-step">  
   <div id="name-step">  
   <ul>
   <li><a href="cart.php?action=oneclick">1. Ապրանքների զամբյուղ</a></li>
   <li><span>&rarr;</span></li>
   <li><a href="cart.php?action=confirm">2. Առաքման հասցե</a></li>
   <li><span>&rarr;</span></li>
   <li><a class="active">3. Հաստատում</a></li> 
   </ul>  
   </div>  
   <p>Քայլ 3 / 3</p>
   </div>
   '; 

if ( $_SESSION['auth'] == 'yes_auth' ) 
    {
echo '
<ul id="list-info" >
<li id="personal_info">Անձնական տվյալներ</li>
<li>Անուն՝<strong>'.$_SESSION['auth_name'].'</strong></li>
<li>Ազգանուն՝<strong>'.$_SESSION['auth_surname'].'</strong></li>
<li>Հեռախոսահամար՝<strong>'.$_SESSION['auth_phone'].'</strong></li>
<li>Էլ. փոստ՝<strong>'.$_SESSION['auth_email'].'</strong></li>
<li id="delivery-address">Առաքման հասցե</li>
<li>Փողոց՝<strong>'.$_SESSION['auth_street'].'</strong></li>
<li>Շենք՝<strong>'.$_SESSION['auth_house'].'</strong></li><li>Մուտք՝<strong>'.$_SESSION['auth_enter'].'</strong></li><li>Բնակարան՝<strong>'.$_SESSION['auth_flat'].'</strong></li><li>Հարկ՝<strong>'.$_SESSION['auth_floar'].'</strong></li>
<li>Լրացուցիչ՝<strong>'.$_SESSION['auth_additional'].'</strong></li>
</ul>
';
   }else
   {
echo '
<ul id="list-info" >
<li id="personal_info">Անձնական տվյալներ</li>
<li>Անուն՝<strong>'.$_SESSION['order_name'].'</strong></li>
<li>Ազգանուն՝<strong>'.$_SESSION['order_surname'].'</strong></li>
<li>Հեռախոսահամար՝<strong>'.$_SESSION['order_phone'].'</strong></li>
<li>Էլ. փոստ՝<strong>'.$_SESSION['order_email'].'</strong></li>
<li id="delivery-address">Առաքման հասցե</li>
<li>Փողոց՝<strong>'.$_SESSION['order_street'].'</strong></li>
<li>Շենք՝<strong>'.$_SESSION['order_house'].'</strong></li><li>Մուտք՝<strong>'.$_SESSION['order_enter'].'</strong></li><li>Բնակարան՝<strong>'.$_SESSION['order_flat'].'</strong></li><li>Հարկ՝<strong>'.$_SESSION['order_floar'].'</strong></li>
<li>Լրացուցիչ՝<strong>'.$_SESSION['order_note'].'</strong></li>
</ul>
';    
}
 echo '
 <div id="itog-price">
<h2 class="itog-price" align="right">Ընդհանուր ՝<strong> '.group_numerals($itogpricecart).'</strong> դրամ</h2>
<input type="submit" name="paytype" value="Պատվիրել" class="button-next0">
 </div>
 '; 

		  
		  break;
		  
	  default:
$result = mysql_query("SELECT * FROM cart,table_products WHERE cart.cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND table_products.products_id = cart.cart_id_products",$link);

if (mysql_num_rows($result) > 0)
{
		    echo ' 
   <div id="block-step">  
   <div id="name-step">  
   <ul>
   <li><a class="active" >1. Ապրանքների զամբյուղ</a></li>
   <li><span>&rarr;</span></li>
   <li><a>2. Առաքման հասցե</a></li>
   <li><span>&rarr;</span></li>
   <li><a>3. Հաստատում</a></li> 
   </ul>  
   </div>  
   <p>Քայլ 1 / 3</p>
   <a href="cart.php?action=clear" >Դատարկել</a>
   </div>
';
  
$row = mysql_fetch_array($result);

   echo '  
   <div id="header-list-cart">    
   <div id="head1" >Նկար</div>
   <div id="head2" >Ապրանքի նկարագրություն</div>
   <div id="head3" >Քանակ</div>
   <div id="head4" >Գին</div>
   </div> 
   ';

do
{

$int = $row["cart_price"] * $row["cart_count"];
$all_price = $all_price + $int;

if  (strlen($row["image"]) > 0 && file_exists("./uploads_images/".$row["image"]))
{
$img_path = './uploads_images/'.$row["image"];
$max_width = 140; 
$max_height = 110; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 

$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}else
{
$img_path = "/images/noimages.jpeg";
$width = 120;
$height = 105;
} 

echo '

<div class="block-list-cart">

<div class="img-cart">
<p align="center"><a href="view_content.php?id='.$row["products_id"].'"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" id="image-opacity"></a></p>
</div>

<div class="title-cart">
<p><a href="view_content.php?id='.$row["products_id"].'">'.$row["title"].'</a></p>
<p class="cart-mini-features">
'.mb_strimwidth($row["mini_description"], 0, 125, '...', 'UTF-8').'
</p>
</div>

<div class="count-cart">
<ul class="input-count-style">

<li>
<center iid="'.$row["cart_id"].'" class="count-minus"><img src="Images/minus_icon.png" width="23px"></center>
</li>

<li>
<center><input id="input-id'.$row["cart_id"].'" iid="'.$row["cart_id"].'" class="count-input" maxlength="3" type="text" value="'.$row["cart_count"].'" /></center>
</li>

<li>
<center iid="'.$row["cart_id"].'" class="count-plus"><img src="Images/plus_icon.png" width="23px"></center>
</li>

</ul>
</div>

<div class="price-product" id="tovar'.$row["cart_id"].'"><h5><span class="span-count">'.$row["cart_count"].'</span> x <span>'.$row["cart_price"].' դրամ</span></h5><p price="'.$row["cart_price"].'">'.group_numerals($int).' դրամ</p></div>
<div class="delete-cart"><a  href="cart.php?id='.$row["cart_id"].'&action=delete" ><img src="/images/bsk_item_del.png"></a></div>

<div id="bottom-cart-line"></div>
';
    
}
 while ($row = mysql_fetch_array($result));
 
 echo '
 </div>
<div class="price_row">
<span class="dark_gray">Առաքման արժեքը ՝</span>&nbsp;&nbsp;
<span class="dark_red"><b>500 դր</b></span>
</div>
 <h2 class="itog-price" align="right">Ընդհանուր: <strong>'.group_numerals($all_price).'</strong> դրամ</h2>
 <p align="right" class="button-next" ><a href="cart.php?action=confirm" >Շարունակել</a></p> 
 ';
  
} 
else
{
    echo '<h3 id="clear-cart" align="center">Ձեր զամբյուղը դատարկ է</h3><ul class="ul_dash">
<li>- Ամենայն հավանականությամբ, Դուք ոչինչ դեռ չեք ավելացրել: Ապրանքը զամբյուղի մեջ ավելացնելու համար անհրաժեշտ է սեղմել <p></p> "Ավելացնել" կոճակը Ձեզ հետաքրքրող ապրանքի կողքին:</li>
<li>- Եթե Դուք արդեն ավելացրել եք որևէ ապրանք զամբյուղի մեջ, Ձեզ միայն հարկավոր է թարմացնել տվյալ էջը:</li>
<li>- Հնարավոր է, որ ընտրված ապրանքներն արդեն իսկ վաճառվել են: </li>
<li>- Հավելյալ հարցերի դեպքում կարող եք կապ հաստատել զանգերի կենտրոնի հետ <b>+374 (55) 10-99-10</b> հեռախոսահամարով
<p class="MsoNormal" style="background: white;"><span style="font-size: 9pt; font-family: Tahoma, sans-serif; color: rgb(4, 4, 4);"><o:p></o:p></span></p>
</li>
</ul>';
}
		  
	    break;
		  
		  break;
  }
	include("include/block-random.php");
	include("include/block-footer.php");
?>
</div>
</body>
</html>

