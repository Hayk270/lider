<?php
define('lidmarshop123456', true);
 if($_SERVER["REQUEST_METHOD"] == "POST") {
 include("db_connect.php");
 include("../functions/functions.php");
 $search = clear_string($_POST['text']);
 
 $result = mysql_query("SELECT * FROM table_products WHERE title LIKE '%$search%' OR seo_words LIKE '%$search%' AND visible = '1'",$link);
 
 if (mysql_num_rows($result) > 0)
{
$result = mysql_query("SELECT * FROM table_products WHERE title LIKE '%$search%' OR seo_words LIKE '%$search%' AND visible = '1' LIMIT 8",$link);
$row = mysql_fetch_array($result);
do
{
if  ($row["image"] != "" && file_exists("../uploads_images/".$row["image"]))
{
$img_path = '../uploads_images/'.$row["image"];
$max_width = 90; 
$max_height = 90; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}else
{
$img_path = "/images/no-image.png";
$width = 100;
$height = 100;
} 
echo '
<li>
<div class="search-best-price'.$row["leader"].'"></div>
<div class="search-new-sale'.$row["new"].'"></div>
<div id="search_a"><a href="view_content.php?id='.$row["products_id"].'"><div id="search-img-height"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" title="'.$row["title"].'"></div><p>'.$row["title"].'</p><span id="search_mini_descriptions">'.mb_strimwidth($row["mini_description"], 0, 125, '...', 'UTF-8').'</span>
<span id="search_price">'.$row["price"].' դրամ</span>
<center><h5><div class="search-sale'.$row["sale"].'"><span>'.$row["old_price"].' դրամ</span></div></h5></center>
</a>
</div>
<div id="search_cat">
<a id="bread" href="view_cat.php?cat='.$row["brand"].'&type='.$row["type_tovara"].'">'.$row["brand"].'</a>
</div>

<a class="add-search" id="add-cart-search" tid="'.$row["products_id"].'"></a>
</li>
';
}
 while ($row = mysql_fetch_array($result));

}
 }
?>
	<script type="text/javascript" src="../js/search-add-cart.js"></script>