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

  $_SESSION['urlpage'] = "<a href='index.php' >Գլխավոր</a> \ <a href='orders.php' >Պատվերի դիտում</a>";
  
  include("include/db_connect.php");
  include("include/functions.php"); 
   $id = clear_string($_GET["id"]);
	$action = $_GET["action"];
  
  if (isset($action))
{
   switch ($action) {

	    case 'accept':
if($_SESSION['accept_orders'] == '1'){
                     $update = mysql_query("UPDATE orders SET order_confirmed='yes' WHERE order_id = '$id'",$link);  
}else{
			$msgerror = 'Դուք իրավունք չունեք հաստատել պատվերները';
		  }
	    break;
        
        case 'delete':
		   
		  if($_SESSION['delete_orders'] == '1')
		  {
			  $delete = mysql_query("DELETE FROM orders WHERE order_id = '$id'",$link); 
           header("Location: orders.php");  
		  }else {
			  $msgerror = 'Դուք իրավունք չունեք հեռացնել պատվերները';
		  }
		   
            

	    break;
        
	} 
    
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hy" lang="hy">

<head>
	<link rel="icon" href="../Images/lider0.ico">
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <link href="css/reset.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="js/jquery-1.8.2.min.js"></script> 
    <script type="text/javascript" src="js/script.js"></script> 
    <script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script> 
    
	<title>Ղեկավարման վահանակ | Պատվերի դիտում</title>
</head>
<body>
<div id="block-body">
<?php
	include("include/block-header.php");
?>
<div id="block-content">
<div id="block-parameters">
	<p id="title-page">Պատվերի դիտում</p>
</div>
<?php
if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';
	
if( $_SESSION['view_orders'] == '1')
{

	$result = mysql_query("SELECT * FROM orders WHERE order_id = '$id'",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
if ($row["order_confirmed"] == 'yes')
{
    $status = '<span class="green">Մշակված է</span>';
} else
{
    $status = '<span class="red">Մշակված չէ</span>';    
}


 echo '
  <p class="view-order-link" ><a class="green" href="view_order.php?id='.$row["order_id"].'&action=accept" >Հաստատել պատվերը</a> | <a class="delete" rel="view_order.php?id='.$row["order_id"].'&action=delete" >Հեռացնել պատվերը</a></p>
  <p class="order-datetime" >'.$row["order_datetime"].'</p>
  <p class="order-number" >Պատվեր № '.$row["order_id"].' - '.$status.'</p>

<TABLE align="center" CELLPADDING="10" WIDTH="100%">
<TR>
<TH>№</TH>
<TH>Ապրանքի անվանում</TH>
<TH>Գին</TH>
<TH>Քանակ</TH>
</TR>
';
$query_product = mysql_query("SELECT * FROM buy_products,table_products WHERE buy_products.buy_id_order = '$id' AND table_products.products_id = buy_products.buy_id_product",$link);
 
$result_query = mysql_fetch_array($query_product);
do
{
$price = $price + ($result_query["price"] * $result_query["buy_count_product"]);    
$index_count =  $index_count + 1; 
$allprice = $price + 500;
echo '
 <TR>
<TD  align="CENTER" >'.$index_count.'</TD>
<TD  align="CENTER" >'.$result_query["title"].'</TD>
<TD  align="CENTER" >'.$result_query["price"].' դրամ</TD>
<TD  align="CENTER" >'.$result_query["buy_count_product"].'</TD>
</TR>

';
} while ($result_query = mysql_fetch_array($query_product));


if ($row["order_pay"] == "accepted")
{
    $statpay = '<span class="green">Վճարված է</span>';
}else
{
    $statpay = '<span class="red">Վճարված չէ</span>';
}

echo '
</TABLE>
<ul id="info-order">
<li>Ընդհանուր գինը - <span>'.$allprice.'</span> դրամ</li>
<li>Վճարումը - '.$statpay.'</li>
<li>Վճարման տեսակը - <span>'.$row["order_type_pay"].'</span></li>
<li>Վճարման ամսաթիվը - <span>'.$row["order_datetime"].'</span></li>
</ul>


<TABLE align="center" CELLPADDING="10" WIDTH="100%">
<TR>
<TH>Անուն</TH>
<TH>Ազգանուն</TH>
<TH>Էլ. փոստ</TH>
<TH>Հեռախոսահամար</TH>
<TH>Փողոց</TH>
<TH>Շենք</TH>
<TH>Մուտք</TH>
<TH>Բնակարան</TH>
<TH>Հարկ</TH>
<TH>Լրացուցիչ</TH>
</TR>

 <TR>
<TD  align="CENTER" >'.$row["order_name"].'</TD>
<TD  align="CENTER" >'.$row["order_surname"].'</TD>
<TD  align="CENTER" >'.$row["order_email"].'</TD>
<TD  align="CENTER" >'.$row["order_phone"].'</TD>
<TD  align="CENTER" >'.$row["order_street"].'</TD>
<TD  align="CENTER" >'.$row["order_house"].'</TD>
<TD  align="CENTER" >'.$row["order_enter"].'</TD>
<TD  align="CENTER" >'.$row["order_flat"].'</TD>
<TD  align="CENTER" >'.$row["order_floar"].'</TD>
<TD  align="CENTER" >'.$row["order_note"].'</TD>
</TR>
</TABLE>

 ';   
    
} while ($row = mysql_fetch_array($result));
} 
}else {
	 echo '<p id="form-error" align="center">Դուք այս բաժինը դիտելու իրավունք չունեք </p>';
}
?>
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