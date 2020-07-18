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
	<title>Գանձապահ | Lider Market</title>
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
<a href="vacancy.php" class="active-about"><li>Աշխատատեղեր</li></a>
<a href="contact_us.php"><li class="contact">Կապ մեզ հետ</li></a>
</ul>
</div>
<div id="saleswoman-right">
<ul>
	<p id="saleswoman" href="">Գանձապահ</p><img src="Images/vacancy_cashier.png" width="770px" height="460px">
	<td class="text" colspan="2"><p><b>Պարտականություններ.</b></p>
<ul>
<li>Բարեհամբույր սպասարկել հաճախորդներին,&nbsp;</li>
<li>Հետևել, որ ապրանքները վաճառվեն համապատասխան շտրիխ կոդերով,&nbsp;</li>
<li>Հետևել դրամարկղի ճիշտ շահագործմանը,&nbsp;</li>
<li>Տեղեկացնել ղեկավարությանը դրամարկղի անսարքության մասին,&nbsp;</li>
<li>Իրականացնել դրամարկղի մոտ դասավորված ապրանքների վաճառքը,&nbsp;</li>
<li>Մշտապես ապահովել վերը նշված ապրանքների առկայությունը,&nbsp;</li>
<li>Հետևել, որ դրամարկղում միշտ բավարար չափով մանրադրամ լինի:&nbsp;</li>
</ul>
<br>
<b>Պահանջվող որակավորումներ.</b>
<br>
<ul>
<li>Հաճախորդների հետ շփման և սպասարկման ունակություն,&nbsp;</li>
<li>Օտար լեզվի (ռուսերեն և / կամ անգլերեն) իմացություն,&nbsp;</li>
<li>Ճկունություն, արագ աշխատելու և արագ կողմնորոշվելու ունակություն,&nbsp;</li>
<li>Աշխատանքային փորձը ցանկալի է:&nbsp;</li>
</ul>
<p>
Աշխատաժամերը երկու հերթափոխով են՝ 8:00-16:00, 16:00-22:30:&nbsp;
</p>
<p>
Հավելյալ հարցերի դեպքում զանգահարել +374 (91) 41 11 95:
	</p>
<p></p>
</td>
	</ul>
</div>
	<?php
	include("include/block-footer.php");
	?>
</div>
</body>
</html>

