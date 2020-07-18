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
<a class="active-about"><li>Օգտագործողի ուղեցույց</li></a>
<a href="howtoorder.php" ><li>Ինչպես պատվիրել</li></a>
<a href="howtopay.php"><li>Ինչպես վճարել</li></a>
</ul>
</div>
	<div id="user_guide">
	<h2>Օգտագործողի ուղեցույց</h2>
		<h3>1. Գրանցում և մուտք</h3>
	<p>Մեր օնլայն խանութից գնումներ կատարելու համար Դուք կարող եք գրանցվել, ապա մուտք գործել <span></span> կայք:</p>
		<p>Գրանցվելու համար սեղմեք բոլոր էջերի վերին աջ մասում գտնվող «Գրանցվել» կոճակը:</p>
		<img src="Images/registration.PNG" width="765px" height="270px">
		<p>Լրացրե՛ք մուտքագրման տվյալները: Գաղտնաբառը պետք է պարունակի նվազագույնը 6 նիշ:</p>
		<img src="Images/registration_block.PNG" width="765px">
		<p>Մուտք գործելուց հետո կարող եք ցանկացած ժամանակ այցելել Ձեր Անձնական էջ և ավելացնել կամ <span></span> փոփոխել Ձեր անձնական ու կոնտակտային տվյալները.
<p></p>
<li>Անունը և ազգանունը</li>
		<p></p>
<li>Առաքման հասցեն</li>
		<p></p>
<li>Հեռախոսահամարը</li>
		<p></p>
<li>Էլ. փոստը և գաղտնաբառը</li>
<img src="Images/profile.PNG" width="765px" height="385px" style="margin-top:10px;">
<p>
Ի դեպ, մուտք գործելը պարտադիր չէ քանի որ Դուք կարող եք ապրանքներ պատվիրել, որպես հյուր լրացնել ձեր տվյալները ապրանք պատվիրելու գործընթացում:</p>
	<h3>2. Ապրանքների որոնում</h3>
		<p>Ձեր նախընտրած ապրանքները կարող եք գտնել երկու ճանապարհով՝ 1) որոնման համակարգի <span></span>միջոցով, 2) փնտրելով կատալոգում:</p>
	<p>
		1) Որոնելու համար գրե՛ք ապրանքի կամ ապրանքանիշի (նվազագույնը 2 նիշ) անվանումը էջերի վերնամասում գտնվող <span></span> որոնման դաշտում և սեղմե՛ք «Գտնել»: Տպելիս ուշադրություն դարձրեք առաջարկվող, ներքևում <span></span> բացվող տարբերակների վրա, որոնք կօգնեն գտնել այս կամ այն բառը, եթե չեք հիշում, <span></span> թե ինչպես է  այն ճիշտ գրվում, կամ չեք ցանկանում ամբողջությամբ գրել տվյալ բառը:
		</p>
	<img src="Images/search.PNG" width="765px" height="699px" style="margin-top:10px;">	
		<p>Կարող եք փոխել ցանկի տեսքը (մեկ սյունակ, չորս սյունակ):</p>
		<img src="Images/search.PNG" width="765px" height="699px" style="margin-top:10px;">	
		<p>Հաջորդ էջ գնալու համար սեղմե՛ք «Հաջորդը» սլաքը կամ տվյալ էջի համարը:</p>
		<h3> 3. Զամբյուղի հավաքում</h3>
		<p>Եթե արդեն գտել եք Ձեր նախընտրած ապրանքը, այն պատվիրելու համար պետք է նախ հավելեք <span></span> Ձեր զամբյուղին: Դրա համար սեղմում եք աջ կողմում գտնվող «Ավելացնել» կոճակը` նախապես <span></span> նշելով քանակը կամ քաշը: Դրանից հետո կարող եք շարունակել Ձեր գնումները և զամբյուղում <span></span> ավելացնել նորանոր ապրանքներ:</p>
		<img src="Images/search.PNG" width="765px" height="699px" style="margin-top:10px;">
		<p>Կայքում գտնվելիս` աջ կողմում մշտապես կերևա զամբյուղի պարունակությունը և դրանում <span></span> ներառված ապրանքների ընդհանուր արժեքը: Ընդ որում, անգամ զամբյուղում դնելուց հետո Դուք <span></span> հեշտությամբ կարող եք փոփոխել տվյալ ապրանքի պատվիրվող թվաքանակը կամ քաշը «+» և «-» <span></span> նշանների օգնությամբ, ինչպես նաև ջնջել այդ ապրանքը: Ձեզ անհրաժեշտ ապրանքների <span></span> ընտրությունն ավարտելուց հետո սեղմում եք զամբյուղի պատուհանի ներքևում գտնվող <span></span> «Պատվիրել» կոճակը:<br>
		Ձեր զամբյուղը տեսնելու համար դուք նաև կարող եք սեղմել <span></span> կայքի վերևի աջ հատվածում գտնվող զամբյուղի նշանը:</p>
		<img src="Images/search.PNG" width="765px" height="699px" style="margin-top:10px;">
		<p></p>
		<h3> 4. Պատվիրում</h3>
		<p>«Պատվիրել» սեղմելուց հետո կբացվի առաքման էջը որտեղ լրացնելով ձեր տվյալները <span></span> կարող եք սեղմել «Հաստատել»:<br>
		Ի դեպ եթե դուք արդեն գրանցվել եք կարող <span></span> եք մուտք գործել և ձեր տվյալները արդեն լրացված կլինեն:</p>
		<img src="Images/cart_confirm.PNG" width="765px" height="549px" style="margin-top:10px;">
		<p>«Հաստատել» կոճակը սեղմելուց հետո ստուգեք ձեր տվյալները և սեղմեք «Պատվիրել» </p>
		<img src="Images/cart_completion.PNG" width="765px" height="495px" style="margin-top:10px;">
		<h3> 4. Վճարում</h3>
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

