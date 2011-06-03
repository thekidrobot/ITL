
		<div class="side_col">
			<div class="news_box side_list">
				<div class="news_top"><img src="images/1px.gif" alt="" height="6" /></div>
				<div class="news_content">
					<ul class="side_nav">
						<?php get_children($parent_menu) ?>
					</ul>		
				</div>
				<div class="news_btm"><img src="images/1px.gif" alt="" height="6" /></div>
			</div>
			<div class="factsheet_box">
				<h2>Factsheet</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna...<br /><br /></p>
				<span class="read_more fact_more"><a href="#">Read More</a></span>
				<div class="cleaner"></div>
			</div>
			<div class="partners_box">
				<img src="images/baker_tilly_logo.jpg" alt="" /><img src="images/sas70_logo.jpg" alt="" /><img src="images/partner_logo.jpg" alt="" />
			</div>
		</div>


<?
function get_children($parent)
{
	$result = mysql_query("SELECT * FROM top_menu WHERE parent_id = $parent");
	$total_rows = mysql_num_rows($result);
	$i = 1;
	$class = '';
	
	while ($row = mysql_fetch_array($result))
	{
		if ($i == ($total_rows))
		{			
			$class = "class='last'";
		}
		
		if(trim($row['link_url']) != '')
		{
			?>
			<li <?=$class?>><a href="<?=$row['link_url']?>&parent=<?=$parent?>"><?=$row['name'] ?></a></li>
			<?php
		}
		else
		{
			?>
			<li <?=$class?>><a href="content.php?art_id=<?=$row['link_id']?>&parent=<?=$parent?>"><?=$row['name'] ?></a></li>
			<?php
		}
		
		$i++;
		
	}
}
?>