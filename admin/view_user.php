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
	   $query="select * from user where id=$id";
	   $result=mysql_query($query);
	   $row=mysql_fetch_object($result);
	   
	   $sql = mysql_query("select name from user_type where id = $row->type");
	   $result1 = mysql_fetch_object($sql);
	   
	  ?>
	  <table cellpadding="0" cellspacing="0">
	   <tr><td><b>Name: </b></td><td><?=$row->other_name?></td></tr>
	   <tr><td><b>Surname: </b></td><td><?=$row->surname?></td></tr>
	   <tr><td><b>Company: </b></td><td><?=$row->company?></td></tr>
	   <tr><td><b>Type: </b></td><td><?=$result1->name?></td></tr>
	   <tr><td><b>Login: </b></td><td><?=$row->login?></td></tr>
	   <tr><td><b>Email: </b></td><td><?=$row->email?></td></tr>
	   <tr><td><b>Status: </b></td><td><?=display_status($row->status)?></td></tr>
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
