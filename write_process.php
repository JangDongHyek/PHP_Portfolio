<?php
require_once("connect.php");
session_start();
$id = $_SESSION['id'];
$title =  $_POST['title'];
$ir1 = $_POST['ir1'];
$target_dir = "data/";
$name = $_FILES['file']['name'];

$file_result = opendir("data");
$number = 0;
while ($file = readdir($file_result)) {
  $number++;
}
move_uploaded_file($_FILES['file']['tmp_name'],"$target_dir$number$name");




$sql = "SELECT * FROM user WHERE id = '{$id}'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$user_idx = $row['user_idx'];

$sql = "
INSERT INTO board
	(user_idx,
	title,
	description,
	likes,
	created)
VALUES
	({$user_idx},
	'{$title}',
	'{$ir1}',
	0,
	NOW() );
";

$result = mysqli_query($conn,$sql);

if ($result === false) {
  echo "<script>alert(\"Failed to Write the post\")</script>";
} else {

  if ($name['name'] == "") {
    echo "<script>location.href=\"board.php\"</script>";
  } else {
    $sql = "SELECT LAST_INSERT_ID()";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $board_idx = $row['LAST_INSERT_ID()'];

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
    } else {
      echo "<script>location.href=\"board.php\"</script>";
    }
  }

}


 ?>
