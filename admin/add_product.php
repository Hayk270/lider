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

$_SESSION['urlpage'] = "<a href='index.php' >Գլխավոր</a> \ <a href='tovar.php' >Ապրանքներ</a> \ <a>Ավելացնել ապրանք</a>";
	
 include("include/db_connect.php");

include("include/functions.php"); 
   
	if ($_POST["submit_add"])
    {
if($_SESSION['add_tovar'] == '1')
{
      $error = array();
    
    // Проверка полей
        
       if (!$_POST["form_title"])
      {
         $error[] = "Գրե՛ք ապրանքի անվանումը";
      }
	
		if (!$_POST["form_seo_words"])
      {
         $error[] = "Գրե՛ք բանալի բառերը";
      }
	
		if (!$_POST["form_mini_description"])
      {
         $error[] = "Գրե՛ք կարճ բնութագիրը";
      }
      
       if (!$_POST["form_price"])
      {
         $error[] = "Գրե՛ք գինը";
      }
          
       if (!$_POST["form_category"])
      {
         $error[] = "Ընտրե՛ք ենթախումբը";         
      }else
      {
       	$result = mysql_query("SELECT * FROM category WHERE id='{$_POST["form_category"]}'",$link);
        $row = mysql_fetch_array($result);
        $selectbrand = $row["brand"];

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
                           
              		mysql_query("INSERT INTO table_products(title,price,old_price,brand,type_tovara,seo_words,mini_description,datetime,new,leader,sale,visible,filtr_id,type_count)
						VALUES(						
                            '".$_POST["form_title"]."',
                            '".$_POST["form_price"]."',
							'".$_POST["form_old_price"]."',
                            '".$selectbrand."',
							'".$_POST["form_type"]."',
							'".$_POST["form_seo_words"]."',
                           	'".$_POST["form_mini_description"]."',
						    NOW(),
                            '".$chk_new."',
                            '".$chk_leader."',
                            '".$chk_sale."',
                            '".$chk_visible."',
                            '".$_POST["form_category"]."',
							'".$_POST["count_type"]."'
						)",$link);
                   
      $_SESSION['message'] = "<p id='form-success'>Ապրանքը հաջողությամբ ավելացվել է</p>";
      $id = mysql_insert_id();
                 
       if (empty($_POST["upload_image"]))
      {        
      include("actions/upload-image.php");
      unset($_POST["upload_image"]);           
      } 
}
 }else {
	$msgerror = 'Դուք ապրանք ավելացնելու իրավունք չունեք';
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
	<title>Ղեկավարման վահանակ</title>
</head>
<body>
	<div id="block-body">
<?php
	include("include/block-header.php");
?>
	<div id="block-content">
		<div id="block-parameters">
		<p id="title-page">Ավելացնել ապրանք</p>
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
<form enctype="multipart/form-data" method="post" autocomplete="off">
<ul id="edit-tovar">

<li>
<label>Ապրանքի անվանում՝</label>
<input type="text" name="form_title">
</li>

<li>
<label>Գին՝</label>
<input type="text" name="form_price" >
</li>
	
<li>
<label>Հին գին՝</label>
<input type="text" name="form_old_price" >
</li>	
	
<li>
<label>Բանալի բառեր՝</label>
<input type="text" name="form_seo_words">
</li>
	
<li>
<label>Կարճ բնութագիր՝</label>
<textarea name="form_mini_description"></textarea>
</li>
<li>
	
<label>Ապրանքի խումբը՝</label>
<select name="form_type" id="type" size="1" >

<option value="Հացաբուլկեղեն և թխվածքներ" >Հացաբուլկեղեն և թխվածք</option>
<option value="Կաթնամթերք" >Կաթնամթերք</option>
<option value="Նպարեղեն" >Նպարեղեն</option>
<option value="Քաղցրավենիք" >Քաղցրավենիք</option>
<option value="Հյութեր ըմպելիքներ" >Հյութեր ըմպելիքներ</option>
<option value="Սուրճ և թեյ" >Սուրճ և թեյ</option>
<option value="Ալկոհոլային խմիչքներ" >Ալկոհոլային խմիչքներ</option>
<option value="Ծխախոտային արտադրանք" >Ծխախոտային արտադրանք</option>
<option value="Մսամթերք" >Մսամթերք</option>
<option value="Թռչնամիս և ձու" >Թռչնամիս և ձու</option>
<option value="Սառեցված մթերք">Սառեցված մթերք</option>
<option value="Պահածոյացված մթերքներ" >Պահածոյացված մթերքներ</option>
<option value="Ամեն ինչ կենդանիների համար" >Ամեն ինչ կենդանիների համար</option>
<option value="Տնտեսական ապրանքներ" >Տնտեսական ապրանքներ</option>


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
<label>Ապրանքի ենթախումբը՝</label>
<select name="form_category" size="10" >

<?php
$category = mysql_query("SELECT * FROM category",$link);
    
if (mysql_num_rows($category) > 0)
{
$result_category = mysql_fetch_array($category);
do
{
  
  echo '
  
  <option value="'.$result_category["id"].'" >'.$result_category["brand"].'</option>
  
  ';
    
}
 while ($result_category = mysql_fetch_array($category));
}
?> 

</select>
</ul> 
<label class="stylelabel">Նկար՝</label>

<div id="baseimg-upload">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
<input type="file" name="upload_image" />

</div>

     
<h3 class="h3title" >Ապրանքի տվյալները</h3>   
<ul id="chkbox">
<li><input type="checkbox" name="chk_visible" id="chk_visible" checked><label for="chk_visible">Ցուցադրվող ապրանք</label></li>
<li><input type="checkbox" name="chk_new" id="chk_new"><label for="chk_new" >Նոր ապրանք</label></li>
<li><input type="checkbox" name="chk_leader" id="chk_leader"  /><label for="chk_leader" >Վաճառքի առաջատար ապրանք</label></li>
<li><input type="checkbox" name="chk_sale" id="chk_sale"  /><label for="chk_sale" >Ակցիա ապրանք</label></li>
</ul> 


    <p align="right" ><input type="submit" id="submit_form" name="submit_add" value="Ավելացնել ապրանք"/></p>     
</form>
		
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