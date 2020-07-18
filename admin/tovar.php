<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
define('lidmarshop123456', true);
if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

$_SESSION['urlpage'] = "<a href='index.php'>Գլխավոր</a> \ <a href='tovar.php' >Ապրանքներ</a>";
	
 include("include/db_connect.php");

include("include/functions.php"); 
   
$cat = $_GET["cat"]; 
$type = $_GET["type"]; 
 
if (isset($cat))
{
   switch ($cat) {

	    case 'all':

        $cat_name = 'Բոլոր ապրանքները';
        $url = "cat=all&";
	    $cat = ""; 
              

	    break;

	    case 'Հացաբուլկեղեն և թխվածք':

        $cat_name = 'Հացաբուլկեղեն և թխվածք';
        $url = "cat=Հացաբուլկեղեն և թխվածքներ&";
	    $cat = "WHERE type_tovara='Հացաբուլկեղեն և թխվածքներ'"; 
             

	    break;
        
	    case 'Կաթնամթերք':

        $cat_name = 'Կաթնամթերք';
        $url = "cat=Կաթնամթերք&";
	    $cat = "WHERE type_tovara='Կաթնամթերք'"; 
             

	    break; 
        
	    case 'Նպարեղեն':

        $cat_name = 'Նպարեղեն';
        $url = "cat=Նպարեղեն&";
	    $cat = "WHERE type_tovara='Նպարեղեն'"; 
             

	    break;
		   
		case 'Քաղցրավենիք':

        $cat_name = 'Քաղցրավենիք';
        $url = "cat=Քաղցրավենիք&";
	    $cat = "WHERE type_tovara='Քաղցրավենիք'"; 
             

	    break; 
		   
		case 'Նպարեղեն':

        $cat_name = 'Հյութեր ըմպելիքներ';
        $url = "cat=Հյութեր ըմպելիքներ&";
	    $cat = "WHERE type_tovara='Հյութեր ըմպելիքներ'"; 
             

	    break; 
		   
		case 'Սուրճ և թեյ':

        $cat_name = 'Սուրճ և թեյ';
        $url = "cat=Սուրճ և թեյն&";
	    $cat = "WHERE type_tovara='Սուրճ և թեյ'"; 
             

	    break; 
		   
		case 'Ալկոհոլային խմիչքներ':

        $cat_name = 'Ալկոհոլային խմիչքներ';
        $url = "cat=Ալկոհոլային խմիչքներ&";
	    $cat = "WHERE type_tovara='Ալկոհոլային խմիչքներ'"; 
             

	    break; 
		   
		case 'Ծխախոտային արտադրանք':

        $cat_name = 'Ծխախոտային արտադրանք';
        $url = "cat=Ծխախոտային արտադրանք&";
	    $cat = "WHERE type_tovara='Ծխախոտային արտադրանք'"; 
             

	    break;  
		   
		case 'Մսամթերք':

        $cat_name = 'Մսամթերք';
        $url = "cat=Մսամթերք&";
	    $cat = "WHERE type_tovara='Մսամթերք'"; 
             

	    break; 
		   
		case 'Թռչնամիս և ձու':

        $cat_name = 'Թռչնամիս և ձու';
        $url = "cat=Թռչնամիս և ձու&";
	    $cat = "WHERE type_tovara='Թռչնամիս և ձու'"; 
             

	    break; 
		   
		case 'Սառեցված մթերք':

        $cat_name = 'Սառեցված մթերք';
        $url = "cat=Սառեցված մթերք&";
	    $cat = "WHERE type_tovara='Սառեցված մթերք'"; 
             
		   
	    break;   
		   
		case 'Պահածոյացված մթերքներ':

        $cat_name = 'Պահածոյացված մթերքներ';
        $url = "cat=Պահածոյացված մթերքներ&";
	    $cat = "WHERE type_tovara='Պահածոյացված մթերքներ'"; 
             

	    break; 
		   
		case 'Ամեն ինչ կենդանիների համար':

        $cat_name = 'Ամեն ինչ կենդանիների համար';
        $url = "cat=Ամեն ինչ կենդանիների համար&";
	    $cat = "WHERE type_tovara='Ամեն ինչ կենդանիների համար'"; 
             

	    break; 
		   
		case 'Տնտեսական ապրանքներ':

        $cat_name = 'Տնտեսական ապրանքներ';
        $url = "cat=Տնտեսական ապրանքներ&";
	    $cat = "WHERE type_tovara='Տնտեսական ապրանքներ'"; 
             

	    break;    
        
	    default:
        
        $cat_name = $cat;
     
        $url = "type=".clear_string($type)."&cat=".clear_string($cat)."&";
        $cat = "WHERE type_tovara='".clear_string($type)."' AND brand='".clear_string($cat)."'"; 
        
             
	    break;

	} 
    
}
else
{
        $cat_name = 'Բոլոր ապրանքները';
        $url = "";
        $cat = "";        
} 	
	
