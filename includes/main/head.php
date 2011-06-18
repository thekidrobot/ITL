<?php 
	include("functions/conn.php"); 
	include("functions/general_functions.php"); 

	if($_GET['art_id'])	$id_article = $_GET['art_id'];
	else $id_article = 0;
	
	whoisyourdaddy($id_article);
	$parent_menu = $_SESSION['parent'];
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="SHORTCUT ICON" href="favicon.ico" type="image/x-icon"> 
<meta name="keywords" content="Intercontinental trust , Mauritius, finance Mauritius, international tax,
management services, trust fund Mauritius, legal system Mauritius, company
law Mauritius, companies law Mauritius, double tax treaties, global
companies Mauritius" /> 
<meta http-equiv="Content-Type" content="text/html; charset=ISO 8859-1" />
<title>ITL</title>
<!--For the contact form-->
<script type="text/javascript" src="js/prettyForms.js"></script>
<link rel="stylesheet" href="css/prettyForms.css" type="text/css" media="screen" />
<!--for the clock-->
<link href="css/clock.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.2.6.min.js"></script>
<script src="js/clock.js" type="text/javascript"></script>
<!--for the clock-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/general.js" type="text/javascript"></script>
<!--[if IE 6]>
<style type="text/css" media="screen">
body{
	behavior:url(js/csshover.htc);
}
</style>

<script language="javascript" type="text/javascript" src="js/fixpng.js"></script>
<![endif]-->
</head>
