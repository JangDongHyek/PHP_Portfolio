<?php
require_once('index_top.php');
require_once('connect.php');

$board_idx = $_GET['board_idx'];

$sql = "SELECT * FROM board WHERE board_idx = {$board_idx}";
$result = mysqli_query($conn,$sql);
$board = mysqli_fetch_array($result);

$sql = "SELECT * FROM file WHERE board_idx = {$board_idx}";
$result = mysqli_query($conn,$sql);
$file = mysqli_fetch_array($result);

 ?>
<div id="page" class="container">
	<div class="title">
		<h2><?=$board['title']?></h2>
	</div>

<div class="description">

  <img src="data/<?=$file['filename']?>" width="100%" height="100%" alt="" />

  <?=$board['description']?>
</div>

<div class="like">
  <input type="button" name="" value="like">
  <input type="button" name="" value="dis like">
</div>
<?php
require_once('index_bottom.php');
 ?>
