<?php

session_start();
include('database.php');

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];
$date = date('Y-m-d H:i:s');

$sql = "
  UPDATE circulation
  SET user_return_date = '{$date}'
  WHERE id = {$id}
";

echo $sql;

mysqli_query($connection, $sql);
header('Location: circulation_user.php');

?>
