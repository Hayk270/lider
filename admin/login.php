<?php
	session_start();
	define('lidmarshop123456', true);
    include("include/db_connect.php");
    include("include/functions.php");

    
 if ($_POST["submit_enter"])
 {
    $login = clear_string($_POST["input_login"]);
    $pass  = clear_string($_POST["input_pass"]);
    
  
 if ($login && $pass)
  {
	$pass   = md5($pass);
    $pass   = strrev($pass);
    $pass   = strtolower("jkshdjhasd54651354654".$pass."ahsgdjkasdas24546435646");
   $result = mysql_query("SELECT * FROM reg_admin WHERE login = '$login' AND pass = '$pass'",$link);
	 
   
 if (mysql_num_rows($result) > 0)
  {
    $row = mysql_fetch_array($result);
 
    $_SESSION['auth_admin'] = 'yes_auth'; 
	$_SESSION['auth_admin_login'] = $row["login"];
	// Должность
    $_SESSION['admin_role'] = $row["role"];
    // Привилегии
      // Заказы
    $_SESSION['accept_orders'] = $row["accept_orders"];
    $_SESSION['delete_orders'] = $row["delete_orders"];
    $_SESSION['view_orders'] = $row["view_orders"];
      // Товары  
    $_SESSION['delete_tovar'] = $row["delete_tovar"];
    $_SESSION['add_tovar'] = $row["add_tovar"];
    $_SESSION['edit_tovar'] = $row["edit_tovar"];   
     // Клиенты
    $_SESSION['view_clients'] = $row["view_clients"];
    $_SESSION['delete_clients'] = $row["delete_clients"]; 
      // Категории
    $_SESSION['add_category'] = $row["add_category"]; 
    $_SESSION['delete_category'] = $row["delete_category"];  
    // Администраторы
    $_SESSION['view_admin'] = $row["view_admin"];
	$_SESSION['view_indexphp'] = $row["view_indexphp"];
    header("Location: index.php");
  }else
  {
        $msgerror = "Սխալ մուտքանուն և(կամ) գաղտնաբառ"; 
  }

        
    }else
    {
        $msgerror = "Լրացրեք բոլոր դաշտերը";
    }
 
 }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hy" lang="hy">

<head>
	<link rel="icon" href="../Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style-login.css" rel="stylesheet" type="text/css" />
	<title>Կառավարման վահանակ - Մուտք</title>
</head>
<body>

<div id="block-pass-login" >
<?php
	
    if ($msgerror)
    {
        echo '<p id="msgerror" >'.$msgerror.'</p>';
        
    }
    
?>
<form method="post" autocomplete="off">
<ul id="pass-login">
<li><label>Մուտքանուն</label><input type="text" name="input_login" /></li>
<li><label>Գաղտնաբառ</label><input type="password" name="input_pass" /></li>
</ul>
<p align="right"><input type="submit" name="submit_enter" id="submit_enter" value="Մուտք" /></p>
</form>

</div>


</body>
</html>