<div id="block-category">
	
	<div>
	<ul>
		
	<li>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Հացաբուլկեղեն և թխվածքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
		
	<li>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Կաթնամթերք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
		
	<li>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Նպարեղեն'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
		
	<li>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Քաղցրավենիք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
		
	<li>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Հյութեր ըմպելիքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>
		
	<li>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Սուրճ և թեյ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
	</li>	
		
	<li>
		<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Ալկոհոլային խմիչքներ'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
			
	<li>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Ծխախոտային արտադրանք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>
	</li>
			
	<li>
	<ul class="category-section">
		<?php
		$result = mysql_query("SELECT * FROM category WHERE type='Մսամթերք'",$link);
	if (mysql_num_rows($result) > 0)
	{
		$row = mysql_fetch_array($result);
		do{
			echo '
		<li style="list-style-type: none">
		<a id="bread" href="view_cat.php?type='.$row["type"].'">'.$row["brand"].'</a></li>
		';
			
		}
		while ($row = mysql_fetch_array($result));}
		?>
		</ul>	
		
	</ul>
	</div>
</div>