<?php 
include('includes/header.php');
include('../functions/ps_pagination.php');

$id=$_GET['id'];
if($id=='') $id=1;
?>
<body>
 <div id="wrapper">
  <div id="wrapper">
	<h1><a href="index.php"><span><?=$website_name?></span></a></h1>
	<?php include('includes/menu.php'); ?>
	<div id="containerHolder">
	 <div id="container">
	  <div id="sidebar">
	   <?php include('includes/side_menu.php'); ?>
	  </div>    
	  <div id="main">
	  <h2>View Document Details</h2>
	   <?php 
	   //get data and list them
	   $query="select d.*,c.firstname,c.middlename from document d,contact c where d.id=$id AND d.user_id=c.id";
	   
	   $result=mysql_query($query);
	   if (mysql_num_rows($result) == 0)
	   {
		$query="select * from document where id=$id ";
		$result=mysql_query($query);
	   }
	   $row=mysql_fetch_object($result)
	   
	  ?>
	  <table cellpadding="0" cellspacing="0">
	  <tr><td><b>Client: </b></td><td><?php if(trim($row->other_name." ".$row->surname) == "") echo "All"; else echo $row->other_name." ".$row->surname ?></td></tr>
	  <tr><td><b>Title: </b></td><td><?=$row->title?></td></tr>
	  <tr><td><b>Description: </b></td><td><?=$row->description?></td></tr>
	  <tr><td><b>Date created: </b></td><td><?=$row->date?></td></tr>
	  <tr><td><b>Date valid from: </b></td><td><?=$row->datevalidfrom?></td></tr>
	  <tr><td><b>Date valid to: </b></td><td><?=$row->datevalidto?></td></tr>
	  <tr><td><b>Created by: </b></td><td><?=$row->createdby?></td></tr>
	  <tr><td colspan="2" align="center"><a href="<?=$row->path?>" target="_blank">View document</a></td></tr>
	  </table>
	  </div>
	  <div class="clear"></div>
     </div>
	</div>	
    <?php 
	//update log table
	$query=mysql_query("INSERT INTO log(document_user_id,document_id,date,status)VALUES('".$row->user_id."','".$row->id."',now(),'document viewed')");
	include('includes/footer.php');?> 
   </div>
  </div>
</body>
</html>
