<?php
require_once("connect.php");

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

$limit_idx = ($page - 1) * $page_set; // limit시작위치

// 현재페이지 쿼리
$query = "SELECT * FROM board ORDER BY board_idx DESC LIMIT $limit_idx, $page_set";
$result = mysqli_query($conn,$query);


while ($rows = mysqli_fetch_array($result)) {
echo $rows['board_idx']."\n";
}
// 리스트 뿌리기


// 페이지번호 & 블럭 설정
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

// 페이징 화면
echo ($prev_page > 0) ? "<a href='test.php?page=$prev_page'>[prev]</a> " : "[prev] ";
echo ($prev_block > 0) ? "<a href='test.php?page=$prev_block_page'>...</a> " : "... ";

for ($i=$first_page; $i<=$last_page; $i++) {
echo ($i != $page) ? "<a href='test.php?page=$i'>$i</a> " : "<b>$i</b> ";
}

echo ($next_block <= $total_block) ? "<a href='test.php?page=$next_block_page'>...</a> " : "... ";
echo ($next_page <= $total_page) ? "<a href='test.php?page=$next_page'>[next]</a>" : "[next]";

?>
