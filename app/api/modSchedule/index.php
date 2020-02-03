<?php

// $insertRow = implode(',',array('数学', '英语', '语文', '物理', '化学', '生物', '政治', '自习', '自习'));
$insertRow = array('数学', '英语', '语文', '物理', '化学', '生物', '政治', '自习', '自习');
if (isset($_GET['weekday']) && trim($_GET['weekday']) != '') {
    try {
        $day = intval(trim($_GET['weekday']));
    } catch (Exception $e) {
        $response->message = 'Wrong Parameter Value';
        $response->Code = '23333';
        $response->data = array();
        exit(json_encode($response));
    }
} else {
    $response->message = 'Wrong Execution';
    $response->Code = '22222';
    $response->data = array();
    exit(json_encode($response));
}

if ($day > 7 || $day < 1) {
    $response->message = 'Wrong Parameter Value';
    $response->Code = '23333';
    $response->data = array();
    exit(json_encode($response));
}

$server = 'localhost';
$user = 'php';
$passwd = 'mygoal4MIT!';
$dbname = 'schedules';
$conn = new mysqli($server, $user, $passwd, $dbname);
if ($conn->connect_error) {
    die('Database Connection Failed: ') . $conn->connect_error;
}
$stmt = $conn->prepare("UPDATE demo SET schedule = ? WHERE weekday = ?;");
$stmt->bind_param("si", json_encode($insertRow), $day);
$success = $stmt->execute();
if ($success) {
    $response->message = 'Success';
    $response->Code = '66666';
    $response->data = array();
    exit(json_encode($response));
} else {
    $response->message = 'Database Error';
    $response->Code = '99999';
    $response->data = array();
    exit(json_encode($response));
}
