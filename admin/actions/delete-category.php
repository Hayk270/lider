<?php
if($_SERVER["REQUEST_METHOD"] == "POST")
{
define('lidmarshop123456', true); 
include("../include/db_connect.php"); 

          $delete = mysql_query("DELETE FROM category WHERE id = '{$_POST["id"]}'",$link); 
          echo "delete";   
}
?>