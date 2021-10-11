<?php

session_start();
include('database.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "
  SELECT *
  FROM user
  WHERE username LIKE '{$username}'
  AND password LIKE '{$password}'
  AND block LIKE 'unblock'
";

// echo $sql;

$query = mysqli_query($connection, $sql);

// echo mysqli_num_rows($query);

if (mysqli_num_rows($query) == 1) {
  $user = mysqli_fetch_assoc($query);
  $_SESSION['user_id'] = $user['id'];
  $_SESSION['user_role'] = $user['role'];

  header('Location: devicelist.php');
} else {
  header('Location: login_form.php?fail=1');
}



?>
