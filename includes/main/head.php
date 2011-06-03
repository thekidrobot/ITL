<?php 
	include("functions/conn.php"); 
	include("functions/general_functions.php"); 

	if($_GET['art_id'])	$id_article = $_GET['art_id'];
	else $id_article = 0;
	
	if($_GET['parent'])	$parent_menu = $_GET['parent'];
	else $parent_menu = 0;
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO 8859-1" />
<title>ITL</title>
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
