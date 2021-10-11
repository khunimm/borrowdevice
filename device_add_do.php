<?php

include('database.php');

// UPLOAD IMAGE
$from_file = $_FILES['upload']['tmp_name'];
$to_file = 'C:/xampp/htdocs/borrow/upload/' . time() . '.jpg';
move_uploaded_file($from_file, $to_file);

// INSERT DB
$code = $_POST['code'];
$type = $_POST['type'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$totalamount = $_POST['amount'];
$amount = $_POST['amount'];
$detail = $_POST['detail'];
$sql = "
    INSERT INTO device (code, type, brand, model, totalamount, amount, detail, image)
    VALUES ('{$code}', '{$type}', '{$brand}', '{$model}', '{$amount}', '{$amount}', '{$detail}', '{$to_file}')
";

mysqli_query($connection, $sql);
header('Location: manage_device.php');

?>
