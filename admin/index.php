<?php 
include('includes/header.php');
include('../functions/ps_pagination.php');
session_start();
?>

<?php
	if (isset($_GET['id']))
	{
		$id = escape_value($_GET['id']);
		//$query="delete from article where id = $id";
		//$r= mysql_query($query)or die(mysql_error()."cannot enter data");
		//$status= "Article Deleted Sucessfully";
		
    $status_query = mysql_query("select status_article from article where id = $id");
    $result = mysql_fetch_object($status_query);
    
    if($result->status_article == 0){
      $query="update article set status_article = 1 where id = $id";
      $r= mysql_query($query)or die(mysql_error()."cannot enter data");
      $status= "Article deactivated Sucessfully";  
    }
    elseif($result->status_article == 1){
      $query="update article set status_article = 0 where id = $id";
      $r= mysql_query($query)or die(mysql_error()."cannot enter data");
      $status= "Article activated Sucessfully";
    } 
    redirect('index.php');
	}
	
	if($_POST['type']) $content_type = $_POST['type'];
	else $content_type = "";
	
	$user_type = $_SESSION['type'];

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
				<h2>All Articles</h2>
				<form name="content" action="<?=$_SERVER['PHP_SELF']?>" method="post">
					<select name="type" onchange="content.submit()">
						<option value="">--Select a Type--</option>
						<?php
						if ($user_type == 1)
						{
							?>
							<option value="A">Articles</option>
							<?
						}
						?>
						<option value="E">Events</option>
						<option value="F">Factsheets</option>
						<option value="N">News</option>						
					</select>
				</form>
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
					if ($user_type != 1)
					{
						$query.=" where type_article <> 'A'";
						if ($content_type != "") $query.=" and type_article = '$content_type'";
					}
					else
					{
						if ($content_type != "") $query.=" where type_article = '$content_type'";	
					}
					
					$pager = new PS_Pagination($conn,$query,30,3);
					$result = $pager->paginate();
					$no_rows = mysql_num_rows($result);
					$counter = 1;
					while($row = mysql_fetch_array($result))
					{
						?>
						<tr class="tr_<?php echo $row['id'] ?>">
							<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo "<b>".$counter."</b>"?></td>
							<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row['title_article']?></td>  
							<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>>
								<?php 
									if($row['type_article']=="E") echo "Event";
									elseif($row['type_article']=="A") echo "Article";
									elseif($row['type_article']=="N") echo "News";
									elseif($row['type_article']=="F") echo "Factsheet";
								?>
							</td>  
							<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row['creation_article']?></td>  
							<td class="action">
								<?php //echo display_status($row['status_article']) ?>
								<a href="review_article.php?id=<?php echo $row['id']?>" class="view" id="view_<?php echo $row['id']?>">View</a>
								<a href="modify_article.php?id=<?php echo $row['id']?>" class="edit">Edit</a>
								<?php
                if($row['status_article'] == 0)
                {
                  ?>
                  <a href="index.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure do you want to activate?')">Activate</a>
                  <?php
                }
                elseif($row['status_article'] == 1)
                {
                  ?>
                  <a href="index.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure do you want to deactivate?')">Deactivate</a>
                  <?php
                }
                ?>
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
<?php include('includes/footer.php');?> 
 <!-- // #wrapper -->
 </div>
</body>
</html>

