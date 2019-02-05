<?php
require_once('index_top.php');
require_once('connect.php');

$sql = "SELECT * FROM board ORDER BY likes DESC LIMIT 0,6";
$result = mysqli_query($conn,$sql);




 ?>
<div id="page" class="container">
	<div class="title">
		<h2>Best 6</h2>
	</div>
	<div class="boxA">
		<div class="box">
      <?php
      $row = mysqli_fetch_array($result);
      $fsql = "SELECT * FROM file WHERE board_idx = {$row['board_idx']}";
      $fresult = mysqli_query($conn,$fsql);
      $file = mysqli_fetch_array($fresult);
      if ($file['filename'] == "") {
          $file['filename'] = "no.gif";
      }
      echo "<img src=\"data/{$file['filename']}\" width=\"320\" height=\"180\"/>";
			echo "<h3>{$row['title']}</h3>";
			echo "<a href=\"view.php?board_idx={$row['board_idx']}\" class=\"button\">Read More</a>";
       ?>
		</div>
		<div class="box">
      <?php
      $row = mysqli_fetch_array($result);
      $fsql = "SELECT * FROM file WHERE board_idx = {$row['board_idx']}";
      $fresult = mysqli_query($conn,$fsql);
      $file = mysqli_fetch_array($fresult);
      if ($file['filename'] == "") {
          $file['filename'] = "no.gif";
      }
      echo "<img src=\"data/{$file['filename']}\" width=\"320\" height=\"180\"/>";
			echo "<h3>{$row['title']}</h3>";
			echo "<a href=\"view.php?board_idx={$row['board_idx']}\" class=\"button\">Read More</a>";
       ?>
		</div>
	</div>
	<div class="boxB">
		<div class="box">
      <?php
      $row = mysqli_fetch_array($result);
      $fsql = "SELECT * FROM file WHERE board_idx = {$row['board_idx']}";
      $fresult = mysqli_query($conn,$fsql);
      $file = mysqli_fetch_array($fresult);
      if ($file['filename'] == "") {
        $file['filename'] = "no.gif";
      }
      echo "<img src=\"data/{$file['filename']}\" width=\"320\" height=\"180\"/>";
			echo "<h3>{$row['title']}</h3>";
			echo "<a href=\"view.php?board_idx={$row['board_idx']}\" class=\"button\">Read More</a>";
       ?>
		</div>
		<div class="box">
      <?php
      $row = mysqli_fetch_array($result);
      $fsql = "SELECT * FROM file WHERE board_idx = {$row['board_idx']}";
      $fresult = mysqli_query($conn,$fsql);
      $file = mysqli_fetch_array($fresult);
      if ($file['filename'] == "") {
        $file['filename'] = "no.gif";
      }
      echo "<img src=\"data/{$file['filename']}\" width=\"320\" height=\"180\"/>";
			echo "<h3>{$row['title']}</h3>";
			echo "<a href=\"view.php?board_idx={$row['board_idx']}\" class=\"button\">Read More</a>";
       ?>
		</div>
	</div>
	<div class="boxC">
		<div class="box">
      <?php
      $row = mysqli_fetch_array($result);
      $fsql = "SELECT * FROM file WHERE board_idx = {$row['board_idx']}";
      $fresult = mysqli_query($conn,$fsql);
      $file = mysqli_fetch_array($fresult);
      if ($file['filename'] == "") {
        $file['filename'] = "no.gif";
      }
      echo "<img src=\"data/{$file['filename']}\" width=\"320\" height=\"180\"/>";
			echo "<h3>{$row['title']}</h3>";
			echo "<a href=\"view.php?board_idx={$row['board_idx']}\" class=\"button\">Read More</a>";
       ?>
		</div>
		<div class="box">
      <?php
      $row = mysqli_fetch_array($result);
      $fsql = "SELECT * FROM file WHERE board_idx = {$row['board_idx']}";
      $fresult = mysqli_query($conn,$fsql);
      $file = mysqli_fetch_array($fresult);
      if ($file['filename'] == "") {
        $file['filename'] = "no.gif";
      }
      echo "<img src=\"data/{$file['filename']}\" width=\"320\" height=\"180\"/>";
			echo "<h3>{$row['title']}</h3>";
			echo "<a href=\"view.php?board_idx={$row['board_idx']}\" class=\"button\">Read More</a>";
       ?>
		</div>
	</div>
<?php
require_once('index_bottom.php');
 ?>
