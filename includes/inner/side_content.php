
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
			<?php 
			$result = mysql_query("SELECT * FROM article WHERE type_article = 'F' order by date_article desc limit 1");
			
			while ($row = mysql_fetch_array($result))
			{
				$factsheet_id = $row['id'];
				$factsheet_title = $row['title_article'];
				$factsheet_text = $row['content_plain'];
			}
			
			?>
			<div class="factsheet_box">
				<h2><?=$factsheet_title ?></h2>
				<p><?=substr($factsheet_text,0,100); ?>...<br /><br /></p>
				<span class="read_more fact_more"><a href="content.php?art_id=<?=$factsheet_id ?>">Read More</a></span>
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
			<li <?=$class?>><a href="<?=$row['link_url']?>"><?=$row['name'] ?></a></li>
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