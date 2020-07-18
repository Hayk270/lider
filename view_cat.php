<?php
define('lidmarshop123456', true);
session_start();
include("include/db_connect.php");
include("functions/functions.php");
include("include/auth_cookie.php");

$cat = clear_string ($_GET["cat"]);
$type = clear_string ($_GET["type"]);
?>
<!DOCTYPE HTML>
<html lang="hy">
<head>
	<link rel="icon" href="Images/lider0.ico">
	<link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/shop.css" rel="stylesheet" type="text/css" /> 
    <script type="text/javascript" src="/js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="js/jquery.jcarousellite.js"></script> 
    <script type="text/javascript" src="js/shop-script.js"></script>
    <script type="text/javascript" src="/js/jquery.cookie.min.js"></script>
    <script type="text/javascript" src="/js/TextChange.js"></script>
    <meta charset="utf-8" />
	<title><?php echo $cat ?> | Lider Market</title>
</head>

<body>
<div id="block-body">
	<a class="back-to-top"></a>
<?php 
	include("include/block-header.php");
	include("include/block-category_header.php");

	include("block-basket.php");
	?>
	
<div id="block-content">
	<div id="history">
			<div id="go-back">
	<a onclick="goBack()">Վերադառնալ</a>
				</div>
		<div id="history-a">
	<a href="/">Գլխավոր էջ </a>	
			</div>
		</div>
	<script>
function goBack() {
  window.history.back();
}
</script>
	<div id="block-sorting">
		
		<ul id="options-list">
		<li>Տեսք </li>
		<li><a><img src="Images/grid-icon.png" id="style-grid" width="25px"></a></li>
		<li><a><img src="Images/List-icon.png" id="style-list" width="25px"></a></li>
			<?php
			echo '
<li class="sorting">Դասավորություն՝</li>
<li><a id="select-sort">Առանց դասավորության</a>
<ul id="sorting-list">
<li class="active-sorting">Առանց դասավորության</li>
<li><a href="sorting-asc.php?cat='.$cat.'&type='.$type.'">Սկզբում էժանները</a></li>
<li><a href="sorting-desc.php?cat='.$cat.'&type='.$type.'">Սկզբում թանկերը</a></li>
</ul>
';
	?>
		</ul>
	</div>
	<ul id="block-tovar-grid">
	<?php
	
