<?php
	defined('lidmarshop123456') or header("Location: ../index.php");
function clear_string($cl_str)
{
    
 $cl_str = strip_tags($cl_str);
 $cl_str = mysql_real_escape_string($cl_str);
 $cl_str = trim($cl_str);  
    
  return $cl_str;              
}
?>
