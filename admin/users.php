<?php 
include('header.php');
include('includes/ps_pagination.php');
$no_page=10;
if($_REQUEST['page']=="")
 $page=1;
else
 $page=$_REQUEST['page']; 
if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$login_query=mysql_query("SELECT login FROM user WHERE id=$id");
	$loginname=mysql_fetch_object($login_query);
	if(is_dir("documents/".$loginname->login))
	  deleteDirectory("documents/".$loginname->login);
	$query="delete from user where id = $id";
	$r= mysql_query($query)or die(mysql_error()."cannot enter data");
	$status= "User Deleted Sucessfully";
	redirect('admin_space.php');
}

?>
<body>
	<div id="wrapper">
    <h1><a href="gestion.php"><span>International Financial Services</span></a></h1>
	<?php include('menu.php'); ?>
	<div id="containerHolder">
		<div id="container">
			<div id="sidebar">
					<?php include('side_menu.php'); ?>
            </div>    
			<?//check if admin or superadmin
					$type_query=mysql_query("SELECT type FROM user WHERE login='".$_SESSION['member']."'");
					$type_user=mysql_fetch_object($type_query);
			?>
            <div id="main">
			<h2>All Users</h2>	
			<table cellpadding="0" cellspacing="0">
            <tr>
                <td><b>No.</b></td>
					<td><b>Name</b></td>
					<td><b>Email Address</b></td>
					<?if($type_user->type==0)
					  echo "<td><b>User Type</b></td>";
					?>
                    <td align="right"><b> Actions</b></td>
                    </tr>     
					<?php 
					$cols=4;
					//get data and list them
					if($type_user->type==0)
					{
					 $cols=5;
					$query="select * from user";
					}
					elseif($type_user->type==1)
					 $query="SELECT * FROM user WHERE type=2";
				    $pager = new PS_Pagination($conn,$query,10,3);
				    $result = $pager->paginate();
					$no_rows=mysql_num_rows($result);
					   $counter=($no_page*$page)-9;
					 
					 if($result)
					{
					   while($row=mysql_fetch_object($result))
					   {
					    ?>
							<tr  class="tr_<?php echo $row->id ?>">
                                <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo "<b>".$counter."</b>"?></td>
                                <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row->other_name." ".$row->surname?></td>  
								<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row->email?></td>  
								<?
								if($type_user->type==0)
								{
								echo "<td ";
								 if ($counter%2!=0) 
								 echo "class='odd' ";
                                 echo " >".get_type($row->type)."</td>";  
								}
								?>
								<td class="action">
								<?php echo display_status($row->status) ?>
								<a href="view_user.php?id=<?php echo $row->id?>" class="view" id="view_<?php echo $row->id?>">View</a>
								<a href="add_user.php?id=<?php echo $row->id  ?>" class="edit">Edit</a>
								<?if($row->type!=0)
								{?>
								<a href="admin_space.php?id=<?php echo $row->id;?>"  onclick="return confirm('Are you sure do you want to delete?')" class="delete" id="delete">Delete</a>
								<?}?>
								</td>
                            </tr>                        
							<?php
						    $counter++;  
						}//while            
				    }//if
					
					?>
                    <tr >
					<?php
					if($no_rows>=10 || ($_REQUEST['page']!=1 && isset($_REQUEST['page']))){?>
						<td colspan="<?=$cols?>" align="center"> <?php echo $pager->renderFullNav();?> </td>
					<?php }// if 
					elseif($counter == 1){
					?>
						<td colspan="<?=$cols?>" align="center">No clients yet</td>
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
    <?php include('footer.php');?> 
    <!-- // #wrapper -->
	</div>
</body>
</html>