if (!empty($cat) && !empty($type)) 
 {
  
     $querycat = "AND brand='$cat' AND type_tovara='$type'";
     $catlink = "cat=$cat&"; 
    
 }else
 {
    
    if (!empty($type))
    {
       $querycat = "AND type_tovara='$type'"; 
    }else
    {
       $querycat = ""; 
    }
   
       if (!empty($cat))
    {
       $catlink = "cat=$cat&"; 
    }else
    {
       $catlink = ""; 
    } 
    
      
 }  

		
	$num = 20; // Здесь указываем сколько хотим выводить товаров.
    $page = (int)$_GET['page'];              
    
	$count = mysql_query("SELECT COUNT(*) FROM table_products WHERE visible = '1' $querycat",$link);
    $temp = mysql_fetch_array($count);

	If ($temp[0] > 0)
	{  
	$tempcount = $temp[0];

	// Находим общее число страниц
	$total = (($tempcount - 1) / $num) + 1;
	$total =  intval($total);

	$page = intval($page);

	if(empty($page) or $page < 0) $page = 1;  
       
	if($page > $total) $page = $total;
	 
	// Вычисляем начиная с какого номера
    // следует выводить товары 
	$start = $page * $num - $num;

	$qury_start_num = " LIMIT $start, $num"; 
	} 
		
	$result = mysql_query("SELECT * FROM table_products WHERE visible='1' $querycat $qury_start_num",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		
		do{
			
if  ($row["image"] != "" && file_exists("./uploads_images/".$row["image"]))
{
$img_path = './uploads_images/'.$row["image"];
$max_width = 140; 
$max_height = 140; 
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
		<li>
		<div class="grid-best-price'.$row["leader"].'"></div>
		<div class="grid-new-sale'.$row["new"].'"></div>
		<div class="block-images-grid">
		<center><a href="http://html.loc/products/'.$row["products_id"].'-'.ftranslite($row["title"]).'/"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" id="image-opacity"></a></center>
		</div>
		<h5 class="style-title-grid"><a href="http://html.loc/products/'.$row["products_id"].'-'.ftranslite($row["title"]).'/"  >'.$row["title"].'</a></h5>
		<div id="type'.$row["type_count"].'">
		<p id="type_count-list">(1 '.$row["type_count"].'= '.$row["price"].' դրամ)</p>
		</div>
		<center><a href="http://html.loc/products/'.$row["products_id"].'-'.ftranslite($row["title"]).'/"><div class="grid-sale'.$row["sale"].'"><span>'.$row["old_price"].' դրամ</span></div></a></center>
		<div id="price-add">
		<a class="add-cart-style-grid" tid="'.$row["products_id"].'"></a>
		<p class="style-price-grid"><b>'.group_numerals($row["price"]).'</b> դրամ</p>
		</li>
		';
		}
		while ($row = mysql_fetch_array($result));
	}
	?>
	
	</ul>
		<ul id="block-tovar-list" style="padding-left: 3px;">
	
	<?php
	
	$result = mysql_query("SELECT * FROM table_products WHERE visible='1' $querycat $qury_start_num",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		
		do{
			
if  ($row["image"] != "" && file_exists("./uploads_images/".$row["image"]))
{
$img_path = './uploads_images/'.$row["image"];
$max_width = 140; 
$max_height = 140; 
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
		<li>
		<div class="list-best-price'.$row["leader"].'"></div>
		<div class="list-new-sale'.$row["new"].'"></div>
		<div class="block-images-list">
		<center>
		<a href="http://html.loc/products/'.$row["products_id"].'-'.ftranslite($row["title"]).'/"><img src="'.$img_path.'" width="'.$width.'" height="'.$height.'"></a>
		</center>
		</div>
		<p class="style-price-list" align="right"><b>'.group_numerals($row["price"]).'</b> դրամ
		<center><a href="http://html.loc/products/'.$row["products_id"].'-'.ftranslite($row["title"]).'/"><div class="list-sale'.$row["sale"].'"><span>'.$row["old_price"].' դրամ</span></div></a></center>
		</p>
		<div id="type'.$row["type_count"].'">
		<p id="type_count-grid">(1 '.$row["type_count"].'= '.$row["price"].' դրամ)</p>
		</div>
		<p class="add"><a class="add-cart-style-list" tid="'.$row["products_id"].'"></a></p>
		<div id="title-mini_description">
		<p class="style-title-list"><a href="http://html.loc/products/'.$row["products_id"].'-'.ftranslite($row["title"]).'/">'.$row["title"].'</a></p>
		<div class="style-text-list">
		'.$row["mini_description"].' 
		<div>
		</div>
		</li>
		';
			
		}
		while ($row = mysql_fetch_array($result));
	}
	
echo '</ul>';

if ($page != 1){ $pstr_prev = '<li><a class="pstr-prev" href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 1).'">&lt;</a></li>';}
if ($page != $total) $pstr_next = '<li><a class="pstr-next" href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 1).'">&gt;</a></li>';

// Формируем ссылки со страницами
if($page - 5 > 0) $page5left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 5).'">'.($page - 5).'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 4).'">'.($page - 4).'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 3).'">'.($page - 3).'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 2).'">'.($page - 2).'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page - 1).'">'.($page - 1).'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 5).'">'.($page + 5).'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 4).'">'.($page + 4).'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 3).'">'.($page + 3).'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 2).'">'.($page + 2).'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.($page + 1).'">'.($page + 1).'</a></li>';


if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="view_cat.php?cat='.$cat.'&type='.$type.'&page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}

if ($total > 1)
{
    echo '
    <div class="pstrnav">
    <ul>
    ';
    echo $pstr_prev.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='view_cat.php?cat=".$cat."&type=".$type."&page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$pstr_next;
    echo '
    </ul>
    </div>
    ';
}	
	?>
	</ul>
	</div>

<?php
	include("include/block-random.php");
	include("include/block-footer.php");
?>
</div>
</body>
</html>