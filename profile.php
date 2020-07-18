<?php
define('lidmarshop123456', true);
session_start();

if ($_SESSION['auth'] == 'yes_auth')
{	
   include("include/db_connect.php");
   include("functions/functions.php");
 
   if ($_POST["save_submit"])
     {
        
    $_POST["info_name"] = clear_string($_POST["info_name"]);
    $_POST["info_email"] = clear_string($_POST["info_email"]);
	$_POST["info_surname"] = clear_string($_POST["info_surname"]);
	$_POST["info_phone"] = clear_string($_POST["info_phone"]);
	$_POST["info_street"] = clear_string($_POST["info_street"]);
	$_POST["info_house"] = clear_string($_POST["info_house"]);
	$_POST["info_enter"] = clear_string($_POST["info_enter"]);
	$_POST["info_flat"] = clear_string($_POST["info_flat"]);
    $_POST["info_floar"] = clear_string($_POST["info_floar"]);
	$_POST["info_additional"] = clear_string($_POST["info_additional"]);
    $error = array();
        
      if($_POST["info_new_pass"] != "")
	{
		        if(strlen($_POST["info_new_pass"]) < 6 )
            	{
		           $error[]='Նոր գաղտնաբառը նվազագույնը 6 նիշ';
	            }else
                {
                     $newpass   = md5(clear_string($_POST["info_new_pass"]));
                     $newpass   = strrev($newpass);
                     $newpass   = "shdaa154asf".$newpass."32a1f65asij";
                     $newpassquery = "pass='".$newpass."',";
                }
	}
 if(strlen($_POST["info_name"]) < 1)
	{
		$error[]='Գրե՛ք Ձեր անունը';
	}
        if(!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($_POST["info_email"])))
	{
		$error[]='Էլ. փոստը ամբողջական չէ';
	}
    
    
  if(count($error))
	{
		$_SESSION['msg'] = "<p align='left' id='form-error'>".implode('<br />',$error)."</p>";
	}else
    {
        $_SESSION['msg'] = "<p align='left' id='form-success'>Տվյալները հաջողությամբ փոփոխվել են</p>";
           
     $dataquery = $newpassquery."name='".$_POST["info_name"]."',email='".$_POST["info_email"]."',surname='".$_POST["info_surname"]."',phone='".$_POST["info_phone"]."',street='".$_POST["info_street"]."',house='".$_POST["info_house"]."',enter='".$_POST["info_enter"]."',flat='".$_POST["info_flat"]."',floar='".$_POST["info_floar"]."',additional='".$_POST["info_additional"]."'";      
     $update = mysql_query("UPDATE reg_user SET $dataquery WHERE email = '{$_SESSION['auth_email']}'",$link);
      
    if ($newpass){ $_SESSION['auth_pass'] = $newpass; } 
    
    
    $_SESSION['auth_name'] = $_POST["info_name"];
    $_SESSION['auth_email'] = $_POST["info_email"]; 
	$_SESSION['auth_surname'] = $_POST["info_surname"];
    $_SESSION['auth_phone'] = $_POST["info_phone"];
	$_SESSION['auth_street'] = $_POST["info_street"];
	$_SESSION['auth_house'] = $_POST["info_house"];  
	$_SESSION['auth_enter'] = $_POST["info_enter"];
	$_SESSION['auth_flat'] = $_POST["info_flat"];
	$_SESSION['auth_floar'] = $_POST["info_floar"];
	$_SESSION['auth_additional'] = $_POST["info_additional"];
    }
        
     }  
   
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hy" lang="hy">

<head>
	<meta charset="utf-8">
  <link rel="icon" href="http://html.loc/Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <link href="http://html.loc/CSS/reset.css" rel="stylesheet" type="text/css" />
    <link href="http://html.loc/CSS/shop.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://html.loc/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="http://html.loc/js/jquery.jcarousellite.js"></script>
	<script type="text/javascript" src="http://html.loc/js/shop-script.js"></script>
	<script type="text/javascript" src="http://html.loc/js/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="http://html.loc/js/TextChange.js"></script>
    
	<title>Օգտագործողի տվյալներ | Lider Market</title>
</head>
<body>
<div id="block-body">
<a class="back-to-top"></a>
	
<div id="block-content" style="width: 1035px;">
<?php	
    include("include/block-header.php");    
	
    if($_SESSION['msg'])
		{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
    
?>
<form method="post" id="profile_form" autocomplete="off">
<img src="http://html.loc/Images/1_icon.png" id="number_1_icon"><h3 class="title-h3" >Անձնական տվյալներ</h3>
<ul id="info-profile">

<li>
<label for="info_name">Անուն</label>
<input type="text" name="info_name" id="info_name" value="<?php echo $_SESSION['auth_name']; ?>">
</li>
	
<li>
<label for="info_surname">Ազգանուն</label>
<input type="text" name="info_surname" id="info_surname" value="<?php echo $_SESSION['auth_surname']; ?>">
</li>
	
<li>
<label for="info_phone">Հեռախոսահամար`</label>
<input type="text" name="info_phone" id="info_phone" value="<?php echo $_SESSION['auth_phone']; ?>">
</li>
		<div id="line"></div>
</ul>	
<img src="http://html.loc/Images/2_icon.png" id="number_2_icon"><h3 class="title-h3">Գրանցման տվյալներ</h3>
	
<ul id="info-profile">
	
<li>
<label for="info_email">Էլ. փոստ</label>
<input type="text" name="info_email" id="info_email" value="<?php echo $_SESSION['auth_email']; ?>">
</li>
	
<li>
<label for="info_new_pass">Նոր գաղտնաբառ</label>
<input type="password" name="info_new_pass" id="info_new_pass" value="">
</li>
	
<div id="line"></div>
</ul>
	
<img src="http://html.loc/Images/3_icon.png" id="number_3_icon" width="40px" height="40px"><h3 class="title-h3">Առաքման հասցե</h3>

<ul id="info-profile">
<li>
<label for="info_street">Փողոց`</label>
<input type="text" name="info_street" id="info_street" value="<?php echo $_SESSION['auth_street']; ?>">
</li>
<li>
<label for="info_house">Շենք`</label>
<input type="text" name="info_house" id="info_house" value="<?php echo $_SESSION['auth_house']; ?>">
<label for="info_enter" id="info_enter_label">Մուտք`</label>
<input type="text" name="info_enter" id="info_enter" value="<?php echo $_SESSION['auth_enter']; ?>">
</li>

<li>
<label for="info_flat">Բնակարան`</label>
<input type="text" name="info_flat" id="info_flat" value="<?php echo $_SESSION['auth_flat']; ?>">
<label for="info_floar" id="info_floar_label">Հարկ`</label>
<input type="text" name="info_floar" id="info_floar" value="<?php echo $_SESSION['auth_floar']; ?>">
</li>
	
<li>
<p><label for="info_additional" id="info_additional_label" style="margin-top:0px">Լրացուցիչ`</label></p>
<textarea type="text" name="info_additional" id="info_additional">
<?php echo $_SESSION['auth_additional']; ?>
</textarea>
</li>
</ul>

 <p align="right"><input type="submit" id="profile_submit" name="save_submit" value="Պահպանել"></p>
</form>


<?php	 
    include("include/block-footer.php");    
?>
	</div>
</div>
</body>
</html>
<?php
} else { header("Location: index.php");  }	
?>