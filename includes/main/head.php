<?php
	session_start();
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
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title><?=$website_name?></title>
<!--For the contact form-->
<script type="text/javascript" src="js/prettyForms.js"></script>
<!--[if IE]>
	<link rel="stylesheet" href="css/prettyForms.css" type="text/css" media="screen" />
<![endif]-->

<!--[if !IE]><!-->
	<link rel="stylesheet" href="css/prettyForms_noie.css" type="text/css" media="screen" />
<!--<![endif]-->


<!--for the clock-->
<link href="css/clock.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.1.5.1.min.js" type="text/javascript"></script>
<script src="js/clock.js" type="text/javascript"></script>
<!--for the clock-->
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="js/jquery_main_gal.js" type="text/javascript"></script>
<script src="js/general.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="css/wt-rotator.css"/>

<!--[if IE 6]>
<style type="text/css" media="screen">
body{
	behavior:url(js/csshover.htc);
}
</style>
<script language="javascript" type="text/javascript" src="js/fixpng.js"></script>
<![endif]-->

<script type="text/javascript">
	
	// Custom overlay script
	$(document).ready( function(){
	
		var slideSpeed = 150 / 0.5;	
		
		var cssObject = {
			width 		: $('.content').width() ,
			height		: $('.content').height(),
			opacity		: 0,
			'z-index'	: -1
		};	
			
		// Append the overlay div and apply CSS Object to it
		$('.content')
					.prepend( $('<div class="content_overlay"></div>') );		
					
		$('.content_overlay') .css( cssObject );
						
		$('.menu ul li').hover(function(){							
			
			$(this).children('ul').slideDown( slideSpeed , function(){
				$(this).children('ul').css( 'display', 'block' );
			});
			
			$('.content_overlay').css('z-index', 1000 );
			// Animating the overlay	
			$('.content_overlay').stop().animate( {opacity : "0.8"}, 300 );
			$('.banner').stop().animate( {opacity : "0.2"}, 300 );
		},function(){
	
			$(this).children('ul').slideUp( slideSpeed , function(){
				$(this).children('ul').css( 'display', 'none' );
			});

			$('.content_overlay').stop().animate( {opacity : "0"}, 300, function(){
				$('.content_overlay').css('z-index', -1 );			
			});
			
			$('.banner').stop().animate( {opacity : "1"}, 300 );

		});

	})
</script>
</head>
