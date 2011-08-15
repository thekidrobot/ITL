<?php 
include('includes/header.php');
include('../functions/ps_pagination.php');

$type_user=$_SESSION['type'];

if ($type_user!=1) redirect('index.php');

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
              <td><b>User</b></td>
              <td><b>Document</b></td>
              <td><b>Date</b></td>
              <td><b>Entry</b></td>
            </tr>     
            <?php
              $cols = 5;
              $query="select * from log order by date desc";
              $pager = new PS_Pagination($conn,$query,10,3);
              $result = $pager->paginate();
              $counter = 1;
              while($row=mysql_fetch_object($result))
              {
               $sql1 = mysql_query("select title from document where id = $row->document_id");
               $result1 = mysql_fetch_object($sql1);
               
               $sql2 = mysql_query("select login from user where id = $row->document_user_id");
               $result2 = mysql_fetch_object($sql2);
               
                ?>
                <tr class="tr_<?php echo $row->id ?>">
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?="<b>".$counter."</b>"?></td>
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$result2->login?></td>  
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$result1->title?></td>
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$row->date?></td>
                  <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?=$row->status?></td>
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