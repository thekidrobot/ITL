<?php 
include('includes/header.php');
include('../functions/ps_pagination.php');

$type_user=$_SESSION['type'];

if ($type_user!=1) redirect('index.php');

if (isset($_GET['id']))
{
	$id = $_GET['id'];
	$query="delete from contact where id = $id";
	$r= mysql_query($query)or die(mysql_error()." Error while deleting");
	$status= "User Deleted Sucessfully";
	redirect('subscribers.php');
}
elseif(isset($_GET['activate']))
{
 	$id = $_GET['activate'];

  $rs_actual_status = mysql_query("select status,email,firstname,middlename from contact where id = $id");
  while ($row = mysql_fetch_object($rs_actual_status))
  {
    $actual_status = $row->status;
    $fname = $row->firstname;
    $lname = $row->middlename;
    $email = trim($row->email);
  }
  
  if($actual_status == 0) $status = 1;
  else $status = 0;

  $sql = "UPDATE contact SET status = $status WHERE id = ". $id;
	$r= mysql_query($sql)or die(mysql_error()." Error while updating");

  if($status == 1)
  {
    //For the mail
    $subject = "Welcome to IFS!";
  
    $msg="<p>Dear ".$fname." ".$lname.",<br />
          <br />
          <p><h2>Thank you for register with ITL.</h2>
          Your membership has been activated.<br />
          You can login to our site to access the newsletter section.<br /><br />
          <br />
          -- <br />
          Thanks,<br />
          The IFS Team</p>";
    
    sendemail($email,$subject,$msg);
  }


	redirect('subscribers.php'); 
}
?>
<body>
	<div id="wrapper">
    <h1><a href="gestion.php"><span>International Financial Services</span></a></h1>
    <?php include('includes/menu.php'); ?>
    <div id="containerHolder">
      <div id="container">
        <div id="sidebar">
					<?php include('includes/side_menu.php'); ?>
        </div>
        <div id="main">
        <h2>All Users</h2>	
          <table cellpadding="0" cellspacing="0">
            <tr>
              <td><b>No.</b></td>
              <td><b>Name</b></td>
              <td><b>Company</b></td>
              <td><b>Mail</b></td>
              <td align="right"><b> Actions</b></td>
            </tr>     
            <?php
              $cols = 5;
              $query="select * from contact";
              $pager = new PS_Pagination($conn,$query,10,3);
              $result = $pager->paginate();
              $counter = 1;
              while($row=mysql_fetch_object($result))
              {
                ?>
                <tr class="tr_<?php echo $row->id ?>">
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?="<b>".$counter."</b>"?></td>
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$row->firstname." ".$row->middlename?></td>  
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$row->company?></td>
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$row->email?></td>
                  <td class="action">
                    <?=display_status($row->status) ?>
                    <a href="view_subscriber.php?id=<?php echo $row->id?>" class="view" id="view_<?php echo $row->id?>">View</a>
                    <a href="subscribers.php?activate=<?php echo $row->id  ?>" class="edit"><?php if ($row->status == 1) echo 'Deactivate'; else echo 'Activate' ?></a>
                    <a href="subscribers.php?id=<?php echo $row->id;?>"  onclick="return confirm('Are you sure do you want to delete?')" class="delete" id="delete">Delete</a>
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