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
<a class="active-about"><li>Ինչպես պատվիրել</li></a>
<a href="howtopay.php"><li>Ինչպես վճարել</li></a>
</ul>
</div>
	<div id="user_guide">
	<h2>Ինչպես պատվիրել</h2>
		<p>Պատվիրելու համար ձեզ անհրաժեշտ է սեղմել կայքի վերևում գտնվող զամբյուղի նշանի վրա կամ <span></span> «Պատվիրել»՝ բոլոր էջերի աջ հատվածում գտնվող զամբյուղի ներքևի հատվածում:</p>
		<img src="Images/search.PNG" width="765px" height="700px" style="margin-top:10px;">
		<p>Դրանից հետո կարող եք լրացնել Ձեր տվյալները հաստատել դրանք սեղմելով «Հաստատել»:</p>
		<img src="Images/cart_confirm.PNG" width="765px" height="500px" style="margin-top:10px;">
		<p>Հասատելուց հետո ստուգեք դրանք և սեղմեք «Պատվիրել»:</p>
		<img src="Images/cart_completion.PNG" width="765px" height="500px" style="margin-top:10px;">
		<p>Այս ամենից հետո ձեզ մնում է միայն սպասել Ձեր պատվերին: Բարի առևտուր:</p>
		</div>
	<div style="margin-top: 210px">
	<?php
	include("include/block-footer.php");
	?>
	</div>
</div>
</body>
</html>

