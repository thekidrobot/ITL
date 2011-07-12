		<div class="side_col">
			<div class="news_box">
				<div class="news_top"><img src="images/1px.gif" alt="" height="6" /></div>
				<div class="news_content">
				<?php			
					$SQL = "SELECT * FROM article where type_article in('N','E') order by date_article limit 2";
					$result = mysql_query($SQL) or die(mysql_error());
					$total_rows = mysql_num_rows($result);
					$i = 1;
					$class = "";
					?>
					<h2><a href="events.php" style="color:#fff">News &amp; Events</a></h2>
					<ul>
						<?
						while ($db_field = mysql_fetch_assoc($result))
						{
							if ($i == ($total_rows))
							{			
								$class = "class='last'";
							}
							else
							{
								$class = "";	
							}
							?>
							<li <?=$class?>>
								<p class="date"><?=$db_field['date_article']?></p>
								<h3><?=$db_field['title_article']?></h3>
								<p><?=substr($db_field['content_plain'],0,100)?>...</p>
								<span class="read_more news_more"><a href="content.php?art_id=<?=$db_field['id']?>">Read More</a></span>
								<div class="cleaner"></div>
							</li>
							<?php
							$i++;
						}
						?>
					</ul>
					<span class="all_news"><a href="events.php">All News and Events &rsaquo;&rsaquo;</a></span>
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
