<?php
include('header.php');
include('includes/ps_pagination.php');
$id=$_GET['id'];
if($id=='') $id=1;
?>
<body>
 <div id="wrapper">
  <div id="wrapper">
   <h1><a href="#"><span>International Financial Services</span></a></h1>
	<?php include('menu.php'); ?>
	<div id="containerHolder">
	 <div id="container">
	  <div id="sidebar">
	   <?php include('side_menu.php'); ?>
	  </div>    
	  <div id="main">
	  <h2>View User</h2>
	  <h3><?php echo isset($status) ? $status : ''; ?></h3>
	  <?php 
	   //get data and list them
	   $query="select * from user where id=$id";
	   $result=mysql_query($query);
	   $row=mysql_fetch_object($result)
	  ?>
	  <table cellpadding="0" cellspacing="0">
	  <tr><td><b>Name: </b></td><td><?=$row->other_name?></td></tr>
	  <tr><td><b>Surname: </b></td><td><?=$row->surname?></td></tr>
	  <tr><td><b>Company: </b></td><td><?=$row->company?></td></tr>
	  <tr><td><b>Type: </b></td><td><?
	  if($row->type==0)
	    echo "Superadmin";
	  elseif($row->type==1)
        echo "Admin";
	  else
        echo "Client";	  
	  ?></td></tr>
	  <tr><td><b>Login: </b></td><td><?=$row->login?></td></tr>
	  <tr><td><b>Password: </b></td><td><?=$row->password?></td></tr>
	  <tr><td><b>Email: </b></td><td><?=$row->email?></td></tr>
	  <tr><td><b>Status: </b></td><td><?=display_status($row->status)?></td></tr>
	  </table>
	  <div align="center"><input type="button" name="back" value="Back" onclick='location.href="admin_space.php"'/></div>
	  </div>
	  <div class="clear"></div>
     </div>
	</div>	
    <?php include('footer.php');?> 
   </div>
  </div>
</body>
</html>
