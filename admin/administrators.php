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

$_SESSION['urlpage'] = "<a href='index.php' >Գլխավոր</a> \ <a href='administrators.php' >Ադմինիստրատորներ</a>";

 include("include/db_connect.php");
include("include/functions.php");             
$id = clear_string($_GET["id"]);
$action = $_GET["action"];
if (isset($action))
{
   switch ($action) {
        
        case 'delete':
		   if($_SESSION['auth_admin_login'] == 'admin'){
         $delete = mysql_query("DELETE FROM reg_admin WHERE id = '$id'",$link);      
		   }else {
			   $msgerror = 'Դուք իրավունք չունեք հեռացնել ադմինիստրատորին';
		   }
	    break;
        
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
	<title>Ղեկավարման վահանակ | Ադմինիստրատորներ</title>
</head>
<body>
	<div id="block-body">
<?php
	include("include/block-header.php");
?>
	<div id="block-content">
		<?php
	if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';
		if($_SESSION['view_admin'] == '1')
		{
		?>
		<div id="block-parameters">
		<p id="title-page" >Ադմինիստրատորներ</p>
<p align="right" id="add-style"><a href="add-administrators.php" >Ավելացնել ադմինիստրատոր</a></p>
		</div>
		<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';

	$result = mysql_query("SELECT * FROM reg_admin ORDER BY id DESC",$link);
 
 if (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{  
    
echo '
<ul id="list-admin" >
<li>
<h3>'.$row["fio"].'</h3>
<p>Պաշտոն<strong> - '.$row["role"].'</strong></p>
<p>Էլ. փոստ<strong> - '.$row["email"].'</strong></p>
<p>Հեռախոսահամար<strong> - '.$row["phone"].'</strong></p>
<p class="links-actions" align="right" ><a class="green" href="edit_administrators.php?id='.$row["id"].'" >Փոփոխել</a> | <a class="delete" rel="administrators.php?id='.$row["id"].'&action=delete" >Հեռացնել</a></p>
</li>
</ul>   
    ';
    
    
} while ($row = mysql_fetch_array($result));
}
		}else {
	 echo '<p id="form-error" align="center">Դուք իրավունք չունեք դիտել ադմինիստրատորներին</p>';
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