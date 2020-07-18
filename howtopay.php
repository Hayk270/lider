<?php
define('lidmarshop123456', true);
session_start();
include("include/db_connect.php");
include("functions/functions.php");
include("include/auth_cookie.php");
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
	<title>Օգտագործողի ուղեցույց | Lider Market</title>
</head>
	
<body>
<div id="block-body">
<a class="back-to-top"></a>
<?php
	include("include/block-header.php");
?>
<div id="block-left-contact">
<h3>Մեր մասին</h3>
<ul>
<a href="user_guide.php"><li>Օգտագործողի ուղեցույց</li></a>
<a href="howtoorder.php"><li>Ինչպես պատվիրել</li></a>
<a class="active-about"><li>Ինչպես վճարել</li></a>
</ul>
</div>
	<div id="user_guide" style="min-height:285px;">
	<h2>Ինչպես վճարել</h2>
		<p>Մեր մարկետում պատվերի համար վճարումն իրականացվում է կանխիկ եղանակով ՝ գումարը <span></span> վճարում եք պատվերը ստանալիս:</p> 
		</div>
	<div style="margin-top: 210px">
	<?php
	include("include/block-footer.php");
	?>
	</div>
</div>
</body>
</html>

