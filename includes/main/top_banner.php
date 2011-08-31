	<?php
    $today = getdate();
  ?>
  <div class="header">
		<div class="header_top">
			<div class="clock_box">
			<table border="0" cellspacing="5" cellpadding="0">
			  <tr>
			  	<td>
						<iframe src="clock_san_francisco.html" frameborder="0" height="70px" width="70px" scrolling="no"></iframe>
					</td>
					<td>
						<?php
              
                $currdate=mktime(0,0,0,date('m'),date('d'),date('Y'));
                $start_date='03/25/'.$today[year];
                list($day,$mon,$year)=explode('/',$start_date);
                $start_date=mktime(0,0,0,$mon,$day,$year);
     
                $end_date='10/25/'.$today[year];
                list($day,$mon,$year)=explode('/',$end_date);
                $end_date=mktime(0,0,0,$mon,$day,$year);

                if ($currdate >= $start_date and $currdate <= $end_date)
                {
                  ?><iframe src="clock_london_utc.html" frameborder="0" height="70px" width="70px" scrolling="no"></iframe><?
                }else 
                {
                  ?><iframe src="clock_london.html" frameborder="0" height="70px" width="70px" scrolling="no"></iframe><?
                }
            ?>
					</td>
					<td>
						<iframe src="clock_mauritius.html" frameborder="0" height="70px" width="70px" scrolling="no"></iframe>
					</td>
					<td>
						<iframe src="clock_singapore.html" frameborder="0" height="70px" width="70px" scrolling="no"></iframe>
					</td>

			  </tr>  
			  <tr align="center">
					<td>
					New York
					</td>
					<td>
					London
					</td>
					<td>
					Mauritius
					</td>
					<td>
					Hong Kong
					</td>
			  </tr>  
			</table>
			</div>
			<?php 
			$sub_logged_in = isSubscriberLoggedIn();
      if ($sub_logged_in == true)
      {
				?>
				<div class="logout_box">
					<a href="logout.php" class="login_action">&nbsp;</a>		
				<?php
			}
			else
			{
				?>
				<div class="login_box">
					<a href="#" class="login_action">&nbsp;</a>		
				<?php
			}
			?>
				<div style="display: none;" class="logbox">
					<div class="close_box"><a class="close" href="#">Close X</a></div>
					<h2>Members login here</h2>
					<form action="client_login.php" method="post">
					<table cellspacing="5" cellpadding="0" border="0">
					  <tr>
							<td>Registered Mail:</td>
							<td><input name="username" type="text" /></td>
					  </tr>
					  <tr>
							<td>Password:</td>
							<td><input name="password" type="password" /></td>
					  </tr>
						<tr>
							<td colspan="2" class="send_btn"><input name="" type="submit" value="Login" /></td>
					  </tr>
					  <tr>
						<?php
						if ($sub_logged_in == true)
						{ ?>
              <td class="pass_forgot" colspan="2">Welcome <?=$_SESSION['subscriber_firstname']?> - <a href="logout.php">Logout</a></td>
							<?php
						}
						else
						{
              ?>
							<td class="pass_forgot" colspan="2"><a href="forgotpassword.php">Forgot Password?</a> - <a href="signin.php">Apply for membership</a></td>
							<?php
						}
						?>
					  </tr>
					</table>
					</form>
				</div>
				<script type="text/javascript">
					$('div.login_box a').click(function(){
						$('.logbox').show(450);
						return false;
					});
						
					$('a.close').click(function(){
						$('.logbox').hide(450);
						return false;
					});	
				</script>
			</div>	
			<div class="search_box">
				<form action="search.php" method="post">
				<table border="0" cellspacing="0" cellpadding="0">
				  <tr>
					<td><input name="search" type="text" value="Search" onfocus="this.value = this.value=='Search'?'':this.value;" onblur="this.value = this.value==''?'Search':this.value;"/></td>
					<td class="search_btn"><input name="" type="submit" value="" /></td>
				  </tr>
				</table>
				</form>
				<?php
				if ($sub_logged_in == true)
				{
					?>
					<div class="user_info">Welcome <a href="personal_data.php"><?=$_SESSION['subscriber_firstname']." ".$_SESSION['subscriber_middlename']?></a></div>
					<?php
				}
				?>
			</div>
			<div class="cleaner"></div>
		</div>
		<?php include("top_menu.php"); ?>
		<div class="banner">
			<div class="banner_btm"><img src="images/banner_bg_btm.png" alt="" /></div>
			<div class="logo"><a href="#"><img src="images/logo_itl.jpg" alt="" /></a></div>
			<div class="slideshow">
				<ul id="slideshow">
					<li><img src="images/banner_01.jpg" alt="" border="0" /></li>
					<li><img src="images/banner_02.jpg" alt="" border="0" /></li>
					<li><img src="images/banner_03.jpg" alt="" border="0" /></li>
				</ul>
			</div>
			<div class="cleaner"></div>
		</div>
	</div>