<?php

include('database.php');

$from_file = $_FILES['upload']['tmp_name'];
$to_file = 'C:/xampp/htdocs/borrow/upload/' . time() . '.jpg';

move_uploaded_file($from_file, $to_file);

$id = $_POST['id'];
$code = $_POST['code'];
$type = $_POST['type'];
$brand = $_POST['brand'];
$model = $_POST['model'];
$amount = $_POST['amount'];
$detail = $_POST['detail'];
$sql = "
    UPDATE device
    SET code = '{$code}',
        type = '{$type}',
        brand = '{$brand}',
        model = '{$model}',
        amount = '{$amount}',
        detail = '{$detail}',
        image = '{$to_file}'
    WHERE id = {$id}
";

mysqli_query($connection, $sql);
header('Location: manage_device.php');

?>
