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

?>