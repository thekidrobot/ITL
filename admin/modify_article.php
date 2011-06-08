<?php
include('includes/header.php');
include('../functions/ps_pagination.php');
$id=$_GET['id'];
if($id=='') $id=1;

if ($_POST['Edit']=='Edit')
{
	$postArray = &$_POST ;
	
	$title = $postArray['title'];
	$content = escape_value($postArray['content']);
	$content_plain = strip_tags($content);
	$newdate = $postArray['article_date'];
	$status = $postArray['status'];
	$type = $postArray['type'];
	
	$query="UPDATE article SET
					type_article ='$type',
					title_article='$title',
					content_article='$content',
					content_plain='$content_plain',
					status_article='$status',
					date_article='$newdate'
					WHERE id = $id";
	
	$r= mysql_query($query)or die(mysql_error()."cannot enter data");
	$status= "Article Modified Sucessfully";
}

 ?>
<body>
  <div id="wrapper">
		<h1><a href="index.php"><span><?=$website_name?></span></a></h1>
		<?php include('includes/menu.php'); ?>
		<div id="containerHolder">
			<div id="container">
		  <div id="sidebar">
				<?php include('includes/side_menu.php'); ?>
			</div>    
			<div id="main">
				<h2>Modify an Article</h2>
					<h3><?php echo isset($status) ? $status : ''; ?></h3>
					<?php 
						$query="select * from article where id=$id";
						$result=mysql_query($query);
						$row=mysql_fetch_array($result);   
					?>
					<form method="post" name='myform'>
						<fieldset>
						<table action="">
						<tr>
							<td colspan="2" align="center">		
								<input type="submit" class="button-submit" value="Edit" name="Edit"  />&nbsp;&nbsp;<input type="button" class="button-submit" value="Cancel" name="Cancel" onclick="confirm_msg('article')" />
							</td>
						</tr>
						<tr>
							<td>Type:</td>
							<td>
								<select name="type">
									<option value="A" <?php if($row['type_article'] == "A") echo 'selected="selected"'?>>Article</option>
									<option value="E" <?php if($row['type_article'] == "E") echo 'selected="selected"'?>>Event</option>
									<option value="F" <?php if($row['type_article'] == "F") echo 'selected="selected"'?>>Factsheet</option>
									<option value="N" <?php if($row['type_article'] == "N") echo 'selected="selected"'?>>News</option>
								</select>
						  </td>
						</tr>
						<tr>
							<td>Title:</td>
							<td><input type="text" class="text-long" name="title" value="<?=$row['title_article']?>" /></td>
						</tr>
						<tr>
							<td>Content:</td>
							<td>
								<textarea name="content" id="ckeditor"><?=trim($row['content_article'])?></textarea>
								<script type="text/javascript" src="js/ckedit_behavior.js"></script>
							</td>
						</tr>
						<tr>
							<td>Status:</td>
							<td>
								<select name="status">
									<option value="1" <?php if($row['status_article'] == 1) echo 'selected="selected"'?>>Active</option>
								  <option value="0" <?php if($row['status_article'] == 0) echo 'selected="selected"'?>>Inactive</option>
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
	  <div class="clear"></div>
  </div>
	</div>	
  <?php include('includes/footer.php');?> 
  </div>
  <script type="text/javascript" src="js/calendar1.js"></script>
	<script type="text/javascript" src="js/calendar_validation.js"></script>	
</body>
</html>
