	<div class="header">
		<div class="header_top">
			<div class="clock_box">
			<table border="0" cellspacing="5" cellpadding="0" style="padding-top:5px;">
			  <tr>
			  	<td>
						<iframe src="clock_san_francisco.html" frameborder="0" height="70px" width="70px" scrolling="no"></iframe>
					</td>
					<td>
						<iframe src="clock_london.html" frameborder="0" height="70px" width="70px" scrolling="no"></iframe>
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
				San Francisco
				</td>
				<td>
				London
				</td>
				<td>
				Mauritius
				</td>
				<td>
				Singapore
				</td>

			  </tr>  
			</table>
			</div>
			<div class="login_container">
        <?php
          $sub_logged_in = isSubscriberLoggedIn();
          
          if ($sub_logged_in == true)
          {
          ?>
            <a href="logout.php"><div class="logout_box" style="background:url('images/logout_icon.jpg') top left no-repeat;"></a>
          <?php
          }
          else
          {
          ?>
          	<div class="login_box" style="background:url('images/login_icon.jpg') top left no-repeat;">
          <?php
          }
          ?>
					<a href="#">&nbsp;</a>		
				</div>
				<div style="display: none;" class="logbox">
					<div class="close_box"><a class="close" href="#">Close X</a></div>
					<h2>Members login here</h2>
					<form action="client_login.php" method="post">
					<table cellspacing="0" cellpadding="0" border="0">
					  <tr>
						<th>Registered Mail:</th>
						<td><input name="username" type="text" /></td>
					  </tr>
					  <tr>
						<th>Password:</th>
						<td><input name="password" type="password" /></td>
					  </tr>
					  <tr>
						<td colspan="2" class="send_btn"><input name="" type="submit" value="Login" /></td>
					  </tr>
					  <tr>
						<?php
            
            if ($sub_logged_in == true){ ?>
              <td class="pass_forgot" colspan="2">Welcome <?=$_SESSION['subscriber_firstame']?> - <a href="logout.php">Logout</a></td>
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
			</div>
			<script type="text/javascript">
				$('div.login_box a').click(function(){
					$('.logbox').show(450);
					return false;
				});
					
				$('.close_box,.close a').click(function(){
					$('.logbox').hide(450);
					return false;
				});	
			</script>
			<div class="cleaner"></div>
		</div>
		<?php include("top_menu.php"); ?>
		<div class="banner">
			<div class="banner_btm"><img src="images/banner_bg_btm.png" alt="" /></div>
			<div class="slider_container">
				<div class="wt-rotator">
					<div class="screen">
						<noscript>
							<!-- placeholder 1st image when javascript is off -->
							<img src="images/madness_arch2.jpg"/>
						</noscript>
					</div>
					<div class="c-panel">
						<div class="buttons">
							<div class="prev-btn"></div>
							<div class="play-btn"></div>    
							<div class="next-btn"></div>               
						</div>
						<div class="thumbnails">
							<ul>
								<li>
									<a href="images/itl.jpg" title="solidarity"></a>
									<a href="#" target="_blank"></a>                        
									<div style="top:5px; left:5px; width:436px; height:0; color:#FFF; background-color:#000;">
									   <h1>Intercontinental Trust Limited</h1>Intercontinental Trust Limited ("ITL") is licenced by the Mauritius Financial Services Commission to provide a comprehensive range of financial and fiduciary services to international businesses</h1>
									  
									</div>
								</li>
								<li>
									<a href="images/itl2.jpg" title="Team spirit"></a>
									<a href="#" target="_blank"></a>                        
									<div style="top:5px; left:5px; width:350px; height:0; color:#FFF; background-color:#000;">
										<h1>TOMS Product</h1>
										A New TOMS Product: The Most Important Launch of the Year? TOMS is set to unveil its newest product.
									</div>
								</li>
								
							</ul>
						</div>     
					</div>
				</div>	
			</div>
			<!--<div class="logo"><a href="#"><img src="images/logo_itl.jpg" alt="" /></a></div>-->
		</div>
	</div>
	
	<script src="js/jquery.easing.1.2.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery.wt-rotator.min.js"></script>

<script type="text/javascript">



      



	

        jQuery(function () {

				jQuery(".slider_container").wtRotator({

					width:998,

					height:243,

					button_width:24,

					button_height:24,

					button_margin:5,

					auto_start:true,

					delay:5000,

					play_once:false,

					transition:"vert.br",

					transition_speed:800,

					auto_center:true,

					easing:"easeInBounce",

					cpanel_position:"inside",

					cpanel_align:"BR",

					timer_align:"top",

					display_thumbs:false,

					display_dbuttons:false,

					display_playbutton:false,

					display_numbers:false,

					display_timer:true,

					mouseover_pause:false,

					cpanel_mouseover:false,

					text_mouseover:false,

					text_effect:"fade",

					text_sync:true,

					tooltip_type:"image",

					lock_tooltip:true,

					shuffle:false,

					block_size:75,

					vert_size:55,

					horz_size:50,

					block_delay:25,

					vstripe_delay:75,

					hstripe_delay:180			

				});

          

        });

		

</script>