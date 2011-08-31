<?php
include('includes/header.php');
include('../functions/ps_pagination.php');

if(isset($_POST['Process']))
{
  $msg = "";
  
  $allowed_extensions_mailer = array("csv");
  $allowed_extensions_attachment = array("pdf", "doc", "docx");
  $max_allowed_file_size = 2048; // size in KB
  $documents_path = "documents/mailer";
			  
  $subject = $_POST['subject'];
  $content = $_POST['content'];
  
  //File validation
	
  //Get the name
  $filename_mailer = basename($_FILES['file']['name']);
  $filename_attachments = basename($_FILES['attachments']['name']);
  
  if(trim($filename_mailer) == "")
  {
    $msg .= "\n Please upload a CSV file.\n <br />";
  }
  
  if(trim($subject) == "")
  {
    $msg .= "\n Please fill in mail subject.\n <br />";
  }
  
  if(trim($content) == "")
  {
    $msg .= "\n Please fill in mail content.\n <br />";
  }
  
  //get the extension
  $filetype_mailer = substr($filename_mailer,strrpos($filename_mailer, '.') + 1);
  $filetype_attachments = substr($filename_attachments,strrpos($filename_attachments, '.') + 1);
	 
  //Get the size in KBs
  $filesize_mailer = $_FILES["file"]["size"]/1024;
  $filesize_attachments = $_FILES["attachments"]["size"]/1024;
				
  //Validate Size
  if($filesize_mailer > $max_allowed_file_size )
  {
    $msg.= "\n The size of the CSV mailer file should be less than $max_allowed_file_size/1024 MB\n <br />";
  }
	
  if($filesize_attachments > $max_allowed_file_size )
  {
    $msg.= "\n The size of the attached file should be less than $max_allowed_file_size/1024 MB\n <br />";
  }	
    		 
  //Validate Extension
  $allowed_ext_mailer = false;
  $allowed_ext_attachments = false;
  
  for($i=0; $i<sizeof($allowed_extensions_mailer); $i++)
  {
    if(strcasecmp($allowed_extensions_mailer[$i],$filetype_mailer) == 0)
    {
      $allowed_ext_mailer = true;
    }
  }
   
  if(!$allowed_ext_mailer)
  {
    $msg.=  "\n The uploaded mailer filetype is not a supported file type.\n <br />".
            " Only the following file types are supported: ".implode(',',$allowed_extensions_mailer)."\n <br />";
  }

  if(trim($filename_attachments)!='')
  {
    for($i=0; $i<sizeof($allowed_extensions_attachment); $i++)
    {
      if(strcasecmp($allowed_extensions_attachment[$i],$filetype_attachments) == 0)
      {
        $allowed_ext_attachments = true;
      }
    }
     
    if(!$allowed_ext_attachments)
    {
      $msg.=  "\n The uploaded filetype for attachment is not a supported file type.\n <br />".
              " Only the following file types are supported: ".implode(',',$allowed_extensions_attachment)."\n <br />";
    }    
  }

  if(trim($msg) == '')
  {
		if ($_FILES["file"]["error"] > 0)
		{
			$msg="Return Code: " . $_FILES["file"]["error"] . "<br />";
		}
		else
		{
      $path_only_mailer = implode("/", (explode('/', $_SERVER["SCRIPT_FILENAME"], -1)));

			if(!is_dir($documents_path)) mkdir($documents_path,0777);
			
			$filepath_mailer = $documents_path.'/'."mailer.csv";
			
			if (file_exists($filepath_mailer))
			{
				unlink($filepath_mailer);
			}
			
			$tmp_path_mailer = $_FILES["file"]["tmp_name"];
			if(!move_uploaded_file($tmp_path_mailer,$filepath_mailer))
			{
				$msg.= "Error uploading file: " . $_FILES["file"]["error"] . "<br />";
			}
			else
			{
        if(trim($filename_attachments)!='')
        {
          $filename_attachments = trim(str_replace(" ","_",$filename_attachments));
          $filename_attachments = strtolower($filename_attachments);
          
          $filepath_attachments = $documents_path.'/'.$filename_attachments;
          $tmp_path_attachments = $_FILES["attachments"]["tmp_name"];
          if(!move_uploaded_file($tmp_path_attachments,$filepath_attachments))
          {
            $msg.= "Error uploading file: " . $_FILES["attachments"]["error"] . "<br />";
          }
          else
          {
            
            $path_only_attachments = "http://".$_SERVER["SERVER_NAME"].implode("/", (explode('/', $_SERVER["SCRIPT_NAME"], -1)));
            
            $filepath_attachments = $path_only_attachments.'/'.$documents_path.'/'.$filename_attachments;
            
            $attachment_link = "<br />
                                <p>There is a file attached to this message. To see it, visit 
                                <a href='$filepath_attachments'>$filepath_attachments</a><br /></p>";
          }
        }

        //Extra text addition to Content
        
        if(trim($attachment_link) != '')
        {
          $content= nl2br($content).$attachment_link."<br /><p>Kind regards,<br /><br />ITL</p>";
        }
        else
        {
          $content= nl2br($content)."<br /><p>Kind regards,<br /><br />ITL</p>";
        }
        
        if (($handle = fopen($filepath_mailer, "r")) !== FALSE)
        {
          $columns = fgetcsv($handle, $max_line_length, ",");
          foreach ($columns as &$column)
          {
            $column = strtolower(str_replace(".","",$column));
          }
        
          mysql_query("delete from mailer");
          
          $insert_query_prefix = "INSERT IGNORE INTO mailer (".join(",",$columns).")\nVALUES";
        
          while (($data = fgetcsv($handle, $max_line_length, ",")) !== FALSE)
          {
            while (count($data)<count($columns)) array_push($data, NULL);
            $query = "$insert_query_prefix ('".join("','",$data)."');";
            mysql_query($query);

            //More text additions
            $message = "";
            
            $recipient = $data[0].' '.$data[1];
            $message = "<p>Dear $recipient : </p>".$content;

            //Send Mail
            sendemail(escape_value($data[2]),escape_value($subject),$message);
            
            $msg = "File processed sucessfully";
            
          }
          fclose($handle);
        }
  		}
		}   
  }  
}
  
