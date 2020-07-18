<?php
	defined('lidmarshop123456') or header("Location: ../index.php");
?>
<div id="block-random">
<div id="block-random-tovar">
<div id="title-random"><b>Lider</b>-ը խորհուրդ է տալիս</div>
<div id="bottom-cart-line_2"></div>
<div id="bottom-cart-line_3"></div>
<div id="tovar-prev"></div>
<div id="random-image">
	
	<ul>
	
<?php
  if ($cat != '' or $type != '')
  {
$query_random = mysql_query("SELECT DISTINCT * FROM table_products WHERE visible='1' AND brand='$cat' AND type_tovara='$type' ORDER by RAND() LIMIT 12" ,$link);  

if (mysql_num_rows($query_random) > 0)
{
$res_query = mysql_fetch_array($query_random);
do
{     
    
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
<p class="img-align"><a href="view_content.php?id='.$res_query["products_id"].'"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></a><p>
<p class="random-title"><a href="view_content.php?id='.$res_query["products_id"].'">'.$res_query["title"].'</a></p>
<div id="price-add-random">
<p class="random-price"><b>'.group_numerals($res_query["price"]).' դրամ</b></p>
</div>
<center><a href="view_content.php?id='.$res_query["products_id"].'"><div class="random-sale-'.$res_query["sale"].'"><span>'.$res_query["old_price"].' դրամ</span></div></a></center>
<p><a id="random-add-cart" class="add-random-cart" tid="'.$res_query["products_id"].'"></a></p>
</li>
';

} while($res_query = mysql_fetch_array($query_random));
}
  }
		if ($cat == '' and $type == ''){
	  $query_random = mysql_query("SELECT DISTINCT * FROM table_products WHERE visible='1' ORDER by RAND() LIMIT 12" ,$link);  

if (mysql_num_rows($query_random) > 0)
{
$res_query = mysql_fetch_array($query_random);
do
{     
    
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
<p class="img-align"><a href="http://html.loc/products/'.$res_query["products_id"].'-'.ftranslite($res_query["title"]).'/"><img src="http://html.loc/'.$img_path.'" width="'.$width.'" height="'.$height.'"></a><p>
<p class="random-title"><a href="http://html.loc/products/'.$res_query["products_id"].'-'.ftranslite($res_query["title"]).'/">'.$res_query["title"].'</a></p>
<div id="price-add-random">
<p class="random-price"><b>'.group_numerals($res_query["price"]).' դրամ</b></p>
</div>
<center><a href="http://html.loc/products/'.$res_query["products_id"].'-'.ftranslite($res_query["title"]).'/"><div class="random-sale-'.$res_query["sale"].'"><span>'.$res_query["old_price"].' դրամ</span></div></a></center>
<p><a id="random-add-cart" class="add-random-cart" tid="'.$res_query["products_id"].'"></a></p>
</li>
';

} while($res_query = mysql_fetch_array($query_random));
}
  }
?>
</ul>
	</div>
	<div id="tovar-next"></div>
	</div>
	</div>