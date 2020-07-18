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

$_SESSION['urlpage'] = "<a href='index.php' >Գլխավոր</a> \ <a href='add-administrators.php' >Ադմինիստրատորի փոփոխում</a>";

 include("include/db_connect.php");
include("include/functions.php"); 
$id = clear_string($_GET["id"]);

if ($_POST["submit_edit"])
{
	if($_SESSION['auth_admin_login'] == 'admin')
	{
    $error = array();
    
    if (!$_POST["admin_login"]) $error[] = "Գրեք մուտքանունը";
    if ($_POST["admin_pass"])
    {
    $pass   = md5(clear_string($_POST["admin_pass"]));
    $pass   = strrev($pass);
    $pass   = "pass='".strtolower("jkshdjhasd54651354654".$pass."ahsgdjkasdas24546435646")."',";      
    }

    if (!$_POST["admin_fio"]) $error[] = "Գրեք ԱԱՀ-ն";
    if (!$_POST["admin_role"]) $error[] = "Գրե՛ք պաշտոնը";
    if (!$_POST["admin_email"]) $error[] = "Գրե՛ք էլ. փոստը";

 if (count($error))
 {
    $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
 }else
 {
          $querynew = "login='{$_POST["admin_login"]}',$pass fio='{$_POST["admin_fio"]}',role='{$_POST["admin_role"]}',email='{$_POST["admin_email"]}',phone='{$_POST["admin_phone"]}',view_orders='{$_POST["view_orders"]}',accept_orders='{$_POST["accept_orders"]}',delete_orders='{$_POST["delete_orders"]}',add_tovar='{$_POST["add_tovar"]}',edit_tovar='{$_POST["edit_tovar"]}',delete_tovar='{$_POST["delete_tovar"]}',view_clients='{$_POST["view_clients"]}',delete_clients='{$_POST["delete_clients"]}',add_category='{$_POST["add_category"]}',delete_category='{$_POST["delete_category"]}',view_admin='{$_POST["view_admin"]}',view_indexphp='{$_POST["view_indexphp"]}'"; 
           
          $update = mysql_query("UPDATE reg_admin SET $querynew WHERE id = '$id'",$link); 
     
          $_SESSION['message'] = "<p id='form-success'>Օգտատերը հաջողությամբ փոփոխվել է</p>";
 }      
	}else {
		$msgerror = 'Դուք իրավունք չունեք փոփոխել ադմինիստրատոր';
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
	<title>Ղեկավարման վահանակ | Ադմինիստրատորի փոփոխում</title>
</head>
<body>
	<div id="block-body">
<?php
	include("include/block-header.php");
?>
	<div id="block-content">
		<div id="block-parameters">
		<p id="title-page">Ադմինիստրատորի փոփոխում</p>
		</div>
		<?php
	if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';
	if(isset($_SESSION['message']))
  {
	echo $_SESSION['message'];
	unset($_SESSION['message']);
  }
	
	$result = mysql_query("SELECT * FROM reg_admin WHERE id='$id'",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
	
if ($row["view_orders"] == "1") $view_orders = "checked";
if ($row["accept_orders"] == "1") $accept_orders = "checked";
if ($row["delete_orders"] == "1") $delete_orders = "checked";
if ($row["add_tovar"] == "1") $add_tovar = "checked";
if ($row["edit_tovar"] == "1") $edit_tovar = "checked";
if ($row["delete_tovar"] == "1") $delete_tovar = "checked";
if ($row["view_clients"] == "1") $view_clients = "checked";
if ($row["delete_clients"] == "1") $delete_clients = "checked";
if ($row["view_admin"] == "1") $view_admin = "checked";
if ($row["view_indexphp"] == "1") $view_indexphp = "checked";
if ($row["add_category"] == "1") $add_category = "checked";
if ($row["delete_category"] == "1") $delete_category = "checked";		
echo '<form method="post" id="form-info" autocomplete="off">
<ul id="info-admin">
<li><label>Մուտքանուն</label><input type="text" name="admin_login" value="'.$row["login"].'"></li>
<li><label>Նոր գաղտնաբառ</label><input type="password" name="admin_pass"></li>
<li><label>Ա Ա Հ</label><input type="text" name="admin_fio" value="'.$row["fio"].'"></li>
<li><label>Պաշտոն</label><input type="text" name="admin_role" value="'.$row["role"].'"></li>
<li><label>էլ. փոստ</label><input type="text" name="admin_email" value="'.$row["email"].'"></li>
<li><label>Հեռախոսահամար</label><input type="text" name="admin_phone" value="'.$row["phone"].'"></li>
</ul>
<div id="bottom-line"></div>
<h3 id="title-privilege" >Արտոնություններ</h3>

<p id="link-privilege"><a id="select-all" >Ընտրել բոլորը</a> | <a id="remove-all" >Հանել բոլորը</a></p>

<div class="block-privilege">

<ul class="privilege">
<li><h3>Պատվերներ</h3></li>

<li>
<input type="checkbox" name="view_orders" id="view_orders" value="1" '.$view_orders.'>
<label for="view_orders">Պատվերներ դիտում.</label>
</li>

<li>
<input type="checkbox" name="accept_orders" id="accept_orders" value="1" '.$accept_orders.'>
<label for="accept_orders">Պատվերների մշակում.</label>
</li>

<li>
<input type="checkbox" name="delete_orders" id="delete_orders" value="1" '.$delete_orders.'>
<label for="delete_orders">Պատվերների հեռացում.</label>
</li>

</ul>
<ul class="privilege">
<li><h3>Ապրանքներ</h3></li>

<li>
<input type="checkbox" name="add_tovar" id="add_tovar" value="1" '.$add_tovar.'>
<label for="add_tovar">Ապրանքների ավելացում.</label>
</li>

<li>
<input type="checkbox" name="edit_tovar" id="edit_tovar" value="1" '.$edit_tovar.'>
<label for="edit_tovar">Ապրանքների փոփոխում.</label>
</li>

<li>
<input type="checkbox" name="delete_tovar" id="delete_tovar" value="1" '.$delete_tovar.'>
<label for="delete_tovar">Ապրանքների հեռացում.</label>
</li>

</ul>
	
</div>
<div class="block-privilege">

<ul class="privilege">
<li><h3>Հաճախորդներ</h3></li>

<li>
<input type="checkbox" name="view_clients" id="view_clients" value="1" '.$view_clients.'>
<label for="view_clients">Հաճախորդների դիտում.</label>
</li>

<li>
<input type="checkbox" name="delete_clients" id="delete_clients" value="1" '.$delete_clients.'>
<label for="delete_clients">Հաճախորդների հեռացում.</label>
</li>

</ul>

<ul class="privilege">
<li><h3>Կատեգորիաներ</h3></li>

<li>
<input type="checkbox" name="add_category" id="add_category" value="1" '.$add_category.'>
<label for="add_category">Կատեգորիաների ավելացում.</label>
</li>

<li>
<input type="checkbox" name="delete_category" id="delete_category" value="1" '.$delete_category.'>
<label for="delete_category">Կատեգորիաների հեռացում.</label>
</li>

</ul>

</div>

<div class="block-privilege">

<ul class="privilege">
<li><h3>Ադմինիստրատորներ</h3></li>

<li>
<input type="checkbox" name="view_admin" id="view_admin" value="1" '.$view_admin.'>
<label for="view_admin">Ադմինիստրատորների դիտում.</label>
</li>

<li>
<input type="checkbox" name="view_indexphp" id="view_indexphp" value="1" '.$view_indexphp.'>
<label for="view_indexphp">Գլխավոր էջի դիտում.</label>
</li>

</ul>

</div>

<p align="right"><input type="submit" id="submit_form_2" name="submit_edit" value="Փոփոխել"/></p>
</form>';
}
	 while($row = mysql_fetch_array($result));
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