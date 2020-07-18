<?php
define('lidmarshop123456', true);
	session_start();
if ( $_SESSION['auth'] == 'yes_auth') 
{
	header("Location: http://html.loc/index.php");
}else{
	include("include/db_connect.php");
	include("functions/functions.php");
	include("include/auth_cookie.php");
?>
<!DOCTYPE HTML>
<html lang="hy">
<head>
	<link rel="icon" href="http://html.loc/Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html; charset=windows-1251" />
    <link href="http://html.loc/CSS/reset.css" rel="stylesheet" type="text/css" />
    <link href="http://html.loc/CSS/shop.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="http://html.loc/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="http://html.loc/js/jquery.jcarousellite.js"></script>
	<script type="text/javascript" src="http://html.loc/js/shop-script.js"></script>
	<script type="text/javascript" src="http://html.loc/js/jquery.form.js"></script>
	<script type="text/javascript" src="http://html.loc/js/jquery.validate.js"></script>
	<script type="text/javascript" src="http://html.loc/js/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="http://html.loc/js/TextChange.js"></script>
    <meta charset="utf-8" />
	<script type="text/javascript">
	$(document).ready(function() {	
      $('#form_reg').validate(
				{	
					// правила для проверки
					rules:{
						"reg_name":{
							required:true,
						},
						"reg_email":{
						    required:true,
							email:true,
							remote: {
                            type: "post",    
		                    url: "/reg/check_email.php"
		                            }
						},
						"reg_pass":{
							required:true,
							minlength:6,
						},
					},

					// выводимые сообщения при нарушении соответствующих правил
					messages:{
						"reg_pass":{
							required:"Գրե՛ք Ձեր գաղտնաբառը",
                            minlength:"Նվազագույնը 6 նիշ"
						},
						"reg_name":{
							required:"Գրե՛ք Ձեր անունը",                          
						},
						"reg_email":{
						    required:"Գրե՛ք Ձեր էլ. փոստի հասցեն",
							email:"Էլ. փոստի հասցեն ամբողջական չէ",
							remote: "Էլ. փոստը գոյություն ունի"
						},
					},
					
	submitHandler: function(form){
	$(form).ajaxSubmit({
	success: function(data) { 
								 
        if (data == 'true')
    {
             $("#block-form-registration").fadeOut(300,function() {
        
		$("#reg_message").addClass("reg_message_good").fadeIn(400).removeClass("reg_message_error").html("Դուք հաջողությամբ գրանցվել եք: Կարող եք մուտք գործել");
        $("#form_submit").hide();
       });
    }
    else
    {
$("#reg_message").addClass("reg_message_error").fadeIn(400).html(data); 
    }
		} 
			}); 
			}
			});
    	});
	</script>
	
	<title>Գրանցում | Lider Market</title>
</head>

<body>
<div id="block-body">

<div id="block-content" style="width:1035px;">
	
<?php
	include("include/block-header.php");
	?>
<div id="block-form">
<h2 class="h2-title" style>Գրանցվել</h2>
<form method="post" id="form_reg" action="/reg/handler_reg.php">
<p id="reg_message"></p>
<div id="block-form-registration">
<ul id="form-registration">

<li>
<label for="reg_name" style="margin-top:10px;">Ձեր անունը</label>
<input type="text" name="reg_name" id="reg_name" autocomplete="off">
</li>

<li>
<label for="reg_email" style="margin-top:10px;">Ձեր էլ. փոստի հասցեն</label>
<input type="text" name="reg_email" id="reg_email" autocomplete="off">
</li>
	
<li>
<label for="reg_pass" style="margin-top:10px;">Ձեր գաղտնաբառը</label>
<input type="password" name="reg_pass" id="reg_pass" autocomplete="off">
</li>
	
</ul>

<p><input type="submit" name="reg_submit" id="form_submit" value="Գրանցվել"></p>

	</div>
</form>
</div>
<?php
	include("include/block-footer.php");
?>
</div>
</div>
</body>
</html>
<?php } ?>