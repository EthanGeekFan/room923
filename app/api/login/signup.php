<?php
header("Content-Type: application/json; charset=utf8");

$post = json_decode(file_get_contents('php://input', true));

$username = trim($post->username);
$password = trim($post->password);
$email = trim($post->email);

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
            $response->message = 'Database Error';
            $response->code = '30001';
            exit(json_encode($response));
        }
        $duplicate = $conn->prepare("SELECT * FROM users WHERE email = ?;");
        $duplicate->bind_param("s", $email);
        $duplicate->execute();
        $result = $duplicate->get_result()->fetch_assoc();
        if ($result) {
            // email duplicated
            $response->message = 'Email already used';
            $response->code = '40001';
            exit(json_encode($response));
        }
        $stmt = $conn->prepare("INSERT INTO users(username,password,email) VALUES (?, ?, ?);");
        $stmt->bind_param("sss", $username, $password, $email);
        $success = $stmt->execute();
        if ($success) {
            // Signup succeeded
            $response->message = 'Signup successful';
            $response->code = '60001';
            exit(json_encode($response));
        } else {
            // Signup database error
            $response->message = 'Username already taken';
            $response->code = '50003';
            exit(json_encode($response));
        }
    } else {
        // echo 'Empty Username, Password or Email! ';
        // Empty fields
        $response->message = 'Empty Field';
        $response->code = '50002';
        exit(json_encode($response));
    }
} else {
    // email format error
    $response->message = 'Illegal username or password';
    $response->code = '40002';
    exit(json_encode($response));
}
