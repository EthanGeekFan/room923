<?php
// form submitted
header("Content-Type: text/html; charset=utf8");

if (!isset($_POST['submit'])) {
    exit('Wrong Execution! ');
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$email = trim($_POST['email']);

if ($username && $password && $email) {
    // encrypt password
    $password = $password;
    // connect to database
    $server = 'localhost';
    $user = 'php';
    $passwd = 'mygoal4MIT!';
    $dbname = 'room923';
    $conn = new mysqli($server, $user, $passwd, $dbname);
    if ($conn->connect_error) {
        die('Database Connection Failed: ') . $conn->connect_error;
    }
    // echo 'hello';
    // query and respond
    // $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? and password = ?;");
    $stmt = $conn->prepare("INSERT INTO users(username,password,email) VALUES (?, ?, ?);");
    $stmt->bind_param("sss", $username, $password, $email);
    $success = $stmt->execute();
    echo 'stmt';
    if ($success) {
        echo 'yes';
    } else {
        echo 'no';
    }
} else {
    echo 'Empty Username or Password! ';
}

?>