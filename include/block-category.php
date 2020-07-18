<?php
	defined('lidmarshop123456') or header("Location: ../index.php");
?>
<div id="block-category">
<p class="header-title" >Ապրանքների տեսականի</p>
	
	<div>
	<ul>
		
	<li>
		<a id="index1"><img src="../Images/bread-icon-png-6.png" width="30px" id="bread-image">Հացաբուլկեղեն և թխվածքներ</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Հացաբուլկեղեն և թխվածքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
		
	<li><a id="index2"><img src="../Images/dairy-icon.png" width="30px" id="dairy-image">Կաթնամթերք</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Կաթնամթերք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
		
	<li><a id="index3"><img src="../Images/pasta-icon.png" width="30px" id="pasta-image">Նպարեղեն</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Նպարեղեն'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
		
	<li><a id="index4"><img src="../Images/sweets-icon.png" width="30px" id="sweets-image">Քաղցրավենիք</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Քաղցրավենիք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
		
	<li><a id="index5"><img src="../Images/juice-icon.png" width="35px" id="juice-image">Հյութեր ըմպելիքներ</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Հյութեր ըմպելիքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
		
	<li><a id="index14"><img src="../Images/coffee-icon.png" width="35px" id="juice-image">Սուրճ և թեյ</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Սուրճ և թեյ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>	
		
	<li><a id="index6"><img src="../Images/alcohol-icon.png" width="27px" id="alcohol-image">Ալկոհոլային խմիչքներ</a>
		<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Ալկոհոլային խմիչքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
			
	<li><a id="index7"><img src="../Images/cigarette-icon.png" width="30px" id="cigarette-image">Ծխախոտային արտադրանք</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Ծխախոտային արտադրանք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
			
	<li><a id="index8"><img src="../Images/meat-icon.png" width="30px" id="meat-image">Մսամթերք</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Մսամթերք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
			
	<li><a id="index9"><img src="../Images/chicken-icon.png" width="30px" id="chicken-image">Թռչնամիս և ձու</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Թռչնամիս և ձու'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
			
	<li><a id="index10"><img src="../Images/frozen%20food-icon.png" width="25px" id="frozen-image">Սառեցված մթերք</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Սառեցված մթերք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
			
	<li><a id="index11"><img src="../Images/canned%20food-icon.png" width="30px" id="canned-image">Պահածոյացված մթերքներ</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Պահածոյացված մթերքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
	
	<li><a id="index12"><img src="../Images/animal%20food-icon.png" width="30px" id="animal-image">Ամեն ինչ կենդանիների համար</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Ամեն ինչ կենդանիների համար'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
		
	<li><a id="index13"><img src="../Images/household%20goods-icon.png" width="40px" id="household-image">Տնտեսական ապրանքներ</a>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Տնտեսական ապրանքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
		
	</ul>
	</div>
</div>