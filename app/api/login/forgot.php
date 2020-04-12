<?php

header("Content-Type: application/json; charset=utf8");

$post = json_decode(file_get_contents('php://input', true));

$username = trim($post->username);
$password = trim($post->password);
$email = trim($post->email);

if (!(preg_match('/^[A-Za-z0-9@#$_-]{2,16}$/u', $username) || strlen($password) > 7 || preg_match('/^[A-Za-z0-9@#$\._-]{2,16}$/u', $password))) {
    $response->message = 'Illegal username or password';
    $response->code = '40002';
    exit(json_encode($response));
}

if ($username && $password && $email) {
    // encrypt password
    $password = md5($password);
    // connect to database
    $server = 'localhost';
    $user = 'php';
    $passwd = 'mygoal4MIT!';
    $dbname = 'room923';
    $conn = new mysqli($server, $user, $passwd, $dbname);
    if ($conn->connect_error) {
        $response->message = 'Database Error';
        $response->code = '30001';
        exit(json_encode($response));
    }
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND email = ?;");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if ($result) {
        $updt = $conn->prepare("UPDATE users SET password = ? WHERE username = ? AND email = ?;");
        $updt->bind_param("sss", $password, $username, $email);
        $success = $updt->execute();
        if ($success) {
            $response->message = 'Operation successful';
            $response->code = '60001';
            exit(json_encode($response));
        } else {
            $response->message = 'Unknown error';
            $response->code = '30001';
            exit(json_encode($response));
        }
    } else {
        $response->message = 'Wrong credentials';
        $response->code = '50004';
        exit(json_encode($response));
    }
} else {
    $response->message = 'Empty Field';
    $response->code = '50002';
    exit(json_encode($response));
}
