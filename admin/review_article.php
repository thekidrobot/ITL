<?php
include('includes/header.php');
include('../functions/ps_pagination.php');
$id=$_GET['id'];
if($id=='') $id=1;
 ?>
<body>
 <div id="wrapper">
  <div id="wrapper">
   <h1><a href="index.php"><span>International Financial Services</span></a></h1>
	<?php include('includes/menu.php'); ?>
	<div id="containerHolder">
	 <div id="container">
	  <div id="sidebar">
	   <?php include('includes/side_menu.php'); ?>
	  </div>    
	  <div id="main">
	  <h2>View an Article</h2>
	  <h3><?php echo isset($status) ? $status : ''; ?></h3>
	  <?php 
	   get_inner_article($id);
	  ?>
	  </div>
	  <div class="clear"></div>
     </div>
	</div>	
    <?php include('includes/footer.php');?> 
   </div>
  </div>
</body>
</html>