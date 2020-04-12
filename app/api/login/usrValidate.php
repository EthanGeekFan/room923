<?php
header("Content-Type: application/json; charset=utf8");

$post = json_decode(file_get_contents('php://input', true));

$username = $post->username;
if (preg_match('/^[A-Za-z0-9@#$_-]{3,16}$/u', $username)) {
    // die('true');

    // connect to database
    $server = 'localhost';
    $user = 'php';
    $passwd = 'mygoal4MIT!';
    $dbname = 'room923';
    $conn = new mysqli($server, $user, $passwd, $dbname);
    if ($conn->connect_error) {
        die('Database Connection Failed: ') . $conn->connect_error;
    }
    // query and respond
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?;");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if ($result) {
        $response->valid = false;
        exit(json_encode($response));
    } else {
        $response->valid = true;
        exit(json_encode($response));
    }
} else {
    $response->valid = false;
    exit(json_encode($response));
}
