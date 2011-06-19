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
    $fname = escape_value($postArray['fname']);
    $lname = escape_value($postArray['lname']);
    $company = escape_value($postArray['company']);
    $ophone = escape_value($postArray['ophone']);
    $mphone = escape_value($postArray['mphone']);
    $email = escape_value($postArray['email']);
    $password1 = escape_value($postArray['password1']);
    $password2 = escape_value($postArray['password2']);
  ?>
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
          
          <?php 
          if(isset($_POST['Submit']))
          {// The form is submitted
        
            //Setup Validations
            $validator = new FormValidator();
            $validator->addValidation("fname","req","Please fill in Name");
            $validator->addValidation("lname","req","Please fill in Surname");
            $validator->addValidation("company","req","Please fill in Company");
            $validator->addValidation("password1","req","Please fill in Password");
            $validator->addValidation("password2","req","Please Confirm your Password");
            $validator->addValidation("ophone","num","Only numbers are allowed in telephone field");
            $validator->addValidation("mphone","num","Only numbers are allowed in mobile phone field");
            $validator->addValidation("email","email","The input for Email should be a valid email value");
            $validator->addValidation("email","req","Please fill in Email");
            $validator->addValidation("password2","eqelmnt=password1","Password and password confirmation should be the same");
            
            $email = trim($email);
            
            $sql = "SELECT email from contact where email = '$email'";
            $result = mysql_query($sql);
            if (mysql_num_rows($result) > 0)
            {
              echo "<p><h2>Please complete the following:</h2>";
              echo "The email address you typed is already registered</p>
                    <br /><br />
                    <a href = 'index.php'>Go to the home page</a>
                    <br /><br />";
            }
            //Now, validate the form
            elseif($validator->ValidateForm())
            { 
              $password1 = md5($password1);
              
              $query="INSERT INTO contact 
                      (firstname,middlename,company,tel,mobile,email,password,status,type)
                      VALUES
                      ('$fname','$lname','$company',$ophone,$mphone,'$email','$password1','0','1')";
                      
              $r= mysql_query($query)or die("Error : ".mysql_error());
              $id =mysql_insert_id();
              echo "<p><h2>Thank you for register with ITL.</h2>";
              echo "Thanks you for your interest in Intercontinental Trust Ltd.<br />
                    Our staff will review your details and come back to you soon.<br /><br />
                    A mail will be sent to you to $email</p>
                    <br /><br />
                    <a href = 'index.php'>Go to the home page</a>
                    <br /><br />";
                    
              //For the mail
              $subject = "Welcome to IFS!";

              $msg="<p>Dear ".$fname." ".$lname.",<br />
                    <br />
                    <p><h2>Thank you for register with ITL.</h2>
                    Thanks you for your interest in Intercontinental Trust Ltd.<br />
                    Our staff will review your details and come back to you soon.<br /><br />
                    A mail will be sent to you to the registered email adress. </p>
                    <br />
                    -- <br />
                    Thanks,<br />
                    The IFS Team</p>";

              sendemail($email,$subject,$msg);
                   
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
                <label><strong>First Name: </strong></label>
                <input name="fname" type="text" value="<?=$fname ?>" />
                <br class="clearAll" /><br />
              </p>
          
              <p>
                <label><strong>Last Name: </strong></label>
                <input name="lname" type="text" value="<?=$lname ?>" />
                <br class="clearAll" /><br />
              </p> 
            
              <p>
                <label><strong>Company: </strong></label>
                <input name="company" type="text" value="<?=$company ?>" />
                <br class="clearAll" /><br />
              </p>
            
              <p>
                <label><strong>Office Phone: </strong>
                </label><input name="ophone" type="text" value="<?=$ophone ?>" />
                <br class="clearAll" /><br />
              </p>
        
              <p>
                <label><strong>Mobile Phone: </strong>
                </label><input name="mphone" type="text" value="<?=$mphone ?>" />
                <br class="clearAll" /><br />
              </p>
       
              <p>
                <label><strong>E-Mail <br/>(Will be also your username): </strong></label>
                <input name="email" type="text" value="<?=$email ?>" />
                <br class="clearAll" /><br />
              </p>  
    
              <p>
                <label><strong>Choose a Password: </strong></label>
                <input name="password1" type="password" value="<?=$password1 ?>" />
                <br class="clearAll" /><br />
              </p> 
            
              <p>
                <label><strong>Repeat your Password: </strong></label>
                <input name="password2" type="password" value="<?=$password2 ?>" />
                <br class="clearAll" /><br />
              </p>
            
              <p><input type="submit" value="Sign In" name="Submit" /></p>
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
