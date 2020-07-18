<?php
	defined('lidmarshop123456') or header("Location: ../index.php");
?>
<div id="block-random">
<div id="block-random-tovar-sale">
<div id="title-random-sale"><a href="view_aystopper.php?go=sale">Տնտեսեք <b>Lider</b>-ի հետ</a></div>
<div id="bottom-cart-line-sale_2"></div>
<div id="bottom-cart-line-sale_3"></div>
<div id="tovar-prev-sale"></div>
<div id="random-image-sale">
	
	<ul>
	
<?php
	
$query_random = mysql_query("SELECT DISTINCT * FROM table_products WHERE visible='1' AND sale='1' ORDER by RAND() LIMIT 12",$link);  

if (mysql_num_rows($query_random) > 0)
{
$res_query = mysql_fetch_array($query_random);
do
{
    // Выбор отзывов
      
    
if  (strlen($res_query["image"]) > 0 && file_exists("./uploads_images/".$res_query["image"]))
{
$img_path = './uploads_images/'.$res_query["image"];
$max_width = 120; 
$max_height = 120; 
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
<div class="random-best-price'.$res_query["leader"].'"></div>
<div class="random-new-sale'.$res_query["new"].'"></div>
<p class="img-align"><a href="http://html.loc/products/'.$res_query["products_id"].'-'.ftranslite($res_query["title"]).'/"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></a><p>
<p class="random-title"><a href="http://html.loc/products/'.$res_query["products_id"].'-'.ftranslite($res_query["title"]).'/">'.$res_query["title"].'</a></p>
<div id="price-add-random">
<p class="random-price"><b>'.group_numerals($res_query["price"]).' դրամ</b></p>
<p class="random-old-price"><b>'.group_numerals($res_query["old_price"]).' դրամ</b></p>
<center><a href="http://html.loc/products/'.$res_query["products_id"].'-'.ftranslite($res_query["title"]).'/"><div class="random-sale'.$res_query["sale"].'"></div></a></center>
<p><a id="random-add-cart" class="add-random-cart-sale" tid="'.$res_query["products_id"].'"></a></p>
</div>
</li>
';

} while($res_query = mysql_fetch_array($query_random));
}
?>
</ul>
	</div>
	<div id="tovar-next-sale"></div>
	</div>
	</div>