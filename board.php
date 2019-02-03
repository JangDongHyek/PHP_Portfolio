<?php
require_once('index_top.php');
require_once('connect.php');

$page_set = 10; // 한페이지 줄수
$block_set = 5; // 한페이지 블럭수

$query = "SELECT count(*) as total FROM board";
$result = mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);

$total = $row[total]; // 전체글수

$total_page = ceil ($total / $page_set); // 총페이지수(올림함수)
$total_block = ceil ($total_page / $block_set); // 총블럭수(올림함수)
$page = ($_GET['page']) ? $_GET['page'] : 1;

 // 현재페이지(넘어온값)
$block = ceil ($page / $block_set); // 현재블럭(올림함수)

$limit_idx = ($page - 1) * $page_set; // limit시작위치.

// 현재페이지 쿼리
$query = "SELECT * FROM board ORDER BY board_idx DESC LIMIT $limit_idx, $page_set";
$result = mysqli_query($conn,$query);

$first_page = (($block - 1) * $block_set) + 1; // 첫번째 페이지번호
$last_page = min ($total_page, $block * $block_set); // 마지막 페이지번호

$prev_page = $page - 1; // 이전페이지
$next_page = $page + 1; // 다음페이지

$prev_block = $block - 1; // 이전블럭
$next_block = $block + 1; // 다음블럭

// 이전블럭을 블럭의 마지막으로 하려면...
$prev_block_page = $prev_block * $block_set; // 이전블럭 페이지번호
// 이전블럭을 블럭의 첫페이지로 하려면...
//$prev_block_page = $prev_block * $block_set - ($block_set - 1);
$next_block_page = $next_block * $block_set - ($block_set - 1); // 다음블럭 페이지번호

 ?>
<div id="page" class="container">
	<div class="title">
		<h2>Board</h2>
	</div>

  <table class="table">
  <tr class="table_tr">
    <th>#</th>
    <th class="title_td">제목</th>
    <th>작성자</th>
    <th>작성날짜</th>
    <th>좋아요</th>
  </tr>
  <?php
  while ($rows = mysqli_fetch_array($result)) {
    $querye = "SELECT * FROM user WHERE user_idx = {$rows['user_idx']}";
    $resulte = mysqli_query($conn,$querye);
    $name = mysqli_fetch_array($resulte);
    ?>
    <tr>
      <td class="td_1"><?=$rows['board_idx']?></td>
      <td class="td_2"><a href="view.php?board_idx=<?=$rows['board_idx']?>"><?=$rows['title']?></a></td>
      <td class="td_3"><?=$name['id']?></td>
      <td class="td_4"><?=$rows['created']?></td>
      <td class="td_5"><?=$rows['likes']?></td>
    </tr>
  <?php
  }
  ?>
</table>

<div class="write">
  <?php
  session_start();
  if(isset($_SESSION['id']) == '') {

  } else {
    echo '<input type="button" id="btn_write" value="Write">';
  }
   ?>

</div>

<div class="paging">
  <?php
  echo ($prev_page > 0) ? "<span><a href='board.php?page=$prev_page'><</a></span>" : "";

  for ($i=$first_page; $i<=$last_page; $i++) {
  echo ($i != $page) ? "<span><a href='board.php?page=$i'>$i</a></span>" : "<b>$i</b> ";
  }
  echo ($next_page <= $total_page) ? "<span><a href='board.php?page=$next_page'>></a></span>" : "";
   ?>

</div>

<?php
require_once('index_bottom.php');
 ?>
