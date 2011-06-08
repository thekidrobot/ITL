<?php 
include('includes/header.php');
include('../functions/ps_pagination.php');

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$file_query=mysql_query("SELECT path FROM document WHERE id=$id");
	$filename=mysql_fetch_object($file_query);
	unlink($filename->path);
	$query="delete from document where id = $id";
	$r= mysql_query($query)or die(mysql_error()."cannot enter data");
	$status= "Document Deleted Sucessfully";
	redirect('documents.php');
}
?>

<body>
 <div id="wrapper">
 <h1><a href="index.php"><span><?=$website_name?></span></a></h1>
	<?php include("includes/menu.php"); ?>
	<div id="containerHolder">
		<div id="container">
			<div id="sidebar">
				<ul class="sideNav">
					<?php include('includes/side_menu.php'); ?>
				</ul>
      </div>    
      <div id="main">
				<h2>Documents</h2>	
				<table cellpadding="0" cellspacing="0">
					<tr>
						<td><b>No.</b></td>
						<td><b>Title</b></td>
						<td><b>Client</b></td>
						<td><b>Date</b></td>
						<td align="right"><b>Actions</b></td>
          </tr>     
					<?php
						//check if user type = admin or superadmin
						$type_query=mysql_query("SELECT type FROM user WHERE login='".$_SESSION['member']."'");
						$type_user=mysql_fetch_object($type_query);
						
						//get data and list them
						if($type_user->type==0)
							$query="select * from document";
						elseif($type_user->type==1)
							$query="SELECT d.* FROM document as d,user as u WHERE u.type=2 AND u.id=d.user_id";
						
						$pager = new PS_Pagination($conn,$query,10,3);
						$result = $pager->paginate();
						$no_rows=mysql_num_rows($result);
						if($result)
						{
						  $counter=($no_page*$page)-9;
							while($row=mysql_fetch_object($result))
							{
								?>
								<tr class="tr_<?php echo $row->id ?>">
									<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo "<b>".$counter."</b>"?></td>
									<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row->title?></td>  
									<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php
										$get_client=mysql_query("SELECT other_name,surname FROM user WHERE id=$row->user_id");
										$userid=mysql_fetch_object($get_client);
										echo $userid->other_name." ".$userid->surname;
									?></td>  
									<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row->date?></td>  
									<td class="action">
										<a href="view_document.php?id=<?php echo $row->id?>" class="view" id="view_<?php echo $row->id?>">View</a>
										<a href="add_document.php?id=<?php echo $row->id  ?>" class="edit">Edit</a>
										<a href="documents.php?id=<?php echo $row->id;?>" onclick="return confirm('Are you sure you want to delete?')" class="delete">Delete</a>
									</td>
								</tr>                        
								<?php
								$counter++;  
							}//while            
				    }//if
					?>
          <tr>
					<?php
						if($no_rows>=10 || ($_REQUEST['page']!=1 && isset($_REQUEST['page'])))
						{	?>
							<td colspan="5" align="center"> <?php echo $pager->renderFullNav();?> </td>
							<?php
						}// if 
						elseif($counter == 1)
						{
							?>
							<td colspan="5" align="center">No documents yet</td>
							<?php
						}//else  ?>
		      </tr> 
				</table>
			</div>
			<!-- // #main -->
			<div class="clear"></div>
		</div>
    <!-- // #container -->
		</div>	
    <!-- // #containerHolder -->       
    <?php include('includes/footer.php');?> 
    <!-- // #wrapper -->
</body>
</html>