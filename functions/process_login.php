<?php 

foreach($_POST as $key=>$value)
{
 $$key=$value;
}

include('general_functions.php');

if(trim($username)!="" and trim($password)!="")
{
	if(auth_user($username,$password))
  {
		$error=false;
		redirect('index.php');	
  }
	else
  {
		$error=true;
	}
}

?>
