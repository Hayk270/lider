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

$_SESSION['urlpage'] = "<a href='index.php' >Գլխավոր</a> \ <a href='clients.php' >Հաճախորդներ</a>";

 include("include/db_connect.php");
include("include/functions.php");             
$id = clear_string($_GET["id"]);
$action = $_GET["action"];
if (isset($action))
{
   switch ($action) {
        
        case 'delete':
		   if($_SESSION['delete_clients'] == '1')
		   {
         $delete = mysql_query("DELETE FROM reg_user WHERE id = '$id'",$link);     
		   }else {
			   $msgerror = 'Դուք իրավունք չունեք հեռացնել հաճախորդներին';
		   }
              
	    break;
        
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
	<link href="jquery_confirm/jquery_confirm.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="jquery_confirm/jquery_confirm.js"></script>
	<title>Ղեկավարման վահանակ | Հաճախորդներ</title>
</head>
<body>
	<div id="block-body">
<?php
	include("include/block-header.php");
	$all_client = mysql_query("SELECT * FROM reg_user",$link);
    $result_count = mysql_num_rows($all_client);
?>
	<div id="block-content">
		<?php 
	if (isset($msgerror)) echo '<p id="form-error" align="center">'.$msgerror.'</p>';
	if($_SESSION['view_clients'] == '1')
	{ ?>
		<div id="block-parameters">
		<p id="count-client">Հաճախորդներ - <strong><?php echo $result_count;?></strong></p>
		</div>
		<?php
$num = 4;

    $page = strip_tags($_GET['page']);              
    $page = mysql_real_escape_string($page);

$count = mysql_query("SELECT COUNT(*) FROM reg_user",$link);
$temp = mysql_fetch_array($count);
$post = $temp[0];
// Находим общее число страниц
$total = (($post - 1) / $num) + 1;
$total =  intval($total);
// Определяем начало сообщений для текущей страницы
$page = intval($page);
// Если значение $page меньше единицы или отрицательно
// переходим на первую страницу
// А если слишком большое, то переходим на последнюю
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
// Вычисляем начиная с какого номера
// следует выводить сообщения
$start = $page * $num - $num;
	
if ($temp[0] > 0)   
{ 
$result = mysql_query("SELECT * FROM reg_user ORDER BY id DESC LIMIT $start, $num",$link);
 
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
 
 echo '
 <div class="block-clients">
 <p class="client-name" ><strong>'.$row["name"].'</strong></p>
 <p class="client-email" ><strong>'.$row["email"].'</strong></p>
 <p class="client-datetime" >'.$row["datetime"].'</p>
 <p class="client-links" ><a class="delete" rel="clients.php?id='.$row["id"].'&action=delete" >Հեռացնել</a></p>
 
 <ul>
 <li>Էլ. փոստ<strong> - '.$row["email"].'</strong></li>
 <li>Անուն <strong> - '.$row["name"].'</strong></li>
 <li>Ազգանուն <strong> - '.$row["surname"].'</strong></li>
 <li>Հեռախոսահամար <strong> - '.$row["phone"].'</strong></li>
 <!--<li>IP<strong> - '.$row["ip"].'</strong></li>-->
 <li>Գրանցման ամսաթիվը<strong> - '.$row["datetime"].'</strong></li>
 </ul>
 
 </div>
 ';   
    
} while ($row = mysql_fetch_array($result));
}   
}    
if ($page != 1) $pervpage = '<li><a class="pstr-prev" href="clients.php?'.$url.'page='. ($page - 1) .'" />Հետ</a></li>';

if ($page != $total) $nextpage = '<li><a class="pstr-next" href="clients.php?'.$url.'page='. ($page + 1) .'"/>Հաջորդ</a></li>';

// Находим две ближайшие станицы с обоих краев, если они есть
if($page - 5 > 0) $page5left = '<li><a href="clients.php?page='. ($page - 5) .'">'. ($page - 5) .'</a></li>';
if($page - 4 > 0) $page4left = '<li><a href="clients.php?page='. ($page - 4) .'">'. ($page - 4) .'</a></li>';
if($page - 3 > 0) $page3left = '<li><a href="clients.php?page='. ($page - 3) .'">'. ($page - 3) .'</a></li>';
if($page - 2 > 0) $page2left = '<li><a href="clients.php?page='. ($page - 2) .'">'. ($page - 2) .'</a></li>';
if($page - 1 > 0) $page1left = '<li><a href="clients.php?page='. ($page - 1) .'">'. ($page - 1) .'</a></li>';

if($page + 5 <= $total) $page5right = '<li><a href="clients.php?page='. ($page + 5) .'">'. ($page + 5) .'</a></li>';
if($page + 4 <= $total) $page4right = '<li><a href="clients.php?page='. ($page + 4) .'">'. ($page + 4) .'</a></li>';
if($page + 3 <= $total) $page3right = '<li><a href="clients.php?page='. ($page + 3) .'">'. ($page + 3) .'</a></li>';
if($page + 2 <= $total) $page2right = '<li><a href="clients.php?page='. ($page + 2) .'">'. ($page + 2) .'</a></li>';
if($page + 1 <= $total) $page1right = '<li><a href="clients.php?page='. ($page + 1) .'">'. ($page + 1) .'</a></li>';

if ($page+5 < $total)
{
    $strtotal = '<li> ... <a href="clients.php?page='.$total.'">'.$total.'</a></li>';
}else
{
    $strtotal = "";
}


if ($total > 1)
{
echo '
    <center>
    <div class="pstrnav">
    <ul>   
    ';
    echo $pervpage.$page5left.$page4left.$page3left.$page2left.$page1left."<li><a class='pstr-active' href='tovar.php?".$url."page=".$page."'>".$page."</a></li>".$page1right.$page2right.$page3right.$page4right.$page5right.$strtotal.$nextpage;
    echo ' 
    </ul>
    </div>
	</center>
';
}
	}else {
		 echo '<p id="form-error" align="center">Դուք իրավունք չունեք դիտել հաճախորդներին</p>';
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