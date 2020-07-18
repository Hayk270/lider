<?php
define('lidmarshop123456', true);
if($_SERVER["REQUEST_METHOD"] == "POST")
{    
include("../include/db_connect.php");
include("../functions/functions.php");

$email = clear_string($_POST['reg_email']);

$result = mysql_query("SELECT email FROM reg_user WHERE email = '$email'",$link);
if (mysql_num_rows($result) > 0)
{
   echo 'false';
}
else
{
   echo 'true'; 
}
}
?>