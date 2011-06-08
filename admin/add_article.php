<?php
include('includes/header.php');
include('../functions/ps_pagination.php');

if ($_POST['Add']=='Add')
{
	$postArray = &$_POST ;
	$title = $postArray['title'];
	$content = escape_value($postArray['content']);
	$content_plain = strip_tags($content);
	$newdate = $postArray['article_date'];
	$status = $postArray['status'];
	$type = $postArray['type'];
	
	$query="INSERT INTO article (date_article,type_article,title_article,content_article,content_plain,status_article)
					VALUES ('$newdate','$type','$title','$content','$content_plain','$status')";
	
	$r= mysql_query($query)or die("Error : ".mysql_error());
	$id =mysql_insert_id();
	$status= "Article Added Sucessfully";
	redirect('index.php');
}

?>

<body>
	<div id="wrapper">
		<h1><a href="#"><span><?=$website_name?></span></a></h1>
		<?php include('includes/menu.php'); ?>
		<div id="containerHolder">
			<div id="container">
				<div id="sidebar">
					<?php include('includes/side_menu.php'); ?>
        </div>    
				<div id="main">
					<h2>Add an Article</h2>
					<h3><?php echo isset($_GET['status']) ? $_GET['status'] : ''; ?></h3>
					<form method="post" name='myform'>
						<fieldset>
						<table>
							<tr>
								<td colspan="2" align="center"><input type="submit" class="button-submit" value="Add" name="Add"></td>
							</tr>
							<tr>
								<td>Title:</td>
								<td><input type="text" class="text-long" name="title" value="" /></td>
							</tr>
							<tr>
								<td>Type:</label></td>
								<td>
								<select name="type">
									<option value="A">Article</option>
									<option value="E">Event</option>
									<option value="F">Factsheet</option>
									<option value="N">News</option>
								</select>
								</td>
							</tr>
							<tr>
								<td>Content:</td><td><textarea name="content" id="ckeditor"></textarea>
								<script type="text/javascript" src="js/ckedit_behavior.js"></script></td>
							</tr>
							<tr>
								<td>Status:</label></td>
								<td>
								<select name="status">
									<option value="1">Active</option>
									<option value="0">Inactive</option>
								</select>
								</td>
							</tr>
							<tr>
								<td>Date:</td>
								<td>
									<input name="article_date" id="article_date" type="text" readonly="readonly" value="<?=date( 'Y/m/d H:i:s', strtotime('now') )?>" /> 
									<img src="images/calendar.jpg" onclick="displayDatePicker('article_date', this, 'ymd', '/');" alt="calendar" class="calendar_icon" /> 
								</td>
							</tr>
            </table>
						</fieldset>
					</form>
        </div>
        <!-- // #main -->
				<div class="clear"></div>
      </div>
    <!-- // #container -->
		</div>	
  <!-- // #containerHolder -->       
	<?php include('includes/footer.php');?> 
  </div>
	<script type="text/javascript" src="js/calendar1.js"></script>
	<script type="text/javascript" src="js/calendar_validation.js"></script>	
  <!-- // #wrapper -->
</body>
</html>