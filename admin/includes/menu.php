<?php
 $login_type_id = $_SESSION['type'];
 $username = $_SESSION['other_name'];
?>
<ul id="mainNav">
 <li><a href="index.php" <?php if ($curr_page == "index.php") echo "class='active'" ?>>Article Administration</a></li>
 <li class="logout"><a href="logout.php">WELCOME <?=strtoupper($username) ?> - LOGOUT</a></li>
</ul>