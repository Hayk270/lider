<?php
	defined('lidmarshop123456') or header("Location: ../index.php");
 if ($_SESSION['auth'] != 'yes_auth' && $_COOKIE["rememberme"])
  {
    
  $str = $_COOKIE["rememberme"];
  
  // Вся длина строки
  $all_len = strlen($str);
  // Длина логина
  $email_len = strpos($str,'+'); 
  // Обрезаем строку до Плюса и получаем Логин
  $email = clear_string(substr($str,0,$email_len));
  
  // Получаем пароль 
  $pass = clear_string(substr($str,$email_len+1,$all_len));

  
     $result = mysql_query("SELECT * FROM reg_user WHERE ( email = '$email') AND pass = '$pass'",$link);
If (mysql_num_rows($result) > 0)
{
    $row = mysql_fetch_array($result);
    session_start();
    $_SESSION['auth'] = 'yes_auth'; 
    $_SESSION['auth_pass'] = $row["pass"];
    $_SESSION['auth_surname'] = $row["surname"];
    $_SESSION['auth_name'] = $row["name"];
    $_SESSION['auth_street'] = $row["street"];
	$_SESSION['auth_house'] = $row["house"];
	$_SESSION['auth_enter'] = $row["enter"];
	$_SESSION['auth_flat'] = $row["flat"];
	$_SESSION['auth_floar'] = $row["floar"];
	$_SESSION['auth_additional'] = $row["additional"];
    $_SESSION['auth_phone'] = $row["phone"];
    $_SESSION['auth_email'] = $row["email"];

}
  }
?>