<?php

$from_file = $_FILES['upload']['tmp_name'];
$to_file = 'C:/xampp/htdocs/borrow/upload/' . time() . '.jpg';

echo $from_file;
echo '<br>';
echo $to_file;

move_uploaded_file($from_file, $to_file);

?>
