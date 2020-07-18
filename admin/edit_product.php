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

  $_SESSION['urlpage'] = "<a href='index.php' >Գլխավոր</a> \ <a href='tovar.php' >Ապրանքներ</a> \ <a>Ապրանքի փոփոխում</a>";
  
  include("include/db_connect.php");
  include("include/functions.php"); 
  $id = clear_string($_GET["id"]);
  $action = clear_string($_GET["action"]);
if (isset($action))
{
   switch ($action) {

	    case 'delete':
		   
		   if($_SESSION['edit_tovar'] == '1')
		   {
         
         if (file_exists("../uploads_images/".$_GET["img"]))
        {
          unlink("../uploads_images/".$_GET["img"]);  
        }   
   }else {
			   $msgerror = 'Դուք նկար հեռացնելու իրավունք չունեք';
		   }
    
	    break;

	} 
}
    if ($_POST["submit_save"])
    { 
	if($_SESSION['edit_tovar'] == '1')
		   {
      $error = array();
    
    // Проверка полей
        
       if (!$_POST["form_title"])
      {
         $error[] = "Գրե՛ք ապրանքի անվանումը";
      }
      
       if (!$_POST["form_price"])
      {
         $error[] = "Գրե՛ք գինը";
      }
		
	   if (!$_POST["form_mini_description"])
      {
         $error[] = "Գրե՛ք կարճ բնութագիրը";
      }
          
       if (!$_POST["form_category"])
      {
         $error[] = "Գրե՛ք ենթախումբը";         
      }else
      {
       	$result = mysql_query("SELECT * FROM category WHERE id='{$_POST["form_category"]}'",$link);
        $row = mysql_fetch_array($result);
        $selectbrand = $row["brand"];

      }
 
 
        if (empty($_POST["upload_image"]))
      {        
      include("actions/upload-image.php");
      unset($_POST["upload_image"]);           
      } 
      
      
 // Проверка чекбоксов
      
       if ($_POST["chk_visible"])
       {
          $chk_visible = "1";
       }else { $chk_visible = "0"; }
      
       if ($_POST["chk_new"])
       {
          $chk_new = "1";
       }else { $chk_new = "0"; }
      
       if ($_POST["chk_leader"])
       {
          $chk_leader= "1";
       }else { $chk_leader = "0"; }
      
       if ($_POST["chk_sale"])
       {
          $chk_sale = "1";
       }else { $chk_sale = "0"; }                   
      
                                      
       if (count($error))
       {           
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
            
       }else
       {
                           
       $querynew = "title='{$_POST["form_title"]}',price='{$_POST["form_price"]}',old_price='{$_POST["form_old_price"]}',brand='$selectbrand',type_tovara='{$_POST["form_type"]}',mini_description='{$_POST["form_mini_description"]}',seo_words='{$_POST["form_seo_words"]}',new='$chk_new',leader='$chk_leader',sale='$chk_sale',visible='$chk_visible',filtr_id='{$_POST["form_category"]}',type_count='{$_POST["count_type"]}'"; 
           
       $update = mysql_query("UPDATE table_products SET $querynew WHERE products_id = '$id'",$link); 
                   
      $_SESSION['message'] = "<p id='form-success'>Ապրանքը հաջողությամբ փոփոխվել է</p>";
                
} 
		}else {
			   $msgerror = 'Դուք ապրանք փոփոխելու իրավունք չունեք';
		   }
}   

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hy" lang="hy">

<head>
	<link rel="icon" href="../Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="js/script.js"></script>   
    <script type="text/javascript" src="./ckeditor/ckeditor.js"></script>  
	<title>Ղեկավարման վահանակ</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-content">
<div id="block-parameters">
<p id="title-page" >Ապրանքի փոփոխում</p>
</div>
<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

		 if(isset($_SESSION['message']))
		{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
		}
        
     if(isset($_SESSION['answer']))
		{
		echo $_SESSION['answer'];
		unset($_SESSION['answer']);
		} 
?>
<?php
	$result = mysql_query("SELECT * FROM table_products WHERE products_id='$id'",$link);
    
If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
    
echo '

<form enctype="multipart/form-data" method="post">
<ul id="edit-tovar">

<li>
<label>Ապրանքի անվանումը՝</label>
<input type="text" name="form_title" value="'.$row["title"].'" />
</li>

<li>
<label>Ապրանքի գինը՝</label>
<input type="text" name="form_price" value="'.$row["price"].'">
</li>

<li>
<label>Ապրանքի հին գինը՝</label>
<input type="text" name="form_old_price" value="'.$row["old_price"].'">
</li>

<li>
<label>Բանալի բառեր՝</label>
<input type="text" name="form_seo_words" value="'.$row["seo_words"].'">
</li>

<li>
<label>Կարճ բնութագիր՝</label>
<textarea name="form_mini_description">'.$row["mini_description"].'</textarea>
</li>
';    
    
$category = mysql_query("SELECT * FROM category",$link);
    
