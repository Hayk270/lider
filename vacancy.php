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
	<title>Աշխատատեղեր | Lider Market</title>
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
<a href="about_lider.php"><li>Lidermarket.am-ի մասին</li></a>
<a class="active-about" style="cursor:default"><li>Աշխատատեղեր</li></a>
<a href="contact_us.php"><li>Կապ մեզ հետ</li></a>
</ul>
</div>
<div id="vacancy-right">
<ul>
	<li><a id="need_saleswoman_img" href="saleswoman.php"><img src="Images/vacancy_saleswoman.jpg" width="180px"></a><a id="need_saleswoman" href="saleswoman.php">Պահանջվում է վաճառողուհի</a>
	<p>Պարտականություններ. <br>
Սուպերմարկետի հաճախորդների բարեհամբույր <br> սպասարկում
Բաժնի ապրանքատեսականու առկայության <br> վերահսկում
Բաժնի ապրանքների դասավորվածության ու <br> մաքրության պահպանում</p>
	</li>
	<li><a id="need_cashier_img" href="cashier.php"><img src="Images/vacancy_cashier.png" width="180px"></a><a id="need_cashier" href="cashier.php">Պահանջվում է գանձապահ</a>
	<p>Պարտականություններ. <br>
Բարեհամբույր սպասարկել <br> հաճախորդներին,
Հետևել, որ ապրանքները վաճառվեն <br> համապատասխան շտրիխ կոդերով,
Հետևել դրամարկղի <br> ճիշտ շահագործմանը և այլն</p>
	</li>
	</ul>
</div>
	<div style="margin-top: 210px">
	<?php
	include("include/block-footer.php");
	?>
	</div>
</div>
</body>
</html>

