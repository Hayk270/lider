<?php
	defined('lidmarshop123456') or header("Location: ../index.php");
?>
<div id="index-best-sale">
<div id="index-best-sale-tovar">
<div id="title-best-sale"><p><img src="../Images/title-back.PNG"></p></div>
<div id="random-image-best-sale">
	
	<ul>
	
<?php
	
$query_random = mysql_query("SELECT DISTINCT * FROM table_products WHERE visible='1' AND leader='1' LIMIT 4",$link);  

if (mysql_num_rows($query_random) > 0)
{
$res_query = mysql_fetch_array($query_random);
do
{     
    
if  (strlen($res_query["image"]) > 0 && file_exists("./uploads_images/".$res_query["image"]))
{
$img_path = './uploads_images/'.$res_query["image"];
$max_width = 100; 
$max_height = 100; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 

$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}else
{
$img_path = "/Images/no-image.jpg";
$width = 65;
$height = 118;
}       
echo '
<li>
<div class="best-new-sale'.$res_query["new"].'"></div>
<p id="image-best"><a href="view_content.php?id='.$res_query["products_id"].'"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></a><p>
<p class="best-sale-title"><a href="view_content.php?id='.$res_query["products_id"].'">'.$res_query["title"].'</a></p>
<div id="price-add-best">
<p class="best-price"><b>'.group_numerals($res_query["price"]).' դրամ</b></p>
</div>
<p><a id="random-best-cart" class="add-random-cart" tid="'.$res_query["products_id"].'"></a></p>
</li>
';

} while($res_query = mysql_fetch_array($query_random));
}
?>
</ul>
	</div>
	</div>
	</div>