<?php
defined('lidmarshop123456') or header("Location: ../index.php");
$result1 = mysql_query("SELECT * FROM orders WHERE order_confirmed='no'",$link);
    $count1 = mysql_num_rows($result1);
    
    if ($count1 > 0) { $count_str1 = '<p>+'.$count1.'</p>'; } else { $count_str1 = ''; }
 
?>
<div id="block-header">

<div id="block-header1" >
<h3>Lider Market | Ղեկավարման վահանակ</h3>
<p id="link-nav"><?php echo $_SESSION['urlpage']; ?></p> 
</div>

<div id="block-header2" >
<p align="right"><a href="administrators.php" >Ադմինիստրատորներ</a> | <a href="?logout">Դուրս գալ</a></p>
<p align="right">Դուք - <span><?php echo $_SESSION['admin_role']; ?></span></p>
</div>

</div>

<div id="left-nav">
<ul>
<li><a href="orders.php">Պատվերներ</a><?php echo $count_str1; ?></li>
<li><a href="tovar.php">Ապրանքներ</a></li>
<li><a href="category.php">Կատեգորիաներ</a></li>
<li><a href="clients.php">Հաճախորդներ</a></li>
</ul>
</div>