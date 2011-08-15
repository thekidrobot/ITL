<?php
	$no_page=10;
	if($_REQUEST['page']=="") $page=1;
	else $page=$_REQUEST['page'];
	
	if (isset($_GET['id']))
	{
		$id = $_GET['id'];
		$query="delete from article where id = $id";
		$r= mysql_query($query)or die(mysql_error()."cannot enter data");
		$status= "Article Deleted Sucessfully";
		redirect('gestion.php');
	}

?>
	<div id="containerHolder">
		<div id="container">
			<div id="sidebar">
				<ul class="sideNav">
					<?php include('includes/side_menu.php'); ?>
        </ul>
      </div>    
      <div id="main">
			<h2>All Articles</h2>	
			<table cellpadding="0" cellspacing="0">
				<tr align="center">
					<td><b>No.</b></td>
					<td><b>Title</b></td>
					<td><b>Type</b></td>
					<td><b>Date</b></td>
					<td><b>Actions</b></td>
				</tr>     
				<?php 
				$query="select * from article";
				$pager = new PS_Pagination($conn,$query,10,3);
				$result = $pager->paginate();
				$no_rows=mysql_num_rows($result);
				$counter=($no_page*$page)-9;
				while($row=mysql_fetch_array($result))
				{
					?>
					<tr class="tr_<?php echo $row['id'] ?>">
						<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo "<b>".$counter."</b>"?></td>
						<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row['title_article']?></td>  
						<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php 
							if($row['type_article']=="E") echo "Event";
							else echo "News";?>
						</td>  
						<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row['date_article']?></td>  
						<td class="action">
							<?php echo display_status($row['status_article']) ?>
							<a href="review_article.php?id=<?php echo $row['id']?>" class="view" id="view_<?php echo $row['id']?>">View</a>
							<a href="modify_article.php?id=<?php echo $row['id']  ?>" class="edit">Edit</a>
							<a href="gestion.php?id=<?php echo $row['id'];?>" onclick="return confirm('Are you sure do you want to delete?')" class="delete">Delete</a>
						</td>
					</tr>                        
					<?php
					$counter++;  
				}//while            
				?>
				<tr >
				<?php
					if($no_rows>=10 || ($_REQUEST['page']!=1 && isset($_REQUEST['page'])))
					{?>
						<td colspan="5" align="center"> <?php echo $pager->renderFullNav();?> </td>
						<?php
					}// if 
					elseif($counter == 1)
					{
						?>
						<td colspan="5">No articles yet</td>
						<?php
					}//else
				?>
				</tr> 
			</table>
			<br />
			<br />
		</div>
		<!-- // #main -->
		<div class="clear"></div>
	</div>
	<!-- // #container -->
</div>	
<!-- // #containerHolder -->