<div id="sidebar">
	<ul class="sideNav">
    <?php
    if($curr_page == "index.php" or $curr_page == "add_article.php")
    {
      ?>
      <li><a href="index.php">Article Mgmt.</a></li>
      <li><a href="add_article.php">New Article</a></li>
      <?php
    }
    if($curr_page == "modify_article.php")
    {
      ?>
    	<li><a href="index.php">View all</a></li>
    	<li><a href="review_article.php?id=<?=$_GET['id'] ?>">View Current</a></li>
      <?php
    }
    if($curr_page == "review_article.php")
    {
      ?>
    	<li><a href="index.php">View all</a></li>
    	<li><a href="modify_article.php?id=<?=$_GET['id'] ?>">Edit Current</a></li>
      <?php
    }
    if($curr_page == "documents.php" or $curr_page == "add_document.php" or $curr_page == "view_document.php")
    {
      ?>
      <li><a href="documents.php">Docs Mgmt.</a></li>
      <li><a href="add_document.php">New Doc.</a></li>
      <?php
    }
    if($curr_page == "users.php" or $curr_page == "view_user.php" or $curr_page == "add_user.php")
    {
      ?>
      <li><a href="users.php">User Mgmt.</a></li>
      <li><a href="add_user.php">New User</a></li>
      <?php
    }    
    if($curr_page == "subscribers.php" or $curr_page == "view_subscriber.php")
    {
      ?>
      <li><a href="subscribers.php">User Mgmt.</a></li>
      <?php
    }
	?>
  </ul>
</div>    