$action = $_GET["action"];
if (isset($action))
{
   $id = (int)$_GET["id"]; 
   switch ($action) {

	   case 'delete':
		   if($_SESSION['delete_tovar'] == '1')
		   {
		   
          $delete = mysql_query("DELETE FROM table_products WHERE products_id = '$id'",$link);  
		   }else {
			   $msgerror = 'Դուք ապրանք հեռացնելու իրավունք չունեք';
		   }
   
	    break;
        
	} 
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hy" lang="hy">

<head>
	<link rel="icon" href="../Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>
	<title>Ղեկավարման վահանակ</title>
</head>
<body>
	<div id="block-body">
<?php
	include("include/block-header.php");
$all_count = mysql_query("SELECT * FROM table_products",$link);
$all_count_result = mysql_num_rows($all_count);
?>
	<div id="block-content">
		<div id="block-parameters">
<ul id="options-list">
<li style="margin-left:-170px;">Ապրանքներ - </li>
<li><a id="select-links" href="#"><? echo $cat_name; ?></a>
<div id="list-links" >
<ul>
<li><a href="tovar.php?cat=all"><strong id="all_tovar">Բոլոր ապրանքները</strong></a></li>
<li id="tovar_categorie"><a href="tovar.php?cat=Հացաբուլկեղեն և թխվածք"><strong id="tovar_categories">Հացաբուլկեղեն և թխվածք</strong></a></li>
<?php


 $result1 = mysql_query("SELECT * FROM category WHERE type='Հացաբուլկեղեն և թխվածքներ'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Կաթնամթերք"><strong id="tovar_categories">Կաթնամթերք</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Կաթնամթերք'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Նպարեղեն"><strong id="tovar_categories">Նպարեղեն</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Նպարեղեն'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Քաղցրավենիք"><strong id="tovar_categories">Քաղցրավենիք</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Քաղցրավենիք'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Հյութեր ըմպելիքներ"><strong id="tovar_categories">Հյութեր ըմպելիքներ</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Հյութեր ըմպելիքներ'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Սուրճ և թեյ"><strong id="tovar_categories">Սուրճ և թեյ</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Սուրճ և թեյ'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Ալկոհոլային խմիչքներ"><strong id="tovar_categories">Ալկոհոլային խմիչքներ</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Ալկոհոլային խմիչքներ'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Ծխախոտային արտադրանք"><strong id="tovar_categories">Ծխախոտային արտադրանք</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Ծխախոտային արտադրանք'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Մսամթերք"><strong id="tovar_categories">Մսամթերք</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Մսամթերք'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Թռչնամիս և ձու"><strong id="tovar_categories">Թռչնամիս և ձու</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Թռչնամիս և ձու'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Սառեցված մթերք"><strong id="tovar_categories">Սառեցված մթերք</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Սառեցված մթերք'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul>
<li><a href="tovar.php?cat=Պահածոյացված մթերքներ"><strong id="tovar_categories">Պահածոյացված մթերքներ</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Պահածոյացված մթերքներ'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul style="height:213px;">
<li><a href="tovar.php?cat=Ամեն ինչ կենդանիների համար"><strong id="tovar_categories">Ամեն ինչ կենդանիների համար</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Ամեն ինչ կենդանիների համար'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>
<ul style="height:213px;">
<li><a href="tovar.php?cat=Տնտեսական ապրանքներ"><strong id="tovar_categories">Տնտեսական ապրանքներ</strong></a></li>
<?php
 $result1 = mysql_query("SELECT * FROM category WHERE type='Տնտեսական ապրանքներ'",$link);
  If (mysql_num_rows($result1) > 0)
{
$row1 = mysql_fetch_array($result1);
do
{
    
 echo '<li><a href="tovar.php?type='.$row1["type"].'&cat='.$row1["brand"].'">'.$row1["brand"].'</a></li>';   
    
} while ($row1 = mysql_fetch_array($result1));
}
?>
</ul>	
</div>
</li>
</ul>
		</div>
		<div id="block-info">
		<p id="count-style">Ապրանքներ քանակը - <strong><?php echo $all_count_result?></strong></p>
			<p align="right" id="add-style" ><a href="add_product.php" >Ավելացնել ապրանք</a></p>
			</div>
		<ul id="block-tovar">
<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

$num = 9;

$page = (int)$_GET['page'];              

$count = mysql_query("SELECT COUNT(*) FROM table_products $cat",$link);
$temp = mysql_fetch_array($count);
$post = $temp[0];
// Находим общее число страниц
$total = (($post - 1) / $num) + 1;
$total =  intval($total);
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $page * $num - $num;
	
if ($temp[0] > 0)   
{
$result = mysql_query("SELECT * FROM table_products $cat ORDER BY products_id DESC LIMIT $start, $num",$link);
 
 if (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
    if  (strlen($row["image"]) > 0 && file_exists("../uploads_images/".$row["image"]))
{
$img_path = '../uploads_images/'.$row["image"];
$max_width = 160; 
$max_height = 160; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
// New dimensions 
$width = intval($ratio*$width); 
$height = intval($ratio*$height);    
}else
{
$img_path = "images/no-image.jpg";
$width = 90;
$height = 164;
}
  
 echo '
 <li>

 <p>'.$row["title"].'</p>
<center>
 <img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
 <div id="price_info">'.$row["price"].' դրամ</div>
</center>
<p align="center" class="link-action" >
<a class="green" href="edit_product.php?id='.$row["products_id"].'">Փոփոխել</a> | <a rel="tovar.php?'.$url.'id='.$row["products_id"].'&action=delete" class="delete" >Հեռացնել</a>
</p>
 </li> 
 ';   
    
} while ($row = mysql_fetch_array($result));
echo'
</ul>
';
} 
}  
    
if ($page != 1) $pervpage = '<li><a class="pstr-prev" href="tovar.php?'.$url.'page='. ($page - 1) .'" />Հետ</a></li>';

if ($page != $total) $nextpage = '<li><a class="pstr-next" href="tovar.php?'.$url.'page='. ($page + 1) .'"/>Հաջորդ</a></li>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = '<li><a href="tovar.php?'.$url.'page='. ($page - 5) .'">'. ($page - 5) .'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="tovar.php?'.$url.'page='. ($page - 4) .'">'. ($page - 4) .'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="tovar.php?'.$url.'page='. ($page - 3) .'">'. ($page - 3) .'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="tovar.php?'.$url.'page='. ($page - 2) .'">'. ($page - 2) .'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="tovar.php?'.$url.'page='. ($page - 1) .'">'. ($page - 1) .'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="tovar.php?'.$url.'page='. ($page + 5) .'">'. ($page + 5) .'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="tovar.php?'.$url.'page='. ($page + 4) .'">'. ($page + 4) .'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="tovar.php?'.$url.'page='. ($page + 3) .'">'. ($page + 3) .'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="tovar.php?'.$url.'page='. ($page + 2) .'">'. ($page + 2) .'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="tovar.php?'.$url.'page='. ($page + 1) .'">'. ($page + 1) .'</a></li>';

if ($page+5 < $total)
{
    $strtotal = '<li><p class="nav-point">...</p></li><li><a href="tovar.php?'.$url.'page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = ""; 
}

   
?>
<div id="footerfix"></div>
<?php
	if ($total > 1)
{
    echo '
    <center>
    <div class="pstrnav">
    <ul>   
    ';
    echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='tovar.php?".$url."page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$nextpage;
    echo ' 
    </ul>
    </div>
	</center>  
    ';
} 
?>
		</ul>
		</div>
</div>
</body>
</html>
<?php
}else
{
    header("Location: login.php");
}
?>