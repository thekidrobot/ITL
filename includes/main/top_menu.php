<div class="menu">
	<ul>
	<?php
		//First level menus
		$result = mysql_query('SELECT * FROM top_menu WHERE parent_id IS NULL order by id');
		$total_rows = mysql_num_rows($result);
		$i = 1;
		$class = '';

    while ($row = mysql_fetch_array($result))
    {
			if ($i == ($total_rows))
			{			
				$class = "class='last'";
			}
			?>
			<li <?=$class?>><a href="<?=$row['link_url']?>"><?=$row['name'] ?></a>
				<?php
				//Second+ level menus 
				make_kids($row['id']);
				?>
			</li>
			<?php
			$i++;
		}
		?>
    </ul>
    <div class="cleaner"></div>
</div>

<?php

	function make_kids($row_id)
	{
		$result = mysql_query("SELECT * FROM top_menu WHERE parent_id = $row_id");
		if (mysql_num_rows($result) > 0)
		{
			?>
			<ul>
			<?php
			while ($row = mysql_fetch_array($result))
			{
				if(trim($row['link_url']) != '')
				{
					?>
					<li><a href="<?=$row['link_url']?>&parent=<?=$row_id?>"><?=$row['name'] ?></a></li>
					<?php
				}
				else
				{
					?>
					<li><a href="content.php?art_id=<?=$row['link_id']?>&parent=<?=$row_id?>"><?=$row['name'] ?></a></li>
					<?php
				}
				//Welcome Mr. Cobb
				make_kids($row['id']);
			}
			?>
			</ul>
			<?php
		}
	}		

?>