<?php 
    session_start();
    include('../functions/conn.php');
    include('../functions/general_functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>ITL</title>
    <!-- CSS -->
    <link href="style/css/transdmin.css" rel="stylesheet" type="text/css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie6.css" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" media="screen" href="style/css/ie7.css" /><![endif]-->
    <!-- JavaScripts-->
    <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" src="style/js/jNice.js"></script>

    <script type="text/javascript" src="ckeditor/ckeditor.js"></script> 
    <script type="text/javascript" src="js/functions.js"></script> 
    <link href="style/css/calendar1.css" rel="stylesheet" type="text/css" />

    <!--dialogue UI-->
    <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.4.custom.css" rel="stylesheet" />	
    <script type="text/javascript" src="js/jquery-ui-1.8.4.custom.min.js"></script>
    <!--dialogue UI-->

    <?php
    // Custom scripts for different pages
    if($curr_page == "index.php")
    {
        ?>
        <script src="style/js/selecmenu.js"  language="javascript"></script>
        <?php 
    }
    
    if($curr_page == "parceltracking.php")
    {
        ?>
        <script src="style/js/selecmenu_parcel.js"  language="javascript"></script>            
        <?php
    }
    ?>
</head>