<?php
define('lidmarshop123456', true);
session_start();
include("include/db_connect.php");
include("functions/functions.php");
include("include/auth_cookie.php");

if ($_POST["send_message"])
{
    $error = array();
    
  if (!$_POST["feed_name"]) $error[] = "Գրե՛ք Ձեր անունը";  
	
	if (!$_POST["feed_email"]) {$error[] = "Գրե՛ք Ձեր էլ. փոստի հասցեն"; }else{
  
  if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["feed_email"])))
  {
    $error[] = "Էլ. փոստի հասցեն ամբողջական չէ"; 
  }
}
  if (!$_POST["feed_text"]) $error[] = "Գրե՛ք նամակի բովանդակությունը";  
  
if (!$_POST["feed_text"]) {$error[] = "Գրե՛ք նկարի կոդը";  }else {
  if (strtolower($_POST["reg_captcha"]) != $_SESSION['img_captcha'])
  {
    $error[] = "Նկարի կոդը սխալ է";
  }  
}
   
   if (count($error))
   {
     $_SESSION['message'] = "<p id='form-error_2'>".implode('<br />',$error)."</p>";  
      
   }else
   {
    	      send_mail($_POST["feed_email"],
'haykkarapetyan2005@mail.ru',
$_POST["feed_subject"],
''.$_POST["feed_name"].'<br/>'.$_POST["feed_text"]); 
    
     $_SESSION['message'] = "<p id='form-success_2'>Ձեր հաղորդագրությունը հաջողությամբ ուղարկված է</p>";   
    
   }
    
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
	<title>Առաջարկներ և բողոքներ | Lider Market</title>
</head>
	
<body>
<div id="block-body">
<a class="back-to-top"></a>
<?php
	include("include/block-header.php");
	?>

		
<div id="block-content" style="width:1035px;">
	<?php
   if(isset($_SESSION['message']))
	{
	echo $_SESSION['message'];
	unset($_SESSION['message']);
	}
?>
<form method="post" autocomplete="off">
<div id="block-feedback">
<ul id="feedback">

<li><label>Անուն</label><span>*</span><input type="text" name="feed_name"  /></li>
<li><label>Էլ. փոստ</label><span>*</span><input type="text" name="feed_email"  /></li>
<li><label>Վերնագիր</label><input type="text" name="feed_subject"  /></li>
<li><label>Նամակ</label><span>*</span><textarea name="feed_text" ></textarea></li>

<li>
<div id="block-captcha">
<img src="reg/reg_captcha.php">
<input type="text" name="reg_captcha" id="reg_captcha" />
<p id="reloadcaptcha">Այլ կոդ</p>
</div>
</li>

</ul>
</div>
	<p><input type="submit" name="send_message" id="form_submit_2" value="Ուղարկել"></p>
</form>
	</div>
<?php
	include("include/block-random.php");
	include("include/block-footer.php");
?>
</div>
</body>
</html>

