<?php 

//EVERY FUNCTION HERE SHOULD BE COMMENTED.

// set the default timezone to use. Available since PHP 5.1
date_default_timezone_set('UTC');

// Shows the name of the script in execution, used by menus and custom scripts
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$curr_page = $break[count($break) - 1];

//Sets name of the website, used for page titles.
$website_name = "ITL - Intercontinental Trust Limited";

////////////////USED BY FRONT////////////////////////

//Prints the article contents for the front page
function get_inner_article($id_article)
{
	$SQL = "SELECT * FROM article where id = $id_article";
	$result = mysql_query($SQL) or die(mysql_error());

	while ($db_field = mysql_fetch_assoc($result))
	{
		$type_article = $db_field['type_article'];
		$title_article = $db_field['title_article'];
		$date_article = $db_field['date_article'];
		$content_article = $db_field['content_article'];
	}
	if ($type_article == 'A'){
		echo "<div><h1>".$title_article."</h1><br /><br />".$content_article."</div>";	
	}
	else{
		echo "<div><h1>".$title_article."</h1>".$date_article."<br /><br />".$content_article."</div>";	
	}
	
}

//Constructs the top menu
function make_kids($row_id)
{
	$result = mysql_query("SELECT * FROM top_menu WHERE parent_id = $row_id");
	if (mysql_num_rows($result) > 0)
	{
		?>
		<ul>
		<?php
		while ($row = mysql_fetch_array($result))
		{
			if(trim($row['link_url']) != '')
			{
				?>
				<li><a href="<?=$row['link_url']?>"><?=$row['name'] ?></a></li>
				<?php
			}
			else
			{
				?>
				<li><a href="content.php?art_id=<?=$row['link_id']?>"><?=$row['name'] ?></a></li>
				<?php
			}
			//Welcome Mr. Cobb
			make_kids($row['id']);
		}
		?>
		</ul>
		<?php
	}
}		

//Get parent menu. Used for side menus and searches.
function whoisyourdaddy($article_id)
{
	$result = mysql_query("SELECT parent_id FROM top_menu WHERE link_id = $article_id");
	if (mysql_num_rows($result) > 0)
	{
		while ($row = mysql_fetch_array($result))
		{
			$_SESSION['parent'] = $row['parent_id'];
		}
	}
	else $_SESSION['parent'] = 0;
}

/////////////USED BY BACK///////////////////////////

//Display status active - inactive in a row
function display_status($c)
{
	if($c==1)
	return "<span style=\"color:blue;\">Active</span>";
	if($c==0)
	return "<span style=\"color:red;\">Inactive</span>";
}

//Safely escape values. Please use in your SQL queries. 
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

//This function simply checks if the session variable 'valid' is set to 1. - for ADMIN
function isLoggedIn()
{
    if($_SESSION['valid']) return true;
    else return false;
}


//This function simply checks if the session variable 'valid' is set to 1. - for SUBSCRIBER
function isSubscriberLoggedIn()
{
    if($_SESSION['valid_subscriber']) return true;
    else return false;
}

//Random Password Generator
function genRandomString()
{
    $length = 12;
    $characters = "0123456789abcdefghijklmnopqrstuvwxyz";
    $string = '';    

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters))];
    }
    return $string;
}

//Safely Redirects
function redirect($filename)
{
	if (!headers_sent()) header('Location: '.$filename);
	else echo '<meta http-equiv="refresh" content="0;url='.$filename.'" />';
}

