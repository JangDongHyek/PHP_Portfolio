<?php
require_once('index_top.php');
require_once('connect.php');
$board_idx = $_POST['board_idx'];

$sql = "SELECT * FROM board WHERE board_idx = {$board_idx}";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

$sql = "SELECT * FROM file WHERE board_idx = {$board_idx}";
$result = mysqli_query($conn,$sql);
$file = mysqli_fetch_array($result);


 ?>
<div id="page" class="container">
	<div class="title">
		<h2>Modify</h2>
	</div>

<div class="">
  <form class="form_write" action="modify_process.php" method="post" id="frm_write" enctype="multipart/form-data">
    <div class="write_title">
        <input type="text" name="title" id="write_title" value="<?=$row['title']?>" placeholder="Title..">
    </div>

    <div class="wirte_description">
      <textarea name="ir1" id="ir1"rows="30" cols="152"><?=$row['description']?></textarea>
    </div>

    <div class="write_file">
      <span>이미지 첨부</span>
      <input type="file" name="file" id="write_file" value="">
      <input type="hidden" name="filename" value="<?=$file['filename']?>">
    </div>



    <div class="write">
      <input type="button" id="submit_write" value="Modify" class="btn_write">
    </div>

    <input type="hidden" name="board_idx" value="<?=$board_idx?>">
  </form>
</div>

<?php
require_once('index_bottom.php');
 ?>
