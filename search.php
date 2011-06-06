<?php
	include("includes/main/head.php");
	include("functions/ps_pagination.php"); 
?>
<body>	
<!--container-->
<div class="container">
	<!--header-->
	<?php include("includes/main/top_banner.php"); ?>
	<!--end_header-->
	<!--content-->
	<div class="content">
		<div class="core">
			<div class="core_top"><img src="images/content_top.jpg" alt="" /></div>
			<div class="core_content">
				<h2>Search Results</h2>
				<?php
				$search = escape_value($_POST['search']);
				$sql = "select * from article where content_article like '%$search%'";
				
				$pager = new PS_Pagination($conn,$sql,5,3);
				$result = $pager->paginate();
				
				while($row=mysql_fetch_array($result))
				{
					?>
					<div class="search_result_box">
						<p class="search_title"><a href="content.php?art_id=<?=$row['id']?>"><?= $row['title_article'] ?></a></p>
						<p class="search_detail"><?=substr($row['content_plain'],0,255) ?>...</p>	
						<p class="search_link"><a href="content.php?art_id=<?=$row['id']?>">http://<?=$_SERVER['HTTP_HOST']?>/content.php?art_id=<?=$row['id']?></a></p>
					</div>
					<?php
				}
				?>
				<div align="center"><br/><?php echo $pager->renderFullNav();?></div>
				</div>
			<div class="core_btm"><img src="images/content_btm.jpg" alt="" /></div>
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
