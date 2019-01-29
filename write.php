<?php
require_once('index_top.php');
 ?>
<div id="page" class="container">
	<div class="title">
		<h2>Write</h2>
	</div>

<div class="">
  <form class="form_write" action="write_process.php" method="post" id="frm_write">
    <div class="write_title">
        <input type="text" name="title" id="write_title" value="" placeholder="Title..">
    </div>

    <div class="wirte_description">
      <textarea name="ir1" id="ir1"rows="30" cols="152"></textarea>
    </div>

    <div class="write_file">
      <span>이미지 첨부</span>
      <input type="file" name="file" id="write_file" value="">
    </div>



    <div class="write">
    <input type="button" id="submit_write" value="Write" class="btn_write">
    </div>

  </form>
</div>

<?php
require_once('index_bottom.php');
 ?>
