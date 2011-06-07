	<div class="header">
		<div class="header_top">
			<div class="clock_box">
			<table border="0" cellspacing="5" cellpadding="0" style="padding-top:5px;">
			  <tr>
					<td>
						<ul id="clock1">	
							<li id="sec1"></li>
							<li id="hour1"></li>
							<li id="min1"></li>
						</ul>
					</td>
					<td>
						<ul id="clock2">	
							<li id="sec2"></li>
							<li id="hour2"></li>
							<li id="min2"></li>
						</ul>
					</td>
					<td>
						<ul id="clock3">	
							<li id="sec3"></li>
							<li id="hour3"></li>
							<li id="min3"></li>
						</ul>
					</td>
			  	<td>
					<ul id="clock4">	
						<li id="sec4"></li>
				   	<li id="hour4"></li>
						<li id="min4"></li>
					</ul>
					</td>
			  </tr>  
			  <tr align="center">
				<td>
				Mauritius
				</td>
				<td>
				London
				</td>
				<td>
				Singapore
				</td>
			  <td>
				San Francisco
				</td>
			  </tr>  
			</table>
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
			
			<div class="top_home_menu">
			<ul>
				<li class="last rel">
				<div class="login_box">
					<span><a href="#">Login</a></span>			
				</div>
				<div style="display: none;" class="logbox">
					<form method="post">
						<table cellspacing="0" cellpadding="0" border="0" width="100%">
							<tbody><tr>
								<td><h1>Members login here</h1></td>
								<td></td>
								<td align="right"><a class="close" href="#">Close</a></td>
							</tr>
							<tr>
								<td class="forms">
									<table cellspacing="0" cellpadding="5" border="0">
										<tbody><tr>
											<td><label for="username">Username</label></td>
											<td><input type="text" name="username" value="Username" id="username"></td>
										</tr>
									</tbody></table>
								</td><td class="forms">
									<table cellspacing="0" cellpadding="5" border="0">
										<tbody><tr>
											<td><label for="password">Password</label></td>
											<td><input type="password" name="password" value="Password" id="password"></td>
										</tr>
									</tbody></table>					
								</td>
								<td class="login_btn" colspan="2"><input type="submit" name="submit" value="" class="log"></td>
							</tr>
							<tr>
								<td colspan="3" class="user_links"><a rel="facebox" href="http://www.heatgroupltd.com/facebox-html/forgot.php">Forgot Password?</a> - <a href="register.php" rel="facebox">Apply for membership</a></td>
							</tr>						
							</tbody>
						</table>
					</form>
				</div>					
				</li>				
			</ul>
			</div>
			<script type="text/javascript">
			$('.top_home_menu li.last a').click(function(){
					
					$('.logbox').show(450);
					
					return false;
					
				});
				
				$('.close,.user_links a').click(function(){
					
					$('.logbox').hide(450);
					
					return false;
					
				});	
			</script>
			
			<div class="cleaner"></div>
		</div>
		<?php include("top_menu.php"); ?>
		<div class="banner">
			<div class="banner_btm"><img src="images/banner_bg_btm.png" alt="" /></div>
			<div class="logo"><a href="#"><img src="images/logo_itl.jpg" alt="" /></a></div>
		</div>
	</div>
