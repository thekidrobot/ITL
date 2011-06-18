<?php //defining constant to hold db access
if($_SERVER['HTTP_HOST'] == 'localhost' or $_SERVER['HTTP_HOST'] == '127.0.0.1'){
	$server = 'localhost';
	$db_name = 'itl';
	$db_user = 'root';
	$db_pass = 'root';
	$site_url = 'http://'.$_SERVER['HTTP_HOST'].'/itl/';
	$document_root = $_SERVER['DOCUMENT_ROOT'].'/itl/';
	$physical_path=".";
	$email_admin="noreply@ifs.com";
}
else{
	$server = 'localhost';
	$db_name = 'tonezerw_itl';
	$db_user = 'tonezerw_itl';
	$db_pass = '8b-es,OuD}rD';
	$site_url = 'http://'.$_SERVER['HTTP_HOST'].'/';
	$document_root = $_SERVER['DOCUMENT_ROOT'];
	$physical_path=	'.';
	$email_admin="vinay@technology10.com";
}

$conn = mysql_connect($server,$db_user,$db_pass);
mysql_select_db($db_name,$conn)or die('error');
?>