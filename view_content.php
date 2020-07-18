<?php
define('lidmarshop123456', true);
session_start();
include("include/db_connect.php");
include("functions/functions.php");
include("include/auth_cookie.php");

$id = clear_string($_GET["id"]); 
 
if ($id != $_SESSION['votesid'])
{
$queryvotes = mysql_query("SELECT votes FROM table_products WHERE products_id='$id'",$link);

$newvotes = $resultcount["vote"] + 1;

$update = mysql_query ("UPDATE table_products SET votes='$newvotes' WHERE products_id='$id'",$link);  
}

$_SESSION['votesid'] = $id; 
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
	<link rel="stylesheet" type="text/css" href="http://html.loc/fancybox/jquery.fancybox.css" />
    <script type="text/javascript" src="http://html.loc/fancybox/jquery.fancybox.js"></script>
    <meta charset="utf-8" />
	<title><?php 
		$result = mysql_query("SELECT * FROM table_products WHERE products_id='$id' AND visible='1'",$link);
		$row = mysql_fetch_array($result);
		echo $row["title"]; ?> | Lider Market</title>
	
	<script type="text/javascript">
$(document).ready(function(){
    $(".image-modal").fancybox(); 	
});	
</script> 
	
</head>
	
<body>
<div id="block-body">
<a class="back-to-top"></a>
<?php
	include("include/block-header.php");
	include("include/block-category_header.php");
	include("block-basket.php");
	?>
		
		
<div id="block-content" style="margin-top:0px;">
	<div style="border-bottom:1px solid #d2d2d2;width:720px;padding-bottom:40px;">
		<div id="history">
			<div id="go-back">
	<a onclick="goBack()">Վերադառնալ</a>
				</div>
		<div id="history-a">
	<a href="/">Գլխավոր էջ </a>	
			</div>
		</div>
	</div>
	<script>
function goBack() {
  window.history.back();
}
</script>
	<?php
	
$result1 = mysql_query("SELECT * FROM table_products WHERE products_id='$id' AND visible='1'",$link);
if (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{   
if  (strlen($row1["image"]) > 0 && file_exists("./uploads_images/".$row1["image"]))
{
$img_path = './uploads_images/'.$row1["image"];
$max_width = 220; 
$max_height = 220; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width;
$ratio = min($ratioh, $ratiow); 
$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}else
{
$img_path = "/images/no-image.png";
$width = 110;
$height = 200;
} 
	
echo '
<div id="block-content-info">
<a href="#image'.$row1["id"].'" class="image-modal"><img src="http://html.loc/'.$img_path.'" width="'.$width.'" height="'.$height.'" title="'.$row1["title"].'" id="image-opacity"></a>
<div class="content-best-price'.$row1["leader"].'"></div>
<div class="content-new-sale'.$row1["new"].'"></div>
<div id="block-mini-description">

<p id="content-title">'.$row1["title"].'</p>

<p id="style-price">'.group_numerals($row1["price"]).' դրամ</p>
<center><div class="content-sale'.$row1["sale"].'"><span>'.$row1["old_price"].' դրամ</span></div></center>
<a class="add-cart" id="add-cart-view" tid="'.$row1["products_id"].'"></a>

<p id="content-text"><strong>Ապրանքի նկարագրությունը՝</strong>  <br>'.$row1["mini_description"].'</p>
</div>
</div>
<a style="display:none;" id="image'.$row1["id"].'" ><img  src="http://html.loc/./uploads_images/'.$row1["image"].'" id="zoom_img"></a>
';	
}
	while ($row1 = mysql_fetch_array($result1));
}
	?>
	
</div>
<?php
	include("include/block-random.php");
	include("include/block-footer.php");
?>
	</div>
</body>
</html>

