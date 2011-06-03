<?php
 $login_type_id = $_SESSION['type'];
 $username = $_SESSION['other_name'];
?>
<ul id="mainNav">
 <li><a href="index.php" <?php if ($curr_page == "index.php") echo "class='active'" ?>>USER ADMINISTRATION</a></li>
 <?php
  if($login_type_id == 1 or $login_type_id == 2 or $login_type_id == 3 or $login_type_id == 4)
  {
   ?>
   <li><a href="parceltracking.php" <?php if ($curr_page == "parceltracking.php") echo "class='active'" ?>>PARCEL ADMINISTRATION</a></li>
   <?php
  }
 ?>
 <li class="logout"><a href="logout.php">WELCOME <?=strtoupper($username) ?> - LOGOUT</a></li>
</ul>