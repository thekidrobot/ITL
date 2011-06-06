<?php include("includes/main/head.php"); ?>
<body>	
<!--container-->
<div class="container">
	<!--header-->
	<?php include("includes/main/top_banner.php"); ?>
	<!--end_header-->
	<!--content-->
	<div class="content">
		<!--Main Content-->
		<?php include("includes/inner/main_content.php"); ?>
		<!--end Main Content-->
		<!--Side Content-->
    <?php
      if ($parent_menu == 0) include("includes/main/side_content.php");
      else include("includes/inner/side_content.php");
    ?>
		<!--End Side Content-->
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
