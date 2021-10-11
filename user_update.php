<?php

include('database.php');

$sql = 'SELECT * FROM user';
$query = mysqli_query($connection, $sql);

echo $sql;

// while ($row = mysqli_fetch_assoc($query)) {
//     echo $row['brand'] . '<br>';
// }

?>
