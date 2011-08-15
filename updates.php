<?php
	include("includes/main/head.php");
	include("functions/ps_pagination.php");
?>
<body>	
<!--container-->
<div class="container">
	<?php include("includes/main/top_banner.php");?>
	<!--end_header-->
	<!--content-->
	<div class="content">
		<div class="core">
			<div class="core_top">
				<img src="images/content_top.jpg" alt="" />
			</div>
			<div class="core_content">
				<div class="news_filter">
					<form name="news_form">
					<table border="0" cellspacing="0" cellpadding="0">
					  <tr>
							<td>Search Updates by month:</td>
						<td>
							<select name="search_month">
							  <option>All</option>
								<?php
									$month_number = 1;
									$month_arr=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
									foreach($month_arr as $ma)
									{
										echo "<option value='".$month_number."'";
										if($_REQUEST['search_month']==$ma) echo " selected";
										echo ">".$ma."</option>";
										$month_number++;
									}
								?>
							</select>
						</td>
						<td><input name="" type="submit" value="GO" /></td>
					  </tr>
					</table>
					</form>
				</div>
				
				<h2>Updates</h2>
				<?php
					$sql = "SELECT path, title, description ,EXTRACT(MONTH from date) as month, date FROM
									document where type = 2 and datevalidto > '".date('Y/m/d H:i:s') ."'";

					if(isset($_REQUEST['search_month'])&& $_REQUEST['search_month']!="All")
					{
						$sql.=" AND EXTRACT(MONTH from date) = ".$_REQUEST['search_month'];
					}
					$sql.=" ORDER BY date DESC";
					$pager = new PS_Pagination($conn,$sql,5,3);
					$result = $pager->paginate();
					$no_rows=mysql_num_rows($result);
					while($row = mysql_fetch_assoc($result))
					{
						?>
						<div class="news_listing">
							<p class="listing_date"><?=$row['date']?></p>
							<h3><?=$row['title'];?></h3>
							<p class="news_detail"><?=substr($row['description'], 0, 376)?></p>
							<p class="news_read_more"><a href="<?="admin/".$row['path']?>">View Document >></a></p>
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
					elseif($no_rows == 0)
					{
						?>
						<div align="center"><b>No updates published... Yet!</b></div>
						<?php
					}
					?>
				</div>
			
				<div class="core_btm">
					<img src="images/content_btm.jpg" alt="" />
				</div>

			</div>
      
      <!-- side content-->
      <?php include("includes/main/side_content.php"); ?>		
      <!-- end side content-->


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