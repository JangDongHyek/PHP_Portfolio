<?php
require_once("connect.php");
session_start();
$id = $_SESSION['id'];
$title =  $_POST['title'];
$ir1 = $_POST['ir1'];
$board_idx = $_POST['board_idx'];
$prev = $_POST['filename'];
$target_dir = "data/";
$name = $_FILES['file']['name'];

$sql = "SELECT * FROM user WHERE id = '{$id}'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$user_idx = $row['user_idx'];

$sql = "
UPDATE board
SET
  title = '{$title}',
  description = '{$ir1}'
WHERE
  board_idx = {$board_idx}
";

$result = mysqli_query($conn,$sql);

if ($result === false) {
  echo "<script>alert(\"Failed to Write the post\")</script>";
  echo "<script>location.href=\"board.php\"</script>";
} else {

  if ($name['name'] == "") {
    echo "<script>location.href=\"board.php\"</script>";
  } else {

    unlink("data/{$prev}");

    $sql = "DELETE FROM file WHERE board_idx = {$board_idx}";
    $result = mysqli_query($conn,$sql);

    $file_result = opendir("data");
    $number = 0;
    while ($file = readdir($file_result)) {
      $number++;
    }
    move_uploaded_file($_FILES['file']['tmp_name'],"$target_dir$number$name");

    $sql = "
    INSERT INTO file
	   (board_idx,
	    filename)
    VALUES
	   ($board_idx,
	    '{$number}{$name}')
    ";

    $result = mysqli_query($conn,$sql);

    if ($result === false) {
      echo "<script>alert(\"Failed to Write the post\")</script>";
      echo "<script>location.href=\"board.php\"</script>";
    } else {
      echo "<script>location.href=\"board.php\"</script>";
    }
  }

}


 ?>
