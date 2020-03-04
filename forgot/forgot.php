<?php

$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

if (!(preg_match('/^[A-Za-z0-9@#$_-]{2,16}$/u', $username) || strlen($password) > 7 || preg_match('/^[A-Za-z0-9@#$\._-]{2,16}$/u', $password))) {
    exit('Invalid info!');
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
        exit('false');
        // die('Database Connection Failed: ') . $conn->connect_error;
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
            exit('true');
        } else {
            exit('false');
        }
    } else {
        exit('false');
    }
} else {
    exit('false');
}
