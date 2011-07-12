<?php 
include('includes/header.php');
include('../functions/ps_pagination.php');

$type_user=$_SESSION['type'];
$user_id = $_SESSION['id'];

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$login_query=mysql_query("SELECT login FROM user WHERE id=$id");
	$loginname=mysql_fetch_object($login_query);
	if(is_dir("documents/".$loginname->login)) deleteDirectory("documents/".$loginname->login);
	$query="delete from user where id = $id";
	$r= mysql_query($query)or die(mysql_error()."cannot enter data");
	$status= "User Deleted Sucessfully";
	redirect('users.php');
}
?>
<body>
	<div id="wrapper">
    <h1><a href="gestion.php"><span>International Financial Services</span></a></h1>
    <?php include('includes/menu.php'); ?>
    <div id="containerHolder">
      <div id="container">
        <div id="sidebar">
					<?php
            if ($type_user==1)
            {
              include('includes/side_menu.php');
            }
          ?>
        </div>
        <div id="main">
        <h2>All Users</h2>	
          <table cellpadding="0" cellspacing="0">
            <tr>
              <td><b>No.</b></td>
              <td><b>Name</b></td>
              <td><b>Email Address</b></td>
              <td><b>User Type</b></td>
              <td align="right"><b> Actions</b></td>
            </tr>     
            <?php
              $cols = 5;
              $query="select * from user ";
              
              if ($type_user!=1)
              {
                $query.="where id = $user_id";  
              }
                
              $pager = new PS_Pagination($conn,$query,10,3);
              $result = $pager->paginate();
              $counter = 1;
              while($row=mysql_fetch_object($result))
              {
               $sql = mysql_query("select name from user_type where id = $row->type");
               $result1 = mysql_fetch_array($sql);
               
                ?>
                <tr class="tr_<?php echo $row->id ?>">
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?="<b>".$counter."</b>"?></td>
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$row->other_name." ".$row->surname?></td>  
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$row->email?></td>
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$result1['name']?></td>
                  <td class="action">
                    <?php display_status($row->status) ?>
                    
                    <?php if ($type_user==1)
                    {
                      ?>
                      <a href="view_user.php?id=<?php echo $row->id?>" class="view" id="view_<?php echo $row->id?>">View</a>
                      <?php
                    }
                    ?>
                    <a href="add_user.php?id=<?php echo $row->id  ?>" class="edit">Edit</a>
                    <?php if ($type_user==1)
                    {
                      ?>
                      <a href="users.php?id=<?php echo $row->id;?>"  onclick="return confirm('Are you sure do you want to delete?')" class="delete" id="delete">Delete</a>
                      <?php
                    }
                    ?>
                    
                	</td>
                </tr>                        
                <?php
                $counter++;  
              }//while
            ?>
            <tr>
              <td colspan="<?=$cols?>" align="center"> <?php echo $pager->renderFullNav();?> </td>
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
	</div>
</body>
</html>