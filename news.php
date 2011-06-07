<?php
	include("includes/main/head.php");
	include("functions/ps_pagination.php"); 
?>
<body>	
<!--container-->
<div class="container">
	<?php include("includes/main/top_banner.php"); ?>
	<div style="background-color:#fff">
	<?php include("functions/jcalendar.php");?>
	
		<form name="news_form">
			<span>Search News by month: </span>
			<select name="search_month">
				<option value="All">All</option>
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
			<input type="submit" value="Go">
		</form>

	<?php
		$sql = "SELECT id, date_article, title_article, content_plain FROM
						article WHERE status_article = 1 AND type_article='N'";

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
			$date = explode("-", $row['date_article']);
			?>
			<div class="news_details">
				<div class="date_box" style="height: 100px;"><?php echo $date[0].'<br />'.$date[1].'<br />'.$date[2];?></div>
					<div>
						<h2><?=$row['title_article'];?></h2>
						<p><?=substr($row['content_plain'], 0, 30)?></p>
						<p class="read_more"><a rel="lyteframe" href="news_view.php?id=<?=$row['id_article'];?>" rev="width: 800px; height: 400px; scrolling: yes;">read more &gt;&gt;</a></p>
					</div>
				<div class="cleaner"></div>
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
