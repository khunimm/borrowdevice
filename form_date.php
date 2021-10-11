<?php

// https://www.php.net/manual/en/function.checkdate.php
function valid_date($date, $format = 'Y-m-d H:i') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

$submit = isset($_POST['submit']);

if ($submit) {
    $day = $_POST['day'];
    $month = $_POST['month'];
    $year = $_POST['year'];
    $hour = $_POST['hour'];
    $minute = $_POST['minute'];
    $date = "{$year}-{$month}-{$day} {$hour}:{$minute}";
    $check = valid_date($date);

    if ($check) {
        echo "Your date is valid. Your date is {$date}";
    } else {
        echo "Your date is invalid. Your date is {$date}";
    }
}

$html_day = '';

for ($i = 1; $i <= 31; $i++) {
    $html_day .= '<option value="' . str_pad($i, 2, '0', STR_PAD_LEFT) . '">' . $i . '</option>';
}

$html_month = '';
$list_month = array (
    'January', 'February', 'March', 
    'April', 'May', 'June', 
    'July', 'August', 'September', 
    'October', 'November', 'December'
);

for ($i = 0; $i < count($list_month); $i++) {
    $html_month .= '<option value="' . str_pad($i + 1, 2, '0', STR_PAD_LEFT) . '">' . $list_month[$i] . '</option>';
}

$html_year = '';
$from_year = date('Y');
$to_year = $from_year + 5;

for ($i = $from_year; $i <= $to_year; $i++) {
    $html_year .= '<option value="' . $i . '">' . $i . '</option>';
}

$html_hour = '';

for ($i = 0; $i <= 23; $i++) {
    $html_hour .= '<option value="' . str_pad($i, 2, '0', STR_PAD_LEFT) . '">' . str_pad($i, 2, '0', STR_PAD_LEFT) . '</option>';
}

$html_minute = '';

for ($i = 0; $i <= 59; $i+=30) {
    $html_minute .= '<option value="' . str_pad($i, 2, '0', STR_PAD_LEFT) . '">' . str_pad($i, 2, '0', STR_PAD_LEFT) . '</option>';
}

?>

<form method="post" action="form_date.php">
    <select name="day">
        <?php echo $html_day; ?>
    </select>
    <select name="month">
        <?php echo $html_month; ?>
    </select>
    <select name="year">
        <?php echo $html_year; ?>
    </select>
    <select name="hour">
        <?php echo $html_hour; ?>
    </select>
    <select name="minute">
        <?php echo $html_minute; ?>
    </select>
    <input type="submit" name="submit">
</form>