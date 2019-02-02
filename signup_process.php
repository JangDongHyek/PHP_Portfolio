<?php
require_once("connect.php");

$id = $_POST['form-username'];
$password = $_POST['form-password'];

$sql = "SELECT * FROM user WHERE id='{$id}'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if ($row != null) {
  echo "<script>alert(\"ID가 중복됩니다\")</script>";
  echo "<script>history.back()</script>";
} else {
  $sql = "
  INSERT INTO user
    (id, password)
  VALUES(
      '{$id}',
      '{$password}'
      )";
  //
  $result = mysqli_query($conn,$sql);

  if ($result === false) {
    echo "<script>alert(\"회원가입에 문제가 생겼습니다\")</script>";
  } else {
    echo "<script>alert(\"회원가입에 성공하셨습니다\")</script>";
    echo "<script>location.href=\"login.php\"</script>";
  }
}





?>
