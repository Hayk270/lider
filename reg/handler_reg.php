<?php
 if($_SERVER["REQUEST_METHOD"] == "POST")
{ 
	 define('lidmarshop123456', true);
 session_start();
 include("../include/db_connect.php");
 include("../functions/functions.php");
 
     $error = array();
         
        $pass = iconv("UTF-8", "cp1251",strtolower(clear_string($_POST['reg_pass']))); 
        $name = iconv("UTF-8", "cp1251",clear_string($_POST['reg_name'])); 
        $email = iconv("UTF-8", "cp1251",clear_string($_POST['reg_email'])); 
 
 
    if (strlen($email) < 2)
    {
       $error[] = "Էլ. փոստի հասցեն նվազագույնը 2 նիշ"; 
    }
    else
    {   
     $result = mysql_query("SELECT email FROM reg_user WHERE email = '$email'",$link);
    If (mysql_num_rows($result) > 0)
    {
       $error[] = "Էլ. փոստը գոյություն ունի";
    }
            
    }
     
    if (strlen($pass) < 6) $error[] = "Գաղտնաբառը նվազագույնը 6 նիշ";
    if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))) $error[] = "Էլ. փոստի հասցեն ամբողջական չէ";
    
   if (count($error))
   {
    
 echo implode('<br />',$error);
     
   }else
   {   
        $pass   = md5($pass);
        $pass   = strrev($pass);
        $pass   = "shdaa154asf".$pass."32a1f65asij";
        
        $ip = $_SERVER['REMOTE_ADDR'];
		
mysql_query("INSERT INTO reg_user (pass,name,email,datetime,ip)
						VALUES(
							'".$pass."',
							'".$name."',
                            '".$email."',
                            NOW(),
                            '".$ip."'							
						)",$link);

 echo 'true';
 }        


}
?>