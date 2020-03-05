<?php
// form submitted
header("Content-Type: text/html; charset=utf8");

if (!isset($_POST['submit'])) {
    exit('Wrong Execution! ');
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);

if (preg_match('/^[A-Za-z0-9@#$_-]{2,16}$/u', $username) && strlen($password) > 7 && preg_match('/^[A-Za-z0-9@#$\._-]{2,16}$/u', $password)) {
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
            die('Database Connection Failed: ') . $conn->connect_error;
        }
        $duplicate = $conn->prepare("SELECT * FROM users WHERE email = ?;");
        $duplicate->bind_param("s", $email);
        $duplicate->execute();
        $result = $duplicate->get_result()->fetch_assoc();
        if ($result) {
            header('refresh: 0; url=/login/?username=' . $username . '&signup=true&success=false&email=false');
            exit;
        }
        $stmt = $conn->prepare("INSERT INTO users(username,password,email) VALUES (?, ?, ?);");
        $stmt->bind_param("sss", $username, $password, $email);
        $success = $stmt->execute();
        if ($success) {
            header('refresh: 0; url=/login/?username=' . $username . '&success=true');
        } else {
            header('refresh: 0; url=/login/?username=' . $username . '&signup=true&success=false');
        }
    } else {
        echo 'Empty Username, Password or Email! ';
    }
} else {
    header('refresh: 0; url=/login/?signup=true&success=false');
}
