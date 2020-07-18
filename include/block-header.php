<?php
	defined('lidmarshop123456') or header("Location: ../index.php");
?>
<div id="block-header">
<div id="header-top-block">
	<?php
	
	if ( $_SESSION['auth'] == 'yes_auth')
	{
		echo '<p id="auth-user-info" align="right"><img src="http://html.loc/images/people_icon.png" width="20px">Բարի գալուստ, '.$_SESSION['auth_name'].'</p>';
	}else {
		echo '<p id="reg-auth-title" align="right"><a class="top-auth"> Մուտք </a><a href="http://html.loc/reg"> Գրանցվել </a></p>';
	}
	?>
	<div id="block-top-auth">
	<div class="corner"></div>
		<form method="post" autocomplete="off">
		<ul id="input-email-pass">

<h3>Մուտք</h3>

<p id="message-auth">Սխալ էլ. փոստի հասցե և(կամ) գաղտնաբառ</p>
<label for="auth_email" id="label_auth" class="email-label">Էլ. փոստ
<li><center><input class="enter-input" type="text" id="auth_email" autocomplete="off"></center></li></label>
<label for="auth_pass" id="label_auth" class="pass-label">Գաղտնաբառ
<li><center><input type="password" id="auth_pass" autocomplete="off" class="enter-input"><span id="button-pass-show-hide" class="pass-show" style="margin-top:20px;"></span></center></li></label>
<li id="rememberme_display"><input type="checkbox" name="rememberme" id="rememberme" checked><label for="rememberme">Հիշել ինձ</label></li>
<ul id="list-auth">
<li><a id="remindpass">Մոռացե՞լ եք գաղտնաբառը</a></li>
</ul>
			
<p align="right" id="button-auth"><a>Մուտք</a></p>
			
</ul>
<div id="block_please_wait">
<center class="auth-loading"><img src="http://html.loc//images/loading.gif" width="120px"></center>
	<div id="please_wait">
<p><center>Խնդրում ենք սպասել</center></p>
	</div>
</div>
	<div id="please">
<p><center>Մուտքն ավարտվել է հաջողությամբ</center></p>
	</div>
		</form>
	<div id="block-remind">
<div id="remind-block">
<h3>Գաղտնաբառի վերականգնում</h3>
	<label for="remind-email" id="label_auth">Էլ. փոստ</label>
<p id="message-remind" class="message-remind-success" ></p>
<center><input type="text" id="remind-email" autocomplete="off"></center>
<p align="right" id="button-remind" ><a>Վերականգնել</a></p>
<p id="prev-auth">Հետ</p>
</div>
<div id="block_please_wait">
<center class="auth-loading"><img src="http://html.loc//images/loading.gif" width="120px"></center>
	<div id="please_wait">
<p><center>Խնդրում ենք սպասել</center></p>
	</div>
</div>
</div>
	</div>
</div>
<div id="top-line"></div>
	<div id="block-user" >
<div class="corner2"></div>
<ul>
<li><a href="http://html.loc/profile/"><img src="http://html.loc//images/user_info_icon%20-%20%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F.png" >Անձնական էջ</a></li>
<li><a id="logout"><img src="/images/logout.png" />Դուրս գալ</a></li>
</ul>
</div>
<img id="img-logo" src="http://html.loc/../Images/Lider%201.jpg" width="600px" usemap="#lidermarket">
	<map name="lidermarket">
	<area shape="rect" coords="0,0,378,165" href="http://html.loc/index.php">
	</map>
	
<div id="personal-info">
	<p align="right" style="margin-top: 16px;"></p>
	<h2 align="right">+374 (55) 10 99 10</h2>
	<img src="http://html.loc/../Images/phone-icon.jpg" width="50px" id="phone">
	<p align="right" style="margin-top: 20px;">Աշխատանքային ժամեր`</p>
	<p align="right">Երկուշաբթի-շաբաթ: 08:00-22:30</p>
	<p align="right" style="margin-bottom: 15px;">Կիրակի: 09:00-22:30</p>
	<img src="http://html.loc/../Images/clock-icon1.jpg" width="50px" id="clock">
	
	</div>	
	
	<div id="block-search">
	
	<form method="get" action="http://html.loc/search.php?q=">
		
		<label><span id="search_icon"></span></label>
		<label for="input-search"><div id="search_p">Որոնել.</div></label>
		<input type="text" id="input-search" name="q" placeholder="Մուտքագրեք ապրանքի անունը կամ ապրանքանիշը" autocomplete="off" value="<?php echo $search; ?>">
		<input type="submit" id="button-search" value="Գտնել">
		</form>
		
		<ul id="result-search">

		</ul>
		
	</div>
</div>

<div id="top-menu">

<ul>
	<li><a href="http://html.loc/index.php"><img src="http://html.loc/../Images/shop.png" height="40px">Գլխավոր</a></li>
	
	<li><a href="http://html.loc/view_aystopper.php?go=news"><img src="http://html.loc/../Images/new3.jpg" height="40px">Նորություն</a></li>
	
	
	<li><a href="http://html.loc/view_aystopper.php?go=leaders"><img src="http://html.loc/../Images/best-price.png" height="40px">Լավագույն վաճառք</a></li>
	
	
	<li><a href="http://html.loc/view_aystopper.php?go=sale"><img src="http://html.loc/../Images/sale.jpg" height="40px" >Ակցիա</a></li>
	
</ul>
	
	<div id="block_basket"><img src="http://html.loc/../Images/shopping-cart-icon1.png" width="40px" usemap="#shopping-cart"><a href="http://html.loc/cart.php?action=oneclick">Զամբյուղը դատարկ է</a></div>
	<map name="shopping-cart">
		<area shape="rect" coords="0,0,40,40" href="http://html.loc/cart.php?action=oneclick" >
	</map>
	<div id="nav-line"></div>
	
	
</div>