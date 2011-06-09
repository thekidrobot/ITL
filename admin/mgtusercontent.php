<div id="containerHolder">
	<div id="container">
		<?php include("includes/side_menu.php"); ?>
		<!-- // #sidebar -->
		<!-- h2 stays for breadcrumbs -->
		<h2 class="status"><?php echo $status ?></h2>
		<h2><a href="#">User Management</a> &raquo; <a href="#" class="active" id="menu" >Click to add new user</a></h2>
		<div id="main">
			<h3>Listing section</h3>
			<div id="dialog-confirm" title="Delete user?" style="display:none; height:56px !important;">
			<p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Are you sure?</p>
		</div>
    <table cellpadding="0" cellspacing="0">
    <tr  >
			<td><b> No.</b></td>
			<td><b> Name</b></td>
			<td><b>Jobtitle</b></td>
			<td align="center"><b> Actions</b></td>
    </tr>     
    <?php 
			//get data and list them
			$query="select * from staff";
			$pager = new PS_Pagination($conn,$query,10,3);
			$result = $pager->paginate();
			// if()
			{
				$counter=0;
				while($row=mysql_fetch_array($result))
				{
					?>
					<tr  class="tr_<?php echo $row['staff_id'] ?>">
					<td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo "<b>".$counter."</b>"?></td>
          <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row['f_name']." ".$row['l_name']?></td>
          <td <?php if ($counter%2!=0) echo"class='odd'" ; ?>><?php echo $row['jobtitle'] ?></td>
          <td class="action">
          <!-- dialogue script goes here-->
          <script type="text/javascript">
						// increase the default animation speed to exaggerate the effect
						$.fx.speeds._default = 800;
						$(function()
						{
							$('#dialog_<?php echo $row['staff_id']?>').dialog({
								autoOpen: false,
								show: 'blind',
								hide: 'explode'
							});
				
							$('#view_<?php echo $row['staff_id']?>').click(function()
							{
								$('#dialog_<?php echo $row['staff_id']?>').dialog('open');
								return false;
							});
						});
					</script>
          <!--end script goes here-->
					
					<?php echo display_status($row['status']) ?>
					<a href="#" class="view" id="view_<?php echo $row['staff_id']?>">View</a>
					<a href="user_edit.php?id=<?php echo $row['staff_id']  ?>" class="edit">Edit</a>
					<a href="<?php echo $row['staff_id'];?>" class="delete">Delete</a>
          <!--dialogue content-->
          <div id="dialog_<?php echo $row['staff_id']?>" title="Staff Details">
          
						<p><b>First Name     :      </b><?php echo $row['f_name'] ?></p>
						<p><b>Last Name      :      </b><?php echo $row['l_name'] ?></p>    
						<p><b>Email          :      </b><?php echo $row['email']  ?></p>       
						<p><b>Jobtitle       :      </b><?php echo $row['jobtitle'] ?></p>         
						<p><b>Status         :      </b><?php echo display_status($row['status']) ?></p>         
						<p><b>Username       :      </b><?php echo $row['username'] ?></p>   
						<p><b>Password       :      </b><?php echo  $row['pwd']?></p>   

					</div> 
          <!--end dialogue content-->
				</td>
      </tr>                        
					<?php
					$counter++;  
				}//while            
			}//if
			?>
			<tr >
				<td colspan="4"> <?php echo $pager->renderFullNav();?> </td>
      </tr> 
    </table>
		<br/>
    <form action="" class="jNice" name="add_user" method="post">
			<div class="add_user">
				<h3>ADD NEW USER</h3>
				<fieldset>
					<p><label>First Name:</label><input type="text" class="text-long" name="f_name" /></p>
					<p><label>Last Name:</label><input type="text" class="text-long" name="l_name"/></p>
					<p><label>Email:</label><input type="text" class="text-long" name="email" /></p>
					<p><label>UserName:</label><input type="text" class="text-long" name="username" /></p>
					<p><label>Password:</label><input type="text" class="text-long" name="password" /></p>
					<p><label>Address:</label><textarea name="address" rows="2" cols="10"></textarea></p>
					<p><label>Job title:</label><input type="text" class="text-medium"  name="jobtitle"/></p>
					<p><label>Status:</label>
					<select name="status">
						<option value="1">Active</option>
						<option value="0">Inactive</option>
					</select>
					</p>
					<p><label>User Right:</label>
          <select name="rights">
						<?php
						$query="select * from login_type order by login_id desc";
						$r= mysql_query($query)or die(mysql_error());
						if(mysql_affected_rows()>0)
						{
							while($result=mysql_fetch_array($r))
							{
								?>
                <option value="<?php echo $result['login_id'] ?>"><?php echo $result['title'] ?></option>
                <?php 
							}//while
						}//if
						?>
					</select>
					</p>
					<input type="submit" value="Add"  name="add" class="add" id="add"/>
        </fieldset>
        <h3 class='hide'>HIDE</h3>
      </div>
    </form>
  </div>
  <!-- // #main -->
  <div class="clear"></div>
</div>
<!-- // #container -->
</div>	
<!-- // #containerHolder -->