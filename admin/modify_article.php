<?php
include('includes/header.php');
include('../functions/ps_pagination.php');
$id=$_GET['id'];
if($id=='') $id=1;

if ($_POST['Edit']=='Edit')
{
	$postArray = &$_POST ;
	
	$title = $postArray['title'];
	$content_plain = $postArray['content'];
	$article_date=explode("/",$postArray['article_date']);
	$newdate=$article_date[0]."-".get_month(ltrim($article_date[1],'0'))."-".$article_date[2];
	$status = $postArray['status'];
	$type = $postArray['type'];
	$query="UPDATE article SET
			type_article ='$type',
			title_article='$title',
			brief_article='$content_plain',
			content_article='$content_html',
			status_article='$status',
			date_article='$newdate'
			WHERE id_article = $id";
	
	$r= mysql_query($query)or die(mysql_error()."cannot enter data");
	$status= "Article Modified Sucessfully";
}

 ?>
<body>
  <div id="wrapper">
		<h1><a href="#"><span>International Financial Services</span></a></h1>
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
						<table action="">
						<tr>
							<td colspan="2"><input type="text" class="text-long" name="title" value="<?=$row['title_article']?>" /></td>
						</tr>
						<tr>
							<td colspan="2"><textarea name="content" id="ckeditor"><?=trim($row['content_article'])?></textarea>
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
							<td>Type:</td>
							<td>
								<select name="type">
									<option value="E" <?php if($row['type_article'] == "E") echo 'selected="selected"'?>>Event</option>
									<option value="N" <?php if($row['type_article'] == "N") echo 'selected="selected"'?>>News</option>
								</select>
						  </td>
						</tr>
						<tr>
							<td>Date:</td>
						<td>
							<?php
								$db_date=explode("-",$row['date_article']);
								$adate=$db_date[0]."/".get_month_no($db_date[1])."/".$db_date[2];
							?>
							<input name="article_date" id="article_date" type="text" readonly="readonly" value=<?=$adate?> /> 
							<img src="images/calendar.jpg" onclick="displayDatePicker('article_date', this, 'dmy', '/');" alt="calendar" class="calendar_icon" /> 
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">		
							<input type="submit" class="button-submit" value="Edit" name="Edit"  />&nbsp;&nbsp;<input type="button" class="button-submit" value="Cancel" name="Cancel" onclick="confirm_msg('article')" />
						</td>
					</tr>
				</table>
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