?>

<body>
  <div id="wrapper">
  <h1><a href="index.php"><span><?=$website_name?></span></a></h1>
  <?php include("includes/menu.php"); ?>
	<div id="containerHolder">
	  <div id="container">
      <div id="sidebar"><?php include('includes/side_menu.php'); ?></div>    
	    <div id="main">
	      <h2>Mass mail process</h2>
        <h4><a href="documents/mailer/template.csv">Download the template</a></h4>
        <form method="post" name="doc_form" enctype="multipart/form-data" action="<?=$_SERVER['PHP_SELF']?>">
        <?php
          if($msg!="") echo "<br /><font color='red'>$msg</font>";
        ?>
        <div id="errorDate2"></div>
          <table cellpadding="0" cellspacing="0">
            <tr>
              <td><b>Subject: </b></td>
              <td><input type="text" name="subject" value="<?=$_POST['subject']?>" /></td>
            </tr>
  		  	  <tr>
              <td><b>Content: </b></td>
              <td><textarea name="content" rows="15" cols="60"><?=$_POST['content']?></textarea></td>
            </tr>
            <tr>
              <td><b>Recipients: </b></td>
              <td><input type="file" name="file" id="file" readonly /></td>
            </tr>
            
            <tr>
              <td><b>Attachments: </b></td>
              <td><input type="file" name="attachments" id="attachments" readonly /></td>
            </tr> 
            
            <tr>
              <td>&nbsp;</td>
              <td>
                <p><input type="submit" class="button-submit" value="Process" name="Process" id ="add" /></p>
              </td>
            </tr>
          </table>
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