<?php

session_start();
include('database.php');

$id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$sql = "
  UPDATE circulation
  SET user_id_admin_return = {$user_id}
  WHERE id = {$id}
";

mysqli_query($connection, $sql);
header('Location: circulation_admin.php');

?>
