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
	<title>Մեր մասին | Lider Market</title>
</head>
	
<body>
<div id="block-body">

<?php
	include("include/block-header.php");
?>
<div id="block-left-contact">
<h3>Մեր մասին</h3>
<ul>
<a class="active-about" style="cursor:default"><li>Lidermarket.am-ի մասին</li></a>
<a href="vacancy.php" ><li>Աշխատատեղեր</li></a>
<a href="contact_us.php"><li class="contact">Կապ մեզ հետ</li></a>
</ul>
</div>
	<div id="about-lider">
	<h1>Մեր Մասին</h1>
		<p>Այսուհետ գնումներ կատարելու համար հարկադրված չեք լինի այցելել Lider մարկետ <span></span> հատկապես, եթե այն ձեր բնակավայրից հեռու է գտնվում: Ձեզ անհրաժեշտ ապրանքները <span></span> ձեռք բերելու համար կարող եք օգտվել մեր մարկետի կայքէջից:
		</p>
		<p>
		Lider մարկետի կայքէջում անընդհատ թարմացվող բազայում ընդգրկված հազարավոր <span></span> ապրանքատեսականին, ընտրության և որոնման պարզ գործիքներոը հնարավորություն <span></span> կտան ձեզ հետաքրքրող ցանկացած ապրանք գտնել, ուսումնասիրել, արագ և <span></span> հեշտությամբ գնումներ կատարել ցանկացած վայրից:
		</p>
		<p></p>
		<div>Սիրով սպասում ենք ձեր պատվերներին:</div>
		</div>
	<div style="margin-top: 210px">
	<?php
	include("include/block-footer.php");
	?>
	</div>
</div>
</body>
</html>

