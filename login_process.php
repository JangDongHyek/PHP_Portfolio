<?php
require_once("connect.php");

$id = $_POST['form-username'];
$password = $_POST['form-password'];

$sql = "SELECT * FROM user WHERE id='{$id}'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);


if ($row != null) {
  if($row['password'] == $password){
    session_start();
    $_SESSION['id'] = $id;
    echo "<script>location.href=\"index.php\"</script>";
  } else {
      echo "<script>alert(\"Incorrect password\")</script>";
      echo "<script>history.back()</script>";
  }
} else {
  echo "<script>alert(\"There is no id\")</script>";
  echo "<script>history.back()</script>";
}
?>
