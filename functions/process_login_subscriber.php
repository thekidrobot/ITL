<?php 
include('conn.php');

foreach($_POST as $key=>$value)
{
 $$key=$value;
}

if(trim($username)!="" and trim($password)!="")
{
  $error = auth_user($username,$password);
}

//user authentication
function auth_user($username,$password)
{
  
  $error = true;
  
	$sql = "SELECT * FROM contact where email='".escape_value($username)."'
					AND password='".md5(escape_value($password))."' AND status=1";
	
	$result = mysql_query($sql) or die('Error :'.mysql_error());
	
	if(mysql_num_rows($result) <= 0)
	{
	 $error = true;
	 $_SESSION['valid_subscriber'] = 0;
	 redirect('index.php');
	}
	else
	{
		while($row = mysql_fetch_object($result))
		{
			//IF YOU NEED DATA FROM THE USER,
			//PULL IT FROM HERE, DONT PUT CRAP IN THE CODE.
			//SESSION VARIABLES WERE INVENTED WITH THIS PURPOSE.
			$_SESSION['subscriber_id'] = $row->id;
			$_SESSION['subscriber_firstname'] = $row->firstname;
			$_SESSION['subscriber_middlename'] = $row->middlename;
			$_SESSION['subscriber_company'] = $row->company;
			$_SESSION['subscriber_surname'] = $row->surname;
			$_SESSION['subscriber_tel'] = $row->tel;
			$_SESSION['subscriber_mobile'] = $row->mobile;
			$_SESSION['subscriber_email'] = $row->email;
			$_SESSION['subscriber_status'] = $row->status;
		}
    $_SESSION['valid_subscriber'] = 1;
    $error = false;
    
		redirect($_SERVER['PHP_SELF']);
  }
  return $error;
}

?>
