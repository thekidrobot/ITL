<?php
	include("includes/main/head.php");
	include("functions/ps_pagination.php"); 
?>
<body>	
<!--container-->
<div class="container">
	<?php include("includes/main/top_banner.php"); ?>
	<!--end_header-->
	<!--content-->
	<div class="content">
		<div class="core">
			<div class="core_top"><img src="images/content_top.jpg" alt="" /></div>
			<div class="core_content">
				<h2>News</h2>
				<div class="news_filter">
					<form name="news_form">
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
						<td>Search News by month:</td>
						<td>
							<select name="search_month">
							  <option>All</option>
								<?php
									$month_arr=array(1=>"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
									foreach($month_arr as $ma)
									{
										echo "<option value='".$ma."'";
										if($_REQUEST['search_month']==$ma)
										echo " selected";
										echo ">".$ma."</option>";
									}
								?>
							</select>
						</td>
						<td><input name="" type="submit" value="GO" /></td>
					  </tr>
					</table>
					</form>
				</div>
				
				<?php
					$sql = "SELECT id, date_article, title_article, content_plain FROM
									article WHERE status_article = 1 AND type_article IN('N','E')";

					if(isset($_REQUEST['search_month'])&& $_REQUEST['search_month']!="All")
					{
						$sql.=" AND date_article like '%".$_REQUEST['search_month']."%'";
					}
					
					$sql.=" ORDER BY id DESC";
					$pager = new PS_Pagination($conn,$sql,5,3);
					$result = $pager->paginate();
					$no_rows=mysql_num_rows($result);
					$counter=($no_page*$page)-9;
					while($row = mysql_fetch_assoc($result))
					{
						?>

						<div class="news_listing">
							<p class="listing_date"><?=$row['date_article']?></p>
							<h3><?=$row['title_article'];?></h3>
							<p class="news_detail"><?=substr($row['content_plain'], 0, 376)?> ...</p>
							<p class="news_read_more"><a href="#">read more >></a></p>
						</div>
						<?php
						$counter++;
					} 
					if($no_rows>=5 || ($page!=1 && isset($page)))
					{
						?>
						<div align="center" id="page"> <?php echo $pager->renderFullNav();?> </div>
						<?php
					}
					elseif($counter == 1)
					{
						?>
						<div align="center"><b>No news</b></div>
						<?php
					}
					?>
			</div>
			<div class="core_btm"><img src="images/content_btm.jpg" alt="" /></div>
		</div>

		<div class="side_col">
			<div class="news_box">
				<div class="news_top"><img src="images/1px.gif" alt="" height="6" /></div>
				<div class="news_content event_box">
					<h2>Event Calendar</h2>
					<div class="calendar_box">
						<?php include("functions/jcalendar.php");?>		
					</div>
				</div>
				<div class="news_btm"><img src="images/1px.gif" alt="" height="6" /></div>
			</div>
			<div class="partners_box">
				<img src="images/baker_tilly_logo.jpg" alt="" /><img src="images/sas70_logo.jpg" alt="" /><img src="images/partner_logo.jpg" alt="" />
			</div>
		</div>
		<div class="cleaner"></div>
	</div>
	<!--end_content-->
	<!--footer-->
	<?php include("includes/main/footer.php"); ?>
	<!--end_footer-->
</div>
<!--end_container-->			
</body>
</html>