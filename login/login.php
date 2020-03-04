<?php
// form submitted
header("Content-Type: text/html; charset=utf8");

if (!isset($_POST['submit'])) {
    exit('Wrong Execution! ');
}

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if ($username && $password) {
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
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? and password = ?;");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if ($result) {
        // $savePath = '/var/www/sessions/';
        header("refresh:0;url=/");
        $lifetime = 24 * 60 * 60;
        session_save_path($savePath);
        // session_set_cookie_params($lifetime);
        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['login'] = true;
        // setcookie(session_name(), session_id(), time() + $lifeTime, "/");
        exit;
        // echo 'set';
    } else {
        header("refresh:0;url=/login/?username=" . $username);
        exit;
    }
} else {
    echo 'Empty Username or Password! ';
}

?>