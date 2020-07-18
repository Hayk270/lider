<?php
define('lidmarshop123456', true);
session_start();
include("include/db_connect.php");
include("functions/functions.php");
include("include/auth_cookie.php");

$id = clear_string($_GET["id"]);
$action = clear_string($_GET["action"]);
?>

<!DOCTYPE HTML>
<html lang="hy">
<head>
	<link rel="icon" href="Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <link href="CSS/reset.css" rel="stylesheet" type="text/css" />
    <link href="CSS/shop.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousellite.js"></script>
	<script type="text/javascript" src="js/shop-script.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="js/TextChange.js"></script>
	<title>Lider Market | Գլխավոր</title>
</head>
	
<body>
	
<div id="block-body">
	
<a class="back-to-top"></a>
		
<div id="block-content">
	<?php
	include("include/block-header.php");
?>
	<div id="history">
			<div id="go-back">
	<a onclick="goBack()">Վերադառնալ</a>
				</div>
		<div id="history-a">
	<a href="/">Գլխավոր էջ </a>	
			</div>
		</div>
	<script>
function goBack() {
  window.history.back();
}
</script>
	<div id="error-404">
	<h3>Էջը չի գտնվել</h3>
	</div>
<?php
	include("include/block-footer.php");
?>
</div>
	</div>
</body>
</html>