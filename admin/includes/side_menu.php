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
     	<li><a href="index.php?id=<?=$_GET['id']?>">Delete Current</a></li>
      <?php
    }
    if($curr_page == "review_article.php")
    {
      ?>
    	<li><a href="index.php">View all</a></li>
    	<li><a href="modify_article.php?id=<?=$_GET['id'] ?>">Edit Current</a></li>
     	<li><a href="index.php?id=<?=$_GET['id']?>">Delete Current</a></li>
      <?php
    }
    if($curr_page == "documents.php" or $curr_page == "add_document.php")
    {
      ?>
      <li><a href="documents.php">Docs Mgmt.</a></li>
      <li><a href="add_document.php">New Doc.</a></li>
      <?php
    }
    ?>
  </ul>
</div>    
