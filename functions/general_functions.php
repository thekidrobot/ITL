<?php 

// Shows the name of the script in execution, used by menus and custom scripts
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$curr_page = $break[count($break) - 1];

function display_status($c)
{
	if($c==1)
	return "<span style=\"color:blue;\">Active</span>";
	if($c==0)
	return "<span style=\"color:red;\">Inactive/span>";
}


function getusername($staff_id)
{
	$sql = "SELECT username FROM staff where staff_id =$staff_id";
	$r= mysql_query($sql)or die();
	$uname= mysql_result($r,0);
	return strtoupper($uname);
}

function get_inner_article($id_article)
{
	$SQL = "SELECT content_article FROM article where id = $id_article";
	$result = mysql_query($SQL) or die(mysql_error());

	while ($db_field = mysql_fetch_assoc($result)) {
		print $db_field['content_article'];
	}
}

function escape_value($value)
{
  if(function_exists('mysql_real_escape_string'))
  {
    if(get_magic_quotes_gpc())
    { 
      $value = stripslashes($value); 
		}
		$value = mysql_real_escape_string($value);
	}
  else
  {
    if(!get_magic_quotes_gpc())
    { 
      $value = addslashes($value); 
    }
  }
  return $value;
}

//login function page
function auth_user($username,$password)
{
	$sql = "SELECT * FROM user where login='".escape_value($username)."'
					AND password='".md5(escape_value($password))."' AND status=1";
	
	$result = mysql_query($sql) or die('Error :'.mysql_error());
	
	if(mysql_num_rows($result) == 0)
	{
		$response['status'] = 0;
	}
	else
	{
		while($row = mysql_fetch_object($result))
		{
			//IF YOU NEED DATA FROM THE USER,
			//PULL IT FROM HERE, DONT PUT CRAP IN THE CODE.
			//SESSION VARIABLES WERE INVENTED WITH THIS PURPOSE.
			$_SESSION['id'] = $row->id;
			$_SESSION['surname'] = $row->surname;
			$_SESSION['other_name'] = $row->other_name;
			$_SESSION['company'] = $row->company;
			$_SESSION['type'] = $row->type;
			$_SESSION['login'] = $row->login;
			$_SESSION['email'] = $row->email;
			$response['status'] = $row->status;
      $_SESSION['logged'] = 1;
		}
	}
	return $response['status'];
}



function auth_user_email($email)
{
	db_connect();
	$response = array();
	global $site_url,$email_admin;
	$sql = "SELECT * FROM member";
	$sql.= " WHERE email = '".escape_value($email)."'";

	$result = mysql_query($sql) or die('Error :'.mysql_error());
	
	if(mysql_num_rows($result) == 0)
  {
		$response['status'] = 'The email provided is not in our database.';
	}
  else
  {
		while($row = mysql_fetch_object($result))
    {
			$response['status'] = true;
			//send a mail to user vinay
			$context = stream_context_create(array(
				'http' => array(
				'header'  => "Authorization: Basic " . base64_encode("winans:wa_developer2010")
				)
			));
			
    $m_username	= $row->username;
    $password =getUniqueCode(12);
    $encryptedpassword=md5($password);
    $query="update member  set password='$encryptedpassword', status = '1' where id='".$row->id."'";
    $r= mysql_query($query)or die(mysql_error());
    if(mysql_affected_rows()>0)
		{
		
    }//if
    $m_password	=$password;
    //because on live site we cannot get file via 80 port
		$file='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
          <html xmlns="http://www.w3.org/1999/xhtml">
          <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>Nixxie Answers</title>
          </head>
          
          <body>
          <p>Hi '.$m_username.',<br />
            <br />
          You recently requested a new password.<br />
          <br />
          Here is your reset password and login :<br />
          <br />
          Login : '.$row->email.'</p>
          <p>Password :'.$m_password.'<br />
            <br />
            -- <br />
            Thanks,<br />
            The NixxieAnswers Team</p>
          </body>
          </html>';
			
      //$file=file_get_contents($site_url.'email_template/lostpasswordEmail.php?firstname='.$m_username.'&login='.$row->email.'&password='.$m_password.'',false,$context);
      
      $to = $row->email;
      //define the subject of the email
      $subject = 'Nixxie Answers password request';
      //create a boundary string. It must be unique
      //so we use the MD5 algorithm to generate a random hash
      //define the headers we want passed. Note that they are separated with \r\n
      $headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
      $headers .= 'From: Nixxie Answers <'.$email_admin.'>' . "\r\n";
      //add boundary string and mime type specification
      //define the body of the message.
      $message = $file;
      //send the email
      $mail_sent = @mail( $to, $subject, $message, $headers );	
      //end of send mail vinay
			
		}
	}
	return $response;
}


function get_user_level($userid)
{
	$sql = "SELECT member_level_id FROM member_access as MA ";
	$sql.= "WHERE MA.member_id = '$userid'";
	
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result) == 0){
		return false;	
	}else{
		return mysql_result($result,0);
	}
}

// function to determine if user is logged
function is_login(){
	if(isset($_SESSION['staff_id'])){
		return true;	
	}
}

// function to determine if user is an admin
function is_admin(){
	if(isset($_SESSION['staff_id']) && get_user_level($_SESSION['staff_id']) == 3){
		return true;	
	}
}

function restrict_access(){
	if(!is_login()){
		header('Location:login.php');	
	}
}


//random  password generator
function getUniqueCode($length = "")
{
  $code = md5(uniqid(rand(), true));
  if ($length != "") return substr($code, 0, $length);
  else return $code;
}

//Safely Redirects
function redirect($filename)
{
	if (!headers_sent()) header('Location: '.$filename);
	else echo '<meta http-equiv="refresh" content="0;url='.$filename.'" />';
}

function get_month_no($month)
{
 $month_arr=array(1=>"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
  foreach($month_arr as $key=>$value)
  {
    if($value==$month)
	{
	  if($value<=9)
	    $key="0".$key;
	  return $key;
	}
  }
}

?>