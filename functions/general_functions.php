<?php 

//EVERY FUNCTION HERE SHOULD BE COMMENTED.

// Shows the name of the script in execution, used by menus and custom scripts
$file = $_SERVER["SCRIPT_NAME"];
$break = Explode('/', $file);
$curr_page = $break[count($break) - 1];

//Sets name of the website, used for page titles.
$website_name = "ITL";

////////////////USED BY FRONT////////////////////////

//Prints the article contents for the front page
function get_inner_article($id_article)
{
	$SQL = "SELECT content_article FROM article where id = $id_article";
	$result = mysql_query($SQL) or die(mysql_error());

	while ($db_field = mysql_fetch_assoc($result)) {
		print $db_field['content_article'];
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
	return "<span style=\"color:red;\">Inactive/span>";
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

//This function simply checks if the session variable 'valid' is set to 1.
function isLoggedIn()
{
    if($_SESSION['valid']) return true;
    else return false;
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

///////Functions used by the calendar in event search.////////
function hiLightEvt($eMonth,$eDay,$eYear)
{
	//$tDayName = date("l");
	$todaysDate = date("n/j/Y");
	$dateToCompare = $eMonth . '/' . $eDay . '/' . $eYear;
	$articlemonth=get_month($eMonth);
	
	if($eDay<=9) $artday="0".$eDay;
	else $artday=$eDay;  
	$sql="select count(date_article) as eCount ,title_article from article where date_article = '" . $artday. '-' . $articlemonth . '-' . $eYear . "' AND status_article = 1 AND type_article='E'";
	$hsql=mysql_query("SELECT title FROM holidays WHERE holiday_date= '" . $eYear . '/' . $eMonth . '/' . $eDay . "'");
	$holiday_count=mysql_fetch_object($hsql);
	
	//return;
	$result = mysql_query($sql);
	while($row= mysql_fetch_array($result))
	{
		if($row['eCount'] >=1 || $holiday_count->title!="")
		{
			if($row['eCount'] >=1) $aClass = 'class="event" title="'.$row['title_article'].'"';
			else $aClass = 'class="holiday" title="'.$holiday_count->title.'"';
		}
		elseif($row['eCount'] ==0)
		{
			$aClass ='class="normal"';
		}
		if($todaysDate == $dateToCompare) $aClass.=' style="font-weight:bold"';
	}
	return $aClass;
}

function get_month($month)
{
	$month_arr=array(1=>"Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$counter=1;
	foreach($month_arr as $m)
	{
		if($counter==$month)
		return $month_arr[$month];
		$counter++;
	}
}

function check_event($eMonth,$eDay,$eYear)
{
	$articlemonth=get_month($eMonth);
	if($eDay<=9) $artday="0".$eDay;
	else $artday=$eDay; 
	$sql=mysql_query("select count(date_article) as eCount from article where date_article = '" . $artday. '-' . $articlemonth . '-' . $eYear . "' AND status_article = 1 AND type_article='E'");
	$count = mysql_fetch_object($sql);
  if($count->eCount>0) $event=1;
	else $event=0; 
	return $event;
}

///////End functions used by the calendar in event search.////////

//Sends a mail on document creation
//Commented on tests

function sendemail($client,$fname,$sname,$title,$path)
{
	$msg="<p>Hello ".$fname." ".$surname.",<br />
				<br />
				Your document titled ".$title." is uploaded. To view, please click <a href='".$path."'>here</a> 
				<br />
				-- <br />
				Thanks,<br />
				The IFS Team</p>";
	$to = $client;
  $subject = 'IFS document uploaded';
	$headers = 'Content-type: text/html; charset=iso-8859-1'."\r\n";
	$headers .= 'From: IFS Admin' . "\r\n";
	//mail( $to, $subject, $msg, $headers );	
}

?>