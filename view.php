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

$sql = "SELECT * FROM user WHERE user_idx = {$board['user_idx']}";
$result = mysqli_query($conn,$sql);
$name = mysqli_fetch_array($result);

session_start();
$user_idx = $_SESSION['user_idx'];
$sql = "SELECT * FROM like_chk WHERE user_idx = {$user_idx} AND board_idx = {$board_idx}";
$result = mysqli_query($conn,$sql);
$like_chk = mysqli_fetch_array($result);

 ?>
<div id="page" class="container">
	<div class="title">
		<h2><?=$board['title']?></h2>
    <form  action="modify.php" method="post" id="modify_frm">
      <input type="hidden" name="board_idx" form="modify_frm" value="<?=$board['board_idx']?>">
    </form>
    <form  action="delete_process.php" method="post" id="delete_frm">
      <input type="hidden" name="board_idx" form="delete_frm" value="<?=$board['board_idx']?>">
    </form>
	</div>
  <div class="subtitle">
    <span id="st_name"><?=$name['id']?></span>
    <span>|</span>
    <span id="st_like">좋아요 <?=$board['likes']?></span>

    <?php
    if ($_SESSION['id'] == $name['id']) {
      echo '<input type="submit" id="btn_modify" form="modify_frm" value="Modify">';
      echo '<input type="button" id="btn_delete" name="" value="Delete">';
    }

     ?>

  </div>
<div class="description">

<?php
  if ($file['filename'] == "") {

  } else {?>
      <img src="data/<?=$file['filename']?>" width="100%" height="50%"/>
<?php
    }
 ?>

  <?=$board['description']?>
</div>

<form id="frm_like" action="like.php" method="post">
  <?php
  if ($like_chk == null) {?>
      <div class="like" id="like">
  <?php
} else { ?>
  <div class="likeon" id="like">
<?php
}
 ?>

  <input type="button" name="" value="like" onclick="like()">
  <input type="hidden" name="board_idx" value="<?=$board_idx?>">
</div>
</form>
<?php
require_once('index_bottom.php');
 ?>
