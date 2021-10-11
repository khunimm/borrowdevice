<?php

include('database.php'); //ติดต่อฐานข้อมูล

$sql = 'SELECT * FROM device';
$query = mysqli_query($connection, $sql); //ส่งsqlไปrunในdatabase
$html = '';

while ($row = mysqli_fetch_assoc($query)) {
    $update = "
        <a href='device_update_form.php?id={$row['id']}'>
            UPDATE
        </a>
    ";
    $delete ="
        <a href = 'device_delete_form.php?id={$row['id']}'>
            DELETE
        </a>
    ";
    $html .= "
        <tr>
            <td>{$row['code']}</td>
            <td>{$row['type']}</td>
            <td>{$row['brand']}</td>
            <td>{$row['model']}</td>
            <td>{$row['amount']}</td>
            <td>{$row['detail']}</td>
            <td>{$update} | {$delete}</td>
    "; //.=เป็นการต่อสตริง
}

?>

<a href="device_add_form.php">+ ADD</a><br>

<table border="1">
    <tr>
        <td>code</td>
        <td>type</td>
        <td>brand</td>
        <td>model</td>
        <td>amount</td>
        <td>detail</td>
        <td>menu</td>
    <?php echo $html; ?>
</table>
