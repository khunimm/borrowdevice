<?php

session_start();
include('database.php');

$borrow_date = $_POST['borrow_date'];
$return_date = $_POST['return_date'];
$device_id = $_POST['device_id'];
$device_amount = $_POST['device_amount'];
$user_id = $_SESSION['user_id'];
$amount = $_POST['amount'];
$note = $_POST['note'];
$queue = $_POST['queue'];

if ($queue == '1') {
  // เขียนโค๊ดเข้า queue
  $sql = "
  INSERT INTO queue (device_id, user_id_borrow, borrow_date, system_return_date, amount)
  VALUES ({$device_id}, {$user_id}, '{$borrow_date}', '{$return_date}', {$amount});
  ";

  mysqli_query($connection, $sql); //insertเข้าฐานข้อมูล

} else {
  // เขียนโค๊ดยืมคืนปกติ
  $sql = "
    INSERT INTO circulation (device_id, user_id_borrow, borrow_date, system_return_date, amount, note)
    VALUES ({$device_id}, {$user_id}, '{$borrow_date}', '{$return_date}', {$amount}, '{$note}');
  ";

  // echo $sql;

  mysqli_query($connection, $sql); //insertเข้าฐานข้อมูล

  $sql = "
    UPDATE device
    SET amount = amount - {$amount}
    WHERE id = {$device_id};
  ";

  mysqli_query($connection, $sql); //updateเข้าฐานข้อมูล

}
// $queue = $_POST['queue'];
// var_dump($queue);
// exit();
// var_dump($borrow_date);
// echo '<br><br>';
// var_dump($return_date);

// exit();



header('Location: devicelist.php');

?>