If (mysql_num_rows($category) > 0)
{
$result_category = mysql_fetch_array($category);

if ($row["type_tovara"] == "Հացաբուլկեղեն և թխվածքներ") $type_hac = "selected";
if ($row["type_tovara"] == "Կաթնամթերք") $type_kat = "selected";
if ($row["type_tovara"] == "Նպարեղեն") $type_nparexen = "selected";
if ($row["type_tovara"] == "Քաղցրավենիք") $type_qaxcr = "selected";
if ($row["type_tovara"] == "Հյութեր ըմպելիքներ") $type_soker = "selected";
if ($row["type_tovara"] == "Սուրճ և թեյ") $type_tey = "selected";
if ($row["type_tovara"] == "Ալկոհոլային խմիչքներ") $type_alkohol = "selected";
if ($row["type_tovara"] == "Ծխախոտային արտադրանք") $type_cxaxot= "selected";
if ($row["type_tovara"] == "Մսամթերք") $type_mis = "selected";
if ($row["type_tovara"] == "Թռչնամիս և ձու") $type_dzu = "selected";
if ($row["type_tovara"] == "Սառեցված մթերք") $type_sary = "selected";
if ($row["type_tovara"] == "Պահածոյացված մթերքներ") $type_pahaco = "selected";
if ($row["type_tovara"] == "Ամեն ինչ կենդանիների համար") $type_kendaniner = "selected";
if ($row["type_tovara"] == "Տնտեսական ապրանքներ") $type_tntesakan = "selected";	
	
echo '<li>
<label>Ապրանքի խումբը՝</label>
<select name="form_type" id="type" size="1" >

<option '.$type_hac.' value="Հացաբուլկեղեն և թխվածքներ" >Հացաբուլկեղեն և թխվածք</option>
<option '.$type_kat.' value="Կաթնամթերք" >Կաթնամթերք</option>
<option '.$type_nparexen.' value="Նպարեղեն" >Նպարեղեն</option>
<option '.$type_qaxcr.' value="Քաղցրավենիք" >Քաղցրավենիք</option>
<option '.$type_soker.' value="Հյութեր ըմպելիքներ" >Հյութեր ըմպելիքներ</option>
<option '.$type_tey.' value="Սուրճ և թեյ" >Սուրճ և թեյ</option>
<option '.$type_alkohol.' value="Ալկոհոլային խմիչքներ" >Ալկոհոլային խմիչքներ</option>
<option '.$type_cxaxot .' value="Ծխախոտային արտադրանք" >Ծխախոտային արտադրանք</option>
<option '.$type_mis.' value="Մսամթերք" >Մսամթերք</option>
<option '.$type_dzu.' value="Թռչնամիս և ձու" >Թռչնամիս և ձու</option>
<option '.$type_sary.' value="Սառեցված մթերք">Սառեցված մթերք</option>
<option '.$type_pahaco .' value="Պահածոյացված մթերքներ" >Պահածոյացված մթերքներ</option>
<option '.$type_kendaniner.' value="Ամեն ինչ կենդանիների համար" >Ամեն ինչ կենդանիների համար</option>
<option '.$type_tntesakan .' value="Տնտեսական ապրանքներ" >Տնտեսական ապրանքներ</option>


</select>
</li>
<li>
	
<label>Ապրանքի չափը՝</label>
<select name="count_type" id="type" size="1" >

<option value="հատ" >1 հատ </option>
<option value="կգ" >1կգ </option>

</select>
</li>
<li>
<label>Ենթախումբ</label>
<select name="form_category" size="10" >
';


do
{
  
  echo '
  
  <option value="'.$result_category["id"].'" >'.$result_category["brand"].'</option>
  
  ';
    
}
 while ($result_category = mysql_fetch_array($category));
}
echo '
</select>
</ul> 
';

   if  (strlen($row["image"]) > 0 && file_exists("../uploads_images/".$row["image"]))
{
$img_path = '../uploads_images/'.$row["image"];
$max_width = 110; 
$max_height = 110; 
 list($width, $height) = getimagesize($img_path); 
$ratioh = $max_height/$height; 
$ratiow = $max_width/$width; 
$ratio = min($ratioh, $ratiow); 
// New dimensions 
$width = intval($ratio*$width); 
$height = intval($ratio*$height); 

echo '
<label class="stylelabel" >Հիմնական նկար՝</label>
<div id="baseimg">
<img src="'.$img_path.'" width="'.$width.'" height="'.$height.'" />
<a href="edit_product.php?id='.$row["products_id"].'&img='.$row["image"].'&action=delete" ></a>
</div>

';
   
}else
{  
echo '
<label class="stylelabel" >Հիմնական նկար՝</label>

<div id="baseimg-upload">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
<input type="file" name="upload_image" />

</div>
';
}

if ($row["visible"] == '1') $checked1 = "checked";
if ($row["new"] == '1') $checked2 = "checked";
if ($row["leader"] == '1') $checked3 = "checked";
if ($row["sale"] == '1') $checked4 = "checked";
 

echo ' 
<h3 class="h3title" >Ապրանքի կարգավորումներ</h3>   
<ul id="chkbox">
<li><input type="checkbox" name="chk_visible" id="chk_visible" '.$checked1.' /><label for="chk_visible" checked>Ցույց տալ ապրանքը</label></li>
<li><input type="checkbox" name="chk_new" id="chk_new" '.$checked2.' /><label for="chk_new" >Նոր ապրանք</label></li>
<li><input type="checkbox" name="chk_leader" id="chk_leader" '.$checked3.' /><label for="chk_leader" >Վաճառքի առաջատար ապրանք</label></li>
<li><input type="checkbox" name="chk_sale" id="chk_sale" '.$checked4.' /><label for="chk_sale" >Ակցիա ապրանք</label></li>
</ul> 


    <p align="right" ><input type="submit" id="submit_form" name="submit_save" value="Պահպանել փոփոխությունները"/></p>     
</form>
';

}while ($row = mysql_fetch_array($result));
}
?> 
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