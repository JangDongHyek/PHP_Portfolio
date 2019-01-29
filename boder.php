<?php
require_once('index_top.php');
 ?>
<div id="page" class="container">
	<div class="title">
		<h2>Boder</h2>
	</div>

  <table class="table">
  <tr class="table_tr">
    <th>#</th>
    <th class="title_td">제목</th>
    <th>작성자</th>
    <th>작성날짜</th>
    <th>좋아요</th>
  </tr>
  <tr>
    <td class="td_1">1</td>
    <td class="td_2"><a href="view.php">제목1</a></td>
    <td class="td_3">작성자</td>
    <td class="td_4">2018-08-01</td>
    <td class="td_5">0</td>
  </tr>

</table>

<div class="write">
  <input type="button" id="btn_write" value="Write">
</div>

<div class="paging">
  <span><a href="#"><</a></span>
  <span><a href="#">1</a></span>
  <span><a href="#">2</a></span>
  <span><a href="#">3</a></span>
  <span><a href="#">4</a></span>
  <span><a href="#">5</a></span>
  <span><a href="#">></a></span>
</div>

<?php
require_once('index_bottom.php');
 ?>
