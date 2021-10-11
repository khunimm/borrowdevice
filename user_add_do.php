<?php

include('database.php');

// UPLOAD IMAGE
$from_file = $_FILES['upload']['tmp_name'];
$to_file = 'C:/xampp/htdocs/borrow/upload/' . time() . '.jpg';
move_uploaded_file($from_file, $to_file);

// INSERT DB
$code = $_POST['code'];
$name = $_POST['name'];
$phonenumber = $_POST['phonenumber'];
$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];
$sql = "
    INSERT INTO user (code, name, phonenumber, username, password, role, image)
    VALUES ('{$code}', '{$name}', '{$phonenumber}', '{$username}', '{$password}', '{$role}', '{$to_file}')
";

mysqli_query($connection, $sql);
header('Location: manage_user.php');

?>
