<?php
require_once('connect.php');
session_start();
$user_idx = $_SESSION['user_idx'];
$board_idx = $_POST['board_idx'];

$sql = "SELECT * FROM like_chk WHERE user_idx = {$user_idx} AND board_idx = {$board_idx}";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if($row == null) {
  $sql = "
  INSERT INTO like_chk
	 (user_idx,
	  board_idx)
  VALUES
	 ({$user_idx},
	  {$board_idx})
  ";
  $result = mysqli_query($conn,$sql);
  if ($result == false) {
    echo "Server Error1";
  } else {
    $sql = "
    UPDATE board
    SET
      likes = likes+1
    WHERE board_idx = {$board_idx}
    ";
    $result = mysqli_query($conn,$sql);
    if($result == false) {
      echo "Server Error2";
    } else {
      echo "Liked";
    }
  }

} else {

  $sql = "DELETE FROM like_chk WHERE user_idx = {$user_idx} and board_idx = {$board_idx}";
  $result = mysqli_query($conn,$sql);
  if ($result == false) {
    echo "Server Error3";
  } else {
    $sql = "
    UPDATE board
    SET
      likes = likes-1
    WHERE board_idx = {$board_idx}
    ";
    $result = mysqli_query($conn,$sql);
    if($result == false) {
      echo "Server Error4";
    } else {
      echo "Dis Liked";
    }
  }

}

 ?>
