<?php

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
// echo 'hello';
// query and respond
$stmt = $conn->prepare("SELECT * FROM demo WHERE weekday = ?;");
$stmt->bind_param('i', $day);
$stmt->execute();
$result = $stmt->get_result()->fetch_assoc();
if ($result) {
    $data->weekday = $day;
    $data->schedule = json_decode($result['schedule']);
    $data->scheduleTime = json_decode($result['schedule_time']);
    $data->mod_date = $result['mod_date'];
    $response->message = 'Success';
    $response->Code = '66666';
    $response->data = $data;
} else {
    $response->message = 'Wrong Execution';
    $response->Code = '22222';
    $response->data = array();
}

exit(json_encode($response));
