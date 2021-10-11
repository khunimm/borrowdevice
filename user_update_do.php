<?php

include('database.php');

$from_file = $_FILES['upload']['tmp_name'];
$to_file = 'C:/xampp/htdocs/borrow/upload/' . time() . '.jpg';

move_uploaded_file($from_file, $to_file);

$id = $_POST['id'];
$code = $_POST['code'];
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$block = $_POST['block'];
$sql = "
    UPDATE user
    SET code = '{$code}',
        name = '{$name}',
        phonenumber = '{$phonenumber}',
        username = '{$username}',
        password = '{$password}',
        role = '{$role}',
        block = '{$block}',
        image = '{$to_file}'
    WHERE id = {$id}
";

mysqli_query($connection, $sql);
header('Location: manage_user.php');


?>
