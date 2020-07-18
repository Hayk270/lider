<?php
define('lidmarshop123456', true);
session_start();
include("include/db_connect.php");
include("functions/functions.php");
include("include/auth_cookie.php");
$id = clear_string($_GET["id"]);
$action = clear_string($_GET["action"]);
    
   switch ($action) {

	    case 'clear':
        $clear = mysql_query("DELETE FROM cart WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);  
		   ?>
		<script>
		goBack();
			
		function goBack() {
  		window.history.back();
		}
		</script>';
<?php
	    break;
        case 'delete':     
        $delete = mysql_query("DELETE FROM cart WHERE cart_id = '$id' AND cart_ip = '{$_SERVER['REMOTE_ADDR']}'",$link);
		   ?>
		<script>
		goBack();
			
		function goBack() {
  		window.history.back();
		}
		</script>';
<?php
        break; 
	}
?>
<!DOCTYPE HTML>
<html lang="hy">
<head>
	<link rel="icon" href="Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
    <link href="CSS/reset.css" rel="stylesheet" type="text/css" />
    <link href="CSS/shop.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousellite.js"></script>
	<script type="text/javascript" src="js/shop-script.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="js/TextChange.js"></script>
    <meta charset="utf-8" />
	<title>Lider Market</title>
</head>

<body style="background: none!important;">
<div id="block-body" style="min-height: 1000px;">
<?php 
	include("include/block-header.php");
	include("include/block-category_header.php");
	?>
	
	<div style="margin-top:550px;">
	<?php
	include("include/block-footer.php");
?>
		</div>
	</div>
	</body>
</html>