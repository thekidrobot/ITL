		<div class="side_col">
			<div class="news_box">
				<div class="news_top"><img src="images/1px.gif" alt="" height="6" /></div>
				<div class="news_content">
				<?php			
					$SQL = "SELECT * FROM article where type_article in('N','E') order by date_article limit 2";
					$result = mysql_query($SQL) or die(mysql_error());
					$total_rows = mysql_num_rows($result);
					$i = 1;
					?>
					<h2><a href="#" style="color:#fff">News &amp; Events</a></h2>
					<ul>
						<?
						while ($db_field = mysql_fetch_assoc($result))
						{
							if ($i == ($total_rows))
							{			
								$class = "class='last'";
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
