<?php
define('lidmarshop123456', true);
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	include('db_connect.php');
    include('../functions/functions.php');
    
    $email = clear_string($_POST["email"]);
    
    $pass   = md5(clear_string($_POST["pass"]));
    $pass   = strrev($pass);
    $pass   = strtolower("shdaa154asf".$pass."32a1f65asij");
    

    
    if ($_POST["rememberme"] == "yes")
    {
 setcookie('rememberme',$email.'+'.$pass,time()+3600*24*31, "/");
    }
    
       
   $result = mysql_query("SELECT * FROM reg_user WHERE (email = '$email') AND pass = '$pass'",$link);
if (mysql_num_rows($result) > 0)
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
    echo 'yes_auth';

}else
{
    echo 'no_auth';
}  
} 

?>