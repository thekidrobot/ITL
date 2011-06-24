<?php
include('includes/header.php');
include('../functions/ps_pagination.php');

  $query=mysql_query("SELECT * FROM document WHERE id='".$_REQUEST['id']."'");
  $res=mysql_fetch_object($query);
  if($_POST['Add']!='')
  {
    $msg="";
    $postArray = &$_POST ;
    $client = escape_value($postArray['client']);
    $title = escape_value($postArray['title']);
    $description = escape_value($postArray['description']);
    $fromDate = escape_value($postArray['fromDate']);
    $toDate = escape_value($postArray['toDate']);
    $created_by = escape_value($postArray['created_by']);
    $type = escape_value($postArray['type']);
    if($_FILES["file"]["name"]!="")
    {
      if ($_FILES["file"]["error"] > 0)
      {
        $msg="Return Code: " . $_FILES["file"]["error"] . "<br />";
      }
      else
      {
        //get folder name of the client
        $login_query=mysql_query("SELECT login,type FROM user WHERE id='".$client."'");
        $loginname=mysql_fetch_object($login_query);
        $documents_path = "documents/".$loginname->login;
         
        //check if dir with loginname exists else create one
        if(!is_dir($documents_path)) mkdir($documents_path,0777);
        if (file_exists($documents_path."/".$_FILES["file"]["name"]))
        {
          $msg=$_FILES["file"]["name"] . " already exists. ";
        }
        else
        {
          if (move_uploaded_file($_FILES["file"]["tmp_name"],$documents_path."/".$_FILES["file"]["name"]))
          {
            if($_REQUEST['id']=="")
            {
              if($msg=="")
              {
                $query="INSERT INTO document(user_id,type,path,title,description,date,datevalidfrom,datevalidto,createdby)
                        VALUES ('$client',$type,'documents/".$loginname->login."/".$_FILES["file"]["name"]."','$title','$description',now(),'$fromDate','$toDate','$created_by')";
                $r= mysql_query($query);
                $id =mysql_insert_id();
                //insert into log file
                $query=mysql_query("INSERT INTO log(document_user_id,document_id,date,status)VALUES('$client','$id',now(),'document added')");
                $status= "Document Added Sucessfully";
                //send email to the client
                //get email address
                $email_query=mysql_query("SELECT email,other_name,surname FROM user WHERE id='$client'");
                $email_res=mysql_fetch_object($email_query);
                
                $path=$_SERVER['HTTP_HOST']."/ifs/admin/documents/".$loginname->login."/".$_FILES["file"]["name"];
                redirect('documents.php');
              }
            }
          }
          else
          {
            $msg="Error uploading file: " . $_FILES["file"]["error"] . "<br />";
          }
        }
      }   
    }
  }
  elseif($_POST['Edit']!='')
  {
    $msg="";
    $postArray = &$_POST ;
    $client = escape_value($postArray['client']);
    $title = escape_value($postArray['title']);
    $description = escape_value($postArray['description']);
    $fromDate = escape_value($postArray['fromDate']);
    $toDate = escape_value($postArray['toDate']);
    $created_by = escape_value($postArray['created_by']);
    $type = escape_value($postArray['type']);
    
    $query="UPDATE document SET user_id='$client',type=$type,title='$title',description='$description',datevalidfrom='$fromDate',datevalidto='$toDate',createdby='$created_by'";
    if($_FILES["file"]["name"]!="")
    {
      if (file_exists($documents_path."/".$_FILES["file"]["name"]))
      {
        $msg=$_FILES["file"]["name"] . " already exists. ";
      }
      else
      {
        if (move_uploaded_file($_FILES["file"]["tmp_name"],$documents_path."/".$_FILES["file"]["name"]))
        {
          $query.=",path='documents/".$loginname->login."/".$_FILES["file"]["name"]."'";    
        }
      }
    }
    $query.=" WHERE id=".$_REQUEST['id'];
    
    mysql_query($query);
    //update log table
    $query=mysql_query("INSERT INTO log(document_user_id,document_id,date,status)VALUES('$client','".$_REQUEST['id']."',now(),'document updated')");
    redirect('documents.php');
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
          <?php
            if($_REQUEST['id']=="")
             	echo "<h2>Add a Document</h2>";
            else
              echo "<h2>Edit Document</h2>";			  
          ?>	
					<form method="post" name="doc_form" enctype="multipart/form-data" action="add_document.php" onsubmit="return doc_validation()">
            <?
            if($msg!="")
					  echo "<font color='red'>$msg</font>";
            //check if admin or superadmin 
            $type_user=$_SESSION['type'];
            ?>
            <div id="errorDate2"></div>
            <table cellpadding="0" cellspacing="0">
            <?php
              if($type_user==2) echo "<input type='hidden' name='client' value='".$_SESSION['id']."'>";
              else
              {
                ?>	
                <tr>
                  <td><b>Client:</b></td>
                  <td>
                    <select name="client">
                    <?
                    if($type_user == 0) 
                      $cquery="SELECT id,other_name,surname FROM user";
                    elseif($type_user == 1)
                      $cquery="SELECT id,other_name,surname FROM user WHERE type=2";
                    
                    $client_query=mysql_query($cquery);
                    while($client=mysql_fetch_object($client_query))
                    {
                      echo "<option value='".$client->id."'";
                      if($client->id==$res->user_id)
                        echo "selected";
                      echo " >".$client->other_name." ".$client->surname."</option>";
                    }
                    ?>
                    </select>
                  </td>
                </tr>
                <?
              }?>
              <tr>
                <td><b>Title: </b></td><td><input type="text" name="title" value="<?=$res->title?>" /></td>
              </tr>
  					  <tr>
                <td><b>Description: </b></td>
                <td><textarea name="description" rows="5" cols="20"><?=$res->description?></textarea></td>
              </tr>
              <?php
                if($_REQUEST['id']!="")
                  echo "<tr><td><b>Document Path: </b></td><td>".$res->path."</td></tr>";
              ?>
              <tr>
                <td><b>Document Upload: </b></td>
                <td><input type="file" name="file" id="file" readonly /></td>
              </tr> 
              <tr>
                <td><b>Date Validity: </b></td>
                <td>
                  <b>From: </b>
                  <input name="fromDate" id="fromDate" type="text" value="<?=date('Y/m/d H:i:s')?>" readonly="readonly" /> 
                  <img src="images/calendar.jpg" onclick="displayDatePicker('fromDate', this, 'ymd', '/');" alt="calendar" /> 
                  <b>To: </b>
                  <input name="toDate" id="toDate" type="text" value="<?=date('Y/m/d H:i:s')?>" readonly="readonly" />  
                  <img src="images/calendar.jpg" onclick="displayDatePicker('toDate', this, 'ymd', '/');" alt="calendar"/>
                  <!-- Todo: error message when from date is greater than to date-->
                </td>
              </tr>
              <tr>
                <td><b>Created By: </b></td>
                <td><input type="text" name="created_by" value="<?=trim($_SESSION['other_name'].' '.$_SESSION['surname'])?>" readonly /></td>
              </tr>
              <tr>
                <td><b>Document type: </b></td>
                <td>
                <select name="type">
                  <option value="1" <?php if($res->type==1) echo "selected"; ?> >Newsletter</option>
                  <option value="2" <?php if($res->type==2) echo "selected"; ?> >Updates</option>
                  <option value="3" <?php if($res->type==3) echo "selected"; ?> >IPPAs</option>
                </select>  
                </td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td>
                  <input type="hidden" name="id" value="<?=$_REQUEST['id']?>" />
                  <?php
                    if($_REQUEST['id']=="")
                      echo '<input type="submit" class="button-submit" value="Add" name="Add" id ="add" />';
                    else
                      echo '<input type="submit" class="button-submit" value="Edit" name="Edit" id ="add" />';
                  ?>
                  &nbsp;&nbsp;
                  <input type="button" class="button-submit" value="Cancel" name="Cancel" onclick="confirm_msg('doc')" />
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
<script type="text/javascript" src="js/calendar1.js"></script>
<script type="text/javascript" src="js/calendar_validation.js"></script>	
</body>
</html>