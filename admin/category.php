<?php
session_start();
if ($_SESSION['auth_admin'] == "yes_auth")
{
define('lidmarshop123456', true);
if (isset($_GET["logout"]))
    {
        unset($_SESSION['auth_admin']);
        header("Location: login.php");
    }

$_SESSION['urlpage'] = "<a href='index.php'>Գլխավոր</a> \ <a href='index.php' >Կատեգորիաներ</a>";

 include("include/db_connect.php");
 include("include/functions.php");
if ($_POST["submit_cat"])
{
if($_SESSION['add_category'] == '1')
{
    $error = array();
    
  if (!$_POST["cat_type"])  $error[] = "Գրե՛ք ապրանքի խումբը"; 
  if (!$_POST["cat_brand"]) $error[] = "Գրե՛ք ապրանքի ենթախումբը";
  
  if (count($error))
  {
      $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>"; 
  }else
  {
     $cat_type = clear_string($_POST["cat_type"]);
     $cat_brand = clear_string($_POST["cat_brand"]);
    
                    mysql_query("INSERT INTO category(type,brand)
						VALUES(						
                            '".$cat_type."',
                            '".$cat_brand."'                              
						)",$link);
                   
     $_SESSION['message'] = "<p id='form-success'>Կատեգորիան հաջողությամբ ավելացվել է</p>";   	
}
}else {
	$msgerror = 'Դուք իրավունք չունեք ավելացնել կատեգորիա';
}
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hy" lang="hy">

<head>
	<link rel="icon" href="../Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<title>Ղեկավարման վահանակ | Կատեգորիաներ</title>
</head>
<body>
	<div id="block-body">
<?php
	include("include/block-header.php");
?>
	<div id="block-content">
		<div id="block-parameters">
		<p id="title-page">Կատեգորիաներ</p>
		</div>
		<?php
	if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';
		if(isset($_SESSION['message']))
		{
		echo $_SESSION['message'];
		unset($_SESSION['message']);
		}
?>
		<form method="post">
		<ul id="cat_products">
			<li>
			<label>Կատեգորիաներ</label>
				<div>
					<?php
					if($_SESSION['delete_category'] == '1')
					{
						echo '<a class="delete-cat">Հեռացնել</a>';
					}
					?>
				</div>
			<select name="cat_type" id="cat_type" size="10">
				<?php
$result = mysql_query("SELECT * FROM category",$link);
 
 if (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
	echo '
    
       <option value="'.$row["id"].'" >'.$row["type"].' - '.$row["brand"].'</option>
    
    ';
}
 while ($row = mysql_fetch_array($result));
}    
?>
			</select>
			</li>
			<li>
<label>Ապրանքի խումբը</label>
<input type="text" name="cat_type" autocomplete="off">
</li>
<li>
<label>Ապրանքի ենթախումբը</label>
<input type="text" name="cat_brand" autocomplete="off">
</li>
			</ul>
			<p align="right"><input type="submit" name="submit_cat" id="submit_form" value="Ավելացնել"></p>
		</form>
		</div>
</div>
</body>
</html>
<?php
}else
{
    header("Location: login.php");
}
?>