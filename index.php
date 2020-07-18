<?php
define('lidmarshop123456', true);
session_start();
include("include/db_connect.php");
include("functions/functions.php");
include("include/auth_cookie.php");

$id = clear_string($_GET["id"]);
$action = clear_string($_GET["action"]);
?>

<!DOCTYPE HTML>
<html lang="hy">
<head>
	<link rel="icon" href="http://html.loc/Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <link href="CSS/reset.css" rel="stylesheet" type="text/css" />
    <link href="CSS/shop.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/jquery.jcarousellite.js"></script>
	<script type="text/javascript" src="js/shop-script.js"></script>
	<script type="text/javascript" src="js/jquery.cookie.min.js"></script>
	<script type="text/javascript" src="js/TextChange.js"></script>
	<title>Lider Market | Գլխավոր</title>
</head>
	
<body>
<div id="block-body">
<a class="back-to-top"></a>
<?php
	include("include/block-header.php");
?>
		
<div id="block-content_2">
	<div class="all">
		<input checked type="radio" name="respond" id="desktop">
			<article id="slider">
					<input checked type="radio" name="slider" id="switch1">
					<input type="radio" name="slider" id="switch2">
					<input type="radio" name="slider" id="switch3">
					<input type="radio" name="slider" id="switch4">
				<div id="slides">
					<div id="overflow">
						<div class="image">
							<article><img src="Images/coca-cola-glass.jpg" width="766px" height="323px"></article>
							<article><img src="Images/coca-cola-ice.jpg"></article>
							<article><img src="Images/coca-cola-zero.jpg"></article>
							<article><img src="Images/Coca-Cola-Red-background%20-%20%D0%BA%D0%BE%D0%BF%D0%B8%D1%8F.jpg"></article>
						</div>
					</div>
				</div>
				<div id="controls">
					<label for="switch1"></label>
					<label for="switch2"></label>
					<label for="switch3"></label>
					<label for="switch4"></label>
				</div>
				<div id="active">
					<label for="switch1"></label>
					<label for="switch2"></label>
					<label for="switch3"></label>
					<label for="switch4"></label>
				</div>
			</article>
	</div>
	<div id="block-image-view">
	<?php
	$result = mysql_query("SELECT * FROM view ORDER BY RAND()",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
if  ($row["image_category"] != "" && file_exists("./images/".$row["image_category"]))
{
$img_path = './images/'.$row["image_category"];    
}else
{
$img_path = "./images/no-imag.jpg";
} 	
	echo '
	<a href="view_category.php?type='.$row["type"].'"><img src="'.$img_path.'" width="378" height="278" class="image_view"></a>
	';
			}
		while ($row = mysql_fetch_array($result));
	}
		?>
		</div>
	</div>
		<div id="block-left">
	<?php
		include("include/block-category.php");
		?>
			</div>
	
<?php
	include("include/index-best-sale.php");
	include("include/block-random-sale.php");
	include("include/block-random.php");
	include("include/block-footer.php");
?>
</div>
</body>
</html>