<?php
include('includes/header.php');
include('../functions/ps_pagination.php');

$type_user=$_SESSION['type'];

if ($type_user!=1) redirect('index.php');

$id=$_GET['id'];
if($id=='') $id=1;
?>
<body>
 <div id="wrapper">
  <div id="wrapper">
   <h1><a href="#"><span><?=$website_name?></span></a></h1>
   <?php include('includes/menu.php'); ?>
   <div id="containerHolder">
	<div id="container">
	 <div id="sidebar">
	  <?php include('includes/side_menu.php'); ?>
	 </div>    
	 <div id="main">
	  <h2>View User</h2>
	  <h3><?php echo isset($status) ? $status : ''; ?></h3>
	  <?php 
	   //get data and list them
	   $query="select * from contact where id=$id";
	   $result=mysql_query($query);
	   $row=mysql_fetch_object($result)
	  ?>
	  <table cellpadding="0" cellspacing="0">
	   <tr><td><b>Name: </b></td><td><?=$row->firstname?></td></tr>
	   <tr><td><b>Surname: </b></td><td><?=$row->middlename?></td></tr>
	   <tr><td><b>Company: </b></td><td><?=$row->company?></td></tr>
	   <tr><td><b>Telephone: </b></td><td><?=$row->tel?></td></tr>
	   <tr><td><b>Mobile: </b></td><td><?=$row->mobile?></td></tr>
	   <tr><td><b>Email: </b></td><td><?=$row->email?></td></tr>
	   <tr><td><b>Status: </b></td><td><?=display_status($row->status)?></td></tr>
	   <tr><td><b>Registration IP Address: </b></td><td><?=$row->ip_addr?></td></tr>
	  </table>
	 </div>
	 <div class="clear"></div>
    </div>
   </div>	
   <?php include('includes/footer.php');?> 
   </div>
  </div>
</body>
</html>
