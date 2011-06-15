<?php
session_start();
include('../functions/conn.php');
include('../functions/process_login.php'); 
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <title>ITL</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="style/css/login_style.css" rel="stylesheet" type="text/css">
  <style type="text/css">
    span{ behavior: url(iepngfix.htc) }
  </style> 
</head>
<body>
  <div id="content">
    <div id="innerholder">
      <h3><span></span><hr></h3>
      <?php if($error)
      {?>
        <div>
        <div id="label"><b class="error">Username/Password error</b></div>
        </div>
        <?php
      }
      ?>
       <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
        <table>
					<tr>
						<td>
							<div id="label"><b>Username :</b></div>
						</td>
						<td>
							<div <?php if(isset($err_user)&& $err_user!="")
							{?>
								class="err_roundedfield"
								<?php
							}
							else
							{
								?>
								class="roundedfield"
								<?php
							}
							?>>  
							<input type="text" name="username" />
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div id="label"><b>Password :</b></div>
						</td>
						<td>
							<div <?php if(isset($err_passwrd)&& $err_passwrd!="")
							{?>
								class="err_roundedfield"
								<?php
							}
							else
							{
								?>
								class="roundedfield"
								<?php
							}
							?>> 
							<input type="password" name="password" /></div>    
							</div>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td align="center">
							<input type="submit" value="Login" id="loginbutton" name="loginbutton" />
						</td>
					</tr>
				</table>
				<div>
        

      </div>
    <div>

    

		</form>
  </div>
</div>
</body>
</html>