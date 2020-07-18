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
	<title>Կապ մեզ հետ | Lider Market</title>
</head>
	
<body>
<div id="block-body">
<a class="back-to-top"></a>
<?php
	include("include/block-header.php");
?>
	<div style="min-height: 740px!important;">
<div id="block-left-contact">
<h3>Մեր մասին</h3>
<ul>
<a href="about_lider.php"><li>Lidermarket.am-ի մասին</li></a>
<a href="vacancy.php"><li class="">Աշխատատեղեր</li></a>
<a class="active-about" style="cursor:default"><li class="contact">Կապ մեզ հետ</li></a>
</ul>
</div>
	<div style="position:relative;overflow:hidden;" id="map-yandex">
		<h2>Կապ</h2>
		<div id="about-vis"><div class="cont-left">
<div class="cont-text">Զանգերի կենտրոն</div>
<div class="cont-tel-big">
<span id="plus">+</span> 374 (55) 10 99 10
</div>
<p>
<a class="start" href="skype:+37495577568">
<img height="26" width="26" alt="Skype զանգ" style="border: none;" src="../Images/skype-icon.png">
<span>Skype զանգ</span>
</a>
</p>
<div class="cont-a">
<a href="user_guide.php">Օգտագործողի ուղեցույց</a>
	<p></p>
<a href="">Առաքում և վճարում</a>
</div>
</div>
<div class="right-block">
<div class="lider_group">LIDER</div>
<div class="lider_about">
<div class="lider_address"><b>Հասցե` &nbsp;</b>ՀՀ, Երևան,
<br>
Կոմիտաս 33</div>
<div class="lider_phone"><b>Հեռ.`</b><span class="ml-8">&nbsp;&nbsp;+ 374 (55) 10 99 10</span></div>
<div class="lider_mail"><b>Էլ.փոստ` &nbsp;&nbsp;&nbsp;</b><a id="lider_mail" href="mailto:info@lider.am">info@lider.am</a></div>
</div>
	<a href="feedback.php">
<div class="send_message_lider">
	<a href="feedback.php">Նամակ ուղարկել</a>
</div>
	</a>
</div>
</div>
	<h3>Մեր խանութի հասցեն</h3>
<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Aec10d83e4cee0601b721b4ce69d54a9a69857addd7e02164685959bd161bda6d&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
	</div>
	<?php
	include("include/block-footer.php");
?>
</div>
</div>
</body>
</html>

