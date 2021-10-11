<?php

include('database.php');

$id = $_POST['id'];

$sql = "
    DELETE FROM device
    WHERE id = {$id}
";

mysqli_query($connection, $sql);
header('Location: manage_device.php');

?>