///////Functions used by the calendar in event search.////////
function hiLightEvt($eMonth,$eDay,$eYear)
{
	$todaysDate = date("n/j/Y");
	$dateToCompare = $eMonth . '/' . $eDay . '/' . $eYear;

	if($eDay<=9) $artday="0".$eDay;
	else $artday=$eDay;
	
	if($eMonth<=9) $eMonth="0".$eMonth;

	$sql="select 	count(date_article) as eCount, title_article 
				from 		article
				where 	DATE_FORMAT(date_article, '%d-%m-%Y')  = '" . $artday. '-' . $eMonth . '-' . $eYear . "'
				AND 		status_article = 1 
				AND 		type_article IN('E')";

	$hsql=mysql_query("SELECT title FROM holidays WHERE holiday_date= '" . $eYear . '/' . $eMonth . '/' . $eDay . "'");
	$holiday_count=mysql_fetch_object($hsql);
	
	$result = mysql_query($sql);
	
	while($row= mysql_fetch_array($result))
	{
		if($row['eCount'] >=1 || $holiday_count->title!="")
		{
			if($row['eCount'] >=1) $aClass = ' class="event" title="'.$row['title_article'].'"';
			else $aClass = 'class="holiday" title="'.$holiday_count->title.'"';
		}
		elseif($row['eCount'] ==0)
		{
			$aClass ='class="normal"';
		}
		if($todaysDate == $dateToCompare) $aClass =' class="today"';
	}
	return $aClass;
}

///////Function used to detect events.////////
function checkDay($eMonth,$eDay,$eYear)
{
	$todaysDate = date("n/j/Y");
	$dateToCompare = $eMonth . '/' . $eDay . '/' . $eYear;

	if($eDay<=9) $artday="0".$eDay;
	else $artday=$eDay;
	
	if($eMonth<=9) $eMonth="0".$eMonth;

	$sql="select 	count(date_article) as eCount, title_article 
				from 		article
				where 	DATE_FORMAT(date_article, '%d-%m-%Y')  = '" . $artday. '-' . $eMonth . '-' . $eYear . "'
				AND 		status_article = 1 
				AND 		type_article IN('E')";

	$hsql=mysql_query("SELECT title FROM holidays WHERE holiday_date= '" . $eYear . '/' . $eMonth . '/' . $eDay . "'");
	$holiday_count=mysql_fetch_object($hsql);
	
	$result = mysql_query($sql);
	
	while($row= mysql_fetch_array($result))
	{
		if($row['eCount'] >=1 || $holiday_count->title!="")
		{
			if($row['eCount'] >=1) $eventType = 1; //Event
			else $eventType = 2; //Holiday
		}
		elseif($row['eCount'] ==0)
		{
			$eventType = 0; //No Event;
		}
	}
	return $eventType ;
}

function check_event($eMonth,$eDay,$eYear)
{
	$articlemonth=$eMonth;
	if($eDay<=9) $artday="0".$eDay;
	else $artday=$eDay; 

	$sql=mysql_query("select count(date_article) as eCount from article where date_article = '" . $artday. '-' . $articlemonth . '-' . $eYear . "' AND status_article = 1 AND type_article='E'");
	$count = mysql_fetch_object($sql);
  if($count->eCount>0) $event=1;
	else $event=0; 
	return $event;
}

///////End functions used by the calendar in event search.////////

//Generic function to send mails
//TODO : Make this function even safer
function sendemail($to,$subject,$msg)
{
  
  $mailcheck = spamcheck($to);
  
  if ($mailcheck==FALSE){
    echo "Invalid email format";
  }
  else{
    $headers='Content-type: text/html; charset=iso-8859-1'."\r\n";
    $headers.='From:'. $email_admin ."\r\n";
    
    $subject.="<br /><br /><pre>Intercontinental Trust Ltd is regulated by the
    Financial Services Commission in Mauritius. If you are not the intended
    recipient, please advise the sender immediately and delete this message. See
    http://www.intercontinentaltrust.com/disclaimer.htm for further information
    on confidentiality and the risks inherent in electronic communication</pre>";

    mail( $to, $subject, $msg, $headers );	  
  }
  
}


function spamcheck($field)
{
  $field=filter_var($field, FILTER_SANITIZE_EMAIL);

  if(filter_var($field, FILTER_VALIDATE_EMAIL))
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }
}


?>