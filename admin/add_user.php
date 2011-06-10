<?php
include('includes/header.php');
include('../functions/ps_pagination.php');

$type_user=$_SESSION['type'];
if ($type_user!=1) redirect('index.php');

$query=mysql_query("SELECT * FROM user WHERE id='".$_REQUEST['id']."'");
$res=mysql_fetch_object($query);
if($_POST['Add']!='')
{
	$postArray = &$_POST ;
	$other_name = escape_value($postArray['other_name']);
	$surname = escape_value($postArray['surname']);
	$company = escape_value($postArray['company']);
	$type = escape_value($postArray['type']);
	$login = escape_value($postArray['login']);
	$password = escape_value($postArray['password']);
	$email = escape_value($postArray['email']);
	$status = escape_value($postArray['status']);
	$error="";
  
  if($_POST['Add']=='Add')
	{
		//check if email already exists
		$query=mysql_query("SELECT email FROM user WHERE email='".$email."'");
		$echeck=mysql_num_rows($query);
		
    if($echeck!=0) $error="Email already exists";
		$query=mysql_query("SELECT login FROM user WHERE login='".$login."'");
		$echeck=mysql_num_rows($query);
		if($echeck!=0) $error="<br />Login name already exists";
		if($error=="")
		{
			$query="INSERT INTO user
              (other_name,surname,company,type,login,password,email,status)
              VALUES
              ('$other_name','$surname','$company','$type','$login','".md5($password)."','$email','$status')";
			
			$r= mysql_query($query);
			$id =mysql_insert_id();
			$status= "User Added Sucessfully";
			redirect('users.php');
		}
	}
	elseif($_POST['Add']=='Save')
	{
    $query="UPDATE user SET other_name='$other_name',surname='$surname',company='$company',type='$type',login='$login',email='$email',status='$status'";
    if($password!="")
    $query.=" ,password='".md5($password)."'";
    $query.=" WHERE id=".$_REQUEST['id'];
    $r=mysql_query($query);
		$status= "User Edited Sucessfully";
		redirect('users.php');
	}
}

?>

<body>
	<div id="wrapper">
		<h1><a href="#"><span><?=$website_name?></span></a></h1>
		<?php include('includes/menu.php'); ?>
		<div id="containerHolder">
			<div id="container">
        <div id="sidebar">
          <?php include('includes/side_menu.php'); ?>
        </div>    
				<div id="main">
        <?php
          if($_REQUEST['id']!="")
           echo "<h2>Edit User</h2>";
          else
           echo "<h2>Add a User</h2>";
        ?>
        <h3><?php echo isset($_GET['status']) ? $_GET['status'] : ''; ?></h3>
				<?php
          if($error!="") echo "<div class='error'>".$error."</div>";?>
          <form method="post" name='user_form' onsubmit="return ValidateForm()">
						<fieldset>
            <table cellpadding="0" cellspacing="0">
              <tr>
								<td><b>Name: </b></td>
								<td><input class="text-long" type="text" name="other_name" value="<?=$res->other_name?>" /></td>
							</tr>
              <tr>
								<td><b>Surname: </b></td>
								<td><input class="text-long" type="text" name="surname" value="<?=$res->surname?>" /></td>
							</tr>
              <tr>
								<td><b>Company: </b></td>
								<td><input class="text-long" type="text" name="company" value="<?=$res->company?>" /></td>
							</tr>
              <tr>
								<td><b>Type: </b></td>
								<td>
								<?php
              
              $query=mysql_query("SELECT * FROM user_type");
              ?>
              <select name="type">
								<?php
                while($result = mysql_fetch_array($query))
                {
                  ?>
                  <option value="<?=$result['id'] ?>" <? if($res->type==0) echo "selected"?>><?=$result['name']?></option>
                  <?
                }
                ?>
							</select>
                <tr>
									<td><b>Login: </b></td>
									<td><input class="text-long" type="text" name="login" value="<?=$res->login?>" /></td>
								</tr>
                <tr>
									<td><b>Password: </b></td>
									<td><input class="text-long" type="text" name="password" /></td>
								</tr>
                <tr>
									<td><b>Email: </b></td>
									<td><input class="text-long" type="text" name="email" value="<?=$res->email?>" /></td>
								</tr>
                <tr>
									<td><b>Status: </b></td>
									<td>
										<select name="status">
											<option value="1" <? if($res->status==1 || $_REQUEST['id']=="") echo "selected"?>>Active</option>
											<option value="0" <? if($res->status==0 && $_REQUEST['id']!="") echo "selected"?>>Inactive</option>
		                </select>
									</td>
								</tr>
								<?php
									if($_REQUEST['id']=="")
									{ 
										$value = "Add";
									}
									else
									{
										$value = "Save";
									}
								?>
								<tr>
									<td>&nbsp;</td>
									<td>
										<input style="margin-top:5px" type="submit" class="button-submit" value="<?=$value ?>" name="Add" id ="add" />&nbsp;&nbsp;
										<input type="button" class="button-submit" value="Cancel" name="Cancel" onclick="confirm_msg('user')" />
									</td>
								</tr>	
					  </table>
						</fieldset>
          </form>
        </div>
      <!-- // #main -->
			<div class="clear"></div>
    </div>
    <!-- // #container -->
    </div>	
    <!-- // #containerHolder -->       
		<?php include('includes/footer.php');?> 
    </div>
    <!-- // #wrapper -->
</body>
</html>