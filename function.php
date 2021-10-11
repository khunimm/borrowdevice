<?php

// session_start();

error_reporting(E_ERROR | E_PARSE);

// ฟังก์ชันสำหรับเรียก รหัสพนักงาน ชื่อ นามสกุล จากฐานข้อมูล ผ่าน user_id
function get_user_string ($user_id) {
    include('database.php');

    error_reporting(E_ERROR | E_PARSE);


    $sql = "
        SELECT code, name
        FROM user
        WHERE id = {$user_id}
    ";
    $query = mysqli_query($connection, $sql);

    // $count = mysqli_num_rows($qery)

    if (mysqli_num_rows($query) == 1) {
        $user = mysqli_fetch_assoc($query);
        $string = $user['code'] . ' ' . $user['name'];

        return $string;
    } else {
        return NULL;
    }
}

function get_user_borrow_string ($user_id) {
    include('database.php');

    error_reporting(E_ERROR | E_PARSE);


    $sql = "
        SELECT code, name, phonenumber
        FROM user
        WHERE id = {$user_id}
    ";
    $query = mysqli_query($connection, $sql);

    // $count = mysqli_num_rows($qery)

    if (mysqli_num_rows($query) == 1) {
        $user = mysqli_fetch_assoc($query);
        $string = 'Name: ' . $user['name'] .'<br>'. 'Phone: ' .$user['phonenumber'];

        return $string;
    } else {
        return NULL;
    }
}

//นับแถว
function count_borrow ($user_id) {
    include('database.php');

    $sql = "
        SELECT
            c.id AS id,
            d.code AS device_code,
            d.type AS device_type,
            d.brand AS device_brand,
            c.borrow_date,
            c.system_return_date,
            u.code AS user_code,
            u.name AS user_name,
            c.user_id_admin_allow
        FROM circulation c
        LEFT JOIN device d
        ON d.id = c.device_id
        LEFT JOIN user u
        ON u.id = c.user_id_admin_allow
        WHERE c.user_id_borrow = {$user_id}
        AND c.user_return_date IS NULL
    ";
    $query = mysqli_query($connection, $sql); //ส่งsqlไปrunในdatabase

    $amount_test_borrow = mysqli_num_rows($query);

    return $amount_test_borrow;
}

function amount_borrow($device_id) {
    include('database.php');

    $sql = "
        SELECT amount
        FROM device
        WHERE id = {$device_id}
    ";

    $query = mysqli_query($connection, $sql); //ส่งsqlไปrunในdatabase

    return mysqli_num_rows($query);
}

function expdate($startdate,$datenum){
    $startdatec=strtotime($startdate); // ทำให้ข้อความเป็นวินาที
    $tod=$datenum*86400; // รับจำนวนวันมาคูณกับวินาทีต่อวัน
    $ndate=$startdatec+$tod; // นับบวกไปอีกตามจำนวนวันที่รับมา
    return $ndate; // ส่งค่ากลับ
   }

// echo amount_borrow(18);
?>
