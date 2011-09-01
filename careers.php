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
    
  ?>
	<!--end_header-->
	<!--content-->
	<div class="content">
		<!-- main content -->
		<div class="core">
			<div class="core_top"></div>
			<div class="core_content">
				<div class="welcome_txt">
          <?php 
          if(isset($_POST['Submit']))
          {
						// The form is submitted
						//Setup Validations
            $validator = new FormValidator();
            $validator->addValidation("fname","req","Please fill in First Name");
            $validator->addValidation("lname","req","Please fill in Last Name");
            $validator->addValidation("ophone","req","Please fill in Contact Number");
            $validator->addValidation("ophone","num","Only numbers are allowed in Contact Number");
            $validator->addValidation("email","email","Your E-Mail address should have a valid email format");
            $validator->addValidation("email","req","Please fill in E-Mail address");
          
            $email = trim($email);
            
            if($validator->ValidateForm())
            { 
							$errors = "";
              $allowed_extensions = array("pdf", "doc", "docx");
              $max_allowed_file_size = 2048; // size in KB
              $upload_folder = "documents/"; // size in KB
            
              //File validation - Motivation Letter
  
              //Get the name
              $name_of_mletter = basename($_FILES['mletter']['name']);
							if(trim($name_of_mletter) == "")
              {
                $errors .= "\n Please upload your motivation letter.\n <br />";
              }
	
              //get the extension
              $type_of_mletter = substr($name_of_mletter,strrpos($name_of_mletter, '.') + 1);
   
              //Get the size in KBs
              $size_of_mletter = $_FILES["mletter"]["size"]/1024;
              
              //Validate Size
              if($size_of_mletter > $max_allowed_file_size )
              {
                $errors .= "\n Size of the motivation letter should be less than $max_allowed_file_size/1024 MB\n <br />";
              }
               
              //Validate Extension
              $allowed_ext = false;
              for($i=0; $i<sizeof($allowed_extensions); $i++)
              {
                if(strcasecmp($allowed_extensions[$i],$type_of_mletter) == 0)
                {
                  $allowed_ext = true;
                }
              }
               
              if(!$allowed_ext)
              {
                $errors .= "\n The motivation letter is not a supported file type.\n <br />".
                " Only the following file types are supported: ".implode(',',$allowed_extensions)."\n <br />";
              }
            
              //File validation - CV
  
              //Get the name
              $name_of_cv = basename($_FILES['cv']['name']);
							if(trim($name_of_cv) == "")
              {
                $errors .= "\n Please upload your CV.\n <br />";
              }
              //get the extension
              $type_of_cv = substr($name_of_cv,strrpos($name_of_cv, '.') + 1);
   
              //Get the size in KBs
              $size_of_cv = $_FILES["cv"]["size"]/1024;
              
              //Validate Size
              if($size_of_cv > $max_allowed_file_size )
              {
                $errors .= "\n Size of the CV should be less than $max_allowed_file_size/1024 MB\n <br />";
              }
               
              //Validate Extension
              $allowed_ext = false;
              for($i=0; $i<sizeof($allowed_extensions); $i++)
              {
                if(strcasecmp($allowed_extensions[$i],$type_of_cv) == 0)
                {
                  $allowed_ext = true;
                }
              }
               
              if(!$allowed_ext)
              {
                $errors .= "\n The CV is not a supported file type.\n <br />".
                " Only the following file types are supported: ".implode(',',$allowed_extensions)."\n <br />";
              }
							
							if(trim($errors)=="")
							{
								//Changing name of the motivation letter
								$name_of_cv = "cv_".trim(str_replace(" ","_",$fname)).'_'.trim(str_replace(" ","_",$lname)).'_'.date("d-m-Y").'-'.date("H-i-s").'.'.$type_of_cv;
							
								//copy the temp. uploaded file to uploads folder
								$path_of_cv = $upload_folder . $name_of_cv;
								$tmp_path = $_FILES["cv"]["tmp_name"];
								 
								if(is_uploaded_file($tmp_path))
								{
									if(!move_uploaded_file($tmp_path,$path_of_cv))
									{
										$errors .= '\n error while moving the CV to the server\n <br />';
									}
								}
								
								//Changing name of the CV
								$name_of_mletter = "mletter_".trim(str_replace(" ","_",$fname)).'_'.trim(str_replace(" ","_",$lname)).'_'.date("d-m-Y").'-'.date("H-i-s").'.'.$type_of_mletter;
							
								//copy the temp. uploaded file to uploads folder
								$path_of_mletter = $upload_folder . $name_of_mletter;
								$tmp_path = $_FILES["mletter"]["tmp_name"];
								 
								if(is_uploaded_file($tmp_path))
								{
									if(!move_uploaded_file($tmp_path,$path_of_mletter))
									{
										$errors .= '\n error while moving the motivation letter to the server\n <br />';
									}
								}
								
								//For the query mail
								$subject = "Personal Data: $title $fname $lname";
	
								$path_only = implode("/", (explode('/', $_SERVER["SCRIPT_URI"], -1)));

								$url_mletter = $path_only.$path_of_mletter;
								$url_cv = $path_only.$path_of_cv;
	
								$msg="<p>The following documents were received in behalf of $title $fname $lname
											<a href='$url_mletter'>$url_mletter</a><br />
											<a href='$url_cv'>$url_cv</a><br /></p>
											-- <br />
											Regards,<br />
											$title $fname $lname
											<br />Company: $company
											<br />Phone: $ophone
											<br />Mail: $email";

								$mailcheck1 = spamcheck($email);
								$mailcheck2 = spamcheck($email_admin);

								if ($mailcheck1==FALSE or $mailcheck2==FALSE)
								{
									echo "Invalid email format";
								}
								else
								{
									sendemail($email_admin,$subject,$msg);

									echo "<p><h2>Thank you for contacting ITL</h2>";
									echo "Thank you for your interest in Intercontinental Trust Ltd.<br />
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
								echo $errors;
								echo "</p>";	
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
          }
          
          ?>
          <?php
          if ($show_form==true){
          ?>
          <h2>Join Us</h2>
          <div class="form_container">
            <img src="images/career_pix" alt="" class="flt_rgt" />    
            <p>
              We endeavor to provide at all times first class services to our
              client in structuring their international affairs and using
              Mauritius as a base for international transactions.<br /><br />
              We respond by recruiting talented people, providing them with quality of task,
              training, support, international exposure, they need to flourish professionally
              and personally.<br /><br />
              Find out the opportunities we have at intercontinental Trust Limited Mauritius.<br /><br />
              Main Fields:<br /><br />
              <ul>
                <li>Fund Administrators</li>
                <li>Corporate Administrators</li>
                <li>Trust and Private Clients</li>
                <li>Human Resource</li>
                <li>Information Technology</li>
                <li>Administration</li>
              </ul>
              <br /><br />
              Please upload your CV here
              <br /><br /><br />
            </p>
            <form id="myForm" action="<?=$_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">

              <p>
                <label><strong>Title: </strong></label>
                <select name="title">
                  <option value="Mr">Mr</option>
                  <option value="Miss">Miss</option>
                  <option value="Ms">Ms</option>
                  <option value="Mrs">Mrs</option>
                </select>
                <br class="clearAll" /><br />
              </p>
              
              <p>
                <label><strong>First Name: <span style="color:red">*</span></strong></label>
                <input name="fname" type="text" value="<?=$fname ?>" />
                <br class="clearAll" /><br />
              </p>
          
              <p>
                <label><strong>Last Name: <span style="color:red">*</span></strong></label>
                <input name="lname" type="text" value="<?=$lname ?>" />
                <br class="clearAll" /><br />
              </p>

              <p>
                <label><strong>E-Mail Address: <span style="color:red">*</span></strong></label>
                <input name="email" type="text" value="<?=$email ?>" />
                <br class="clearAll" /><br />
              </p>  
            
              <p>
                <label><strong>Contact Number: <span style="color:red">*</span></strong>
                </label><input name="ophone" type="text" value="<?=$ophone ?>" />
                <br class="clearAll" /><br />
              </p>
              
              <p>
                <label><strong>Motivation Letter <br/>(only word or pdf): <span style="color:red">*</span></strong></label>
								<input name="mletter" type="file" />
                <br class="clearAll" /><br />
              </p>
              
              <p>
                <label><strong>Curriculum Vitae <br/>(only word or pdf): <span style="color:red">*</span></strong></label>
								<input name="cv" type="file" />
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