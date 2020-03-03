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
    // echo 'hello';
    // query and respond
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?;");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result()->fetch_assoc();
    if ($result) {
        // echo $result;
        echo 'success';
        echo '<br>';
        // foreach ($result as $user) {
        //     echo $user[0];
        //     // echo $user['username'];
        //     echo '<br>';
        //     // echo $user['password'];
        // }
        echo 'your password:' . $result['password'];
    } else {
        // echo $result;
        echo 'Sorry! You have not registered! <br>';
        echo 'Username: ' . $username;
    }
} else {
    echo 'Empty Username or Password! ';
}


// session_start();
// $_SESSION["admin"] = null;
