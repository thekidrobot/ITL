<?php 

include('general_functions.php');

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
  
	$sql = "SELECT * FROM user where login='".escape_value($username)."'
					AND password='".md5(escape_value($password))."' AND status=1";
	
	$result = mysql_query($sql) or die('Error :'.mysql_error());
	
	if(mysql_num_rows($result) <= 0)
	{
		$error = true;
    $_SESSION['valid'] = 0;
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
			$_SESSION['status'] = $row->status;
      $_SESSION['valid'] = 1;
		}
    $error = false;
    redirect('index.php');
  }
  return $error;
}

?>
