<?php
$username = $_POST['username'];
if (preg_match('/^[A-Za-z0-9@#$_-]{2,16}$/u', $username)) {
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
        die('false');
    } else {
        die('true');
    }
} else {
    die('false');
}
