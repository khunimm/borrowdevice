<?php

session_start();
include('database.php');

$id = $_GET['id'];
$borrow_date = $_GET['borrow_date'];

// echo 'id:' . $id . '<br>';
// echo 'borrow_date:' . $borrow_date . '<br>';

$sql = "
  SELECT SUM(amount) AS amount
  FROM circulation
  WHERE device_id = {$id}
  AND system_return_date < '{$borrow_date}'
  AND user_id_admin_cancel IS NULL
  AND user_id_admin_return IS NULL
";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($query);
$num1 = $row['amount'];

$sql = "
  SELECT amount
  FROM device
  WHERE id = {$id}
";
$query = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($query);
$num2 = $row['amount'];

$amount = $num1 + $num2;

echo $amount;

?>
