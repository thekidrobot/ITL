<?php include("includes/main/head.php"); ?>
<body body onload="prettyForms()">	
<!--container-->
<div class="container">
	<!--header-->
	<?php include("includes/main/top_banner.php"); ?>
	<!--end_header-->
	<!--content-->
	<div class="content">
		<!-- main content -->
		<div class="core">
			<div class="core_top"><img src="images/content_top.jpg" alt="" /></div>
			<div class="core_content">
				<div class="welcome_txt">
					<h1>Sign Up</h1>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text ever
          since the 1500s, when an unknown printer took a galley of type and
          scrambled it to make a type specimen book. It has survived not only
          five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with
          the release of Letraset sheets containing Lorem Ipsum passages, and
          more recently with desktop publishing software like Aldus PageMaker
          including versions of Lorem Ipsum.
          
          <h2>Personal Data</h2>
          <div class="form_container">
            <form id="myForm" action="<?=$_SERVER['PHP_SELF']?> method="post">
              
              <p>
                <label><strong>First Name: </strong></label>
                <input name="fname" type="text" />
                <br class="clearAll" /><br />
              </p>
          
              <p>
                <label><strong>Last Name: </strong></label>
                <input name="lname" type="text" />
                <br class="clearAll" /><br />
              </p> 
            
              <p>
                <label><strong>Company: </strong></label>
                <input name="company" type="text" />
                <br class="clearAll" /><br />
              </p>
            
              <p>
                <label><strong>Office Phone: </strong>
                </label><input name="ophone" type="text" />
                <br class="clearAll" /><br />
              </p>
        
              <p>
                <label><strong>Mobile Phone: </strong>
                </label><input name="mphone" type="text" />
                <br class="clearAll" /><br />
              </p>
       
              <p>
                <label><strong>E-Mail: </strong></label>
                <input name="email" type="text" />
                <br class="clearAll" /><br />
              </p> 
    
              <p>
                <label><strong>Choose a Username: </strong></label>
                <input name="username" type="text" />
                <br class="clearAll" /><br />
              </p>
    
              <p>
                <label><strong>Choose a Password: </strong></label>
                <input name="password1" />
                <br class="clearAll" /><br />
              </p> 
            
              <p>
                <label><strong>Repeat your Password: </strong></label>
                <input name="password2" />
                <br class="clearAll" /><br />
              </p>
            
              <p><input type="submit" value="Sign In" /></p>
            </form>
          </div>
          </p>
				</div>
			</div>
			<div class="core_btm"><img src="images/content_btm.jpg" alt="" /></div>
		</div>
		<!-- end main content -->
		<!-- side content-->
		<?php include("includes/main/side_content.php"); ?>		
		<!-- end side content-->
		<div class="cleaner"></div>
	</div>
	<!--end_content-->
	<!--footer-->
	<?php include("includes/main/footer.php"); ?>
	<!--end_footer-->
</div>
<!--end_container-->			
</body>
</html>
