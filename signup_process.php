<?php
require_once("connect.php");

$id = $_POST['form-username'];
$password = $_POST['form-password'];

$sql = "SELECT * FROM user WHERE id='{$id}'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);

if ($row != null) {
  echo "<script>alert(\"ID is overlap\")</script>";
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
    echo "<script>alert(\"Problem to Signup\")</script>";
  } else {
    echo "<script>alert(\"Signup succeed\")</script>";
    echo "<script>location.href=\"login.php\"</script>";
  }
}





?>
