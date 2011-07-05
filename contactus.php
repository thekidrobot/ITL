<?php include("includes/main/head.php"); ?>
<body body onload="prettyForms()">	
<!--container-->
<div class="container">
	<!--header-->
	<?php include("includes/main/top_banner.php"); ?>
	<?php include("functions/formvalidator.php"); ?>
  <?php $show_form=true; ?>

  <?php
  
    $email_admin = "vick@technology10.com";
  
    $postArray = &$_POST ;
    $title = escape_value($postArray['title']);
    $fname = escape_value($postArray['fname']);
    $lname = escape_value($postArray['lname']);
    $company = escape_value($postArray['company']);
    $email = escape_value($postArray['email']);
    $ophone = escape_value($postArray['ophone']);
    $mphone = escape_value($postArray['mphone']);
    $country = escape_value($postArray['country']);
    
    if (escape_value($postArray['newsletter']) == '') $newsletter = 'no';
    else $newsletter = escape_value($postArray['newsletter']);
    
    $password1 = escape_value($postArray['password1']);
    $password2 = escape_value($postArray['password2']);
    $query_type = escape_value($postArray['query_type']);
    $query_comments = escape_value($postArray['query_comments']);
    
  ?>
	<!--end_header-->
	<!--content-->
	<div class="content">
		<!-- main content -->
		<div class="core">
			<div class="core_top"><img src="images/content_top.jpg" alt="" /></div>
			<div class="core_content">
				<div class="welcome_txt">
          <?php 
          if(isset($_POST['Submit']))
          {// The form is submitted
            
            //If he applies for the newsletter we have to sign him up
            if($newsletter == 'yes')
            {
              //Setup Validations
              $validator = new FormValidator();
              $validator->addValidation("fname","req","Please fill in Name");
              $validator->addValidation("lname","req","Please fill in Surname");
              $validator->addValidation("company","req","Please fill in Company");
              $validator->addValidation("password1","req","Please fill in Password");
              $validator->addValidation("password2","req","Please Confirm your Password");
              $validator->addValidation("ophone","num","Only numbers are allowed in telephone field");
              $validator->addValidation("email","email","The input for Email should be a valid email value");
              $validator->addValidation("email","req","Please fill in Email");
              $validator->addValidation("password2","eqelmnt=password1","Password and password confirmation should be the same");
              $validator->addValidation("query_comments","req","Please Tell us your thoughts");
              
              $email = trim($email);
              
              //Registration
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
              
                //For the query mail
                $subject = "$query_type";
    
                $msg="<p>$query_comments</p>
                      <br />
                      -- <br />
                      Regards,<br />
                      $title $fname $lname
                      <br />Country: $country
                      <br />Company: $company
                      <br />Phone: $ophone
                      <br />Mail: $email";
  
                $mailcheck1 = spamcheck($email);
                $mailcheck2 = spamcheck($email_admin);
  
                if ($mailcheck1==FALSE or $mailcheck2==FALSE){
                  echo "Invalid email format";
                }
                else
                {
                  sendemail($email_admin,$subject,$msg);
                }
                
                //Storing in contact database
              
                $password1 = md5($password1);
                
                $query="INSERT INTO contact 
                        (firstname,middlename,company,tel,mobile,email,password,status,type)
                        VALUES
                        ('$fname','$lname','$company',$ophone,$ophone,'$email','$password1','0','1')";
                        
                $r= mysql_query($query)or die("Error : ".mysql_error());
                $id =mysql_insert_id();
                echo "<p><h2>Thank you for register with ITL.</h2>";
                echo "Thanks you for your interest in Intercontinental Trust Ltd.<br />
                      Our staff will review your details and come back to you soon.<br /><br />
                      A mail will be sent to you to $email</p>
                      <br /><br />
                      <a href = 'index.php'>Go to the home page</a>
                      <br /><br />";
                      
                //For the registration mail
                $subject = "Welcome to IFS!";
  
                $msg="<p>Dear ".$fname." ".$lname.",<br />
                      <br />
                      <p><h2>Thank you for register with ITL.</h2>
                      Thanks you for your interest in Intercontinental Trust Ltd.<br />
                      Our staff will review your details and come back to you soon.<br /><br />
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
              }
            }//if $newsletter == 'yes'
            
            elseif($newsletter == 'no')
            {
              //Setup Validations
              $validator = new FormValidator();
              $validator->addValidation("fname","req","Please fill in Name");
              $validator->addValidation("lname","req","Please fill in Surname");
              $validator->addValidation("company","req","Please fill in Company");
              $validator->addValidation("ophone","req","Please fill in Contact Phone");
              $validator->addValidation("ophone","num","Only numbers are allowed in telephone field");
              $validator->addValidation("email","email","The input for Email should be a valid email value");
              $validator->addValidation("email","req","Please fill in Email");
              $validator->addValidation("query_comments","req","Please Tell us your thoughts");
            
              $email = trim($email);
              
              if($validator->ValidateForm())
              { 
              
                //For the query mail
                $subject = "$query_type";
  
                $msg="<p>$query_comments</p>
                      <br />
                      -- <br />
                      Regards,<br />
                      $title $fname $lname
                      <br />Country: $country
                      <br />Company: $company
                      <br />Phone: $ophone
                      <br />Mail: $email";
    
                $mailcheck1 = spamcheck($email);
                $mailcheck2 = spamcheck($email_admin);
    
                if ($mailcheck1==FALSE or $mailcheck2==FALSE){
                  echo "Invalid email format";
                }
                else{
                  
                  sendemail($email_admin,$subject,$msg);

                  echo "<p><h2>Thank you for let us know your thoughts.</h2>";
                  echo "Thanks you for your interest in Intercontinental Trust Ltd.<br />
                      Our staff will review your details and come back to you soon.<br /><br />
                      A mail will be sent to you to $email</p>
                      <br /><br />
                      <a href = 'index.php'>Go to the home page</a>
                      <br /><br />";
                  
                  $show_form = false;
                }
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
              }
            } // if $newsletter == 'no'                
          }
          
          ?>
          <?php
          if ($show_form==true){
          ?>
          <h2>Contact Us</h2>
          <div class="form_container">
            <form id="myForm" action="<?=$_SERVER['PHP_SELF']?>" method="post">

              <p>
                <label><strong>Title: </strong></label>
                <select name="title">
                  <option value="Mr">Mr.</option>
                  <option value="Ms">Ms.</option>
                  <option value="Miss">Miss.</option>
                </select>
                <br class="clearAll" /><br />
              </p>
              
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
                <label><strong>Company Name: </strong></label>
                <input name="company" type="text" value="<?=$company ?>" />
                <br class="clearAll" /><br />
              </p>              
              
              <p>
                <label><strong>E-Mail Address: </strong></label>
                <input name="email" type="text" value="<?=$email ?>" />
                <br class="clearAll" /><br />
              </p>  
            
              <p>
                <label><strong>Contact Number: </strong>
                </label><input name="ophone" type="text" value="<?=$ophone ?>" />
                <br class="clearAll" /><br />
              </p>
        
              <p>
                <label><strong>Country: </strong></label>
                <select name="country">
                  <option value="" selected="selected">Select Country</option> 
                  <?php
                    $sql = mysql_query("SELECT * FROM countries");
                    while ($row = mysql_fetch_array($sql))
                    {
                    ?>
                      <option value="<?=$row['name']?>" <? if($country == $row['name']) echo 'selected' ?>><?=$row['name']?></option> 
                    <?php
                    }
                  ?>
                </select>
                <br class="clearAll" /><br />
              </p>
       
              <p>
                <label><strong>Sign up for newsletters: </strong></label>
                <input type="checkbox" name="newsletter" value="yes" onchange="showHide('showhide');" />
                <br class="clearAll" /><br />
              </p> 
    
              <div class="hide" id="showhide">
              
              <p>
                <label><strong>Choose a Password: </strong></label>
                <input name="password1" type="password" value="<?=$password1 ?>" />
                <br class="clearAll" /><br />
              </p> 
            
              <p>
                <label><strong>Re-confirm your Password: </strong></label>
                <input name="password2" type="password" value="<?=$password2 ?>" />
                <br class="clearAll" /><br />
              </p>
              
              </div>

              <p>
                <label><strong>You are contacting us about: </strong></label>
                <select name="query_type">
                  <option value="Company_Formation">Company Formation</option>
                  <option value="Fund Formation_Formation">Fund Formation/Fund Administration</option>
                  <option value="Accounting_Tax">Accounting/Tax Services</option>
                  <option value="Trust">Trust Formation</option>
                  <option value="Other">Other</option>
                </select>
                <br class="clearAll" /><br />
              </p>

              <p>
                <label><strong>Your Query: </strong></label>
                 <textarea rows="5" wrap="physical" name="query_comments"><?=$query_comments ?></textarea>
                <br class="clearAll" /><br />
              </p>
            
              <p><input type="submit" value="Register" name="Submit" /></p>
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