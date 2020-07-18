<?php
define('lidmarshop123456', true);
if($_SERVER["REQUEST_METHOD"] == "POST")
{   
include("db_connect.php");
include("../functions/functions.php");

$email = clear_string($_POST["email"]);

if ($email != "")
{
    
   $result = mysql_query("SELECT email FROM reg_user WHERE email='$email'",$link);
If (mysql_num_rows($result) > 0)
{
    
// Генерация пароля.
    $newpass = fungenpass();
    
// Шифрование пароля.
    $pass   = md5($newpass);
    $pass   = strrev($pass);
    $pass   = strtolower("shdaa154asf".$pass."32a1f65asij");    
 
// Обновление пароля на новый.
$update = mysql_query ("UPDATE reg_user SET pass='$pass' WHERE email='$email'",$link);

    
// Отправка нового пароля.
   
	         send_mail( $email,
					   'haykkarapetyan2005@mail.ru',
						'Նոր գաղտնաբառ lidermarket.am կայքի համար',
						'Ձեր գաղտնաբառը՝ '.$newpass);   
   
   echo 'yes';
    
}else
{
    echo 'Էլ. փոստը գոյություն չունի';
}

}
else
{
    echo 'Գրե՛ք ձեր գաղտնաբառը';
}

}



?>