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