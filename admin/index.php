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

$_SESSION['urlpage'] = "<a href='../index.php'>lidermarket.am</a> \ <a href='index.php' >Գլխավոր</a>";

 include("include/db_connect.php");
?>
<!DOCTYPE html>
<html lang="hy">

<head>
	<link rel="icon" href="../Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>Ղեկավարման վահանակ</title>
</head>
<body>
	<div id="block-body">
<?php
	include("include/block-header.php");
	 // Общее количество заказов
$query1 = mysql_query("SELECT * FROM orders",$link);
 $result1 = mysql_num_rows($query1);
 // Общее количество товаров 
 $query2 = mysql_query("SELECT * FROM table_products",$link);
 $result2 = mysql_num_rows($query2);   
  // Общее количество клиентов 
 $query3 = mysql_query("SELECT * FROM reg_user",$link);
 $result3 = mysql_num_rows($query3);
?>
	<div id="block-content">
		<?php
		if($_SESSION['view_indexphp'] == '1')
		{
		?>
		<div id="block-parameters">
		<p id="title-page">Ընդհանուր վիճակագրություն</p>
		</div>
		<ul id="general-statistics">
<li><p>Պատվերներ - <span><?php echo $result1; ?></span></p></li>
<li><p>Ապրանքներ - <span><?php echo $result2; ?></span></p></li>
<li><p>Հաճախորդներ - <span><?php echo $result3; ?></span></p></li>
</ul>

<h3 id="title-statistics">Վաճառքի վիճակագրություն</h3>

<TABLE align="center" CELLPADDING="10" WIDTH="100%">
<TR>
<TH>Ամսաթիվ</TH>
<TH>Ապրանք</TH>
<TH>Գին</TH>
<TH>Վճարում</TH>
</TR>


<?php

$result = mysql_query("SELECT * FROM orders,buy_products WHERE orders.order_pay='accepted' AND orders.order_id=buy_products.buy_id_order",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{

 $result2 = mysql_query("SELECT * FROM table_products WHERE products_id='{$row["buy_id_product"]}'",$link);   
  If (mysql_num_rows($result2) > 0)
{
 $row2 = mysql_fetch_array($result2);
}
    
$statuspay = "";
if ($row["order_pay"] == "accepted") $statuspay = "Վճարված է";

echo '
 <TR>
<TD  align="CENTER" >'.$row["order_datetime"].'</TD>
<TD  align="CENTER" >'.$row2["title"].'</TD>
<TD  align="CENTER" >'.$row2["price"].'</TD>
<TD  align="CENTER" >'.$statuspay.'</TD>
</TR>
';

	}
     while ($row = mysql_fetch_array($result));
}     
		}else {
			echo '<p id="form-error" align="center">Դուք գլխավոր էջը դիտելու իրավունք չունեք</p>';
		}
?>

</TABLE>
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