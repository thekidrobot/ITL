<?php
include('includes/header.php');
include('../functions/ps_pagination.php');
$id=$_GET['id'];
if($id=='') $id=1;
 ?>
<body>
 <div id="wrapper">
  <div id="wrapper">
   <h1><a href="#"><span>International Financial Services</span></a></h1>
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
	   //get data and list them
	   $query="select * from article where id=$id";
	   $result=mysql_query($query);
	   $row=mysql_fetch_array($result)
	  ?>
	  <div><?=trim($row['content_article'])?></div>

	  </div>
	  <div class="clear"></div>
     </div>
	</div>	
    <?php include('includes/footer.php');?> 
   </div>
  </div>
</body>
</html>