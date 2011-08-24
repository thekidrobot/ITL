<?php
include('includes/header.php');
include('../functions/ps_pagination.php');

if(isset($_POST['Process']))
{
  $errors = "";
  $allowed_extensions = array("csv");
  $max_allowed_file_size = 2048; // size in KB
  $documents_path = "documents/mailer";
			  
  //File validation
	
  //Get the name
  $filename = basename($_FILES['file']['name']);
  
  if(trim($filename) == "")
  {
	$msg .= "\n Please upload a CSV file.\n <br />";
  }
  
  //get the extension
  $filetype = substr($filename,strrpos($filename, '.') + 1);
	 
  //Get the size in KBs
  $filesize = $_FILES["file"]["size"]/1024;
				
  //Validate Size
  if($filesize > $max_allowed_file_size )
  {
	$msg.= "\n The size of the file should be less than $max_allowed_file_size/1024 MB\n <br />";
  }
				 
  //Validate Extension
  $allowed_ext = false;
  for($i=0; $i<sizeof($allowed_extensions); $i++)
  {
	if(strcasecmp($allowed_extensions[$i],$filetype) == 0)
	{
	  $allowed_ext = true;
	}
  }
   
  if(!$allowed_ext)
  {
	$msg.= "\n The uploaded filetype not a supported file type.\n <br />".
		   " Only the following file types are supported: ".implode(',',$allowed_extensions)."\n <br />";
  }
  
  if(trim($msg) == '')
  {
	if ($_FILES["file"]["error"] > 0)
	{
	  $msg="Return Code: " . $_FILES["file"]["error"] . "<br />";
	}
	else
	{
	  if(!is_dir($documents_path)) mkdir($documents_path,0777);
	  
	  $filepath = $documents_path.'/'."mailer.csv";
	  
	  if (file_exists($filepath))
	  {
		unlink($filepath);
	  }
	  else
	  {
		$tmp_path = $_FILES["file"]["tmp_name"];
		if(is_uploaded_file($tmp_path))
		{
		  if(!move_uploaded_file($tmp_path,$filepath))
		  {
			$msg.= "Error uploading file: " . $_FILES["file"]["error"] . "<br />";
		  }
		}
		else
		{
		  $max_line_length=10000;
		  if (($handle = fopen("mailer.csv", "r")) !== FALSE)
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
			}
			fclose($handle);
		  }
		  
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
          <?
			if($msg!="") echo "<br /><font color='red'>$msg</font>";
          ?>
			<div id="errorDate2"></div>
            <table cellpadding="0" cellspacing="0">
            <?php
              ?>	
              <tr>
				<td><b>Document Upload: </b></td>
                <td><input type="file" name="file" id="file" readonly /></td>
              </tr> 
              <tr>
				<td>
				  &nbsp;
				</td>
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