		<div class="core">
			<div class="core_top"><img src="images/content_top.jpg" alt=""/></div>
			<div class="core_content">
			<?php 
				get_inner_article($id_article);
			?>
			<?php
			if(substr($_SERVER['HTTP_REFERER'],strrpos($_SERVER['HTTP_REFERER'], "/")+1) == 'search.php')
			{
				?>
				<div align="right"><a href="javascript:history.back()">Back to the search results</a></div>
				<?php
			}
			?>
			</div>
			<div class="core_btm"><img src="images/content_btm.jpg" alt="" /></div>
		</div>