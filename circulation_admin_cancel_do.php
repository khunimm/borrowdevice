<?php

session_start();
include('database.php');

$id = $_POST['circulation_id']; //ส่งตามnameของหน้าform
$user_id = $_SESSION['user_id'];
$reason = $_POST['reason'];
$circulation_amount = $_POST['circulation_amount'];
$device_id = $_POST['device_id'];

$sql = "
  UPDATE circulation
  SET admin_reason = '{$reason}',
  user_id_admin_cancel = {$user_id}
  WHERE id = {$id}
";

// echo($sql);
mysqli_query($connection, $sql);


$sql = "
  UPDATE device
  SET amount = amount + {$circulation_amount}
  WHERE id = {$device_id}
";

// exit();
 //updateเข้าฐานข้อมูล

mysqli_query($connection, $sql);
header('Location: circulation_admin.php');

?>
