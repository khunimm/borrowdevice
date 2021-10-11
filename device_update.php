<?php

include('database.php');

$sql = 'SELECT * FROM device';
$query = mysqli_query($connetion, $sql);

while ($row = mysqli_fetch_assoc($query)) {
    echo $row['brand'] . '<br>';
}

?>
