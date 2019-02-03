<?php
require_once("connect.php");
$board_idx = $_POST['board_idx'];
$sql = "SELECT * FROM file WHERE board_idx = {$board_idx}";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$filename = $row['filename'];

if ($filename == "") {

} else {
  unlink("data/{$filename}");
}


$sql = "DELETE FROM board WHERE board_idx = {$board_idx}";
$result = mysqli_query($conn,$sql);

if ($result === false) {
  echo "<script>alert('Delete to Fail')</script>";
  echo "<script>location.href='board.php'</script>";
} else {
  echo "<script>alert('Delete to Succeed')</script>";
  echo "<script>location.href='board.php'</script>";
}
 ?>
