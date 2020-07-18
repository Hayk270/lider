<div id="block-category_header">
	<ul>
		
	<li>
		<a id="index100"><img src="http://html.loc/../Images/bread-icon-png-6.png" width="30px" id="bread-image_2" title="Հացաբուլկեղեն և թխվածքներ"></a>
			<div id="block-category_2_header">
			<span id="bread_span">
				<span class="corn"></span>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Հացաբուլկեղեն և թխվածքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
			
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'" style="height:30px;">'.$row["brand"].'</a>
	
		';
			
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>
	</li>
	<li><a id="index2"><img src="http://html.loc/../Images/dairy-icon.png" width="30px" id="dairy-image_2" title="Կաթնամթերք"></a>
		<div id="block-category_2_header">
			<span id="dairy_span">
				<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Կաթնամթերք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
			<div class="corner"></div>
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
			</span>
		</div>	
	</li>
		
	<li><a id="index3"><img src="http://html.loc/../Images/pasta-icon.png" width="30px" id="pasta-image_2" title="Նպարեղեն"></a>
	<div id="block-category_2_header">
		<span id="pasta_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Նպարեղեն'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>	
	</li>
		
	<li><a id="index4"><img src="http://html.loc/../Images/sweets-icon.png" width="30px" id="sweets-image_2" title="Քաղցրավենիք"></a>
	<div id="block-category_2_header">
		<span id="sweets_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Քաղցրավենիք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>	
	</li>
		
	<li><a id="index5"><img src="http://html.loc/../Images/juice-icon.png" width="35px" id="juice-image_2" title="Հյութեր ըմպելիքներ"></a>
	<div id="block-category_2_header">
		<span id="juice_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Հյութեր ըմպելիքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>	
	</li>
		
	<li><a id="index5"><img src="http://html.loc/../Images/coffee-icon.png" width="35px" id="coffee-image_2" title="Սուրճ և թեյ"></a>
	<div id="block-category_2_header">
		<span id="coffee_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Սուրճ և թեյ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>	
	</li>	
		
	<li><a id="index6"><img src="http://html.loc/../Images/alcohol-icon.png" width="27px" id="alcohol-image_2" title="Ալկոհոլային խմիչքներ"></a>
		<div id="block-category_2_header">
			<span id="alcohol_span">
				<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Ալկոհոլային խմիչքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
			</span>
		</div>
	</li>
			
	<li><a id="index7"><img src="http://html.loc/../Images/cigarette-icon.png" width="35px" id="cigarette-image_2" title="Ծխախոտային արտադրանք"></a>
	<div id="block-category_2_header">
		<span id="cigarette_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Ծխախոտային արտադրանք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>
	</li>
			
	<li><a id="index8"><img src="http://html.loc/../Images/meat-icon.png" width="30px" id="meat-image_2" title="Մսամթերք"></a>
	<div id="block-category_2_header">
		<span id="meat_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Մսամթերք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>	
	</li>
			
	<li><a id="index9"><img src="http://html.loc/../Images/chicken-icon.png" width="35px" id="chicken-image_2" title="Թռչնամիս և ձու"></a>
	<div id="block-category_2_header">
		<span id="chicken_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Թռչնամիս և ձու'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>
	</li>
			
	<li><a id="index10"><img src="http://html.loc/../Images/frozen%20food-icon.png" width="25px" id="frozen-image_2" title="Սառեցված մթերք"></a>
	<div id="block-category_2_header">
		<span id="frozen_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Սառեցված մթերք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>
	</li>
			
	<li><a id="index11"><img src="http://html.loc/../Images/canned%20food-icon.png" width="30px" id="canned-image_2" title="Պահածոյացված մթերքներ"></a>
		<div id="block-category_2_header">
			<span id="canned_span">
				<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Պահածոյացված մթերքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
			</span>
		</div>	
	</li>
	
	<li><a id="index12"><img src="http://html.loc/../Images/animal%20food-icon.png" width="30px" id="animal-image_2" title="Ամեն ինչ կենդանիների համար"></a>
	<div id="block-category_2_header">
		<span id="animal_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Ամեն ինչ կենդանիների համար'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>
	</li>
		
	<li><a id="index130"><img src="http://html.loc/../Images/household%20goods-icon.png" width="40px" id="household-image_2" title="Տնտեսական ապրանքներ"></a>
	<div id="block-category_2_header">
		<span id="household_span">
			<div class="corn"></div>
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Տնտեսական ապրանքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<a id="bread" href="http://html.loc/view_cat.php?cat='.strtolower($row["brand"]).'&type='.$row["type"].'">'.$row["brand"].'</a>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</span>
		</div>
	</li>
		
	</ul>
	</div>