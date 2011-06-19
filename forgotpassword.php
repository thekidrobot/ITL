<?php include("includes/main/head.php"); ?>
<body body onload="prettyForms()">	
<!--container-->
<div class="container">
	<!--header-->
	<?php include("includes/main/top_banner.php"); ?>
	<?php include("functions/formvalidator.php"); ?>
  <?php $show_form=true; ?>

  <?php
    $postArray = &$_POST ;
    $email = escape_value($postArray['email']);
  ?>
	<!--end_header-->
	<!--content-->
	<div class="content">
		<!-- main content -->
		<div class="core">
			<div class="core_top"><img src="images/content_top.jpg" alt="" /></div>
			<div class="core_content">
				<div class="welcome_txt">
					<h1>Forgot your Password?</h1>
          <p>Lorem Ipsum is simply dummy text of the printing and typesetting
          industry. Lorem Ipsum has been the industry's standard dummy text ever
          since the 1500s, when an unknown printer took a galley of type and
          scrambled it to make a type specimen book. It has survived not only
          five centuries, but also the leap into electronic typesetting,
          remaining essentially unchanged. It was popularised in the 1960s with
          the release of Letraset sheets containing Lorem Ipsum passages, and
          more recently with desktop publishing software like Aldus PageMaker
          including versions of Lorem Ipsum.
          
          <?php 
          if(isset($_POST['Submit']))
          {// The form is submitted
        
            //Setup Validations
            $validator = new FormValidator();
            $validator->addValidation("email","email","The input for Email should be a valid email value");
            
            //Now, validate the form
            if($validator->ValidateForm())
            { 
              $password = genRandomString();
              
              $password_enc = md5($password);
              
              $query="UPDATE contact set password = '$password_enc' where email = '$email'";
              $r= mysql_query($query)or die("Error : ".mysql_error());
              
              if (mysql_affected_rows() > 0){
              
                $id =mysql_insert_id();
                echo "<p><h2>Thank you for register with ITL.</h2>";
                echo "A change password request was sent to $email</p>
                      <br /><br />
                      <a href = 'index.php'>Go to the home page</a>
                      <br /><br />";
                 
                $query = mysql_query("SELECT firstname, middlename from contact where email = '$email'"); 
                
                while ($row = mysql_fetch_object($query))
                {
                  $fname = $row->firstname;
                  $lname = $row->middlename;                      
                }
                //For the mail
                $subject = "Welcome to IFS!";
  
                $msg="<p>Dear ".$fname." ".$lname.",<br />
                      <br />
                      <p><h2>Thank you for register with ITL.</h2>
                      As per your password reset request, your new pasword is:
                      $password. <br /><br />Note that the letters in the password are case sensitive. <br /> <br /> -- <br
                      /> Thanks,<br />
                      The IFS Team</p>";
  
                sendemail($email,$subject,$msg);
                
              }
              else{
                echo "<br /><br />Invalid Input.<br />
                      <a href = 'index.php'>Go to the home page</a>
                      <br /><br />";
              }
              
              $show_form = false;
            }
            else
            {
                echo "<p><h2>Please Complete the following:</h2>";
        
                $error_hash = $validator->GetErrors();
                foreach($error_hash as $inpname => $inp_err)
                {
                    echo "$inp_err<br/>\n";
                }
                echo "</p>";
            }//else
          }//if(isset($_POST['Submit']))
          ?>
          <?php
          if ($show_form==true){
          ?>
          <h2>Personal Data</h2>
          <div class="form_container">
            <form id="myForm" action="<?=$_SERVER['PHP_SELF']?>" method="post">
              <p>
                <label><strong>Registered E-Mail : </strong></label>
                <input name="email" type="text" value="<?=$email ?>" />
                <br class="clearAll" /><br />
              </p>  
    
              <p><input type="submit" value="Submit" name="Submit" /></p>
            </form>
          </div>
          <?php
          }
          ?>
          
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
